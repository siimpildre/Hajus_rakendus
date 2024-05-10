<?php

namespace App\Http\Controllers;

use App\Models\Basketball;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BasketballController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $responseData = Basketball::all()->get();
        return response()->json($responseData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Basketball $basketball)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Basketball $basketball)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Basketball $basketball)
    {
        //
    }

    public function makeup()
    {        $responseData = Http::get('https://ralf.ta22sink.itmajakas.ee/api/makeup')->json();
        return view('api.makeup', ['products' => $responseData]);
    }

    public function records()
    {        $responseData = Http::get('https://hajusrakendus.ta22maarma.itmajakas.ee/api/records')->json();
        return view('api.records', ['products' => $responseData]);
    }

    public function movies()
    {        $responseData = Http::get('https://hajus.ta19heinsoo.itmajakas.ee/api/movies');
        $movies = $responseData->json()['data'];
        return view('api.movies', compact('movies'));
    }

}
