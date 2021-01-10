<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BreakingNew;
use Illuminate\Http\Request;

class BreakingNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breaking_news = BreakingNew::select()->paginate(PAGINATE_COUNT);
        return view('backend.breaking_news.index', compact('breaking_news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $breaking_news = BreakingNew::find($id);
        if (! $breaking_news) {
            return redirect()->route('admin.news')->with(['message' => 'هنالك مشكلة ماء الرجاء المحاولة مرة اخرة', 'msg-type' => 'danger']);
        }

        $breaking_news->delete();
        return redirect()->route('admin.news')->with(['message' => 'تم الحذف بنجاح', 'msg-type' => 'success']);
    }
}
