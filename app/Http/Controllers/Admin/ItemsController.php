<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Items;
use App\ItemsReq;
use App\Hscode;
use App\Rfi;
use App\Rfq;
use App\Supplier;
use App\SupplierContact;
use App\RfqDetail;
use App\RfqTerm;
use App\RfiDetail;
use App\Quotation;
use App\QuotationDetail;
use App\PurchaseRequest;
use App\PRDetail;
use App\PurchaseOrder;
use App\PoSupplierDetail;
use App\PrTerm;
use Auth;
use Datatables;

class ItemsController extends Controller
{


    public $rfiIdGlobal = '';
    public $gPIds = '';
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
        return view('admin/items/create');
    }


    /**
     * Get items by the customer
     *
     * @return \Illuminate\Http\Response
     */
    public function getItemsByPo($poId)
    {
        //
        $allIds = [];
        $response = [];
        $pod = PurchaseOrder::find($poId)->details;

        //
        foreach ($pod as $get) {
            $allIds[] = $get->product_id;
        }
        //
        $allIdsString = implode(',', $allIds);
        $response['productIds'] = $allIdsString;
        $response['poId'] = $poId;

        return $response;
    }

    public function getItemsByPr($prId)
    {
        //
        $allIds = [];
        $response = [];
        $prd = PurchaseRequest::find($prId)->details;

        //
        foreach ($prd as $get) {
            $allIds[] = $get->product_id;
        }

        //
        $allIdsString = implode(',', $allIds);
        $response['productIds'] = $allIdsString;
        $response['prId'] = $prId;

        return $response;
    }

    public function getItemsByQs3()
    {
        $allIds = [];
        $allIdsTerm = [];
        $response = [];
        $user = Auth::user()->name;
        $qsterm = PrTerm::select()->where('created_by', $user)->get();
        // $rfqterm = RfqTerm::find( $user );

        //
        foreach ($qsterm as $get) {
            $allIds[] = $get->product_id;
            // $allIdsTerm[] = $get->id;
        }

        $allIdsString = implode(',', $allIds);
        // $allIdsTermString = implode(',', $allIdsTerm);
        $response['productIds'] = $allIdsString;
        $response['id'] = $user;
        return $response;
    }

    public function getItemsByQs2($qsId)
    {
        //
        $allIds = [];
        $response = [];
        $qsd = Quotation::find($qsId)->details;

        //
        foreach ($qsd as $get) {
            $allIds[] = $get->product_id;
        }

        //
        $allIdsString = implode(',', $allIds);
        $response['productIds'] = $allIdsString;
        $response['qsId'] = $qsId;

        return $response;
    }

    public function getItemsByQs($qsId)
    {
        //
        $allIds = [];
        $response = [];
        $qsd = Quotation::find($qsId)->details;

        //
        foreach ($qsd as $get) {
            $allIds[] = $get->product_id;
        }

        //
        $allIdsString = implode(',', $allIds);
        $response['productIds'] = $allIdsString;
        $response['qsId'] = $qsId;

        return $response;
    }

    public function getItemsByRfq($rfqId)
    {
        //
        $allIds = [];
        $response = [];
        $rfqd = Rfq::find($rfqId)->details;
        $rfqsuppid = Rfq::select('supplier_id')->where('id', $rfqId)->first()->supplier_id;
        $suppliername = Supplier::select('supplier_name')->where('id', $rfqsuppid)->first()->supplier_name;

        $rfqconsuppid = Rfq::select('supplier_contact_id')->where('id', $rfqId)->first()->supplier_contact_id;
        $consuppliername = SupplierContact::select('contact_name')->where('id', $rfqconsuppid)->first()->contact_name;

        //
        foreach ($rfqd as $get) {
            $allIds[] = $get->product_id;
        }

        //
        $allIdsString = implode(',', $allIds);
        $response['productIds'] = $allIdsString;
        $response['rfqId'] = $rfqId;
        $response['rfqsuppid'] = $rfqsuppid;
        $response['suppname'] = $suppliername;
        $response['rfqconsuppid'] = $rfqconsuppid;
        $response['consuppname'] = $consuppliername;
        return $response;
    }

    public function getItemsByCustomer($rfiId)
    {
        //
        $allIds = [];
        $response = [];
        $rfid = Rfi::find($rfiId)->details;

        //
        foreach ($rfid as $get) {
            $allIds[] = $get->product_id;
        }

        //
        $allIdsString = implode(',', $allIds);
        $response['productIds'] = $allIdsString;
        $response['rfiId'] = $rfiId;
        return $response;
    }

    public function getItemsByCustomer2()
    {
        //
        $allIds = [];
        $allIdsTerm = [];
        $response = [];
        $user = Auth::user()->name;
        $rfqterm = RfqTerm::select()->where('created_by', $user)->get();
        // $rfqterm = RfqTerm::find( $user );

        //
        foreach ($rfqterm as $get) {
            $allIds[] = $get->product_id;
            // $allIdsTerm[] = $get->id;
        }

        $allIdsString = implode(',', $allIds);
        // $allIdsTermString = implode(',', $allIdsTerm);
        $response['productIds'] = $allIdsString;
        $response['id'] = $user;
        return $response;
    }

    public function getItemsByCustomer3($id)
    {
        //
        $allIds = [];
        $allIdsTerm = [];
        $response = [];
        // $user= Auth::user()->name;
        // $rfqterm = RfqDetail::select()->where( 'created_by', $user )->get();
        $rfqid = Rfq::find($id)->details;

        //
        foreach ($rfqid as $get) {
            $allIds[] = $get->product_id;
            // $allIdsTerm[] = $get->id;
        }

        $allIdsString = implode(',', $allIds);
        // $allIdsTermString = implode(',', $allIdsTerm);
        $response['productIds'] = $allIdsString;
        $response['id'] = $id;
        return $response;
    }

    /**
     * Save
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        // Parameters
        $input = $request->all();
        $data['mfr'] = $request->mfr;
        $data['category_part_num'] = $request->category_part_num;
        $data['part_num'] = $request->part_num;
        $data['part_name'] = $request->part_name;
        $data['part_desc'] = $request->part_desc;
        $data['default_um'] = $request->default_um;
        $data['default_curr'] = $request->default_curr;
        $data['unit_cost'] = $request->unit_cost;
        $data['sell_price'] = $request->sell_price;
        $data['width'] = $request->width;
        $data['volume'] = $request->volume;
        $data['weight'] = $request->weight;
        $data['break_down_price'] = $request->break_down_price;
        $data['item_price'] = $request->item_price;
        $data['price_date'] = $request->price_date;
        $data['lead_time'] = $request->lead_time;
        $data['price_valid_until'] = $request->price_valid_until;
        $data['item_need_qc'] = $request->item_need_qc;
        $data['status'] = $request->status;
        $data['created_by'] = Auth::user()->name;
        $data['modified_by'] = Auth::user()->name;

        //
        $items = Items::create($data);


        //
        return redirect(route('items_list'))->with('success', 'Item created');
    }

    /**
     * List
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        //
        return view('admin/items/list');
    }
    public function requestlist(Request $request)
    {
        //
        return view('admin/items_request/list');
    }

    public function getDataNotif($nama)
    {
        // Get Supplier
        $records = ItemsReq::where('request_by', $nama)->where('status', 0)->get();

        return Datatables::of($records)

            ->editColumn('mfr', function ($record) {

                return "<input type='text' class='form-control'  value='$record->mfr' name='mfr[]'>";
            })
            ->editColumn('part_num', function ($record) {

                return "<input type='text' class='form-control'  value='$record->part_num' name='part_num[]'>";
            })
            ->editColumn('part_name', function ($record) {

                return "<input type='text' class='form-control'  value='$record->part_name' name='part_name[]'>";
            })
            ->editColumn('part_desc', function ($record) {

                return "<input type='text' class='form-control'  value='$record->part_desc' name='part_desc[]'>";
            })
            ->editColumn('default_um', function ($record) {

                return "<input type='text' class='form-control'  value='$record->default_um' name='default_um[]'>";
            })
            ->editColumn('request_by', function ($record) {

                return $record->request_by;
            })
            ->editColumn('action', function ($record) {

                return '

                        &nbsp&nbsp

                      

                      
                        <button class="btn btn-danger"  OnClick="sent(' . $record->id . ')" >Approve</button>
                  

                    ';
            })
            ->editColumn('items', function ($record) {
                return "<input type='text' class='form-control'  value='$record->id' name='id[]'>";
            })


            ->rawColumns(['id', 'action', 'items', 'part_num', 'part_name', 'part_desc', 'mfr', 'default_um'])

            ->make(true);
    }
    public function getDataReq(Request $request)
    {
        // Get Supplier
        $records = ItemsReq::where('status', 0)->get();

        return Datatables::of($records)
            ->editColumn('id', function ($record) {

                return $record->id;
            })
            ->editColumn('mfr', function ($record) {

                return $record->mfr;
            })
            ->editColumn('part_num', function ($record) {

                return $record->part_num;
            })
            ->editColumn('part_name', function ($record) {

                return $record->part_name;
            })
            ->editColumn('part_desc', function ($record) {

                return $record->part_desc;
            })
            ->editColumn('request_by', function ($record) {

                return $record->request_by;
            })
            ->editColumn('action', function ($record) {

                return '

                        &nbsp&nbsp

                        <a href="' . route('save_item_req', $record->id) . '"">
                            <button class="btn btn-success" >Approve</button>
                        </a>

                        &nbsp&nbsp&nbsp&nbsp&nbsp

                        <a href="' . route('reject_item_req', $record->id) . '" OnClick="return confirm(\' Are you sure to reject it \');"">
                        <button class="btn btn-danger" >Reject</button>
                    </a>

                    ';
            })


            ->rawColumns(['id', 'action'])

            ->make(true);
    }
    public function rejectItemsReq(Request $request, $id)
    {

        $status['status'] = 1;
        $statusreq = ItemsReq::where('id', $id)->update($status);
        return redirect(route('items_list_request'))->with('success', 'Item Rejected');
    }
    public function saveItemsReq(Request $request, $id)
    {
        $items = ItemsReq::where('id', $id)->first();
        $data['mfr'] = $items->mfr;
        $data['category_part_num'] = 1;
        $data['part_num'] = $items->part_num;
        $data['part_name'] = $items->part_name;
        $data['part_desc'] = $items->part_desc;
        $data['default_um'] = $items->default_um;
        $data['default_curr'] = 0;
        $data['unit_cost'] = 0;
        $data['sell_price'] = 0;
        $data['break_down_price'] = 0;
        $data['status'] = "Outstanding";
        $data['created_by'] = Auth::user()->name;
        $data['modified_by'] = Auth::user()->name;
        $status['status'] = 1;
        //
        $item = Items::create($data);
        $statusreq = ItemsReq::where('id', $id)->update($status);
        return redirect(route('items_list_request'))->with('success', 'Item created');
    }

    public function saveItemsNotif(Request $request)
    {
        $product = $request->get("id");
        $mfr = $request->get("mfr");
        $part_num = $request->get("part_num");
        $part_name = $request->get("part_name");
        $part_desc = $request->get("part_desc");
        $default_um = $request->get("default_um");

        for ($i = 0; $i < count($product); $i++) {
            if ($product[$i] != null && $mfr[$i]) {

                $data['mfr'] = $mfr[$i];
                $data['category_part_num'] = 1;
                $data['part_num'] = $part_num[$i];
                $data['part_name'] = $part_name[$i];
                $data['part_desc'] = $part_desc[$i];
                $data['default_um'] = $default_um[$i];
                $data['default_curr'] = 0;
                $data['unit_cost'] = 0;
                $data['sell_price'] = 0;
                $data['break_down_price'] = 0;
                $data['status'] = "Outstanding";
                $data['created_by'] = Auth::user()->name;
                $data['modified_by'] = Auth::user()->name;
                $status['status'] = 1;
                //
                $item = Items::create($data);
                $statusreq = ItemsReq::where('id', $product[$i])->update($status);
            }
        }
        return redirect(route('items_list_request'))->with('success', 'Item created');
    }
    /**
     * Get Data
     *
     * @return \Illuminate\Http\Response
     */
    public function getData(Request $request)
    {
        // Get Supplier
        $records = Items::query()->where('type',0);

        return Datatables::of($records)
            ->editColumn('mfr', function ($record) {

                return $record->mfr;
            })
            ->editColumn('part_num', function ($record) {

                return $record->part_num;
            })
            ->editColumn('part_name', function ($record) {

                return $record->part_name;
            })
            ->editColumn('part_desc', function ($record) {

                return $record->part_desc;
            })
            ->editColumn('unit_cost', function ($record) {

                return $record->unit_cost;
            })
            ->editColumn('sell_price', function ($record) {

                return $record->sell_price;
            })
            ->editColumn('action', function ($record) {

                return '

                        &nbsp&nbsp

                        <a href="' . route('view_item', $record->id) . '"">
                            <img class="view-action" src="' . asset("/admin/images/view.png") . '">
                        </a>

                        &nbsp&nbsp&nbsp&nbsp&nbsp

                        <a href="' . route('delete_item', $record->id) . '" OnClick="return confirm(\' Are you sure to delete it \');"">
                            <img class="delete-action" src="' . asset("/admin/images/delete.png") . '">
                        </a>

                    ';
            })


            ->rawColumns(['id', 'action'])

            ->make(true);
    }


    public function itemnoffer($id)
    {
        // Get Supplier


        $records = PoSupplierDetail::where('id', $id)->get();
        return Datatables::of($records)
        
            ->editColumn('id', function ($record) {

                return $record->product_id;
            })
            ->editColumn('mfr', function ($record) {
                $mfr = Items::where('id', $record->product_id)->select('mfr')->first();
                return $mfr->mfr;
            })
            ->editColumn('part_num', function ($record) {
                $part_num = Items::where('id', $record->product_id)->select('part_num')->first();
                return $part_num->part_num;
            })
            ->editColumn('part_name', function ($record) {
                $part_name = Items::where('id', $record->product_id)->select('part_name')->first();
                return $part_name->part_name;
            })
            ->editColumn('part_desc', function ($record) {
                $part_desc = Items::where('id', $record->product_id)->select('part_desc')->first();
                return $part_desc->part_desc;
            })
            ->editColumn('qty', function ($record) {
             
                return $record->qty_pos;
            })
            ->editColumn('curr', function ($record) {
             
                return $record->curr;
            })
            ->editColumn('price', function ($record) {
             
                return $record->unit_price;
            })

            ->rawColumns(['id', 'mfr','part_num','part_name','part_desc','qty','curr','proce'])

            ->make(true);
    }

    /**
     * Item Table
     *
     * @return \Illuminate\Http\Response
     */
    public function itemTableRfq($productIds, $rfqId)
    {

        // Get Supplier
        $records = Items::query()->whereIn('id', explode(',', $productIds));

        $this->rfqIdGlobal = $rfqId;
        $this->gPIds = $productIds;

        return Datatables::of($records, $rfqId)
            ->editColumn('mfr', function ($record) {

                return $record->mfr;
            })
            ->editColumn('part_num', function ($record) {

                return $record->part_num;
            })
            ->editColumn('part_name', function ($record) {

                return $record->part_name;
            })
            ->editColumn('part_desc', function ($record) {

                return $record->part_desc;
            })
            ->editColumn('qty', function ($record) {

                $qty = RfqDetail::select('qty_rfq')->where('rfq_id', $this->rfqIdGlobal)->where('product_id', $record->id)->first()->qty_rfq;

                return "<input id='quantityrfq' oninput='oninput()' class='item-um' type='text' value='$qty' name='items[" . $record->id . "][qty]'>";
                // return $qty;
            })
            ->editColumn('um', function ($record) {

                $um = RfqDetail::select('um_rfq')->where('rfq_id', $this->rfqIdGlobal)->where('product_id', $record->id)->first()->um_rfq;

                return "<input class='item-um' type='text' value='$um' name='items[" . $record->id . "][um]' readonly>";
            })

            ->editColumn('unit_cost', function ($record) {

                $unit_cost = $record->unit_cost;
                return "<input id='price' class='item-um' type='text' value='$unit_cost' name='items[" . $record->id . "][unit_cost]'>";
                // return $itemprice;
            })

            // ->editColumn('total', function($record) {
            //
            //     $itemprice = $record->item_price;
            //     $qty = RfqDetail::select('qty_rfq')->where( 'rfq_id', $this->rfqIdGlobal )->where( 'product_id', $record->id )->first()->qty_rfq;
            //     $total = $itemprice*$qty;
            //     return '<span id="total"></span>';
            // })

            ->rawColumns(['type_product_id', 'sequence_number', 'id', 'qty', 'um', 'delete', 'unit_cost', 'total'])

            ->make(true);
    }

    /**
     * Item Table
     *
     * @return \Illuminate\Http\Response
     */

    public function itemTableQs($productIds, $qsId)
    {

        $records = Items::query()->whereIn('id', explode(',', $productIds));

        $this->qsIdGlobal = $qsId;
        $this->gPIds = $productIds;

        return Datatables::of($records, $qsId)
            ->editColumn('mfr', function ($record) {

                return $record->mfr;
            })
            ->editColumn('part_num', function ($record) {

                return $record->part_num;
            })
            ->editColumn('part_name', function ($record) {

                return $record->part_name;
            })
            ->editColumn('part_desc', function ($record) {

                return $record->part_desc;
            })
            ->editColumn('qty', function ($record) {

                $qty = QuotationDetail::select('qty_qs')->where('qs_id', $this->qsIdGlobal)->where('product_id', $record->id)->first()->qty_qs;

                return "<input class='item-um' type='text' value='$qty' name='items[" . $record->id . "][qty]'>";
                // return $qty;
            })
            ->editColumn('um', function ($record) {

                $um = QuotationDetail::select('um_qs')->where('qs_id', $this->qsIdGlobal)->where('product_id', $record->id)->first()->um_qs;

                return "<input class='item-um' type='text' value='$um' name='items[" . $record->id . "][um]' readonly>";
            })

            ->editColumn('unit_cost', function ($record) {

                $unit_cost = $record->unit_cost;
                return "<input class='item-um' type='text' value='$unit_cost' name='items[" . $record->id . "][unit_cost]'>";
                // return $itemprice;
            })

            // ->editColumn('total', function($record) {
            //
            //     $itemprice = $record->item_price;
            //     $qty = QuotationDetail::select('qty_qs')->where( 'qs_id', $this->qsIdGlobal )->where( 'product_id', $record->id )->first()->qty_qs;
            //     $total = $itemprice*$qty;
            //     return $total;
            // })

            ->rawColumns(['type_product_id', 'sequence_number', 'id', 'qty', 'um', 'delete', 'unit_cost', 'total'])

            ->make(true);
    }

    public function itemTableQs2($productIds, $qsId)
    {

        $records = Items::query()->whereIn('id', explode(',', $productIds));

        $this->qsIdGlobal = $qsId;
        $this->gPIds = $productIds;

        return Datatables::of($records, $qsId)
            ->editColumn('mfr', function ($record) {

                return "<input class='item-um' type='text' value=." . $record->mfr . " name='items[" . $record->id . "][mfr]'>";
            })
            ->editColumn('part_num', function ($record) {

                $part_num = $record->part_num;
                return "<input class='item-um' type='text' value='$part_num' name='items[" . $record->id . "][part_num]'>";
            })
            ->editColumn('part_name', function ($record) {

                $part_name = $record->part_name;
                return "<input class='item-um' type='text' value='$part_name' name='items[" . $record->id . "][part_name]'>";
            })
            ->editColumn('part_desc', function ($record) {

                $part_desc = $record->part_desc;
                return "<input class='item-um' type='text' value='$part_desc' name='items[" . $record->id . "][part_desc]'>";
            })

            ->editColumn('unit_cost', function ($record) {

                $unit_cost = $record->unit_cost;
                return "<input class='item-um' type='text' value='$unit_cost' name='items[" . $record->id . "][unit_cost]'>";
                // return $itemprice;
            })


            ->editColumn('default_curr', function ($record) {

                $default_curr = $record->default_curr;
                return "<input class='item-um' type='text' value='$default_curr' name='items[" . $record->id . "][default_curr]'>";
            })
            ->editColumn('qty', function ($record) {

                $qty = QuotationDetail::select('qty_qs')->where('qs_id', $this->qsIdGlobal)->where('product_id', $record->id)->first()->qty_qs;

                return "<input class='item-um' type='text' value='$qty' name='items[" . $record->id . "][qty]'>";
                // return $qty;
            })


            ->editColumn('um', function ($record) {

                $um = QuotationDetail::select('um_qs')->where('qs_id', $this->qsIdGlobal)->where('product_id', $record->id)->first()->um_qs;

                return "<input class='item-um' type='text' value='$um' name='items[" . $record->id . "][um]' readonly>";
            })



            ->editColumn('delete', function ($record) {
                $eIds = explode(',', $this->gPIds);
                $arr = array_merge(array_diff($eIds, array($record->id)));
                $iIds = implode(',', $arr);
                if ($iIds == null) {
                    $iIds = 0;
                }

                return '

                         <a class="cursor" OnClick="deleteItemTemp(' . $iIds . ')">
                             <img class="delete-action" src="' . asset("/admin/images/delete.png") . '">
                         </a>

                     ';
            })

            ->rawColumns(['id', 'mfr', 'part_num', 'part_name', 'part_desc', 'default_curr', 'unit_cost', 'qty', 'um', 'delete'])

            ->make(true);
    }

    public function itemTablePr($productIds, $prId)
    {

        $records = Items::query()->whereIn('id', explode(',', $productIds));

        $this->qsIdGlobal = $prId;
        $this->gPIds = $productIds;

        return Datatables::of($records, $prId)
            ->editColumn('mfr', function ($record) {

                return $record->mfr;
            })
            ->editColumn('part_num', function ($record) {

                return $record->part_num;
            })
            ->editColumn('part_name', function ($record) {

                return $record->part_name;
            })
            ->editColumn('part_desc', function ($record) {

                return $record->part_desc;
            })
            ->editColumn('qty', function ($record) {

                $qty = PRDetail::select('qty_pr')->where('pr_id', $this->qsIdGlobal)->where('product_id', $record->id)->first()->qty_pr;

                return "<input class='item-um' type='text' value='$qty' name='items[" . $record->id . "][qty]'>";
                // return $qty;
            })
            ->editColumn('um', function ($record) {

                $um = PRDetail::select('um_pr')->where('pr_id', $this->qsIdGlobal)->where('product_id', $record->id)->first()->um_pr;

                return "<input class='item-um' type='text' value='$um' name='items[" . $record->id . "][um]' readonly>";
            })

            ->editColumn('delete', function ($record) {

                $qsid = PurchaseRequest::select('qs_id')->where('id', $this->qsIdGlobal)->first()->qs_id;
                if ($qsid == '0') {
                    $id = PrDetail::select('id')->where('pr_id', $this->qsIdGlobal)->where('product_id', $record->id)->first();

                    return '
                           &nbsp&nbsp&nbsp&nbsp&nbsp
                           <a class="cursor" href="' . route('itemdatadeletetable2', $id) . '" OnClick="return confirm(\' Are you sure to delete it \');"">
                               <img class="delete-action" src="' . asset("/admin/images/delete.png") . '">
                           </a>

                       ';
                } else {
                    return ' ';
                }

                // $id = RfiDetail::select('id')->where( 'rfi_id', $this->rfiIdGlobal )->where( 'product_id', $record->id )->first()->id;
                //
                // return '
                //     &nbsp&nbsp&nbsp&nbsp&nbsp
                //     <a class="cursor" href="'.route('itemdatadeletetable', $id).'" OnClick="return confirm(\' Are you sure to delete it \');"">
                //         <img class="delete-action" src="'.asset("/admin/images/delete.png").'">
                //     </a>
                //
                // ';
            })

            ->rawColumns(['type_product_id', 'sequence_number', 'id', 'qty', 'um', 'delete'])

            ->make(true);
    }
   

    public function itemTablePrEdit($prId)
    {

        // $records = Items::query()->whereIn('id', explode(',', $productIds));

        $records = PRDetail::query()->where('pr_id',$prId);

 
       

        // dd($records);

        // $this->qsIdGlobal = $prId;
        // $this->gPIds = $productIds;

        return Datatables::of($records, $prId)
        ->editColumn('id', function ($record) {

            return "<input class='item-um' type='text' style='width: 50px;' value='$record->id' name='id[]'>";
        })
        ->editColumn('product_id', function ($record) {

            return "<input class='item-um' type='hidden' style='width: 50px;' value='".$record->item->id."' name='product_id[]'>";
        })
            ->editColumn('mfr', function ($record) {

                return "<input class='item-um' readonly type='text' style='width: 100px;border:none;' value='".$record->item->mfr."' name='mfr[]'>";
            })
            ->editColumn('part_num', function ($record) {

                return "<input class='item-um' readonly type='text' style='width: 100px;border:none;' value='".$record->item->part_num."' name='part_num[]'>";
            })
            ->editColumn('part_name', function ($record) {

                return "<input class='item-um' readonly type='text' style='width: 100px;border:none;' value='".$record->item->part_name."' name='part_name[]'>";
            })
            ->editColumn('part_desc', function ($record) {
                return "<textarea class='item-um' style='width: 180px;border:none;' name='part_desc[]'>".$record->item->part_desc."</textarea>";
            })
            ->editColumn('unit_cost', function ($record) {

                return "<input class='item-um' readonly style='width: 180px;border:none;' value='".$record->item->unit_cost."' name='unit_cost[]'>";
            })
            ->editColumn('um', function ($record) {

                return "<input class='item-um' readonly style='width: 180px;border:none;' value='".$record->item->default_um."' name='um_pr[]'>";
            })
          
            ->editColumn('qty', function ($record) {

                return "<input class='item-um' type='text' style='width: 130px;' value='$record->qty_pr' name='qty_pr[]'>";
            })

            ->editColumn('balance_qty', function ($record) {

                return "<input class='item-um' type='text' style='width: 130px;' value='$record->balance_qty' name='balance_qty[]'>";
            })

            // ->editColumn('delete', function ($record) {

            //     $qsid = PurchaseRequest::select('qs_id')->where('id', $this->qsIdGlobal)->first()->qs_id;
            //     if ($qsid == '0') {
            //         $id = PrDetail::select('id')->where('pr_id', $this->qsIdGlobal)->where('product_id', $record->id)->first();

            //         return '
            //                &nbsp&nbsp&nbsp&nbsp&nbsp
            //                <a class="cursor" href="' . route('itemdatadeletetable2', $id) . '" OnClick="return confirm(\' Are you sure to delete it \');"">
            //                    <img class="delete-action" src="' . asset("/admin/images/delete.png") . '">
            //                </a>

            //            ';
            //     } else {
            //         return ' ';
            //     }

            //     // $id = RfiDetail::select('id')->where( 'rfi_id', $this->rfiIdGlobal )->where( 'product_id', $record->id )->first()->id;
            //     //
            //     // return '
            //     //     &nbsp&nbsp&nbsp&nbsp&nbsp
            //     //     <a class="cursor" href="'.route('itemdatadeletetable', $id).'" OnClick="return confirm(\' Are you sure to delete it \');"">
            //     //         <img class="delete-action" src="'.asset("/admin/images/delete.png").'">
            //     //     </a>
            //     //
            //     // ';
            // })

            ->rawColumns(['mfr','part_name','part_num','part_desc','unit_cost', 'sequence_number', 'id', 'qty', 'um', 'delete','product_id','balance_qty'])

            ->make(true);
    }
    public function itemTablePr2($prId)
    {

        // $records = Items::query()->whereIn('id', explode(',', $productIds));
        $checkPR = PurchaseRequest::where('id',$prId)->first();

        if ($checkPR->status != 2){
            $records = PRDetail::query()->where('pr_id',$prId)->where('balance_qty','!=',0);
        }
        else{
            $records = PRDetail::query();
        }

       

        // dd($records);

        // $this->qsIdGlobal = $prId;
        // $this->gPIds = $productIds;

        return Datatables::of($records, $prId)
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
            ->editColumn('unit_cost', function ($record) {

                return $record->item->unit_cost;
            })
            ->editColumn('sell_price', function ($record) {

                return $record->item->sell_price;
            })
            ->editColumn('qty', function ($record) {

                return $record->qty_pr;
            })

            // ->editColumn('delete', function ($record) {

            //     $qsid = PurchaseRequest::select('qs_id')->where('id', $this->qsIdGlobal)->first()->qs_id;
            //     if ($qsid == '0') {
            //         $id = PrDetail::select('id')->where('pr_id', $this->qsIdGlobal)->where('product_id', $record->id)->first();

            //         return '
            //                &nbsp&nbsp&nbsp&nbsp&nbsp
            //                <a class="cursor" href="' . route('itemdatadeletetable2', $id) . '" OnClick="return confirm(\' Are you sure to delete it \');"">
            //                    <img class="delete-action" src="' . asset("/admin/images/delete.png") . '">
            //                </a>

            //            ';
            //     } else {
            //         return ' ';
            //     }

            //     // $id = RfiDetail::select('id')->where( 'rfi_id', $this->rfiIdGlobal )->where( 'product_id', $record->id )->first()->id;
            //     //
            //     // return '
            //     //     &nbsp&nbsp&nbsp&nbsp&nbsp
            //     //     <a class="cursor" href="'.route('itemdatadeletetable', $id).'" OnClick="return confirm(\' Are you sure to delete it \');"">
            //     //         <img class="delete-action" src="'.asset("/admin/images/delete.png").'">
            //     //     </a>
            //     //
            //     // ';
            // })

            ->rawColumns(['type_product_id', 'sequence_number', 'id', 'qty', 'um', 'delete'])

            ->make(true);
    }

    public function itemTablePo($productIds, $prId)
    {
        $hscode = Hscode::all();
        $records = PRDetail::query()->where('pr_id', $prId)->where('balance_qty', '!=', '0');

        $this->qsIdGlobal = $prId;
        $this->gPIds = $productIds;

        return Datatables::of($records, $prId)
            ->editColumn('id', function ($record) {

                $id =  $record->product_id;

                return "<input class='form-control' type='text' value='$id' name='items[" . $record->id . "][id]'>";
                // return $qty;
            })
            ->editColumn('mfr', function ($record) {

                return $record->mfr;
            })
            ->editColumn('part_num', function ($record) {

                return $record->part_num;
            })
            ->editColumn('part_name', function ($record) {

                return $record->part_name;
            })
            ->editColumn('part_desc', function ($record) {

                return $record->part_desc;
            })
            ->editColumn('qty', function ($record) {

                $qty = $record->balance_qty;

                return "<input class='form-control' type='text' value='$qty' name='items[" . $record->id . "][qty]'>";
                // return $qty;
            })

            ->editColumn('um', function ($record) {

                $um =  $record->um_pr;
                return "<input class='form-control' type='text' value='$um' name='items[" . $record->id . "][um]' readonly>";
            })

            ->editColumn('curr', function ($record) {

                $curr =  $record->curr;
                return "<input class='form-control' type='text' value='$curr' name='items[" . $record->id . "][curr]' >";
            })


            ->editColumn('unit_cost', function ($record) {

                $unit_cost = $record->unit_cost;
                return "<input id='price' class='form-control' type='text' value='$unit_cost' name='items[" . $record->id . "][unit_cost]'>";
                // return $itemprice;
            })

            //  ->editColumn('tax', function($record) {
            //     // $hscode = Hscode::get();
            //     $tax = $record->tax;
            //     return "
            //     <select required='' name='import_vi' class='form-control'>
            //     <option value='0'>Local</option>
            //     <option value='1'>Air</option>
            //     <option value='2'>Sea</option>
            // </select>
            //   ";
            //     // return $itemprice;
            // })

            ->editColumn('target_date', function ($record) {
                $target_date = PurchaseRequest::select('pr_target')->where('id', $record->pr_id)->first()->pr_target;

                return "<input class='item-um' type='date' value='$target_date' name='items[" . $record->id . "][target_date]' style='width:130px;border:none;'>";
            })
            // ->editColumn('pr_num', function($record) {
            //     $pr_num = PurchaseRequest::select('pr_number')->where( 'id', $record->pr_id )->first()->pr_number;
            //     $pr_num_seq = PurchaseRequest::select('pr_number_seq')->where( 'id', $record->pr_id )->first()->pr_number_seq;

            //     return "<input class='item-um' type='text' value='$pr_num $pr_num_seq' name='items[".$record->id."][target_date]'>";
            // })
            ->editColumn('delete', function ($record) {
                $eIds = explode(',', $this->gPIds);
                $arr = array_merge(array_diff($eIds, array($record->id)));
                $iIds = implode(',', $arr);
                if ($iIds == null) {
                    $iIds = 0;
                }

                return '

                        <a class="cursor" OnClick="deleteItemTemp(this)">
                            <img class="delete-action" src="' . asset("/admin/images/delete.png") . '">
                        </a>

                    ';
            })

            ->rawColumns(['type_product_id', 'sequence_number', 'id', 'qty', 'um', 'delete', 'curr', 'unit_cost', 'tax', 'target_date', 'delete'])

            ->make(true);
    }

    public function itemTablePo2($poId)
    {

        $records = PoSupplierDetail::query()->where('pos_id',$poId)->with('item');
                // dd($records);

        // $this->poIdGlobal = $poId;
        // $this->gPIds = $productIds;

        return Datatables::of($records)
        ->editColumn('id', function ($record) {
            return "<input class='item-um' type='text' value='$record->id' name='items[" . $record->id . "][id]' readonly>";
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

                // $qty = PoSupplierDetail::select('qty_pos')->where('pos_id', $this->poIdGlobal)->where('product_id', $record->id)->first()->qty_pos;

                return "<input class='item-um' type='text' style='width: 130px;' value='$record->qty_pos' name='items[" . $record->id . "][qty]'>";
                // return $qty;
            })
            ->editColumn('um', function ($record) {

                // $um = PoSupplierDetail::select('um_pos')->where('pos_id', $this->poIdGlobal)->where('product_id', $record->id)->first()->um_pos;

                return "<input class='item-um' type='text' value='$record->um_pos' name='items[" . $record->id . "][um]' readonly>";
            })
            ->editColumn('curr', function ($record) {

                // $um = PoSupplierDetail::select('curr')->where('pos_id', $this->poIdGlobal)->where('product_id', $record->id)->first()->curr;

                return "<input class='item-um' type='text' value='$record->curr' name='items[" . $record->id . "][curr]'>";
            })

            ->editColumn('unit_cost', function ($record) {

                // $unit_cost = PoSupplierDetail::select('unit_price')->where('pos_id', $this->poIdGlobal)->where('product_id', $record->id)->first()->unit_price;;
                return "<input class='item-um' type='text' style='width: 200px;' value='$record->unit_price' name='items[" . $record->id . "][unit_cost]'>";
                // return $itemprice;
            })

            ->editColumn('delete', function ($record) {


                return "<input class='item-um' type='hidden' value='0' name='items[" . $record->id . "][delete]'>
                    <input class='item-um' type='checkbox' value='1' name='items[" . $record->id . "][delete]'>";
                // return $itemprice;
            })

            // ->editColumn('total', function($record) {
            //
            //     $itemprice = $record->item_price;
            //     $qty = QuotationDetail::select('qty_qs')->where( 'qs_id', $this->qsIdGlobal )->where( 'product_id', $record->id )->first()->qty_qs;
            //     $total = $itemprice*$qty;
            //     return $total;
            // })

            ->rawColumns(['type_product_id', 'sequence_number', 'id', 'qty', 'um', 'curr', 'unit_cost', 'delete'])

            ->make(true);
    }
    public function itemTablePoOffer($productIds, $poId)
    {

        $records = Items::query()->whereIn('id', explode(',', $productIds));

        $this->poIdGlobal = $poId;
        $this->gPIds = $productIds;

        return Datatables::of($records, $poId)
            ->editColumn('mfr', function ($record) {

                return $record->mfr;
            })
            ->editColumn('part_num', function ($record) {

                return $record->part_num;
            })
            ->editColumn('part_name', function ($record) {

                return $record->part_name;
            })
            ->editColumn('part_desc', function ($record) {

                return $record->part_desc;
            })
            ->editColumn('qty', function ($record) {

                $qty = PoSupplierDetail::select('qty_pos')->where('pos_id', $this->poIdGlobal)->where('product_id', $record->id)->first()->qty_pos;

                return "<input class='item-um' type='text' value='$qty' name='items[" . $record->id . "][qty]'>";
                // return $qty;
            })
            ->editColumn('um', function ($record) {

                $um = PoSupplierDetail::select('um_pos')->where('pos_id', $this->poIdGlobal)->where('product_id', $record->id)->first()->um_pos;

                return "<input class='item-um' type='text' value='$um' name='items[" . $record->id . "][um]' readonly>";
            })
            ->editColumn('curr', function ($record) {

                $um = PoSupplierDetail::select('curr')->where('pos_id', $this->poIdGlobal)->where('product_id', $record->id)->first()->curr;

                return "<input class='item-um' type='text' value='$um' readonly>";
            })

            ->editColumn('unit_cost', function ($record) {

                $unit_cost = PoSupplierDetail::select('unit_price')->where('pos_id', $this->poIdGlobal)->where('product_id', $record->id)->first()->unit_price;;
                return "<input class='item-um' type='text' value='$unit_cost' name='items[" . $record->id . "][unit_cost]'>";
                // return $itemprice;
            })

            ->editColumn('delete', function ($record) {


                return "<input class='item-um' type='hidden' value='0' name='items[" . $record->id . "][delete]'>
                    <input class='item-um form-control' type='checkbox' value='1' name='items[" . $record->id . "][delete]'>";
                // return $itemprice;
            })
            ->editColumn('offer', function ($record) {
                $id = PoSupplierDetail::select('id')->where('pos_id', $this->poIdGlobal)->where('product_id', $record->id)->first()->id;

                return "   <div class='btn btn-success m-btn--air m-btn--custom' onclick='offer(" . $id . ")'>Offer</div>";
                // return $itemprice;
            })

            // ->editColumn('total', function($record) {
            //
            //     $itemprice = $record->item_price;
            //     $qty = QuotationDetail::select('qty_qs')->where( 'qs_id', $this->qsIdGlobal )->where( 'product_id', $record->id )->first()->qty_qs;
            //     $total = $itemprice*$qty;
            //     return $total;
            // })

            ->rawColumns(['type_product_id', 'sequence_number', 'id', 'qty', 'um', 'curr', 'unit_cost', 'delete', 'offer'])

            ->make(true);
    }


    public function itemTablePo3($productIds, $poId)
    {

        // $records = Items::query()->whereIn('id', explode(',', $productIds));

        $records = PoSupplierDetail::query()->where('pos_id',$poId)->with('item')->with('pr');
        // dd($records);
        // foreach ($records as $get){
        //     dd($get->item->mfr);
        // }

        $this->poIdGlobal = $poId;
        $this->gPIds = $productIds;

        return Datatables::of($records, $poId)

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
            ->editColumn('curr', function ($record) {
                return $record->curr;
               
            })
            ->editColumn('qty', function ($record) {

                return $record->qty_pos;
            })
            ->editColumn('um', function ($record) {

                return $record->um_pos;
            })

            ->editColumn('unit_cost', function ($record) {

                return $record->unit_price;
            })
            ->editColumn('pr', function ($record) {

                return $record->pr->pr_number;
            })
            ->editColumn('pr_seq', function ($record) {



                return $record->pr->pr_number_seq;
            })

            // ->editColumn('total', function($record) {
            //
            //     $itemprice = $record->item_price;
            //     $qty = QuotationDetail::select('qty_qs')->where( 'qs_id', $this->qsIdGlobal )->where( 'product_id', $record->id )->first()->qty_qs;
            //     $total = $itemprice*$qty;
            //     return $total;
            // })

            ->rawColumns(['pr', 'pr_seq', 'type_product_id', 'sequence_number', 'id', 'curr', 'qty', 'um', 'unit_cost'])

            ->make(true);

        //  $total = Items::query()->select('unit_cost')->whereIn( 'id', explode( ',', $productIds ) );
        //    $total = $total->toArray();
        //    $total = sum($total);
        //    return $total;

    }



    public function itemTable($productIds, $rfiId)
    {

        // Get Supplier
        $records = Items::query()->whereIn('id', explode(',', $productIds));

        $this->rfiIdGlobal = $rfiId;
        $this->gPIds = $productIds;

        return Datatables::of($records, $rfiId)
            ->editColumn('mfr', function ($record) {

                return $record->mfr;
            })
            ->editColumn('part_num', function ($record) {

                return $record->part_num;
            })
            ->editColumn('part_name', function ($record) {

                return $record->part_name;
            })
            ->editColumn('part_desc', function ($record) {

                return $record->part_desc;
            })
            ->editColumn('qty', function ($record) {

                $qty = RfiDetail::select('qty_rfi')->where('rfi_id', $this->rfiIdGlobal)->where('product_id', $record->id)->first()->qty_rfi;

                return "<input class='item-quantity' type='text' value='$qty' name='items[" . $record->id . "][qty]'>";
            })
            ->editColumn('um', function ($record) {

                $um = RfiDetail::select('um_rfi')->where('rfi_id', $this->rfiIdGlobal)->where('product_id', $record->id)->first()->um_rfi;
                return "<input class='item-um' type='text' value='$um' name='items[" . $record->id . "][um]'>";
            })

            // ->editColumn('sequence_number', function($record) {
            //
            //     $sequence_number = RfiDetail::select('sequence_number')->where( 'rfi_id', $this->rfiIdGlobal )->where( 'product_id', $record->id )->first()->sequence_number;
            //     return "<input readonly class='item-um' type='text' value='$sequence_number' name='items[".$record->id."][sequence_number]'>";
            // })
            //
            // ->editColumn('type_product_id', function($record) {
            //
            //     $type_product_id = RfiDetail::select('type_product_id')->where( 'rfi_id', $this->rfiIdGlobal )->where( 'product_id', $record->id )->first()->type_product_id;
            //     return "<input readonly class='item-um' type='text' value='$type_product_id' name='items[".$record->id."][type_product_id]'>";
            // })

            ->editColumn('delete', function ($record) {
                $eIds = explode(',', $this->gPIds);
                $arr = array_merge(array_diff($eIds, array($record->id)));
                $iIds = implode(',', $arr);
                if ($iIds == null) {
                    $iIds = 0;
                }

                return '

                        <a class="cursor" OnClick="deleteItemTemp(' . $iIds . ')">
                            <img class="delete-action" src="' . asset("/admin/images/delete.png") . '">
                        </a>

                    ';

                // $id = RfiDetail::select('id')->where( 'rfi_id', $this->rfiIdGlobal )->where( 'product_id', $record->id )->first()->id;
                //
                // return '
                //     &nbsp&nbsp&nbsp&nbsp&nbsp
                //     <a class="cursor" href="'.route('itemdatadeletetable', $id).'" OnClick="return confirm(\' Are you sure to delete it \');"">
                //         <img class="delete-action" src="'.asset("/admin/images/delete.png").'">
                //     </a>
                //
                // ';
            })



            ->rawColumns(['type_product_id', 'sequence_number', 'id', 'qty', 'um', 'delete'])

            ->make(true);
    }

    /**
     * Item Table
     *
     * @return \Illuminate\Http\Response
     */

    public function itemTable2($productIds, $id)
    {
        // $productIds = '5';
        // $id = '2';

        // Get Supplier
        $records = Items::query()->whereIn('id', explode(',', $productIds));

        $this->rfqtermIdGlobal = $id;
        $this->gPIds = $productIds;

        return Datatables::of($records, $id)
            ->editColumn('mfr', function ($record) {

                return $record->mfr;
            })
            ->editColumn('part_num', function ($record) {

                return $record->part_num;
            })
            ->editColumn('part_name', function ($record) {

                return $record->part_name;
            })
            ->editColumn('part_desc', function ($record) {

                return $record->part_desc;
            })
            ->editColumn('qty', function ($record) {

                $qty = RfqTerm::select('qty_rfi')->where('created_by', $this->rfqtermIdGlobal)->where('product_id', $record->id)->first()->qty_rfi;

                return "<input class='item-quantity' type='text' value='$qty' name='items[" . $record->id . "][qty]'>";
            })
            ->editColumn('um', function ($record) {

                $um = RfqTerm::select('um_rfi')->where('created_by', $this->rfqtermIdGlobal)->where('product_id', $record->id)->first()->um_rfi;
                return "<input class='item-um' type='text' value='$um' name='items[" . $record->id . "][um]'>";
            })

            // ->editColumn('sequence_number', function($record) {
            //
            //     $sequence_number = RfqTerm::select('sequence_number')->where( 'created_by', $this->rfqtermIdGlobal )->where( 'product_id', $record->id )->first()->sequence_number;
            //     return "<input readonly class='item-um' type='text' value='$sequence_number' name='items[".$record->id."][sequence_number]'>";
            // })
            //
            // ->editColumn('type_product_id', function($record) {
            //
            //     $type_product_id = RfqTerm::select('type_product_id')->where( 'created_by', $this->rfqtermIdGlobal )->where( 'product_id', $record->id )->first()->type_product_id;
            //     return "<input readonly class='item-um' type='text' value='$type_product_id' name='items[".$record->id."][type_product_id]'>";
            // })

            ->editColumn('delete', function ($record) {
                // $eIds = explode( ',', $this->gPIds );
                // $arr = array_merge(array_diff($eIds, array($record->id)));
                // $iIds = implode(',', $arr);
                // if( $iIds == null )
                // {
                //     $iIds = 0;
                // }
                //
                // return '
                //
                //     <a class="cursor" OnClick="deleteItemTemp('.$iIds.')">
                //         <img class="delete-action" src="'.asset("/admin/images/delete.png").'">
                //     </a>
                //
                // ';

                $id = RfqTerm::select('id')->where('created_by', $this->rfqtermIdGlobal)->where('product_id', $record->id)->first()->id;

                return '
                        &nbsp&nbsp&nbsp&nbsp&nbsp
                        <a class="cursor" href="' . route('itemdatadeletetable', $id) . '" OnClick="return confirm(\' Are you sure to delete it \');"">
                            <img class="delete-action" src="' . asset("/admin/images/delete.png") . '">
                        </a>

                    ';
            })



            ->rawColumns(['type_product_id', 'sequence_number', 'id', 'qty', 'um', 'delete'])

            ->make(true);
    }

    public function itemTableQs3($productIds, $id)
    {
        // $productIds = '5';
        // $id = '2';

        // Get Supplier
        $records = Items::query()->whereIn('id', explode(',', $productIds));

        $this->rfqtermIdGlobal = $id;
        $this->gPIds = $productIds;

        return Datatables::of($records, $id)
            ->editColumn('mfr', function ($record) {

                return $record->mfr;
            })
            ->editColumn('part_num', function ($record) {

                return $record->part_num;
            })
            ->editColumn('part_name', function ($record) {

                return $record->part_name;
            })
            ->editColumn('part_desc', function ($record) {

                return $record->part_desc;
            })
            ->editColumn('qty', function ($record) {

                $qty = PrTerm::select('qty_qs')->where('created_by', $this->rfqtermIdGlobal)->where('product_id', $record->id)->first()->qty_qs;

                return "<input class='item-quantity' type='text' value='$qty' name='items[" . $record->id . "][qty]'>";
            })
            ->editColumn('um', function ($record) {

                $um = PrTerm::select('um_qs')->where('created_by', $this->rfqtermIdGlobal)->where('product_id', $record->id)->first()->um_qs;
                return "<input class='item-um' type='text' value='$um' name='items[" . $record->id . "][um]'>";
            })

            // ->editColumn('sequence_number', function($record) {
            //
            //     $sequence_number = RfqTerm::select('sequence_number')->where( 'created_by', $this->rfqtermIdGlobal )->where( 'product_id', $record->id )->first()->sequence_number;
            //     return "<input readonly class='item-um' type='text' value='$sequence_number' name='items[".$record->id."][sequence_number]'>";
            // })
            //
            // ->editColumn('type_product_id', function($record) {
            //
            //     $type_product_id = RfqTerm::select('type_product_id')->where( 'created_by', $this->rfqtermIdGlobal )->where( 'product_id', $record->id )->first()->type_product_id;
            //     return "<input readonly class='item-um' type='text' value='$type_product_id' name='items[".$record->id."][type_product_id]'>";
            // })

            ->editColumn('delete', function ($record) {
                // $eIds = explode( ',', $this->gPIds );
                // $arr = array_merge(array_diff($eIds, array($record->id)));
                // $iIds = implode(',', $arr);
                // if( $iIds == null )
                // {
                //     $iIds = 0;
                // }
                //
                // return '
                //
                //     <a class="cursor" OnClick="deleteItemTemp('.$iIds.')">
                //         <img class="delete-action" src="'.asset("/admin/images/delete.png").'">
                //     </a>
                //
                // ';

                $id = PrTerm::select('id')->where('created_by', $this->rfqtermIdGlobal)->where('product_id', $record->id)->first()->id;

                return '
                        &nbsp&nbsp&nbsp&nbsp&nbsp
                        <a class="cursor" href="' . route('itemdatadeletetable', $id) . '" OnClick="return confirm(\' Are you sure to delete it \');"">
                            <img class="delete-action" src="' . asset("/admin/images/delete.png") . '">
                        </a>

                    ';
            })



            ->rawColumns(['type_product_id', 'sequence_number', 'id', 'qty', 'um', 'delete'])

            ->make(true);
    }
    /**
     * Item Table
     *
     * @return \Illuminate\Http\Response
     */

    public function itemTable3($productIds, $id)
    {

        // Get Supplier
        $records = Items::query()->whereIn('id', explode(',', $productIds));

        $this->rfqlistIdGlobal = $id;
        $this->gPIds = $productIds;

        return Datatables::of($records, $id)
            ->editColumn('mfr', function ($record) {

                return $record->mfr;
            })
            ->editColumn('part_num', function ($record) {

                return $record->part_num;
            })
            ->editColumn('part_name', function ($record) {

                return $record->part_name;
            })
            ->editColumn('part_desc', function ($record) {

                return $record->part_desc;
            })
            ->editColumn('qty', function ($record) {

                $qty = RfqDetail::select('qty_rfq')->where('rfq_id', $this->rfqlistIdGlobal)->where('product_id', $record->id)->first()->qty_rfq;

                return "<input class='item-quantity' type='text' value='$qty' name='items[" . $record->id . "][qty]'>";
            })
            ->editColumn('um', function ($record) {

                $um = RfqDetail::select('um_rfq')->where('rfq_id', $this->rfqlistIdGlobal)->where('product_id', $record->id)->first()->um_rfq;
                return "<input class='item-um' type='text' value='$um' name='items[" . $record->id . "][um]'>";
            })

            // ->editColumn('sequence_number', function($record) {
            //
            //     $sequence_number = RfqDetail::select('sequence_number')->where( 'rfq_id', $this->rfqlistIdGlobal )->where( 'product_id', $record->id )->first()->sequence_number;
            //     return "<input readonly class='item-um' type='text' value='$sequence_number' name='items[".$record->id."][sequence_number]'>";
            // })
            //
            // ->editColumn('type_product_id', function($record) {
            //
            //     $type_product_id = RfqDetail::select('type_product_id')->where( 'rfq_id', $this->rfqlistIdGlobal )->where( 'product_id', $record->id )->first()->type_product_id;
            //     return "<input readonly class='item-um' type='text' value='$type_product_id' name='items[".$record->id."][type_product_id]'>";
            // })

            ->editColumn('delete', function ($record) {
                // $eIds = explode( ',', $this->gPIds );
                // $arr = array_merge(array_diff($eIds, array($record->id)));
                // $iIds = implode(',', $arr);
                // if( $iIds == null )
                // {
                //     $iIds = 0;
                // }
                //
                // return '
                //
                //     <a class="cursor" OnClick="deleteItemTemp('.$iIds.')">
                //         <img class="delete-action" src="'.asset("/admin/images/delete.png").'">
                //     </a>
                //
                // ';
                $rfqinquiry = Rfq::select('inquiry_customer')->where('id', $this->rfqlistIdGlobal)->first()->inquiry_customer;
                if ($rfqinquiry == '0') {
                    $id = RfqDetail::select('id')->where('rfq_id', $this->rfqlistIdGlobal)->where('product_id', $record->id)->first();

                    return '
                          &nbsp&nbsp&nbsp&nbsp&nbsp
                          <a class="cursor" href="' . route('itemdatadeletetable2', $id) . '" OnClick="return confirm(\' Are you sure to delete it \');"">
                              <img class="delete-action" src="' . asset("/admin/images/delete.png") . '">
                          </a>

                      ';
                } else {
                    return ' ';
                }
            })



            ->rawColumns(['type_product_id', 'sequence_number', 'id', 'qty', 'um', 'delete'])

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
        Items::destroy($id);

        //
        return redirect(route('items_list'))->with('success', 'Item deleted!');
    }

    /**
     * View
     *
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request, $id)
    {
        //
        $data = Items::find($id);

        //
        return view('admin/items/view')->with('data', $data);
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
        $data['mfr'] = $request->mfr;
        $data['category_part_num'] = $request->category_part_num;
        $data['part_num'] = $request->part_num;
        $data['part_name'] = $request->part_name;
        $data['part_desc'] = $request->part_desc;
        $data['default_um'] = $request->default_um;
        $data['default_curr'] = $request->default_curr;
        $data['unit_cost'] = $request->unit_cost;
        $data['sell_price'] = $request->sell_price;
        $data['break_down_price'] = $request->break_down_price;
        $data['item_price'] = $request->item_price;
        $data['price_date'] = $request->price_date;
        $data['lead_time'] = $request->lead_time;
        $data['price_valid_until'] = $request->price_valid_until;
        $data['item_need_qc'] = $request->item_need_qc;
        $data['status'] = $request->status;
        $data['created_by'] = Auth::user()->name;
        $data['modified_by'] = Auth::user()->name;

        //
        Items::where('id', $id)->update($data);

        //
        return redirect(route('items_list'))->with('success', 'Item updated!');
    }

    //HSCODE

    /**
     * Create
     *
     * @return \Illuminate\Http\Response
     */
    public function createhscode()
    {
        //
        return view('admin/items/create-hscode');
    }

    public function hscode()
    {
        //
        return view('admin/items/hscode');
    }

    /**
     * Save
     *
     * @return \Illuminate\Http\Response
     */
    public function savehscode(Request $request)
    {
        // Parameters
        $input = $request->all();
        $data['hscode'] = $request->hscode;
        $data['hscode_desc'] = $request->hscode_desc;

        $data['created_by'] = Auth::user()->name;
        $data['modified_by'] = Auth::user()->name;

        //
        $items = Hscode::create($data);


        //
        return redirect(route('hscode'))->with('success', 'Hscode created');
    }

    /**
     * List
     *
     * @return \Illuminate\Http\Response
     */
    public function listhscode(Request $request)
    {
        //
        return view('admin/items/list-hscode');
    }

    /**
     * Get Data
     *
     * @return \Illuminate\Http\Response
     */
    public function getDataHscode(Request $request)
    {
        // Get Supplier
        $records = Hscode::query();

        return Datatables::of($records)
            ->editColumn('hscode', function ($record) {

                return $record->hscode;
            })
            ->editColumn('hscode_desc', function ($record) {

                return $record->hscode_desc;
            })

            // ->editColumn('action', function($record) {

            //     return 

            //     ;
            // })


            ->rawColumns(['id', 'action'])

            ->make(true);
    }

    public function updateoffer(Request $request){
      
        $input = $request->all();
        $id = $request->purchase_order_id;
        $data['product_id'] = $request->product_id;
        $data['qty_pos'] = $request->qty_pos;
        $data['qty_delivered'] = 0;
        $data['curr'] = $request->curr;
        $data['unit_price'] = $request->unit_price;
      
        $data['modified_by'] = Auth::user()->name;
        $data2['approved'] = 0;
        $data2['reject_reason'] = "Offer PO";
     
            PoSupplierDetail::where('id', $request->poid)->update( $data );
               PurchaseOrder::where('id',$request->id)->update($data2);
    }

    public function testing(){
        return "test";
    }
   
}
