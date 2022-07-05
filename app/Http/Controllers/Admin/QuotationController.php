<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rfq;
use App\Supplier;
use App\Quotation;
use App\QuotationDetail;
use App\SupplierContact;
use App\Items;
use App\Rfi;
use Auth;
use Datatables;

class QuotationController extends Controller
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
        $rfi = Rfi::all()->where('status', '0');
        $supplierContact = SupplierContact::all();

        //
        return view('admin/quotation/create')->with( 'suppliers', $supplier )->with( 'supplierContacts', $supplierContact )->with( 'rfi', $rfi );
    }

    /**
     * Save
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
    	// Parameters
        $date = Quotation::orderBy('created_at', 'desc')->first();
        $current_timestamp = date("Y-m-d 00:00:00");
        $num = Quotation::where('created_at', $current_timestamp)->count();
        // Parameters
        $input = $request->all();
 
        $data['qs_num'] = $request->qs_num;
        if ($current_timestamp == $date['created_at']) {
            $data['qs_num_seq'] = str_pad($num + 1, 4, "0", STR_PAD_LEFT);
           
        } else {
            $data['qs_num_seq'] = str_pad(1, 4, "0", STR_PAD_LEFT);
        }
        $data['qs_date'] = $request->qs_date;
        $data['rfi_id'] = $request->rfi_id;
        $data['supplier_id'] = $request->supplier_id;
        $data['supplier_contact_id'] = $request->supplier_contact_id;
        $data['remark'] = $request->remark;
        $data['disc_type'] = $request->disc_type;
        $data['disc_value'] = $request->disc_value;
        $data['termcondition'] = $request->termcondition;
    	$quotation=Quotation::create( $data );
    //   $rfqdone['status'] = 2;
    //   Rfq::where('id', $request->rfq_id)->update( $rfqdone );



    $product_id = $request->get("product_id");
    $qty = $request->get("qty");
    $curr = $request->get("curr");
    $unit_price = $request->get("unit_price");
    $lead_time = $request->get("lead_time");

    for ($i = 0; $i < count($product_id); $i++) {
        if ($product_id[$i] != null && $qty[$i] != null ) {

            $Detail = new QuotationDetail;
            $Detail->qs_id = $quotation->id;
            $Detail->product_id = $product_id[$i];
            $Detail->qty_qs = $qty[$i];
            $Detail->curr = $curr[$i];
            $Detail->unit_price = $unit_price[$i];
            $Detail->lead_time = $lead_time[$i];
            $Detail->status = 0;
            $Detail->save();
           
        }
    }

    	//
    	return redirect( route('quotation_list') )->with('success', 'Quotation created');
    }

    /**
     * List
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        //
        return view('admin/quotation/list');
    }

    /**
     * Get Data
     *
     * @return \Illuminate\Http\Response
     */
    public function getData(Request $request)
    {
        // Get Supplier
        $records = Quotation::query()->where('status', '0')->with('supplier','contact');

        return Datatables::of($records)
                ->editColumn('qs_num', function($record) {

                    return '<a href="'.route('view_quotation', $record->id).'"">
                        '.$record->qs_num.''.$record->qs_num_seq.'
                    </a>';
                })
                ->editColumn('approved', function($record) {

                    return $record->approved ? "Approved" : "Not Approved";
                })
                ->editColumn('approved_by', function($record) {

                    return $record->approved_by;
                })
                ->editColumn('supplier_id', function($record) {
                    return $record->supplier->supplier_name;
                   
                })
                ->editColumn('supplier_contact_id', function($record) {
                    return $record->contact->contact_name;
                
                })
              
                ->editColumn('action', function($record) {

                    return '

                        &nbsp&nbsp

                        <a href="'.route('view_quotation', $record->id).'"">
                            <img class="view-action" src="'.asset("/admin/images/view.png").'">
                        </a>

                        &nbsp&nbsp&nbsp&nbsp&nbsp

                        <a href="'.route('delete_quotation', $record->id).'" OnClick="return confirm(\' Are you sure to delete it \');"">
                            <img class="delete-action" src="'.asset("/admin/images/delete.png").'">
                        </a>

                    ';
                })
                ->rawColumns(['qs_num','id', 'action'])

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
        $quotedel['status'] = 1;
        Quotation::where('id', $id)->update( $quotedel );
        // Quotation::destroy( $id );

        //
        return redirect( route('quotation_list') )->with('success', 'Quotation deleted!');
    }

    /**
     * View
     *
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request, $id)
    {
        //
        $data = Quotation::where('id', $id)->first();
        $supplier = Supplier::all();
        $quo = Quotation::all()->where('status', '0');
        $supplierContact = SupplierContact::all();

        //
        return view('admin/quotation/view')->with( 'quo', $quo )->with( 'suppliers', $supplier )->with( 'supplierContacts', $supplierContact )->with( 'data', $data );
    }

    public function viewApprove(Request $request, $id)
    {
        //
        $supplier = Supplier::all();
        $supplierContact = SupplierContact::all();
        $rfq = Rfq::all();
        $dataall = Quotation::all();
        $data = Quotation::find( $id );

        //
        return view('admin/quotation/viewapprove')->with( 'data', $data )->with( 'suppliers', $supplier )->with( 'supplierContacts', $supplierContact )->with( 'rfq', $rfq )->with( 'dataall', $dataall );
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
        $data['qs_num'] = $request->qs_num;
        $data['qs_date'] = $date = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $request->qs_date)));
        $data['rfq_id'] = $request->rfq_id;
        $data['supplier_id'] = $request->supplier_id;
        $data['supplier_contact_id'] = $request->supplier_contact_id;
        $data['shipment_term'] = $request->shipment_term;
        $data['payment_term'] = $request->payment_term;
        $data['import_via'] = $request->import_via;
        $data['cost_freight'] = $request->cost_freight;
        $data['cost_freight_amount'] = $request->cost_freight_amount;
        $data['qs_rating'] = $request->qs_rating;
        $data['remark'] = $request->remark;
        $data['discount'] = $request->discount;
        $data['tax'] = $request->tax;
        $data['delivertime'] = $request->delivertime;

        $data['status'] = $request->status;
        $data['created_by'] = Auth::user()->name;
        $data['modified_by'] = Auth::user()->name;

        /* Handle File */

        // if( !empty( $request->file('attached_file') ) ):
        //
        //     $imageTempName = $request->file('attached_file')->getPathname();
        //     $imageName = $request->file('attached_file')->getClientOriginalName();
        //     //echo $imageName; die;
        //     $path = base_path() . '//uploads/images/';
        //     $request->file('attached_file')->move($path , $imageName);
        //     $data['attached_file'] = $imageName;
        //     /* /Handle File  */
        //
        // endif;

        //
        Quotation::where('id', $id)->update( $data );

        if( !empty( $request->items ) )
        {
            //ITEMS
            foreach ($request->items as $itemId => $get)
            {
                // $rfqDetail['sequence_number'] = $get["sequence_number"];
                // $rfqDetail['type_product_id'] = $get["type_product_id"];
                $quotationDetail['qty_qs'] = $get["qty"];
                $quotationDetail['um_qs'] = $get["um"];
                $quotationDetail['status'] = 1;
                $quotationDetail['unit_price'] = $get["unit_cost"];
                $quotationDetail['modified_by'] = Auth::user()->name;

                //SAVE DETAIL
                $quotationdet = QuotationDetail::where('qs_id', $id)->where('product_id', $itemId)->update( $quotationDetail );
            }
        }
        //
        return redirect( route('quotation_list') )->with('success', 'Quotation updated!');
    }

    public function approve()
    {
        return view('admin/quotation/approve');
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
            $data['approved'] = 1;
            $data['rejected'] = 0;
            $data['reject_reason'] = '';
            $data['approved_by'] = Auth::user()->name;

            //
            Quotation::where('id', $id)->update( $data );

            //
            return redirect( route('view_quotation_approve',$id) )->with('success', 'Quotation aprroved!');
        }
        else
        {
            // Parameters
            $data['rejected'] = 1;
            $data['approved'] = 0;
            $data['reject_reason'] = $request->reason;
            $data['approved_by'] = Auth::user()->name;

            //
            Quotation::where('id', $request->id)->update( $data );

            //
            return redirect( route('view_quotation_approve',$request->id) )->with('success', 'Quotation rejected!');
        }

        //

    }

    public function getApproveData($dataid)
    {
        // Get Supplier
        $records = Quotation::query()->whereIn( 'id', explode( ',', $dataid ) );

        return Datatables::of($records)
                ->editColumn('qs_num', function($record) {

                    return '<a href="'.route('view_quotation_approve', $record->id).'"">
                        #'.$record->qs_num.'
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

                      <a href="'.route('quotation_approve_status_approve', array($record->id, 'approve')).'">
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
                ->rawColumns(['qs_num','id', 'action'])

            ->make(true);
    }

    public function getApproveData2(Request $request)
    {
        // Get Supplier
        $records = Quotation::query();


        return Datatables::of($records)
                ->editColumn('qs_num', function($record) {

                    return '<a href="'.route('view_quotation_approve', $record->id).'"">
                        #'.$record->qs_num.'
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
                  
                      <a href="'.route('quotation_approve_status_approve', array($record->id, 'approve')).'">
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
                ->rawColumns(['qs_num','id', 'action'])

            ->make(true);
    }

    public function getDataQuo($id)
{

    // $records = Items::query()->whereIn('id', explode(',', $productIds));

    $records = QuotationDetail::where('qs_id',$id)->with('item')->get();
    // dd($records);
    // foreach ($records as $get){
    //     dd($get->item->mfr);
    // }



    return Datatables::of($records)
    ->editColumn('id', function ($record) {

        return "<input type='number' name='id_q[]' class='form-control m-input' style='width: 80px;' value='".$record->id."'>";
    })
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

            return "<input type='number' name='qty[]' class='form-control m-input' style='width: 100px;' value='".$record->qty_qs."'>";
        })
        ->editColumn('um', function ($record) {

            return $record->item->default_um;
        })

        ->editColumn('price', function ($record) {

            return "<input type='number' name='unit_price[]' class='form-control m-input' style='width: 130px;' value='".$record->unit_price."'>";
        })
        ->editColumn('curr', function ($record) {

            return "<input type='text' name='curr[]' class='form-control m-input' style='width: 130px;' value='".$record->curr."'>";
        })
        ->editColumn('lead_time', function ($record) {

            return "<input type='text' name='lead_time[]' class='form-control m-input' style='width: 180px;' value='".$record->lead_time."'>";
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

        ->rawColumns(['id','pr', 'pr_seq', 'type_product_id', 'sequence_number', 'id', 'curr', 'qty', 'um', 'unit_cost','price','lead_time','product_id'])

        ->make(true);

    //  $total = Items::query()->select('unit_cost')->whereIn( 'id', explode( ',', $productIds ) );
    //    $total = $total->toArray();
    //    $total = sum($total);
    //    return $total;

}

    /**
     * Save
     *
     * @return \Illuminate\Http\Response
     */
    public function saveUpdate(Request $request)
    {
        $id = $request->id;
        $data['disc_type'] = $request->disc_type;
        $data['disc_value'] = $request->disc_value;
        $data['remark'] = $request->remark;
        $data['termcondition'] = $request->termcondition;
        Quotation::where('id', $id)->update( $data );

  
    $qty = $request->get("qty");
    $curr = $request->get("curr");
    $unit_price = $request->get("unit_price");
    $lead_time = $request->get("lead_time");
    $id_q = $request->get("id_q");



    for ($i = 0; $i < count($qty); $i++) {
        if ($id_q[$i] != null && $qty[$i] != null ) {
            $id_q = $id[$i];
            $data2['qty_qs'] = $qty[$i];
            $data2['curr'] = $curr[$i];
            $data2['unit_price'] = $unit_price[$i];
            $data2['lead_time'] = $lead_time[$i];
            QuotationDetail::where('id', $id_q)->update( $data2 );
    
           
        }
    }

    	//
    	return redirect( route('quotation_list') )->with('success', 'Quotation created');
    }
}
