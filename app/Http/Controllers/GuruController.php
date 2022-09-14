<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Pelajaran;
use App\Models\Teacher;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataguru = Teacher::all();
        return view('layout.teacher', compact('dataguru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layout.teacher');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'namaguru' => 'required',
            'mapel' => 'required|min:3'
        ]);

        Teacher::create($request->all());
        return Redirect('/guru')->with('success','Data Berhasil Ditambahkan');
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
        $guru = Teacher::findorfail($id);
        return view('layout.teacherupdate', compact('guru'));
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
            'namaguru' => 'required',
            'mapel' => 'required|min:3'
        ]);

         $guru = Teacher::findorfail($id);
         $guru->update($request->all());
         return redirect('/guru')->with('success', 'Dataguru ' . $guru['namaguru'] .' Berhasil DiUpdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guru = Teacher::findorfail($id);
        $guru->delete();
        return redirect('/guru')->with('destroy','Dataguru ' . $guru['namaguru'] .' Berhasil DiHapus');

    }
}
