<?php

namespace App\Http\Controllers;

use App\Models\LoaiTin;
use Illuminate\Http\Request;

class LoaiTinController extends Controller
{
    public function index()
    {
        $data = LoaiTin::select('id', 'ten', 'lang', 'anHien', 'thuTu')->orderBy('thuTU', 'asc')->get();
        return view('tin.loaitin', ['data' => $data]);
    }

    public function add()
    {
        return view('tin.themloaitin');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:1|max:255',
            'language' => 'required',
            'isVisible' => 'required',
        ]);
        LoaiTin::create([
            'ten' => $request->name,
            'lang' => $request->language,
            'anHien' => $request->isVisible,
            'thuTu' => $request->order,
        ]);
        return redirect()->route('loaitin.index');
    }
    public function edit($id)
    {
        $data = LoaiTin::find($id);
        return view('tin.capnhatloaitin', ['data' => $data]);
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|min:1|max:255',
            'language' => 'required',
            'isVisible' => 'required',
        ]);
        LoaiTin::where('id', $request->id)->update([
            'ten' => $request->name,
            'lang' => $request->language,
            'anHien' => $request->isVisible,
            'thuTu' => $request->order,
        ]);
        return redirect()->route('loaitin.index');
    }
}
