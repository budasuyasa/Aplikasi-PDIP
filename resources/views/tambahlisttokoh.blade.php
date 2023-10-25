@extends('layouts.main')
@section('container')
<h1 class="text-center">Tambah Data Desa</h1>
<div class="row justify-content-center">
    <div class="col-8 ">
        <div class="card ">
            <div class="card-body">
                <form action="/insertlisttokoh" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">

                        {{-- Desa --}}
                        <div class="form-group">
                            <label for="kabupaten_id">Pilih Desa</label>
                            <div class="input-group mb-3">
                                <select name="desa_id" class="custom-select" id="inputGroupSelect02">
                                    <option selected>Pilih Desa...</option>
                                    @foreach($desa as $ds )
                                    <option value="{{ $ds->id }}">{{ $ds->nama_desa }}</option>

                                    @endforeach
                                </select>
                                <div class="input-group-append">
                                    <label class="input-group-text" for="inputGroupSelect02">Pilih</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama_tokoh">Nama Tokoh</label>
                        <input type="text" class="form-control" name="nama_tokoh" placeholder="Masukan Nama Desa" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No Telepon Tokoh</label>
                        <input type="text" class="form-control" name="notelp_tokoh" placeholder="Masukan NO Telepon Bendesa" autocomplete="off">
                    </div>
                
                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection

