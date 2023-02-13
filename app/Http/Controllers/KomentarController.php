<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Http\Requests\StoreKomentarRequest;
use App\Http\Requests\UpdateKomentarRequest;
<<<<<<< HEAD
use Illuminate\Support\Facades\Log as FacadesLog;
=======
>>>>>>> 30ca5c1867dabcbc70a25fd665e9543580191794
use Log;

class KomentarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $komentar = Komentar::orderBy('created_at', 'DESC')->paginate(10);
        // return view('welcome', compact('posts'));

<<<<<<< HEAD
        return view('dashboard.komentar.index', [
=======
        return view('komentar', [
>>>>>>> 30ca5c1867dabcbc70a25fd665e9543580191794
            'active' => 'Komentar',
            "title" => "Informasi Komentar",
            "komentars" => Komentar::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StoreKomentarRequest $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKomentarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKomentarRequest $request)
    {
        $input = $request->all();
        Log::info($input);
        Komentar::create($input);
        return response()->json(['data' => $input]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function show(Komentar $komentar)
    {
        // $komentar = Komentar::with(['comments', 'comments.child'])->where('slug', $komentar)->first();
        // return view('show', compact('komentar'));\

        return view('dashboard.komentar.show', [
            'active' => 'diskusi',
            "title" => 'Postingan',
            "komentars" => $komentar
        ]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Komentar $komentar)
    {
        $komentar::destroy($komentar->id);
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}