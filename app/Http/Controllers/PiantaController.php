<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Pianta;

class PiantaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $piante = Pianta::where('user_id',Auth::user()->id)->get();
        //dd($piante);
        return view('home',['piante'=>$piante]);
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
            'image' => 'nullable|image|mimes:png,jpg,jpeg'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $pianta = Pianta::create([
            'nome' => $request['nome'],
            'tipologia' => $request['tipologia'],
            'user_id' => Auth::user()->id
        ]);

        $pianta->save();

        $extension = $request->file('image')->getClientOriginalExtension();

        $request->file('image')->storeAs('public/storage/uploads',$pianta->id . '.' . $extension);

        $pianta->img_url = 'public/storage/storage/uploads/'. $pianta->id . '.' . $extension;

        $pianta->save();
        
        return redirect()->route('piante.create')->with('status','success');
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
