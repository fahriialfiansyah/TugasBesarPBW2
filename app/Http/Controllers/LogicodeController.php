<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LogicodeController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function article()
    {
        $articles = Post::latest()->get();
        return view('user.article.index', compact('articles'));
    }

    public function categories_article(Request $request, $tag)
    {
        $tag = Post::where('tag', $tag)->first();
        $tanggal = Carbon::now();

        //cek status draft
        $cek_status = Post::where('status')->first();
        // simpan ke database status
        if ($cek_status == 0) {
            $articles = new Post();
            $articles->title = $request->title;
            $articles->author = $request->author;
            $articles->tanggal = $tanggal;
            $articles->content = $request->content;
            $articles->slug = Str::slug($request->title);
            $articles->tag = $request->tag;
            $articles->status = $request->status;
            $articles->save();
        }
        return redirect()->route('logicode.article.categories', [$tag]);
    }

    public function gameQuiz()
    {
        return view('user.game-quiz.gameQuiz');
    }

    //Game Quiz
    public function game()
    {
        $cont = DB::select('SELECT * FROM content');
        if($cont){
            return view('user.game-quiz.template.home', ['cont'=>$cont]);
        } else {
            return view('user.game-quiz.template.homeempty');
        }
    }

    public function quiz()
    {
        $cat = Category::all();
        return view('user.game-quiz.quiz', ['categories' => $cat]);
    }

    public function quizplay($id)
    {
        $quests = DB::select('SELECT * FROM questions WHERE questioncategory = ?',[$id]);
        return view('user.game-quiz.quizplay', ['questions' => $quests]);
    }

    public function quizend($res)
    {
        return view('user.game-quiz.quizend',compact('res'));

    }

    // Store
    public function store()
    {
        $barangs = Barang::paginate(20);
        return view('user.store.home', compact('barangs'));
    }

}
