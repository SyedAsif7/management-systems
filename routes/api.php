<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes — AL-TAQWA Mobile & Cross-Platform Gateway
|--------------------------------------------------------------------------
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function () {
    // Announcements API (for Mobile App & Web Slider)
    Route::get('/announcements', 'Api\AnnouncementApiController@index')->name('api.announcements');

    // Live Halqas & Batches API
    Route::get('/batches/{room_id}/live', 'Api\LiveClassApiController@batchLive')->name('api.batch_live');
    Route::get('/student/halqas', 'Api\LiveClassApiController@studentHalqas')->name('api.student_halqas');

    // Zikr & Durood Community Stats API
    Route::get('/zikr/stats', 'ZikrController@stats')->name('api.zikr_stats');
});
