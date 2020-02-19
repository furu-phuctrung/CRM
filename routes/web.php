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



Auth::routes();

Route::get('/', 'HomeController@customer')->name('home');

Route::get('/home', 'HomeController@customer')->name('home');

Route::get('/customer/department', 'HomeController@customerdepartment')->name('customerdepartment');

Route::get('/customer/all', 'HomeController@customerall')->name('customerall');

Route::get('/icon', 'HomeController@geticon')->name('geticon');

Route::get('/enable-2fa','SecurityController@generate2faSecret')->name('generate2faSecret');

Route::post('/enable-2fa','SecurityController@enable2fa')->name('enable2fa');

Route::get('/disable-2fa','SecurityController@getdisable2fa')->name('getdisable2fa');

Route::post('/disable-2fa','SecurityController@disable2fa')->name('postdisable2fa');

Route::get('/login2fa','SecurityController@login2fa')->name('login2fa');

Route::post('/login2fa', function () { return redirect(URL()->previous()); })->name('login2fa')->middleware('2fa');


  // cài đặt chung
route::get('/cai-dat-chung', ['uses'=>'Setting\SettingController@setting'])->name('setting');

route::post('/cai-dat-chung/them-quoc-gia', ['uses'=>'Setting\SettingController@addquocgia'])->name('addquocgia');

route::post('/cai-dat-chung/them-thanh-pho', ['uses'=>'Setting\SettingController@addthanhpho'])->name('addthanhpho');

route::post('/cai-dat-chung/them-quan-huyen', ['uses'=>'Setting\SettingController@addquanhuyen'])->name('addquanhuyen');


// cài crm
route::get('/cai-dat-crm', ['uses'=>'Setting\SettingCrmController@settingcrm'])->name('settingcrm');

route::post('/cai-dat-crm/them-nhom-khach-hang', ['uses'=>'Setting\SettingCrmController@addcustomergroup'])->name('addcustomergroup');

route::post('/cai-dat-crm/them-nguon-khach-hang', ['uses'=>'Setting\SettingCrmController@addcustomerresource'])->name('addcustomerresource');

route::post('/cai-dat-crm/them-nhom-san-pham', ['uses'=>'Setting\SettingCrmController@addproductgroup'])->name('addproductgroup');

route::post('/cai-dat-crm/them-san-pham', ['uses'=>'Setting\SettingCrmController@addproduct'])->name('addproduct');

route::post('/cai-dat-crm/them-don-vi-tinh', ['uses'=>'Setting\SettingCrmController@addunit'])->name('addunit');

route::post('/cai-dat-crm/them-moi-quan-he', ['uses'=>'Setting\SettingCrmController@addrelationships'])->name('addrelationships');

route::post('/cai-dat-crm/them-phuong-thuc-thanh-toan', ['uses'=>'Setting\SettingCrmController@addmethodpayment'])->name('addmethodpayment');

route::get('/thong-tin-ca-nhan', 'UsersController@settingprofile')->name('profile');

route::post('/thay-doi-thong-tin-ca-nhan', 'UsersController@changeprofile')->name('changeprofile');

route::post('/thay-doi-mat-khau', 'UsersController@changepass')->name('changepass');

route::get('/search/customer', ['uses'=>'Setting\CustomerController@searchcustomer'])->name('searchcustomer');

Route::match(['get', 'post'], '/search/customerdepartment', ['uses'=>'Setting\CustomerController@searchcustomerdepartment'])->name('searchcustomerdepartment');







route::get('/search/customermanager', ['uses'=>'Setting\CustomerController@searchcustomermanager'])->name('searchcustomermanager');

route::get('/customer/{id}', ['uses'=>'Setting\CustomerController@customer'])->name('customer');

route::post('/customer', ['uses'=>'Setting\CustomerController@addcomment'])->name('addcomment');

route::post('/customer/change-relation-ship', ['uses'=>'Setting\CustomerController@change_relation'])->name('change_relation');



route::get('/customer/status/{id}', ['uses'=>'Setting\CustomerController@viewstatus'])->name('viewstatus');

route::get('/customer-department/status/{id}', ['uses'=>'Setting\CustomerController@viewstatusdepartment'])->name('viewstatusdepartment');

route::get('/customer-manager/status/{id}', ['uses'=>'Setting\CustomerController@viewstatusmanager'])->name('viewstatusmanager');

route::post('/customer/mota', ['uses'=>'Setting\CustomerController@postMota'])->name('customer.postMota');

route::get('/add-customer', ['uses'=>'Setting\CustomerController@getaddnewcustomer'])->name('getaddcustomer');

route::post('/add-customer', ['uses'=>'Setting\CustomerController@postaddnewcustomer'])->name('postcustomer');

route::post('/upadte-customer', ['uses'=>'Setting\CustomerController@postupdatecustomer'])->name('postupdatecustomer');

route::post('/get-comment', 'HomeController@getcomment')->name('getcomment');

route::post('/post-comment', 'HomeController@postcomment')->name('postcomment');

Route::get('/thong-tin-cong-ty', ['uses'=>'Setting\InfocompanyController@thongtincongty'])->name('thongtincongty');

route::get('/cai-dat-logs', ['uses'=>'Setting\LogsController@settinglogs'])->name('settinglogs');

route::get('/quan-ly-nguoi-dung', ['uses'=>'Setting\SettingUserController@settinglistusers'])->name('settingusers');

route::get('/Khoa-quyen-nguoi-dung/{id}', ['uses'=>'Setting\SettingUserController@banuser'])->name('banned');

route::get('/mo-Khoa-quyen-nguoi-dung/{id}', ['uses'=>'Setting\SettingUserController@activeuser'])->name('activeuser');

route::get('/sua-thong-tin-nguoi-dung/{id}', ['uses'=>'Setting\SettingUserController@editusers'])->name('edituser');

route::get('/them-nguoi-dung', ['uses'=>'Setting\SettingUserController@settingadduser'])->name('addusers');

route::post('/them-nguoi-dung', ['uses'=>'Setting\SettingUserController@adduser'])->name('adduser');

route::get('/quan-ly-phong-ban', ['uses'=>'Setting\DepartmentController@settingdepartment'])->name('department');

route::get('/phong-ban', ['uses'=>'Setting\DepartmentController@datadepartment'])->name('datadepartment');

route::get('/them-phong-ban', ['uses'=>'Setting\DepartmentController@settingadddepartment'])->name('settingadddepartment');

route::post('/them-phong-ban', ['uses'=>'Setting\DepartmentController@adddepartment'])->name('adddepartment');




route::post('/chuyen-khach', ['uses'=>'Setting\CustomerController@postchangeusersowner'])->name('postchangeusersowner');


route::get('/cai-dat-chuyen-doi-dau-so', ['uses'=>'Setting\ToolController@settingchuyendoidauso'])->name('settingchuyendoidauso');

route::get('/cai-dat-thong-bao', ['uses'=>'Setting\NotificationController@settingthongbao'])->name('settingthongbao');



//Khach hang
Route::prefix('khach-hang')->group(function () {
    Route::post('importCustomer',['uses'=>'Customer\CustomerImportController@postUploadCustomer'])->name('customer.postUploadCustomer');

});

//Khach hang moi
Route::prefix('khach-hang-moi')->group(function () {
    Route::get('',['uses'=>'Customer\NewCustomerController@getList'])->name('listcustomernew');
    Route::post('importNewCustomer',['uses'=>'Customer\NewCustomerController@postUploadCustomer'])->name('listcustomernew.postUploadCustomer');
    Route::post('shareCustomer',['uses'=>'Customer\NewCustomerController@postShareCustomer'])->name('listcustomernew.shareCustomer');
});

//Phan quyen
Route::prefix('permission')->group(function () {

    Route::prefix('group')->group(function () {
        Route::get('list',['uses'=>'Permission\PermissionGroupController@getList'])->name('permission.permissionGroup.getList');
        Route::post('create',['uses'=>'Permission\PermissionGroupController@postCreate'])->name('permission.permissionGroup.postCreate');
        Route::get('edit',['uses'=>'Permission\PermissionGroupController@getEdit'])->name('permission.permissionGroup.getEdit');
        Route::post('edit',['uses'=>'Permission\PermissionGroupController@postEdit'])->name('permission.permissionGroup.postEdit');
        Route::get('delete/{id}',['uses'=>'Permission\PermissionGroupController@getDelete'])->name('permission.permissionGroup.getDelete');
    });

    Route::prefix('user')->group(function () {
        Route::get('list',['uses'=>'Permission\PermissionUserController@getList'])->name('permission.user.getList');
        Route::get('edit',['uses'=>'Permission\PermissionUserController@getEdit'])->name('permission.user.getEdit');
        Route::post('edit',['uses'=>'Permission\PermissionUserController@postEdit'])->name('permission.user.postEdit');
    });

});

Route::get('passs', function(){
    return Hash::make('123456');
});

// Route::get('export/customer/', 'ExcelController@exportCustomer');
