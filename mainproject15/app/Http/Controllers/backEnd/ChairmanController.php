<?php

namespace App\Http\Controllers\backEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChairmanRequest;
use App\Chairman;
use DB;
use Session;

class ChairmanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('chairmen')->first();

        return view('backEnd.company_overview.management.chairman',['data'=>$data]);
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
    public function store(ChairmanRequest $request)
    {
        $exist = DB::table('chairmen')->first();
        if($exist){
            if (file_exists($exist->chairman_image)) {
             unlink($exist->chairman_image);
            }
            DB::table('chairmen')->delete();
        }

        // image
        $inputImage = $request->file('chairman_image');
         if(isset($inputImage)){
            $images = $inputImage;
            $name = time() . $images->getClientOriginalName();
            $uploadPath = 'public/backEnd/img/chairman';
            $fullPath = $images->move($uploadPath, $name);
            $imageUrl = str_replace('\\', '/', $fullPath);
           }

        $data = new Chairman;
        $data->chairman_name = $request->chairman_name;
        $data->chairman_message = $request->chairman_message;
        $data->chairman_image = $imageUrl;
        $data->chairman_designation = $request->chairman_designation;
        $data->save();

         Session::flash('msg', 'Chairman Information Saved Successfully'); 

        return response()->json(['url' => route('admin-chairman.index')]);
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
        $data = DB::table('chairmen')->where('id',$id)->first();

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
        $exist = DB::table('chairmen')->first();
       

        // image
        $inputImage = $request->file('chairman_image');
         if(isset($inputImage)){
            if($exist){
                if (file_exists($exist->chairman_image)) {
                 unlink($exist->chairman_image);
                }
            }
            $images = $inputImage;
            $name = time() . $images->getClientOriginalName();
            $uploadPath = 'public/backEnd/img/chairman';
            $fullPath = $images->move($uploadPath, $name);
            $imageUrl = str_replace('\\', '/', $fullPath);
           }
           else{
            $imageUrl =$exist->chairman_image;
           }

        $data = Chairman::find($id);
        $data->chairman_name = $request->chairman_name;
        $data->chairman_message = $request->chairman_message;
        $data->chairman_image = $imageUrl;
        $data->chairman_designation = $request->chairman_designation;
        $data->save();

         Session::flash('msg', 'Chairman Information Update Successfully'); 

        return response()->json(['url' => route('admin-chairman.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('chairmen')->where('id',$id)->delete();
        
        return response()->json(['msg' => 'Delete Successfully']);
    }
}
