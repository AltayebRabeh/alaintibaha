<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BreakingNew;
use App\Models\News;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $breaking_news = BreakingNew::select()->paginate(PAGINATE_COUNT);
        $news = News::select()->paginate(PAGINATE_COUNT);

        return view('frontend.home', compact('news' ,'breaking_news'));
    }
}
