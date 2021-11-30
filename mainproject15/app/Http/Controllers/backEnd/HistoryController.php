<?php

namespace App\Http\Controllers\backEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\HistoryRequest;
use App\History;
use DB;
use Session;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $history = DB::table('histories')->orderBy('id','desc')->get();

        return view('backEnd.company_overview.history',['history'=>$history]);
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
    public function store(HistoryRequest $request)
    {
         $inputImage = $request->file('history_image');
         if(isset($inputImage)){
            $images = $inputImage;
            $name = time() . $images->getClientOriginalName();
            $uploadPath = 'public/backEnd/img/history';
            $fullPath = $images->move($uploadPath, $name);
            $imageUrl = str_replace('\\', '/', $fullPath);
           }
           
        $data = new History;
        $data->history_name = $request->history_name;
        $data->history_year = $request->history_year;
        $data->history_desc = $request->history_desc;
        $data->history_image = $imageUrl;
        $data->save();

        Session::flash('msg', 'History Information Add Successfully'); 

        return response()->json(['url' => route('admin-history.index')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $data = DB::table('histories')->where('id',$id)->first();

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
        $data = DB::table('histories')->where('id',$id)->first();

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

        $exist = DB::table('histories')->where('id',$id)->first();
        // if($exist){
        //     if (file_exists($exist->history_image)) {
        //      unlink($exist->history_image);
        //     }
        // }

        
         $inputImage = $request->file('history_image');
         if(isset($inputImage)){
            if (file_exists($exist->history_image)) {
             unlink($exist->history_image);
            }
            $images = $inputImage;
            $name = time() . $images->getClientOriginalName();
            $uploadPath = 'public/backEnd/img/history';
            $fullPath = $images->move($uploadPath, $name);
            $imageUrl = str_replace('\\', '/', $fullPath);
           }
           else{
            $imageUrl=$exist->history_image;
           }
           
        $data = History::find($id);
        $data->history_name = $request->history_name;
        $data->history_year = $request->history_year;
        $data->history_desc = $request->history_desc;
        $data->history_image = $imageUrl;
        $data->save();

        Session::flash('msg', 'History Information Update Successfully'); 

        return response()->json(['url' => route('admin-history.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exist = DB::table('histories')->where('id',$id)->first();
        if($exist){
            if (file_exists($exist->history_image)) {
             unlink($exist->history_image);
            }
        }

        DB::table('histories')->where('id',$id)->delete();
        
        return response()->json(['msg' => 'Delete Successfully']);
    }
}
