<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Http\Requests\StoreKecamatanRequest;
use App\Http\Requests\UpdateKecamatanRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Kecamatan $kecamatan)
    {
        return view('listkecamatan',[
            'title'=>"List Kecamatan",
            'kec'=>Kecamatan::carilistkec(request(['search']))->paginate(10),
            'data'=>$kecamatan
        ]);    //
    }
    public function search(Kecamatan $kecamatan)
    {
        return view('kecamatan',[
            'title'=>"Kecamatan",
            'kec'=>Kecamatan::carikec(request(['search','kabupaten_id']))->get(),
            'data'=>$kecamatan
        ]);    //
    }

    public function insertkec(Request $request)
    {
        $data = $request;
        Kecamatan::create($data->all());
        if(session('kab.kec')){
            return Redirect(session('kab.kec'))->with('insertkec','Data Kecamatan Dari Kabupaten '.$data->nama_kab . ' Berhasil Di Tambahkan');
        }
        return redirect()->route('Kabupaten');
    }
    public function insertlistkec(Request $request)
    {
        $data = $request;
        Kecamatan::create($data->all());
        return redirect()->route('listkec')->with('tambahlistkec','Data Kecamatan ' .$data->nama . ' Berhasil Ditambahkan');
    }
    
    public function deletekec($id)
    {
        $data = Kecamatan::find($id);
        $data->delete();
        if(session('kab.kec')){
            return Redirect(session('kab.kec'))->with('deletekec','Kecamatan ' . $data->nama . ' Berhasil Di Hapus');
        }
        return redirect()->route('Kabupaten')->with('deletekec','Kecamatan ' . $data->nama . ' Berhasil Di Hapus');
    }

    public function editkec($id)
    {
        $data = Kecamatan::find($id);
        return view('editkec', [
            'title'=>'Edit Kecamatan ' . $data->nama,
            'data'=>$data
        ]);
    }

    public function updatekec( Request $request, $id)
    {
        $data = Kecamatan::find($id);
        $data->update($request->all());
        if(session('kab.kec')){
            return Redirect(session('kab.kec'))->with('updatekec','Data Kecamatan ' .$data->nama . ' Berhasil Di Edit');
        }
        return redirect()->route('Kabupaten');

    }
    public function kecdetail($id)
    {
        $data = Kecamatan::find($id);
        return view('kecdetail',[
            'title'=> 'Detail Kecamatan ' . $data->nama,
            'data'=>$data
        ]);
    }
    public function filterlistkec(Request $request)
    {
        $filter = $request->input('nama');
        if($filter == 'nama'){
            dd ($filter);
            $title = 'List Kecamatan';
            $kec = Kecamatan::orderBy('nama', 'ASC')->paginate(10);
        }
        else{
            dd ($filter);
            $title = 'List Kecamatan';
            $kec = Kecamatan::carilistkec(request(['search']))->paginate(10);
        }
        return view('listkecamatan', compact('kec'),[
            'title'=>"List Kecamatan",
            'data'=>Kecamatan::all()
        ]);
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
    public function store(StoreKecamatanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Kecamatan $kecamatan)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kecamatan $kecamatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKecamatanRequest $request, Kecamatan $kecamatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kecamatan $kecamatan)
    {
        //
    }
}
