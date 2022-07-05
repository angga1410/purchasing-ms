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
use Auth;
use PDF;
use Datatables;

class PrController extends Controller
{
    public function productData(Request $request)
	{
		$term = $request->get('term');

        $data = Items::where('type',0)->where('part_num', 'LIKE', '%'.$term.'%')->orWhere('part_name', 'LIKE', '%'.$term.'%')->orWhere('part_desc', 'LIKE', '%'.$term.'%')->get();

        $results = array();

        foreach ($data as $query)
        {
            $results[] = ['id' => $query->id ,'mfr' => $query->mfr, 'part_num' => $query->part_num , 'part_name' => $query->part_name,'part_desc' => $query->part_desc  ,'curr' => $query->default_curr ,'unit_cost' => $query->unit_cost,'default_um' => $query->default_um ];

        }
        return response()->json($results);
	}

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

   
    public function createDirect()
    {
        $purchase_request = PurchaseRequest::all();
        $supplier = Supplier::all();
        $supplierContact = SupplierContact::all();
        $dataall = Quotation::all()->where('approved', '1');
        $rfi = Rfi::all();
  
        //
        return view('admin/purchase_request/create-direct')->with( 'suppliers', $supplier )->with( 'dataall', $dataall )->with( 'supplierContacts', $supplierContact )->with( 'rfi', $rfi )->with( 'purchase_request', $purchase_request );
        
    }

    public function create()
    {
      //
      $purchase_request = PurchaseRequest::all();
      $supplier = Supplier::all();
      $supplierContact = SupplierContact::all();
      $dataall = Quotation::all()->where('approved', '1');
      $rfi = Rfi::all();

      //
      return view('admin/purchase_request/create')->with( 'suppliers', $supplier )->with( 'dataall', $dataall )->with( 'supplierContacts', $supplierContact )->with( 'rfi', $rfi )->with( 'purchase_request', $purchase_request );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {    $date = PurchaseRequest::orderBy('created_at', 'desc')->first();
        $current_timestamp = date("Y-m-d 00:00:00");
        $num = PurchaseRequest::where('created_at', $current_timestamp)->count();

        $input = $request->all();
        $data['pr_number'] = $request->pr_number;
        if($current_timestamp == $date['created_at']){
            $data['pr_number_seq'] = str_pad($num + 1,4,"0",STR_PAD_LEFT);
            $data2['task_desc'] =  "Purchase Request number : ".$request->pr_number.str_pad($num + 1,4,"0",STR_PAD_LEFT);
        }
        else{
            $data['pr_number_seq'] = str_pad(1,4,"0",STR_PAD_LEFT);
            $data2['task_desc'] = "Purchase Request number : ".$request->pr_number.str_pad(1,4,"0",STR_PAD_LEFT);
        }
        $data['qs_id'] = $request->qs_num;
        $data['request_from'] = $request->request_from;
        $data['purpose'] = $request->purpose;
        $data['purpose_remark'] = $request->purpose_remark;
        $data['request_mode'] = $request->request_mode;
        $data['status'] = 0;
        $data['pr_date'] = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $request->pr_date)));
        $data['pr_target'] = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $request->pr_target)));
        // $data2['start_date'] = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $request->pr_date)));
        // $data2['target_date'] = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $request->pr_target)));
        // $data2['end_date'] = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $request->pr_target)));
        // $data2['deadline'] = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $request->pr_target)));
       
        // $data['created_by'] = Auth::user()->name;
        // $data['modified_by'] = Auth::user()->name;
        // $data2['name'] = "Purchase Request ".$request->pr_date;
        // $data2['reference_type'] = "Purchasing";
        // $data2['priority'] = "Low";
        // $data2['pic'] = Auth::user()->name;
        // $data2['user_id'] = Auth::user()->id;
        // $data2['assign_to'] = Auth::user()->id;
        // $data2['assign_by'] = Auth::user()->id;
        $data['task_desc'] = $request->purpose;

        //SAVE PR
        // $prquesttask=Task::create( $data2 );
        $prquest=PurchaseRequest::create( $data );
        $Quotationdone['status'] = 2;
        Quotation::where('id', $request->qs_num)->update( $Quotationdone );


        //DETAIL
        if( !empty( $request->items ) )
        {
            //ITEMS
            foreach ($request->items as $itemId => $get)
            {
                $prDetail['mfr'] = $get["mfr"];
                $prDetail['part_name'] = $get["part_name"];
                $prDetail['part_num'] = $get["part_num"];
                $prDetail['part_desc'] = $get["part_desc"];
                $prDetail['curr'] = $get["default_curr"];
                $prDetail['unit_cost'] = $get["unit_cost"];
                $prDetail['product_id'] = $itemId;
                $prDetail['qty_pr'] = $get["qty"];
                $prDetail['um_pr'] = $get["um"];
                $prDetail['status'] = 1;
                $prDetail['balance_qty'] = $get["qty"];
                $prDetail['pr_id'] = $prquest->id;
                $prDetail['created_by'] = Auth::user()->name;
                $prDetail['modified_by'] = Auth::user()->name;

                //SAVE DETAIL
                $prdet = PRDetail::create( $prDetail );

            }
            if ($request->qs_num == '0') {

                $data = PrTerm::where('created_by', Auth::user()->name);
                $data->delete();
            }
        }

        return redirect( route('purchase_request_list') )->with('success', 'Purchase Request created');
    }



public function saveDirect(Request $request){
    $date = PurchaseRequest::orderBy('created_at', 'desc')->first();
    $current_timestamp = date("Y-m-d 00:00:00");
    $num = PurchaseRequest::where('created_at', $current_timestamp)->count();
    $pr = new PurchaseRequest;
    $pr->pr_number = $request->get("pr_number");
    if($current_timestamp == $date['created_at']){
        $pr->pr_number_seq = str_pad($num + 1,4,"0",STR_PAD_LEFT);
        // $data2['task_desc'] =  "Purchase Request number : ".$request->pr_number.str_pad($num + 1,4,"0",STR_PAD_LEFT);
    }
    else{
        $pr->pr_number_seq = str_pad(1,4,"0",STR_PAD_LEFT);
        // $data2['task_desc'] = "Purchase Request number : ".$request->pr_number.str_pad(1,4,"0",STR_PAD_LEFT);
    }
    $pr->request_from = $request->get("request_from");
    $pr->purpose = $request->get("purpose");
    $pr->purpose_remark = $request->get("purpose_remark");
    $pr->request_mode = $request->get("request_mode");
    $pr->status = 0;
    $pr->pr_date = $request->get("pr_date");
    $pr->pr_target = $request->get("pr_target");
    $pr->created_by = Auth::user()->name;
    $pr->modified_by = Auth::user()->name;
    // $data2['start_date'] = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $request->pr_date)));
    // $data2['target_date'] = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $request->pr_target)));
    // $data2['end_date'] = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $request->pr_target)));
    // $data2['deadline'] = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $request->pr_target)));
    // $data2['name'] = "Purchase Request ".$request->pr_date;
    // $data2['reference_type'] = "Purchasing";
    // $data2['priority'] = "Low";
    // $data2['pic'] = Auth::user()->name;
    // $data2['user_id'] = Auth::user()->id;
    // $data2['assign_to'] = Auth::user()->id;
    // $data2['assign_by'] = Auth::user()->id;
    $pr->save();
    // $prquesttask=Task::create( $data2 );

    $product_id  = $request->get("product_id");
		// $mfr         = $request->get("mfr");
		// $part_name   = $request->get("part_name");
		// $description = $request->get("description");
		$qty_pr      = $request->get("qty_pr");
        $um_pr          = $request->get("um_pr");
        $mfr          = $request->get("mfr");
        $part_name          = $request->get("part_name");
        $part_num          = $request->get("part_num");
        $part_desc          = $request->get("part_desc");
        $unit_cost          = $request->get("unit_cost");
        $curr          = $request->get("curr");

		for($i=0;$i<count($product_id);$i++)
        {

        	if($product_id != null && $qty_pr != null)
        	{
				$qcItemParts = new PRDetail;
                $qcItemParts->pr_id = $pr->id;
                $qcItemParts->mfr       = $mfr[$i];
                $qcItemParts->part_name       = $part_name[$i];
                $qcItemParts->part_num       = $part_num[$i];
                $qcItemParts->part_desc       = $part_desc[$i];
                $qcItemParts->curr       = $curr[$i];
                $qcItemParts->unit_cost       = $unit_cost[$i];
				$qcItemParts->product_id    = $product_id[$i];
				// $qcItemParts->mfr 		   = $mfr[$i];
				// $qcItemParts->part_name    = $part_name[$i];
				// $qcItemParts->description  = $description[$i];
				$qcItemParts->qty_pr       = $qty_pr[$i];
                $qcItemParts->um_pr           = $um_pr[$i];
                $qcItemParts->balance_qty       = $qty_pr[$i];
                $qcItemParts->created_by = Auth::user()->name;
                $qcItemParts->modified_by = Auth::user()->name;
				$qcItemParts->save();
			}
		}

    return redirect( route('purchase_request_list') )->with('success', 'Purchase Request created');

}




    public function saveItemData(Request $request)
    {
        //echo '<pre>';
        //print_r( $request->all() );
        //die();
    	// Parameters
    	  $input = $request->all();
        $data['product_id'] = $request->product_id;
        $data['qty_qs'] = $request->qty_rfi;
        $data['um_qs'] = $request->um_rfi;

        $data['status'] = 2;
      	$data['created_by'] = Auth::user()->name;

        //SAVE RFQ
        $qsdet = PrTerm::create( $data );

    	//
    	return redirect( route('create_purchase_request') )->with('success', 'Add Item Success');
    }

    public function saveItemDataUpdate(Request $request)
    {
        //echo '<pre>';
        //print_r( $request->all() );
        //die();
    	// Parameters
    	  $input = $request->all();
        $id=$request->id;
        $data['pr_id'] = $request->id;
        $data['product_id'] = $request->product_id;
        $data['qty_pr'] = $request->qty_rfq;
        $data['um_pr'] = $request->um_rfq;

      	$data['created_by'] = Auth::user()->name;
        $data['modified_by'] = Auth::user()->name;
        //SAVE RFQ
        $prdet = PrDetail::create( $data );

    	//
    	return redirect( route('view_purchase_request',$id) )->with('success', 'Add Item Success');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */

    public function list(Request $request)
    {
        //
        return view('admin/purchase_request/list');
    }

    /**
     * Get Data
     *
     * @return \Illuminate\Http\Response
     */

    public function getData(Request $request)
    {
        // Get Supplier
        $records = PurchaseRequest::query();


        return Datatables::of($records)
        ->editColumn('null', function($record) {

            return;
        })
                ->editColumn('pr_number', function($record) {

                    $prsql= PurchaseRequest::select('pr_number')->where( 'pr_number', $record->pr_number )->first();
                    return 
                        $prsql->pr_number;
                     
                })
                ->editColumn('pr_number_seq', function($record) {

                    $prnmbseq = PurchaseRequest::select('pr_number_seq')->where( 'id', $record->id )->first();
                 
                    return $prnmbseq->pr_number_seq;
                })
                ->editColumn('request_mode', function($record) {

                    return $record->request_mode ? "Routine" : "Not Routine";
                })
                ->editColumn('approved', function($record) {

                    return $record->approved ? "Approved" : "Not Approved";
                })

                ->editColumn('status', function($record) {

                    if($record->status == 0){
                        return 'Not Approved' ;
                    }
                    else if($record->status == 1){
                        return 'Outstanding' ;
                    }
                    else if($record->status == 2){
                        return 'PO Created' ;
                    }
                   
                })
                // ->editColumn('approved_by', function($record) {

                //     return $record->approved_by;
                // })
                ->editColumn('action', function($record) {

                    return '

                        &nbsp&nbsp

                     

                        &nbsp&nbsp&nbsp&nbsp&nbsp

                        <a href="'.route('view_purchase_request', $record->id).'"">
                        <img class="view-action" src="'.asset("/admin/images/view.png").'">
                    </a>

                        &nbsp&nbsp&nbsp&nbsp&nbsp

                        <a href="'.route('delete_purchase_request', $record->id).'" OnClick="return confirm(\' Are you sure to delete it \');"">
                        <img class="delete-action" src="'.asset("/admin/images/delete.png").'">
                    </a>

                    ';
                })
                ->rawColumns(['pr_number', 'action'])

            ->make(true);
    }
    public function getDataFilter(Request $request)
    {
        // Get Supplier
  if($request->status == 0){
    $records = PurchaseRequest::query();

  }else{
    $records = PurchaseRequest::where('status',$request->status)->get();
  }
       

        return Datatables::of($records)
        ->editColumn('null', function($record) {

            return;
        })
                ->editColumn('pr_number', function($record) {

                    $prsql= PurchaseRequest::select('pr_number')->where( 'pr_number', $record->pr_number )->first();
                    return 
                        $prsql->pr_number;
                     
                })
                ->editColumn('pr_number_seq', function($record) {

                    $prnmbseq = PurchaseRequest::select('pr_number_seq')->where( 'id', $record->id )->first();
                 
                    return $prnmbseq->pr_number_seq;
                })
                ->editColumn('request_mode', function($record) {

                    return $record->request_mode ? "Routine" : "Not Routine";
                })
                ->editColumn('approved', function($record) {

                    return $record->approved ? "Approved" : "Not Approved";
                })

                ->editColumn('status', function($record) {

                    if($record->status == 0){
                        return 'Not Approved' ;
                    }
                    else if($record->status == 1){
                        return 'Outstanding' ;
                    }
                    else if($record->status == 2){
                        return 'PO Created' ;
                    }
                   
                })
                // ->editColumn('approved_by', function($record) {

                //     return $record->approved_by;
                // })
                ->editColumn('action', function($record) {

                    return '

                        &nbsp&nbsp

                     

                        &nbsp&nbsp&nbsp&nbsp&nbsp

                        <a href="'.route('view_purchase_request', $record->id).'"">
                        <img class="view-action" src="'.asset("/admin/images/view.png").'">
                    </a>

                    &nbsp&nbsp&nbsp&nbsp&nbsp

                    <a href="'.route('edit_purchase_request', $record->id).'"">
                    <img class="view-action" src="' . asset("/admin/images/edit.png") . '" title="Edit PO">
                </a>
                 
                        &nbsp&nbsp&nbsp&nbsp&nbsp

                        <a href="'.route('delete_purchase_request', $record->id).'" OnClick="return confirm(\' Are you sure to delete it \');"">
                        <img class="delete-action" src="'.asset("/admin/images/delete.png").'">
                    </a>

                    ';
                })
                ->rawColumns(['pr_number', 'action'])

            ->make(true);
    }
    public function delete(Request $request, $id)
    {
        //
        // PurchaseRequest::destroy( $id );
        $prdel['status'] = 1;
        PurchaseRequest::where('id', $id)->update( $prdel );

        //
        return redirect( route('purchase_request_list') )->with('success', 'Purchase Request deleted!');
    }

    public function view(Request $request, $id)
    {
        //
        $supplier = Supplier::all();
        $supplierContact = SupplierContact::all();
        $rfq = Rfq::all();
        $dataall = PurchaseRequest::all();
        $data = PurchaseRequest::find( $id );
        $qsdata = Quotation::all();

        //
        return view('admin/purchase_request/view')->with( 'qsdata', $qsdata )->with( 'data', $data )->with( 'suppliers', $supplier )->with( 'supplierContacts', $supplierContact )->with( 'rfq', $rfq )->with( 'dataall', $dataall );
    }
    public function edit(Request $request, $id)
    {
        //
        $supplier = Supplier::all();
        $supplierContact = SupplierContact::all();
        $rfq = Rfq::all();
        $dataall = PurchaseRequest::all();
        $data = PurchaseRequest::find( $id );
        $qsdata = Quotation::all();

        //
        return view('admin/purchase_request/edit')->with( 'qsdata', $qsdata )->with( 'data', $data )->with( 'suppliers', $supplier )->with( 'supplierContacts', $supplierContact )->with( 'rfq', $rfq )->with( 'dataall', $dataall );
    }
    public function print(Request $request, $id)
    {
        //
        $supplier = Supplier::all();
        $supplierContact = SupplierContact::all();
        $rfq = Rfq::all();
        $dataall = PurchaseRequest::all();
        $data = PurchaseRequest::find( $id );
        $qsdata = Quotation::all();
        $data1 = [
            'qsdata' => $qsdata,
            'data' => $data,
            'supplier' => $supplier,
            'supplierContacts' => $supplierContact,
            'rfq' => $rfq,
            'dataall' => $dataall,
        ];

        //

        $pdf = PDF::loadView('admin/purchase_request/print' , $data1);  
        return $pdf->download("PR.pdf");
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
     

       $product_id = $request->get("product_id");
       $mfr = $request->get("mfr");
       $part_name = $request->get("part_name");
       $part_num = $request->get("part_num");
       $part_desc = $request->get("part_desc");
       $qty_pr = $request->get("qty_pr");
       $balance_qty = $request->get("balance_qty");
       $um_pr = $request->get("um_pr");
       $id = $request->get("id");
  
       for($i=0;$i<count($product_id);$i++)
       {
           if($id[$i] != 0){
            $data['qty_pr'] = $qty_pr[$i];
            $data['balance_qty'] = $balance_qty[$i];
            PRDetail::where('id', $id[$i])->update( $data );
           }else{

            $qcItemParts = new PRDetail;
            $qcItemParts->pr_id = $request->get("pr_id");
            $qcItemParts->mfr       = $mfr[$i];
            $qcItemParts->part_name       = $part_name[$i];
            $qcItemParts->part_num       = $part_num[$i];
            $qcItemParts->part_desc       = $part_desc[$i];
            $qcItemParts->product_id    = $product_id[$i];
            $qcItemParts->qty_pr       = $qty_pr[$i];
            $qcItemParts->um_pr           = $um_pr[$i];
            $qcItemParts->balance_qty       = $qty_pr[$i];
            $qcItemParts->created_by = Auth::user()->name;
            $qcItemParts->modified_by = Auth::user()->name;
            $qcItemParts->save();
           }
        }

      //
      return redirect( route('purchase_request_list') )->with('success', 'Purchase Request updated!');
    }


      public function approve()
      {
          return view('admin/purchase_request/approve');
      }


      public function viewApprove(Request $request, $id)
      {
          //
          $supplier = Supplier::all();
          $supplierContact = SupplierContact::all();
          $rfq = Rfq::all();
          $dataall = PurchaseRequest::all();
          $data = PurchaseRequest::find( $id );

          //
          return view('admin/purchase_request/viewapprove')->with( 'data', $data )->with( 'suppliers', $supplier )->with( 'supplierContacts', $supplierContact )->with( 'rfq', $rfq )->with( 'dataall', $dataall );
      }
      /**
       * Approve
       *
       * @return \Illuminate\Http\Response
       */
      public function approveStatus( $id = null, $status = null, Request $request )
      {
          if( $status == "approve" )
          {

              // Parameters
              $data['status'] = 1;
              $data['approved'] = 1;
              $data['rejected'] = 0;
              $data['reject_reason'] = '';
              $data['approved_by'] = Auth::user()->name;

              //
              PurchaseRequest::where('id', $id)->update( $data );

              //
              return redirect( route('view_purchase_request_approve',$id) )->with('success', 'Purchase Request aprroved!');
          }
          else
          {
              // Parameters
              $data['status'] = 0;
              $data['rejected'] = 1;
              $data['approved'] = 0;
              $data['reject_reason'] = $request->reason;
              $data['approved_by'] = Auth::user()->name;

              //
              PurchaseRequest::where('id', $request->id)->update( $data );

              //
              return redirect( route('view_purchase_request_approve',$request->id) )->with('success', 'Purchase Request rejected!');
          }

          //

      }

      public function getApproveData($dataid)
      {
          // Get Supplier
          $records = PurchaseRequest::query()->whereIn( 'id', explode( ',', $dataid ) );

          return Datatables::of($records)
                  ->editColumn('pr_number', function($record) {

                      return '<a href="'.route('view_purchase_request_approve', $record->id).'"">
                          #'.$record->pr_number.'
                      </a>';
                  })
                  ->editColumn('approved', function($record) {

                      return $record->approved ? "Approved" : "Not Approved";
                  })
                  ->editColumn('approved_by', function($record) {

                      return $record->approved_by;
                  })
                  ->editColumn('created_at', function($record) {

                      return $record->created_at;
                  })
                  ->editColumn('action', function($record) {
                    return '

                        &nbsp&nbsp

                        <a href="'.route('purchase_request_approve_status_approve', array($record->id, 'approve')).'">
                            <button type="button" class="btn btn-success">
                                '. ( $record->approved ? "Approved" : "Approve" ) .'
                            </button>
                        </a>

                        &nbsp&nbsp&nbsp&nbsp&nbsp

                        <a data-toggle="modal" onClick="reject(\''.trim($record->id).'\',\''.( $record->rejected ? "Rejected" : "Reject" ).'\')" data-target="'. ( $record->rejected ? "" : "#myModal" ) .'">
                            <button type="button" class="btn btn-warning">
                            '. ( $record->rejected ? "Rejected" : "Reject" ) .'
                            </button>
                        </a>

                    ';

                  })
                  ->editColumn('reason', function($record) {

                      return ( $record->rejected ? $record->reject_reason : "N/A" );
                  })
                  ->rawColumns(['pr_number','id', 'action'])

              ->make(true);
      }

      public function deleteItemDataTable(Request $request, $id)
      {
          $data = PrTerm::where('id',$id);
          $data->delete();
          // $data['status'] = 2;
          // RfiDetail::destroy( $data );

          return redirect( route('create_purchase_request') )->with('success', 'Cancel Item Success');
      }

      public function deleteItemDataTable2(Request $request, $id)
      {
          $data = PrDetail::where('id',$id);
          $data->delete();
          // $data['status'] = 2;
          // RfiDetail::destroy( $data );

          return redirect( route('purchase_request_list') )->with('success', 'Delete Item Success');
      }

      public function getApproveData2(Request $request)
      {
          // Get Supplier
          $records = PurchaseRequest::query();


          return Datatables::of($records)
                  ->editColumn('pr_number', function($record) {

                      return '<a href="'.route('view_purchase_request_approve', $record->id).'"">
                          #'.$record->pr_number.'
                      </a>';
                  })
                  ->editColumn('pr_number_seq', function($record) {

                    return '<a href="'.route('view_purchase_request_approve', $record->id).'"">
                        '.$record->pr_number_seq.'
                    </a>';
                })
                  
                  ->editColumn('approved', function($record) {

                      return $record->approved ? "Approved" : "Not Approved";
                  })
                  ->editColumn('approved_by', function($record) {

                      return $record->approved_by;
                  })
                  ->editColumn('created_at', function($record) {

                      return $record->created_at;
                  })
                  ->editColumn('action', function($record) {
                    return '
                    
                        &nbsp&nbsp
                    
                        <a href="'.route('purchase_request_approve_status_approve', array($record->id, 'approve')).'">
                            <button type="button" class="btn btn-success">
                                '. ( $record->approved ? "Approved" : "Approve" ) .'
                            </button>
                        </a>
                    
                        &nbsp&nbsp&nbsp&nbsp&nbsp
                    
                        <a data-toggle="modal" onClick="reject(\''.trim($record->id).'\',\''.( $record->rejected ? "Rejected" : "Reject" ).'\')" data-target="'. ( $record->rejected ? "" : "#myModal" ) .'">
                            <button type="button" class="btn btn-warning">
                            '. ( $record->rejected ? "Rejected" : "Reject" ) .'
                            </button>
                        </a>
                    
                    ';
                      return '

                          &nbsp&nbsp

                          <a href="#">
                              <button type="button" class="btn btn-success">
                                  '. ( $record->approved ? "Approved" : "Approve" ) .'
                              </button>
                          </a>

                          &nbsp&nbsp&nbsp&nbsp&nbsp

                          <a data-toggle="modal"">
                              <button type="button" class="btn btn-warning">
                              '. ( $record->rejected ? "Rejected" : "Reject" ) .'
                              </button>
                          </a>

                      ';
                  })
                  ->editColumn('reason', function($record) {

                      return ( $record->rejected ? $record->reject_reason : "N/A" );
                  })
                  ->rawColumns(['pr_number','pr_number_seq','id', 'action'])

              ->make(true);
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function trackingView()
    {
     
        return view('admin/purchase_request/tracking');
        
    }

}
