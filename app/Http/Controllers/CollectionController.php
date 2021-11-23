<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Inertia\Inertia;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collections = Collection::query()
            ->where('user_id', '=', Auth::id())
            ->orderByAsc('name')
            ->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('CreateCollection');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string|max:55',
        //     // 'selected' => 'required',
        // ]);
        
        console.log($request->input('name'));
        console.log($request->input('public'));
        
        // Collection::create([
        //     'name' => $request->input('name'),
        //     // 'user_id' => Auth::user->id(),
        //     // 'bgcolor' => $request->input('selected'),
        //     'public' => $request->input('public'),
        // ]);

        // return redirect(RouteServiceProvider::HOME);


        // Eller såhär enligt Inertia docs? Byt namnen.
        // User::create(
        //     Request::validate([
        //         'first_name' => ['required', 'max:50'],
        //         'last_name' => ['required', 'max:50'],
        //         'email' => ['required', 'max:50', 'email'],
        //     ])
        // );

        // return Redirect::route('users.index'); <-- byt till profile
    }

    /**
     * Display the specified (1) resource.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $collection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function edit(Collection $collection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collection $collection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collection $collection)
    {
        //
    }
}
