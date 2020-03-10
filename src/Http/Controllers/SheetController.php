<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\imports\SpreadSheet;
use App\Sheet;
use App\SheetHeader;
use Maatwebsite\Excel\Facades\Excel;


class SheetController extends Controller
{
    public function index()
    {
        return view('spreadsheet::sheet');
    }

    public function create(){
        return view('reportesInstructores.create');
    }

    public function store(Request $request)
    {

        $request->hasFile('excel');
        $archivo = $request->file('excel');
        $import = new SpreadSheet;
       
        Excel::import($import, $archivo);


        //$reporteInstructores->reporteInstructorHeader()->create($archivo);

        //dd($archivo);

        return redirect(route('sheet'))->with(['message' => 'Thank you, your data has been import successfully.']);;
    }
}
