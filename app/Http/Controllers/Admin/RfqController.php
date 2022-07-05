<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rfq;
use App\RfqTerm;
use App\Rfi;
use App\Items;
use App\RfqDetail;
use App\RfiDetail;
use App\Supplier;
use App\SupplierContact;
use Auth;
use Datatables;

class RfqController extends Controller
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
     * Create
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $supplier = Supplier::all();
        $supplierContact = SupplierContact::all();
        $rfi = Rfi::all()->where('status', '0');
        $collect = Rfq::select('id');
        $lastid = collect([$collect])->last();

        //
        return view('admin/rfq/create')->with( 'suppliers', $supplier )->with( 'supplierContacts', $supplierContact )->with( 'rfi', $rfi );
    }

    /**
     * Save
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {   $date = Rfq::orderBy('created_at', 'desc')->first();
        $current_timestamp = date("Y-m-d 00:00:00");
        $num = Rfq::where('created_at', $current_timestamp)->count();
        //echo '<pre>';
        //print_r( $request->all() );
        //die();
    	// Parameterss
    	  $input = $request->all();
        $data['supplier_id'] = $request->supplier_id;
        $data['supplier_contact_id'] = $request->supplier_contact_id;
        $data['inquiry_customer'] = $request->inquiry_customer;
        $data['vendor_reference'] = $request->vendor_reference;
        $data['rfq_number'] = $request->rfq_number;
if($current_timestamp == $date['created_at']){
    $data['rfq_number_seq'] = str_pad($num + 1,4,"0",STR_PAD_LEFT);
}
else{
    $data['rfq_number_seq'] = str_pad(1,4,"0",STR_PAD_LEFT);
}
        $data['order_date'] = $request->order_date;
        $data['termcondition'] = $request->termcondition;

      	$data['created_by'] = Auth::user()->name;
    	  $data['modified_by'] = Auth::user()->name;

        //SAVE RFQ
        $rfq = Rfq::create( $data );
        $rfindone['status'] = 2;
        Rfi::where('id', $request->inquiry_customer)->update( $rfindone );

        //TRUNCATE DETAIL
        // RfqDetail::where('rfq_id', $rfq->id)->truncate();

        //DETAIL
        if( !empty( $request->items ) )
        {
            //ITEMS
            foreach ($request->items as $itemId => $get)
            {
                $rfqDetail['rfi_detail_id'] = null;
                // $rfqDetail['sequence_number'] = $get["sequence_number"];
                // $rfqDetail['type_product_id'] = $get["type_product_id"];
                $rfqDetail['product_id'] = $itemId;
                $rfqDetail['qty_rfq'] = $get["qty"];
                $rfqDetail['um_rfq'] = $get["um"];
                $rfqDetail['status'] = 1;
                $rfqDetail['validation_needed'] = null;
                $rfqDetail['rfq_id'] = $rfq->id;
                $rfqDetail['created_by'] = Auth::user()->name;
                $rfqDetail['modified_by'] = Auth::user()->name;

                //SAVE DETAIL
                $rfqdet = RfqDetail::create( $rfqDetail );
            }
            if ($request->inquiry_customer == '0') {

                $data = RfqTerm::where('created_by', Auth::user()->name);
                $data->delete();
            }
        }

    	//
    	return redirect( route('rfq_list') )->with('success', 'Request for quotation created');
    }

    public function saveItemData(Request $request)
    {
        //echo '<pre>';
        //print_r( $request->all() );
        //die();
    	// Parameters
    	  $input = $request->all();
        $data['product_id'] = $request->product_id;
        $data['qty_rfi'] = $request->qty_rfi;
        $data['um_rfi'] = $request->um_rfi;

        $data['status'] = 2;
      	$data['created_by'] = Auth::user()->name;

        //SAVE RFQ
        $rfidet = RfqTerm::create( $data );

    	//
    	return redirect( route('create_rfq') )->with('success', 'Add Item Success');
    }

    public function saveItemDataUpdate(Request $request)
    {
        //echo '<pre>';
        //print_r( $request->all() );
        //die();
    	// Parameters
    	  $input = $request->all();
        $id=$request->id;
        $data['rfq_id'] = $request->id;
        $data['product_id'] = $request->product_id;
        $data['qty_rfq'] = $request->qty_rfq;
        $data['um_rfq'] = $request->um_rfq;

      	$data['created_by'] = Auth::user()->name;

        //SAVE RFQ
        $rfidet = RfqDetail::create( $data );

    	//
    	return redirect( route('rfq_list') )->with('success', 'Add Item Success');
    }

    public function deleteItemData(Request $request)
    {
        $data = RfiDetail::where('status','2');
        $data->delete();
        // $data['status'] = 2;
        // RfiDetail::destroy( $data );

        return redirect( route('create_rfq') )->with('success', 'Cancel Item Success');
    }

    public function deleteItemDataTable(Request $request, $id)
    {
        $data = RfqTerm::where('id',$id);
        $data->delete();
        // $data['status'] = 2;
        // RfiDetail::destroy( $data );

        return redirect( route('create_rfq') )->with('success', 'Cancel Item Success');
    }

    public function deleteItemDataTable2(Request $request, $id)
    {
        $data = RfqDetail::where('id',$id);
        $data->delete();
        // $data['status'] = 2;
        // RfiDetail::destroy( $data );

        return redirect( route('rfq_list') )->with('success', 'Delete Item Success');
    }

    /**
     * List
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        //
        return view('admin/rfq/list');
    }

    /**
     * Get Data
     *
     * @return \Illuminate\Http\Response
     */

     public function getDataItem(Request $request)
     {
         // Get Supplier
         $records = Items::query();

         return Datatables::of($records)
                 ->editColumn('mfr', function($record) {

                     return $record->mfr;
                 })
                 ->editColumn('part_num', function($record) {

                     return $record->part_num;
                 })
                 ->editColumn('part_name', function($record) {

                     return $record->part_name;
                 })
                 ->editColumn('part_desc', function($record) {

                     return $record->part_desc;
                 })
                 ->editColumn('unit_cost', function($record) {

                     return $record->unit_cost;
                 })
                 ->editColumn('sell_price', function($record) {

                     return $record->sell_price;
                 })
                 ->editColumn('add', function($record) {

                     return '
                          <input type="checkbox" name="product_id" value="'.$record->id.'">
                         &nbsp&nbsp

                     ';
                 })


                 ->rawColumns(['id', 'add'])

             ->make(true);
     }

    public function getData(Request $request)
    {
        // Get Supplier
        $records = Rfq::query()->where('status', '0');


        return Datatables::of($records)


        
        ->editColumn('null', function($record) {

            return;
        })
                ->editColumn('rfq_number', function($record) {

                    $rfqnmb= Rfq::select('rfq_number')->where( 'id', $record->id )->first();
                    return $rfqnmb->rfq_number;
                  
                })
                ->editColumn('supplier_id', function($record) {

                    $supplier = Supplier::select('supplier_name')->where( 'id', $record->supplier_id )->first();
                    return $supplier->supplier_name;    
                })
                ->editColumn('rfq_number_seq', function($record) {

                    $rfqnmbseq = Rfq::select('rfq_number_seq')->where( 'id', $record->id )->first();
                 
                    return $rfqnmbseq->rfq_number_seq;
                })
                ->editColumn('supplier_contact_id', function($record) {

                    $contact = SupplierContact::select('contact_name')->where( 'id', $record->supplier_contact_id )->first();
                    return $contact->contact_name;
                })
                ->editColumn('status', function($record) {

                    if( $record->status == '1' )
                    {
                        return 'Approved';
                    }
                    else
                    {
                        return 'Pending';
                    }
                })
                ->editColumn('created_at', function($record) {

                    return $record->created_at;
                })
                ->editColumn('action', function($record) {

                    return '

                        &nbsp&nbsp

                        <a href="'.route('view_rfq', $record->id).'"">
                            <img class="view-action" src="'.asset("/admin/images/view.png").'">
                        </a>

                        &nbsp&nbsp&nbsp&nbsp&nbsp

                        <a href="'.route('delete_rfq', $record->id).'" OnClick="return confirm(\' Are you sure to delete it \');"">
                            <img class="delete-action" src="'.asset("/admin/images/delete.png").'">
                        </a>

                    ';
                })
                ->rawColumns(['rfq_number','id', 'action'])

            ->make(true);
    }

    /**
     * Delete
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        //
        // Rfq::destroy( $id );
        $rfqdel['status'] = 1;
        Rfq::where('id', $id)->update( $rfqdel );

        //
        return redirect( route('rfq_list') )->with('success', 'Supplier deleted!');
    }

    /**
     * View
     *
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request, $id)
    {
        //
        $supplier = Supplier::all();
        $supplierContact = SupplierContact::all();
        $data = Rfq::find( $id );
        $dataall = Rfq::all();
        $rfidata = Rfi::all();
        $dataDetail = RfqDetail::where( 'rfq_id', $id )->first();

        //
        return view('admin/rfq/view')->with( 'dataall', $dataall )->with( 'rfi', $rfidata )->with( 'data', $data )->with( 'suppliers', $supplier )->with( 'supplierContacts', $supplierContact )->with( 'dataDetail', $dataDetail );
    }

    /**
     * Save
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Parameters
        $input = $request->all();

        $id = $request->id;
        $input = $request->all();
        // $data['supplier_id'] = $request->supplier_id;
        // $data['supplier_contact_id'] = $request->supplier_contact_id;
        // $data['status'] = $request->rfq_status;
        // $data['created_by'] = Auth::user()->name;
        // $data['modified_by'] = Auth::user()->name;

        // Parameters

        if( !empty( $request->items ) )
        {
            //ITEMS
            foreach ($request->items as $itemId => $get)
            {
                $rfqDetail['rfi_detail_id'] = null;
                // $rfqDetail['sequence_number'] = $get["sequence_number"];
                // $rfqDetail['type_product_id'] = $get["type_product_id"];
                // $rfqDetail['product_id'] = $itemId;
                $rfqDetail['qty_rfq'] = $get["qty"];
                $rfqDetail['um_rfq'] = $get["um"];
                // $rfqDetail['status'] = 1;
                $rfqDetail['validation_needed'] = null;

                //SAVE DETAIL
                $rfqdet = RfqDetail::where('rfq_id', $id)->where('product_id', $itemId)->update( $rfqDetail );
            }
        }

        // // $rfqDetail['rfi_detail_id'] = $request->rfi_detail_id;
        // $rfqDetail['sequence_number'] = $request->sequence_number;
        // $rfqDetail['type_product_id'] = $request->type_product_id;
        // // $rfqDetail['product_id'] = $request->product_id;
        // $rfqDetail['qty_rfq'] = $request->qty_rfq;
        // $rfqDetail['um_rfq'] = $request->um_rfq;
        //
        // //
        // // Rfq::where('id', $id)->update( $data );
        // RfqDetail::where('rfq_id', $id)->update( $rfqDetail );

        //
        return redirect( route('rfq_list') )->with('success', 'RFQ updated!');
    }

}
