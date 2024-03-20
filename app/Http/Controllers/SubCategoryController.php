<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\subcategory;
use Illuminate\Support\Facades\DB;
use YoutubeDl\Entity\Category as EntityCategory;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allSubcategory = DB::table('subcategories as subcat')->orderBy('subcat.id', 'DESC')->join('categories as cat', 'subcat.main_category', '=', 'cat.id')->select('subcat.*', 'cat.category_name', 'cat.id')->get();
        return view('SubCategory.view', compact('allSubcategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category_name = Category::where('category_status',1)->get();
        return  view('SubCategory.add', compact('category_name'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subcategory_name' => 'required|unique:subcategories,subcat_name',
        ]);
        subcategory::create([
            'main_category' => $request->main_category,
            'subcat_name' => $request->subcategory_name,
            'subcat_status' => 1,
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
        $status = subcategory::where('id', $id)->first();
        if ($status->subcat_status == 1) {
            subcategory::where('id', $id)->update(['subcat_status' => 0]);
        } else {
            subcategory::where('id', $id)->update(['subcat_status' => 1]);
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

        $editRecord = subcategory::find($id)->first();
        return  response()->json([
            'message' => 200,
            'data' => $editRecord,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        subcategory::find($id)->update([
            'main_category' => $request->main_category,
            'subcat_name' => $request->subcategory_name,
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
        $delteRecord = subcategory::where('id', $id)->delete();
        return  response()->json([
            'message' => 200,
        ]);
    }
}
