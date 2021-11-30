<?php

namespace App\Http\Controllers\backEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandCategoryRequest;
use App\BrandCategory;
use DB;
use Session;

class BrandCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $val = DB::table('brands')->orderBy('id','desc')->get();

        $data = DB::table('brand_categories')
                ->join('brands','brands.id','=','brand_categories.brand_id')
                ->select('brand_categories.*','brands.brand_name')
                ->orderBy('brand_categories.id','desc')
                ->get();

        return view('backEnd.brand.brandCategory',['datas'=>$data,'val'=>$val]);
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
    public function store(BrandCategoryRequest $request)
    {

        $inputPrecedence = (int)$request->precedence;
        $dropDownBrandId = $request->brand_id;
        $data = DB::table('brand_categories')->where('brand_id', '=', $dropDownBrandId)->where('precedence', '=', $inputPrecedence)->first();
        if($data){
            return response()->json([
                
                'message' => "Precedence already used, Please type another!"
            ]);

        }
        else{
        $data = new BrandCategory;
        $data->brand_id = $dropDownBrandId;
        $data->category_name = $request->category_name;
        $data->precedence =$inputPrecedence;
        $data->save();

        Session::flash('msg', 'Brand Category Information Saved Successfully'); 

        return response()->json(['url' => route('admin-brand-category.index')]);
         }
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
        $data = DB::table('brand_categories')->where('id',$id)->first();

        return response()->json(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandCategoryRequest $request, $id)
    {
        $inputPrecedence = (int)$request->precedence;
        $dropDownBrandId = $request->brand_id;
        $data = DB::table('brand_categories')->where('brand_id', '=', $dropDownBrandId)->where('precedence', '=', $inputPrecedence)->first();
        if($data){

            
            return response()->json([
                
                'message' => "Precedence already used, Please type another!"
            ]);

        }
        else{
        $data = BrandCategory::find($id);
        $data->brand_id = $dropDownBrandId;
        $data->category_name = $request->category_name;
        $data->precedence = $inputPrecedence;
        $data->save();

        Session::flash('msg', 'Brand Category Information Update Successfully'); 

        return response()->json(['url' => route('admin-brand-category.index')]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('brand_categories')->where('id',$id)->delete();
        
        return response()->json(['msg' => 'Delete Successfully']);
    }

    public function getPrecedence($id){
        $data = DB::table('brand_categories')->where('brand_id', '=', $id)->max('precedence');
        // return response()->json($setPosition);
        // dd($data);
        return response()->json([
            'success'=>true,
            'data'=>$data,

        ]);

    }

    public function checkPrecedence($id,$value){
        $inputVal = $id;
        $dropDownVal = $value;
        $data = DB::table('brand_categories')->where('brand_id', '=', $dropDownVal)->where('precedence', '=', $inputVal)->first();
        // dd($data);
        
        // dd($data1);
        if ($data) {
          // $data1=(int)$data->precedence;
            return response()->json([
                'success'=>true,
                // 'data'=>$data1,
                'message' => "Precedence already used, Please type another!"
            ]);
        }
    }
}
