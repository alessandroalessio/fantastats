<?php

namespace App\Http\Controllers;

use App\Models\Leagues;
use Illuminate\Http\Request;
use Auth;

class LeaguesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validated = $request->validate([
            'league_name' => 'required'
        ]);

        $League = New Leagues();
        $League->name = $request->input('league_name');
        $League->goal_segnato = $request->input('goal_segnato');
        $League->goal_subito = $request->input('goal_subito');
        $League->rigore_segnato = $request->input('rigore_segnato');
        $League->rigore_sbagliato = $request->input('rigore_sbagliato');
        $League->rigore_parato = $request->input('rigore_parato');
        $League->ammonizione = $request->input('ammonizione');
        $League->espulsione = $request->input('espulsione');
        $League->autogoal = $request->input('autogoal');
        $League->assist_soft = $request->input('assist_soft');
        $League->assist_tradizionale = $request->input('assist_std');
        $League->assist_gold = $request->input('assist_gold');
        $League->goal_decisivo_pareggio = $request->input('goal_decisivo_pareggio');
        $League->goal_decisivo_vittoria = $request->input('goal_decisivo_vittoria');
        $League->portiere_imbattuto = $request->input('portiere_imbattuto');
        $League->id_user = $request->input('id_user');
        $League->save();
        // dd('store leagues');
        
        $Leagues = New Leagues();
        return view('user-league')->with('FantaLeagues', $Leagues->where('id_user', Auth::user()->id)->get());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Leagues  $leagues
     * @return \Illuminate\Http\Response
     */
    public function show(Leagues $leagues)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leagues  $leagues
     * @return \Illuminate\Http\Response
     */
    public function edit(Leagues $leagues)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Leagues  $leagues
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leagues $leagues)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leagues  $leagues
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leagues $leagues)
    {
        //
    }
}
