@extends('layouts.main')

@section('container')
<title>{{ $title }}</title>
<div class="container">
</div>
<div class="container mb-3">
    <div class="row">
        <div class="col col d-flex justify-content-start align-items-center">
            <h1>Kabupaten</h1>
        </div>
        <div class="col d-flex justify-content-end align-items-center">
            <a href="/tambahkab" type="button" class="btn btn-success">Tambah Kabupaten</a>

        </div>
    </div>
    <div class="row">
        <div class="col d-flex">

            <div class="card bg-white rounded shadow mr-3 p-3 mb-3" style="max-width: 18rem; height: 11rem;">
                <div class="card-header bg-white">
                    <h5>Total Kabupaten</h5>
                </div>
                <div class="card-body">
                    <h2 class="card-title">{{ $kab->count() }}</h2>
                </div>
            </div>
            {{-- <div class="card bg-white rounded shadow p-3 mb-3" style="max-width: 15rem; height: 11rem;">
        <div class="card-header bg-white"><h5>Total Kecamatan</h5></div>
        <div class="card-body">
          <h2 class="card-title"></h2>
        </div>
      </div> --}}


        </div>
    </div>
    @if($message=Session::get('insertkab'))
    <div class="row fluid">
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
    </div>
    @elseif($message=Session::get('updatekab'))
    <div class="row">
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
    </div>
    @elseif($message=Session::get('deletekab'))
    <div class="row">
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
    </div>

    @endif
</div>
{{-- <div class="col-5 m-3 rounded bg-white shadow p-3">
      <h6>Total Kecamatan</h6>
      <h1>{{ $kec->count() }}</h1>
</div>
<div class="col-5 m-3 rounded bg-white shadow p-3">
    <h6>Total Kecamatan</h6>
    <h1>{{ $kec->count() }}</h1>
</div> --}}

<div class="container bg-white shadow p-3 rounded">
    <div class="row d-flex justify-content-end align-items-center">
        <form action="/kabupaten" method="GET">
            <div class="input-group">
                <a href="/exportpdf" class="btn btn-danger mr-3">Export To PDF</a>
                <input type="search" class="form-control" name="search" placeholder="Cari Kecamatan" autocomplete="off">
                <a class="btn btn-outline-secondary" type="submit" id="button-addon2"><img src="{{asset('/images/filter.png')}}" style="width: 20px; height:20px " alt=""></a>
            </div>
        </form>

    </div>

    <table class="table-striped w-100 table-sm">
        <thead class="table-success align-items-center">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Kabupaten</th>
                <th scope="col">Jumlah Kecamatan</th>
                <th scope="col">Jumlah Desa</th>
                <th scope="col">Jumlah Banjar</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @php
            $no = 1;
            @endphp
            @if(count($kab)>0)
            @foreach($kab as $kabs)

            <tr>
                <td>{{ $no++}}</td>

                <td>{{ $kabs->nama }}</td>
                <td>{{ $kabs->kecamatan->count() }}</td>
                <td>{{ $kabs->desa->count() }}</td>
                <td>{{ $kabs->banjar->count() }}</td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Option
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="/kabupaten/kecamatan/{{ $kabs->id }}">Lihat Kecamatan</a>
                            <a class="dropdown-item" href="/kabupaten/desa/{{ $kabs->id }}">Lihat Desa</a>
                            <a class="dropdown-item" href="/kabupaten/banjar/{{ $kabs->id }}">Lihat Banjar</a>
                            <a class="dropdown-item" href="/editkab/{{ $kabs->id }}">Edit Kabupaten</a>
                            <a class="dropdown-item" href="/hapuskab/{{ $kabs->id }}">Hapus Kabupaten</a>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="5" class="text-center fs-4">No Result Found!</td>
            </tr>
        </tbody>
    </table>


    @endif
</div>

@endsection

