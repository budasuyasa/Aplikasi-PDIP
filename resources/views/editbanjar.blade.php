@extends('layouts.main')
@section('container')
<h1 class="text-center">{{ $title }}</h1>
<div class="row justify-content-center">
    <div class="col-8 ">
        <div class="card ">
            <div class="card-body">
                <form action="/updatebanjar/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">

                        {{-- Kabupaten --}}
                        <div class="form-group">
                            <label for="">Nama Kabupaten</label>

                            <input class="form-control" type="hidden" name="kabupaten_id" value="{{ $data->kabupaten->id }}" readonly>
                            <input class="form-control" id="nama_kab" type="text" value="{{ $data->kabupaten->nama }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="">Nama Kecamatan</label>

                            <input class="form-control" type="hidden" name="kecamatan_id" value="{{ $data->kecamatan->id }}" readonly>
                            <input class="form-control" id="nama_kab" type="text" value="{{ $data->kecamatan->nama }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Desa</label>

                            <input class="form-control" type="hidden" name="desa_id" value="{{ $data->desa->id }}" readonly>
                            <input class="form-control" id="nama_kab" type="text" value="{{ $data->desa->nama_desa }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Banjar</label>

                            <input type="text" class="form-control" name="nama_banjar" value="{{ $data->nama_banjar }}">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kelihan Banjar</label>

                            <input type="text" class="form-control" name="kelihan_banjar" value="{{ $data->kelihan_banjar }}">
                        </div>
                        <div class="form-group">
                            <label for="">Nomor Telepon Banjar</label>

                            <input type="text" class="form-control" name="notelp_kelihan" value="{{ $data->notelp_kelihan}}"">
                        </div>
                       
                            {{-- <div class="input-group mb-3">
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
                            </div> --}}
                            



                        <button type="submit" class="btn btn-primary">Submit</button>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
