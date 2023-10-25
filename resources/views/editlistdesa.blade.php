@extends('layouts.main')
@section('container')
<h1 class="text-center">{{ $title }}</h1>
<div class="row justify-content-center">
    <div class="col-8 ">
        <div class="card ">
            <div class="card-body">
                <form action="/updatelistdesa/{{ $data->id }}" method="POST" enctype="multipart/form-data">
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

                            <input type="text" class="form-control" name="nama_desa" value="{{ $data->nama_desa }}">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Bendesa</label>

                            <input type="text" class="form-control" name="nama_bendesa" value="{{ $data->nama_bendesa }}">
                        </div>
                        <div class="form-group">
                            <label for="">Nomor Telepon Bendesa</label>

                            <input type="text" class="form-control" name="no_telp" value="{{ $data->no_telp }}">
                        </div>
                       
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="partai">Afiliasi Partai</label>
                                </div>
                                <select name="afiliasi_partai" id="partai" class="custom-select">
                                    <option value={{ $data->afiliasi_partai }}>{{ $data->afiliasi_partai }}</option>
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
