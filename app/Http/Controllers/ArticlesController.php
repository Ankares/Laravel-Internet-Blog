<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;             
use App\Models\Comment;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Storage; 

class ArticlesController extends Controller
{
  
  public function __construct()
  {
      $this->middleware('auth',['except'=>['index','show']]); 
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()    
    {
      $articles = Article::all();  
      return view('articles/index')->with('articles',$articles); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()      
    {
      return view('articles/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)  
    {
      if($request->input('article_id')> 0) { 
        $comment = new Comment();
        $comment->article_id = $request->input('article_id');
        $comment->comment = $request->input('comment');
        $comment->save();
        return redirect('/articles/'.$request->input('article_id'))->with('success','Комментарий добавлен');

      }

    $this->validate($request,[
      'title'=>'required|max:50',
      'text'=>'required|min:10',
      'main_image'=>'nullable|image|max:1999' 
    ]);

      if($request->hasFile('main_image')) { 
          $file = $request->file('main_image')->getClientOriginalName();
          $image_name_without_ext = pathinfo($file, PATHINFO_FILENAME);
          $ext = $request->file('main_image')->getClientOriginalExtension();
          $image_name = $image_name_without_ext.'_'.time().'.'.$ext;
          $path = $request->file('main_image')->storeAs('public/img', $image_name);

      } else
          $image_name = 'noimage.jpg';

       $article = new Article();               
       $article->title = $request->input("title"); 
       $article->text = $request->input("text");
       $article->image = $image_name;      
       $article->user_id = auth()->user()->id;  
       $article->save();

       return redirect('/articles')->with('success','Статья была добавлена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) 
    {
      $article = Article::find($id);  
      $comments = Comment::where('article_id',$id)->get(); 
      $data=['article'=>$article, 'comments'=>$comments];
      return view('articles/show')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)           
    {
      $article = Article::find($id);  
      if(auth()->user()->id != $article->user_id) 
        return redirect('/articles')->with('error','Вы не можете редактировать чужую статью');
      return view('articles/edit')->with('article',$article);
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
      $this->validate($request,[                
        'title'=>'required|max:100',
        'text'=>'required|min:10'
      ]);

      if($request->hasFile('main_image')) {   
          $file = $request->file('main_image')->getClientOriginalName();
          $image_name_without_ext = pathinfo($file, PATHINFO_FILENAME);
          $ext = $request->file('main_image')->getClientOriginalExtension();
          $image_name = $image_name_without_ext.'_'.time().'.'.$ext;
          $path = $request->file('main_image')->storeAs('public/img', $image_name);
      } else
          $image_name = 'noimage.jpg';

      $article = Article::find($id);  
      $article->title = $request->input('title');  
      $article->text = $request->input('text');   

      if($request->hasFile('main_image')) {
        if($article->image != 'noimage.jpg')
          Storage::delete('public/img/'.$article->image);
        $article->image = $image_name;
      }
      $article->save();

      return redirect('/articles')->with('success','Статья успешно обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)          
    {
      $article = Article::find($id);  
      if(auth()->user()->id != $article->user_id) 
        return redirect('/articles')->with('error','Вы не можете удалить чужую статью');

      if($article->image != 'noimage.jpg')
          Storage::delete('public/img/'.$article->image);

      $article->delete();

      return redirect('/articles')->with('success','Статья успешно удалена!');
    }
}
