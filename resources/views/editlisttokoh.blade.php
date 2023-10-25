@extends('layouts.main')
@section('container')
<h1 class="text-center">Edit Data Tokoh</h1>
<div class="row justify-content-center">
    <div class="col-8 ">
        <div class="card ">
            <div class="card-body">
                <form action="/updatelisttokoh/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">

                        {{-- Desa --}}
                    <div class="form-group">
                            <label for="namakab">Nama Desa</label>
                            <input class="form-control" id="namakab" type="text" placeholder="Readonly input here…" readonly value="{{ $data->desa->nama_desa }}">
                    </div>
                    <div class="form-group">
                        <label for="nama_tokoh">Nama Tokoh</label>
                        <input type="text" class="form-control" name="nama_tokoh" placeholder="Masukan Nama Desa" autocomplete="off" value="{{ $data->nama_tokoh }}">
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No Telepon Tokoh</label>
                        <input type="text" class="form-control" name="notelp_tokoh" placeholder="Masukan NO Telepon Bendesa" autocomplete="off" value="{{ $data->notelp_tokoh }}">
                    </div>
                
                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection

