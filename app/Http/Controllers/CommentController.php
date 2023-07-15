<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(News $tin)
    {
        $comments = $tin->comment()->get();
        // return $tin;
        return view('binhluan.binhluan', ['data' => $comments, 'tin' => $tin]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(News $tin, Request $request)
    {
        $tin->comment()->create(
            [
                'content' => $request->content,
                'user_id' => Auth::user()->id,
                'news_id' => $tin->id
            ]
        );
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(News $tin, Comment $binhluan)
    {
        $comments = $tin->comment()->get();
        return view('binhluan.binhluan', ['data' => $comments]);
        // return $comments;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Comment $binhluan)
    {
        $binhluan->toggleIsVisible();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
