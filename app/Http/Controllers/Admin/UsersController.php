<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::select()->paginate(PAGINATE_COUNT);
        return view('backend.users.index', compact('users'));
    }

    public function disiable()
    {
        $users = User::where('status', 0)->select()->paginate(PAGINATE_COUNT);
        return view('backend.users.disiable', compact('users'));
    }

    public function status($id)
    {
        $user = User::find($id);

        if (! $user) {
            return redirect()->back()->with(['message' => 'هنالك مشكلة ماء الرجاء المحاولة مرة اخرة', 'msg-type' => 'danger']);
        }

        if ($user->status == 0)
            $user->status = 1;
        else
            $user->status = 0;
            
        $user->update();
        return redirect()->back()->with(['message' => 'تمت العملية بنجاح', 'msg-type' => 'success']);
    }
}
