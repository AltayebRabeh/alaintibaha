<?php

namespace App\Http\Controllers\Admin;

use App\Models\Poll;
use Illuminate\Http\Request;
use App\Http\Requests\PollRequest;
use Illuminate\Support\Facades\DB;
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

    public static function sumVote($id) {
        $sum = DB::table('votes')
            ->join('details_polls', 'votes.details_poll_id', '=', 'details_polls.id')
            ->select('votes.id')
            ->where('details_polls.poll_id', $id)
            ->get();

        return $sum->count();
    }

    public function enable()
    {
        $polls = Poll::select()->where('status', '1')->paginate(PAGINATE_COUNT);
        return view('backend.poll.enable', compact('polls'));
    }

    public function showOrHide($id)
    {
        $poll = Poll::find($id);

        if (! $poll) {
            return redirect()->back()->with(['message' => 'هنالك مشكلة ماء الرجاء المحاولة مرة اخرة', 'msg-type' => 'danger']);
        }

        if ($poll->status == 0)
            $poll->status = 1;
        else
            $poll->status = 0;
            
        $poll->update();
        return redirect()->back()->with(['message' => 'تمت العملية بنجاح', 'msg-type' => 'success']);
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $poll = Poll::find($id);

        if (! $poll) {
            return redirect()->back()->with(['message' => 'هنالك مشكلة ماء الرجاء المحاولة مرة اخرة', 'msg-type' => 'danger']);
        }

        $poll->delete();

        return redirect()->back()->with(['message' => 'تم الحذف بنجاح', 'msg-type' => 'success']);
    }
}
