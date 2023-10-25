<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Http\Requests\StoreDesaRequest;
use App\Http\Requests\UpdateDesaRequest;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('listdesa',[
            'title'=>'List Desa',
            'desa'=>Desa::get()
        ]);
    }

    public function insertdesa(Request $request)
    {
        $desa = $request;
        Desa::create($desa->all());
        return redirect()->route('desa.kab',['kabupaten'=>$desa->kabupaten_id])->with('tambahdesa','Desa ' . $desa->nama_desa . ' Berhasil Di Tambah');
    }
    public function hapusdesa($id)
    {
        $desa = Desa::find($id);
        $desa->delete();
        return back()->with('hapusdesa','Data Desa ' . $desa->nama_desa . ' Berhasil Di Hapus');
        // return redirect()->route('desa.kab',['kabupaten'=>$desa->kabupaten])->with('hapusdesa','Data Desa ' . $desa->nama_desa . ' Berhasil Di Hapus');
    }
    public function editdesa($id)
    {
        $data = Desa::find($id);
        return view('editdesa',[
            'title'=> 'Edit Desa ' . $data->nama_desa,
            'data'=>$data

        ]);
    }
    public function updatedesa(Request $request,$id)
    {
        $data = Desa::find($id);
        $data->update($request->all());
        return redirect()->route('desa.kab',['kabupaten'=>$data->kabupaten, 'kecamatan'=>$data->kecamatan])->with('editdesa','Desa ' . $data->nama_desa . ' Berhasil Di Edit');
        
    }
    
    public function tambahlistdesa()
    {
        return view('tambahlistdesa',[
            'title'=>'Tambah Desa',
            'kab'=>Kabupaten::get(),
            'kec'=>Kecamatan::get()
            
        ]);
        
    }
    public function insertlistdesa(Request $request)
    {
        $data = $request;
        Desa::create($data->all());
        return redirect()->route('listdesa')->with('tambahlistdesa','Data Desa ' . $data->nama_desa . ' Berhasil Di Tambah');
    }
    public function editlistdesa($id)
    {
        $data = Desa::find($id);
        return view('editlistdesa',[
            'title'=> 'Edit Desa ' . $data->nama_desa,
            'data'=>$data

        ]);
    }
    public function updatelistdesa(Request $request,$id)
    {
        $data = Desa::find($id);
        $data->update($request->all());
        return redirect()->route('listdesa')->with('editlistdesa','Desa ' . $data->nama_desa . ' Berhasil Di Edit');
        
    }
    public function hapuslistdesa($id)
    {
        $desa = Desa::find($id);
        $desa->delete();
        return redirect()->route('listdesa')->with('hapuslistdesa','Data Desa ' . $desa->nama_desa . ' Berhasil Di Hapus');
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDesaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Desa $desa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Desa $desa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDesaRequest $request, Desa $desa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Desa $desa)
    {
        //
    }
}
