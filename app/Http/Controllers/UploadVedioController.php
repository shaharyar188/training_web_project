<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\subcategory;
use App\Models\upload_vedio;
use App\Models\faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class UploadVedioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = upload_vedio::latest()->get();
        return view('vedio.view_uploadedVedio', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allcategory=Category::where('category_status',1)->get();
        return   view('vedio.upload_vedio',compact("allcategory"));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
//            'upload_video' => 'required',
        ]);
        $variation_section = array();
        foreach ($request->input('side') as $key => $val) {
            $arr_section_desctiption = $request->input("video_detail_description_" . $val);
            $variation_section[$val] = $arr_section_desctiption;
        }
        $variation_section_name = array();
        $arrt_section_name = $request->input("video_detail_heading");
        foreach ($request->input('side') as $key => $val) {
            $variation_section_name[$val] = $arrt_section_name[$key];
        }
        $videoType = $request->input('video_source');
        if ($videoType == "online_url") {
            $imgUrl = $request->input('video_url');
            upload_vedio::create([
                'title' => $request->title,
                'category' => $request->category,
                'subcategory' => $request->subcategory,
                'video_detail_heading' => serialize($variation_section_name),
                'video_detail_description' => serialize($variation_section),
                'video_url' => $imgUrl,
            ]);
            return response()->json(['message' => 200]);
        } else {
            $upload_video = $request->file('upload_video');
            $vedio_ext = $upload_video->getClientOriginalExtension();
            $vedio_name = 'video_' . time() . '.' . $vedio_ext;
            $upload_video->move('video/', $vedio_name);
            upload_vedio::create([
                'title' => $request->title,
                'category' => $request->category,
                'subcategory' => $request->subcategory,
                'video_detail_heading' => serialize($variation_section_name),
                'video_detail_description' => serialize($variation_section),
                'video' => $vedio_name,
            ]);
            return response()->json(['message' => 200]);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(upload_vedio $upload_vedio)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, upload_vedio $upload_vedio)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(upload_vedio $upload_vedio, $id)
    {

        $get_video = upload_vedio::findOrFail($id);

        if (!empty($get_video->video_name)) {
            $video_path = './video/' . $get_video->video_name;
            if (File::delete($video_path)) {
                $get_video->delete();
                return 200;
            } else {
                return 300;
            }
        } else {
            if ($get_video->delete()) {
                return 200;
            } else {
                return 300;
            }
        }
    }
    public  function uservedio()
    {
        $vedio =   upload_vedio::all();
        return view('user_video.vedio', compact('vedio'));
    }
    public  function  get_subcategory($id)
    {
        $subcategory=subcategory::where('main_category',$id)->where('subcat_status',1)->get();
        return $subcategory;
    }
}
