<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
// use Clockwork\Request\Request;
use Illuminate\Http\Request;
// use Clockwork\Support\Lumen\Controller;
use App\Http\Requests\StoreKabupatenRequest;
use App\Http\Requests\UpdateKabupatenRequest;
use PDF;
class KabupatenController extends Controller
{
    public function index()
    {
        return view('kabupaten',[
            'title'=>'List Kabupaten',
            'kab'=>Kabupaten::filter(request(['search']))->get()
        ]);
    }
    
    public function show(Kabupaten $kabupaten)
    {
        return view('Kecamatan',[
            'title'=>"Kecamatan Dari Kabupaten ",
            'kec'=>$kabupaten
        ]);
    }


    public function tambahkab()
    {
        return view('tambahkab',[
            'title'=>'Tambah Kabupaten'
        ]);
    }

   public function insertkab(Request $request)
   {
        $data = $request;
        Kabupaten::create($data->all());
        return redirect()->route('Kabupaten')->with('insertkab','Data Kabupaten ' . $data->nama . ' Berhasil Di Tambah');
   }
   public function editkab($id)
   {
    $data = Kabupaten::find($id);
    return view('editkab',[
       'title'=>'Edit Kabupaten ' . $data->nama,
       'data'=>$data 
    ]);
        
   }

   public function updatekab(Request $request, $id)
   {
    $data = Kabupaten::find($id);
    $data->update($request->all());
    return redirect()->route('Kabupaten')->with('updatekab','Data Kabupaten ' .$data->nama . ' Berhasil Di Update');


   }
   public function hapuskab($id)
   {
    $data = Kabupaten::find($id);
 
    $data->delete();
    return redirect()->route('Kabupaten')->with('deletekab','Data Kabupaten ' .$data->nama . ' Berhasil Di Hapus');

   }
   public function exportpdf()
   {
    $data = Kabupaten::all();
    view()->share('data',$data);
    $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadview('kabupaten-pdf');
    return $pdf->download('data.pdf');
   }
}
