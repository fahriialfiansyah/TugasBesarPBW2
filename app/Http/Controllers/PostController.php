<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str; //helper str untuk generate slug yang URL friendly
use App\Models\Post;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    public function index()
    {
        $articles = Post::latest()->paginate(5);
        return view('admin.article.index', compact('articles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

        // $products = Barang::latest()->paginate(5);

        // return view('admin.store.index',compact('products'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.article.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:155',
            'author' => 'required',
            'content' => 'required',
            'status' => 'required',
            'tag' => 'required'
        ]);

        $articles = Post::create([
            'title' => $request->title,
            'author' => $request->author,
            'content' => $request->content,
            'status' => $request->status,
            'slug' => Str::slug($request->title),
            'tag' => $request->tag
        ]);        

        if($articles){
            Alert::success('Congrats', 'Article Successfully Created');
        } else{
            Alert::warning('Error', 'Some problem has occured, please try again');
        }
        return redirect()->route('article.index');
    }

    public function edit($id)
    {
        $articles = Post::findOrFail($id);
        return view('admin.article.edit', compact('articles'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|string|max:155',
            'author' => 'required',
            'status' => 'required',
            'content' => 'required',
            'tag' => 'required'
        ]);

        $articles = Post::findOrFail($id);

        $articles->update([
            'title' => $request->title,
            'author' => $request->author,
            'content' => $request->content,
            'status' => $request->status,
            'slug' => Str::slug($request->title),
            'tag' => $request->tag
        ]);

        Alert::success('Congrats', 'Article Successfully Updated');
        return redirect()->route('article.index');    
    }

    public function destroy($id)
    {
        $articles = Post::findOrFail($id);
        $articles->delete();
        if ($articles) {
            Alert::success('success', 'Article has been deleted successfully');
            return redirect()->route('article.index');
        } else {
            Alert::warning('Error', 'Some problem has occured, please try again');
            return redirect()->route('article.index');
        }
    }
}
