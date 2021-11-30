<?php

namespace App\Http\Controllers\backEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AchievementRequest;
use App\Achieve;
use DB;
use Session;

class AcheiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acheive = DB::table('achieves')->orderBy('id','desc')->get();
        return view('backEnd.company_overview.acheive',['acheives'=>$acheive]);
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
    public function store(AchievementRequest $request)
    {
        $inputImage = $request->file('achieve_image');
         if(isset($inputImage)){
            $images = $inputImage;
            $name = time() . $images->getClientOriginalName();
            $uploadPath = 'public/backEnd/img/achieve';
            $fullPath = $images->move($uploadPath, $name);
            $imageUrl = str_replace('\\', '/', $fullPath);
           }

        $data = new Achieve;
        $data->achieve_name = $request->achieve_name;
        $data->achieve_desc = $request->achieve_desc;
        $data->achieve_image = $imageUrl;
        $data->save();

         Session::flash('msg', 'Achieve Information Add Successfully'); 

        return response()->json(['url' => route('admin-achievement.index')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('achieves')->where('id',$id)->first();

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
       $data = DB::table('achieves')->where('id',$id)->first();

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
        $exist = DB::table('achieves')->where('id',$id)->first();
        

         $inputImage = $request->file('achieve_image');
         if(isset($inputImage)){
            if($exist){
                if (file_exists($exist->achieve_image)) {
                 unlink($exist->achieve_image);
                }
            }
            $images = $inputImage;
            $name = time() . $images->getClientOriginalName();
            $uploadPath = 'public/backEnd/img/achieve';
            $fullPath = $images->move($uploadPath, $name);
            $imageUrl = str_replace('\\', '/', $fullPath);
           }
           else{
            $imageUrl =$exist->achieve_image;
           }

        $data = Achieve::find($id);
        $data->achieve_name = $request->achieve_name;
        $data->achieve_desc = $request->achieve_desc;
        $data->achieve_image = $imageUrl;
        $data->save();

         Session::flash('msg', 'Achieve Information Update Successfully'); 

        return response()->json(['url' => route('admin-achievement.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $exist = DB::table('achieves')->where('id',$id)->first();
        if($exist){
            if (file_exists($exist->achieve_image)) {
             unlink($exist->achieve_image);
            }
         DB::table('achieves')->where('id',$id)->delete();
        }

        return response()->json(['msg' => 'Delete Successfully']);
    }
}
