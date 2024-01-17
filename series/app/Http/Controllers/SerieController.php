<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;
use DB;

class SerieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $series = Serie::all();
        /* $series = [
            ["La casa de papel", "Netflix", 7],
            ["Suite", "Amazon", 3],
            ["Cómo conocí a vuestra madre", "Netflix", 5],
            ["El plan del diablo", "HBO", 4]
        ]; */
        $mensaje = "Página de series";

        return view('series/index', ['series'=>$series, 'mensaje'=>$mensaje]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('series/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $serie = new Serie;
        $serie -> titulo = $request ->input('titulo');
        $serie -> plataforma = $request ->input('plataforma');
        $serie -> numTemporadas = $request ->input('numTemporadas');
        $serie -> save();

        return redirect('/series');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $serie = Serie::find($id);
        return view('series/show', ['serie'=>$serie]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $serie = Serie::find($id);
        return view('series/edit', ['serie'=>$serie]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $serie = Serie::find($id);

        $serie -> titulo = $request ->input('titulo');
        $serie -> plataforma = $request ->input('plataforma');
        $serie -> numTemporadas = $request ->input('numTemporadas');
        $serie -> save();

        return redirect('/series');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('series')->where('id', '=', $id)->delete();
        return redirect('/series');
    }
}
