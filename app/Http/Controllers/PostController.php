<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

class PostController extends Controller
{
    public function showPost(Post $post) {
        // bikin menjadi eager loading
        $users = User::with('posts')->latest()->get()->take(5);
        return view('post.show', [
            'post' => $post,
            'users' => $users
        ]);
    }
    // untuk user bisa posting
    public function createPost(Request $request, MessageBag $errors) {

        // Validasi
        $request->validate([
            'image_posts.*' => ['nullable', 'mimes:png,jpg,jpeg'],
            'content_coba' => ['required', 'string'],
        ],[
            'image_posts.*.mimes' => 'File upload must be a file of type: png, jpg, jpeg.',
            'content_coba.required' => 'Content cannot be empty.',
        ]);

        $imagePath = [];

        // Pengecekan jika user mengunggah file gambar
        if ($request->hasFile('image_posts')) {
            foreach ($request->file('image_posts') as $image) {
                $imagePath[] = $image->store('images/posts', 'public');
            }
        } else {
            $imagePath = null; // Jika tidak ada gambar, set null
        }


        // pengecekan postinga user menambah atau tidak menambahkan gambar
        $post = $request->user()->posts()->create([
            'body' => $request->content_coba,
        ]);

        // pengecekan bila user menambah atau tidak menambahkan gambar
        if (!empty($imagePath)) {
            foreach ($imagePath as $path) {
                $post->images()->create([
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('home');
    }

    // fitur hapus postingan user
    public function destroy(Post $post) {
        $post->delete();
        return redirect()->back();
    }

    // fitur like postingan
    public function like(Post $post) {
        $post->likedByUsers()->attach(Auth::user()->id);

        Notification::create([
            'user_id' => $post->user_id,
            'post_id' => $post->id,
            'action_by' => Auth::user()->id,
        ]);

        return redirect()->back();
    }

    // fitur unlike postingan
    public function unlike(Post $post) {
        $post->likedByUsers()->detach(Auth::user()->id);

        // menghapus notif bila user mengklik untuk kedua kalinya
        Notification::where('user_id', $post->user_id)
                    ->where('post_id', $post->id)
                    ->where('action_by', Auth::user()->id)
                    ->where('type', 'like')->delete();

        return redirect()->back();
    }

    // fitur komenan postingan
    public function createComment(Post $post, Request $request) {

        $request->validate([
            'comment' => ['required', 'string'],
        ]);

        $post->comments()->create([
            'body' => $request->comment,
            'user_id' => Auth::user()->id
        ]);

        // untuk notifikasi bila user yang sedang login komen postingan
        Notification::create([
            'user_id' => $post->user_id,
            'post_id' => $post->id,
            'action_by' => Auth::user()->id,
            'type' => 'comment',
        ]);

        return redirect()->back();
    }

    // fitur bookmarks
    public function bookmark(Post $post) {
        $post->bookmarksByUsers()->attach(Auth::user()->id);
        return redirect()->route('profile.bookmarks', Auth::user()->username);
    }

    // fitur unbookmarks
    public function unbookmark(Post $post) {
        $post->bookmarksByUsers()->detach(Auth::user()->id);
        return redirect()->back();
    }

}
