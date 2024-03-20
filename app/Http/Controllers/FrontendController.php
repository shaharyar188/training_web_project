<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\faq;
use App\Models\subcategory;
use App\Models\upload_vedio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

class FrontendController extends Controller
{
    public function home(Request  $request){

        return view('Frontend.home');
        // return $request->all();
    }
    public function about_us(){
        return view('Frontend.about_us');
    }
    public function training_program(){
        return view('Frontend.training_program');
    }
    public function contact_us(){
        return view('Frontend.contact');
    }
    public function faq(){
        $allfaqs=faq::orderBy('id', 'DESC')->get();
        return view('Frontend.faq',compact("allfaqs"));
    }
    public function instractionAndTuturial(){
        return view('Frontend.InsAndTu',);

    }
    public  function category($id)
    {
        $category=Category::where('id',$id)->first();
        $alvideos=upload_vedio::where('category',$id)->get();
        $allsubcategory=subcategory::where('main_category',$id)->get();
        return view('Frontend.category',compact("alvideos","allsubcategory","category"));
    }
    public  function subcategory($id)
    {
        $allcategory=Category::orderBy('updated_at')->get();
        $alvideos=upload_vedio::where('subcategory',$id)->get();
        $subcategory=subcategory::where('id',$id)->first();
        return view('Frontend.subcategory',compact("alvideos","subcategory","allcategory"));
    }
    public  function video_details($id)
    {
        $video=DB::table('upload_vedios as uv')->join('categories as c','uv.category','=','c.id')->join('subcategories as sb','uv.subcategory','=','sb.id')->where('uv.id',$id)->first();
        return view('Frontend.video_detail',compact("video"));
    }
    public function sendEmail(Request $request)
    {
        $request->validate([
            "name" => 'required',
            "email" => 'required',
            "mobile" => 'required',
            "message" => 'required',
        ]);
        $mail_data = [
            'recipient' => $request->email,
            'formEmail' => 'itsme.talha64@gmail.com',
            'name' => $request->name,
            'subject' => "Trainging Web",
            'body' => [$request->name, $request->message],
        ];
        Mail::send('Frontend.email-template', $mail_data, function ($message) use ($mail_data) {
            $message->to($mail_data['recipient'])
                ->from($mail_data['formEmail'], $mail_data['name'])
                ->subject($mail_data['subject']);
        });
        return response()->json([
            "message" => 200,
        ]);
    }
}
