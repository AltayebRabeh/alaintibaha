<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Http\Requests\AdsRequest;
use App\Http\Controllers\Controller;
use App\Models\Ad;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ad::select()->paginate(PAGINATE_COUNT);
        return view('backend.ads.index', compact('ads'));
    }

    public function enable()
    {
        $ads = Ad::where('status', 1)->select()->paginate(PAGINATE_COUNT);
        return view('backend.ads.enable', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.ads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdsRequest $request)
    {
        if($request->hasfile('photos'))
        {
            if(count($request->file('photos')) > MAX_COUNT_FILE_UPLOAD) {
                return redirect()->route('admin.ads')->with(['message' => 'لايمكنك رفع اكثر من ' . MAX_COUNT_FILE_UPLOAD . 'صور', 'msg-type' => 'danger']);
            }

           $data = [];
           foreach($request->file('photos') as $photo)
           {
               $filePath = uploadImage('ads', $photo);
               $data[] = $filePath;
           }
        }

        Ad::create([
            'title' => $request->title,
            'photos' => json_encode($data),
            'subject' => $request->subject,
            'admin_id' => Auth::guard('admin')->user()->id,
        ]);

        return redirect()->route('admin.ads')->with(['message' => 'تم الحفظ بنجاح', 'msg-type' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ads = Ad::find($id);
        if (! $ads) {
            return redirect()->route('admin.ads')->with(['message' => 'هنالك مشكلة ماء الرجاء المحاولة مرة اخرة', 'msg-type' => 'danger']);
        }

        return view('backend.ads.show', compact('ads'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ads = Ad::find($id);
        if (! $ads) {
            return redirect()->route('admin.ads')->with(['message' => 'هنالك مشكلة ماء الرجاء المحاولة مرة اخرة', 'msg-type' => 'danger']);
        }

        return view('backend.ads.edit', compact('ads'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdsRequest $request, $id)
    {
        $ads = Ad::find($id);
        if (! $ads) {
            return redirect()->route('admin.ads')->with(['message' => 'هنالك مشكلة ماء الرجاء المحاولة مرة اخرة', 'msg-type' => 'danger']);
        }

        if($request->hasfile('photos'))
        {
            if(count($request->file('photos')) > MAX_COUNT_FILE_UPLOAD) {
                return redirect()->route('admin.ads')->with(['message' => 'لايمكنك رفع اكثر من ' . MAX_COUNT_FILE_UPLOAD . 'صور', 'msg-type' => 'danger']);
            }

           foreach($request->file('photos') as $photo)
           {
               $filePath = uploadImage('ads', $photo);
               $data[] = $filePath;
           }

            $ads->photos = json_encode($data);
        }

        $ads->title = $request->title;
        $ads->subject = $request->subject;
        $ads->admin_id = Auth::guard('admin')->user()->id;
        $ads->save();

        return redirect()->route('admin.ads')->with(['message' => 'تم التعديل بنجاح', 'msg-type' => 'success']);
    }

    public function showOrHide($id)
    {
        $ads = Ad::find($id);

        if (! $ads) {
            return redirect()->route('admin.ads')->with(['message' => 'هنالك مشكلة ماء الرجاء المحاولة مرة اخرة', 'msg-type' => 'danger']);
        }

        if ($ads->status == 0)
            $ads->status = 1;
        else
            $ads->status = 0;

        $ads->update();
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
        $ads = Ad::find($id);
        if (! $ads) {
            return redirect()->route('admin.ads')->with(['message' => 'هنالك مشكلة ماء الرجاء المحاولة مرة اخرة', 'msg-type' => 'danger']);
        }

        $ads->delete();
        return redirect()->route('admin.ads')->with(['message' => 'تم الحذف بنجاح', 'msg-type' => 'success']);
    }
}
