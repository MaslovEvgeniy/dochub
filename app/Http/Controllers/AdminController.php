<?php
/**
 * Created by PhpStorm.
 * User: maslov
 * Date: 09.02.18
 * Time: 10:19
 */

namespace App\Http\Controllers;


use App\News;
use App\Reports;
use App\Stats;
use App\Subscr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscr = Subscr::all();
        $stats = Stats::all();
        $visitors = $totalVis = News::all()->sum('visitors');
        return view('home', compact('subscr', 'stats', 'visitors'));
    }

    public function news()
    {
        $news = News::orderBy('id', 'desc')->paginate(10);
        return view('news', compact('news'));
    }

    public function addNews(Request $request)
    {
        $report = News::create(request()->all());
        if ($request->hasFile('img')) {
            $request->img->storeAs('news', $report->id.'.jpg', 'uploads');
        }

        session()->flash('status', 'Подію успішно додано!');

        return redirect()->route('admin.news');
    }

    public function deleteNews()
    {
        News::where('id', \request()->id)->delete();

        return response()->json([]);
    }

    public function reports()
    {
        $reports = Reports::orderBy('id', 'desc')->paginate(10);
        return view('reports', compact('reports'));
    }

    public function addReport(Request $request)
    {
        $report = Reports::create(request()->all());
        if ($request->hasFile('img')) {
            $request->img->storeAs('reports', $report->id.'.jpg', 'uploads');
        }

        session()->flash('status', 'Звіт успішно додано!');

        return redirect()->route('admin.reports');
    }

    public function deleteReport()
    {
        Reports::where('id', \request()->id)->delete();

        return response()->json([]);
    }
}