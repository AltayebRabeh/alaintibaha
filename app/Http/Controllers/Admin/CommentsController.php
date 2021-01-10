<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::select()->paginate(PAGINATE_COUNT);
        return view('backend.comments.index', compact('comments'));
    }
    
    public function disiable()
    {
        $comments = Comment::where('status', 0)->select()->paginate(PAGINATE_COUNT);
        return view('backend.comments.hide', compact('comments'));
    }


    public function show($id)
    {
        $comments = Comment::find($id);
        if (! $comments) {
            return redirect()->route('admin.comments')->with(['message' => 'هنالك مشكلة ماء الرجاء المحاولة مرة اخرة', 'msg-type' => 'danger']);
        }

        return view('backend.comments.show', compact('comments'));
    }

    public function showOrHide($id)
    {
        $comments = Comment::find($id);

        if (! $comments) {
            return redirect()->back()->with(['message' => 'هنالك مشكلة ماء الرجاء المحاولة مرة اخرة', 'msg-type' => 'danger']);
        }

        if ($comments->status == 0)
            $comments->status = 1;
        else
            $comments->status = 0;
            
        $comments->update();
        return redirect()->back()->with(['message' => 'تمت العملية بنجاح', 'msg-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comments = Comment::find($id);
        if (! $comments) {
            return redirect()->route('admin.comments')->with(['message' => 'هنالك مشكلة ماء الرجاء المحاولة مرة اخرة', 'msg-type' => 'danger']);
        }

        $comments->delete();
        return redirect()->route('admin.comments')->with(['message' => 'تم الحذف بنجاح', 'msg-type' => 'success']);
    }
}
