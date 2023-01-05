<?php

namespace App\Http\Controllers;

use App\Models\Ibm;
use Illuminate\Http\Request;

class DashboardIbmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.dashboardibm.index', [
            'active' => 'ibm',
            "title" => "Semua Informasi Bahan Makanan",
            "ibms" => Ibm::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.dashboardibm.create', [      
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'slug' => 'required',
            'lokasi' => 'required',
            'satuan' => 'required',
            'harga' => 'required'
        ]);

        //$validatedData['user_id'] = auth()->user()->id;


        Ibm::create($validatedData);

        return redirect('/dashboard/ibm')->with('success', 'Informasi Baru Telah Ditambahkan');

        // // menyimpan data file yang diupload ke variabel $file
		// $file = $request->file('file');
 
        //         // nama file
        // echo 'File Name: '.$file->getClientOriginalName();
        // echo '<br>';

        //         // ekstensi file
        // echo 'File Extension: '.$file->getClientOriginalExtension();
        // echo '<br>';

        //         // real path
        // echo 'File Real Path: '.$file->getRealPath();
        // echo '<br>';

        //         // ukuran file
        // echo 'File Size: '.$file->getSize();
        // echo '<br>';

        //         // tipe mime
        // echo 'File Mime Type: '.$file->getMimeType();

        //         // isi dengan nama folder tempat kemana file diupload
        // $tujuan_upload = 'data_file';

        //     // upload file
        // $file->move($tujuan_upload,$file->getClientOriginalName());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ibm  $ibm
     * @return \Illuminate\Http\Response
     */
    public function show(Ibm $ibm)
    {
        // https://pixabay.com/api/videos/?key=32619895-001d6b9c6bcc76618f800e0a4&q=yellow+flowers&pretty=true
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ibm  $ibm
     * @return \Illuminate\Http\Response
     */
    public function edit(Ibm $ibm)
    {
        return view('dashboard.dashboardibm.edit', [
            "ibm" => $ibm
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ibm  $ibm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ibm $ibm)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'slug' => 'required',
            'lokasi' => 'required',
            'satuan' => 'required',
            'harga' => 'required'
        ]);
        Ibm::where('id', $ibm->id)
        ->update($validatedData);

        return redirect('/dashboard/ibm')->with('success', 'Informasi Telah Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ibm  $ibm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ibm $ibm)
    {
        $ibm::destroy($ibm->id);
        return redirect('/dashboard/ibm')->with('success', 'Informasi Telah Berhasil Dihapus');
    }
}
