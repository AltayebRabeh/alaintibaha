<?php

namespace App\Http\Controllers\Web;

use Auth;
use App\Models\Ad;
use App\Models\Like;
use App\Models\News;
use App\Models\Poll;
use App\Models\User;
use App\Models\Comment;
use App\Models\BreakingNew;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $news = News::select()->paginate(18);


        return view('frontend.home', compact('news'));
    }

    public function polls()
    {
        $polls = Poll::select()->paginate(PAGINATE_COUNT);

        return view('frontend.pools', compact('polls'));
    }

    public function vote()
    {

    }

    public function read($id)
    {
        $news = News::find($id);

        return view('frontend.show', compact('news'));
    }

    public static function breakingNews() {
        return DB::table('breaking_news')
            ->join('news', 'breaking_news.new_id', '=', 'news.id')
            ->select('news.title', 'news.id')
            ->limit(5)
            ->orderBy('news.id', 'desc')
            ->get();
    }

    public static function bestNews() {
        return DB::table('news')
            ->select('news.id', 'news.title')
            ->limit(6)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function search(Request $request) {

        if($request->search == null)
            $request->search = '';

        $news = DB::table('news')
            ->where('title', 'like', '%'.$request->search.'%')
            ->get();

        return view('frontend.search', compact('news'));
    }

    public static function like($id) {
        return  $like = Like::where('status', 1)->where('new_id', $id)->count();
    }

    public static function dislike($id) {
        return  $dislike = Like::where('status', '!=', 1)->where('new_id', $id)->count();
    }

    public static function ads() {
        return  Ad::where('status', 1)->inRandomOrder()->first();
    }

    public static function countComments($id) {
        return  $dislike = Comment::where('status', 1)->where('new_id', $id)->count();
    }

    public function sendComment(CommentRequest $request, $id)
    {
        $status = 1;
        $arr = ['بليد', 'غبي', 'حمار'];
        $text = explode(' ', $request->comment);

        foreach ($arr as $item) {
            foreach ($text as $i) {
                if($item == $i) {
                    $status = 0;
                    break;
                }
            }
        }

        Comment::create([
            'comment' => $request->comment,
            'new_id' => $id,
            'status' => $status,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->back()->with(['message' => 'تمت العملية بنجاح', 'msg-type' => 'success']);
    }

    public function like_dislike($id, $new_id, $user_id)
    {
        $like = Like::select()->where('user_id', $user_id)->first();

        if($like) {
            $like->status = $id;
            $like->update();
        } else {
            Like::create([
                'status' => $id,
                'new_id' => $new_id,
                'user_id' => $user_id
            ]);
        }

        return redirect()->back();
    }

    public function profile()
    {
        $user = User::find(Auth::user()->id);

        return view('frontend.profile', compact('user'));
    }

    protected function update(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if($request->photo) {
            $filePath = uploadImage('admins_profile', $request->photo);
            $user->photo = $filePath;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->age = $request->age;
        $user->gender =$request->gender;
        $user->password =  Hash::make($request->password);
    }
}
