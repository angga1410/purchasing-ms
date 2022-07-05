<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supplier;
use App\SupplierAddress;
use Auth;
use Datatables;

class SupplierController extends Controller
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
        return view('admin/supplier/create');
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
    	$input['approved_by'] = Auth::user()->name;
    	$input['created_by'] = Auth::user()->name;
    	$input['modified_by'] = Auth::user()->name;
    	$input['approved_Date'] = date("Y-m-d H:i:s");
        
        // Address Parameters
        $address['address_type'] = $request->address_type;
        $address['address_line_1'] = $request->address_line_1;
        $address['address_line_2'] = $request->address_line_2;
        $address['address_line_3'] = $request->address_line_3;
        $address['city'] = $request->city;
        $address['post_code'] = $request->post_code;
        $address['province_id'] = $request->province_id;
        $address['area_id'] = $request->area_id;
        $address['country_id'] = $request->country_id;
        $address['phone'] = $request->phone;
        $address['fax'] = $request->fax;
        $address['email'] = $request->email;
        $address['website'] = $request->website;
        $address['created_by'] = Auth::user()->name;
        $address['modified_by'] = Auth::user()->name;

        //
        $supplierId = Supplier::create( $input );

        //
        $address['supplier_id'] = $supplierId->id;
    	SupplierAddress::create( $address );

    	//
    	return redirect( route('supplier_list') )->with('success', 'Supplier created!');
    }

    /**
     * List
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        //
        return view('admin/supplier/list');
    }

    /**
     * Get Data
     *
     * @return \Illuminate\Http\Response
     */
    public function getData(Request $request)
    {
        // Get Supplier
        $records = Supplier::where( 'del', '0' )->get();


        return Datatables::of($records)
        ->editColumn('null', function($record) {

            return '';
        })
     
                ->editColumn('supplier_name', function($record) {

                    return $record->supplier_name;
                })
                ->editColumn('supplier_type', function($record) {

                    if( $record->supplier_type == 1 ){ return "Product"; }
                    if( $record->supplier_type == 2 ){ return "Service"; }
                    if( $record->supplier_type == 3 ){ return "Product + Service"; }
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

                        <a href="'.route('view_supplier', $record->id).'"">
                            <img class="view-action" src="'.asset("/admin/images/view.png").'">
                        </a>

                        &nbsp&nbsp&nbsp&nbsp&nbsp

                        <a href="'.route('delete_supplier', $record->id).'" OnClick="return confirm(\' Are you sure to delete it \');"">
                            <img class="delete-action" src="'.asset("/admin/images/delete.png").'">
                        </a>

                    ';
                })
                ->rawColumns(['id', 'action'])

            ->make(true);
    }

    /**
     * Get Approve Data
     *
     * @return \Illuminate\Http\Response
     */
    public function getApproveData(Request $request)
    {
        // Get Supplier
        $records = Supplier::query();


        return Datatables::of($records)
                ->editColumn('supplier_name', function($record) {

                    return $record->supplier_name;
                })
                ->editColumn('supplier_type', function($record) {

                    if( $record->supplier_type == 1 ){ return "Local"; }
                    if( $record->supplier_type == 2 ){ return "Import"; }
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

                        <a href="'.route('supplier_approve_status_approve', array($record->id, 'approve')).'">
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
                ->rawColumns(['id', 'action'])

            ->make(true);
    }

    public function getApproveDel(Request $request)
    {
        // Get Supplier
        $records = Supplier::where( 'del', '1' )->get();


        return Datatables::of($records)
                ->editColumn('supplier_name', function($record) {

                    return $record->supplier_name;
                })
              
                ->editColumn('action', function($record) {

                    return '

                        &nbsp&nbsp

                        <a href="'.route('delete_supplier_approve', $record->id).'" OnClick="return confirm(\' Are you sure to delete it \');"">
                            <button type="button" class="btn btn-danger">
                            Delete
                            </button>
                        </a>

                        &nbsp&nbsp  &nbsp&nbsp  &nbsp&nbsp

                        <a href="'.route('delete_supplier_reject', $record->id).'">
                        <button type="button" class="btn btn-warning">
                        Reject
                        </button>
                    </a>

                       

                    ';
                })
             
                ->rawColumns(['id', 'action'])

            ->make(true);
    }


    public function del()
    {
        return view('admin/supplier/deleteapprove');
    }
    /**
     * Delete
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        //
       
        $data['del'] = '1';
        Supplier::where('id', $id)->update( $data );

        //
        return redirect( route('supplier_list') )->with('success', 'Supplier deleted!');
    }
    public function deleteapprove(Request $request, $id)
    {
        //
       
        $data['del'] = '2';
        Supplier::where('id', $id)->update( $data );

        //
        return redirect( route('delete_approve') )->with('success', 'Supplier deleted!');
    }
    public function deletereject(Request $request, $id)
    {
        //
       
        $data['del'] = '0';
        Supplier::where('id', $id)->update( $data );

        //
        return redirect( route('supplier_list') )->with('success', 'Supplier rejected!');
    }

    /**
     * View
     *
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request, $id)
    {
        // Parameters
        $data = Supplier::find( $id );
        $address = SupplierAddress::where( 'supplier_id', $id )->first();

        //
        return view('admin/supplier/view')->with( 'data', $data )->with( 'address', $address );
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
        $data['supplier_name'] = $input['supplier_name'];
        $data['supplier_type'] = $input['supplier_type'];
        $data['approved'] = ( isset( $input['approved'] ) ? 1 : 0 );
        $data['approved_by'] = Auth::user()->name;  
        $data['created_by'] = Auth::user()->name;
        $data['modified_by'] = Auth::user()->name;
      

        // Address Parameters
        $address['address_type'] = $request->address_type;
        $address['address_line_1'] = $request->address_line_1;
        $address['address_line_2'] = $request->address_line_2;
        $address['address_line_3'] = $request->address_line_3;
        $address['city'] = $request->city;
        $address['post_code'] = $request->post_code;
        $address['province_id'] = $request->province_id;
        $address['area_id'] = $request->area_id;
        $address['country_id'] = $request->country_id;
        $address['phone'] = $request->phone;
        $address['fax'] = $request->fax;
        $address['email'] = $request->email;
        $address['website'] = $request->email;
        $address['created_by'] = Auth::user()->name;
        $address['modified_by'] = Auth::user()->name;

        //
        Supplier::where('id', $id)->update( $data );
        SupplierAddress::where('supplier_id', $id)->update( $address );

        //
        return redirect( route('supplier_list') )->with('success', 'Supplier updated!');
    }

    /**
     * Approve
     *
     * @return \Illuminate\Http\Response
     */
    public function approve()
    {
        return view('admin/supplier/approve');
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

            //
            Supplier::where('id', $id)->update( $data );

            //
            return redirect( route('supplier_approve') )->with('success', 'Supplier aprroved!');
        }
        else
        {
            // Parameters
            $data['rejected'] = 1;
            $data['approved'] = 0;
            $data['reject_reason'] = $request->reason;

            //
            Supplier::where('id', $request->id)->update( $data );

            //
            return redirect( route('supplier_approve') )->with('success', 'Supplier rejected!');
        }

        //

    }

}
