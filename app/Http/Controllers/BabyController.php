<?php

namespace App\Http\Controllers;

use App\Http\Requests\BabyRequest;
use App\Models\Baby;
use Illuminate\Http\Request;
use PDF;

class BabyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Baby::all();
        return view('admin.balita.index',[
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
        return view('admin.balita.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BabyRequest $request)
    {
        $data = $request->all();

        Baby::create($data);
        return redirect('/balita');
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
        $item = Baby::findOrFail($id);

        return view('admin.balita.update',[
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
    public function update(BabyRequest $request, $id)
    {
        $data = $request->all();

        $item = Baby::findOrFail($id);

        $item->update($data);
        return redirect('/balita');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Baby::findOrFail($id);

        $item->delete();

        return redirect('/balita');
    }

    public function exportpdf()
    {
        $data = Baby::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('admin.balita.databalita-pdf');
        return $pdf->download('data-balita.pdf');
    }
}
