<?php

namespace App\Http\Controllers\frontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CVCareer;
use Session;
use DB;

class CVController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $request->validate([
            'cv' => 'required|mimes:pdf|max:2048',
        ]);

         $inputImage = $request->file('cv');
         if(isset($inputImage)){
            $images = $inputImage;
            $name = time() . $images->getClientOriginalName();
            $uploadPath = 'public/backEnd/img/cv_career';
            $fullPath = $images->move($uploadPath, $name);
            $imageUrl = str_replace('\\', '/', $fullPath);
           }

        $data = new CVCareer;
        $data->career_designation = $request->career_designation;
        $data->cv = $imageUrl;
        $data->save();

        return response()->json(['data' => $data]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cv = DB::table('c_v_careers')->where('id',$id)->first();
        if (file_exists($cv->cv)) {
             unlink($cv->cv);
        }

        DB::table('c_v_careers')->where('id',$id)->delete();

        return response()->json(['msg' => 'Delete Successfully']);
        
    }
}
