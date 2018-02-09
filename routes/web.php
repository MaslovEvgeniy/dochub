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

use App\News;

Route::get('/', function () {
    $count = \App\Stats::where(['id' => 1])->first();
    $count->count += 1;
    $count->save();

    $news = News::orderBy('id', 'desc')->paginate(10);
    $reports = \App\Reports::orderBy('id', 'desc')->paginate(10);

    $totalVis = News::all()->sum('visitors');

    return view('welcome', compact('news', 'reports', 'totalVis'));
});

Route::get('/subscribe', function () {
    \App\Subscr::create(request()->all());

    return response()->json([]);
})->name('subscribe');

Route::get('/come', function () {
    $id = request()->id;
    $item = News::find(['id' => $id])->first();
    $item->visitors++;
    $item->save();

    return response()->json([]);
})->name('come');

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/admin/news', 'AdminController@news')->name('admin.news');
Route::post('/admin/news/add', 'AdminController@addNews')->name('admin.addnews');
Route::post('/admin/news/delete', 'AdminController@deleteNews')->name('admin.deletenews');
Route::get('/admin/reports', 'AdminController@reports')->name('admin.reports');
Route::post('/admin/reports/add', 'AdminController@addReport')->name('admin.addreport');
Route::post('/admin/reports/delete', 'AdminController@deleteReport')->name('admin.deletereport');


