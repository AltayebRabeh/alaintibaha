<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Requests\NewsRequest;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::select()->paginate(PAGINATE_COUNT);
        return view('backend.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        // $path = $request->file('photos')->store('news');
        if($request->hasfile('photos') && count($request->file('photos')) <= MAX_COUNT_FILE_UPLOAD)
        {
           foreach($request->file('photos') as $photo)
           {
               $filePath = uploadImage('news', $photo);
               $data[] = $filePath;
           }
           if(count($data) > MAX_COUNT_FILE_UPLOAD)
                return redirect()->route('admin.news.create')->with(['message' => 'لايمكنك رفع اكثر من ' . MAX_COUNT_FILE_UPLOAD . 'صور', 'msg-type' => 'danger']);
        } else {
            return redirect()->route('admin.news')->with(['message' => 'لايمكنك رفع اكثر من ' . MAX_COUNT_FILE_UPLOAD . 'صور', 'msg-type' => 'danger']);
        }



        News::create([
            'title' => $request->title,
            'photos' => json_encode($data),
            'subject' => $request->subject,
            'admin_id' => Auth::guard('admin')->user()->id,
        ]);

        return redirect()->route('admin.news')->with(['message' => 'تم الحفظ بنجاح', 'msg-type' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::find($id);
        if (! $news) {
            return redirect()->route('admin.news')->with(['message' => 'هنالك مشكلة ماء الرجاء المحاولة مرة اخرة', 'msg-type' => 'danger']);
        }

        return view('backend.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        if (! $news) {
            return redirect()->route('admin.news')->with(['message' => 'هنالك مشكلة ماء الرجاء المحاولة مرة اخرة', 'msg-type' => 'danger']);
        }

        return view('backend.news.edit', compact('news'));
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
        $news = News::find($id);
        if (! $news) {
            return redirect()->route('admin.news')->with(['message' => 'هنالك مشكلة ماء الرجاء المحاولة مرة اخرة', 'msg-type' => 'danger']);
        }

        if($request->hasfile('photos') && count($request->file('photos')) <= MAX_COUNT_FILE_UPLOAD)
        {
           foreach($request->file('photos') as $photo)
           {
               $filePath = uploadImage('news', $photo);
               $data[] = $filePath;
           }

            $news->photos = json_encode($data);
        } else {
            return redirect()->route('admin.news')->with(['message' => 'لايمكنك رفع اكثر من ' . MAX_COUNT_FILE_UPLOAD . 'صور', 'msg-type' => 'danger']);
        }

        $news->title = $request->title;
        $news->subject = $request->subject;
        $news->admin_id = Auth::guard('admin')->user()->id;
        $news->save();

        return redirect()->route('admin.news')->with(['message' => 'تم التعديل بنجاح', 'msg-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        if (! $news) {
            return redirect()->route('admin.news')->with(['message' => 'هنالك مشكلة ماء الرجاء المحاولة مرة اخرة', 'msg-type' => 'danger']);
        }

        $news->delete();
        return redirect()->route('admin.news')->with(['message' => 'تم الحذف بنجاح', 'msg-type' => 'success']);
    }
}
