<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Collection;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * Docs Queries: https://laravel.com/docs/8.x/queries#joins
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $collections = Collection::query()
        //     ->select('id')
        //     ->where('public', '=', 1)
        //     ->get();

        // $cards = Card::query()
        //     ->where('collection_id', '=', $collections->id())
        //     ->orderByDesc('created_at')
        //     ->get();

        $cards= DB::table('cards')
            ->join('collections', function ($join) {
                $join->on('cards.collection_id', '=', 'collections.id')
                     ->where('collections.public', '=', 1);
            })
            ->get();

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
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        //
    }
}
