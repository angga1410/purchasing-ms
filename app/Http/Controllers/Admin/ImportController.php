<?php
namespace App\Http\Controllers\Admin;

use App\Import;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class ImportController extends Controller 
{
    public function import_excel(Request $request) 
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('file_siswa',$nama_file);
 
		// import data
		Excel::import(new Import, public_path('/file_siswa/'.$nama_file));
 
	
		// alihkan halaman kembali
		return redirect( route('purchase_request_list') )->with('success', 'Purchase Request updated!');
	}
}
