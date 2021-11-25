<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Collection;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Inertia\Inertia;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * !! Show all public cards in Dashboard !!
     * 
     * Docs Queries: https://laravel.com/docs/8.x/queries#joins 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ALT 1
        // $collections = Collection::query()
        //     ->select('id')
        //     ->where('public', '=', 1)
        //     ->get();

        // $cards = Card::query()
        //     ->where('collection_id', '=', $collections->id())
        //     ->orderByDesc('created_at')
        //     ->get();

        //  ALT 2
        //     return Inertia::render('Dashboard', [
        //         'cards' => Card::all()->map(function ($card) {
        //             return [
        //                 'id' => $card->id,
        //                 'name' => $card->name,
        //                 'content' => $card->content,
        //             ];
        //         }),
        //     ]);
        

        // ALT 3
        // $cards= DB::table('cards')
        //     ->join('collections', function ($join) {
        //         $join->on('cards.collection_id', '=', 'collections.id')
        //              ->where('collections.public', '=', 1);
        //     })
        //     ->get();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('CreateCard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:55',
            'image' => 'required',
            'fontstyle' => 'required',
            'content' => 'required|string|max:80'
        ]);

        Collection::create([
            'name' => $request->input('name'),            
            // 'collection_id' => ,
            'user_id' => Auth::user()->id,
            'content' => $request->input('content'),
            'image' => $request->input('image'),
            'fontstyle' => $request->input('fontstyle')
        ]);

        return redirect(RouteServiceProvider::HOME);
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
