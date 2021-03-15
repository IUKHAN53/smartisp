<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');


Route::middleware('auth')->group(function (){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/test', 'MikrotikController@test')->name('test');
    Route::get('/monitor', 'HomeController@traffic_monitor')->name('tr_monitor');
    Route::post('package/setSyn/{id}', 'PackageController@setSyn')->name('set_synonym');
    Route::resource('user', 'UserController');
    Route::resource('roles', 'RoleController');
    Route::resource('permission', 'PermissionController');
    Route::resource('mikrotik', 'MikrotikController');
    Route::resource('package', 'PackageController');
    Route::resource('customer', 'CustomerController');
    Route::resource('zone', 'ZoneController');
    Route::resource('ipaddress', 'IpaddressController');
    Route::resource('policestation', 'PolicestationController');
    Route::resource('pop', 'PopController');
    Route::resource('queue', 'QueueController');
    Route::resource('queuetype', 'QueuetypeController');
    Route::resource('customertype', 'Customer_typeController');
    Route::resource('hotspot', 'HotspotController');
    Route::resource('hotspotprofile', 'HotspotProfileController');
    Route::any('hotspotuser/batch', 'HotspotUserController@createBatch');
    Route::resource('hotspotuser', 'HotspotUserController');
    Route::resource('ippool', 'PoolController');
    Route::resource('optical', 'OpticalController');
    Route::resource('splitter', 'SplitterController');
    Route::get('chartofaccounts/list', 'ChartofaccountController@list');
    Route::resource('chartofaccounts', 'ChartofaccountController');
    Route::post('/journals/search','JournalController@search');
    Route::resource('journals', 'JournalController');
    Route::get('/ledger', 'LedgerController@index');
    Route::get('/payment', 'PaymentController@index');
    Route::post('/payment/search', 'PaymentController@search');
    Route::post('/ledgers/search', 'LedgerController@search');
    Route::resource('accounts', 'AccountController');
    Route::any('/franchise/createuser', 'FranchiseController@createUser');
    Route::any('/pop/createuser', 'PopController@createUser');
    Route::resource('franchise', 'FranchiseController');
    Route::any('hotspotuser/hosts', 'HotspotUserController@getHosts');
    Route::get('/dhcp', 'ExtraController@getDHCP');
    Route::any('/setsession/setActive', 'ExtraController@setActive');
    Route::any('/sync', 'ExtraController@syncget');
    Route::any('/sync/{name}', 'ExtraController@sync');
    Route::any('/migrate', 'ExtraController@migrate');
    Route::any('/getprofile', 'ExtraController@getprofiles')->name('getprofile');
    Route::get('/server', 'ExtraController@servers')->name('server');
    Route::any('/server/create', 'ExtraController@createserver')->name('createserver');
    Route::any('/getpon', 'ExtraController@getpon')->name('getpon');

    Route::resource('/productcategory','ProductCategoryController');
    Route::resource('/productunit','ProductUnitController');
    Route::resource('/productbrand','ProductBrandController');
    Route::resource('/productvendor','ProductVendorController');
    Route::get('/product/office','ProductController@officeproducts');
    Route::get('/product/office/create','ProductController@createofficeproducts');
    Route::resource('/product','ProductController');
    Route::resource('/purchase','PurchaseOrderController');
    Route::get('/getproducts','ProductController@getproducts');
    Route::get('/getvendors','ProductVendorController@getvendors');
    Route::get('/getpurchase','PurchaseOrderController@getpurchase');
    Route::get('/billing','BillingController@index');
    Route::get('/billing/pay/{id}','BillingController@payBill');
    Route::get('/billing/edit/{id}','BillingController@edit');
    Route::Post('/billing/edit/{id}','BillingController@update');
    Route::Post('billing/receivePayment','BillingController@receiveBill');
    Route::get('/invoice/{id}/{type}','BillingController@invoice');
    Route::get('/getbillings','BillingController@getBillings');
    Route::post('/changeDate','BillingController@changeDueDate');
    Route::get('/getcustomers','CustomerController@getCustomers');

//CRM
    Route::resource('ticket', 'TicketController');
    Route::get('/ticket-category', 'TicketController@category')->name('ticket-category');
    Route::get('/ticket-category/create', 'TicketController@category_create')->name('ticket-category.create');
    Route::post('/ticket-category/store', 'TicketController@category_store')->name('ticket-category.store');
    Route::delete('/ticket-category/{ticketCategory}', 'TicketController@category_destroy')->name('ticket-category.delete');

//HRM
    Route::resource('position', 'PositionController');
    Route::resource('department', 'DepartmentController');
    Route::resource('employee', 'EmployeeController');
    Route::resource('salary', 'SalaryController');
    Route::resource('leave', 'LeavpooleController');
    Route::resource('employee-leave', 'EmployeeLeaveController');


//    District
//    Route::resource('district', 'DistrictController');

});

Route::get('/run-migrations',function (){
    Artisan::call('migrate --seed', array('--path' => 'app/migrations'));
});

Route::get('/run-migrations-fresh',function (){
    Artisan::call('migrate:fresh --seed', array('--path' => 'app/migrations'));
});
