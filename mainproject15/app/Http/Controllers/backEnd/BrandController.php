<?php

namespace App\Http\Controllers\backEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Brand;
use DB;
use Session;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('brands')->orderBy('id','desc')->get();

        return view('backEnd.brand.brand',['datas'=>$data]);
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
    public function store(BrandRequest $request)
    {
        $inputImage = $request->file('brand_logo');
         if(isset($inputImage)){
            $images = $inputImage;
            $name = time() . $images->getClientOriginalName();
            $uploadPath = 'public/backEnd/img/band';
            $fullPath = $images->move($uploadPath, $name);
            $imageUrl = str_replace('\\', '/', $fullPath);
           }
        $inputImage1 = $request->file('brand_logo2');
         if(isset($inputImage1)){
            $images1 = $inputImage1;
            $name1 = time() . $images1->getClientOriginalName();
            $uploadPath1 = 'public/backEnd/img/band';
            $fullPath1 = $images1->move($uploadPath1, $name1);
            $imageUrl2 = str_replace('\\', '/', $fullPath1);
           }

        $data = new Brand;
        $data->brand_name = $request->brand_name;
        $data->brand_logo = $imageUrl;
        $data->brand_logo2 = $imageUrl2;
        $data->brand_desc = $request->brand_desc;
        $data->save();

        Session::flash('msg', 'Brand Information Saved Successfully'); 

        return response()->json(['url' => route('admin-brand.index')]);
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
       $data = DB::table('brands')->where('id',$id)->first();

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
         $exist = DB::table('brands')->where('id',$id)->first();
       
        

        
         $inputImage = $request->file('brand_logo');
         if(isset($inputImage)){
             if($exist){
                if (file_exists($exist->brand_logo)) {
                 unlink($exist->brand_logo);
                }
                
            }
            $images = $inputImage;
            $name = time() . $images->getClientOriginalName();
            $uploadPath = 'public/backEnd/img/band';
            $fullPath = $images->move($uploadPath, $name);
            $imageUrl = str_replace('\\', '/', $fullPath);
           }else{
             $imageUrl =$exist->brand_logo;
           }

        $inputImage1 = $request->file('brand_logo2');
         if(isset($inputImage1)){
            if($exist){
           
                if (file_exists($exist->brand_logo2)) {
                 unlink($exist->brand_logo2);
                }
            }
            $images1 = $inputImage1;
            $name1 = time() . $images1->getClientOriginalName();
            $uploadPath1 = 'public/backEnd/img/band';
            $fullPath1 = $images1->move($uploadPath1, $name1);
            $imageUrl2 = str_replace('\\', '/', $fullPath1);
           }else{
            $imageUrl2 = $exist->brand_logo2;
           }

        $data = Brand::find($id);
        $data->brand_name = $request->brand_name;
        $data->brand_logo = $imageUrl;
        $data->brand_logo2 = $imageUrl2;
        $data->brand_desc = $request->brand_desc;
        $data->save();

        Session::flash('msg', 'Brand Information Update Successfully'); 

        return response()->json(['url' => route('admin-brand.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exist = DB::table('brands')->where('id',$id)->first();
        if($exist){
            if (file_exists($exist->brand_logo)) {
             unlink($exist->brand_logo);
            } 
            if (file_exists($exist->brand_logo2)) {
             unlink($exist->brand_logo2);
            }
        }

        DB::table('brands')->where('id',$id)->delete();
        
        return response()->json(['msg' => 'Delete Successfully']);
    }
}
