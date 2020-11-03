<?php

namespace App\Http\Controllers;

use App\Models\PoligonoModel;
use App\Models\Poligonos\QuadradoModel;
use App\Models\Poligonos\RetanguloModel;
use Illuminate\Http\Request;

class PoligonoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $poligonoRetangulo = new PoligonoModel(new RetanguloModel());
        $poligonoRetangulo->getForma()->setAltura(5);
        $poligonoRetangulo->getForma()->setLargura(10);

        $poligonoQuadrado = new PoligonoModel(new QuadradoModel());
        $poligonoQuadrado->getForma()->setAltura(5);

        dd($poligonoQuadrado->getArea());
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
