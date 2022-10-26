<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Article::all();
        return view('admin.article.index', compact('data')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $data = $request->all();
        if($request->file('image')){
            $data['image'] = $request->file('image')->store('article-images');
        }
        // if($request->hasFile('image')){
        //     $request->file('image')->move('images/', $request->file('image')->getClientOriginalName());
        //     $data->image = $request->file('image')->getClientOriginalName();
        //     $data->save();
        // }
        Article::create($data);
        return redirect('/article');
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
        $item = Article::findOrFail($id);

        return view('admin.article.update', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        // $item = Article::findOrFail($id);
        // if($request->file('image')){
        //     if($request->oldImage){
        //         Storage::delete($request->oldImage);
        //     }
        //     $request->file('image')->move('images/', $request->file('image')->getClientOriginalName());
        //     $item->image = $request->file('image')->getClientOriginalName();
        //     $item->update();
        // }
        // $data = $request->all();
        // $item->update($data);

        $data = $request->all();
        $item = Article::findOrFail($id);
        if($request->file('image')){
            if($request->oldImage){
                    Storage::delete($request->oldImage);
                }
            $data['image'] = $request->file('image')->store('article-images');
        }

        $item->update($data);

        return redirect('/article');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article, $id)
    {
        $item = Article::findOrFail($id);
        if($article->image){
            Storage::delete($article->image);
        }
        $item->delete();

        return redirect('/article');
    }
}
