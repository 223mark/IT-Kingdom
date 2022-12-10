<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\PostCategory;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class PostController extends Controller
{
    //post page
    public function index()
    {
        $postData = post::get();
        $postCategory = PostCategory::get();
        return view('admin.post.index', compact('postData', 'postCategory'));
    }
    //post create
    public function createPost(Request $request)
    {
        //dd($request->all());
        $validation = $request->validate([
            'postTitle' => 'required',
            'postDescription' => 'required',
            'postCategory' => 'required',
            'postImage' => 'required'
        ]);
        $file = $request->file('postImage');
        $fileName = uniqid() . '_' . $file->getClientOriginalName();
        $file->move(public_path() . '/postImage/', $fileName);
        $postData = [
            'postCategory_id' => $request->postCategory,
            'title' => $request->postTitle,
            'description' => $request->postDescription,
            'image' => $fileName,
        ];
        post::create($postData);
        $post = post::select('posts.*', 'post_categories.postCategory_name')
            ->leftJoin('post_categories', 'posts.postCategory_id', 'post_categories.postCategory_id')
            ->get();
        dd($post->toArray());
        return back()->with(['postData' => $post]);
    }
    public function editPost($id)
    {
        $postData = Post::select('posts.*', 'post_categories.postCategory_name')
            ->leftJoin('post_categories', 'posts.postCategory_id', 'post_categories.postCategory_id')
            ->where('post_id', $id)->first();
        return view('admin.post.postEdit', compact('postData'));
    }
}
