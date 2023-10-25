@extends('layouts.main')
@section('container')
    <h1 class="text-center">Tambah Data Desa</h1>
        <div class="row justify-content-center">
            <div class="col-8 ">
                <div class="card ">
                    <div class="card-body">
                        <form action="/insertlistdesa" method="POST" enctype="multipart/form-data">
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
                                  <label for="nama_desa">Nama Desa</label>
                                  <input type="text" class="form-control" name="nama_desa" placeholder="Masukan Nama Desa" autocomplete="off">
                                </div>
                                <div class="form-group">
                                  <label for="nama_bendesa">Nama Bendesa</label>
                                  <input type="text" class="form-control" name="nama_bendesa" placeholder="Masukan Nama Bwndesa" autocomplete="off">
                                </div>
                                <div class="form-group">
                                  <label for="no_telp">No Telepon Bendesa</label>
                                  <input type="text" class="form-control" name="no_telp" placeholder="Masukan NO Telepon Bendesa" autocomplete="off">
                                </div>
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                      <label class="input-group-text" for="partai">Afiliasi Partai</label>
                                  </div>
                                  <select name="afiliasi_partai" id="partai" class="custom-select">
                                      <option selected>Pilih Partai</option>
                                      <option value="PDI Perjuangan">PDI Perjuangan</option>
                                      <option value="Golkar">Golkar</option>
                                      <option value="Gerindra">Gerindra</option>
                                      <option value="Demokrat">Demokrat</option>
                                      <option value="Nasdem">Nasdem</option>
                                      <option value="Hanura">Hanura</option>
                                      <option value="PSI">PSI</option>
                                  </select>
                              </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection
