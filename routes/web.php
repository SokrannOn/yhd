<?php
    Route::get('/','DefaultController@index');
//    ->middleware('checklog');
    Route::get('/change/password','DefaultController@changePassword')->middleware('checklog');
    Route::post('/changed/pass/success','DefaultController@changedPass')->middleware('checklog');

    Route::group(['middleware'=>['checklog','changePassword','web']],function (){
        Route::get('/home','DefaultController@index');
        Route::get('/admin','DefaultController@AdminPanel');
        Route::get('/role/view','RoleController@index');
        Route::post('/admin/create/role','RoleController@createRole');
        Route::get('/admin/delete/role/{id}','RoleController@deleteRole');
        Route::get('/admin/update/role/edit/{id}','RoleController@edit');
        Route::get('/admin/role/update/{id}','RoleController@updateRole');
        Route::patch('/admin/role/update/{id}','RoleController@updateRole');


        //user
        Route::get('/admin/user','UserController@create');
        Route::post('/admin/user/stored','UserController@stored');

        Route::get('/admin/user/edit/{id}','UserController@edit');
        Route::patch('/admin/user/update/{id}','UserController@update');
        Route::get('/admin/user/view/{id}','UserController@viewUser');
        Route::get('/admin/user/delete/{id}','UserController@delete');
        Route::get('/admin/get/user','UserController@getUserList');
        Route::get('/admin/reset/password/{id}','UserController@resetPassword');
        Route::patch('/admin/reset/user/password/{id}','UserController@resetPasswordSuccess');

        //category
        Route::resource('category','CategoryController');
        Route::get('/admin/category/delete/{id}','CategoryController@delete');
        Route::get('/admin/category/edit/{id}','CategoryController@edit');

        //productlist
        Route::get('/admin/productlist/create','ProductlistController@create');
        Route::post('/admin/productlist/store','ProductlistController@store');
        Route::get('/admin/get/productlist','ProductlistController@getTableProductlist');
        Route::get('/admin/productlist/delete/{id}','ProductlistController@delete');
        Route::get('/admin/productlist/edit/{id}','ProductlistController@editProlist');
        Route::patch('/admin/productlist/update/{id}','ProductlistController@updateProlist');

        //channel
        Route::get('/admin/channel/create','ChannelController@create');
        Route::post('/admin/channel/store','ChannelController@store');
        Route::get('/admin/channel/delete/{id}','ChannelController@delete');
        Route::get('/admin/channel/edit/{id}','ChannelController@edit');
        Route::patch('/admin/channel/update/{id}','ChannelController@update');

        //customer
        Route::get('/admin/customer/create','CustomerController@create');
        Route::post('/admin/customer/store','CustomerController@store');
        Route::get('/admin/get/customerlist','CustomerController@getTableCustomerlist');

        //Province
        Route::get('/admin/province/create/{name}','CustomerController@createProvince');
        Route::get('/admin/get/select/province','CustomerController@selectProvince');
        Route::get('/admin/getDistrict/{id}','CustomerController@getDistrict');

        //District
        Route::get('/admin/district/create/{name}/{province_id}','CustomerController@createDistrict');
        Route::get('/admin/get/select/district/{province_id}','CustomerController@selectDistrict');
        Route::get('/admin/getCommune/{id}','CustomerController@getCommune');

        //Commune
        Route::get('/admin/commune/create/{name}/{district_id}','CustomerController@createCommune');
        Route::get('/admin/get/select/commune/{district_id}','CustomerController@selectCommune');
        Route::get('/admin/getVillage/{id}','CustomerController@getVillage');

        //Commune
        Route::get('/admin/village/create/{name}/{commune_id}','CustomerController@createVillage');
        Route::get('/admin/get/select/village/{commune_id}','CustomerController@selectVillage');

        //customer
        Route::get('/admin/customer/delete/{id}','CustomerController@deleteCustomer');
        Route::get('/admin/customer/edit/{id}','CustomerController@editCustomer');
        Route::patch('/admin/customer/update/{id}','CustomerController@updateCustomer');
        Route::get('/admin/customer/view/{id}','CustomerController@viewCustomer');

        //Supplier
        Route::resource('/supplier','SupplierController');
        Route::get('/supplier/get','SupplierController@index');
        Route::get('/admin/supplier/delete/{id}','SupplierController@destroy');
        Route::get('/admin/supplier/edit/{id}','SupplierController@edit');
        Route::patch('/admin/supplier/update/{id}','SupplierController@update');


        //pricelist
        Route::get('/admin/pricelist/create','PricelistController@create');
        Route::get('/admin/get/pricelist','PricelistController@getTabalePricelist');
        Route::post('/admin/pricelist/store','PricelistController@store');
        Route::get('/admin/pricelist/delete/{id}','PricelistController@delete');
        Route::get('/admin/pricelist/edit/{id}','PricelistController@edit');
        Route::patch('/admin/pricelist/update/{id}','PricelistController@update');


        //stock in
        Route::resource('/stock','StockController');




        //yhd route
        //department Route
        Route::get('/admin/department/create','DepartmentController@create');
        Route::get('/admin/department/view','DepartmentController@view');
        Route::post('/admin/department/store','DepartmentController@store');
        Route::get('/admin/department/delete/{id}','DepartmentController@delete');
        Route::get('/admin/department/edit/{id}','DepartmentController@edit');
        Route::patch('/admin/department/update/{id}','DepartmentController@update');

        //Position Route
        Route::get('/admin/position/create','PositionController@create');
        Route::get('/admin/position/view','PositionController@view');
        Route::post('/admin/position/store','PositionController@store');
        Route::get('/admin/position/delete/{id}','PositionController@delete');
        Route::get('/admin/position/edit/{id}','PositionController@edit');
        Route::patch('/admin/position/update/{id}','PositionController@update');



    });

























Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
