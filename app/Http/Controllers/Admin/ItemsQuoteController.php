<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ItemsQuote;
use Auth;
use Datatables;

class ItemsQuoteController extends Controller
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
        return view('admin/items_quote/create');
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
        $data['break_down_price'] = $request->break_down_price;
        $data['price_date'] = $request->price_date;
        $data['lead_time'] = $request->lead_time;
        $data['price_valid_until'] = $request->price_valid_until;
        $data['item_need_qc'] = $request->item_need_qc;
        $data['status'] = $request->status;
    	$data['created_by'] = Auth::user()->name;
    	$data['modified_by'] = Auth::user()->name;

        //
    	$items = ItemsQuote::create( $data );


    	//
    	return redirect( route('item_quote_list') )->with('success', 'Item quote created');
    }

    /**
     * List
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        //
        return view('admin/items_quote/list');
    }

    /**
     * Get Data
     *
     * @return \Illuminate\Http\Response
     */
    public function getData(Request $request)
    {
        // Get Supplier
        $records = ItemsQuote::query();

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
                ->editColumn('action', function($record) {

                    return '

                        &nbsp&nbsp

                        <a href="'.route('view_item_quote', $record->id).'"">
                            <img class="view-action" src="'.asset("/admin/images/view.png").'">
                        </a>

                        &nbsp&nbsp&nbsp&nbsp&nbsp

                        <a href="'.route('delete_item_quote', $record->id).'" OnClick="return confirm(\' Are you sure to delete it \');"">
                            <img class="delete-action" src="'.asset("/admin/images/delete.png").'">
                        </a>

                    ';
                })
                ->rawColumns(['id', 'action'])

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
        ItemsQuote::destroy( $id );

        //
        return redirect( route('item_quote_list') )->with('success', 'Items quote deleted!');
    }

    /**
     * View
     *
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request, $id)
    {
        //
        $data = ItemsQuote::find( $id );

        //
        return view('admin/items_quote/view')->with( 'data', $data );
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
        $data['price_date'] = $request->price_date;
        $data['lead_time'] = $request->lead_time;
        $data['price_valid_until'] = $request->price_valid_until;
        $data['item_need_qc'] = $request->item_need_qc;
        $data['status'] = $request->status;
        $data['created_by'] = Auth::user()->name;
        $data['modified_by'] = Auth::user()->name;

        //
        ItemsQuote::where('id', $id)->update( $data );

        //
        return redirect( route('item_quote_list') )->with('success', 'Item quote updated!');
    }

}
