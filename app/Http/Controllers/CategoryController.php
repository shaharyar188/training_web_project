<?php

namespace App\Http\Controllers;

use App\Models\category as ModelsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allUser = Category::all();
        return view('Category.view', compact('allUser'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  view('Category.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
        ]);
        $user = DB::table('categories')->insert([
            'category_name' => $request->category_name,
            'user_id' => Auth()->user()->id,
            'category_status' => 1,
        ]);

        return  response()->json([
            'message' => 200,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $status = Category::where('id', $id)->first();
        if ($status->category_status == 1) {
            Category::where('id', $id)->update(['category_status' => 0]);
        } else {
            Category::where('id', $id)->update(['category_status' => 1]);
        }
        return   response()->json([
            'status' => $status,
            'message' => 200,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $editCategory = Category::find($id)->first();
        return  response()->json([
            'message' => 200,
            'data' => $editCategory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updateCategory = Category::find($id)->update([
            'category_name' => $request->edit_category_name,
        ]);
        return  response()->json([
            'message' => 200,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteCat = Category::find($id)->delete();
        return  response()->json([
            'message' => 200,
        ]);
    }
}
