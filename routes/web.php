<?php

use App\Http\Controllers\AirLineController;
use App\Http\Controllers\AirPortController;
use App\Http\Controllers\AirQuotationController;
use App\Http\Controllers\BisnisPartyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\ChargeCodeController;
use App\Http\Controllers\ChargeTableController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CommodityController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContainerController;
use App\Http\Controllers\CostTableController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DataAjaxController;
use App\Http\Controllers\DeliveryTypeController;
use App\Http\Controllers\IncotermsController;
use App\Http\Controllers\JobTypeController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PartyTypeController;
use App\Http\Controllers\PaymentTermController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PortController;
use App\Http\Controllers\QuotationTypeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SalesmanController;
use App\Http\Controllers\SeaQuotationController;
use App\Http\Controllers\ShippingLineController;
use App\Http\Controllers\SystemNumberingController;
use App\Http\Controllers\UomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VatCodeController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\VesselController;
use App\Http\Controllers\WtCodeController;
use App\Models\SeaQuotation;

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

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
Route::post('/change_db_connection', [LoginController::class, 'change_db_connection'])->middleware('guest')->name('change_db');
Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'prevent-back-history']], function () {
	Route::get('/', [HomeController::class, 'index']);
	Route::resource('/users', UserController::class);
	Route::resource('/modules', ModuleController::class);
	Route::resource('/roles', RoleController::class);
	Route::resource('/country', CountryController::class);
	Route::resource('/permissions', PermissionController::class);
	Route::resource('/city', CityController::class);
	Route::resource('/port', PortController::class);
	Route::resource('/commodity', CommodityController::class);
	Route::resource('/container', ContainerController::class);
	Route::resource('/job_type', JobTypeController::class);
	Route::resource('/currency', CurrencyController::class);
	Route::resource('/vat_code', VatCodeController::class);
	Route::resource('/uom', UomController::class);
	Route::resource('/charge_code', ChargeCodeController::class);
	Route::resource('/wt_code', WtCodeController::class);
	Route::resource('/sys_numbering', SystemNumberingController::class);
	Route::resource('/party_type', PartyTypeController::class);
	Route::resource('/pay_term', PaymentTermController::class);
	Route::resource('/salesman', SalesmanController::class);
	Route::resource('/bisnis_party', BisnisPartyController::class);
	Route::resource('/customer', CustomerController::class);
	Route::resource('/vendors', VendorController::class);
	Route::resource('/airport', AirPortController::class);
	Route::resource('/airline', AirLineController::class);
	Route::resource('/shipline', ShippingLineController::class);
	Route::resource('/vessel', VesselController::class);
	Route::resource('/incoterms', IncotermsController::class);
	Route::resource('/charge_table', ChargeTableController::class);
	Route::resource('/cost_table', CostTableController::class);
	Route::resource('/quotation_type', QuotationTypeController::class);
	Route::resource('/sea_quot', SeaQuotationController::class);
	Route::resource('/del_type', DeliveryTypeController::class);
	Route::resource('/air_quot', AirQuotationController::class);
	Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
	Route::get('/pdf_sea_quot/{sea_quot}', [SeaQuotationController::class, 'pdf'])->name('pdf.sea');
	Route::get('/pdf_air_quot/{air_quot}', [AirQuotationController::class, 'pdf'])->name('pdf.air');
	Route::get('/company', [CompanyController::class, 'index'])->name('company');
	Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static');
	Route::get('/roles_access/{id}', [RoleController::class, 'roles_access'])->name('roles.access');
	Route::get('users/{user}/update-password', [UserController::class, 'reset_password'])->name('reset.password');
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('/company', [CompanyController::class, 'store'])->name('company.store');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::post('/update_template', [HomeController::class, 'update_template'])->name('update.template');
	Route::post('/ajax_get_container', [DataAjaxController::class, 'ajax_get_container'])->name('get.container');
	Route::post('/ajax_get_port', [DataAjaxController::class, 'ajax_get_port'])->name('get.port');
	Route::post('/ajax_get_country', [DataAjaxController::class, 'ajax_get_country'])->name('get.country');
	Route::post('/ajax_get_city', [DataAjaxController::class, 'ajax_get_city'])->name('get.city');
	Route::post('/ajax_get_currency', [DataAjaxController::class, 'ajax_get_currency'])->name('get.currency');
	Route::post('/ajax_get_detail_currency', [DataAjaxController::class, 'ajax_get_detail_currency'])->name('get.detail.currency');
	Route::post('/ajax_get_uom', [DataAjaxController::class, 'ajax_get_uom'])->name('charge.uom');
	Route::post('/ajax_get_charge', [DataAjaxController::class, 'ajax_get_charge'])->name('charge.item');
	Route::post('/ajax_get_wht', [DataAjaxController::class, 'ajax_get_wht'])->name('charge.wht');
	Route::post('/ajax_get_vat', [DataAjaxController::class, 'ajax_get_vat'])->name('get.vat');
	Route::post('/ajax_get_job_type', [DataAjaxController::class, 'ajax_get_job_type'])->name('charge.job');
	Route::post('/ajax_get_job_type_not_unique', [DataAjaxController::class, 'ajax_get_job_type_not_unique'])->name('job.notunique');
	Route::post('/ajax_get_module', [DataAjaxController::class, 'ajax_get_module'])->name('all.module');
	Route::post('/ajax_get_vendor', [DataAjaxController::class, 'ajax_get_vendor'])->name('get.vendor');
	Route::post('/ajax_get_cus_type', [DataAjaxController::class, 'ajax_get_cus_type'])->name('get.custype');
	Route::post('/ajax_get_payment_term', [DataAjaxController::class, 'ajax_get_payment_term'])->name('get.payterm');
	Route::post('/ajax_get_salesman', [DataAjaxController::class, 'ajax_get_salesman'])->name('get.salesman');
	Route::post('/ajax_get_customer', [DataAjaxController::class, 'ajax_get_customer'])->name('get.customer');
	Route::post('/ajax_get_bisnis_party', [DataAjaxController::class, 'ajax_get_bisnis_party'])->name('get.bisnis.party');
	Route::post('/ajax_get_vendor_type', [DataAjaxController::class, 'ajax_get_vendor_type'])->name('get.ventype');
	Route::post('/ajax_get_shipline', [DataAjaxController::class, 'ajax_get_shipline'])->name('get.shipline');
	Route::post('/ajax_store_short', [DataAjaxController::class, 'ajax_store_short'])->name('save.cus.short');
	Route::post('/ajax_change_date', [DataAjaxController::class, 'ajax_change_date'])->name('change.date');
	Route::post('/ajax_quot_type', [DataAjaxController::class, 'ajax_quot_type'])->name('get.quot.type');
	Route::post('/ajax_del_type', [DataAjaxController::class, 'ajax_del_type'])->name('get.del.type');
	Route::post('/ajax_commodity', [DataAjaxController::class, 'ajax_commodity'])->name('get.commodity');
	Route::post('/ajax_format_currency', [DataAjaxController::class, 'ajax_format_currency'])->name('format.currency');
	Route::post('/ajax_get_charge_table', [DataAjaxController::class, 'ajax_get_charge_table'])->name('get.charge.table');
	Route::post('/ajax_get_airport', [DataAjaxController::class, 'ajax_get_airport'])->name('get.airport');
	Route::post('/ajax_get_airline', [DataAjaxController::class, 'ajax_get_airline'])->name('get.airline');
	Route::post('attach-permission/{role_id}', [PermissionController::class, 'attachPermission'])->name('permission.attach');
	Route::post('detach-permission/{role_id}', [PermissionController::class, 'detachPermission'])->name('permission.detach');
});
