<?php

namespace App\Http\Controllers\backEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CSRRequest;
use App\SocialResponse;
use DB;
use Session;

class CSRController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('social_responses')->first();

        return view('backEnd.company_overview.csr',['data'=>$data]);
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
    public function store(CSRRequest $request)
    {
        $exist = DB::table('social_responses')->first();
        if($exist){
          DB::table('social_responses')->delete();
        }
        $data = new SocialResponse;
        $data->csr_desc = $request->csr_desc;
        $data->save();

        Session::flash('msg', 'CSR Information Add Successfully'); 

        return response()->json(['url' => route('admin-csr.index')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('social_responses')->where('id',$id)->first();
        
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
        $data = DB::table('social_responses')->where('id',$id)->first();

        return response()->json(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CSRRequest $request, $id)
    {

        $data = SocialResponse::find($id);
        $data->csr_desc = $request->csr_desc;
        $data->save();


         Session::flash('msg', 'CSR Information Update Successfully'); 

        return response()->json(['url' => route('admin-csr.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('social_responses')->where('id',$id)->delete();

        return response()->json(['msg' => 'Delete Successfully']);
    }
}
