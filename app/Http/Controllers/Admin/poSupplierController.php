<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rfq;
use App\Supplier;
use App\Quotation;
use App\SupplierContact;
use App\PurchaseOrder;
use App\PoSupplierDetail;
use App\PurchaseRequest;
use App\Items;
use App\PRDetail;
use App\Task;
use App\SupplierAddress;
use Auth;
use Datatables;
use PDF;
use Carbon\Carbon;

class poSupplierController extends Controller
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
        $data = PurchaseOrder::all();
        $supplier = Supplier::all();
        $rfq = Rfq::all();
        $supplierContact = SupplierContact::all();
        $pr = PurchaseRequest::all()->where('status', '1');

        //
        return view('admin/purchase_order/create')->with('pr', $pr)->with('suppliers', $supplier)->with('data', $data)->with('supplierContacts', $supplierContact)->with('rfq', $rfq);
    }

    /**
     * Save
     *
     * @return \Illuminate\Http\Response
     */








    public function save(Request $request)
    {
        $date = PurchaseOrder::orderBy('created_at', 'desc')->first();
        $current_timestamp = date("Y-m-d 00:00:00");
        $num = PurchaseOrder::where('created_at', $current_timestamp)->count();
        // Parameters
        $input = $request->all();
        $data['po_number'] = $request->po_number;
        if ($current_timestamp == $date['created_at']) {
            $data['po_number_seq'] = str_pad($num + 1, 4, "0", STR_PAD_LEFT);
            $data2['task_desc'] =  "Purchase Order number : " . $request->po_number . str_pad($num + 1, 4, "0", STR_PAD_LEFT);
        } else {
            $data['po_number_seq'] = str_pad(1, 4, "0", STR_PAD_LEFT);
            $data2['task_desc'] = "Purchase Order number : " . $request->po_number . str_pad(1, 4, "0", STR_PAD_LEFT);
        }
        $data['pr_id'] = $request->pr_id;
        $data['supplier_id'] = $request->supplier_id;
        $data['supplier_contact_id'] = $request->supplier_contact_id;
        $data['shipment_term'] = $request->shipment_term;
        $data['payment_term'] = $request->payment_term;
        $data['import_via'] = $request->import_via;
        $data['cost_freight'] = $request->cost_freight;
        $data['currency'] = $request->currency;
        $data['cost_freight_amount'] = $request->cost_freight_amount;
        $data['vat'] = $request->vat;

        $data['remark'] = $request->remark;
        $data['disc_type'] = $request->disc_type;
        $data['disc_value'] = $request->disc_type;
        //$data['attached_file'] = $request->attached_file;
        $data['invoice_status'] = $request->invoice_status;
        $data['pos_supplier_rating'] = $request->pos_supplier_rating;
        $data['po_date'] = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $request->po_date)));
        $data['approved'] = 0;
        $data['verified'] = 0;
        $data['verified_by'] = $request->verified_by;
        // $data['approved_date'] = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $request->approved_date)));
        $data['created_by'] = Auth::user()->name;
        $data['modified_by'] = Auth::user()->name;

        $data2['start_date'] =  date("Y-m-d");
        $data2['target_date'] = $request->po_date;
        $data2['end_date'] = $request->po_date;
        $data2['deadline'] = $request->po_date;
        $data2['name'] = "Purchase Order " . date("Y-m-d");
        $data2['reference_type'] = "Purchasing";
        $data2['priority'] = "Low";
        $data2['pic'] = Auth::user()->name;
        $data2['user_id'] = Auth::user()->id;
        $data2['assign_to'] = Auth::user()->id;
        $data2['assign_by'] = Auth::user()->id;


        /* Handle File */

        if (!empty($request->file('attached_file'))) :

            $imageTempName = $request->file('attached_file')->getPathname();
            $imageName = $request->file('attached_file')->getClientOriginalName();
            //echo $imageName; die;
            $path = base_path() . '//uploads/images/';
            $request->file('attached_file')->move($path, $imageName);
            $data['attached_file'] = $imageName;
        /* /Handle File  */

        endif;

        //

        $Po = PurchaseOrder::create($data);
        $prquesttask = Task::create($data2);


        if (!empty($request->items)) {
            //ITEMS
            foreach ($request->items as $itemId => $get) {
                if ($get["qty"] != 0) {

                    $poDetail['pr_detail_id'] = $request->pr_id;
                    // $rfqDetail['sequence_number'] = $get["sequence_number"];
                    // $rfqDetail['type_product_id'] = $get["type_product_id"];
                    $poDetail['product_id'] = $get["id"];
                    $poDetail['qty_pos'] = $get["qty"];
                    $poDetail['qty_delivered'] = $get["qty"];
                    $poDetail['um_pos'] = $get["um"];
                    $poDetail['status'] = 1;
                    $poDetail['validation_needed'] = null;
                    $poDetail['pos_id'] = $Po->id;
                    $poDetail['curr'] = $get["curr"];
                    $poDetail['unit_price'] = $get["unit_cost"];
                    $poDetail['target_date_new'] = $get["target_date"];
                    $poDetail['created_by'] = Auth::user()->name;
                    $poDetail['modified_by'] = Auth::user()->name;

                    $balance = $get["qty"];
                    $idd['id'] = $get["id"];
                    //SAVE DETAIL
                    $podet = PoSupplierDetail::create($poDetail);
                    PRDetail::where('id', $itemId)->decrement('balance_qty', $get["qty"]);
                }
            }
        }

        $statusPR = PRDetail::where('pr_id', $request->pr_id)->count();
        $statusPO = PRDetail::where('pr_id', $request->pr_id)->where('balance_qty', '0')->count();
        if ($statusPO == $statusPR) {

            $Purchaserequestdone['status'] = 2;
            PurchaseRequest::where('id', $request->pr_id)->update($Purchaserequestdone);
        }

        //
        return redirect(route('purchase_order_list'))->with('success', 'Purchase order created');
    }

    public function savemultiple(Request $request)
    {
        // dd($request->pr_id_detail);
        $date = PurchaseOrder::orderBy('created_at', 'desc')->first();
        $current_timestamp = date("Y-m-d 00:00:00");
        $num = PurchaseOrder::where('created_at', $current_timestamp)->count();
        // Parameters
        $input = $request->all();
        $data['po_number'] = $request->po_number;
        if ($current_timestamp == $date['created_at']) {
            $data['po_number_seq'] = str_pad($num + 1, 4, "0", STR_PAD_LEFT);
            $data2['task_desc'] =  "Purchase Order number : " . $request->po_number . str_pad($num + 1, 4, "0", STR_PAD_LEFT);
        } else {
            $data['po_number_seq'] = str_pad(1, 4, "0", STR_PAD_LEFT);
            $data2['task_desc'] = "Purchase Order number : " . $request->po_number . str_pad(1, 4, "0", STR_PAD_LEFT);
        }
        $data['pr_id'] = 0;
        $data['supplier_id'] = $request->supplier_id;
        $data['supplier_contact_id'] = $request->supplier_contact_id;
        $data['shipment_term'] = $request->shipment_term;
        $data['payment_term'] = $request->payment_term;
        $data['import_via'] = $request->import_via;
        $data['cost_freight'] = $request->cost_freight;
        $data['currency'] = $request->currency;
        $data['disc_type'] = $request->disc_type;
        $data['disc_value'] = $request->disc_type;
        $data['cost_freight_amount'] = $request->cost_freight_amount;
        $data['vat'] = $request->vat;
        $data['disc_type'] = $request->disc_type;
        $data['disc_value'] = $request->disc_value;
        $data['remark'] = $request->remark;
        //$data['attached_file'] = $request->attached_file;
        $data['invoice_status'] = $request->invoice_status;
        $data['pos_supplier_rating'] = $request->pos_supplier_rating;
        $data['po_date'] = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $request->po_date)));
        $data['approved'] = 0;
        $data['verified'] = 0;
        $data['verified_by'] = $request->verified_by;
        // $data['approved_date'] = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $request->approved_date)));
        $data['created_by'] = Auth::user()->name;
        $data['modified_by'] = Auth::user()->name;

        $data2['start_date'] =  date("Y-m-d");
        $data2['target_date'] = $request->po_date;
        $data2['end_date'] = $request->po_date;
        $data2['deadline'] = $request->po_date;
        $data2['name'] = "Purchase Order " . date("Y-m-d");
        $data2['reference_type'] = "Purchasing";
        $data2['priority'] = "Low";
        $data2['pic'] = Auth::user()->name;
        $data2['user_id'] = Auth::user()->id;
        $data2['assign_to'] = Auth::user()->id;
        $data2['assign_by'] = Auth::user()->id;


        /* Handle File */

        if (!empty($request->file('attached_file'))) :

            $imageTempName = $request->file('attached_file')->getPathname();
            $imageName = $request->file('attached_file')->getClientOriginalName();
            //echo $imageName; die;
            $path = base_path() . '//uploads/images/';
            $request->file('attached_file')->move($path, $imageName);
            $data['attached_file'] = $imageName;
        /* /Handle File  */

        endif;

        //

        $Po = PurchaseOrder::create($data);
        // $prquesttask=Task::create( $data2 );

        $product_id = $request->get("product_id");
        $pr_id = $request->get("pr_id");
        $qty = $request->get("qty_pr");
        $target_date = $request->get("target_date");
        $um = $request->get("um_pr");
        $curr = $request->get("curr");
        $unit_cost = $request->get("unit_cost");
        $pr_id_detail = $request->get("pr_id_detail");

        for ($i = 0; $i < count($product_id); $i++) {
            if ($product_id[$i] != null && $qty[$i] != null && $pr_id[$i] != null && $target_date[$i] != null && $um[$i] != null && $curr[$i] != null && $unit_cost[$i] != null && $pr_id_detail[$i] != null) {

                $Detail = new PoSupplierDetail;
                $Detail->pos_id = $Po->id;
                $Detail->pr_detail_id = $pr_id[$i];
                $Detail->product_id = $product_id[$i];
                $Detail->qty_pos = $qty[$i];
                $Detail->qty_delivered = $qty[$i];
                $Detail->um_pos = $um[$i];
                $Detail->curr = $curr[$i];
                $Detail->unit_price = $unit_cost[$i];
                $Detail->target_date_new = $target_date[$i];

                $Detail->status = 1;
                $Detail->created_by =  Auth::user()->name;
                $Detail->modified_by = Auth::user()->name;
                $Detail->save();
                $balance = $qty[$i];
                PRDetail::where('id', $pr_id_detail[$i])->decrement('balance_qty', $balance);

                $statusPR = PRDetail::where('pr_id', $pr_id[$i])->count();
                $statusPO = PRDetail::where('pr_id', $pr_id[$i])->where('balance_qty', '0')->count();

                if ($statusPO == $statusPR) {

                    $Purchaserequestdone['status'] = 2;
                    PurchaseRequest::where('id', $pr_id[$i])->update($Purchaserequestdone);
                }
            }
        }
        return redirect(route('purchase_order_list'))->with('success', 'Purchase order created');
    }








    /**
     * List
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        // $current_timestamp = date("Y-m-d");
        // $ready = PurchaseOrder::where('status',0)->where('')->where('updated_at',$current_timestamp)->count();
        // dd($ready);
        //
        return view('admin/purchase_order/newlist');
    }






    /**
     * Get Data
     *
     * @return \Illuminate\Http\Response
     */
    public function getData(Request $request)
    {
        // Get Supplier

        $records = PurchaseOrder::query()->where('status', '0')->where('approved', 1);


        return Datatables::of($records)
            ->editColumn('null', function ($record) {

                return;
            })
            ->editColumn('shipment_term', function ($record) {

                return $record->shipment_term;
            })
            ->editColumn('po_number', function ($record) {

                $po_number = PurchaseOrder::select('po_number')->where('id', $record->id)->first();

                return $po_number->po_number;
            })
            ->editColumn('po_number_seq', function ($record) {

                $ponmbseq = PurchaseOrder::select('po_number_seq')->where('id', $record->id)->first();

                return $ponmbseq->po_number_seq;
            })
            ->editColumn('supplier_id', function ($record) {

                $supplier = Supplier::select('supplier_name')->where('id', $record->supplier_id)->first();
                return $supplier->supplier_name;
            })
            ->editColumn('supplier_contact_id', function ($record) {

                $contact = SupplierContact::select('contact_name')->where('id', $record->supplier_contact_id)->first();
                return $contact->contact_name;
            })
            ->editColumn('payment_term', function ($record) {

                return $record->shipment_term;
            })->editColumn('cost_freight_amount', function ($record) {

                return $record->shipment_term;
            })
            ->editColumn('import_via', function ($record) {

                if ($record->import_via == 0) {
                    return 'Local';
                }
                if ($record->import_via == 1) {
                    return 'Air';
                }
                if ($record->import_via == 2) {
                    return 'Sea';
                }
            })

            ->editColumn('status', function ($record) {

                if ($record->status == 0) {
                    return 'On-Process';
                }
                if ($record->status == 2) {
                    return 'Delivered';
                }
            })

            ->editColumn('action', function ($record) {

                return '

                        &nbsp&nbsp

                        <a href="' . route('edit_purchase_order', $record->id) . '"">
                            <img class="view-action" src="' . asset("/admin/images/edit.png") . '" title="Edit PO">
                        </a>

                        &nbsp&nbsp&nbsp&nbsp&nbsp
                        <a href="' . route('view_purchase_order', $record->id) . '"">
                        <img class="view-action" src="' . asset("/admin/images/view.png") . '" title="View PO">
                    </a>

                          &nbsp&nbsp&nbsp&nbsp&nbsp

                       
                          <a href="' . route('delete_purchase_order', $record->id) . '" OnClick="return confirm(\' Are you sure to delete it \');"">
                          <img class="delete-action" src="' . asset("/admin/images/delete.png") . '" title="Delete PO">
                      </a>
                      &nbsp&nbsp&nbsp&nbsp&nbsp
                      <a href="' . route('offer_purchase_order', $record->id) . '"">
                      <img class="view-action" src="' . asset("/admin/images/price-tag.png") . '" title="Offer PO">
                  </a>

                    ';
            })
            ->rawColumns(['po_number', 'pr_id', 'id', 'action'])

            ->make(true);
    }
    public function getDataDelivered(Request $request)
    {
        // Get Supplier

        $records = PurchaseOrder::query()->where('status', '2');


        return Datatables::of($records)
            ->editColumn('null', function ($record) {

                return;
            })
            ->editColumn('shipment_term', function ($record) {

                return $record->shipment_term;
            })
            ->editColumn('po_number', function ($record) {

                $po_number = PurchaseOrder::select('po_number')->where('id', $record->id)->first();

                return $po_number->po_number;
            })
            ->editColumn('po_number_seq', function ($record) {

                $ponmbseq = PurchaseOrder::select('po_number_seq')->where('id', $record->id)->first();

                return $ponmbseq->po_number_seq;
            })
            ->editColumn('supplier_id', function ($record) {

                $supplier = Supplier::select('supplier_name')->where('id', $record->supplier_id)->first();
                return $supplier->supplier_name;
            })
            ->editColumn('supplier_contact_id', function ($record) {

                $contact = SupplierContact::select('contact_name')->where('id', $record->supplier_contact_id)->first();
                return $contact->contact_name;
            })
            ->editColumn('payment_term', function ($record) {

                return $record->shipment_term;
            })->editColumn('cost_freight_amount', function ($record) {

                return $record->shipment_term;
            })
            ->editColumn('import_via', function ($record) {

                if ($record->import_via == 0) {
                    return 'Local';
                }
                if ($record->import_via == 1) {
                    return 'Air';
                }
                if ($record->import_via == 2) {
                    return 'Sea';
                }
            })

            ->editColumn('status', function ($record) {

                if ($record->status == 0) {
                    return 'On-Process';
                }
                if ($record->status == 2) {
                    return 'Delivered';
                }
            })

            ->editColumn('action', function ($record) {

                return '

                        &nbsp&nbsp

                     

                        &nbsp&nbsp&nbsp&nbsp&nbsp
                        <a href="' . route('view_purchase_order', $record->id) . '"">
                        <img class="view-action" src="' . asset("/admin/images/view.png") . '">
                    </a>

                    ';
            })
            ->rawColumns(['po_number', 'pr_id', 'id', 'action'])

            ->make(true);
    }



    /**
     * Delete
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        // //
        // // PurchaseOrder::destroy( $id );
        // $pr_id = PurchaseOrder::where('id', $id)->select('pr_id')->get()->toArray();
        // $qty = PoSupplierDetail::where('pos_id', $id)->select('qty_pos')->get();
        // $product_id = PoSupplierDetail::where('pos_id', $id)->select('product_id')->get()->toArray();
        // // dd($qty);
        // $pr = PurchaseRequest::where('id', $pr_id)->select('id')->get()->toArray();
        // $pr_detail = PRDetail::where('pr_id', $pr)->where('product_id', $product_id)->get();

        // foreach($product_id as $get){
        //     dd($get->id);
        // }

        // foreach ($pr_detail as $pr_details) {
        //     foreach ($qty as $qtys) {

        //         PRDetail::where('id', $pr_details->id)->increment('balance_qty', $qtys->qty_pos);
        //         // dd($ok);
        //     }
        // }

        $poDetail = PoSupplierDetail::where('pos_id', $id)->get();
        $po = PurchaseOrder::where('id', $id)->first();

        foreach ($poDetail as $get) {
            PRDetail::where('pr_id', $get->pr_detail_id)->where('product_id', $get->product_id)->increment('balance_qty', $get->qty_pos);
            $poStatus['status'] = 5;
            PoSupplierDetail::where('id', $get->id)->update($poStatus);
        }

        $podel['status'] = 5;
        PurchaseOrder::where('id', $id)->update($podel);
        $podel['status'] = 1;
        PurchaseRequest::where('id', $po->pr_id)->update($podel);


        //
        return redirect(route('purchase_order_list'))->with('success', 'Purchase order deleted!');
    }


    public function prData(Request $request)
    {
        $term = $request->get('term');

        $data = PurchaseRequest::where('pr_number', 'LIKE', '%' . $term . '%')->where('status',1)->where('approved', 1)->get();


        $results = array();

        foreach ($data as $query) {
         
                $results[] = ['pr_id' => $query->id, 'pr_number' => $query->pr_number, 'pr_number_seq' => $query->pr_number_seq, 'status' => $query->status];
         
        }

        return response()->json($results);
    }
    public function prDataInq(Request $request)
    {
        $term = $request->get('term');

        $data = PurchaseRequest::where('pr_number', 'LIKE', '%' . $term . '%')->where('status',1)->where('approved', 1)->get();


        $results = array();

        foreach ($data as $query) {
         
                $results[] = ['pr_id' => $query->id, 'pr_number' => $query->pr_number, 'pr_number_seq' => $query->pr_number_seq, 'status' => $query->status];
         
        }

        return response()->json($results);
    }

    public function getPr($id)
    {
        $find = PRDetail::where('pr_id', $id)->where('balance_qty', '!=', 0)->get();

        return $find;
    }



    /**
     * View
     *
     * @return \Illuminate\Http\Response
     */
    public function print(Request $request, $id)
    {
        //
        $supplier = Supplier::all();
        $supplierContact = SupplierContact::all();
        $data = PurchaseOrder::find($id);
        $dataall = PurchaseOrder::all();
        $pr = PurchaseRequest::all();
        $rfq = Rfq::all();
        $total = PoSupplierDetail::select('unit_price')->where('pos_id', $id)->sum();

        //
        $data1 = [
            'pr' => $pr,
            'data' => $data,
            'supplier' => $supplier,
            'supplierContacts' => $supplierContact,
            'rfq' => $rfq,
            'dataall' => $dataall,
            'total' => $total,

        ];

        return view('admin/purchase_order/print')->with('pr', $pr)->with('data', $data)->with('suppliers', $supplier)->with('supplierContacts', $supplierContact)->with('rfq', $rfq)->with('dataall', $dataall)->with('total', $total);

        //   $pdf = PDF::loadView('admin/purchase_order/print' , $data1);  
        //         return $pdf->stream("PO.pdf");
    }

    public function view(Request $request, $id)
    {
        //
        $supplier = Supplier::all();
        $address = SupplierAddress::all();
        $supplierContact = SupplierContact::all();
        $dataa = PurchaseOrder::where('id', $id)->with("supplier", "contact")->get();
        $count = PurchaseOrder::where('id', $id)->with("supplier", "contact")->first();
        $dataall = PurchaseOrder::all();
        $pr = PurchaseRequest::all();
        $rfq = Rfq::all();
        $result = PoSupplierDetail::select('unit_price', 'qty_pos')->where('pos_id', $id)->get();
        $curr = PoSupplierDetail::select('curr')->where('pos_id', $id)->first();

        $total = 0;
        foreach ($result as $totall) {

            $a = floatval($totall->qty_pos);
            $b = floatval($totall->unit_price);
            $c = ($a * $b);
            $total = $total + $c;
            // $total = floatval($total);

        }

        if ($count->disc_type == 0) {
            $total = floatval($total);
        } elseif ($count->disc_type == 1) {
            $total = floatval($total);
            $disc = ($count->disc_value * $total) / 100;
            $total = $total - $disc;
        } elseif ($count->disc_type == 2) {
            $total = floatval($total);
            $total = $total - $count->disc_value;
        }

        // dd($total);

        // $data1 = [
        //     'pr' => $pr,
        //     'data' => $data,
        //     'supplier' => $supplier,
        //     'supplierContact' => $supplierContact,
        //     'rfq' => $rfq,
        //     'dataall' => $dataall,
        // ];
        //
        return view('admin/purchase_order/view')->with('pr', $pr)->with('dataa', $dataa)->with('suppliers', $supplier)->with('supplierContacts', $supplierContact)->with('rfq', $rfq)->with('dataall', $dataall)->with('address', $address)->with('total', $total)->with('curr', $curr);

        // $pdf = PDF::loadView('admin/purchase_order/print' , $data1);  
        // return $pdf->stream();
    }

    public function edit(Request $request, $id)
    {
        //
        $supplier = Supplier::all();
        $address = SupplierAddress::all();
        $supplierContact = SupplierContact::all();
        $data = PurchaseOrder::find($id);
        $dataall = PurchaseOrder::all();
        $pr = PurchaseRequest::all();
        $rfq = Rfq::all();
        // $data1 = [
        //     'pr' => $pr,
        //     'data' => $data,
        //     'supplier' => $supplier,
        //     'supplierContact' => $supplierContact,
        //     'rfq' => $rfq,
        //     'dataall' => $dataall,
        // ];
        //
        return view('admin/purchase_order/edit')->with('pr', $pr)->with('data', $data)->with('suppliers', $supplier)->with('supplierContacts', $supplierContact)->with('rfq', $rfq)->with('dataall', $dataall)->with('address', $address);

        // $pdf = PDF::loadView('admin/purchase_order/print' , $data1);  
        // return $pdf->stream();
    }
    public function offer(Request $request, $id)
    {
        //
        $supplier = Supplier::all();
        $address = SupplierAddress::all();
        $supplierContact = SupplierContact::all();
        $data = PurchaseOrder::find($id);
        $dataall = PurchaseOrder::all();
        $pr = PurchaseRequest::all();
        $rfq = Rfq::all();
        // $data1 = [
        //     'pr' => $pr,
        //     'data' => $data,
        //     'supplier' => $supplier,
        //     'supplierContact' => $supplierContact,
        //     'rfq' => $rfq,
        //     'dataall' => $dataall,
        // ];
        //
        return view('admin/purchase_order/offer')->with('pr', $pr)->with('data', $data)->with('suppliers', $supplier)->with('supplierContacts', $supplierContact)->with('rfq', $rfq)->with('dataall', $dataall)->with('address', $address);

        // $pdf = PDF::loadView('admin/purchase_order/print' , $data1);  
        // return $pdf->stream();
    }




    /**
     * Detail
     *
     * @return \Illuminate\Http\Response
     */
    public function detail(Request $request, $id)
    {
        //
        $supplier = Supplier::all();
        $supplierContact = SupplierContact::all();
        $data = PoSupplierDetail::where('pos_id', $id)->first();
        $items = Items::all();
        $rfq = Rfq::all();

        //
        return view('admin/purchase_order/detail')->with('data', $data)->with('suppliers', $supplier)->with('supplierContacts', $supplierContact)->with('rfq', $rfq)->with('purchaseOrderId', $id)->with('items', $items);
    }





    /**
     * Save Detail
     *
     * @return \Illuminate\Http\Response
     */
    public function saveDetail(Request $request)
    {
        // Parameters
        $input = $request->all();
        $id = $request->purchase_order_id;
        $data['pos_id'] = $id;
        $data['pr_detail_id'] = $request->pr_detail_id;
        $data['sequence_number'] = $request->sequence_number;
        $data['product_id'] = $request->product_id;
        $data['qty_pos'] = $request->qty_pos;
        $data['um_pos'] = $request->um_pos;
        $data['balance_qty'] = $request->balance_qty;
        $data['curr'] = $request->curr;
        $data['unit_price'] = $request->unit_price;
        $data['have_external_reference'] = $request->have_external_reference;
        $data['target_date_original'] = $request->target_date_original;
        $data['target_date_new'] = $request->target_date_new;
        $data['last_arrival_date'] = $request->last_arrival_date;
        $data['status'] = $request->status;
        $data['created_by'] = Auth::user()->name;
        $data['modified_by'] = Auth::user()->name;

        //
        if (PoSupplierDetail::where('pos_id', $id)->exists()) {
            //
            PoSupplierDetail::where('pos_id', $id)->update($data);
        } else {
            //
            PoSupplierDetail::create($data);
        }


        //
        return redirect(route('purchase_order_list'))->with('success', 'Purchase order detail updated successfully!');
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
      //  $data['po_number'] = $request->po_number;
        $data['pr_id'] = $request->pr_id;
        $data['supplier_id'] = $request->supplier_id;
        $data['supplier_contact_id'] = $request->supplier_contact_id;
        $data['shipment_term'] = $request->shipment_term;
        $data['payment_term'] = $request->payment_term;
        $data['import_via'] = $request->import_via;
        $data['cost_freight'] = $request->cost_freight;
        $data['cost_freight_amount'] = $request->cost_freight_amount;
        $data['vat'] = $request->vat;
        $data['po_date'] = $request->target_date;
        $data['disc_type'] = $request->disc_type;
        $data['disc_value'] = $request->disc_value;
        $data['remark'] = $request->remark;
        //$data['attached_file'] = $request->attached_file;

        $data['invoice_status'] = $request->invoice_status;
        $data['pos_supplier_rating'] = $request->pos_supplier_rating;

        // $data['approved_by'] = $request->approved_by;
        // $data['approved_date'] = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $request->approved_date)));
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
        PurchaseOrder::where('id', $id)->update($data);
        return redirect(route('purchase_order_list'))->with('success', 'Purchase order updated!');
    
    }

    public function update2(Request $request){
        $id = $request->id;
        if (!empty($request->items)) {
            //ITEMS

            foreach ($request->items as $itemId => $get) {
                // dd($get['id']);

                if ($get['delete'] == 1) {
                    $pod = PoSupplierDetail::where('id', $itemId)->select('pr_detail_id','qty_pos','product_id','qty_delivered')->first();
                    $prD = PRDetail::where('pr_id',$pod->pr_detail_id)->where('product_id',$pod->product_id)->first();
                   
                     $int = (int)$pod->qty_pos;
               
                     $qtyFinal = $prD->balance_qty + $int;

                     $prdUpdate['balance_qty'] = $qtyFinal;
                     PRDetail::where('pr_id', $pod->pr_detail_id)->where('product_id', $pod->product_id)->update($prdUpdate);
                    PoSupplierDetail::where('id', $itemId)->delete();
                    $podel['status'] = 1;
                    PurchaseRequest::where('id', $prD->pr_id)->update($podel);

                } else {
                    $pod = PoSupplierDetail::where('id', $itemId)->select('pr_detail_id','qty_pos','product_id','qty_delivered')->first();
                  $prD = PRDetail::where('pr_id',$pod->pr_detail_id)->where('product_id',$pod->product_id)->first();
                   $intPR = (int)$prD->qty_pr;

                    $int = (int)$pod->qty_pos;
                    if ($get["qty"] > $intPR) {
                        return redirect(route('purchase_order_list'))->with('error', 'Purchase order cannot be update , Qty is too much !');
                    } elseif ($get["qty"] == $pod->qty_pos) {
                        $poDetail['curr'] = $get["curr"];
                        $poDetail['um_pos'] = $get["um"];
                        $poDetail['unit_price'] = $get["unit_cost"];
                        $poDetail['modified_by'] = Auth::user()->name;

                        //SAVE DETAIL
                        $podet = PoSupplierDetail::where('id', $get['id'])->update($poDetail);
                    } else {
                        $qtyPR = $int - $get["qty"];
                        $qtyFinal = $prD->balance_qty + $qtyPR;

                        $prdUpdate['balance_qty'] = $qtyFinal;
                        PRDetail::where('pr_id', $pod->pr_detail_id)->where('product_id', $pod->product_id)->update($prdUpdate);
                        $podel['status'] = 1;
                        PurchaseRequest::where('id', $pod->pr_detail_id)->update($podel);
                        $qtyB = $int - $get["qty"];
                        $qtyBFinal = $pod->qty_delivered - $qtyB;
                        $poDetail['qty_delivered'] = $qtyBFinal;
                        $poDetail['curr'] = $get["curr"];
                        $poDetail['qty_pos'] = $get["qty"];
                        $poDetail['um_pos'] = $get["um"];
                        $poDetail['unit_price'] = $get["unit_cost"];
                        $poDetail['modified_by'] = Auth::user()->name;

                        //SAVE DETAIL
                        $podet = PoSupplierDetail::where('id', $get['id'])->update($poDetail);
                    }
                }
            }
        }

        $product_id = $request->get("product_id");
        $pr_id = $request->get("pr_id");
        $qty = $request->get("qty_pr");
        $target_date = $request->get("target_date");
        $um = $request->get("um_pr");
        $curr = $request->get("curr");
        $unit_cost = $request->get("unit_cost");
        $pr_id_detail = $request->get("pr_id_detail");

        if($product_id != null){
            for ($i = 0; $i < count($product_id); $i++) {
                if ($product_id[$i] != null && $qty[$i] != null && $pr_id[$i] != null && $target_date[$i] != null && $um[$i] != null && $curr[$i] != null && $unit_cost[$i] != null && $pr_id_detail[$i] != null) {
    
                    $Detail = new PoSupplierDetail;
                    $Detail->pos_id = $id;
                    $Detail->pr_detail_id = $pr_id[$i];
                    $Detail->product_id = $product_id[$i];
                    $Detail->qty_pos = $qty[$i];
                    $Detail->qty_delivered = $qty[$i];
                    $Detail->um_pos = $um[$i];
                    $Detail->curr = $curr[$i];
                    $Detail->unit_price = $unit_cost[$i];
                    $Detail->target_date_new = $target_date[$i];
    
                    $Detail->status = 1;
                    $Detail->created_by =  Auth::user()->name;
                    $Detail->modified_by = Auth::user()->name;
                    $Detail->save();
                    $balance = $qty[$i];
                    PRDetail::where('id', $pr_id_detail[$i])->decrement('balance_qty', $balance);
    
                    $statusPR = PRDetail::where('pr_id', $pr_id[$i])->count();
                    $statusPO = PRDetail::where('pr_id', $pr_id[$i])->where('balance_qty', '0')->count();
    
                    if ($statusPO == $statusPR) {
    
                        $Purchaserequestdone['status'] = 2;
                        PurchaseRequest::where('id', $pr_id[$i])->update($Purchaserequestdone);
                    }
                }
            }
    
        }

       
        //
        return redirect(route('purchase_order_list'))->with('success', 'Purchase order updated!');
    }



    public function updateverify(Request $request)
    {
        if ($request->pr_id == null) {
            $input = $request->all();
            $id = $request->id;
            $data['po_number'] = $request->po_number;
            $data['pr_id'] = 0;
            $data['supplier_id'] = $request->supplier_id;
            $data['supplier_contact_id'] = $request->supplier_contact_id;
            $data['shipment_term'] = $request->shipment_term;
            $data['payment_term'] = $request->payment_term;
            $data['import_via'] = $request->import_via;
            $data['cost_freight'] = $request->cost_freight;
            $data['cost_freight_amount'] = $request->cost_freight_amount;
            $data['vat'] = $request->vat;

            $data['remark'] = $request->remark;
            //$data['attached_file'] = $request->attached_file;
            $data['approved'] = 0;
            $data['invoice_status'] = $request->invoice_status;
            $data['pos_supplier_rating'] = $request->pos_supplier_rating;
            $data['verified'] = $request->verified;
            // $data['approved_by'] = $request->approved_by;
            // $data['approved_date'] = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $request->approved_date)));
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
            PurchaseOrder::where('id', $id)->update($data);
        } else {
            // Parameters
            $input = $request->all();
            $id = $request->id;
            $data['po_number'] = $request->po_number;
            $data['pr_id'] = $request->pr_id;
            $data['supplier_id'] = $request->supplier_id;
            $data['supplier_contact_id'] = $request->supplier_contact_id;
            $data['shipment_term'] = $request->shipment_term;
            $data['payment_term'] = $request->payment_term;
            $data['import_via'] = $request->import_via;
            $data['cost_freight'] = $request->cost_freight;
            $data['cost_freight_amount'] = $request->cost_freight_amount;
            $data['vat'] = $request->vat;

            $data['remark'] = $request->remark;
            //$data['attached_file'] = $request->attached_file;
            $data['approved'] = 0;
            $data['invoice_status'] = $request->invoice_status;
            $data['pos_supplier_rating'] = $request->pos_supplier_rating;
            $data['verified'] = $request->verified;
            // $data['approved_by'] = $request->approved_by;
            // $data['approved_date'] = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $request->approved_date)));
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
            PurchaseOrder::where('id', $id)->update($data);
        }

        return redirect(route('purchase_order_list'))->with('success', 'Purchase order updated!');
    }


    public function updateapprove(Request $request)
    {
        if ($request->pr_id == null) {
            // Parameters
            $input = $request->all();
            $id = $request->id;
            $data['po_number'] = $request->po_number;
            $data['pr_id'] = 0;
            $data['supplier_id'] = $request->supplier_id;
            $data['supplier_contact_id'] = $request->supplier_contact_id;
            $data['shipment_term'] = $request->shipment_term;
            $data['payment_term'] = $request->payment_term;
            $data['import_via'] = $request->import_via;
            $data['cost_freight'] = $request->cost_freight;
            $data['cost_freight_amount'] = $request->cost_freight_amount;
            $data['vat'] = $request->vat;

            $data['remark'] = $request->remark;
            //$data['attached_file'] = $request->attached_file;
            $data['approved'] = $request->approved;

            $data['invoice_status'] = $request->invoice_status;
            $data['pos_supplier_rating'] = $request->pos_supplier_rating;
            $data['verified'] = 1;
            // $data['approved_by'] = $request->approved_by;
            // $data['approved_date'] = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $request->approved_date)));
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
            PurchaseOrder::where('id', $id)->update($data);
        } else {
            // Parameters
            $input = $request->all();
            $id = $request->id;
            $data['po_number'] = $request->po_number;
            $data['pr_id'] = $request->pr_id;
            $data['supplier_id'] = $request->supplier_id;
            $data['supplier_contact_id'] = $request->supplier_contact_id;
            $data['shipment_term'] = $request->shipment_term;
            $data['payment_term'] = $request->payment_term;
            $data['import_via'] = $request->import_via;
            $data['cost_freight'] = $request->cost_freight;
            $data['cost_freight_amount'] = $request->cost_freight_amount;
            $data['vat'] = $request->vat;

            $data['remark'] = $request->remark;
            //$data['attached_file'] = $request->attached_file;
            $data['approved'] = $request->approved;

            $data['invoice_status'] = $request->invoice_status;
            $data['pos_supplier_rating'] = $request->pos_supplier_rating;
            $data['verified'] = 1;
            // $data['approved_by'] = $request->approved_by;
            // $data['approved_date'] = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $request->approved_date)));
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
            PurchaseOrder::where('id', $id)->update($data);
        }

        return redirect(route('purchase_order_list'))->with('success', 'Purchase order updated!');
    }




    public function approve()
    {
        return view('admin/purchase_order/approve');
    }

    /**
     * Approve
     *
     * @return \Illuminate\Http\Response
     */
    public function approveStatus($id = null, $status = null, Request $request)
    {
        if ($status == "approve") {

            // Parameters
            $data['approved'] = 1;
            $data['rejected'] = 0;
            $data['reject_reason'] = '';
            $data['approved_by'] = Auth::user()->name;

            //
            PurchaseOrder::where('id', $id)->update($data);

            //
            return redirect(route('view_purchase_order_approve', $id))->with('success', 'Purchase Order aprroved!');
        } else {
            // Parameters
            $data['rejected'] = 1;
            $data['approved'] = 0;
            $data['reject_reason'] = $request->reason;
            $data['approved_by'] = Auth::user()->name;

            //
            PurchaseOrder::where('id', $request->id)->update($data);

            //
            return redirect(route('view_purchase_order_approve', $request->id))->with('success', 'Purchase Order rejected!');
        }

        //

    }

    public function getApproveData($dataid)
    {
        // Get Supplier
        $records = PurchaseOrder::query()->whereIn('id', explode(',', $dataid));


        return Datatables::of($records)
            ->editColumn('po_number', function ($record) {

                return $record->po_number;
            })
            ->editColumn('approved', function ($record) {

                return $record->approved ? "Approved" : "Not Approved";
            })
            ->editColumn('approved_by', function ($record) {

                return $record->approved_by;
            })
            ->editColumn('created_at', function ($record) {

                return $record->created_by;
            })
            ->editColumn('action', function ($record) {

                return '

                            &nbsp&nbsp

                            <a href="' . route('purchase_order_approve_status_approve', array($record->id, 'approve')) . '">
                                <button type="button" class=" ' . ($record->approved ? "btn btn-approved" : "btn btn-success") . ' ">
                                    ' . ($record->approved ? "Approved" : "Approve") . '
                                </button>
                            </a>

                            &nbsp&nbsp&nbsp&nbsp&nbsp

                            <a  data-toggle="modal" onClick="reject(\'' . trim($record->id) . '\',\'' . ($record->rejected ? "Rejected" : "Reject") . '\')" data-target="' . ($record->rejected ? "" : "#myModal") . '">
                                <button type="button" class="btn btn-warning">
                                ' . ($record->rejected ? "Rejected" : "Reject") . '
                                </button>
                            </a>

                        ';
            })
            ->editColumn('reason', function ($record) {

                return ($record->rejected ? $record->reject_reason : "N/A");
            })
            ->rawColumns(['id', 'action'])

            ->make(true);
    }

    public function viewApprove(Request $request, $id)
    {
        //
        $supplier = Supplier::all();
        $supplierContact = SupplierContact::all();
        $rfq = Rfq::all();
        $dataall = PurchaseOrder::all();
        $pr = PurchaseRequest::all();
        $data = PurchaseOrder::find($id);

        //
        return view('admin/purchase_order/viewapprove')->with('pr', $pr)->with('data', $data)->with('suppliers', $supplier)->with('supplierContacts', $supplierContact)->with('rfq', $rfq)->with('dataall', $dataall);
    }

    public function getApproveData2(Request $request)
    {
        // Get Supplier
        $records = PurchaseOrder::query()->where('verified', '1')->where('approved', 0);


        return Datatables::of($records)
            ->editColumn('po_number', function ($record) {

                return
                    $record->po_number;
            })
            ->editColumn('po_number_seq', function ($record) {

                return
                    $record->po_number_seq;
            })
            ->editColumn('approved', function ($record) {

                return $record->approved ? "Approved" : "Not Approved";
            })
            ->editColumn('approved_by', function ($record) {

                return $record->created_by;
            })
            ->editColumn('created_at', function ($record) {


                return  date('j F Y', strtotime($record->created_at));
            })
            ->editColumn('action', function ($record) {
                // return '
                //
                //     &nbsp&nbsp
                //
                //     <a href="'.route('quotation_approve_status_approve', array($record->id, 'approve')).'">
                //         <button type="button" class="btn btn-success">
                //             '. ( $record->approved ? "Approved" : "Approve" ) .'
                //         </button>
                //     </a>
                //
                //     &nbsp&nbsp&nbsp&nbsp&nbsp
                //
                //     <a data-toggle="modal" onClick="reject(\''.trim($record->id).'\',\''.( $record->rejected ? "Rejected" : "Reject" ).'\')" data-target="'. ( $record->rejected ? "" : "#myModal" ) .'">
                //         <button type="button" class="btn btn-warning">
                //         '. ( $record->rejected ? "Rejected" : "Reject" ) .'
                //         </button>
                //     </a>
                //
                // ';

                return '

                        &nbsp&nbsp

                        <a href="' . route('view_purchase_order_approve', $record->id) . '"">
                            <img class="view-action" src="' . asset("/admin/images/view.png") . '">
                        </a>

                      

                    ';
            })
            ->editColumn('reason', function ($record) {
                if ($record->reject_reason == null) {
                    return ($record->rejected ? $record->reject_reason : "N/A");
                } else {
                    return $record->reject_reason;
                }
                return ($record->rejected ? $record->reject_reason : "N/A");
            })
            ->rawColumns(['po_number', 'po_number_seq', 'id', 'action'])

            ->make(true);
    }









    public function verify()
    {
        return view('admin/purchase_order/verify');
    }

    /**
     * Verify
     *
     * @return \Illuminate\Http\Response
     */
    public function verifyStatus($id = null, $status = null, Request $request)
    {
        if ($status == "verify") {

            // Parameters
            $data['verified'] = 1;
            $data['rejected'] = 0;
            $data['reject_reason'] = '';
            $data['verified_by'] = Auth::user()->name;

            //
            PurchaseOrder::where('id', $id)->update($data);

            //
            return redirect(route('view_purchase_order_verify', $id))->with('success', 'Purchase Order aprroved!');
        } else {
            // Parameters
            $data['rejected'] = 1;
            $data['verified'] = 0;
            $data['reject_reason'] = $request->reason;
            $data['verified_by'] = Auth::user()->name;

            //
            PurchaseOrder::where('id', $request->id)->update($data);

            //
            return redirect(route('view_purchase_order_verify', $request->id))->with('success', 'Purchase Order rejected!');
        }

        //

    }

    public function getVerifyData($dataid)
    {
        // Get Supplier
        $records = PurchaseOrder::query()->whereIn('id', explode(',', $dataid));


        return Datatables::of($records)
            ->editColumn('po_number', function ($record) {

                return $record->po_number;
            })
            ->editColumn('verified', function ($record) {

                return $record->verified ? "verified" : "Not verified";
            })
            ->editColumn('verified_by', function ($record) {

                return $record->verified_by;
            })
            ->editColumn('created_at', function ($record) {

                return $record->created_at;
            })
            ->editColumn('action', function ($record) {

                return '

                            &nbsp&nbsp

                            <a href="' . route('purchase_order_verify_status_verify', array($record->id, 'verify')) . '">
                                <button type="button" class="btn btn-success">
                                    ' . ($record->verified ? "verified" : "verify") . '
                                </button>
                            </a>

                            &nbsp&nbsp&nbsp&nbsp&nbsp

                            <a data-toggle="modal" onClick="rejectv(\'' . trim($record->id) . '\',\'' . ($record->rejected ? "Rejected" : "Reject") . '\')" data-target="' . ($record->rejected ? "" : "#myModal") . '">
                                <button type="button" class="btn btn-warning">
                                ' . ($record->rejected ? "Rejected" : "Reject") . '
                                </button>
                            </a>

                        ';
            })
            ->editColumn('reason', function ($record) {

                return ($record->rejected ? $record->reject_reason : "N/A");
            })
            ->rawColumns(['id', 'action'])

            ->make(true);
    }

    public function viewVerify(Request $request, $id)
    {
        //
        $supplier = Supplier::all();
        $supplierContact = SupplierContact::all();
        $rfq = Rfq::all();
        $dataall = PurchaseOrder::all();
        $pr = PurchaseRequest::all();
        $data = PurchaseOrder::find($id);

        //
        return view('admin/purchase_order/viewverify')->with('pr', $pr)->with('data', $data)->with('suppliers', $supplier)->with('supplierContacts', $supplierContact)->with('rfq', $rfq)->with('dataall', $dataall);
    }

    public function getverifyData2(Request $request)
    {
        // Get Supplier
        $records = PurchaseOrder::query()->where('verified', '0');


        return Datatables::of($records)
            ->editColumn('po_number', function ($record) {

                return
                    $record->po_number;
            })
            ->editColumn('po_number_seq', function ($record) {

                return
                    $record->po_number_seq;
            })
            ->editColumn('verified', function ($record) {

                return $record->verified ? "verified" : "Not verified";
            })
            ->editColumn('verified_by', function ($record) {

                return $record->created_by;
            })
            ->editColumn('created_at', function ($record) {

                return  date('j F Y', strtotime($record->created_at));
            })
            ->editColumn('action', function ($record) {
                // return '
                //
                //     &nbsp&nbsp
                //
                //     <a href="'.route('quotation_verify_status_verify', array($record->id, 'verify')).'">
                //         <button type="button" class="btn btn-success">
                //             '. ( $record->verified ? "verified" : "verify" ) .'
                //         </button>
                //     </a>
                //
                //     &nbsp&nbsp&nbsp&nbsp&nbsp
                //
                //     <a data-toggle="modal" onClick="reject(\''.trim($record->id).'\',\''.( $record->rejected ? "Rejected" : "Reject" ).'\')" data-target="'. ( $record->rejected ? "" : "#myModal" ) .'">
                //         <button type="button" class="btn btn-warning">
                //         '. ( $record->rejected ? "Rejected" : "Reject" ) .'
                //         </button>
                //     </a>
                //
                // ';
                return '

                      &nbsp&nbsp

                      <a href="' . route('view_purchase_order_verify', $record->id) . '"">
                          <img class="view-action" src="' . asset("/admin/images/view.png") . '">
                      </a>

                    

                  ';
            })
            ->editColumn('reason', function ($record) {

                return ($record->rejected ? $record->reject_reason : "N/A");
            })
            ->rawColumns(['po_number', 'po_number_seq', 'id', 'action'])

            ->make(true);
    }

    public function prDataTracking(Request $request)
    {
        $term = $request->get('term');

        $data = PurchaseRequest::where('pr_number', 'LIKE', '%' . $term . '%')->get();


        $results = array();

        foreach ($data as $query) {
          
                $results[] = ['pr_id' => $query->id, 'pr_number' => $query->pr_number, 'pr_number_seq' => $query->pr_number_seq, 'status' => $query->status];
           
        }

        return response()->json($results);
    }

    public function getPODetail($id)
    {
        $find = PoSupplierDetail::where('pr_detail_id',$id)->with('item','po')->get();

        return $find;
    }

}
