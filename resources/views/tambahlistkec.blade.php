@extends('layouts.main')
@section('container')
    <h1 class="text-center">Tambah Data Kecamatan</h1>
        <div class="row justify-content-center">
            <div class="col-8 ">
                <div class="card ">
                    <div class="card-body">
                        <form action="/insertlistkec" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">

                                    {{-- Kabupaten --}}
                                    <div class="form-group">
                                      <label for="kabupaten_id">Pilih Kabupaten</label>
                                      <div class="input-group mb-3">
                                        <select name="kabupaten_id" class="custom-select" id="inputGroupSelect02">
                                          <option selected>Pilih Kabupaten...</option>
                                          @foreach($kab as $d )
                                          <option value="{{ $d->id }}">{{ $d->nama }}</option>
                                            
                                          @endforeach
                                        </select>
                                        <div class="input-group-append">
                                          <label class="input-group-text" for="inputGroupSelect02">Pilih</label>
                                        </div>
                                      </div>
                                    </div>

                                  <label for="exampleInputEmail1">Nama Kecamatan</label>
                                  <input type="text" class="form-control" autocomplete="off" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama" placeholder="Masukan Nama Kecamatan">
                                </div>
                                <div class="form-group">
                        
                                  <input type="hidden" class="form-control" autocomplete="off" id="exampleInputEmail1" aria-describedby="emailHelp" name="jml_desa" placeholder="Masukan Jumlah Desa" value="0">
                                  <input type="hidden" class="form-control" autocomplete="off" id="exampleInputEmail1" aria-describedby="emailHelp" name="jml_banjar" placeholder="Masukan Jumlah Banjar" value="0">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection
