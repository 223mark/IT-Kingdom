<?php

namespace App\Http\Controllers;

use App\Models\PostCategory;
use Illuminate\Http\Request;

class PostCategroyController extends Controller
{
    //index
    public function index()
    {
        $brandData = PostCategory::get();
        return view('admin.category.post.postCategory', compact('brandData'));
    }
    //add category
    public function addPostCategory(Request $request)
    {
        $validation = $request->validate([
            'postCategory' => 'required'
        ]);
        $postCategory = [
            'postCategory_name' => $request->postCategory
        ];
        PostCategory::create($postCategory);
        return redirect()->route('admin#postCategoryIndex');
    }
    //edit
    public function editPostCategory($id)
    {
        $post = PostCategory::where('postCategory_id', $id)->first();
        return view('admin.category.post.postCategoryUpdate', compact('post'));
    }
    //update
    public function updatePostCategory($id, Request $request)
    {
        $validation = $request->validate([
            'postCategory' => 'required'
        ]);
        $post = [
            'postCategory_name' => $request->postCategory
        ];
        PostCategory::where('postCategory_id', $id)->update($post);
        return back();
    }
}
