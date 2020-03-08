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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);
Route::post('/user/tplogin', 'TpLoginController@loginUser')->name('tplogin')->middleware('checkrole');
Route::get('/tplogout', 'TpLoginController@logoutUser')->name('tplogout');
Route::post('/upload/signature','SignatureController@uploadUserSignature')->name('signatureupload');

            //----CLERK ROUTES----//
Route::get('/clerk/dashboard', 'ClerkController@showDashboard')->name('clerkdashboard');
Route::get('/clerk/register/user', 'ClerkController@showUserRegForm')->name('clerkuserregister');
Route::get('/clerk/register/app', 'ClerkController@showAppRegForm')->name('clerkappregister');
Route::get('/clerk/register/app/document', 'ClerkController@showAppDocumentRegForm')->name('clerkappdocumentregister');


        //----CLERK FORM ACTIONS ROUTES----//
Route::post('/clerk/applicant/register', 'TP_RegistrationController@registerApplicant')->name('clerkapplicantregister')->middleware('auth');
Route::get('/generate/appno', 'BpApplicationController@generateAppNumber')->name('generateappno');
Route::get('/generate/fileno/{superzone}/{zone}/{village}/{appno}', 'BpApplicationController@generateFileNumber')->name('generatefileno');
Route::get('/get/file/zones/{superzone}', 'ZoneController@fileZones')->name('getfilezones');
Route::get('/get/file/villages/{zone}', 'VillageController@fileVillages')->name('getfilevillages');
Route::post('/clerk/bapplication/register', 'BpApplicationController@registerBapplication')->name('clerkbapplicationregister')->middleware('auth');
Route::post('/clerk/bapplication/doc/upload', 'BpApplicationDocumentController@uploadBapplicationDocuments')->name('clerkbapplicationdocumentupload')->middleware('auth');

Route::post('/search/app', 'BpApplicationController@searchApps')->name('bpsearch');

            //----HEAD OF ADMIN ROUTES----//
Route::get('/admin/headofadmin/dashboard', 'HeadOfAdminController@showDashboard')->name('hoadashboard');
Route::get('/admin/headofadmin/slp', 'HeadOfAdminController@showSlp')->name('headofadminslp');
Route::get('/admin/headofadmin/idpa', 'HeadOfAdminController@showIdpa')->name('headofadminidpa');
Route::get('/admin/headofadmin/checklist', 'HeadOfAdminController@showChecklist')->name('headofadminchecklist');
Route::get('/app/documents/{id}','HeadOfAdminController@showAppdocuments')->middleware('auth');
Route::get('/admin/idpa/doc/{id}','HeadOfAdminController@idpaDoc')->middleware('auth');

         //---- HEAD OF ADMIN FORM ACTIONS ----//
Route::post('/head/admin/assign/tpo/slp','BpApplicationController@assignAppToTpoForSlp')->name('headadminasignslptotpo')->middleware('auth');
Route::post('/head/admin/approve/checklist','ChecklistController@approveChecklist')->name('approvechecklist')->middleware('auth');
Route::post('/drop/sir','DroppedSirController@dropSir')->name('drop-sir')->middleware('auth');
Route::post('/drop/slp','DroppedSlpController@dropSlp')->name('drop-slp')->middleware('auth');
Route::post('/drop/engr','DroppedEngrReportController@dropEngr')->name('drop-engr')->middleware('auth');
Route::post('/drop/ppi','DroppedPpiReportController@dropPpi')->name('drop-ppi')->middleware('auth');
Route::post('/drop/health','DroppedHealthReportController@dropHealth')->name('drop-health')->middleware('auth');
Route::post('/drop/doc','DroppedApplicationDocumentController@dropDocument')->name('drop-doc')->middleware('auth');


        //--- TPO ROUTES ---//
Route::get('/tpo/dashboard', 'TpoController@showDashboard')->name('tpodashboard');
Route::get('/tpo/slp', 'TpoController@showSlp')->name('tposlp');
Route::get('/tpo/assessment', 'TpoController@showAssessment')->name('tpoassessment');
Route::get('/tpo/pending/sirs', 'TpoController@showPendingSirs')->name('tpopendingsirs');
Route::get('/tpo/completed/sirs', 'TpoController@showCompletedSirs')->name('tpocompletedsirs');
Route::get('/tpo/pending/ppis', 'TpoController@showPendingPpis')->name('tpopendingppis');
Route::get('/tpo/completed/ppis', 'TpoController@showCompletedPpis')->name('tpocompletedppis');

         //--- TPO FORM ACTIONS ---//
Route::post('/tpo/assign/atpo/slp','BpApplicationController@assignAppToAtpoForSlpGeneration')->name('tpoasignslptoatpo')->middleware('auth');
Route::post('/tpo/upload/assessment','AssessmentController@uploadTpoAssessment')->name('tpouploadassessment')->middleware('auth');
Route::post('/tpo/submit/sir','SirReportController@uploadSir')->name('uploadsir')->middleware('auth');
Route::post('/tpo/submit/ppi','PpiReportController@uploadPpi')->name('uploadppi')->middleware('auth');


        //--- ATPO ROUTES ---//
Route::get('/atpo/dashboard', 'AtpoController@showDashboard')->name('atpodashboard');
Route::get('/atpo/slp', 'AtpoController@showSlp')->name('atposlp');

            //--- ATPO FORM ACTIONS ---//
Route::post('/atpo/upload/slp','SlpController@uploadSlp')->name('atpouploadslp')->middleware('auth');


                //-- ES ROUTES --//
Route::get('/es/dashboard','EsController@showDashboard')->name('esdashboard');
Route::get('/es/search/apps','EsController@showSearchApps')->name('essearchapps');
Route::get('/es/pending/assessment','EsController@showPendingAssessment')->name('espendingassessment');
Route::get('/es/completed/assessment','EsController@showCompletedAssessments')->name('escompletedassessment');
Route::get('/es/reports/pending/assignment','EsController@showPendingReportsAssignment')->name('esreportspendngassignment');
Route::get('/es/assigned/reports','EsController@showAssignedReports')->name('esassignedreports');
Route::get('/es/submitted/reports','EsController@showSubmittedReports')->name('essubmittedreports');


Route::get('/es/pending/checklists','EsController@showPendingChecklists')->name('espendingchecklists');
Route::get('/es/completed/checklists','EsController@showCompletedChecklists')->name('escompletedchecklists');
Route::get('/es/idpas','EsController@showEsIdpaAwaitingSignatory')->name('esidpas');
Route::get('/es/view/idpa/doc/{id}','EsController@viewIdpa')->middleware('auth');


                //--- ES FORM ACTIONS ---//
Route::post('/es/approve/assessment','AssessmentController@esApproveAssessment')->name('esapproveassessment')->middleware('auth');
Route::post('/es/assign/reprots','ReportController@assignReports')->name('esassignreports')->middleware('auth');
Route::post('/es/assign/checklist','ChecklistController@assignChecklist')->name('esassignchecklist')->middleware('auth');
Route::post('/es/sign/idpa','SignatureController@signDoc')->name('signidpadoc')->middleware('auth');


        //-- Head of Accounts ROUTES --//
Route::prefix('hac')->group(function() {

        Route::get('/dashboard', 'HacController@showDashboard')->name('hacdashboard');
        Route::get('/approvedassessments', 'HacController@approvedassessments')->name('hacapprovedassesments');
         //--- Head of Accounts FORM ACTIONS ---//
        Route::post('/assign/aco','PaymentController@assignPaymentToAccountOfficer')->name('assignaccountofficerpayment')->middleware('auth');

});


        //-- HO ROUTES --//
Route::get('ho/dashboard','HoController@showDashboard')->name('hodashboard');
Route::get('ho/pending/hors','HoController@showPendingHors')->name('pendinghors');
Route::get('ho/completed/hors','HoController@showCompletedHors')->name('completedhors');

        //--- HO FORM ACTIONS ---//
Route::post('/ho/submit/hor','HealthReportController@uploadHor')->name('uploadhor')->middleware('auth');


        //-- ENGR ROUTES --//
Route::get('engr/dashboard','EngrController@showDashboard')->name('engrdashboard');
Route::get('engr/pending/ers','EngrController@showPendingEr')->name('engrpendingers');
Route::get('engr/completed/ers','EngrController@showCompletedEr')->name('engrcompleteders');

        //--- ENGR FORM ACTIONS ---//
Route::post('/engr/submit/er','EngrReportController@uploadEr')->name('upload-er')->middleware('auth');

//Accounts Officer Dashboard
Route::prefix('accountofficer')->group(function() {

        Route::get('/dashboard', 'AccountOfficerController@dashboard')->name('accountofficerdashboard');
        Route::get('/awaitingpaymentconfirmation', 'AccountOfficerController@awaitingpaymentconfirmation')->name('awaitingpaymentconfirmation');

         //--- Account Officer FORM ACTIONS ---//
         Route::post('/payment/confirmation','PaymentController@accountOfficerConfirmPayment')->name('accountofficerpaymentconfirmation')->middleware('auth');
        
});


                //HEAD OF ICT ROUTES//
Route::get('/headofict/dashboard', 'HeadIctController@showDashboard')->name('hictdashboard');
Route::get('/headofict/register/staff', 'HeadIctController@showStaffReg')->name('hictstaffreg');
Route::post('/tp/staff/register', 'TP_RegistrationController@registerStaff')->name('regstaff')->middleware('auth');
