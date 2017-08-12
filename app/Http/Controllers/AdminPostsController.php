<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\AdminCreatePostRequest;
use App\Http\Requests\AdminEditPostRequest;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
{

    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();
        $user = Auth::user();

        return view('admin.posts.create', compact('categories', 'user'));
    }

    public function store(AdminCreatePostRequest $request)
    {

        $input = $request->all();

        if($request->file('photo_id')) {
            $file = $request->file('photo_id');
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['path' => $name]);
            $input['photo_id'] = $photo->id;
        }

        Post::create($input);

        session()->flash('post_created', 'Post has been created');

        return redirect('/admin/posts');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $user = Auth::user();
        $categories = Category::pluck('name', 'id')->all();

        return view('admin.posts.edit', compact('post', 'categories', 'user'));
    }

    public function update(AdminEditPostRequest $request, $id)
    {
        $post = Post::findOrFail($id);

        $input = $request->all();

        if($request->file('photo_id')){
            $file = $request->file('photo_id');
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['path' => $name]);
            $input['photo_id'] = $photo->id;
        }

        $post->update($input);

        session()->flash('post_updated', 'Post has been updated');

        return redirect('/admin/posts');
    }

    public function show4()
    {
         $posts = Post::all()->sortByDesc('id')->take(4);

         $categories = Category::all();

         return view('welcome', compact('posts', 'last', 'categories'));
    }

    public function showCat($cat)
    {
        if($cat == 'All') {
            $categ = 'ALL POSTS';
            $posts = Post::orderBy('id', 'desc')->paginate(6);
        } else {
            $category = Category::all()->where('name', '=', $cat)->first();
            $categ = 'POSTS IN '. strtoupper($category->name);
            $posts = Post::orderBy('id', 'desc')->where('category_id', '=', $category->id)->paginate(6);
        }

        $last = $posts->count();

        $categories = Category::all();

        return view('posts', compact('posts', 'categ', 'last', 'categories'));
    }

    public function showPost($name)
    {
        $post = Post::all()->where('slug', '=', $name)->first();

        $categories = Category::all();

        return view('post', compact('post', 'categories'));
    }

    public function deletePosts(Request $request) {

        if(isset($request->delete_selected)) {

            if($request->checkBoxArray == null) {
                return redirect()->back();
            }

            $posts = Post::findOrFail($request->checkBoxArray);

            foreach($posts as $post) {
                if($post->photo_id) {
                    $photo = Photo::findOrFail($post->photo_id);
                    unlink(public_path() . $photo->path);
                    $photo->delete();
                }

                $post->delete();
            }

            session()->flash('posts_deleted', 'Selected posts have been deleted');

            return redirect('/admin/posts');
        }

        if(isset($request->delete_single)) {

            $post = Post::findOrFail($request->delete_single);

            if ($post->photo) {
                $photo = Photo::findOrFail($post->photo_id);
                unlink(public_path() . $photo->path);
                $photo->delete();
            }

            $post->delete();

            session()->flash('post_deleted', 'Post has been deleted');

            return redirect('/admin/posts');
        }
    }

    public function contact() {
        $categories = Category::all();
        return view('contact', compact('categories'));
    }
}