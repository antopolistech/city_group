<?php

namespace App\Http\Controllers\backEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProYoutubeRequest;
use App\ProductYoutubeLink;
use Validator;
use Session;
use DB;


class ProYoutubeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(ProYoutubeRequest $request)
    {
        for ($i=0; $i < count($request->youtube_link) ; $i++) { 
            $data = new ProductYoutubeLink;
            $data->p_id = $request->p_id;
            $data->youtube_link = $request->youtube_link[$i];
           $data->save();
        }
        
        // Session::flash('msg', 'Product YoutubeLink Information Add Successfully');

        // return response()->json(['url' => route('youtube.link',$data->p_id)]);
        return redirect()->route('youtube.link',$data->p_id)->with('msg','Product YoutubeLink Information Add Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $data = DB::table('product_youtube_links')->where('id',$id)->first();

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
        
        $request->validate([
           'youtube_link' => 'required',
        ]);

        $data =  ProductYoutubeLink::find($id);
        $data->youtube_link = $request->youtube_link;
        $data->save();

        $you_link = DB::table('product_youtube_links')->where('id',$id)->first();

        Session::flash('msg', 'Product YoutubeLink Information Update Successfully'); 

        return response()->json(['url' => route('youtube.link',$you_link->p_id)]);
      


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         DB::table('product_youtube_links')->where('id',$id)->delete();
        
        return response()->json(['msg' => 'Delete Successfully']);
    }
}
