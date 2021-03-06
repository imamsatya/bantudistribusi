<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Temp;
use Illuminate\Http\Request;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class TabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('tabel.index');
    }

    public function download()
    {
    	// $filePath = public_path("tes.xlsx");
    	// $headers = ['Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
    	// $fileName ='tes.xlsx';

    	// return response()->download($filePath, $fileName, $headers);

        // return Storage::download('tes.xlsx');

        $file = Storage::disk('public')->get('tes.xlsx');
  
        return (new Response($file, 200))
              ->header('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    }

    public function getTemp(){
        $data = Temp::all();
        return $data;
    }

    public function import(Request $request) 
    {
        // dd($request->file('file'));
        // Excel::import(new UsersImport, $request->file('file'));
        Temp::truncate();
        Excel::import(new UsersImport,  $request->file('file'));
        // $collection = Excel::toCollection(new UsersImport, $request->file('file'));
     
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
