<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Public Storefront & Guest Catalog
Route::get('/', 'StorefrontController@index')->name('home');
Route::get('/storefront', 'StorefrontController@index')->name('storefront.home');
Route::get('/courses', 'StorefrontController@courses')->name('storefront.courses');
Route::get('/courses/{slug}', 'StorefrontController@courseDetail')->name('storefront.course_detail');
Route::get('/verify-certificate/{code?}', 'StorefrontController@verifyCertificate')->name('storefront.verify_certificate');
Route::get('/verify-cert/{code?}', 'StorefrontController@verifyCertificate')->name('storefront.verify_cert');

Route::get('/privacy-policy', 'HomeController@privacy_policy')->name('privacy_policy');
Route::get('/terms-of-use', 'HomeController@terms_of_use')->name('terms_of_use');

// Authentication Routes
Auth::routes();
Route::get('/home', function () {
    return redirect()->route('dashboard');
})->name('home.redirect');

// Authenticated Learning Platform
Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

    Route::group(['prefix' => 'my_account'], function() {
        Route::get('/', 'MyAccountController@edit_profile')->name('my_account');
        Route::put('/', 'MyAccountController@update_profile')->name('my_account.update');
        Route::put('/change_password', 'MyAccountController@change_pass')->name('my_account.change_pass');
    });

    /*************** Support Team *****************/
    Route::group(['namespace' => 'SupportTeam'], function(){

        /*************** Enrollments & Razorpay *****************/
        Route::group(['prefix' => 'enrollments'], function(){
            Route::get('/', 'EnrollmentController@index')->name('enrollments.index');
            Route::get('my_courses', 'EnrollmentController@index')->name('enrollments.my_courses');
            Route::get('checkout/{slug}', 'EnrollmentController@checkout')->name('enrollments.checkout');
            Route::post('capture_razorpay', 'EnrollmentController@captureRazorpay')->name('enrollments.capture_razorpay');
            Route::get('refund_queue', 'EnrollmentController@refundQueue')->name('enrollments.refund_queue')->middleware('teamAccount');
            Route::post('process_refund/{id}', 'EnrollmentController@processRefund')->name('enrollments.process_refund')->middleware('teamAccount');
        });

        /*************** Live Sessions & Recordings *****************/
        Route::group(['prefix' => 'live_sessions'], function(){
            Route::get('/', 'LiveSessionController@index')->name('live_sessions.index');
            Route::post('/', 'LiveSessionController@store')->name('live_sessions.store')->middleware('teamSAT');
            Route::get('join/{id}', 'LiveSessionController@join')->name('live_sessions.join');
            Route::put('recording/{id}', 'LiveSessionController@updateRecording')->name('live_sessions.update_recording')->middleware('teamSAT');
            Route::delete('{id}', 'LiveSessionController@destroy')->name('live_sessions.destroy')->middleware('teamSAT');
        });

        /*************** Hifz-ul-Qur'an Daily Tracker *****************/
        Route::group(['prefix' => 'hifz'], function(){
            Route::get('/', 'HifzLogController@index')->name('hifz.index');
            Route::post('/', 'HifzLogController@store')->name('hifz.store')->middleware('teamSAT');
            Route::post('toggle-feature', 'HifzLogController@toggleFeature')->name('hifz.toggle_feature')->middleware('teamSA');
            Route::delete('{id}', 'HifzLogController@destroy')->name('hifz.destroy')->middleware('teamSAT');
        });

        /*************** Students *****************/
        Route::group(['prefix' => 'students'], function(){
            Route::get('reset_pass/{st_id}', 'StudentRecordController@reset_pass')->name('st.reset_pass');
            Route::get('graduated', 'StudentRecordController@graduated')->name('students.graduated');
            Route::put('not_graduated/{id}', 'StudentRecordController@not_graduated')->name('st.not_graduated');
            Route::get('list/{class_id}', 'StudentRecordController@listByClass')->name('students.list')->middleware('teamSAT');
        });

        /*************** Users *****************/
        Route::group(['prefix' => 'users'], function(){
            Route::get('reset_pass/{id}', 'UserController@reset_pass')->name('users.reset_pass');
        });

        /*************** TimeTables (Removed) *****************/
        Route::any('timetables/{any?}', function(){
            return redirect()->route('dashboard');
        })->where('any', '.*')->name('tt.index');

        /*************** Payments *****************/
        Route::group(['prefix' => 'payments'], function(){
            Route::get('manage/{class_id?}', 'PaymentController@manage')->name('payments.manage');
            Route::get('invoice/{id}/{year?}', 'PaymentController@invoice')->name('payments.invoice');
            Route::get('receipts/{id}', 'PaymentController@receipts')->name('payments.receipts');
            Route::get('pdf_receipts/{id}', 'PaymentController@pdf_receipts')->name('payments.pdf_receipts');
            Route::post('select_year', 'PaymentController@select_year')->name('payments.select_year');
            Route::post('select_class', 'PaymentController@select_class')->name('payments.select_class');
            Route::delete('reset_record/{id}', 'PaymentController@reset_record')->name('payments.reset_record');
            Route::post('pay_now/{id}', 'PaymentController@pay_now')->name('payments.pay_now');
        });

        /*************** Marks *****************/
        Route::group(['prefix' => 'marks'], function(){
            Route::group(['middleware' => 'teamSA'], function(){
                Route::get('batch_fix', 'MarkController@batch_fix')->name('marks.batch_fix');
                Route::put('batch_update', 'MarkController@batch_update')->name('marks.batch_update');
                Route::get('tabulation/{exam?}/{class?}/{sec_id?}', 'MarkController@tabulation')->name('marks.tabulation');
                Route::post('tabulation', 'MarkController@tabulation_select')->name('marks.tabulation_select');
                Route::get('tabulation/print/{exam}/{class}/{sec_id}', 'MarkController@print_tabulation')->name('marks.print_tabulation');
            });

            Route::group(['middleware' => 'teamSAT'], function(){
                Route::get('/', 'MarkController@index')->name('marks.index');
                Route::get('manage/{exam}/{class}/{section}/{subject}', 'MarkController@manage')->name('marks.manage');
                Route::put('update/{exam}/{class}/{section}/{subject}', 'MarkController@update')->name('marks.update');
                Route::put('comment_update/{exr_id}', 'MarkController@comment_update')->name('marks.comment_update');
                Route::put('skills_update/{skill}/{exr_id}', 'MarkController@skills_update')->name('marks.skills_update');
                Route::post('selector', 'MarkController@selector')->name('marks.selector');
                Route::get('bulk/{class?}/{section?}', 'MarkController@bulk')->name('marks.bulk');
                Route::post('bulk', 'MarkController@bulk_select')->name('marks.bulk_select');
            });

            Route::get('select_year/{id}', 'MarkController@year_selector')->name('marks.year_selector');
            Route::post('select_year/{id}', 'MarkController@year_selected')->name('marks.year_select');
            Route::get('show/{id}/{year}', 'MarkController@show')->name('marks.show');
            Route::get('print/{id}/{exam_id}/{year}', 'MarkController@print_view')->name('marks.print');
        });

        Route::resource('students', 'StudentRecordController');
        Route::resource('users', 'UserController');
        Route::resource('classes', 'MyClassController');
        Route::resource('sections', 'SectionController');
        Route::resource('subjects', 'SubjectController');
        Route::resource('grades', 'GradeController');
        Route::resource('exams', 'ExamController');
        Route::resource('payments', 'PaymentController');
    });

    /************************ AJAX ****************************/
    Route::group(['prefix' => 'ajax'], function() {
        Route::get('get_lga/{state_id}', 'AjaxController@get_lga')->name('get_lga');
        Route::get('get_class_sections/{class_id}', 'AjaxController@get_class_sections')->name('get_class_sections');
        Route::get('get_class_subjects/{class_id}', 'AjaxController@get_class_subjects')->name('get_class_subjects');
    });

});

/************************ SUPER ADMIN ****************************/
Route::group(['namespace' => 'SuperAdmin','middleware' => 'super_admin', 'prefix' => 'super_admin'], function(){
    Route::get('/settings', 'SettingController@index')->name('settings');
    Route::put('/settings', 'SettingController@update')->name('settings.update');
});

/************************ PARENT ****************************/
Route::group(['namespace' => 'MyParent','middleware' => 'my_parent'], function(){
    Route::get('/my_children', 'MyController@children')->name('my_children');
});
