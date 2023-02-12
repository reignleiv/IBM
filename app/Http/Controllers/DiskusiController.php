<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Diskusi;
use App\Models\Komentar;
use App\Http\Requests\StoreDiskusiRequest;
use App\Http\Requests\UpdateDiskusiRequest;
use Illuminate\Database\Eloquent\Builder;


class DiskusiController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $ibm = Diskusi::all();
        // if (request('lokasi')) {
        //     $ibm = Diskusi::all()->where('lokasi', 'like', request('lokasi'));
        // }

        return view('diskusi', [
            'active' => 'Diskusi',
            "title" => "Diskusi",
            "diskusis" => Diskusi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.diskusi.create', [
            'active' => 'diskusi',
            "title" => "Diskusi Informasi Bahan Makanan"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDiskusiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiskusiRequest $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required',
            'body' => 'required',
            'excerpt' => 'null',
        ]);
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100);
        $validatedData['lokasi'] = Str::limit(strip_tags($request->body), 100);
        $validatedData['user_id'] = auth()->user()->id;
        Diskusi::create($validatedData);

        return redirect('/')->with('success', 'Diskusi Baru Telah Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Diskusi  $diskusi
     * @return \Illuminate\Http\Response
     */
    public function show(Diskusi $diskusi, Komentar $komentar)
    {
        // Diskusi::where('id', $diskusi->id)
        //     ->update($validatedData);


        return view('dashboard.diskusi.show', [
            'active' => 'diskusi',
            "title" => 'Postingan',
            "diskusis" => $diskusi,
            'komentars' => Komentar::where('diskusi_id', $diskusi->id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Diskusi  $diskusi
     * @return \Illuminate\Http\Response
     */
    public function edit(Diskusi $diskusi)
    {
        return view('dashboard.diskusi.edit', [
            'active' => 'diskusi',
            "title" => 'Ubah Informasi Bahan Makanan',
            "diskusis" => $diskusi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDiskusiRequest  $request
     * @param  \App\Models\Diskusi  $diskusi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDiskusiRequest $request, Diskusi $diskusi)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required',
            'body' => 'required',
            'excerpt' => 'null',
        ]);
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100);
        $validatedData['lokasi'] = Str::limit(strip_tags($request->body), 100);
        $validatedData['user_id'] = auth()->user()->id;
        Diskusi::where('id', $diskusi->id)
            ->update($validatedData);

        return redirect('/')->with('success', 'Diskusi Telah Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diskusi  $diskusi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diskusi $diskusi)
    {
        $diskusi::destroy($diskusi->id);
        return redirect('/')->with('success', 'Diskusi Telah Berhasil Dihapus');
    }
}