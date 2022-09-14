<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Teacher;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataGuru = Teacher::all();
        $dataKelas = Kelas::with('teacher')->paginate();
        return view('kelas', compact('dataKelas','dataGuru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataGuru = Teacher::all();
        $kelas = Kelas::with('teacher')->all();
        return view('kelas', compact('kelas','dataGuru'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request,[
        //     'namakelas' => 'required',
        //     // 'walikelas' => 'required|min:3'
        // ]);

        $kelas = Kelas::create($request->all());
        $kelas->save();
        return Redirect('/kelas')->with('success','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas = Kelas::findorfail($id);
        return view('layout.kelasupdate', compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'namakelas' => 'required',
            // 'walikelas' => 'required|min:3'
        ]);

        $kelas = Kelas::findorfail($id);
         $kelas->update($request->all());
         return redirect('/kelas')->with('success', 'Datakelas ' . $kelas['namakelas'] .' Berhasil DiUpdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas = Kelas::findorfail($id);
        $kelas->delete();
        return redirect('/kelas')->with('destroy','Data Berhasil Di Hapus');

    }
}
