<?php
//routes
use App\Http\Livewire\Accordion;
use App\Http\Livewire\Alerts;
use App\Http\Livewire\Avatar;
use App\Http\Livewire\Background;
use App\Http\Livewire\Badge;
use App\Http\Livewire\Blog;
use App\Http\Livewire\Border;
use App\Http\Livewire\Breadcrumbs;
use App\Http\Livewire\Buttons;
use App\Http\Livewire\Calendar;
use App\Http\Livewire\Cards;
use App\Http\Livewire\Carousel;
use App\Http\Livewire\ChartChartjs;
use App\Http\Livewire\ChartEchart;
use App\Http\Livewire\ChartFlot;
use App\Http\Livewire\ChartMorris;
use App\Http\Livewire\ChartPeity;
use App\Http\Livewire\ChartSparkline;
use App\Http\Livewire\Chat;
use App\Http\Livewire\Collapse;
use App\Http\Livewire\Contacts;
use App\Http\Livewire\Counters;
use App\Http\Livewire\Display;
use App\Http\Livewire\Draggablecards;
use App\Http\Livewire\Dropdown;
use App\Http\Livewire\Editprofile;
use App\Http\Livewire\Emptypage;
use App\Http\Livewire\Error404;
use App\Http\Livewire\Error500;
use App\Http\Livewire\Extras;
use App\Http\Livewire\Faq;
use App\Http\Livewire\Flex;
use App\Http\Livewire\Forgot;
use App\Http\Livewire\FormAdvanced;
use App\Http\Livewire\FormEditor;
use App\Http\Livewire\FormElements;
use App\Http\Livewire\FormLayouts;
use App\Http\Livewire\FormValidation;
use App\Http\Livewire\FormWizards;
use App\Http\Livewire\Gallery;
use App\Http\Livewire\Height;
use App\Http\Livewire\Icons;
use App\Http\Livewire\ImageCompare;
use App\Http\Livewire\Images;
use App\Http\Livewire\Index;
use App\Http\Livewire\Invoice;
use App\Http\Livewire\ListGroup;
use App\Http\Livewire\Lockscreen;
use App\Http\Livewire\Mail;
use App\Http\Livewire\MailCompose;
use App\Http\Livewire\MailRead;
use App\Http\Livewire\MailSettings;
use App\Http\Livewire\MapLeaflet;
use App\Http\Livewire\MapVector;
use App\Http\Livewire\Margin;
use App\Http\Livewire\MediaObject;
use App\Http\Livewire\Modals;
use App\Http\Livewire\Navigation;
use App\Http\Livewire\Notification;
use App\Http\Livewire\Padding;
use App\Http\Livewire\Pagination;
use App\Http\Livewire\Popover;
use App\Http\Livewire\Position;
use App\Http\Livewire\Pricing;
use App\Http\Livewire\ProductCart;
use App\Http\Livewire\ProductDetails;
use App\Http\Livewire\Products;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Progress;
use App\Http\Livewire\Rangeslider;
use App\Http\Livewire\Rating;
use App\Http\Livewire\Reset;
use App\Http\Livewire\Search;
use App\Http\Livewire\Signin;
use App\Http\Livewire\Signup;
use App\Http\Livewire\Spinners;
use App\Http\Livewire\SweetAlert;
use App\Http\Livewire\TableBasic;
use App\Http\Livewire\TableData;
use App\Http\Livewire\Tabs;
use App\Http\Livewire\Tags;
use App\Http\Livewire\Thumbnails;
use App\Http\Livewire\Timeline;
use App\Http\Livewire\Toast;
use App\Http\Livewire\Todotask;
use App\Http\Livewire\Tooltip;
use App\Http\Livewire\Treeview;
use App\Http\Livewire\Typography;
use App\Http\Livewire\Underconstruction;
use App\Http\Livewire\Userlist;
use App\Http\Livewire\WidgetNotification;
use App\Http\Livewire\Widgets;
use App\Http\Livewire\Width;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StagesController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WpmController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FullCalenderController;

Route::get('clear', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'Cache cleared';
});

// Route::get('/', function () {
//     return view('livewire.index');
// });

// cron jobs urls
Route::match(['get','post'], 'cron/enquiry-reminder', [HomeController::class, 'enquiryReminder']);
Route::match(['get','post'], 'cron/payment-cycle', [HomeController::class, 'paymentCycleReminder']);

Route::match(['get','post'],'/',[AdminController::class, 'login'])->name('log');
Route::match(['get','post'],'forgot-password/',[AdminController::class, 'forgotPassword']);
Route::get('logout',[AdminController::class, 'logout']);

Route::match(['get','post'],'login/google/',[AdminController::class, 'googleLogin']);
Route::get('/callback',[AdminController::class, 'googleCallback']);


// Admin routes
Auth::routes();
Route::group(['prefix'=>'/'], function(){
    Route::group(['middleware'=>'admin_auth'],function(){

    	Route::get('getcards', [HomeController::class, 'getCards']);

    	// authentication and acc settings
		Route::get('/dashboard',[AdminController::class, 'dashboard']);
		Route::get('/check-pwd',[AdminController::class, 'chkPassword']);
		Route::get('/change-password',[AdminController::class, 'changePassword']);
		Route::post('update-pwd',[AdminController::class, 'updatePassword']);

		// user
		Route::match(['get','post'], 'add-user', [AdminController::class, 'addUser']);
		Route::match(['get','post'], 'view-users', [AdminController::class, 'viewUsers']);
		Route::match(['get','post'], 'edit-user/{id}', [AdminController::class, 'editUser']);
		Route::match(['get','post'], 'delete-user/{id}', [AdminController::class, 'deleteUser']);
		Route::match(['get','post'], 'update-user-status/', [AdminController::class, 'updateStatus']);
		Route::match(['get','post'], 'profile', [AdminController::class, 'adminProfile']);
		Route::match(['get','post'], 'settings', [AdminController::class, 'settings']);
		Route::match(['get','post'], 'indiamartAPIUpdate', [AdminController::class, 'indiamartAPIUpdate']);
		
		Route::match(['get','post'], 'user/roles', [AdminController::class, 'userRoles']);
		Route::match(['get','post'], 'role/create', [AdminController::class, 'roleCreate']);
		Route::match(['get','post'], 'role/edit/{id}', [AdminController::class, 'roleEdit']);
		Route::match(['get','post'], 'delete-role/{id}', [AdminController::class, 'deleteRole']);

		// order
		Route::match(['get','post'], 'add-order/', [OrdersController::class, 'addOrder']);
		Route::match(['get','post'], 'view-orders/{status?}', [OrdersController::class, 'viewOrders']);
		Route::match(['get','post'], 'edit-order/{id}', [OrdersController::class, 'editOrder']);
		Route::match(['get','post'], 'delete-order/{id}', [OrdersController::class, 'deleteOrder']);
		Route::match(['get','post'], 'delete-equipment/{id}', [OrdersController::class, 'deleteEquipment']);
		Route::match(['get','post'], 'view-order-modal/', [OrdersController::class, 'viewOrderModal']);
		Route::match(['get','post'], 'update-order-status/', [OrdersController::class, 'updateOrderStatus']);
		Route::match(['get','post'], 'update-order-assignee/', [OrdersController::class, 'updateOrderAssignee']);
		Route::match(['get','post'], 'order-booking-sheet/{fy?}', [OrdersController::class, 'OrderBookingSheet']);
		Route::match(['get','post'], 'order-booking-sheet-report/{fy?}', [OrdersController::class, 'OBSExcelReport']);
		Route::match(['get','post'], 'obf-tracker/{fy?}', [OrdersController::class, 'OBF']);
		Route::match(['get','post'], 'obf-report/{fy?}', [OrdersController::class, 'OBFExcelReport']);

		Route::match(['get','post'], 'add-fy-target', [OrdersController::class, 'addFYTarget'])->name('add_fy_target');
		Route::match(['get','post'], 'add-se-target', [OrdersController::class, 'addSETarget'])->name('add_se_target');
		Route::match(['get','post'], 'delete-fy-target/{id}', [OrdersController::class, 'deleteFYTarget'])->name('delete_fy_target');
		Route::match(['get','post'], 'delete-se-target/{id}', [OrdersController::class, 'deleteSETarget'])->name('delete_se_target');

		Route::match(['get','post'], 'view-order-payment-cashflow/', [OrdersController::class, 'viewOrderPaymentCashflow']);
		Route::match(['get','post'], 'delete-payment-cashflow/{id}', [OrdersController::class, 'deletePaymentCashflow']);		
		Route::match(['get','post'], 'payment-cashflow/{id}/{client?}', [OrdersController::class, 'PaymentCashflow']);
		Route::match(['get','post'], 'payment-tracker/', [OrdersController::class, 'PaymentTracker']);
		Route::match(['get','post'],'update-payment-status/', [OrdersController::class, 'updatePaymentStatus']);
		Route::match(['get','post'],'update-poamt-status/', [OrdersController::class, 'updatePoAmountStatus']);
		Route::match(['get','post'],'edit-payment-cycle-modal', [OrdersController::class, 'editPaymentCycleModal']);
		Route::match(['get','post'],'add-payment-cycle/{id}', [OrdersController::class, 'addPaymentCycle']);
		Route::match(['get','post'],'update-payment-cycle/{id}', [OrdersController::class, 'updatePaymentCycle']);
		Route::match(['get','post'],'delete-payment-cycle/{id}', [OrdersController::class, 'deletePaymentCycle']);
		Route::match(['get','post'],'update-payment-terms/{add-equipment-stagesid}', [OrdersController::class, 'updatePaymentTerms']);

		// equipment stages
		Route::match(['get','post'], 'add-equipment-stages/', [StagesController::class, 'addStage']);
		Route::get('view-equipment-stages/', [StagesController::class, 'viewStages']);
		Route::get('view-equipment-stages/{equipment_name}/{id?}', [StagesController::class, 'viewEquipmentStages']);
		Route::match(['get','post'],'edit-stage/{id}', [StagesController::class, 'editStage']);
		Route::get('delete-stage/{id}', [StagesController::class, 'deleteStage']);
		Route::get('order-stages/{equip_id}/{equipment}/{order_id?}', [OrdersController::class, 'orderStages']);
		Route::match(['get','post'], 'update-stage-remark/', [OrdersController::class, 'stageRemark']);
		Route::get('get-stage-detail/', [StagesController::class, 'getStageDetail']);
		Route::get('get-sub-stage/', [StagesController::class, 'subStageDetail']);
		Route::Post('add-sub-stage/', [StagesController::class, 'addSubStage']);
		Route::match(['get','post'], 'delete-order-stage/{id}', [OrdersController::class, 'deleteOrderStage']);

		Route::match(['get','post'],'add-attachments', [OrdersController::class, 'addAttachments']);
		Route::match(['get','post'],'view-attachments/{order_id}/{stage_id}', [OrdersController::class, 'viewAttachments']);
		Route::match(['get','post'],'delete-attachment/{id}', [OrdersController::class, 'deleteAttachment']);
		Route::match(['get','post'],'update-stage-status/', [OrdersController::class, 'updateOrderStages']);
		Route::get('update-sub-stage-status/', [OrdersController::class, 'updateOrderSubStages']);
		Route::match(['get','post'],'get-stage-attachment/', [OrdersController::class, 'getStageAttachments']);

		Route::match(['get','post'],'order-report/{id}', [OrdersController::class, 'orderReport']);
		// Route::match(['get','post'],'order-view-report/{id1?}/{id2?}/{id3?}', [OrdersController::class, 'orderViewReport']);
		Route::get('order-view-report/{id1?}/{id2?}/{id3?}', [OrdersController::class, 'orderViewReport'])->name('order-view-report');
		
		Route::get('add-field', [OrdersController::class, 'addField'])->name('add-field');
		// equipment type
		Route::match(['get','post'], 'add-equipment-type', [StagesController::class, 'addEquipmentType']);
		Route::match(['get','post'], 'edit-equipment-type/', [StagesController::class, 'editType']);
		Route::match(['get','post'], 'update-equipment-type/{id}', [StagesController::class, 'updateType']);
		Route::match(['get','post'], 'delete-equipment-type/{id}', [StagesController::class, 'deleteEquipmentType']);
		Route::match(['get','post'], 'view-equipment-types', [StagesController::class, 'viewEquipmentTypes']);

		// enquiry log
		Route::match(['get','post'], 'add-enquiry/', [EnquiryController::class, 'AddEnquiry']);
		Route::match(['get','post'], 'edit-enquiry/{id}', [EnquiryController::class, 'EditEnquiry']);
		Route::match(['get','post'], 'view-enquiry-logs/{id?}', [EnquiryController::class, 'ViewEnquiries']);
		Route::match(['get','post'], 'delete-enquiry/{id}', [EnquiryController::class, 'DeleteEnquiry']);
		Route::match(['get','post'], 'view-enquiry-details', [EnquiryController::class, 'ViewEnquiryDetail']);
		Route::match(['get','post'], 'detail-enquiry/{id?}', [EnquiryController::class, 'EnquiryDetail']);
		Route::match(['get','post'], 'add-indiamart-enq', [EnquiryController::class, 'addIndiaMartEnquiry']);
		Route::match(['get','post'], 'get-indiamart-enq', [EnquiryController::class, 'GetIndiaMartEnquiries']);
		Route::match(['get','post'], 'view-indiamart-enq', [EnquiryController::class, 'ViewIndiaMartEnquiries']);
		Route::match(['get','post'], 'search-enquiry', [EnquiryController::class, 'searchEnq']);
		Route::match(['get','post'], 'add-note', [EnquiryController::class, 'addNote']);
		Route::match(['get','post'], 'delete-note', [EnquiryController::class, 'deleteNote']);
		Route::match(['get','post'], 'add-reminder', [EnquiryController::class, 'addReminder']);
		Route::match(['get','post'], 'delete-reminder', [EnquiryController::class, 'deleteReminder']);
		Route::match(['get','post'], 'add-label/', [EnquiryController::class, 'addLabel']);
		Route::match(['get','post'], 'delete-label', [EnquiryController::class, 'deleteLabel']);
		Route::match(['get','post'], 'add-enq-labels', [EnquiryController::class, 'addEnqLabels']);
		Route::match(['get','post'], 'assign-enquiry', [EnquiryController::class, 'assignEnquiry']);
		Route::match(['get','post'], 'enquiry-report/{status?}', [EnquiryController::class, 'enquiryReport']);
		Route::match(['get','post'], 'enquiry-report-export/', [EnquiryController::class, 'EnquiryExcelReport']);
		Route::match(['get','post'], 'add-indiamart-enquiries', [EnquiryController::class, 'addIMEnquiries']);
		Route::match(['get','post'], 'update-enquiry-status/', [EnquiryController::class, 'updateEnquiryStatus']);
		Route::post('/import',[EnquiryController::class,'import'])->name('import');
		Route::get('/export-users',[EnquiryController::class,'exportUsers'])->name('export-users');

		//wpm action tracker
		Route::match(['get','post'], 'wpm-action-tracker/', [WpmController::class, 'WpmActionTracker']);
		Route::match(['get','post'], 'view-wpm-action-tracker/{so?}/{equip_id?}/{client_name?}/{po_date?}/{delivery_date?}', [WpmController::class, 'WpmActionTrackerView']);
		Route::match(['get','post'], 'view-wpm-task/{id?}/{so?}/{equip_id?}/{client_name?}/{po_date?}/{delivery_date?}', [WpmController::class, 'WpmTaskView']);
		Route::match(['get','post'], 'edit-wpm-task/{id?}/{equip_id?}', [WpmController::class, 'WpmTaskEdit']);
		Route::match(['get','post'], 'update-wpm-task/', [WpmController::class, 'updateWpmTask']);
		Route::match(['get','post'], 'add-wpm-task/{id?}/{equip_id?}', [WpmController::class, 'addTask']);
		Route::match(['get','post'], 'update-wpm-status/', [WpmController::class, 'updateWpmStatus']);
		Route::get('/action-user-change',[WpmController::class, 'actionUserChange']);
		Route::match(['get','post'], 'add-wpm-comment', [WpmController::class, 'addComment']);
		Route::match(['get','post'], 'delete-wpm-comment', [WpmController::class, 'deleteComment']);
		Route::match(['get','post'], 'delete-wpm/{id}', [WpmController::class, 'DeleteWpm']);

		// Route::match(['get','post'], 'add-new-field/', [WpmController::class, 'addNewField']);
		// Route::match(['get','post'], 'event-mgt-calender/', [EventController::class, 'EventmgtCalender']);
		// Route::post('calendar-crud-ajax', [EventController::class, 'calendarEvents']);

		Route::get('planner', [FullCalenderController::class, 'index']);
		Route::post('fullcalenderAjax', [FullCalenderController::class, 'ajax']);
		Route::match(['get','post'], 'list-view-planner', [FullCalenderController::class, 'listviewplanner']);
		Route::match(['get','post'], '/send-whatsapp-message', [FullCalenderController::class, 'sendWhatsAppMessage']);

		// engineers
		Route::match(['get','post'], 'view-engineers/', [AdminController::class, 'ViewEngineers']);
		Route::match(['get','post'], 'add-engineer/', [AdminController::class, 'addEngineer']);
		Route::match(['get','post'], 'edit-engineer/{id}', [AdminController::class, 'editEngineer']);
		Route::match(['get','post'], 'get-engineer-detail/', [AdminController::class, 'getEngineer']);
		Route::match(['get','post'], 'delete-engineer/{id}', [AdminController::class, 'deleteEngineer']);
		Route::match(['get','post'], 'update-engineer-status/', [AdminController::class, 'engineerStatus']);

		Route::match(['get','post'], 'kanban-board', [HomeController::class, 'planning']);
		Route::match(['get','post'], 'add-task', [HomeController::class, 'addTask']);

		Route::match(['get','post'], 'equipment-excel-report/{order_id?}/{equip_id?}', [OrdersController::class, 'equipmentExcelReport']);
		
		Route::match(['get','post'], 'post-sortable', [StagesController::class, 'updateStage']);
		Route::get('underconstruction', function () { return view('admin.underconstruction_page'); });
	});
});



// Superadmin routes
Route::match(['get','post'],'superadmin/login',[UserController::class, 'login']);
Route::group(['prefix'=>'superadmin/'], function(){
    Route::group(['middleware'=>'auth'],function(){
    	Route::match(['get','post'],'dashboard',[UserController::class, 'dashboard']);
    	Route::match(['get','post'],'logout',[UserController::class, 'logout']);
    });
});








Route::get('accordion', Accordion::class);
Route::get('alerts', Alerts::class);
Route::get('avatar', Avatar::class);
Route::get('background', Background::class);
Route::get('badge', Badge::class);
Route::get('blog', Blog::class);
Route::get('border', Border::class);
Route::get('breadcrumbs', Breadcrumbs::class);
Route::get('buttons', Buttons::class);
Route::get('calendar', Calendar::class);
Route::get('cards', Cards::class);
Route::get('carousel', Carousel::class);
Route::get('chart-chartjs', ChartChartjs::class);
Route::get('chart-echart', ChartEchart::class);
Route::get('chart-flot', ChartFlot::class);
Route::get('chart-morris', ChartMorris::class);
Route::get('chart-peity', ChartPeity::class);
Route::get('chart-sparkline', ChartSparkline::class);
Route::get('chat', Chat::class);
Route::get('collapse', Collapse::class);
Route::get('contacts', Contacts::class);
Route::get('counters', Counters::class);
Route::get('display', Display::class);
Route::get('draggablecards', Draggablecards::class);
Route::get('dropdown', Dropdown::class);
Route::get('editprofile', Editprofile::class);
Route::get('emptypage', Emptypage::class);
Route::get('extras', Extras::class);
Route::get('faq', Faq::class);
Route::get('flex', Flex::class);
Route::get('forgot', Forgot::class);
Route::get('form-advanced', FormAdvanced::class);
Route::get('form-editor', FormEditor::class);
Route::get('form-elements', FormElements::class);
Route::get('form-layouts', FormLayouts::class);
Route::get('form-validation', FormValidation::class);
Route::get('form-wizards', FormWizards::class);
Route::get('gallery', Gallery::class);
Route::get('height', Height::class);
Route::get('icons', Icons::class);
Route::get('image-compare', ImageCompare::class);
Route::get('images', Images::class);
Route::get('index', Index::class);
Route::get('invoice', Invoice::class);
Route::get('list-group', ListGroup::class);
Route::get('lockscreen', Lockscreen::class);
Route::get('mail', Mail::class);
Route::get('mail-compose', MailCompose::class);
Route::get('mail-read', MailRead::class);
Route::get('mail-settings', MailSettings::class);
Route::get('map-leaflet', MapLeaflet::class);
Route::get('map-vector', MapVector::class);
Route::get('margin', Margin::class);
Route::get('media-object', MediaObject::class);
Route::get('modals', Modals::class);
Route::get('navigation', Navigation::class);
Route::get('notification', Notification::class);
Route::get('padding', Padding::class);
Route::get('pagination', Pagination::class);
Route::get('popover', Popover::class);
Route::get('position', Position::class);
Route::get('pricing', Pricing::class);
Route::get('product-cart', ProductCart::class);
Route::get('product-details', ProductDetails::class);
Route::get('products', Products::class);
Route::get('profile', Profile::class);
Route::get('progress', Progress::class);
Route::get('rangeslider', Rangeslider::class);
Route::get('rating', Rating::class);
Route::get('reset', Reset::class);
Route::get('search', Search::class);
Route::get('signin', Signin::class);
Route::get('signup', Signup::class);
Route::get('spinners', Spinners::class);
Route::get('sweet-alert', SweetAlert::class);
Route::get('table-basic', TableBasic::class);
Route::get('table-data', TableData::class);
Route::get('tabs', Tabs::class);
Route::get('tags', Tags::class);
Route::get('thumbnails', Thumbnails::class);
Route::get('timeline', Timeline::class);
Route::get('toast', Toast::class);
Route::get('todotask', Todotask::class);
Route::get('tooltip', Tooltip::class);
Route::get('treeview', Treeview::class);
Route::get('typography', Typography::class);
Route::get('underconstruction-temp', Underconstruction::class);
Route::get('userlist', Userlist::class);
Route::get('widget-notification', WidgetNotification::class);
Route::get('widgets', Widgets::class);
Route::get('width', Width::class);
Route::get('error500', Error500::class);
Route::get('error404', Error404::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
