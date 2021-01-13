<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Http\Requests\ProfileRequest;
use Auth;

class ProfileController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $admin = Admin::find(Auth::guard('admin')->user()->id);
        if (! $admin) {
            return redirect()->back()->with(['message' => 'هنالك مشكلة ماء الرجاء المحاولة مرة اخرة', 'msg-type' => 'danger']);
        }

        return view('backend.profile.show', compact('admin'));    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $admin = Admin::find(Auth::guard('admin')->user()->id);
        if (! $admin) {
            return redirect()->back()->with(['message' => 'هنالك مشكلة ماء الرجاء المحاولة مرة اخرة', 'msg-type' => 'danger']);
        }
        
        return view('backend.profile.edit', compact('admin'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request)
    {
        $admin = Admin::find(Auth::guard('admin')->user()->id);
        $admin->email = $request->email;
        $admin->name = $request->name;
        
        if($request->hasfile('photo'))
        {
            $filePath = uploadImage('admins_profile', $request->photo);
            $admin->photo = $filePath;
        }

        $admin->update();
        return redirect()->route('admin.profile')->with(['message' => 'تم التعديل بنجاح', 'msg-type' => 'success']);
    }

    public function password(ProfileRequest $request)
    {
        $admin = Admin::find(Auth::guard('admin')->user()->id);
        $admin->password = bcrypt($request->password);
        $admin->update();
        return redirect()->route('admin.profile')->with(['message' => 'تم التعديل بنجاح', 'msg-type' => 'success']);
    }
}
