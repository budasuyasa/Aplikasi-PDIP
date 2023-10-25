@extends('layouts.main')
@section('container')
    <h1 class="text-center">{{ $title }}</h1>
        <div class="row justify-content-center">
            <div class="col-8 ">
                <div class="card ">
                    <div class="card-body">
                        <form action="/updatekec/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                  <label for="namakab">Nama Kabupaten</label>
                                  <input class="form-control" id="namakab" type="text" placeholder="Readonly input here…" readonly value="{{ $data->kabupaten->nama }}">
                                </div>
                                <div class="form-group">
                                  <label for="jml_kec">Jumlah Kecamatan Di Kabupaten {{ $data->kabupaten->nama }}</label>
                                  <input class="form-control" id="jml_kec" type="text" placeholder="Readonly input here…" readonly value="{{ $data->kabupaten->kecamatan->count() }}">
                                </div>
                                <div class="form-group">
                                  <label for="jml_desa">Jumlah Desa Di Kecamatan {{ $data->nama }}</label>
                                  <input class="form-control" id="jml_desa" type="text" placeholder="Readonly input here…" readonly value="{{ $data->desa->count() }}">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Nama Kecamatan</label>
                                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama" value ="{{ $data->nama  }}" placeholder="Masukan Nama Kabupaten">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection
