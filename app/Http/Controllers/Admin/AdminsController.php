<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::select()->paginate(PAGINATE_COUNT);
        return view('backend.admins.index', compact('admins'));
    }

    public function disiable()
    {
        $admins = Admin::where('status', 0)->select()->paginate(PAGINATE_COUNT);
        return view('backend.admins.disiable', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        $admin = new Admin();
        if ($request->permission) {
            $admin->permission = implode(',', $request->permission);
        }

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->status = $request->has('status')? 1 : 0;

        $admin->save();

        return redirect()->route('admin.admins')->with(['message' => 'تم الحفظ بنجاح', 'msg-type' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = Admin::find($id);
        return view('backend.admins.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);

        $superUser = false;
        if ($admin->permission != '*') {
            $admin->permission = explode(',', $admin->permission);
            if ($admin->permission == null) {
                $admin->permission = [];
            }
        } else {
            $superUser = true;
        }

        return view('backend.admins.edit', compact('admin', 'superUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $admin = Admin::find($id);

        $admin->permission = null;

        if ($request->permission) {
            $admin->permission = implode(',', $request->permission);
        }

        $admin->update();

        return redirect()->route('admin.admins')->with(['message' => 'تم التعديل بنجاح', 'msg-type' => 'success']);
    }

    public function status($id)
    {
        $admin = Admin::find($id);

        if (! $admin) {
            return redirect()->back()->with(['message' => 'هنالك مشكلة ماء الرجاء المحاولة مرة اخرة', 'msg-type' => 'danger']);
        }

        if ($admin->status == 0)
            $admin->status = 1;
        else
            $admin->status = 0;

        $admin->update();
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
        //
    }
}
