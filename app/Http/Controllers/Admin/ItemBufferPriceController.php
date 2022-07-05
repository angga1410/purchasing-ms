<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ItemBufferPrice;
use App\ItemsBuffer;
use Auth;
use Datatables;

class ItemBufferPriceController extends Controller
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
        $items = ItemsBuffer::all();

        //
        return view('admin/items_buffer/price/create')->with( 'items', $items );
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
        $data['product_buffer_id'] = $request->product_buffer_id;
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
    	$items = ItemBufferPrice::create( $data );


    	//
    	return redirect( route('buffer_price_list') )->with('success', 'Item buffer price created');
    }

    /**
     * List
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        //
        return view('admin/items_buffer/price/list');
    }

    /**
     * Get Data
     *
     * @return \Illuminate\Http\Response
     */
    public function getData(Request $request)
    {
        // Get Supplier
        $records = ItemBufferPrice::query();

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

                        <a href="'.route('view_buffer_price', $record->id).'"">
                            <img class="view-action" src="'.asset("/admin/images/view.png").'">
                        </a>

                        &nbsp&nbsp&nbsp&nbsp&nbsp

                        <a href="'.route('delete_buffer_price', $record->id).'" OnClick="return confirm(\' Are you sure to delete it \');"">
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
        ItemBufferPrice::destroy( $id );

        //
        return redirect( route('buffer_price_list') )->with('success', 'Buffer price deleted!');
    }

    /**
     * View
     *
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request, $id)
    {
        $items = ItemsBuffer::all();
        $data = ItemBufferPrice::find( $id );

        //
        return view('admin/items_buffer/price/view')->with( 'items', $items )->with( 'data', $data );
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
        $data['product_buffer_id'] = $request->product_buffer_id;
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
        ItemBufferPrice::where('id', $id)->update( $data );

        //
        return redirect( route('buffer_price_list') )->with('success', 'Buffer price updated!');
    }

}
