<?php

namespace App\Http\Controllers;

use App\SustainAbility;
use App\SustainAbilityPdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Session;

class SustainAbilityController extends Controller {
    public function index() {
        $data = SustainAbility::first();
        $pdfs = SustainAbilityPdf::get();
        return view('backEnd.company_overview.sustain_ability', compact('data', 'pdfs'));
    }
    public function store(Request $request) {
        // dd($request->all());
        $this->validate($request, [
            'description' => 'required|max:20000',
        ]);

        $exist = SustainAbility::first();
        if ($exist) {
            DB::table('sustain_abilities')->delete();
        }
        $data              = new SustainAbility;
        $data->description = $request->description;
        $data->save();

        Session::flash('msg', 'Sustain Ability Added Successfully');

        return response()->json(['url' => route('sustain.ability.index')]);
    }
    public function show(Request $request) {
        $data = SustainAbility::find($request->id);
        return response()->json([
            'success' => true,
            'data'    => $data,
        ]);
    }
    public function edit(Request $request) {
        $data = SustainAbility::find($request->id);
        return response()->json([
            'success' => true,
            'data'    => $data,
        ]);
    }
    public function update(Request $request) {
        // dd($request->all());
        $this->validate($request, [
            'description' => 'required|max:20000',
        ]);
        $data              = SustainAbility::first();
        $data->description = $request->description;
        $data->save();
        Session::flash('msg', 'Sustain Ability Updated Successfully');
        return response()->json(['url' => route('sustain.ability.index')]);
    }
    public function destroy() {
        SustainAbility::first()->delete();
        return response()->json(['msg' => 'Delete Successfully']);
    }

    public function storePdf(Request $request) {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required|max:200',
            'pdf'  => 'required|max:10004|mimes:pdf',
        ]);
        $file = $request->pdf;
        // dd($file);
        if ($file) {
            $images     = $file;
            $name       = time() . $images->getClientOriginalName();
            $uploadPath = 'public/backEnd/files';
            $fullPath   = $images->move($uploadPath, $name);
            $imageUrl   = str_replace('\\', '/', $fullPath);
        }
        $data = SustainAbilityPdf::create([
            'name' => $request->name,
            'pdf'  => $imageUrl,
        ]);

        Session::flash('msg', 'Sustain Ability Pdf Added Successfully');

        return redirect()->back();
        // return response()->json(['url' => route('sustain.ability.index')]);
    }
    public function editPdf(Request $request) {
        $data = SustainAbilityPdf::find($request->id);
        return response()->json([
            'success' => true,
            'data'    => $data,
        ]);
    }
    public function updatePdf(Request $request) {
        // dd($request->all());

        $data = SustainAbilityPdf::find($request->id);
        $file = $request->pdf;
        // dd($file);
        if ($file) {
            File::delete($data->pdf);
            $images     = $file;
            $name       = time() . $images->getClientOriginalName();
            $uploadPath = 'public/backEnd/files';
            $fullPath   = $images->move($uploadPath, $name);
            $imageUrl   = str_replace('\\', '/', $fullPath);
        } else {
            $imageUrl = $data->pdf;
        }
        $data->update([
            'name' => $request->name,
            'pdf'  => $imageUrl,
        ]);
        Session::flash('msg', 'Sustain Ability Pdf Updated Successfully');
        return response()->json(['url' => route('sustain.ability.index')]);
    }
    public function destroyPdf(Request $request) {
        // dd($request->all());
        $data = SustainAbilityPdf::findOrFail($request->id);
        File::delete($data->pdf);
        $data->delete();
        return response()->json(['msg' => 'Delete Successfully']);
    }
}
