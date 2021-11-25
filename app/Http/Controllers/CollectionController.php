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
        // Bara visa profil-sidan funkar (rad nedan)
         
         return Inertia::render('Profile'); 
        
        
        
        // RÄTT SÄTT ENLIGT INERTIA DEMO APP, funkar ej än...
            // return Inertia::render('Profile', [
            //     'collections' => Auth::user()->collections()
            //         ->orderByName();
            //         ->paginate(10)
            //         ->withQueryString()
            //         ->through(fn $collection) =>  [
            //             'id' => $collection->id,
            //             'name' => $collection->name,
            //             'bgcolor' => $collection->bgcolor,
            //             'public' => $collection->public,
            //         ];
                
            // ]);

        // Fel sätt tydligen
        //-------------        

        // Alt 1
        // $collections = Collection::query()
        //     ->where('user_id', '=', Auth::user()->id)            
        //     ->get();
        
        // // // Alt 2
        // $collections = DB::table('collections')->where('user_id', '=', Auth::user()->id)
        //                 ->orderBy('name')
        //                 ->get();
        
        // // // Alt 3               
        // $collections = Collection::where('user_id', '=', Auth::user()->id)
        // ->orderBy('name')
        // ->get();        
        
        // // Alt 4
        // $collections = Collection::all();   
        
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
