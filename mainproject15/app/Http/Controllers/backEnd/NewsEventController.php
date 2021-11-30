<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsEventRequest;
use App\NewsEvent;
use App\NewsEventImage;
use DB;
use Illuminate\Http\Request;
use Session;

class NewsEventController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data = DB::table('news_events')->orderBy('id', 'desc')->get();

        return view('backEnd.media.news&event', ['datas' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsEventRequest $request) {
        // dd($request->all());
        $data            = new NewsEvent;
        $data->news_name = $request->news_name;
        $data->news_desc = $request->news_desc;
        $data->save();

        // multiple image
        $inputImages = $request->file('news_image');
        foreach ($inputImages as $key => $inputImage) {
            $name       = time() . $inputImage->getClientOriginalName();
            $uploadPath = 'public/backEnd/img/news_event';
            $fullPath   = $inputImage->move($uploadPath, $name);
            $imageUrl   = str_replace('\\', '/', $fullPath);

            $image                = new NewsEventImage;
            $image->news_event_id = $data->id;
            $image->news_image    = $imageUrl;
            $image->save();
        }

        Session::flash('msg', 'News & Event Information Add Successfully');

        return response()->json(['url' => route('admin-news-event.index')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $data = DB::table('news_events')->where('id', $id)->first();

        return response()->json(['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $data = DB::table('news_events')->where('id', $id)->first();

        return response()->json(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $request->validate([
            'news_name' => 'required',
            'news_desc' => 'required',
        ]);

        $data            = NewsEvent::find($id);
        $data->news_name = $request->news_name;
        $data->news_desc = $request->news_desc;
        $data->save();

        Session::flash('msg', 'News & Event Information Update Successfully');

        return response()->json(['url' => route('admin-news-event.index')]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $exists = DB::table('news_event_images')->where('news_event_id', $id)->get();
        foreach ($exists as $exist) {
            if (file_exists($exist->news_image)) {
                unlink($exist->news_image);
            }
        }
        DB::table('news_events')->where('id', $id)->delete();
        DB::table('news_event_images')->where('news_event_id', $id)->delete();

        return response()->json(['msg' => 'Delete Successfully']);
    }
}
