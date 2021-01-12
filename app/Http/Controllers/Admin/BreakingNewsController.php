<?php

namespace App\Http\Controllers\Admin;

use Auth;
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
        return view('backend.poll.index', compact('breaking_news'));
    }

    public static function add($id)
    {
        BreakingNew::create([
            'new_id' => $id,
            'admin_id' => Auth::guard('admin')->user()->id,
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function destroy($id)
    {
        $breaking_news = BreakingNew::find($id);
        if (! $breaking_news) {
            return redirect()->route('admin.breaking_news')->with(['message' => 'هنالك مشكلة ماء الرجاء المحاولة مرة اخرة', 'msg-type' => 'danger']);
        }

        $breaking_news->delete();
        return redirect()->route('admin.breaking_news')->with(['message' => 'تم الحذف بنجاح', 'msg-type' => 'success']);
    }
}
