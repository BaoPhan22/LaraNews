<?php

namespace App\Http\Controllers;

use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::with('user', 'news_categories')->get();
        if (Auth::user()->role != 0) {
            $news = News::with('user', 'news_categories')->where('user_id', Auth::user()->id)->get();
        }
        return view('admin.tin.tin', ['data' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tin.themtin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(News $tin)
    {
        if (Auth::user()->role == 0 || $tin['user']->id == Auth::user()->id) {
            return view('admin.tin.chitiettin', ['data' => $tin]);
        }

        throw new NotFoundHttpException();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $tin)
    {
        if ($tin['user']->id !== Auth::user()->id) {
            throw new NotFoundHttpException();
        }
        return 'Chỉnh đi';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function show_client(News $tin)
    {
        $tin->load('comment');
        $data[] = new NewsResource($tin);
        // return(($data[0]->content));
        return view('clients.tin.chitiettin', ['data' => $data]);
    }
}
