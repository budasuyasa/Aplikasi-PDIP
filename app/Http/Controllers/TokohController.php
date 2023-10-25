<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Tokoh;
use App\Http\Requests\StoreTokohRequest;
use App\Http\Requests\UpdateTokohRequest;
use Illuminate\Http\Request;

class TokohController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('listtokoh',[
            'title'=>'List Tokoh',
            'tokoh'=>Tokoh::all()
        ]);
    }
    public function tambahlisttokoh()
    {
        return view('tambahlisttokoh',[
            'title'=> 'Tambah List Tokoh',
            'desa'=>Desa::all()
        ]);
    }
    public function insertlisttokoh(Request $request)
    {
        $data = $request;
        Tokoh::create($data->all());
        return redirect('listtokoh')->with('insertlisttokoh','Data Tokoh ' . $data->nama_tokoh . ' Berhasil Di Tambah');
    }
    public function deletelisttokoh($id)
    {
        $data = Tokoh::find($id);
        $data->delete();
        return redirect('listtokoh')->with('deletelisttokoh','Data Tokoh ' . $data->nama_tokoh . ' Berhasil Di Hapus');
    
    }
    public function editlisttokoh($id)
    {
        $data = Tokoh::find($id);
        return view('editlisttokoh',[
            'title'=>'Edit Tokoh ' . $data->nama_tokoh,
            'data' =>$data
        ]);
    }
    public function updatelisttokoh(Request $request,$id)
    {
        $data = Tokoh::find($id);
        $data->update($request->all());
        return redirect('listtokoh')->with('deletelisttokoh','Data Tokoh ' . $data->nama_tokoh . ' Berhasil Di Update');
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
    public function store(StoreTokohRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tokoh $tokoh)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tokoh $tokoh)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTokohRequest $request, Tokoh $tokoh)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tokoh $tokoh)
    {
        //
    }
}
