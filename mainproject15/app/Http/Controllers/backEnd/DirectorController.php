<?php

namespace App\Http\Controllers\backEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DirectorRequest;
use App\Director;
use DB;
use Session;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('directors')->orderBy('id','desc')->get();

        return view('backEnd.company_overview.management.director',['datas'=>$data]);
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
    public function store(DirectorRequest $request)
    {
         // image
        $inputImage = $request->file('director_image');
         if(isset($inputImage)){
            $images = $inputImage;
            $name = time() . $images->getClientOriginalName();
            $uploadPath = 'public/backEnd/img/director';
            $fullPath = $images->move($uploadPath, $name);
            $imageUrl = str_replace('\\', '/', $fullPath);
           }else{
            $imageUrl = null;
           }


        $data = new Director;
        $data->director_name = $request->director_name;
        $data->director_image = $imageUrl;
        $data->director_designation = $request->director_designation;
        $data->save();

        Session::flash('msg', 'Director Information Saved Successfully'); 

        return response()->json(['url' => route('admin-director.index')]);
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
        $data = DB::table('directors')->where('id',$id)->first();

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
         $exist = DB::table('directors')->where('id',$id)->first();
        
        
         // image
        $inputImage = $request->file('director_image');
         if(isset($inputImage)){
            if($exist){
                if (file_exists($exist->director_image)) {
                 unlink($exist->director_image);
                }
            }
            $images = $inputImage;
            $name = time() . $images->getClientOriginalName();
            $uploadPath = 'public/backEnd/img/director';
            $fullPath = $images->move($uploadPath, $name);
            $imageUrl = str_replace('\\', '/', $fullPath);
           }else{
            $imageUrl = $exist->director_image;
           }


        $data = Director::find($id);
        $data->director_name = $request->director_name;
        $data->director_image = $imageUrl;
        $data->director_designation = $request->director_designation;
        $data->save();

        Session::flash('msg', 'Director Information Update Successfully'); 

        return response()->json(['url' => route('admin-director.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exist = DB::table('directors')->where('id',$id)->first();
        if($exist){
            if (file_exists($exist->director_image)) {
             unlink($exist->director_image);
            }
         DB::table('directors')->where('id',$id)->delete();
        }

        return response()->json(['msg' => 'Delete Successfully']);
    }
}
