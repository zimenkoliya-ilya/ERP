<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//////////////////////////////////   employee  ///////////////////////////////
Route::get('/employee_list', [App\Http\Controllers\Admin\EmployeeController::class, 'employee_list'])->name('employee_list');
Route::get('/employee_list/view/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'employee_list_list_view'])->name('employee_list.view');
Route::get('/employee_list/edit/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'employee_list_list_edit'])->name('employee_list.edit');
Route::post('/employee_list/update/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'employee_list_list_update'])->name('employee_list.update');
Route::post('/employee_list/timeoff_update/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'employee_list_list_timeoff_update'])->name('employee_list.timeoff_update');
Route::post('/employee_list/timeoff_extend/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'employee_list_list_timeoff_extend'])->name('employee_list.timeoff_extend');
Route::post('/employee_list/timeoff_add/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'employee_list_list_timeoff_add'])->name('employee_list.timeoff_add');
Route::post('/employee_list/image_upload/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'employee_list_list_image_upload'])->name('employee_list.image_upload');
Route::get('/employee_quick_working', [App\Http\Controllers\Admin\EmployeeController::class, 'employee_quick_working'])->name('employee_quick_working');
//employee recruitment list//
Route::get('/employee_recruitment_list', [App\Http\Controllers\Admin\EmployeeController::class, 'employee_recruitment_list'])->name('employee_recruitment_list');
Route::get('/new_employee_createview', [App\Http\Controllers\Admin\EmployeeController::class, 'new_employee_createview'])->name('new_employee_createview');
Route::post('/new_employee_create', [App\Http\Controllers\Admin\EmployeeController::class, 'new_employee_create'])->name('new_employee_create');
Route::get('/employee_list_view/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'employee_list_view'])->name('employee_list_view');
Route::get('/employee_list_edit/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'employee_list_edit'])->name('employee_list_edit');
Route::post('/employee_list_edit/family_create', [App\Http\Controllers\Admin\EmployeeController::class, 'recruiment_family_create'])->name('employee_list_edit.create_family');
Route::post('/employee_list_edit/family_delete', [App\Http\Controllers\Admin\EmployeeController::class, 'recruiment_family_delete'])->name('employee_list_edit.delete_family');
Route::post('/employee_list_edit/relative_create', [App\Http\Controllers\Admin\EmployeeController::class, 'recruiment_relative_create'])->name('employee_list_edit.create_relative');
Route::post('/employee_list_edit/relative_delete', [App\Http\Controllers\Admin\EmployeeController::class, 'recruiment_relative_delete'])->name('employee_list_edit.delete_relative');
Route::post('/employee_list_edit/education_create', [App\Http\Controllers\Admin\EmployeeController::class, 'recruiment_education_create'])->name('employee_list_edit.create_education');
Route::post('/employee_list_edit/education_delete', [App\Http\Controllers\Admin\EmployeeController::class, 'recruiment_education_delete'])->name('employee_list_edit.delete_education');
Route::post('/employee_list_edit/training_create', [App\Http\Controllers\Admin\EmployeeController::class, 'recruiment_training_create'])->name('employee_list_edit.create_training');
Route::post('/employee_list_edit/training_delete', [App\Http\Controllers\Admin\EmployeeController::class, 'recruiment_training_delete'])->name('employee_list_edit.delete_training');
Route::post('/employee_list_edit/work_create', [App\Http\Controllers\Admin\EmployeeController::class, 'recruiment_work_create'])->name('employee_list_edit.create_work');
Route::post('/employee_list_edit/work_delete', [App\Http\Controllers\Admin\EmployeeController::class, 'recruiment_work_delete'])->name('employee_list_edit.delete_work');
//thisis employee list 
Route::post('/employee_list_edit/contract_create/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'recruiment_contract_create'])->name('employee_list_edit.create_contract');
Route::post('/employee_list_edit/contract_edit/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'recruiment_contract_edit'])->name('employee_list_edit.edit_contract');
Route::post('/employee_list_edit/contract_delete', [App\Http\Controllers\Admin\EmployeeController::class, 'recruiment_contract_delete'])->name('employee_list_edit.delete_contract');
Route::post('/employee_list_edit/decision_create/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'recruiment_decision_create'])->name('employee_list_edit.create_decision');
Route::post('/employee_list_edit/decision_edit/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'recruiment_decision_edit'])->name('employee_list_edit.edit_decision');
Route::post('/employee_list_edit/decision_delete', [App\Http\Controllers\Admin\EmployeeController::class, 'recruiment_decision_delete'])->name('employee_list_edit.delete_decision');
Route::post('/employee_list_edit/salary_create/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'recruiment_salary_create'])->name('employee_list_edit.create_salary');
Route::post('/employee_list_edit/salary_edit/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'recruiment_salary_edit'])->name('employee_list_edit.edit_salary');
Route::post('/employee_list_edit/salary_delete', [App\Http\Controllers\Admin\EmployeeController::class, 'recruiment_salary_delete'])->name('employee_list_edit.delete_salary');

Route::post('/edit_employee/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'edit_employee'])->name('edit_employee');
Route::post('/employee_delete', [App\Http\Controllers\Admin\EmployeeController::class, 'employee_delete'])->name('employee_delete');
Route::post('/hire_employee', [App\Http\Controllers\Admin\EmployeeController::class, 'hire_employee'])->name('hire_employee');
Route::get('/employee/search', [App\Http\Controllers\Admin\EmployeeController::class, 'employee_search'])->name('employee.search');


/////////////////////////////////    Timeoff and Time sheet  //////////////////////
Route::get('/timeoff', [App\Http\Controllers\Admin\TimeController::class, 'timeoff'])->name('timeoff');
Route::get('/timesheet', [App\Http\Controllers\Admin\TimeController::class, 'timesheet'])->name('timesheet');

///////////////////////////////     camp  management   ///////////////////////////////////////////
Route::get('/camp/loglist', [App\Http\Controllers\Admin\CampController::class, 'camp_loglist'])->name('camp_loglist');
Route::get('/camp/loglist/create', [App\Http\Controllers\Admin\CampController::class, 'loglist_create'])->name('camp.loglist.create');
Route::post('/camp/loglist/store', [App\Http\Controllers\Admin\CampController::class, 'loglist_store'])->name('camp.loglist.store');
Route::get('/camp/loglist/edit/{id}', [App\Http\Controllers\Admin\CampController::class, 'loglist_edit'])->name('camp.loglist.edit');
Route::post('/camp/loglist/update/{id}', [App\Http\Controllers\Admin\CampController::class, 'loglist_update'])->name('camp.loglist.update');
Route::post('/camp/loglist/destroy', [App\Http\Controllers\Admin\CampController::class, 'loglist_destroy'])->name('camp.loglist.destroy');
Route::post('/camp/loglist/roomget', [App\Http\Controllers\Admin\CampController::class, 'loglist_roomget'])->name('camp.loglist.roomget');
Route::post('/camp/loglist/bedget', [App\Http\Controllers\Admin\CampController::class, 'loglist_bedget'])->name('camp.loglist.bedget');
Route::post('/camp/loglist/active', [App\Http\Controllers\Admin\CampController::class, 'loglist_active'])->name('camp.loglist.active');

Route::get('/camp/camplist', [App\Http\Controllers\Admin\CampController::class, 'camp_camplist'])->name('camp_camplist');
Route::get('/camp/camplist/create', [App\Http\Controllers\Admin\CampController::class, 'camplist_create'])->name('camp.camplist.create');
Route::post('/camp/camplist/store', [App\Http\Controllers\Admin\CampController::class, 'camplist_store'])->name('camp.camplist.store');
Route::get('/camp/camplist/edit/{id}', [App\Http\Controllers\Admin\CampController::class, 'camplist_edit'])->name('camp.camplist.edit');
Route::post('/camp/camplist/update/{id}', [App\Http\Controllers\Admin\CampController::class, 'camplist_update'])->name('camp.camplist.update');
Route::get('/camp/camplist/destroy/{id}', [App\Http\Controllers\Admin\CampController::class, 'camplist_destroy'])->name('camp.camplist.destroy');

Route::get('/camp/roomlist', [App\Http\Controllers\Admin\CampController::class, 'camp_roomlist'])->name('camp_roomlist');
Route::get('/camp/roomlist/create', [App\Http\Controllers\Admin\CampController::class, 'roomlist_create'])->name('camp.roomlist.create');
Route::post('/camp/roomlist/store', [App\Http\Controllers\Admin\CampController::class, 'roomlist_store'])->name('camp.roomlist.store');
Route::get('/camp/roomlist/edit/{id}', [App\Http\Controllers\Admin\CampController::class, 'roomlist_edit'])->name('camp.roomlist.edit');
Route::post('/camp/roomlist/update/{id}', [App\Http\Controllers\Admin\CampController::class, 'roomlist_update'])->name('camp.roomlist.update');
Route::get('/camp/roomlist/destroy/{id}', [App\Http\Controllers\Admin\CampController::class, 'roomlist_destroy'])->name('camp.roomlist.destroy');

Route::get('/camp/bedlist', [App\Http\Controllers\Admin\CampController::class, 'camp_bedlist'])->name('camp_bedlist');
Route::get('/camp/bedlist/create', [App\Http\Controllers\Admin\CampController::class, 'bedlist_create'])->name('camp.bedlist.create');
Route::post('/camp/bedlist/store', [App\Http\Controllers\Admin\CampController::class, 'bedlist_store'])->name('camp.bedlist.store');
Route::get('/camp/bedlist/edit/{id}', [App\Http\Controllers\Admin\CampController::class, 'bedlist_edit'])->name('camp.bedlist.edit');
Route::post('/camp/bedlist/update/{id}', [App\Http\Controllers\Admin\CampController::class, 'bedlist_update'])->name('camp.bedlist.update');
Route::get('/camp/bedlist/destroy/{id}', [App\Http\Controllers\Admin\CampController::class, 'bedlist_destroy'])->name('camp.bedlist.destroy');
Route::post('/camp/bedlist/active', [App\Http\Controllers\Admin\CampController::class, 'bedlist_active'])->name('camp.bedlist.active');

//////////////////////////////      equipment     ////////////////////////////////////
Route::get('/equipment/technic_list', [App\Http\Controllers\Admin\EquipmentController::class, 'equipment_technic_list'])->name('equipment_technic_list');
Route::get('/equipment/technic_list/create', [App\Http\Controllers\Admin\EquipmentController::class, 'technic_list_create'])->name('equipment.technic_list.create');
Route::get('/equipment/technic_list/search', [App\Http\Controllers\Admin\EquipmentController::class, 'technic_list_search'])->name('equipment.technic_list.search');
Route::post('/equipment/technic_list/get_customer', [App\Http\Controllers\Admin\EquipmentController::class, 'get_customer'])->name('equipment.technic_list.get_customer');
Route::post('/equipment/technic_list/store', [App\Http\Controllers\Admin\EquipmentController::class, 'technic_list_store'])->name('equipment.technic_list.store');
Route::get('/equipment/technic_list/view/{id}', [App\Http\Controllers\Admin\EquipmentController::class, 'technic_list_view'])->name('equipment.technic_list.view');
Route::get('/equipment/technic_list/edit/{id}', [App\Http\Controllers\Admin\EquipmentController::class, 'technic_list_edit'])->name('equipment.technic_list.edit');
Route::post('/equipment/technic_list/update/{id}', [App\Http\Controllers\Admin\EquipmentController::class, 'technic_list_update'])->name('equipment.technic_list.update');
Route::post('/equipment/technic_list/destroy/{id}', [App\Http\Controllers\Admin\EquipmentController::class, 'technic_list_destroy'])->name('equipment.technic_list.destroy');
 
//////////////////////////////       repair      ////////////////////////////////////
Route::get('/repair/repair_list', [App\Http\Controllers\Admin\RepairController::class, 'repair_list'])->name('repair_list');
Route::get('/repair/list/create', [App\Http\Controllers\Admin\RepairController::class, 'list_create'])->name('repair.list.create');
Route::post('/repair/list/store', [App\Http\Controllers\Admin\RepairController::class, 'list_store'])->name('repair.list.store');
Route::get('/repair/list/active/{id}', [App\Http\Controllers\Admin\RepairController::class, 'list_active'])->name('repair.list.active');
Route::post('/repair/list/get_data', [App\Http\Controllers\Admin\RepairController::class, 'list_get_data'])->name('repair.list.get_data');
Route::get('/repair/list/edit/{id}', [App\Http\Controllers\Admin\RepairController::class, 'list_edit'])->name('repair.list.edit');
Route::post('/repair/list/update/{id}', [App\Http\Controllers\Admin\RepairController::class, 'list_update'])->name('repair.list.update');
Route::get('/repair/list/destroy/{id}', [App\Http\Controllers\Admin\RepairController::class, 'list_destroy'])->name('repair.list.destroy');

Route::get('/repair/repair_replacement', [App\Http\Controllers\Admin\RepairController::class, 'repair_replacement'])->name('repair_replacement');
Route::get('/repair/transaction/create', [App\Http\Controllers\Admin\RepairController::class, 'transaction_create'])->name('repair.transaction.create');
Route::post('/repair/transaction/store', [App\Http\Controllers\Admin\RepairController::class, 'transaction_store'])->name('repair.transaction.store');
Route::post('/repair/transaction/get_data', [App\Http\Controllers\Admin\RepairController::class, 'transaction_get_data'])->name('repair.transaction.get_data');
Route::get('/repair/transaction/edit/{id}', [App\Http\Controllers\Admin\RepairController::class, 'transaction_edit'])->name('repair.transaction.edit');
Route::post('/repair/transaction/update/{id}', [App\Http\Controllers\Admin\RepairController::class, 'transaction_update'])->name('repair.transaction.update');
Route::get('/repair/transaction/destroy/{id}', [App\Http\Controllers\Admin\RepairController::class, 'transaction_destroy'])->name('repair.transaction.destroy');

//////////////////////////  setting   ///////////////////////////////////
Route::get('/setting/country', [App\Http\Controllers\Admin\SettingController::class, 'country'])->name('setting.country');
Route::get('/setting/country/create', [App\Http\Controllers\Admin\SettingController::class, 'country_create'])->name('setting.country.create');
Route::post('/setting/country/store', [App\Http\Controllers\Admin\SettingController::class, 'country_store'])->name('setting.country.store');
Route::get('/setting/country/edit/{id}', [App\Http\Controllers\Admin\SettingController::class, 'country_edit'])->name('setting.country.edit');
Route::post('/setting/country/update/{id}', [App\Http\Controllers\Admin\SettingController::class, 'country_update'])->name('setting.country.update');
Route::get('/setting/country/destroy/{id}', [App\Http\Controllers\Admin\SettingController::class, 'country_destroy'])->name('setting.country.destroy');

Route::get('/setting/blood_type', [App\Http\Controllers\Admin\SettingController::class, 'blood_type'])->name('setting.blood_type');
Route::get('/setting/blood_type/create', [App\Http\Controllers\Admin\SettingController::class, 'blood_type_create'])->name('setting.blood_type.create');
Route::post('/setting/blood_type/store', [App\Http\Controllers\Admin\SettingController::class, 'blood_type_store'])->name('setting.blood_type.store');
Route::get('/setting/blood_type/edit/{id}', [App\Http\Controllers\Admin\SettingController::class, 'blood_type_edit'])->name('setting.blood_type.edit');
Route::post('/setting/blood_type/update/{id}', [App\Http\Controllers\Admin\SettingController::class, 'blood_type_update'])->name('setting.blood_type.update');
Route::get('/setting/blood_type/destroy/{id}', [App\Http\Controllers\Admin\SettingController::class, 'blood_type_destroy'])->name('setting.blood_type.destroy');

Route::get('/setting/education_type', [App\Http\Controllers\Admin\SettingController::class, 'education_type'])->name('setting.education_type');
Route::get('/setting/education_type/create', [App\Http\Controllers\Admin\SettingController::class, 'education_type_create'])->name('setting.education_type.create');
Route::post('/setting/education_type/store', [App\Http\Controllers\Admin\SettingController::class, 'education_type_store'])->name('setting.education_type.store');
Route::get('/setting/education_type/edit/{id}', [App\Http\Controllers\Admin\SettingController::class, 'education_type_edit'])->name('setting.education_type.edit');
Route::post('/setting/education_type/update/{id}', [App\Http\Controllers\Admin\SettingController::class, 'education_type_update'])->name('setting.education_type.update');
Route::get('/setting/education_type/destroy/{id}', [App\Http\Controllers\Admin\SettingController::class, 'education_type_destroy'])->name('setting.education_type.destroy');

Route::get('/setting/department', [App\Http\Controllers\Admin\SettingController::class, 'department'])->name('setting.department');
Route::get('/setting/department/create', [App\Http\Controllers\Admin\SettingController::class, 'department_create'])->name('setting.department.create');
Route::post('/setting/department/store', [App\Http\Controllers\Admin\SettingController::class, 'department_store'])->name('setting.department.store');
Route::get('/setting/department/edit/{id}', [App\Http\Controllers\Admin\SettingController::class, 'department_edit'])->name('setting.department.edit');
Route::post('/setting/department/update/{id}', [App\Http\Controllers\Admin\SettingController::class, 'department_update'])->name('setting.department.update');
Route::get('/setting/department/destroy/{id}', [App\Http\Controllers\Admin\SettingController::class, 'department_destroy'])->name('setting.department.destroy');
Route::post('/setting/department/active', [App\Http\Controllers\Admin\SettingController::class, 'department_active'])->name('setting.department.active');

Route::get('/setting/family_type', [App\Http\Controllers\Admin\SettingController::class, 'family_type'])->name('setting.family_type');
Route::get('/setting/family_type/create', [App\Http\Controllers\Admin\SettingController::class, 'family_type_create'])->name('setting.family_type.create');
Route::post('/setting/family_type/store', [App\Http\Controllers\Admin\SettingController::class, 'family_type_store'])->name('setting.family_type.store');
Route::get('/setting/family_type/edit/{id}', [App\Http\Controllers\Admin\SettingController::class, 'family_type_edit'])->name('setting.family_type.edit');
Route::post('/setting/family_type/update/{id}', [App\Http\Controllers\Admin\SettingController::class, 'family_type_update'])->name('setting.family_type.update');
Route::get('/setting/family_type/destroy/{id}', [App\Http\Controllers\Admin\SettingController::class, 'family_type_destroy'])->name('setting.family_type.destroy');

Route::get('/setting/position', [App\Http\Controllers\Admin\SettingController::class, 'position'])->name('setting.position');
Route::get('/setting/position/create', [App\Http\Controllers\Admin\SettingController::class, 'position_create'])->name('setting.position.create');
Route::post('/setting/position/store', [App\Http\Controllers\Admin\SettingController::class, 'position_store'])->name('setting.position.store');
Route::get('/setting/position/edit/{id}', [App\Http\Controllers\Admin\SettingController::class, 'position_edit'])->name('setting.position.edit');
Route::post('/setting/position/update/{id}', [App\Http\Controllers\Admin\SettingController::class, 'position_update'])->name('setting.position.update');
Route::get('/setting/position/destroy/{id}', [App\Http\Controllers\Admin\SettingController::class, 'position_destroy'])->name('setting.position.destroy');
Route::post('/setting/position/active', [App\Http\Controllers\Admin\SettingController::class, 'position_active'])->name('setting.position.active');
Route::post('/setting/position/company_search', [App\Http\Controllers\Admin\SettingController::class, 'position_company_search'])->name('setting.position.company_search');
Route::post('/setting/position/text_search', [App\Http\Controllers\Admin\SettingController::class, 'position_text_search'])->name('setting.position.text_search');

Route::get('/setting/make', [App\Http\Controllers\Admin\SettingController::class, 'make'])->name('setting.make');
Route::get('/setting/make/create', [App\Http\Controllers\Admin\SettingController::class, 'make_create'])->name('setting.make.create');
Route::post('/setting/make/store', [App\Http\Controllers\Admin\SettingController::class, 'make_store'])->name('setting.make.store');
Route::get('/setting/make/edit/{id}', [App\Http\Controllers\Admin\SettingController::class, 'make_edit'])->name('setting.make.edit');
Route::post('/setting/make/update/{id}', [App\Http\Controllers\Admin\SettingController::class, 'make_update'])->name('setting.make.update');
Route::get('/setting/make/destroy/{id}', [App\Http\Controllers\Admin\SettingController::class, 'make_destroy'])->name('setting.make.destroy');

Route::get('/setting/model', [App\Http\Controllers\Admin\SettingController::class, 'model'])->name('setting.model');
Route::get('/setting/model/create', [App\Http\Controllers\Admin\SettingController::class, 'model_create'])->name('setting.model.create');
Route::post('/setting/model/store', [App\Http\Controllers\Admin\SettingController::class, 'model_store'])->name('setting.model.store');
Route::get('/setting/model/edit/{id}', [App\Http\Controllers\Admin\SettingController::class, 'model_edit'])->name('setting.model.edit');
Route::post('/setting/model/update/{id}', [App\Http\Controllers\Admin\SettingController::class, 'model_update'])->name('setting.model.update');
Route::get('/setting/model/destroy/{id}', [App\Http\Controllers\Admin\SettingController::class, 'model_destroy'])->name('setting.model.destroy');

Route::get('/setting/owner_status', [App\Http\Controllers\Admin\SettingController::class, 'owner_status'])->name('setting.owner_status');
Route::get('/setting/owner_status/create', [App\Http\Controllers\Admin\SettingController::class, 'owner_status_create'])->name('setting.owner_status.create');
Route::post('/setting/owner_status/store', [App\Http\Controllers\Admin\SettingController::class, 'owner_status_store'])->name('setting.owner_status.store');
Route::get('/setting/owner_status/edit/{id}', [App\Http\Controllers\Admin\SettingController::class, 'owner_status_edit'])->name('setting.owner_status.edit');
Route::post('/setting/owner_status/update/{id}', [App\Http\Controllers\Admin\SettingController::class, 'owner_status_update'])->name('setting.owner_status.update');
Route::get('/setting/owner_status/destroy/{id}', [App\Http\Controllers\Admin\SettingController::class, 'owner_status_destroy'])->name('setting.owner_status.destroy');

Route::get('/setting/company', [App\Http\Controllers\Admin\SettingController::class, 'company'])->name('setting.company');
Route::get('/setting/company/create', [App\Http\Controllers\Admin\SettingController::class, 'company_create'])->name('setting.company.create');
Route::post('/setting/company/store', [App\Http\Controllers\Admin\SettingController::class, 'company_store'])->name('setting.company.store');
Route::get('/setting/company/edit/{id}', [App\Http\Controllers\Admin\SettingController::class, 'company_edit'])->name('setting.company.edit');
Route::post('/setting/company/update/{id}', [App\Http\Controllers\Admin\SettingController::class, 'company_update'])->name('setting.company.update');
Route::get('/setting/company/destroy/{id}', [App\Http\Controllers\Admin\SettingController::class, 'company_destroy'])->name('setting.company.destroy');
Route::post('/setting/company/active', [App\Http\Controllers\Admin\SettingController::class, 'company_active'])->name('setting.company.active');

Route::get('/setting/project', [App\Http\Controllers\Admin\SettingController::class, 'project'])->name('setting.project');
Route::get('/setting/project/create', [App\Http\Controllers\Admin\SettingController::class, 'project_create'])->name('setting.project.create');
Route::post('/setting/project/store', [App\Http\Controllers\Admin\SettingController::class, 'project_store'])->name('setting.project.store');
Route::get('/setting/project/edit/{id}', [App\Http\Controllers\Admin\SettingController::class, 'project_edit'])->name('setting.project.edit');
Route::post('/setting/project/update/{id}', [App\Http\Controllers\Admin\SettingController::class, 'project_update'])->name('setting.project.update');
Route::get('/setting/project/destroy/{id}', [App\Http\Controllers\Admin\SettingController::class, 'project_destroy'])->name('setting.project.destroy');
Route::post('/setting/project/active', [App\Http\Controllers\Admin\SettingController::class, 'project_active'])->name('setting.project.active');

///////////////////// File Management   /////////////////////////////////////
Route::get('/file_management', [App\Http\Controllers\Admin\FileManagementController::class, 'index'])->name('file_management.index');
Route::post('/file_management/image_upload', [App\Http\Controllers\Admin\FileManagementController::class, 'image_upload'])->name('file_management.image_upload');
Route::get('/file_management/video', [App\Http\Controllers\Admin\FileManagementController::class, 'video'])->name('file_management.video');
Route::post('/file_management/video_upload', [App\Http\Controllers\Admin\FileManagementController::class, 'video_upload'])->name('file_management.video_upload');
Route::post('/file_management/document_upload', [App\Http\Controllers\Admin\FileManagementController::class, 'document_upload'])->name('file_management.document_upload');
Route::get('/file_management/document', [App\Http\Controllers\Admin\FileManagementController::class, 'document'])->name('file_management.document');
Route::get('/file_management/shared', [App\Http\Controllers\Admin\FileManagementController::class, 'shared'])->name('file_management.shared');
Route::post('/file_management/destroy', [App\Http\Controllers\Admin\FileManagementController::class, 'destroy'])->name('file_management.destroy');
Route::post('/file_management/shared_active', [App\Http\Controllers\Admin\FileManagementController::class, 'shared_active'])->name('file_management.shared_active');
Route::post('/file_management/all_shared', [App\Http\Controllers\Admin\FileManagementController::class, 'all_shared'])->name('file_management.all_shared');
Route::post('/file_management/all_delete', [App\Http\Controllers\Admin\FileManagementController::class, 'all_delete'])->name('file_management.all_delete');
////////////////////////////    Health ////////////////////////////////
Route::get('/health/index', [App\Http\Controllers\Admin\HealthController::class, 'index'])->name('health.index');
Route::get('/health/destroy/{id}', [App\Http\Controllers\Admin\HealthController::class, 'destroy'])->name('health.destroy');
Route::get('/health/create', [App\Http\Controllers\Admin\HealthController::class, 'create'])->name('health.create');
Route::post('/health/store', [App\Http\Controllers\Admin\HealthController::class, 'store'])->name('health.store');
Route::get('/health/edit/{id}', [App\Http\Controllers\Admin\HealthController::class, 'edit'])->name('health.edit');
Route::post('/health/update/{id}', [App\Http\Controllers\Admin\HealthController::class, 'update'])->name('health.update');
Route::get('/health/view/{id}', [App\Http\Controllers\Admin\HealthController::class, 'view'])->name('health.view');

////////////////////////////   warehouse  //////////////////////////////
Route::get('/warehouse/transaction', [App\Http\Controllers\Admin\WarehouseController::class, 'transaction'])->name('warehouse.transaction');

Route::get('/warehouse/customer', [App\Http\Controllers\Admin\WarehouseController::class, 'customer'])->name('warehouse.customer');
Route::get('/warehouse/customer/create', [App\Http\Controllers\Admin\WarehouseController::class, 'customer_create'])->name('warehouse.customer.create');
Route::post('/warehouse/customer/store', [App\Http\Controllers\Admin\WarehouseController::class, 'customer_store'])->name('warehouse.customer.store');
Route::get('/warehouse/customer/edit/{id}', [App\Http\Controllers\Admin\WarehouseController::class, 'customer_edit'])->name('warehouse.customer.edit');
Route::post('/warehouse/customer/update/{id}', [App\Http\Controllers\Admin\WarehouseController::class, 'customer_update'])->name('warehouse.customer.update');
Route::get('/warehouse/customer/destroy/{id}', [App\Http\Controllers\Admin\WarehouseController::class, 'customer_destroy'])->name('warehouse.customer.destroy');

Route::get('/warehouse/storage', [App\Http\Controllers\Admin\WarehouseController::class, 'storage'])->name('warehouse.storage');
Route::get('/warehouse/storage/create', [App\Http\Controllers\Admin\WarehouseController::class, 'storage_create'])->name('warehouse.storage.create');
Route::post('/warehouse/storage/store', [App\Http\Controllers\Admin\WarehouseController::class, 'storage_store'])->name('warehouse.storage.store');
Route::get('/warehouse/storage/edit/{id}', [App\Http\Controllers\Admin\WarehouseController::class, 'storage_edit'])->name('warehouse.storage.edit');
Route::post('/warehouse/storage/update/{id}', [App\Http\Controllers\Admin\WarehouseController::class, 'storage_update'])->name('warehouse.storage.update');
Route::get('/warehouse/storage/destroy/{id}', [App\Http\Controllers\Admin\WarehouseController::class, 'storage_destroy'])->name('warehouse.storage.destroy');

Route::get('/warehouse/item', [App\Http\Controllers\Admin\WarehouseController::class, 'item'])->name('warehouse.item');
Route::get('/warehouse/item/create', [App\Http\Controllers\Admin\WarehouseController::class, 'item_create'])->name('warehouse.item.create');
Route::post('/warehouse/item/store', [App\Http\Controllers\Admin\WarehouseController::class, 'item_store'])->name('warehouse.item.store');
Route::get('/warehouse/item/edit/{id}', [App\Http\Controllers\Admin\WarehouseController::class, 'item_edit'])->name('warehouse.item.edit');
Route::post('/warehouse/item/update/{id}', [App\Http\Controllers\Admin\WarehouseController::class, 'item_update'])->name('warehouse.item.update');
Route::get('/warehouse/item/destroy/{id}', [App\Http\Controllers\Admin\WarehouseController::class, 'item_destroy'])->name('warehouse.item.destroy');

Route::get('/warehouse/item_type', [App\Http\Controllers\Admin\WarehouseController::class, 'item_type'])->name('warehouse.item_type');
Route::post('/warehouse/item_type/store', [App\Http\Controllers\Admin\WarehouseController::class, 'item_type_store'])->name('warehouse.item_type.store');
Route::post('/warehouse/item_type/update/{id}', [App\Http\Controllers\Admin\WarehouseController::class, 'item_type_update'])->name('warehouse.item_type.update');
Route::get('/warehouse/item_type/destroy/{id}', [App\Http\Controllers\Admin\WarehouseController::class, 'item_type_destroy'])->name('warehouse.item_type.destroy');

Route::get('/warehouse/measurement', [App\Http\Controllers\Admin\WarehouseController::class, 'measurement'])->name('warehouse.measurement');
Route::post('/warehouse/measurement/store', [App\Http\Controllers\Admin\WarehouseController::class, 'measurement_store'])->name('warehouse.measurement.store');
Route::post('/warehouse/measurement/update/{id}', [App\Http\Controllers\Admin\WarehouseController::class, 'measurement_update'])->name('warehouse.measurement.update');
Route::get('/warehouse/measurement/destroy/{id}', [App\Http\Controllers\Admin\WarehouseController::class, 'measurement_destroy'])->name('warehouse.measurement.destroy');

Route::get('/warehouse/category', [App\Http\Controllers\Admin\WarehouseController::class, 'category'])->name('warehouse.category');
Route::post('/warehouse/category/store', [App\Http\Controllers\Admin\WarehouseController::class, 'category_store'])->name('warehouse.category.store');
Route::post('/warehouse/category/update/{id}', [App\Http\Controllers\Admin\WarehouseController::class, 'category_update'])->name('warehouse.category.update');
Route::get('/warehouse/category/destroy/{id}', [App\Http\Controllers\Admin\WarehouseController::class, 'category_destroy'])->name('warehouse.category.destroy');

Route::get('/warehouse/order', [App\Http\Controllers\Admin\WarehouseController::class, 'order'])->name('warehouse.order');
Route::get('/warehouse/order/create', [App\Http\Controllers\Admin\WarehouseController::class, 'order_create'])->name('warehouse.order.create');
Route::post('/warehouse/order/store', [App\Http\Controllers\Admin\WarehouseController::class, 'order_store'])->name('warehouse.order.store');
Route::get('/warehouse/order/edit/{id}', [App\Http\Controllers\Admin\WarehouseController::class, 'order_edit'])->name('warehouse.order.edit');
Route::post('/warehouse/order/update/{id}', [App\Http\Controllers\Admin\WarehouseController::class, 'order_update'])->name('warehouse.order.update');
Route::get('/warehouse/order/destroy/{id}', [App\Http\Controllers\Admin\WarehouseController::class, 'order_destroy'])->name('warehouse.order.destroy');

Route::get('/warehouse/transaction', [App\Http\Controllers\Admin\WarehouseController::class, 'transaction'])->name('warehouse.transaction');
Route::get('/warehouse/transaction/create', [App\Http\Controllers\Admin\WarehouseController::class, 'transaction_create'])->name('warehouse.transaction.create');
Route::post('/warehouse/transaction/store', [App\Http\Controllers\Admin\WarehouseController::class, 'transaction_store'])->name('warehouse.transaction.store');
Route::get('/warehouse/transaction/edit/{id}', [App\Http\Controllers\Admin\WarehouseController::class, 'transaction_edit'])->name('warehouse.transaction.edit');
Route::post('/warehouse/transaction/update/{id}', [App\Http\Controllers\Admin\WarehouseController::class, 'transaction_update'])->name('warehouse.transaction.update');
Route::get('/warehouse/transaction/destroy/{id}', [App\Http\Controllers\Admin\WarehouseController::class, 'transaction_destroy'])->name('warehouse.transaction.destroy');
Route::post('/journal/getStorageList', [App\Http\Controllers\Admin\WarehouseController::class,'getStorageList'])->name('ajaxStorageList');
Route::post('/journal/getItemList', [App\Http\Controllers\Admin\WarehouseController::class,'getItemList'])->name('ajaxItemList');
Route::post('/journal/getJournalTypeList', [App\Http\Controllers\Admin\WarehouseController::class,'getJournalTypeList'])->name('ajaxJournalTypeList');
Route::post('/journal/getCustomerList', [App\Http\Controllers\Admin\WarehouseController::class,'getCustomerList'])->name('ajaxCustomerList');
Route::post('/journal/getStorageToStorageList', [App\Http\Controllers\Admin\WarehouseController::class,'geStorageToStorageList'])->name('ajaxStorageToStorageList');
Route::post('/journal/getUnitPrice', [App\Http\Controllers\Admin\WarehouseController::class,'getUnitPrice'])->name('ajaxUnitPrice');
Route::post('/journal/getItemRemain', [App\Http\Controllers\Admin\WarehouseController::class,'getItemRemain'])->name('ajaxItemRemain');


///////////////////  Transportation  ///////////////////////
Route::get('/transportaion/list', [App\Http\Controllers\Admin\TransportationController::class,'trs_list'])->name('transportation.list');
Route::get('/transportaion/list/create', [App\Http\Controllers\Admin\TransportationController::class,'list_create'])->name('transportation.list.create');
Route::post('/transportaion/list/delivered_update/{id}', [App\Http\Controllers\Admin\TransportationController::class,'list_delivered_update'])->name('transportation.list.delivered_update');
Route::get('/transportaion/list/breakdown/{id}', [App\Http\Controllers\Admin\TransportationController::class,'list_breakdown'])->name('transportation.list.breakdown');
Route::get('/transportaion/list/cancel/{id}', [App\Http\Controllers\Admin\TransportationController::class,'list_cancel'])->name('transportation.list.cancel');
Route::post('/transportaion/get_company', [App\Http\Controllers\Admin\TransportationController::class,'get_company'])->name('transportation.list.get_company');
Route::post('/transportaion/list/store', [App\Http\Controllers\Admin\TransportationController::class,'list_store'])->name('transportation.list.store');
Route::get('/transportaion/list/edit/{id}', [App\Http\Controllers\Admin\TransportationController::class,'list_edit'])->name('transportation.list.edit');
Route::post('/transportaion/list/update/{id}', [App\Http\Controllers\Admin\TransportationController::class,'list_update'])->name('transportation.list.update');
Route::get('/transportaion/list/destory/{id}', [App\Http\Controllers\Admin\TransportationController::class,'list_destory'])->name('transportation.list.destory');

Route::get('/transportaion/type', [App\Http\Controllers\Admin\TransportationController::class,'trs_type'])->name('transportation.type');
Route::post('/transportaion/store', [App\Http\Controllers\Admin\TransportationController::class,'type_store'])->name('transportation.type.store');
Route::post('/transportaion/update/{id}', [App\Http\Controllers\Admin\TransportationController::class,'type_update'])->name('transportation.type.update');
Route::get('/transportaion/destroy/{id}', [App\Http\Controllers\Admin\TransportationController::class,'type_destroy'])->name('transportation.type.destroy');

Route::get('/transportaion/location', [App\Http\Controllers\Admin\TransportationController::class,'trs_location'])->name('transportation.location');
Route::get('/transportaion/location/create', [App\Http\Controllers\Admin\TransportationController::class,'location_create'])->name('transportation.location.create');
Route::post('/transportaion/location/store', [App\Http\Controllers\Admin\TransportationController::class,'location_store'])->name('transportation.location.store');
Route::get('/transportaion/location/edit/{id}', [App\Http\Controllers\Admin\TransportationController::class,'location_edit'])->name('transportation.location.edit');
Route::post('/transportaion/location/update/{id}', [App\Http\Controllers\Admin\TransportationController::class,'location_update'])->name('transportation.location.update');
Route::get('/transportaion/location/destroy/{id}', [App\Http\Controllers\Admin\TransportationController::class,'location_destroy'])->name('transportation.location.destroy');

/////////////////////////   Fuel   //////////////////////
Route::get('/fuel/transaction', [App\Http\Controllers\Admin\FuelController::class,'transaction'])->name('fuel.transaction');
Route::get('/fuel/transaction/create', [App\Http\Controllers\Admin\FuelController::class,'transaction_create'])->name('fuel.transaction.create');
Route::post('/fuel/transaction/store', [App\Http\Controllers\Admin\FuelController::class,'transaction_store'])->name('fuel.transaction.store');
Route::post('/fuel/get_storage', [App\Http\Controllers\Admin\FuelController::class,'get_storage'])->name('fuel.get_storage');
Route::get('/fuel/transaction/edit/{id}', [App\Http\Controllers\Admin\FuelController::class,'transaction_edit'])->name('fuel.transaction.edit');
Route::post('/fuel/transaction/update/{id}', [App\Http\Controllers\Admin\FuelController::class,'transaction_update'])->name('fuel.transaction.update');
Route::get('/fuel/transaction/destroy/{id}', [App\Http\Controllers\Admin\FuelController::class,'transaction_destroy'])->name('fuel.transaction.destroy');

//////////////////////    manufacturing   ///////////////
Route::get('/manufacture/material/index', [App\Http\Controllers\Admin\ManufactureController::class,'material'])->name('manufacture.material.index');
Route::post('/manufacture/material/store', [App\Http\Controllers\Admin\ManufactureController::class,'material_store'])->name('manufacture.material.store');
Route::post('/manufacture/material/update/{id}', [App\Http\Controllers\Admin\ManufactureController::class,'material_update'])->name('manufacture.material.update');
Route::get('/manufacture/material/destroy/{id}', [App\Http\Controllers\Admin\ManufactureController::class,'material_destroy'])->name('manufacture.material.destroy');

Route::get('/manufacture/category/index', [App\Http\Controllers\Admin\ManufactureController::class,'category'])->name('manufacture.category.index');
Route::post('/manufacture/category/store', [App\Http\Controllers\Admin\ManufactureController::class,'category_store'])->name('manufacture.category.store');
Route::post('/manufacture/category/update/{id}', [App\Http\Controllers\Admin\ManufactureController::class,'category_update'])->name('manufacture.category.update');
Route::get('/manufacture/category/destroy/{id}', [App\Http\Controllers\Admin\ManufactureController::class,'category_destroy'])->name('manufacture.category.destroy');

Route::get('/manufacture/product/index', [App\Http\Controllers\Admin\ManufactureController::class,'product'])->name('manufacture.product.index');
Route::post('/manufacture/product/store', [App\Http\Controllers\Admin\ManufactureController::class,'product_store'])->name('manufacture.product.store');
Route::post('/manufacture/product/update/{id}', [App\Http\Controllers\Admin\ManufactureController::class,'product_update'])->name('manufacture.product.update');
Route::get('/manufacture/product/destroy/{id}', [App\Http\Controllers\Admin\ManufactureController::class,'product_destroy'])->name('manufacture.product.destroy');

Route::get('/manufacture/order_category/index', [App\Http\Controllers\Admin\ManufactureController::class,'order_category'])->name('manufacture.order_category.index');
Route::post('/manufacture/order_category/store', [App\Http\Controllers\Admin\ManufactureController::class,'order_category_store'])->name('manufacture.order_category.store');
Route::post('/manufacture/order_category/update/{id}', [App\Http\Controllers\Admin\ManufactureController::class,'order_category_update'])->name('manufacture.order_category.update');
Route::get('/manufacture/order_category/destroy/{id}', [App\Http\Controllers\Admin\ManufactureController::class,'order_category_destroy'])->name('manufacture.order_category.destroy');

Route::get('/manufacture/product_order/index', [App\Http\Controllers\Admin\ManufactureController::class,'product_order'])->name('manufacture.product_order.index');
Route::post('/manufacture/product_order/store', [App\Http\Controllers\Admin\ManufactureController::class,'product_order_store'])->name('manufacture.product_order.store');
Route::get('/manufacture/product_order/create', [App\Http\Controllers\Admin\ManufactureController::class,'product_order_create'])->name('manufacture.product_order.create');
Route::post('/manufacture/product_order/edit/{id}', [App\Http\Controllers\Admin\ManufactureController::class,'product_order_edit'])->name('manufacture.product_order.edit');
Route::post('/manufacture/product_order/update/{id}', [App\Http\Controllers\Admin\ManufactureController::class,'product_order_update'])->name('manufacture.product_order.update');
Route::get('/manufacture/product_order/destroy/{id}', [App\Http\Controllers\Admin\ManufactureController::class,'product_order_destroy'])->name('manufacture.product_order.destroy');


Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
