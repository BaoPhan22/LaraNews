<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthorResource;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('news')->get();

        if (Auth::user()->role != 0) {
            $users = User::where('id', Auth::user()->id)->with('news')->get();
        }

        return view('admin.nguoidung.nguoidung', ['data' => $users]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $nguoidung)
    {
        if (Auth::user()->role == 0 || $nguoidung->id == Auth::user()->id) {
            return view('admin.nguoidung.nguoidung', ['data' => User::where('id', $nguoidung->id)->with('news')->get()]);
            // return $nguoidung->with('news')->get();
        }
        throw new NotFoundHttpException();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $nguoidung)
    {
        if ($nguoidung->id != Auth::user()->id) {
            throw new NotFoundHttpException();
        }
        return view('admin.nguoidung.edit', ['data' => $nguoidung]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $nguoidung, Request $request)
    {
        $nguoidung->name = $request->name;
        $nguoidung->name_display = $request->name_display;
        $nguoidung->email = $request->email;
        $nguoidung->save();

        return redirect()->route('nguoidung.show', $nguoidung->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showAll()
    {
        // return AuthorResource::collection(User::where('role', 1)->get());
        return view('tacgia.index', ['data' => AuthorResource::collection(User::where('role', 1)->paginate(10))]);
    }

    public function showOne(User $tacgia)
    {
        return
            view('tacgia.show', [
                'data' =>
                $tacgia->load("news")
            ])
            ;
    }
}
