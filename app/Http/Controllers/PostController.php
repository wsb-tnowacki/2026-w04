<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posty = Post::all();
        return view('post.lista',compact('posty'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.dodaj');
    }

    /**
     * Store a newly created resource in storage.
     */
    //public function store(Request $request)
    public function store(PostRequest $request)
    {
        //@dump($request);
        /* $post = new Post();
        $post->tytul = request('tytul');
        $post->autor = $request['autor'];
        $post->email = request('email');
        $post->tresc = request('tresc');
        $post->save(); */
        /* $request->validate(
            [
                'tytul' => 'required|min:5|max:200',
                'autor' => [
                    'required',
                    'min:3',
                    'max:100',
                ],
                'email' => 'required|email:rfc,dns|max:200',
                'tresc' => 'required|min:5',
            ]
        ); */
        $request->merge(['user_id' => Auth::user()->id]);
        Post::create($request->all());
        return redirect(route('post.index'))->with('message',"Dodano poprawnie post");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post.post',compact('post'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('post.zmien',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        //return "update id: $post->id";
        // $post->update($request->all());
        $dane = $request->all();
        $dane['user_id'] = Auth::user()->id;
        $post->update($dane);
        return redirect(route('post.index'))->with('message',"Zmieniono poprawnie post");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //return "destroy id: $post->id";
        $post->delete();
        return redirect(route('post.index'))->with('message',"Usunięto poprawnie post")->with('color', 'red');
    }
}
