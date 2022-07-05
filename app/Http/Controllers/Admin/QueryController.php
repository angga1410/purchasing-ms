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

class QueryController extends Controller
{
    /**
     * List
     *
     * @return \Illuminate\Http\Response
     */
    public function queryview(Request $request)
    {
        //
        return view('admin/query/query');
    }
    public function purchasepriceview(Request $request)
    {
        //
        return view('admin/query/purchaseprice');
    }

    /**
     * PO Supplier
     *
     * @return \Illuminate\Http\Response
     */


    public function PrSup(Request $request)
    {
      

    
            if (!empty($request->from_datepr)) {
                $records = PRDetail::where('status', '0')->with("item")->with("pr")->whereBetween('created_at', array($request->from_datepr, $request->to_datepr))->get();
            } else {
                $records = PRDetail::where('status', '0')->with("item")->with("pr")->get();
               
            }

            foreach($records as $get){
                if($get->item == null){
                    dd($get);
                }
            }
   
      
        return Datatables::of($records)
            ->editColumn('null', function ($record) {

                return;
            })
            ->editColumn('po_number', function ($record) {

                return $record->pr->pr_number;
            })
            ->editColumn('po_number_seq', function ($record) {

                return $record->pr->pr_number_seq;
            })
            ->editColumn('supplier_id', function ($record) {

                return $record->request_from;
            })
            ->editColumn('mfr', function ($record) {

                return $record->item->mfr;
            })
            ->editColumn('part_num', function ($record) {

                return $record->item->part_num;
            })->editColumn('part_name', function ($record) {

                return $record->item->part_name;
            })->editColumn('part_desc', function ($record) {

                return $record->item->part_desc;
            })->editColumn('qty', function ($record) {

                return $record->qty_pr;
            })

            ->editColumn('status', function ($record) {

                if ($record->pr->status == 1 && $record->pr->approved == 1) {
                    return 'Outstanding';
                }
                if ($record->pr->status == 2 && $record->pr->approved == 1) {
                    return 'PO Ready';
                }
                if ($record->pr->status == 1 && $record->pr->approved == 0) {
                    return 'Not Approve';
                }
                if ($record->pr->status == 0 && $record->pr->approved == 0) {
                    return 'Rejected';
                }
            })->editColumn('curr', function ($record) {

                return $record->curr;
            })->editColumn('price', function ($record) {

                return $record->unit_cost;
            })->editColumn('date', function ($record) {

                return date('d-m-Y', strtotime($record->created_at));
            })
            ->rawColumns(['supplier_id'])

            ->make(true);
    }



    public function PoSup(Request $request)
    {


        if (request()->ajax()) {
            if (!empty($request->from_date)) {
                $records = PoSupplierDetail::where('status', '1')->with("item")->with("po")->with("pr")->whereBetween('created_at', array($request->from_date, $request->to_date))->get();
            } else {
                $records = PoSupplierDetail::where('status', '1')->with("item")->with("po")->with("pr")->get();
            }
        }

       

     

        return Datatables::of($records)
            ->editColumn('null', function ($record) {

                return;
            })
            ->editColumn('po_number', function ($record) {

                return $record->po->po_number;
            })
            ->editColumn('po_number_seq', function ($record) {

                return $record->po->po_number_seq;
            })
            ->editColumn('supplier_id', function ($record) {

                $supplier = Supplier::select('supplier_name')->where('id', $record->po->supplier_id)->first();
                return $supplier->supplier_name;
            })
            ->editColumn('mfr', function ($record) {


                return $record->item->mfr;
            })
            ->editColumn('part_num', function ($record) {

                return $record->item->part_num;
            })->editColumn('part_name', function ($record) {

                return $record->item->part_name;
            })->editColumn('part_desc', function ($record) {

                return $record->item->part_desc;
            })->editColumn('qty', function ($record) {

                return $record->qty_pos;
            })

            ->editColumn('status', function ($record) {

                if ($record->po->status == 0) {
                    return 'Outstanding';
                }
                if ($record->po->status == 1) {
                    return 'On-Process';
                }
                if ($record->po->status == 2) {
                    return 'Delivered';
                }
            })->editColumn('curr', function ($record) {

                return $record->curr;
            })->editColumn('price', function ($record) {

                return $record->unit_price;
            })->editColumn('date', function ($record) {

                return date('d-m-Y', strtotime($record->created_at));
            })
            ->rawColumns(['supplier_id'])

            ->make(true);
    }

    /**
     * PO Supplier
     *
     * @return \Illuminate\Http\Response
     */
    public function PurchasePriceRpt(Request $request)
    {
       

      
        if (request()->ajax()) {
            if (!empty($request->from_date)) {
                $first = $request->from_date;
                $last = $request->to_date;
                $records = PoSupplierDetail::select('product_id')->where('status', '1')->whereBetween('created_at', array($request->from_date, $request->to_date))->groupBy('product_id')->get();
    return Datatables::of($records)
                ->editColumn('null', function ($record) {
    
                    return;
                })
                ->editColumn('mfr', function ($record) {
                    $mfr = Items::where('id', $record->product_id)->first();
                    return $mfr->mfr;
                })
                ->editColumn('part_num', function ($record) {
                    $part_num = Items::where('id', $record->product_id)->first();
                    return $part_num->part_num;
                })
                ->editColumn('part_name', function ($record) {
                    $part_name = Items::where('id', $record->product_id)->first();
                    return $part_name->part_name;
                })
                ->editColumn('part_desc', function ($record) {
                    $part_desc = Items::where('id', $record->product_id)->first();
                    return $part_desc->part_desc;
                })
                ->editColumn('totalqty', function ($record) use($first,$last) {
                    $num = PoSupplierDetail::where('product_id',$record->product_id)->whereBetween('created_at', array($first, $last))->get()->groupBy('product_id')->map(function ($row) {
                        return $row->sum('qty_pos');
                    });
                    return $num[$record->product_id];
                })
                ->editColumn('curr', function ($record) {
                  
                    $curr = Items::where('id', $record->product_id)->first();
                    return $curr->default_curr;
                })
                ->editColumn('totalprice', function ($record) use($first,$last) {
                    $num = PoSupplierDetail::where('product_id',$record->product_id)->whereBetween('created_at', array($first, $last))->selectRaw('SUM(qty_pos * unit_price) as total')->pluck('total');
                    return $num[0];
                })
             
                ->editColumn('lastprice', function ($record) use($first,$last) {
                    $num = PoSupplierDetail::where('product_id',$record->product_id)->whereBetween('created_at', array($first, $last))->orderBy('created_at','desc')->first();
                    return $num->unit_price;
                })
                ->editColumn('firstprice', function ($record) use($first,$last) {
                    $num = PoSupplierDetail::where('product_id',$record->product_id)->whereBetween('created_at', array($first, $last))->orderBy('created_at','asc')->first();
                    return $num->unit_price;
                })
                ->editColumn('gap', function ($record) use($first,$last){
                    $num1 = PoSupplierDetail::where('product_id',$record->product_id)->whereBetween('created_at', array($first, $last))->first();
                    $num2 = PoSupplierDetail::where('product_id',$record->product_id)->whereBetween('created_at', array($first, $last))->orderBy('created_at','desc')->first();
                
                    if($num1->unit_price == 0 && $num2->unit_price != 0){
                        $gap = 100;
                    }
                    elseif($num1->unit_price == 0 && $num2->unit_price == 0){
                        $gap = 0;
                    }
                    elseif($num1->unit_price ==  $num2->unit_price){
                        $gap = 0;
                    }
                    elseif($num1->unit_price != 0 &&  $num2->unit_price == 0){
                        $gap = 100;
                    }
                    
                    else{
                        $gap = $num2->unit_price / $num1->unit_price * 100;
                    }

                    return $gap;
                })
    
                ->rawColumns(['mfr','part_num','part_name','part_desc','totalqty','curr','totalprice','lastprice','firstprice','gap'])
    
                ->make(true);




            } else {
                $records = PoSupplierDetail::select('product_id')->where('status', '1')->groupBy('product_id')->get();
                return Datatables::of($records)
                ->editColumn('null', function ($record) {
    
                    return;
                })
                ->editColumn('mfr', function ($record) {
                    $mfr = Items::where('id', $record->product_id)->first();
                    return $mfr->mfr;
                })
                ->editColumn('part_num', function ($record) {
                    $part_num = Items::where('id', $record->product_id)->first();
                    return $part_num->part_num;
                })
                ->editColumn('part_name', function ($record) {
                    $part_name = Items::where('id', $record->product_id)->first();
                    return $part_name->part_name;
                })
                ->editColumn('part_desc', function ($record) {
                    $part_desc = Items::where('id', $record->product_id)->first();
                    return $part_desc->part_desc;
                })
                ->editColumn('totalqty', function ($record) {
                    $num = PoSupplierDetail::where('product_id',$record->product_id)->get()->groupBy('product_id')->map(function ($row) {
                        return $row->sum('qty_pos');
                    });
                    return $num[$record->product_id];
                })
                ->editColumn('curr', function ($record) {
                  
                    $curr = Items::where('id', $record->product_id)->first();
                    return $curr->default_curr;
                })
                ->editColumn('totalprice', function ($record) {
                    $num = PoSupplierDetail::where('product_id',$record->product_id)->selectRaw('SUM(qty_pos * unit_price) as total')->pluck('total');
                    return $num[0];
                })
                ->editColumn('lastprice', function ($record) {
                    $last = PoSupplierDetail::where('product_id',$record->product_id)->orderBy('created_at','desc')->first();
                    return $last->unit_price;
                })
                ->editColumn('firstprice', function ($record) {
                    $first = PoSupplierDetail::where('product_id',$record->product_id)->first();
                    return $first->unit_price;
                })
                ->editColumn('gap', function ($record) {
                    $num1 = PoSupplierDetail::where('product_id',$record->product_id)->first();
                    $num2 = PoSupplierDetail::where('product_id',$record->product_id)->orderBy('created_at','desc')->first();
                
                    if($num1->unit_price == 0 && $num2->unit_price != 0){
                        $gap = 100;
                    }
                    elseif($num1->unit_price == 0 && $num2->unit_price == 0){
                        $gap = 0;
                    }
                    elseif($num1->unit_price ==  $num2->unit_price){
                        $gap = 0;
                    }
                    elseif($num1->unit_price != 0 &&  $num2->unit_price == 0){
                        $gap = 100;
                    }
                    
                    else{
                        $gap = $num2->unit_price / $num1->unit_price * 100;
                    }

                    return $gap;
                })
    
                ->rawColumns(['mfr','part_num','part_name','part_desc','totalqty','curr','totalprice','lastprice','firstprice','gap'])
    
                ->make(true);
            }
        }

      
    }
}
