<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Fagenda;
use App\Models\Teacher;
use App\Models\Namaguru;
use App\Models\Namakelas;
use Illuminate\Http\Request;
use App\Http\Livewire\Agenda;
use Illuminate\Support\Facades\File;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataGuru = Teacher::all();
        $dataKelas = Kelas::all();
        $dataagenda = Fagenda::with('teacher','kelas')->get();
        return view('layout.formagenda', compact('dataagenda','dataGuru','dataKelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataGuru = Teacher::all();
        $dataKelas = Kelas::all();
        $dataagenda = Fagenda::with('teacher','kelas')->all();
        return view('layout.formagenda', compact('dataagenda','dataGuru','dataKelas'));
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
        //     'namaguru' => 'required',
        //     'mapel' => 'required|min:3',
        //     'materi' => 'required',
        //     'jenispelajaran' => 'required',
        //     'linkpembelajaran' => 'required|min:5|max:250',
        //     'absensisiswa' => 'required',
        //     'documentasi' => 'required',
        //     'kelas' => 'required',
        //     'keterangan' => 'required',
        //     'jampembelajaran' => 'required',
        // ]);

            $agenda = Fagenda::create($request->all());
            
            if($request->hasFile('documentasi')) {
            $request->file('documentasi')->move('documentasi/', $request->file('documentasi')->getClientOriginalName());
            $agenda->documentasi = $request->file('documentasi')->getClientOriginalName();
            $agenda->save();
        }

        return Redirect('/agenda')->with('success','Data Berhasil Ditambahkan');
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
        $dataGuru = Teacher::all();
        $dataKelas = Kelas::all();
        $agenda = Fagenda::findorfail($id);
        return view('layout.agendaupdate', compact('agenda','dataGuru','dataKelas'));
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
        $agenda = Fagenda::findorfail($id);
        $agenda->update(); 
        // $this->validate($request,[
        //     'namaguru' => 'required',
        //     'mapel' => 'required|min:3',
        //     'materi' => 'required',
        //     'jenispelajaran' => 'required',
        //     'linkpembelajaran' => 'required|min:5|max:250',
        //     'absensisiswa' => 'required',
        //     'documentasi' => 'required',
        //     'kelas' => 'required',
        //     'keterangan' => 'required',
        //     'jampembelajaran' => 'required',
        // ]);

         if($request->hasFile('documentasi')) {

             $gambar = 'documentasi/'.$agenda->documentasi;
             if(File::exists($gambar))
             {
                 File::delete($gambar);
             }
            $request->file('documentasi')->move('documentasi/', $request->file('documentasi')->getClientOriginalName());
            $agenda->documentasi = $request->file('documentasi')->getClientOriginalName(); 
            $agenda->save(); 
        }
         return redirect('/agenda')->with('success', 'Dataagenda Berhasil DiUpdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agenda = Fagenda::findorfail($id);
        $agenda->delete();
        return redirect('/agenda')->with('destroy','Data Berhasil Di Hapus');

    }
}
