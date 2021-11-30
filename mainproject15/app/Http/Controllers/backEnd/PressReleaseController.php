<?php

namespace App\Http\Controllers\backEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PressReleaseRequest;
use App\PressRelease;
use Session;
use DB;

class PressReleaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('press_releases')->orderBy('id','desc')->get();

        return view('backEnd.media.press_release',['datas'=>$data]);
    }

    /**
     * Show the form for creating a press_release_descnew resource.
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
    public function store(PressReleaseRequest $request)
    {
        $inputImage = $request->file('press_release_image');
         if(isset($inputImage)){
            $images = $inputImage;
            $name = time() . $images->getClientOriginalName();
            $uploadPath = 'public/backEnd/img/press_release';
            $fullPath = $images->move($uploadPath, $name);
            $imageUrl = str_replace('\\', '/', $fullPath);
           }

        $data = new PressRelease;
        $data->press_release_title = $request->press_release_title;
        $data->press_release_place = $request->press_release_place;
        $data->press_release_date = $request->press_release_date;
        $data->press_release_image = $imageUrl;
        $data->press_release_desc = $request->press_release_desc;
        $data->save();

        Session::flash('msg', 'Press Release Information Saved Successfully'); 

        return response()->json(['url' => route('admin-PressRelease.index')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('press_releases')->where('id',$id)->first();

        return response()->json(['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('press_releases')->where('id',$id)->first();

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
        $exist = DB::table('press_releases')->where('id',$id)->first();
        
        
        $inputImage = $request->file('press_release_image');
         if(isset($inputImage)){
            if($exist){
                if (file_exists($exist->press_release_image)) {
                 unlink($exist->press_release_image);
                }
            }
            $images = $inputImage;
            $name = time() . $images->getClientOriginalName();
            $uploadPath = 'public/backEnd/img/press_release';
            $fullPath = $images->move($uploadPath, $name);
            $imageUrl = str_replace('\\', '/', $fullPath);
           }else{
            $imageUrl =$exist->press_release_image;
           }

        $data = PressRelease::find($id);
        $data->press_release_title = $request->press_release_title;
        $data->press_release_place = $request->press_release_place;
        $data->press_release_date = $request->press_release_date;
        $data->press_release_image = $imageUrl;
        $data->press_release_desc = $request->press_release_desc;
        $data->save();

        Session::flash('msg', 'Press Release Information Update Successfully'); 

        return response()->json(['url' => route('admin-PressRelease.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $exist = DB::table('press_releases')->where('id',$id)->first();
        if($exist){
            if (file_exists($exist->press_release_image)) {
             unlink($exist->press_release_image);
            }
        }

        DB::table('press_releases')->where('id',$id)->delete();
        
        return response()->json(['msg' => 'Delete Successfully']);
    }
}
