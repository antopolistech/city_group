<?php

namespace App\Http\Controllers\backEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\ProductYoutubeLink;
use App\Product;
use Session;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = DB::table('products')->orderBy('id','desc')->get();
        $brand = DB::table('brands')->orderBy('id','desc')->get();

        $category = DB::table('brand_categories')->get();

        return view('backEnd.brand.product',['category'=>$category,'product'=>$product,'brand'=>$brand]);
    }

    public function category($id){

        $category = DB::table('brand_categories')->where('brand_id',$id)->get();

        return response()->json(['data' =>$category]);

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
    public function store(ProductRequest $request)
    {

        // dd($request->all());
         $inputImage = $request->file('product_image');
         $inputImage1 = $request->file('product_add');

         if(isset($inputImage)){
            $images = $inputImage;
            $name = time() . $images->getClientOriginalName();
            $uploadPath = 'public/backEnd/img/product';
            $fullPath = $images->move($uploadPath, $name);
            $imageUrl = str_replace('\\', '/', $fullPath);
           } 

        if(isset($inputImage1)){
            $images1 = $inputImage1;
            $name1 = time() . $images1->getClientOriginalName();
            $uploadPath1 = 'public/backEnd/img/product';
            $fullPath1 = $images1->move($uploadPath1, $name1);
            $imageUrl1 = str_replace('\\', '/', $fullPath1);
           }else{
             $imageUrl1 = null;
           }


        $data = new Product;
        $data->category_id = $request->category_id;
        $data->product_name = $request->product_name;
        $data->product_image = $imageUrl;
        $data->product_desc = $request->product_desc;
        $data->product_tag = $request->product_tag;
        $data->product_add =  $imageUrl1;
        $data->consumer_pack = $request->consumer_pack;
        $data->bulk_pack = $request->bulk_pack;
        $data->save();

        Session::flash('msg', 'Product Information Add Successfully'); 

        return response()->json(['url' => route('product.index')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('products')
                ->join('brand_categories','brand_categories.id','=','products.category_id')
                ->select('products.*','brand_categories.category_name')
                ->where('products.id',$id)
                ->first();

        return response()->json(['data' => $data]);
    }

    public function youtubeLinkIndex($id)
    {
        $data = DB::table('products')->where('id',$id)->first();

        $you_link = DB::table('product_youtube_links')
                    ->join('products','products.id','=','product_youtube_links.p_id')
                    ->select('product_youtube_links.*','products.product_name')
                    ->where('products.id',$id)
                    ->get();

        return view('backEnd.brand.youtubeLink.youtubeLink',['data'=>$data,'you_link'=>$you_link]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data = DB::table('products')
                ->join('brand_categories','brand_categories.id','=','products.category_id')
                ->select('products.*','brand_categories.category_name')
                ->where('products.id',$id)
                ->first();

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
        $exist = DB::table('products')->where('id',$id)->first();
    
        $inputImage = $request->file('product_image');
        $inputImage1 = $request->file('product_add');

         if(isset($inputImage)){
            if($exist){
                if (file_exists($exist->product_image)) {
                 unlink($exist->product_image);
                }
            }
            
            $images = $inputImage;
            $name = time() . $images->getClientOriginalName();
            $uploadPath = 'public/backEnd/img/product';
            $fullPath = $images->move($uploadPath, $name);
            $imageUrl = str_replace('\\', '/', $fullPath);
           }
           else{
               $imageUrl = $exist->product_image;
           } 

        if(isset($inputImage1)){
            
            if($exist){
                if (file_exists($exist->product_add)) {
                 unlink($exist->product_add);
                }
            }
        
            $images1 = $inputImage1;
            $name1 = time() . $images1->getClientOriginalName();
            $uploadPath1 = 'public/backEnd/img/product';
            $fullPath1 = $images1->move($uploadPath1, $name1);
            $imageUrl1 = str_replace('\\', '/', $fullPath1);
           }else{
                if(isset($exist->product_add)){
                   $imageUrl1 = $exist->product_add;
                }
                else{
                   $imageUrl1 = null;
                }
           }


        $data = Product::find($id);
        $data->category_id = $request->category_id;
        $data->product_name = $request->product_name;
        $data->product_image = $imageUrl;
        $data->product_desc = $request->product_desc;
        $data->product_tag = $request->product_tag;
        $data->product_add =  $imageUrl1;
        $data->consumer_pack = $request->consumer_pack;
        $data->bulk_pack = $request->bulk_pack;
        $data->save();

        Session::flash('msg', 'Product Information Update Successfully'); 

        return response()->json(['url' => route('product.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exist = DB::table('products')->where('id',$id)->first();
        if($exist){
            if (file_exists($exist->product_image)) {
             unlink($exist->product_image);
            }
            if (file_exists($exist->product_add)) {
             unlink($exist->product_add);
            }
        }

        DB::table('products')->where('id',$id)->delete();

        DB::table('product_youtube_links')->where('p_id',$id)->delete();
        
        return response()->json(['msg' => 'Delete Successfully']);
    }
}
