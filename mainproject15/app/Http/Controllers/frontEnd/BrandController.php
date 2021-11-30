<?php

namespace App\Http\Controllers\frontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data = DB::table('brands')->orderBy('id','desc')->take(5)->get();

        return view('frontEnd.brand.brand',['datas'=>$data]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('brands')->where('id',$id)->first();

        $category = DB::table('brand_categories')->where('brand_id',$id)->orderBy('precedence','ASC')->get();

        $product = DB::table('products')
                    ->join('brand_categories','brand_categories.id','=','products.category_id')
                    ->select('products.*','brand_categories.brand_id')
                    ->where('brand_categories.brand_id',$id)
                    ->get(); 

        $categ = DB::table('products')
                    ->join('brand_categories','brand_categories.id','=','products.category_id')
                    ->select('products.category_id','brand_categories.brand_id')
                    ->where('brand_categories.brand_id',$id)
                    ->distinct('products.category_id')
                    ->get();

// dd($categ);
        return view('frontEnd.brand.brandDetail',['data'=>$data,'category'=>$category,'product'=>$product,'categ'=>$categ]);
    }

    public function detail($id){
        
        $product = DB::table('products')->where('id',$id)->first();

        $youLink = DB::table('products')
                    ->join('product_youtube_links','product_youtube_links.p_id','=','products.id')
                    ->select('product_youtube_links.*')
                    ->where('products.id',$id)
                    ->get();

        return response()->json(['data'=>$product,'youLink'=>$youLink]);
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
        //
    }
}
