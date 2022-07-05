<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Task;
use Auth;
use Datatables;

class TaskController extends Controller
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
    // public function create()
    // {
    //     return view('admin/supplier/create');
    // }

    /**
     * Save
     *
     * @return \Illuminate\Http\Response
     */
    // public function save(Request $request)
    // {
    // 	// Parameters
    // 	$input = $request->all();
    // 	$input['approved_by'] = Auth::user()->name;
    // 	$input['created_by'] = Auth::user()->name;
    // 	$input['modified_by'] = Auth::user()->name;
    // 	$input['approved_Date'] = date("Y-m-d H:i:s");
        
    //     // Address Parameters
    //     $address['address_type'] = $request->address_type;
    //     $address['address_line_1'] = $request->address_line_1;
    //     $address['address_line_2'] = $request->address_line_2;
    //     $address['address_line_3'] = $request->address_line_3;
    //     $address['city'] = $request->city;
    //     $address['post_code'] = $request->post_code;
    //     $address['province_id'] = $request->province_id;
    //     $address['area_id'] = $request->area_id;
    //     $address['country_id'] = $request->country_id;
    //     $address['phone'] = $request->phone;
    //     $address['fax'] = $request->fax;
    //     $address['email'] = $request->email;
    //     $address['website'] = $request->website;
    //     $address['created_by'] = Auth::user()->name;
    //     $address['modified_by'] = Auth::user()->name;

    //     //
    //     $supplierId = Supplier::create( $input );

    //     //
    //     $address['supplier_id'] = $supplierId->id;
    // 	SupplierAddress::create( $address );

    // 	//
    // 	return redirect( route('supplier_list') )->with('success', 'Supplier created!');
    // }

    /**
     * List
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        //
        return view('admin/task/list');
    }

    /**
     * Get Data
     *
     * @return \Illuminate\Http\Response
     */
    public function getData(Request $request)
    {
        // Get Supplier
        $records = Task::get();


        return Datatables::of($records)
        ->editColumn('null', function($record) {

            return '';
        })
     
                ->editColumn('name', function($record) {

                    return $record->name;
                })
                ->editColumn('task_desc', function($record) {

                    return $record->task_desc;
                })
                ->editColumn('start_date', function($record) {

                    return $record->start_date;
                })
                ->editColumn('end_date', function($record) {

                    return $record->end_date;
                })
                
              
              
                ->rawColumns(['id', 'action'])

            ->make(true);
    }
}