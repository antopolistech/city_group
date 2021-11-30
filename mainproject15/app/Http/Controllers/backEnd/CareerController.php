<?php

namespace App\Http\Controllers\backEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CareerRequest;
use App\Career;
use Session;
use DB;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('careers')->orderBy('id','desc')->get();

        return view('backEnd.career.circular',['datas'=>$data]);
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
    public function store(CareerRequest $request)
    {
        $data = new Career;
        $data->designation = $request->designation;
        $data->vacancy = $request->vacancy;
        $data->job_description = $request->job_description;
        $data->job_nature = $request->job_nature;
        $data->educational_req = $request->educational_req;
        $data->professional_certificate = $request->professional_certificate;
        $data->experience_req = $request->experience_req;
        $data->job_req = $request->job_req;
        $data->job_location = $request->job_location;
        $data->salary_range = $request->salary_range;
        $data->other_benefit = $request->other_benefit;
        $data->published_on = $request->published_on;
        $data->deadline = $request->deadline;
        $data->instruction = $request->instruction;
        $data->BD_job_link = $request->BD_job_link;
        $data->save();

        Session::flash('msg', 'Career Information Saved Successfully'); 

        return response()->json(['url' => route('admin-career.index')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('careers')->where('id',$id)->first();

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
        $data = DB::table('careers')->where('id',$id)->first();

        return response()->json(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CareerRequest $request, $id)
    {
        $data = Career::find($id);
        $data->designation = $request->designation;
        $data->vacancy = $request->vacancy;
        $data->job_description = $request->job_description;
        $data->job_nature = $request->job_nature;
        $data->educational_req = $request->educational_req;
        $data->professional_certificate = $request->professional_certificate;
        $data->experience_req = $request->experience_req;
        $data->job_req = $request->job_req;
        $data->job_location = $request->job_location;
        $data->salary_range = $request->salary_range;
        $data->other_benefit = $request->other_benefit;
        $data->published_on = $request->published_on;
        $data->deadline = $request->deadline;
        $data->instruction = $request->instruction;
        $data->BD_job_link = $request->BD_job_link;
        $data->save();

       Session::flash('msg', 'Career Information Update Successfully'); 

        return response()->json(['url' => route('admin-career.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        DB::table('careers')->where('id',$id)->delete();
        
        return response()->json(['msg' => 'Delete Successfully']);
    }
}
