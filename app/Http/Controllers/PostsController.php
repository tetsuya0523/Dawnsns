<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class PostsController extends Controller
{

    public function index()
    {
        $user_id = Auth::id();
        $timelines = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->select('posts.id', 'posts.user_id', 'posts.created_at', 'posts.posts', 'users.images', 'users.username')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('posts.index', compact('user_id', 'timelines'));
    }

    public function create(Request $request)
    {
        $post = $request->input('newPost');
        DB::table('posts')->insert([
            'posts' => $post,
            'user_id' => Auth::id(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect('/top');
    }



    public function update(Request $request)
    {
        $request->validate([
            'upPost' => 'required|max:150',
        ], [
            'required' => 'この項目はメッセージ必須です',
            'max' => '名前は150文字以内です',
        ]);

        $id = $request->input('id');
        $up_post = $request->input('upPost');

        DB::table('posts')
            ->where('id', $id)
            ->update([
            'posts' => $up_post
        ]);

        return redirect('/top');
    }

    public function delete($id)
    {
        DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('/top');
    }

    public function profileForm()
    {
        return view('posts.profile');
    }

    public function profileUpdate(Request $request)
    {

        DB::table('users')
            ->update([
            'username' => $request->input('username'),
            'mail' => $request->input('mail'),
            'bio' => $request->input('bio'),
        ]);

        if (isset($request->password)) {
            DB::table('users')
                ->update([
                'password' => bcrypt($request->input('new_password')),
            ]);
        }

        if (isset($request->image)) {
            DB::table('users')
                ->update([
                'image' => $request->input('image'),
            ]);
            $dir = "images";
            $file_name = $request->file('image')->getClientOriginalName();
            $request->file('images')->store('public/' . $dir, $file_name);
        }

        return back();
    }


}
