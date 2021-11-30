<?php

namespace App\Http\Controllers\backEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Slider;
use DB;
use Session;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('sliders')->orderBy('id','desc')->get();
        return view("backEnd.slider.slider",['datas'=>$data]);
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
    public function store(SliderRequest $request)
    {
        $inputImage = $request->file('sliderImage');
         if(isset($inputImage)){
            $images = $inputImage;
            $name = time() . $images->getClientOriginalName();
            $uploadPath = 'public/backEnd/img/slider';
            $fullPath = $images->move($uploadPath, $name);
            $imageUrl = str_replace('\\', '/', $fullPath);
           }
        $data = new Slider;
        $data->sliderText1 = $request->sliderText1;
        $data->sliderText2 = $request->sliderText2;
        $data->sliderImage = $imageUrl;
        $data->save();

        Session::flash('msg', 'Slider Add Successfully'); 

        return response()->json(['url' => route('slider.index')]);
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
        $data = DB::table('sliders')->where('id',$id)->first();
        return response()->json(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $img = DB::table('sliders')->where('id',$request->id)->first();

        $inputImage = $request->file('sliderImage');
         if($inputImage){

            if (file_exists($img->sliderImage)) {
             unlink($img->sliderImage);
            }

            $images = $inputImage;
            $name = time() . $images->getClientOriginalName();
            $uploadPath = 'public/backEnd/img/slider';
            $fullPath = $images->move($uploadPath, $name);
            $imageUrl = str_replace('\\', '/', $fullPath);
           }
        else{
            $imageUrl = $img->sliderImage;
        }

        $data = Slider::find($request->id);
        $data->sliderText1 = $request->sliderText1;
        $data->sliderText2 = $request->sliderText2;
        $data->sliderImage = $imageUrl;
        $data->save();

        Session::flash('msg', 'Slider Update Successfully'); 

        return response()->json(['url' => route('slider.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $exist = DB::table('sliders')->where('id',$id)->first();
        if($exist){
            if (file_exists($exist->sliderImage)) {
             unlink($exist->sliderImage);
            }
        }

        DB::table('sliders')->where('id',$id)->delete();
        
        return response()->json(['msg' => 'Delete Successfully']);
    } 
   
}
