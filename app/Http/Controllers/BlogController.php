<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::active()
            ->published()

            ->when(request('search'), function ($query) {

                $query->where(function ($q) {

                    $q->where('title', 'like', '%' . request('search') . '%')
                        ->orWhere('short_description', 'like', '%' . request('search') . '%')
                        ->orWhere('description', 'like', '%' . request('search') . '%');

                });

            })

            ->latest('published_at')
            ->paginate(9)
            ->withQueryString();

        $latestBlogs = Blog::active()
            ->published()
            ->latest('published_at')
            ->take(5)
            ->get();

        return view('blog.index', compact(
            'blogs',
            'latestBlogs'
        ));
    }

    /**
     * Single Blog
     */
    public function show(string $slug)
    {
        $blog = Blog::active()
            ->published()
            ->where('slug', $slug)
            ->firstOrFail();

        $latestBlogs = Blog::active()
            ->published()
            ->where('id', '!=', $blog->id)
            ->latest('published_at')
            ->take(5)
            ->get();

        $previousBlog = Blog::active()
            ->published()
            ->where('published_at', '<', $blog->published_at)
            ->latest('published_at')
            ->first();

        $nextBlog = Blog::active()
            ->published()
            ->where('published_at', '>', $blog->published_at)
            ->oldest('published_at')
            ->first();

        return view('blog.show', compact(
            'blog',
            'latestBlogs',
            'previousBlog',
            'nextBlog'
        ));
    }
}
