<?php

namespace App\Http\Controllers\Admin;

use App\Models\Poll;
use Illuminate\Http\Request;
use App\Http\Requests\PollRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $polls = Poll::select()->paginate(PAGINATE_COUNT);
        return view('backend.poll.index', compact('polls'));
    }

    public function enable()
    {
        $polls = Poll::select()->paginate(PAGINATE_COUNT);
        return view('backend.poll.create', compact('polls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.poll.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PollRequest $request)
    {
        $poll = Poll::create([
            'description' => $request->description,
            'admin_id' => Auth::guard('admin')->user()->id,
        ]);

        $details_list = [];
        for ($i = 0; $i < count($request->title); $i++) {
            $details_list[$i]['title'] = $request->title[$i];
        }

        $details = $poll->details()->createMany($details_list);

        return redirect()->route('admin.poll')->with(['message' => 'تم الحفظ بنجاح', 'msg-type' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
