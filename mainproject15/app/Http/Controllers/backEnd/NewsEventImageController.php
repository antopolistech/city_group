<?php

namespace App\Http\Controllers\backEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NewsEventImage;
use Session;
use DB;

class NewsEventImageController extends Controller
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
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $data = DB::table('news_events')
                ->join('news_event_images','news_event_images.news_event_id','=','news_events.id')
                ->select('news_event_images.*')
                ->where('news_events.id',$id)
                ->get();

        return view('backEnd.media.news&eventImage',['datas'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('news_event_images')->where('id',$id)->first();

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
           'news_image' => 'required',
        ]);

        $img = DB::table('news_event_images')->where('id',$id)->first();
        if (file_exists($img->news_image)) {
             unlink($img->news_image);
        }

         $inputImage = $request->file('news_image');
         if(isset($inputImage)){
            $images = $inputImage;
            $name = time() . $images->getClientOriginalName();
            $uploadPath = 'public/backEnd/img/news_event';
            $fullPath = $images->move($uploadPath, $name);
            $imageUrl = str_replace('\\', '/', $fullPath);
           }

            $image = NewsEventImage::find($id);
            $image->news_image = $imageUrl;
            $image->save();

        Session::flash('msg', 'News & Event Information Update Successfully'); 

        return response()->json(['url' => route('newsevent-image.show',$img->news_event_id)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exist = DB::table('news_event_images')->where('id',$id)->first();
        if($exist){
            if (file_exists($exist->news_image)) {
             unlink($exist->news_image);
            }
        }
        DB::table('news_event_images')->where('id',$id)->delete();

        return response()->json(['msg' => 'Delete Successfully']);
    }
}
