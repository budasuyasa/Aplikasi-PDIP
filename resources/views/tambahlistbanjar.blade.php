@extends('layouts.main')
@section('container')
    <h1 class="text-center">Tambah Data Desa</h1>
        <div class="row justify-content-center">
            <div class="col-8 ">
                <div class="card ">
                    <div class="card-body">
                        <form action="/insertlistbanjar" method="POST" enctype="multipart/form-data">
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
                                </div>
                                <div class="form-group">

                                    {{-- Kecamatan --}}
                                    <div class="form-group">
                                      <label for="kabupaten_id">Pilih Kecamatan</label>
                                      <div class="input-group mb-3">
                                        <select name="kecamatan_id" class="custom-select" id="inputGroupSelect02">
                                          <option selected>Pilih Kecamatan...</option>
                                          @foreach($kec as $kecs )
                                          <option value="{{ $kecs->id }}">{{ $kecs->nama }}</option>
                                            
                                          @endforeach
                                        </select>
                                        <div class="input-group-append">
                                          <label class="input-group-text" for="inputGroupSelect02">Pilih</label>
                                        </div>
                                      </div>
                                    </div>
                                </div>

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
                                  <label for="nama_desa">Nama Banjar</label>
                                  <input type="text" class="form-control" name="nama_banjar" placeholder="Masukan Nama Desa" autocomplete="off">
                                </div>
                                <div class="form-group">
                                  <label for="nama_bendesa">Nama Kelihan Banjar</label>
                                  <input type="text" class="form-control" name="kelihan_banjar" placeholder="Masukan Nama Bwndesa" autocomplete="off">
                                </div>
                                <div class="form-group">
                                  <label for="no_telp">No Telepon Kelihan</label>
                                  <input type="text" class="form-control" name="notelp_kelihan" placeholder="Masukan NO Telepon Bendesa" autocomplete="off">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection
