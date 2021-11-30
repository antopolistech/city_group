<?php

namespace App\Http\Controllers\backEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManageTeamRequest;
use App\ManageTeam;
use Session;
use DB;

class ManageTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manageTeam = DB::table('manage_teams')->orderBy('id','desc')->get();

        return view('backEnd.company_overview.management.manageTeam',['manageTeam'=>$manageTeam]);
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
         // image
        $inputImage = $request->file('manageTeam_image');
         if(isset($inputImage)){
            $images = $inputImage;
            $name = time() . $images->getClientOriginalName();
            $uploadPath = 'public/backEnd/img/manageTeam';
            $fullPath = $images->move($uploadPath, $name);
            $imageUrl = str_replace('\\', '/', $fullPath);
           }else{
            $imageUrl = null;
           }

        $data = new ManageTeam;
        $data->manageTeam_name = $request->manageTeam_name;
        $data->manageTeam_image = $imageUrl;
        $data->manageTeam_designation = $request->manageTeam_designation;
        $data->save();

         Session::flash('msg', 'Management Information Saved Successfully'); 

        return response()->json(['url' => route('admin-manageTeam.index')]);
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
        $data = DB::table('manage_teams')->where('id',$id)->first();

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
          $exist = DB::table('manage_teams')->where('id',$id)->first();
        

         // image
        $inputImage = $request->file('manageTeam_image');
         if(isset($inputImage)){
            if($exist){
                if (file_exists($exist->manageTeam_image)) {
                 unlink($exist->manageTeam_image);
                }
            }
            $images = $inputImage;
            $name = time() . $images->getClientOriginalName();
            $uploadPath = 'public/backEnd/img/manageTeam';
            $fullPath = $images->move($uploadPath, $name);
            $imageUrl = str_replace('\\', '/', $fullPath);
           }else{
            $imageUrl = $exist->manageTeam_image;
           }

        $data = ManageTeam::find($id);
        $data->manageTeam_name = $request->manageTeam_name;
        $data->manageTeam_image = $imageUrl;
        $data->manageTeam_designation = $request->manageTeam_designation;
        $data->save();

         Session::flash('msg', 'Management Information Update Successfully'); 

        return response()->json(['url' => route('admin-manageTeam.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exist = DB::table('manage_teams')->where('id',$id)->first();
        if($exist){
            if (file_exists($exist->manageTeam_image)) {
             unlink($exist->manageTeam_image);
            }
        }

        DB::table('manage_teams')->where('id',$id)->delete();
        
        return response()->json(['msg' => 'Delete Successfully']);
    }
}
