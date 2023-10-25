<?php

namespace App\Http\Controllers;

use App\Models\Banjar;
use App\Http\Requests\StoreBanjarRequest;
use App\Http\Requests\UpdateBanjarRequest;
// use Clockwork\Request\Request;
use Illuminate\Http\Request;
class BanjarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('listbanjar',[
            'title' => 'List Banjar',
            'banjar'=>Banjar::all()
        ]);
    }

    public function insertbanjar(Request $request)
    {
        $data = $request;
        Banjar::create($request->all());
        return redirect()->route("desa.banjar",['desa'=>$data->desa_id])->with("insertbanjar","Data Banjar " . $data->nama_banjar . " Berhasil DI Tambah");
    }
    public function deletebanjar($id)
    {
        $data = Banjar::find( $id );
        $data->delete();
        return redirect()->route("desa.banjar",['desa'=>$data->desa_id])->with("deletebanjar","Data Banjar " . $data->nama_banjar . " Berhasil DI Hapus");
    }
    public function editbanjar($id)
    {
        $data = Banjar::find($id);
        return view("editbanjar",[
            'title'=>'Edit Banjar ' . $data->nama_banjar,
            'data' => $data
        ]);
    }
    public function updatebanjar(Request $request,$id)
    {
        $data = Banjar::find( $id );
        $data->update($request->all());
        return redirect()->route("desa.banjar",['desa'=>$data->desa_id])->with("updatebanjar","Data Banjar " . $data->nama_banjar . " Berhasil DI Update");
    }

    public function insertlistbanjar (Request $request)
    {   
        $data = $request;
        Banjar::create($data->all());
        return redirect()->route('listbanjar')->with("insertbanjar","Data Banjar " . $data->nama_banjar . " Berhasil DI Tambah");
    }
    public function deletelistbanjar($id)
    {
        $data = Banjar::find( $id );
        $data->delete();
        return redirect()->route("listbanjar")->with("deletebanjar","Data Banjar " . $data->nama_banjar . " Berhasil Di Hapus");
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
    public function store(StoreBanjarRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Banjar $banjar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banjar $banjar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBanjarRequest $request, Banjar $banjar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banjar $banjar)
    {
        //
    }
}
