<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ItemPriceQuote;
use App\Items;
use Auth;
use Datatables;

class ItemPriceQuoteController extends Controller
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
        $items = Items::all();

        //
        return view('admin/items_quote/price/create')->with( 'items', $items );
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
        $data['product_id'] = $request->product_id;
        $data['sequence_number'] = $request->sequence_number;
        $data['qty_item'] = $request->qty_item;
        $data['unit_cost'] = $request->unit_cost;
        $data['sell_price'] = $request->sell_price;
        $data['price_date'] = $request->price_date;
        $data['price_valid_until'] = $request->price_valid_until;
        $data['status'] = $request->status;
    	$data['created_by'] = Auth::user()->name;
    	$data['modified_by'] = Auth::user()->name;

        //
    	$items = ItemPriceQuote::create( $data );


    	//
    	return redirect( route('price_quote_list') )->with('success', 'Item quote price created');
    }

    /**
     * List
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        //
        return view('admin/items_quote/price/list');
    }

    /**
     * Get Data
     *
     * @return \Illuminate\Http\Response
     */
    public function getData(Request $request)
    {
        // Get Supplier
        $records = ItemPriceQuote::query();

        return Datatables::of($records)
                ->editColumn('sequence_number', function($record) {

                    return $record->sequence_number;
                })
                ->editColumn('qty_item', function($record) {

                    return $record->qty_item;
                })
                ->editColumn('unit_cost', function($record) {

                    return $record->unit_cost;
                })
                ->editColumn('sell_price', function($record) {

                    return $record->sell_price;
                })
                ->editColumn('price_date', function($record) {

                    return $record->price_date;
                })
                ->editColumn('price_valid_until', function($record) {

                    return $record->price_valid_until;
                })
                ->editColumn('action', function($record) {

                    return '

                        &nbsp&nbsp

                        <a href="'.route('view_price_quote', $record->id).'"">
                            <img class="view-action" src="'.asset("/admin/images/view.png").'">
                        </a>

                        &nbsp&nbsp&nbsp&nbsp&nbsp

                        <a href="'.route('delete_price_quote', $record->id).'" OnClick="return confirm(\' Are you sure to delete it \');"">
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
        ItemPriceQuote::destroy( $id );

        //
        return redirect( route('price_quote_list') )->with('success', 'Price quote deleted!');
    }

    /**
     * View
     *
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request, $id)
    {
        $items = Items::all();
        $data = ItemPriceQuote::find( $id );

        //
        return view('admin/items_quote/price/view')->with( 'items', $items )->with( 'data', $data );
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
        // Parameters
        $input = $request->all();
        $data['product_id'] = $request->product_id;
        $data['sequence_number'] = $request->sequence_number;
        $data['qty_item'] = $request->qty_item;
        $data['unit_cost'] = $request->unit_cost;
        $data['sell_price'] = $request->sell_price;
        $data['price_date'] = $request->price_date;
        $data['price_valid_until'] = $request->price_valid_until;
        $data['status'] = $request->status;
        $data['created_by'] = Auth::user()->name;
        $data['modified_by'] = Auth::user()->name;

        //
        ItemPriceQuote::where('id', $id)->update( $data );

        //
        return redirect( route('price_quote_list') )->with('success', 'Price quote updated!');
    }

}
