<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie::all();
        return view('dashborde.categories.index', ['categorie' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('dashborde.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([

            'title' => 'required|min:3|max:30|string|unique:categories,title',
            'activity' => 'nullable|in:on',


        ]);


        if ($request->input('activity') == 'on') {

            $activity = true;
        } else {

            $activity = false;
        }
        $categorie = new Categorie([
            'title' => $request->input('title'),
            'is_active' => $activity,


        ]);
        $categorie->save();
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categorie = Categorie::findOrFail($id);
        return view('dashborde.categories.edit', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = $request->validate([

            'title' => 'required|min:3|max:30|string|unique:categories,title,except,id',
            'activity' => 'nullable|in:on',

        ]);


        if ($request->input('activity') == 'on') {

            $activity = true;
        } else {

            $activity = false;
        }
        $categorie = new Categorie([
            'title' => $request->input('title'),
            'is_active' => $activity,


        ]);
        $categorie->save();
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categorie = Categorie::findOrFail($id);
        $is_Deleted = $categorie->delete();
        if ($is_Deleted) {
            return redirect()->route('categories.index');
        }
    }
}
