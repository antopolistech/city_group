<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\SustainAbility;
use App\SustainAbilityPdf;
use Response;

class SustainAblilityController extends Controller {
    public function index() {
        $data = SustainAbility::first();
        // dd($data);
        $pdfs = SustainAbilityPdf::get();
        return view('frontEnd.company_overview.sustain_ability', compact('data', 'pdfs'));
    }
    public function pdf($id) {
        $filename = SustainAbilityPdf::find($id);
        $path     = $filename->pdf;
        return response()->file($path);
        // return Response::make(file_get_contents($path), 200, [
        //     'Content-Type'        => 'application/pdf',
        //     'Content-Disposition' => 'inline; filename="' . $filename . '"',
        // ]);
    }
}
