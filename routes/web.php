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


Route::get('/',	function()
	{
		return view('login');
	}
);

Route::resource('out', 'MessageOutController');
Route::resource('home', 'MessageController');
Route::resource('bills', 'BillController');
Route::resource('Operators', 'OperatorController');
Route::resource('Customers', 'CustomerController');
Route::resource('CustomerGateway', 'GatewayController');
Route::resource('SMSRate', 'SMSRateController');
Route::resource('Users', 'UserController');
Route::resource('ApiUser', 'ApiUserController');
Route::resource('SwitchSetting', 'SwitchController');

/* Message Inbox */
Route::get('incoming', 'MessageController@incoming');
/* Log Generator */
Route::get('logs', 'MessageController@logs');
Route::get('deliveredLogs', 'MessageController@deliveredLogs');
Route::get('sentLogs', 'MessageController@sentLogs');
Route::get('undeliveredLogs', 'MessageController@undeliveredLogs');
/*Log Search*/ 
Route::post('logs', 'MessageController@logs');
Route::post('deliveredLogs', 'MessageController@deliveredLogs');
Route::post('sentLogs', 'MessageController@sentLogs');
Route::post('undeliveredLogs', 'MessageController@undeliveredLogs');
/* Report Generator */
Route::get('SenderReport', 'MessageController@SenderReport');
Route::get('GatewayReport', 'MessageController@GatewayReport');
Route::get('GatewayReportDetails/{Gateway?}/{from_date?}/{to_date?}', 'MessageController@GatewayReportDetails');
Route::get('ConnectorReport', 'MessageController@ConnectorReport');
/*Report Search*/ 
Route::post('SenderReport', 'MessageController@SenderReport');
Route::post('GatewayReport', 'MessageController@GatewayReport');
Route::post('ConnectorReport', 'MessageController@ConnectorReport');
/* Bill Generator */
Route::get('Bills', 'BillController@Bills');
Route::get('PartBills', 'BillController@PartBills');
Route::get('SingleBills', 'BillController@SingleBills');
/* Bill Search */
Route::post('Bills', 'BillController@Bills');
Route::post('PartBills', 'BillController@PartBills');
Route::post('SingleBills', 'BillController@SingleBills');
Route::get('SingleBillDetails/{ClientId?}/{from_date?}/{to_date?}', 'BillController@SingleBillDetails');
Route::get('PartsBillDetails/{ClientId?}/{from_date?}/{to_date?}', 'BillController@PartsBillDetails');
Route::put('ResetError', 'MessageController@ResetError');

// Gateway Switch
Route::get('ErrorSwitch', 'GatewayController@ErrorSwitch');
Route::get('AutoSwitch', 'GatewayController@AutoSwitch');
Route::get('GatewaySwitch/{Gateway?}/{Action?}', 'GatewayController@GatewaySwitch');


Route::get('ErrorSwitch', 'GatewayController@ErrorSwitch');
/* Admin Auth */
Auth::routes();
Route::get('/', 'MessageController@index')->name('home');