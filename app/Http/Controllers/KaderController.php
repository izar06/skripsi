<?php

namespace App\Http\Controllers;

use App\Http\Requests\KaderRequest;
use Illuminate\Http\Request;
use App\Models\Kader;
use PDF;

class KaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kader::all();
        return view('admin.kader.index',[
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kader.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KaderRequest $request)
    {
        $data = $request->all();

        Kader::create($data);
        return redirect('/kader');
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
        $item = Kader::findOrFail($id);

        return view('admin.kader.update',[
            'item' => $item
        ]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KaderRequest $request, $id)
    {
        $data = $request->all();

        $item = Kader::findOrFail($id);

        $item->update($data);
        return redirect('/kader');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Kader::findOrFail($id);

        $item->delete();

        return redirect('/kader');

    }

    public function exportpdf()
    {
        $data = Kader::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('admin.balita.datakader-pdf');
        return $pdf->download('data-kader.pdf');
    }
}
