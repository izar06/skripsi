<?php

namespace App\Http\Controllers;

use App\Http\Requests\BumilRequest;
use App\Models\Bumil;
use Illuminate\Http\Request;
use PDF;


class BumilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Bumil::all();
        return view('admin.bumil.index',[
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
        return view('admin.bumil.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BumilRequest $request)
    {
        $data = $request->all();

        Bumil::create($data);
        return redirect('/bumil');
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
        $item = Bumil::findOrFail($id);

        return view('admin.bumil.update', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BumilRequest $request, $id)
    {
        $data = $request->all();

        $item = Bumil::findOrFail($id);

        $item->update($data);
        return redirect('/bumil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $item = Bumil::findOrFail($id);

        $item->delete();
        return redirect('/bumil');
    }

    public function exportpdf()
    {
        $data = Bumil::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('admin.bumil.databumil-pdf');
        return $pdf->download('data-ibu-hamil.pdf');
    }
}
