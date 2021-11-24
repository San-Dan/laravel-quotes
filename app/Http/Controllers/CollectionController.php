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
     * !! Show current user's collection on Profile
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //  ALT 2
            return Inertia::render('Profile', [
                'collections' => Collection::all()->map(function ($collection) {
                    return [
                        'id' => $collection->id,
                        'name' => $collection->name,
                        'bgcolor' => $collection->bgcolor,
                        'public' => $collection->public,
                    ];
                }),
            ]);

        // $collections = Collection::where('user_id', Auth::user()->id)
        //                 ->orderBy('name')
        //                 ->get();

        

            // if (!$collections) {
            //     return Inertia::render('Dashboard');
            // } else {

            //     return Inertia::render('Profile', [
            //         'collections' => $collections
                   
            //     ]);
            // }
            

        
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
        // die(var_dump($user_id));

        $request->validate([
            'name' => 'required|string|max:55',
            'selected' => 'required'
        ]);

        Collection::create([
            'name' => $request->input('name'),
            'user_id' => Auth::user()->id,
            'bgcolor' => $request->input('selected'),
            'public' => $request->input('public'),
        ]);

        return redirect(RouteServiceProvider::HOME);
        
        
        // Eller såhär enligt Inertia docs? Byt namnen.
        // Collection::create(
        //     Request::validate([
        //         'name' => ['required', 'max:50'],
                // 'last_name' => ['required', 'max:50'],
                // 'email' => ['required', 'max:50', 'email'],
        //     ])
        // );
        // ((return redirect(RouteServiceProvider::HOME);))

        // return Redirect::route('users.index'); <-- byt till profile
    }

    /**
     * Display the specified (1) resource.
     * 
     * Ex in docs: https://inertiajs.com/responses
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $collection)
    {
        // return Inertia::render('Collection', [
        //     'collection' => $collection->only('id', 'name', 'public'),
        // ]);
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
