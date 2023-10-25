@extends('layouts.main')
@section('container')
    <h1 class="text-center">Tambah Data Kecamatan</h1>
        <div class="row justify-content-center">
            <div class="col-8 ">
                <div class="card ">
                    <div class="card-body">
                        <form action="/insertkec" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">

                                    {{-- Kabupaten --}}
                                    <div class="form-group">
                                      <label for="nama_kab">Nama Kabupaten</label>
                                      
                                      <input class="form-control" type="hidden" name="kabupaten_id" value="{{ $data->id }}"  readonly>
                                      <input class="form-control" id="nama_kab"type="text" name="nama_kab" value="{{ $data->nama }}"  readonly>
                                    </div>

                                  <label for="exampleInputEmail1">Nama Kecamatan</label>
                                  <input type="text" class="form-control" autocomplete="off" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama" placeholder="Masukan Nama Kecamatan">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection
