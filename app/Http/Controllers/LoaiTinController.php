<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoaiTinRequest;
use App\Models\NewsCategories;
use App\Models\News;
use Illuminate\Http\Request;

class LoaiTinController extends Controller
{
    public function index()
    {
        $data = NewsCategories::select('id', 'name', 'lang', 'isVisible', 'order')->orderBy('order', 'asc')->get();
        return view('loaitin.loaitin', ['data' => $data]);
    }

    public function add()
    {
        return view('loaitin.themloaitin');
    }

    public function store(LoaiTinRequest $request)
    {
        $request->validated();
        NewsCategories::create([
            'name' => $request->name,
            'lang' => $request->lang,
            'isVisible' => $request->isVisible,
            'order' => $request->order,
        ]);
        return redirect()->route('loaitin.index');
    }
    public function edit(NewsCategories $newCate)
    {
        return view('loaitin.capnhatloaitin', ['data' => $newCate]);
    }
    public function update(NewsCategories $newCate, LoaiTinRequest $request)
    {
        $request->validated();

        NewsCategories::where('id', $newCate->id)->update([
            'name' => $request->name,
            'lang' => $request->lang,
            'isVisible' => $request->isVisible,
            'order' => $request->order,
        ]);
        return redirect()->route('loaitin.index');
    }
    public function destroy(NewsCategories $newCate)
    {
        $newCate->delete();
        return redirect()->route('loaitin.index');
    }
}