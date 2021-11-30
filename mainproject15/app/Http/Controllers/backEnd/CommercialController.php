<?php

namespace App\Http\Controllers\backEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommercialRequest;
use App\Commercial;
use DB;
use Session;

class CommercialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('commercials')->orderBy('id','desc')->get();

        return view('backEnd.media.commercial',['datas'=>$data]);
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
    public function store(CommercialRequest $request)
    {

        $data = new Commercial;
        $data->commercial_iframe = $request->commercial_iframe;
        $data->commercial_text = $request->commercial_text;
        $data->save();

        Session::flash('msg', 'Commercial Information Saved Successfully'); 

        return response()->json(['url' => route('admin-commercial.index')]);
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
         $data = DB::table('commercials')->where('id',$id)->first();

        return response()->json(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommercialRequest $request, $id)
    {
        $data = Commercial::find($id);
        $data->commercial_iframe = $request->commercial_iframe;
        $data->commercial_text = $request->commercial_text;
        $data->save();

        Session::flash('msg', 'Commercial Information Update Successfully'); 

        return response()->json(['url' => route('admin-commercial.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         DB::table('commercials')->where('id',$id)->delete();

        return response()->json(['msg' => 'Delete Successfully']);
        
    }
}
