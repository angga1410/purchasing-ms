<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SupplierContact;
use App\Supplier;
use Auth;
use Datatables;

class SupplierContactController extends Controller
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
    	$supplierData = Supplier::all();
        return view('admin/suppliercontact/create')->with( 'supplier', $supplierData );
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
    	$input['supplier_id'] = $request->supplier_id;
    	$input['contact_name '] = $request->contact_name;
    	$input['contact_position'] = $request->contact_position;
    	$input['contact_hand_phone'] = $request->contact_hand_phone;
        $input['contact_email'] = $request->contact_email;
        $input['contact_website'] = $request->contact_website;
    	$input['created_by'] = Auth::user()->name;
    	$input['modified_by'] = Auth::user()->name;

        //
    	SupplierContact::create( $input );

    	//
    	return redirect( route('supplier_contact_list') )->with('success', 'Supplier contact has been created!');
    }

    /**
     * List
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        //
        return view('admin/suppliercontact/list');
    }

    /**
     * Get Contact
     *
     * @return \Illuminate\Http\Response
     */
    public function getSupplierContact( $supplierId )
    {
        // Parameters
        $contacts = Supplier::find( $supplierId )->contacts;
        $supplierContact = '';

        //
        foreach( $contacts as $get )
        {
            $supplierContact .= "<option value='$get->id'>$get->contact_name</options>";
        }

        return $supplierContact;
    }

    /**
     * Get Data
     *
     * @return \Illuminate\Http\Response
     */
    public function getData(Request $request)
    {
        // Get Supplier
        $records = SupplierContact::query();


        return Datatables::of($records)

        ->editColumn('null', function($record) {

            return;
        })
                ->editColumn('supplier_id', function($record) {

                    return $record->supplier_id;
                })
                ->editColumn('contact_name', function($record) {

                    return $record->contact_name;
                })
                ->editColumn('contact_position', function($record) {

                    return $record->contact_position;
                })
                ->editColumn('contact_hand_phone', function($record) {

                    return $record->contact_hand_phone;
                })
                ->editColumn('contact_email', function($record) {

                    return $record->contact_email;
                })
                ->editColumn('action', function($record) {

                    return '

                        &nbsp&nbsp

                        <a href="'.route('view_supplier_contact', $record->id).'"">
                            <img class="view-action" src="'.asset("/admin/images/view.png").'">
                        </a>

                        &nbsp&nbsp&nbsp&nbsp&nbsp

                        <a href="'.route('delete_supplier_contact', $record->id).'" OnClick="return confirm(\' Are you sure to delete it \');"">
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
        SupplierContact::destroy( $id );

        //
        return redirect( route('supplier_contact_list') )->with('success', 'Supplier deleted!');
    }

    /**
     * View
     *
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request, $id)
    {
        // Parameters
        $data = SupplierContact::find( $id );
        $supplierData = Supplier::all();

        //
        return view('admin/suppliercontact/view')->with( 'data', $data )->with( 'supplier', $supplierData );
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

        $data['supplier_id'] = $request->supplier_id;
        $data['contact_name'] = $request->contact_name;
        $data['contact_position'] = $request->contact_position;
        $data['contact_hand_phone'] = $request->contact_hand_phone;
        $data['contact_email'] = $request->contact_email;
        $data['contact_website'] = $request->contact_website;
        $data['created_by'] = Auth::user()->name;
        $data['modified_by'] = Auth::user()->name;

        //
        SupplierContact::where('id', $id)->update( $data );

        //
        return redirect( route('supplier_contact_list') )->with('success', 'Supplier contact updated!');
    }

}
