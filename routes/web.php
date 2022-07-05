<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/Procurement/products-data', 'Admin\PrController@productData');

Route::get('/Procurement/pr-data', 'Admin\poSupplierController@prData');
Route::get('/Procurement/pr-data-inq', 'Admin\poSupplierController@prDataInq');

Route::get('/Procurement/pr-data-tracking', 'Admin\poSupplierController@prDataTracking');
Route::get('/Procurement/pr-get/{id}', 'Admin\poSupplierController@getPr');
Route::get('/items-dt', 'Admin\ItemsController@ItemsDT');
Route::post('/items-req-dt', 'Admin\ItemsController@saveItemReq');
Route::get('/get-items-req-dt', 'Admin\ItemsController@getItemReq');

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::prefix('Procurement')->group(function() {
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout1');
});

Route::get('/dashboard', 'Admin\DashboardController@index')->name('home');

//
Route::prefix('inquiry')->group(function() {
	Route::get('/create', 'Admin\InquiryController@create')->name('create_inquiry');
	Route::post('/save', 'Admin\InquiryController@saveRFI')->name('save_inquiry');
	Route::get('/list', 'Admin\InquiryController@list')->name('list_inquiry');
	Route::get('/data', 'Admin\InquiryController@getData')->name('rfi_data');
	Route::get('/view/{id}', 'Admin\InquiryController@view')->name('view_rfi');
	Route::post('/update', 'Admin\InquiryController@update')->name('update_rfi');
	Route::get('/create-item', 'Admin\InquiryController@createDirect')->name('create_inquiry_item');
	Route::get('/print/{id}', 'Admin\InquiryController@print')->name('print_inquiry');
	Route::get('/get-data/{id}', 'Admin\InquiryController@getDataRFI')->name('get_rfi');
	Route::get('/rfi-get/{id}', 'Admin\InquiryController@rfiGet')->name('rfi_get');
	
	
	
});

// Supplier
Route::prefix('supplier')->group(function() {
	Route::get('/create', 'Admin\SupplierController@create')->name('create_supplier');
	Route::post('/save', 'Admin\SupplierController@save')->name('save_supplier');
	Route::get('/list', 'Admin\SupplierController@list')->name('supplier_list');
	Route::get('/data', 'Admin\SupplierController@getData')->name('supplier_data');
	Route::get('approve/data', 'Admin\SupplierController@getApproveData')->name('supplier_approve_data');
	Route::get('approve/del', 'Admin\SupplierController@getApproveDel')->name('supplier_approve_del');
	Route::get('/delete/{id}', 'Admin\SupplierController@delete')->name('delete_supplier');
	Route::get('/deleteapprove/{id}', 'Admin\SupplierController@deleteapprove')->name('delete_supplier_approve');
	Route::get('/deletereject/{id}', 'Admin\SupplierController@deletereject')->name('delete_supplier_reject');
	Route::get('/view/{id}', 'Admin\SupplierController@view')->name('view_supplier');
	Route::post('/update', 'Admin\SupplierController@update')->name('update_supplier');
	Route::get('/supplier/approve', 'Admin\SupplierController@approve')->name('supplier_approve');
	Route::get('/supplier/deleteapprove', 'Admin\SupplierController@del')->name('delete_approve');
	Route::get('/supplier/approve/status/{id}/{status}', 'Admin\SupplierController@approveStatus')->name('supplier_approve_status_approve');
	Route::post('/supplier/reject/status', 'Admin\SupplierController@approveStatus')->name('supplier_approve_status');
});

Route::prefix('task')->group(function() {
	Route::get('/list', 'Admin\TaskController@list')->name('task_list');
	Route::get('/data', 'Admin\TaskController@getData')->name('task_data');
});

// Rfq
Route::prefix('rfq')->group(function() {
	Route::get('/create', 'Admin\RfqController@create')->name('create_rfq');
	Route::post('/save', 'Admin\RfqController@save')->name('save_rfq');
	Route::get('/list', 'Admin\RfqController@list')->name('rfq_list');
	Route::get('/data', 'Admin\RfqController@getData')->name('rfq_data');
  Route::get('/itemdata', 'Admin\RfqController@getDataItem')->name('itemdata');
  Route::post('/save_additem', 'Admin\RfqController@saveItemData')->name('save_additem');
  Route::post('/save_additem_update', 'Admin\RfqController@saveItemDataUpdate')->name('save_additem_update');
  Route::get('/itemdatadelete', 'Admin\RfqController@deleteItemData')->name('itemdatadelete');
  Route::get('/itemdatadeletetable/{id}', 'Admin\RfqController@deleteItemDataTable')->name('itemdatadeletetable');
  Route::get('/itemdatadeletetable2/{id}', 'Admin\RfqController@deleteItemDataTable2')->name('itemdatadeletetable2');
	Route::get('/delete/{id}', 'Admin\RfqController@delete')->name('delete_rfq');
	Route::get('/view/{id}', 'Admin\RfqController@view')->name('view_rfq');
	Route::post('/update', 'Admin\RfqController@update')->name('update_rfq');
});

// Supplier Contact
Route::prefix('supplier/contact')->group(function() {
	Route::get('/create', 'Admin\SupplierContactController@create')->name('create_supplier_contact');
	Route::post('/save', 'Admin\SupplierContactController@save')->name('save_supplier_contact');
	Route::get('/list', 'Admin\SupplierContactController@list')->name('supplier_contact_list');
	Route::get('/data', 'Admin\SupplierContactController@getData')->name('supplier_contact_data');
	Route::get('/delete/{id}', 'Admin\SupplierContactController@delete')->name('delete_supplier_contact');
	Route::get('/view/{id}', 'Admin\SupplierContactController@view')->name('view_supplier_contact');
	Route::post('/update', 'Admin\SupplierContactController@update')->name('update_supplier_contact');
	Route::any('/get/{id}', 'Admin\SupplierContactController@getSupplierContact')->name('get-supplier-contact');
});

// Supplier Contact
Route::prefix('quotation')->group(function() {
	Route::get('/create', 'Admin\QuotationController@create')->name('create_quotation');
	Route::post('/save', 'Admin\QuotationController@save')->name('save_quotation');
	Route::get('/list', 'Admin\QuotationController@list')->name('quotation_list');
	Route::get('/data', 'Admin\QuotationController@getData')->name('quotation_data');
  Route::get('approve/data/{id}', 'Admin\QuotationController@getApproveData')->name('quotation_approve_data');
  Route::get('approve/data2', 'Admin\QuotationController@getApproveData2')->name('quotation_approve_data2');
	Route::get('/delete/{id}', 'Admin\QuotationController@delete')->name('delete_quotation');
	Route::get('/view/{id}', 'Admin\QuotationController@view')->name('view_quotation');
	Route::post('/update', 'Admin\QuotationController@saveUpdate')->name('update_quotation');
  Route::get('/view/approve/{id}', 'Admin\QuotationController@viewApprove')->name('view_quotation_approve');
  Route::get('/quotation/approve', 'Admin\QuotationController@approve')->name('quotation_approve');
	Route::get('/quotation/approve/status/{id}/{status}', 'Admin\QuotationController@approveStatus')->name('quotation_approve_status_approve');
  Route::post('/quotation/reject/status', 'Admin\QuotationController@approveStatus')->name('quotation_approve_status');
  Route::get('/get/{id}', 'Admin\QuotationController@getDataQuo')->name('get_quotation');

  
});

// Items
Route::prefix('items')->group(function() {
	Route::get('/create', 'Admin\ItemsController@create')->name('create_item');
	Route::get('/create-hscode', 'Admin\ItemsController@createhscode')->name('create_hscode');
	Route::post('/save', 'Admin\ItemsController@save')->name('save_item');
	Route::post('/save-hscode', 'Admin\ItemsController@savehscode')->name('save_hscode');
	Route::get('/list', 'Admin\ItemsController@list')->name('items_list');
	Route::get('/list-request', 'Admin\ItemsController@requestlist')->name('items_list_request');
	Route::get('/list-hscode', 'Admin\ItemsController@listhscode')->name('hscode_list');
	Route::get('/hscode', 'Admin\ItemsController@hscode')->name('hscode');
	Route::get('/data', 'Admin\ItemsController@getData')->name('item_data');
	Route::get('/data-req', 'Admin\ItemsController@getDataReq')->name('item_data_req');
	Route::get('/data-req/{nama}', 'Admin\ItemsController@getDataNotif')->name('item_data_notif');
	Route::get('/data-hscode', 'Admin\ItemsController@getDataHscode')->name('hscode_data');
	Route::get('/table/{productIds}/{rfiId}', 'Admin\ItemsController@itemTable')->name('item_table');
  Route::get('/table2/{productIds}/{id}', 'Admin\ItemsController@itemTable2')->name('item_table2');
  Route::get('/table3/{productIds}/{id}', 'Admin\ItemsController@itemTable3')->name('item_table3');
  Route::get('/tablerfq/{productIds}/{rfqId}', 'Admin\ItemsController@itemTableRfq')->name('item_table_rfq');
  Route::get('/tableqs/{productIds}/{qsId}', 'Admin\ItemsController@itemTableQs')->name('item_table_qs');
  Route::get('/tableqs2/{productIds}/{qsId}', 'Admin\ItemsController@itemTableQs2')->name('item_table_qs2');
  Route::get('/tableqs3/{productIds}/{id}', 'Admin\ItemsController@itemTableQs3')->name('item_table_qs3');
  Route::get('/tablepr/{productIds}/{prId}', 'Admin\ItemsController@itemTablePr')->name('item_table_pr');
  Route::get('/tablepr2/{prId}', 'Admin\ItemsController@itemTablePr2')->name('item_table_pr2');
  Route::get('/tableprEdit/{prId}', 'Admin\ItemsController@itemTablePrEdit')->name('item_table_pr2');
  Route::get('/tablepo/{productIds}/{prId}', 'Admin\ItemsController@itemTablePo')->name('item_table_po');
  Route::get('/tablepo2/{poId}', 'Admin\ItemsController@itemTablePo2')->name('item_table_po2');
  Route::get('/tablepoOffer/{productIds}/{poId}', 'Admin\ItemsController@itemTablePoOffer')->name('item_table_poOffer');
  Route::get('/tablepo3/{productIds}/{poId}', 'Admin\ItemsController@itemTablePo3')->name('item_table_po3');
	Route::get('/offer/{id}', 'Admin\ItemsController@itemnoffer')->name('item_offer_data');
	Route::get('/delete/{id}', 'Admin\ItemsController@delete')->name('delete_item');
	Route::get('/view/{id}', 'Admin\ItemsController@view')->name('view_item');
	Route::get('/save-items-req/{id}', 'Admin\ItemsController@saveItemsReq')->name('save_item_req');
	Route::post('/save-items-req', 'Admin\ItemsController@saveItemsNotif')->name('save_item_notif');
	Route::get('/reject-items-req/{id}', 'Admin\ItemsController@rejectItemsReq')->name('reject_item_req');
	Route::post('/update', 'Admin\ItemsController@update')->name('update_item');
	Route::post('/update-offer', 'Admin\ItemsController@updateoffer')->name('update_offer');
	Route::any('/inquirycustomer/get/{id}', 'Admin\ItemsController@getItemsByCustomer')->name('get-items-by-customer');
  Route::any('/inquirycustomer2/get', 'Admin\ItemsController@getItemsByCustomer2')->name('get-items-by-customer2');
  Route::any('/inquirycustomer3/get/{id}', 'Admin\ItemsController@getItemsByCustomer3')->name('get-items-by-customer3');
  Route::any('/rfqnumber/get/{id}', 'Admin\ItemsController@getItemsByRfq')->name('get-items-by-rfq');
  Route::any('/qsnumber/get/{id}', 'Admin\ItemsController@getItemsByQs')->name('get-items-by-qs');
  Route::any('/qsnumber2/get/{id}', 'Admin\ItemsController@getItemsByQs2')->name('get-items-by-qs2');
  Route::any('/qsnumber3/get', 'Admin\ItemsController@getItemsByQs3')->name('get-items-by-qs3');
  Route::any('/prnumber/get/{id}', 'Admin\ItemsController@getItemsByPr')->name('get-items-by-pr');
  Route::any('/ponumber/get/{id}', 'Admin\ItemsController@getItemsByPo')->name('get-items-by-po');

});

// Item Price
Route::prefix('item/price')->group(function() {
	Route::get('/create', 'Admin\ItemPriceController@create')->name('create_price');
	Route::post('/save', 'Admin\ItemPriceController@save')->name('save_price');
	Route::get('/list', 'Admin\ItemPriceController@list')->name('price_list');
	Route::get('/data', 'Admin\ItemPriceController@getData')->name('price_data');
	Route::get('/delete/{id}', 'Admin\ItemPriceController@delete')->name('delete_price');
	Route::get('/view/{id}', 'Admin\ItemPriceController@view')->name('view_price');
	Route::post('/update', 'Admin\ItemPriceController@update')->name('update_price');
});

// Item Quote
Route::prefix('items_quote')->group(function() {
	Route::get('/create', 'Admin\ItemsQuoteController@create')->name('create_item_quote');
	Route::post('/save', 'Admin\ItemsQuoteController@save')->name('save_item_quote');
	Route::get('/list', 'Admin\ItemsQuoteController@list')->name('item_quote_list');
	Route::get('/data', 'Admin\ItemsQuoteController@getData')->name('item_quote_data');
	Route::get('/delete/{id}', 'Admin\ItemsQuoteController@delete')->name('delete_item_quote');
	Route::get('/view/{id}', 'Admin\ItemsQuoteController@view')->name('view_item_quote');
	Route::post('/update', 'Admin\ItemsQuoteController@update')->name('update_item_quote');
});

// Item Quote Price
Route::prefix('item_quote/price')->group(function() {
	Route::get('/create', 'Admin\ItemPriceQuoteController@create')->name('create_price_quote');
	Route::post('/save', 'Admin\ItemPriceQuoteController@save')->name('save_price_quote');
	Route::get('/list', 'Admin\ItemPriceQuoteController@list')->name('price_quote_list');
	Route::get('/data', 'Admin\ItemPriceQuoteController@getData')->name('price_quote_data');
	Route::get('/delete/{id}', 'Admin\ItemPriceQuoteController@delete')->name('delete_price_quote');
	Route::get('/view/{id}', 'Admin\ItemPriceQuoteController@view')->name('view_price_quote');
	Route::post('/update', 'Admin\ItemPriceQuoteController@update')->name('update_price_quote');
});

// Item Buffer
Route::prefix('items_buffer')->group(function() {
	Route::get('/create', 'Admin\ItemsBufferController@create')->name('create_item_buffer');
	Route::post('/save', 'Admin\ItemsBufferController@save')->name('save_item_buffer');
	Route::get('/list', 'Admin\ItemsBufferController@list')->name('item_buffer_list');
	Route::get('/data', 'Admin\ItemsBufferController@getData')->name('item_buffer_data');
	Route::get('/delete/{id}', 'Admin\ItemsBufferController@delete')->name('delete_item_buffer');
	Route::get('/view/{id}', 'Admin\ItemsBufferController@view')->name('view_item_buffer');
	Route::post('/update', 'Admin\ItemsBufferController@update')->name('update_item_buffer');
	
});

// Item Buffer Price
Route::prefix('item_buffer/price')->group(function() {
	Route::get('/create', 'Admin\ItemBufferPriceController@create')->name('create_buffer_price');
	Route::post('/save', 'Admin\ItemBufferPriceController@save')->name('save_buffer_price');
	Route::get('/list', 'Admin\ItemBufferPriceController@list')->name('buffer_price_list');
	Route::get('/data', 'Admin\ItemBufferPriceController@getData')->name('buffer_price_data');
	Route::get('/delete/{id}', 'Admin\ItemBufferPriceController@delete')->name('delete_buffer_price');
	Route::get('/view/{id}', 'Admin\ItemBufferPriceController@view')->name('view_buffer_price');
	Route::post('/update', 'Admin\ItemBufferPriceController@update')->name('update_buffer_price');
});

// Purchase Request
Route::prefix('purchase_request')->group(function() {
	Route::get('/create-direct', 'Admin\PrController@createDirect')->name('create_purchase_request_direct');
	Route::get('/create', 'Admin\PrController@create')->name('create_purchase_request');
	Route::post('/save', 'Admin\PrController@save')->name('save_purchase_request');
	Route::post('/save-direct', 'Admin\PrController@saveDirect')->name('save_purchase_request_direct');
	Route::get('/list', 'Admin\PrController@list')->name('purchase_request_list');
	Route::get('/data', 'Admin\PrController@getData')->name('purchase_request_data');
	Route::get('/data-status', 'Admin\PrController@getDataFilter')->name('purchase_request_data_status');
	Route::get('/delete/{id}', 'Admin\PrController@delete')->name('delete_purchase_request');
	Route::get('/view/{id}', 'Admin\PrController@view')->name('view_purchase_request');
	Route::get('/edit/{id}', 'Admin\PrController@edit')->name('edit_purchase_request');
	Route::get('/print/{id}', 'Admin\PrController@print')->name('print_purchase_request');
	Route::post('/update', 'Admin\PrController@update')->name('update_purchase_request');
	Route::post('/import', 'Admin\ImportController@import_excel')->name('import');
	Route::get('/detail/{id}', 'Admin\PrController@detail')->name('detail_purchase_request');
	Route::post('/save/detail', 'Admin\PrController@saveDetail')->name('save_purchase_request_detail');
  Route::get('approve/data/{id}', 'Admin\PrController@getApproveData')->name('purchase_request_approve_data');
  Route::get('approve/data2', 'Admin\PrController@getApproveData2')->name('purchase_request_approve_data2');
  Route::get('/purchase_request/approve', 'Admin\PrController@approve')->name('purchase_request_approve');
  Route::get('/view/approve/{id}', 'Admin\PrController@viewApprove')->name('view_purchase_request_approve');
	Route::get('/purchase_request/approve/status/{id}/{status}', 'Admin\PrController@approveStatus')->name('purchase_request_approve_status_approve');
  Route::post('/purchase_request/reject/status', 'Admin\PrController@approveStatus')->name('purchase_request_approve_status');
  Route::post('/save_additem', 'Admin\PrController@saveItemData')->name('save_additem');
  Route::post('/save_additem_update', 'Admin\PrController@saveItemDataUpdate')->name('save_additem_update');
  Route::get('/itemdatadeletetable/{id}', 'Admin\PrController@deleteItemDataTable')->name('itemdatadeletetable');
  Route::get('/itemdatadeletetable2/{id}', 'Admin\PrController@deleteItemDataTable2')->name('itemdatadeletetable2');
  Route::get('/tracking', 'Admin\PrController@trackingView')->name('tracking');
  Route::get('/po-data/{id}', 'Admin\poSupplierController@getPODetail')->name('po_detail');
 
});

// Purchase Order Supplier
Route::prefix('purchase_order')->group(function() {
	Route::get('/create', 'Admin\poSupplierController@create')->name('create_purchase_order');
	Route::post('/save', 'Admin\poSupplierController@save')->name('save_purchase_order');
	Route::post('/save2', 'Admin\poSupplierController@savemultiple')->name('save_purchase_order2');
	Route::get('/list', 'Admin\poSupplierController@list')->name('purchase_order_list');
	Route::get('/data', 'Admin\poSupplierController@getData')->name('purchase_order_data');
	Route::get('/data2', 'Admin\poSupplierController@getDataDelivered')->name('purchase_order_data_delivered');
	Route::get('/delete/{id}', 'Admin\poSupplierController@delete')->name('delete_purchase_order');
	Route::get('/view/{id}', 'Admin\poSupplierController@view')->name('view_purchase_order');
	Route::get('/print/{id}', 'Admin\poSupplierController@print')->name('print_purchase_order');
	Route::get('/edit/{id}', 'Admin\poSupplierController@edit')->name('edit_purchase_order');
	Route::get('/offer/{id}', 'Admin\poSupplierController@offer')->name('offer_purchase_order');
	Route::post('/update', 'Admin\poSupplierController@update')->name('update_purchase_order');
	Route::post('/updateverify', 'Admin\poSupplierController@updateverify')->name('update_purchase_order_verify');
	Route::post('/updateapprove', 'Admin\poSupplierController@updateapprove')->name('update_purchase_order_approve');
	Route::get('/detail/{id}', 'Admin\poSupplierController@detail')->name('detail_purchase_order');
	Route::post('/save/detail', 'Admin\poSupplierController@saveDetail')->name('save_purchase_order_detail');
  Route::get('approve/data/{id}', 'Admin\poSupplierController@getApproveData')->name('purchase_order_approve_data');
  Route::get('approve/data2', 'Admin\poSupplierController@getApproveData2')->name('purchase_order_approve_data2');
  Route::get('/purchase_order/approve', 'Admin\poSupplierController@approve')->name('purchase_order_approve');
  Route::get('/view/approve/{id}', 'Admin\poSupplierController@viewApprove')->name('view_purchase_order_approve');
	Route::get('/purchase_order/approve/status/{id}/{status}', 'Admin\poSupplierController@approveStatus')->name('purchase_order_approve_status_approve');
	Route::post('/purchase_order/reject/status', 'Admin\poSupplierController@approveStatus')->name('purchase_order_approve_status');
	
	Route::get('verify/data/{id}', 'Admin\poSupplierController@getVerifyData')->name('purchase_order_verify_data');
  Route::get('verify/data2', 'Admin\poSupplierController@getVerifyData2')->name('purchase_order_verify_data2');
  Route::get('/purchase_order/verify', 'Admin\poSupplierController@verify')->name('purchase_order_verify');
  Route::get('/view/verify/{id}', 'Admin\poSupplierController@viewVerify')->name('view_purchase_order_verify');
	Route::get('/purchase_order/verify/status/{id}/{status}', 'Admin\poSupplierController@verifyStatus')->name('purchase_order_verify_status_verify');
  Route::post('/purchase_order/rejectv/status', 'Admin\poSupplierController@verifyStatus')->name('purchase_order_verify_status');
  Route::get('/pdf', 'Admin\poSupplierController@pdf')->name('pdf_purchase_order');
  Route::get('/report', 'Admin\ReportController@reportview')->name('report');
  Route::post('/filter', 'Admin\ReportController@filter')->name('filter');
});

Route::prefix('report')->group(function() {
	Route::get('/report', 'Admin\ReportController@reportview')->name('report');
	Route::get('/query-report', 'Admin\QueryController@queryview')->name('query_report');
	Route::get('/purchase-price', 'Admin\QueryController@purchasepriceview')->name('purchase_price');
	Route::get('/pr-price-data', 'Admin\QueryController@PurchasePriceRpt')->name('pr_price_data');
	Route::get('/po-data', 'Admin\QueryController@PoSup')->name('po_query_data');
	Route::get('/pr-data', 'Admin\QueryController@PrSup')->name('pr_query_data');
	Route::get('/date-analysis', 'Admin\ReportController@dateAnalysis')->name('date_analysis');
	Route::get('/po-date', 'Admin\ReportController@poData')->name('po_data');
	Route::get('/tablepodate/{id}', 'Admin\ReportController@poDateDt')->name('po_date_dt');

});