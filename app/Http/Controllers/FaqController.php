<?php

namespace App\Http\Controllers;

use App\Models\faq;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\user_meta;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faq = faq::orderBy('id', 'DESC')->get();
        return view('faq.faq_view', compact('faq'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('faq.add_faq');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'question' => 'required',
        //     'answer' => 'required',
        //     'image' => [
        //         'mimes:jpg,png,jpeg',
        //     ],

        // ]);

        if ($request->hasfile("image")) {
            $images = $request->file('image');
            $results = [];
            foreach ($images as $image) {
                $ext = $image->getClientOriginalExtension();
                $imageName = rand(1000, 9000) . '.' . $ext;
                $storeImg = $image->move('./images/', $imageName);
                $results[] = $imageName;
            }
            $emploadeImg = implode(",", $results);
            faq::create([
                "user_id" => Auth::user()->id,
                "question" => $request->question,
                "answer" => $request->answer,
                "faq_image" =>  $emploadeImg,
            ]);
            return response()->json([
                "message" => 200,
            ]);
        } else {

            faq::create([
                "user_id" => Auth::user()->id,
                "question" => $request->question,
                "answer" => $request->answer,
            ]);
            return response()->json([
                "message" => 200,
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(faq $faq)
    {

       $faq_detail = faq::where('id', $faq->id)->first();
        $expImg= explode(",", $faq_detail->faq_image);
        return response()->json([
            'message' => 200,
            'data' => $faq_detail,
            'img'=>$expImg,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $allFaq = faq::where('id', $id)->first();
        return  response()->json([
            'data' => $allFaq,
            'message' => 200,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, faq $faq)
    {
         faq::where('id',$request->hiden)->update([
            'question'=>$request->input('question'),
            'answer'=>$request->input('answer'),
         ]);
        return   response()->json([
            'message'=>200,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(faq $faq)
    {
        $fetchImg = $faq->faq_image;
        $explodeImg = explode(",", $fetchImg);
        foreach ($explodeImg as $key => $value) {
            $directoryPath = public_path('./images');
            File::delete($directoryPath . '/' . $value);
        }
        $delete =  faq::where('id', $faq->id)->delete();
        return response()->json([
            'message' => 200,
        ]);
    }

    public  function DetailFaq()
    {
        return  view('faq.DetailFaq');
    }
    public function delImage(Request $request, $id)
    {
        $imgkey = $request->imgKey;
        $data = faq::where('id', $id)->first();
        $faq_img = $data->faq_image;
        $unser = explode(",", $faq_img);
        if (array_key_exists($imgkey, $unser)) {
            $destination = public_path() . "/images/" . $unser[$imgkey];
            unlink($destination);
            unset($unser[$imgkey]);
            $updateImage = implode(",",  $unser);
            faq::where('id', $id)->update([
                "faq_image" => $updateImage,
            ]);
            return  response()->json([
                'key' => $imgkey,
                'message' => 200,
            ]);
        }
    }
}
