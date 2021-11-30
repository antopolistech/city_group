<?php

namespace App\Http\Controllers\backEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SisterConcernRequest;
use App\SisterCon;
use DB;
use Session;

class SisterConController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sister = DB::table('sister_cons')->orderBy('id','desc')->get();

        return view('backEnd.company_overview.sisterConcern',['sister'=>$sister]);
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
    public function store(SisterConcernRequest $request)
    {
        $inputImage = $request->file('sister_image');
         if(isset($inputImage)){
            $images = $inputImage;
            $name = time() . $images->getClientOriginalName();
            $uploadPath = 'public/backEnd/img/sister_concern';
            $fullPath = $images->move($uploadPath, $name);
            $imageUrl = str_replace('\\', '/', $fullPath);
           }


        $data = new SisterCon;
        $data->sister_name = $request->sister_name;
        $data->started_type = $request->started_type;
        $data->sister_year = $request->sister_year;
        $data->sister_image = $imageUrl;
        $data->sister_functionality = $request->sister_functionality;
        $data->save();

        Session::flash('msg', 'Sister Concern Information Add Successfully'); 

        return response()->json(['url' => route('admin-sister-concern.index')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('sister_cons')->where('id',$id)->first();

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
        $data = DB::table('sister_cons')->where('id',$id)->first();

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
        $exist = DB::table('sister_cons')->where('id',$id)->first();
        

        
        $inputImage = $request->file('sister_image');
         if(isset($inputImage)){
            if($exist){
                if (file_exists($exist->sister_image)) {
                 unlink($exist->sister_image);
                }
            }
            $images = $inputImage;
            $name = time() . $images->getClientOriginalName();
            $uploadPath = 'public/backEnd/img/sister_concern';
            $fullPath = $images->move($uploadPath, $name);
            $imageUrl = str_replace('\\', '/', $fullPath);
           }else{
            $imageUrl=$exist->sister_image;
           }


        $data = SisterCon::find($id);
        $data->sister_name = $request->sister_name;
        $data->started_type = $request->started_type;
        $data->sister_year = $request->sister_year;
        $data->sister_image = $imageUrl;
        $data->sister_functionality = $request->sister_functionality;
        $data->save();


        Session::flash('msg', 'Sister Concern Information Update Successfully'); 

        return response()->json(['url' => route('admin-sister-concern.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exist = DB::table('sister_cons')->where('id',$id)->first();
        if($exist){
            if (file_exists($exist->sister_image)) {
             unlink($exist->sister_image);
            }
         DB::table('sister_cons')->where('id',$id)->delete();
        }
        return response()->json(['msg' => 'Delete Successfully']);
    }
}
