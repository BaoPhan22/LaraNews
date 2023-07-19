<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsCategoryRequest;
use App\Http\Resources\NewsCategoriesResource;
use App\Models\NewsCategories;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class LoaiTinController extends Controller
{
    public function index()
    {
        $data = NewsCategories::select('id', 'name', 'lang', 'isVisible', 'order')->orderBy('order', 'asc')->get();
        return view('loaitin.loaitin', ['data' => $data]);
        // return $data;
    }

    public function add()
    {

        if (Auth::user()->role != 0) {
            throw new NotFoundHttpException();
        }
        return view('loaitin.themloaitin');
    }

    public function store(NewsCategoryRequest $request)
    {
        NewsCategories::create($request->validated());
        return redirect()->route('loaitin.index');
    }

    public function edit(NewsCategories $newCate)
    {

        if (Auth::user()->role != 0) {
            throw new NotFoundHttpException();
        }
        return view('loaitin.capnhatloaitin', ['data' => $newCate]);
    }

    public function update(NewsCategories $newCate, NewsCategoryRequest $request)
    {
        if (Auth::user()->role != 0) {
            throw new NotFoundHttpException();
        }
        NewsCategories::where('id', $newCate->id)->update($request->validated());
        return redirect()->route('loaitin.index');
    }

    public function destroy(NewsCategories $newCate)
    {
        $newCate->delete();
        return redirect()->route('loaitin.index');
    }

    public function show($newCateId)
    {
        return view('admin.tin.tin', ['data' => News::where('news_categories_id', $newCateId)->get()]);
    }

    public function show_client(NewsCategories $newCate)
    {
        $newCate->load('news');
        $data[] = new NewsCategoriesResource($newCate);
        return view('clients.tin.tin', ['data'=>$data]);
        // dd($data->resource) ;
        // return ($data);
    }
}
