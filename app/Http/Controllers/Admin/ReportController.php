<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rfq;
use App\Rfi;
use App\Supplier;
use App\Quotation;
use App\SupplierContact;
use App\PurchaseOrder;
use App\PoSupplierDetail;
use App\Items;
use App\Task;
use App\PurchaseRequest;
use App\PRDetail;
use App\PrTerm;
use App\RRDetail;
use Auth;
use PDF;
use Datatables;

class ReportController extends Controller
{
    public function reportview()
	{
        $data = PoSupplierDetail::with('item','po')->get();
        // dd($data);
        $supplier = Supplier::all();
        $supplierContact = SupplierContact::all();
        $pr = PurchaseRequest::all();
	
        return view('admin/purchase_order/report')->with('data',$data)->with('supplier',$supplier)->with('supplierContact',$supplierContact)->with('pr',$pr)->with('period')->with('until');
    }
    
    public function filter(Request $request)
	{
        $period = date('Y-m-d', strtotime(str_replace('-', '/', $request->period)));
        $until = date('Y-m-d', strtotime(str_replace('-', '/', $request->until)));
        $supplier = $request->supplier_id;
        $status = $request->status;
if ($status == 0 && $supplier == 0){
        $filter = PurchaseOrder::where('status','!=',5)->whereBetween('created_at', [$period, $until])->select('id')->get()->toArray();
}
elseif ($status == 0 && $supplier != 0){
        $filter = PurchaseOrder::where('status','!=',5)->whereBetween('created_at', [$period, $until])->where('supplier_id',$supplier)->select('id')->get()->toArray();
}
elseif ($status != 0 && $supplier == 0){
        $filter = PurchaseOrder::where('status','!=',5)->whereBetween('created_at', [$period, $until])->where('status',$status)->select('id')->get()->toArray();
}
else{
        $filter = PurchaseOrder::where('status','!=',5)->whereBetween('created_at', [$period, $until])->where('supplier_id',$supplier)->where('status',$status)->select('id')->get()->toArray();
}

       
    


//    dd($filter);
        $data = PoSupplierDetail::whereIn('pos_id', $filter)->with('item','po')->get();
   
        // foreach($data as $get){
        //     if($get->item == null){
        //         dd($get);
        //     }
        // }
        // dd($data);
        $supplier = Supplier::all();
        $supplierContact = SupplierContact::all();
        $pr = PurchaseRequest::all();

        
	
        return view('admin/purchase_order/report')->with('data',$data)->with('supplier',$supplier)->with('supplierContact',$supplierContact)->with('period',$period)->with('until',$until)->with('pr',$pr);
	}

        public function dateAnalysis()
        {
         
            return view('admin/query/date-analysis');
            
        }

        public function poData(Request $request)
	{
		$term = $request->get('term');

        $data = PurchaseOrder::where('po_number', 'LIKE', '%'.$term.'%')->with('details.item')->get();

        $results = array();

        foreach ($data as $query)
        { 
            
                $results[] = ['id' => $query->id ,'po_number' => $query->po_number, 'po_number_seq' => $query->po_number_seq, ];
               
                
          

        }
        return response()->json($results);
	}


        public function poDateDt($id)
        {
    
                $records = PoSupplierDetail::where('pos_id', $id)->with('item','po','pr')->get();
      

            return Datatables::of($records)
            ->editColumn('part_num', function ($record) {
                return $record->item->part_num;
            })
                ->editColumn('mfr', function ($record) {
                    return $record->item->mfr;
                })
                ->editColumn('part_name', function ($record) {
    
                    return $record->item->part_name;
                })
                ->editColumn('part_name', function ($record) {
    
                    return $record->item->part_name;
                })
                ->editColumn('po_num', function ($record) {
    
                    return $record->po->po_number;
                })
                ->editColumn('po_num_seq', function ($record) {
    
                        return $record->po->po_number_seq;
                    })
               
                    ->editColumn('pr_num_seq', function ($record) {
    
                        return $record->pr->pr_number_seq;
                    })
                    ->editColumn('pr_num', function ($record) {
    
                        return $record->pr->pr_number;
                    })
                    ->editColumn('pr_date', function ($record) {
    
                        return $record->pr->pr_target;
                    })
                    ->editColumn('po_date', function ($record) {
    
                        return $record->po->po_date;
                    })
                    ->editColumn('deliv_date', function ($record) {
    $rr = RRDetail::where('po_detail_id',$record->id)->select('created_at')->first();
    if($rr != null){
        return $rr->created_at;
    }else{
       
        return "not received";
    }
                     
                    })
               
                ->rawColumns(['deliv_date'])
    
                ->make(true);
        }
        

}
