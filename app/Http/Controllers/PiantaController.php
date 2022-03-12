<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Pianta;
use App\Annaffiatura;
use App\Concimatura;
use Illuminate\Support\Facades\Storage;

class PiantaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $piante = Pianta::where('user_id', Auth::user()->id)->get();
        //dd($piante);
        return view('home', ['piante' => $piante]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create.pianta');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:100',
            'tipologia' => 'required|string|max:100',
            'data_acquisto' => 'required|date_format:Y-m-d'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $pianta = Pianta::create([
            'nome' => $request['nome'],
            'tipologia' => $request['tipologia'],
            'data_acquisto' => $request['data_acquisto'],
            'user_id' => Auth::user()->id
        ]);

        $pianta->save();

        return redirect()->route('piante.create')->with('status', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pianta = Pianta::findOrFail($id);
        $annaffiature = $pianta->annaffiature()->orderBy('dataora_annaffiatura')->get();
        $concimature = $pianta->concimature()->orderBy('dataora_concimatura')->get();

        return view('show.pianta', 
            ['pianta' => $pianta,
            'annaffiature' => $annaffiature,
            'concimature' => $concimature]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pianta = Pianta::findOrFail($id);
        return view('edit.pianta', ['pianta' => $pianta]);
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
        $pianta = Pianta::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:100',
            'tipologia' => 'required|string|max:100',
            'data_acquisto' => 'required|date_format:Y-m-d'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $pianta->nome = $request['nome'];
        $pianta->tipologia = $request['tipologia'];
        $pianta->data_acquisto = $request['data_acquisto'];

        $pianta->save();

        return redirect()->route('index')->with('status', 'aggiornato');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pianta = Pianta::findOrFail($id);
        $pianta->delete();
        return redirect()->route('index');
    }
}
