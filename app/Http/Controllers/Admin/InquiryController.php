<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Items;
use App\Rfi;
use App\RfiDetail;
use App\Supplier;
use App\SupplierContact;
use Auth;
use Datatables;

class InquiryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Create.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supplier = Supplier::all();
        $supplierContact = SupplierContact::all();
        $mfr = Items::select('mfr')->groupBy('mfr')->get();
      

        return view('admin/inquiry/create')->with('suppliers', $supplier)->with('supplierContacts', $supplierContact)->with('mfr',$mfr);
    }
    public function createDirect()
    {
        $supplier = Supplier::all();
        $supplierContact = SupplierContact::all();
        $mfr = Items::select('mfr')->groupBy('mfr')->get();
      

        return view('admin/inquiry/create-item')->with('suppliers', $supplier)->with('supplierContacts', $supplierContact)->with('mfr',$mfr);
        
    }


    public function list(Request $request)
    {
        //
        return view('admin/inquiry/list');
    }

     /**
     * View
     *
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request, $id)
    {
        //
       
        $rfidata = Rfi::find( $id );
       

        //
        return view('admin/inquiry/view')->with( 'rfi', $rfidata );
    }
    public function print($id)
    {
        //
       $data = Rfi::where('id',$id)->with('supplier','contact','details.item')->first();
      
       

        //
        return view('admin/inquiry/print')->with('data',$data);
    }

    
public function save(Request $request){
   
    $pr = new Rfi;
    $pr->rfi_dept_id = $request->get("rfi_dept_id");
    $pr->rfi_requester_id = $request->get("rfi_requester_id");
    $pr->customer_id = $request->get("customer_id");
    $pr->status = 0;
    $pr->created_by = Auth::user()->name;
    $pr->modified_by = Auth::user()->name;
    $pr->save();

    $product_id  = $request->get("product_id");
		// $mfr         = $request->get("mfr");
		// $part_name   = $request->get("part_name");
		// $description = $request->get("description");
		$qty_rfi      = $request->get("qty_rfi");
		$um_rfi          = $request->get("um_rfi");

		for($i=0;$i<count($product_id);$i++)
        {

        	if($product_id != null && $qty_rfi != null)
        	{
				$qcItemParts = new RfiDetail;
				$qcItemParts->rfi_id = $pr->id;
				$qcItemParts->product_id    = $product_id[$i];
				// $qcItemParts->mfr 		   = $mfr[$i];
				// $qcItemParts->part_name    = $part_name[$i];
				// $qcItemParts->description  = $description[$i];
				$qcItemParts->qty_rfi       = $qty_rfi[$i];
                $qcItemParts->um_rfi           = $um_rfi[$i];
                
                $qcItemParts->created_by = Auth::user()->name;
                $qcItemParts->modified_by = Auth::user()->name;
				$qcItemParts->save();
			}
		}

    return redirect( route('list_inquiry') )->with('success', 'Purchase Request created');

}



public function getData(Request $request)
{
   // Get Supplier
   $records = Rfi::where('status', '0')->with('supplier')->get();


   return Datatables::of($records)
   ->editColumn('null', function($record) {

       return;
   })
   ->editColumn('rfi_num', function($record) {

    return $record->rfi_num;
})
->editColumn('rfi_num_seq', function($record) {

    return $record->rfi_num_seq;
})
->editColumn('supplier', function($record) {

    return $record->supplier->supplier_name;
})
        
->editColumn('rfi_requester_id', function($record) {

    return $record->rfi_requester_id;
})

           ->editColumn('action', function($record) {

               return '

                   &nbsp&nbsp

                

                   &nbsp&nbsp&nbsp&nbsp&nbsp

                   <a href="'.route('view_rfi', $record->id).'"">
                   <img class="view-action" src="'.asset("/admin/images/edit.png").'">
               </a>

               &nbsp&nbsp&nbsp&nbsp&nbsp
               <a href="' . route('print_inquiry', $record->id) . '"">
               <img class="view-action" src="' . asset("/admin/images/view.png") . '" title="View PO">
           </a>

                 

               ';
           })
           ->rawColumns(['id','rfi_dept_id','rfi_requester_id','customer_id', 'action'])

       ->make(true);
}

public function saveRFI(Request $request)
{
    // dd($request->pr_id_detail);
    $date = Rfi::orderBy('created_at', 'desc')->first();
    $current_timestamp = date("Y-m-d 00:00:00");
    $num = Rfi::where('created_at', $current_timestamp)->count();
    // Parameters
    $input = $request->all();
    $data['rfi_num'] = $request->rfi_num;
    if ($current_timestamp == $date['created_at']) {
        $data['rfi_num_seq'] = str_pad($num + 1, 4, "0", STR_PAD_LEFT);
       
    } else {
        $data['rfi_num_seq'] = str_pad(1, 4, "0", STR_PAD_LEFT);
    }
    $data['supplier_id'] = $request->supplier_id;
    $data['supplier_contact_id'] = $request->supplier_contact_id;
    $data['inq_date'] = $request->inq_date;
    $data['rfi_requester_id'] = $request->rfi_requester_id;
    $data['remark'] = $request->remark;
    $data['status'] = 0;
   



    //

    $Po = Rfi::create($data);


    $product_id = $request->get("product_id");
    $qty = $request->get("qty");

    for ($i = 0; $i < count($product_id); $i++) {
        if ($product_id[$i] != null && $qty[$i] != null ) {

            $Detail = new RfiDetail;
            $Detail->rfi_id = $Po->id;
          
            $Detail->product_id = $product_id[$i];
            $Detail->qty_pos = $qty[$i];
            $Detail->status = 0;
            $Detail->save();
           
        }
    }
    return redirect( route('list_inquiry') )->with('success', 'Purchase Request created');
}

public function getDataRFI($id)
{

    // $records = Items::query()->whereIn('id', explode(',', $productIds));

    $records = RfiDetail::where('rfi_id',$id)->with('item')->get();
    // dd($records);
    // foreach ($records as $get){
    //     dd($get->item->mfr);
    // }



    return Datatables::of($records)

        ->editColumn('mfr', function ($record) {

            return $record->item->mfr;
        })
        ->editColumn('part_num', function ($record) {

            return $record->item->part_num;
        })
        ->editColumn('part_name', function ($record) {

            return $record->item->part_name;
        })
        ->editColumn('part_desc', function ($record) {

            return $record->item->part_desc;
        })
        ->editColumn('qty', function ($record) {

            return "<input type='number' name='qty[]' class='form-control m-input' style='width: 100px;' value='".$record->qty_pos."'>";
        })
        ->editColumn('um', function ($record) {

            return $record->item->default_um;
        })

        ->editColumn('price', function ($record) {

            return "<input type='number' name='unit_price[]' class='form-control m-input' style='width: 130px;'>";
        })
        ->editColumn('curr', function ($record) {

            return "<input type='text' name='curr[]' class='form-control m-input' style='width: 130px;'>";
        })
        ->editColumn('lead_time', function ($record) {

            return "<input type='text' name='lead_time[]' class='form-control m-input' style='width: 180px;'>";
        })
        ->editColumn('product_id', function ($record) {

            return "<input type='text' name='product_id[]' class='form-control m-input' readonly value='".$record->item->id."'>";
        })

        // ->editColumn('total', function($record) {
        //
        //     $itemprice = $record->item_price;
        //     $qty = QuotationDetail::select('qty_qs')->where( 'qs_id', $this->qsIdGlobal )->where( 'product_id', $record->id )->first()->qty_qs;
        //     $total = $itemprice*$qty;
        //     return $total;
        // })

        ->rawColumns(['pr', 'pr_seq', 'type_product_id', 'sequence_number', 'id', 'curr', 'qty', 'um', 'unit_cost','price','lead_time','product_id'])

        ->make(true);

    //  $total = Items::query()->select('unit_cost')->whereIn( 'id', explode( ',', $productIds ) );
    //    $total = $total->toArray();
    //    $total = sum($total);
    //    return $total;

}

public function rfiGet($id){
    $data = Rfi::where('id',$id)->with('supplier','contact')->first();
    return $data;
}
}
