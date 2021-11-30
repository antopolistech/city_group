<?php

namespace App\Http\Controllers\backEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;
use App\About;
use Session;
use DB;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('abouts')->first();
        return view('backEnd.company_overview.about',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AboutRequest $request)
    {
       
        $inputImage = $request->file('banner_image');
        $inputImage1 = $request->file('vision_mission_img');
        $inputImage2 = $request->file('core_value_img');

         if(isset($inputImage)){
            $images = $inputImage;
            $name = time() . $images->getClientOriginalName();
            $uploadPath = 'public/backEnd/img/about';
            $fullPath = $images->move($uploadPath, $name);
            $imageUrl = str_replace('\\', '/', $fullPath);
           }

         if(isset($inputImage1)){
            $images1 = $inputImage1;
            $name1 = time() . $images1->getClientOriginalName();
            $uploadPath1 = 'public/backEnd/img/about';
            $fullPath1 = $images1->move($uploadPath1, $name1);
            $imageUrl1 = str_replace('\\', '/', $fullPath1);
           }

         if(isset($inputImage2)){
            $images2 = $inputImage2;
            $name2 = time() . $images2->getClientOriginalName();
            $uploadPath2 = 'public/backEnd/img/about';
            $fullPath2 = $images2->move($uploadPath2, $name2);
            $imageUrl2 = str_replace('\\', '/', $fullPath2);
           }

        $exist = DB::table('abouts')->first();
        if($exist){
            if (file_exists($exist->banner_image)) {
             unlink($exist->banner_image);
            }
            if (file_exists($exist->vision_mission_img)) {
             unlink($exist->vision_mission_img);
            } 
            if (file_exists($exist->core_value_img)) {
             unlink($exist->core_value_img);
            }
            DB::table('abouts')->delete();
        }

        $data = new About;
        $data->about_text = $request->about_text;
        $data->vision_text = $request->vision_text;
        $data->mission_text = $request->mission_text;
        $data->banner_image = $imageUrl;
        $data->vision_mission_img = $imageUrl1;
        $data->core_value_img = $imageUrl2;
        $data->save();

        Session::flash('msg', 'About Information Add Successfully'); 

        return response()->json(['url' => route('about.index')]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('abouts')->where('id',$id)->first();

        return response()->json(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id)
    {
        $inputImage = $request->file('banner_image');
        $inputImage1 = $request->file('vision_mission_img');
        $inputImage2 = $request->file('core_value_img');
        $exist = DB::table('abouts')->where('id',$id)->first();
        // dd($exist);
         if(isset($inputImage)){
            if (file_exists($exist->banner_image)) {
             unlink($exist->banner_image);
            }
            $images = $inputImage;
            $name = time() . $images->getClientOriginalName();
            $uploadPath = 'public/backEnd/img/about';
            $fullPath = $images->move($uploadPath, $name);
            $imageUrl = str_replace('\\', '/', $fullPath);
           }else{
           $imageUrl=$exist->banner_image;
           }

         if(isset($inputImage1)){
             if (file_exists($exist->vision_mission_img)) {
             unlink($exist->vision_mission_img);
            } 
            $images1 = $inputImage1;
            $name1 = time() . $images1->getClientOriginalName();
            $uploadPath1 = 'public/backEnd/img/about';
            $fullPath1 = $images1->move($uploadPath1, $name1);
            $imageUrl1 = str_replace('\\', '/', $fullPath1);
           }
           else{
           $imageUrl1= $exist->vision_mission_img;
           }

         if(isset($inputImage2)){
            if (file_exists($exist->core_value_img)) {
             unlink($exist->core_value_img);
            }
            $images2 = $inputImage2;
            $name2 = time() . $images2->getClientOriginalName();
            $uploadPath2 = 'public/backEnd/img/about';
            $fullPath2 = $images2->move($uploadPath2, $name2);
            $imageUrl2 = str_replace('\\', '/', $fullPath2);
           }
           else{
            $imageUrl2=$exist->core_value_img;
           }

        
        // if($exist){
            
           
            
        //     DB::table('abouts')->delete();
        // }

        $data = About::find($id);
        $data->about_text = $request->about_text;
        $data->vision_text = $request->vision_text;
        $data->mission_text = $request->mission_text;
        $data->banner_image = $imageUrl;
        $data->vision_mission_img = $imageUrl1;
        $data->core_value_img = $imageUrl2;
        $data->save();
        // DB::table('abouts')->where('id',$id)->delete();

        Session::flash('msg', 'About Information Update Successfully'); 

        return response()->json(['url' => route('about.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $exist = DB::table('abouts')->where('id',$id)->first();
        if($exist){
            if (file_exists($exist->banner_image)) {
             unlink($exist->banner_image);
            }
            if (file_exists($exist->vision_mission_img)) {
             unlink($exist->vision_mission_img);
            } 
            if (file_exists($exist->core_value_img)) {
             unlink($exist->core_value_img);
            }
            DB::table('abouts')->where('id',$id)->delete();
        }
        return response()->json(['msg' => 'Delete Successfully']);
    }
}
