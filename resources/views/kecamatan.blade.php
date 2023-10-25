@extends('layouts.main')

@section('container')
<title>{{ $title }}</title>
<div class="container">
</div>
<div class="container mb-3">
  <div class="row">
    @if(count($kec)>0)
    <div class="col d-flex justify-content-start align-items-center">
      <h2>Kecamatan Dari Kabupaten {{ $kec[0]->kabupaten->nama }}</h2>
    </div>
      <div class="col d-flex justify-content-end align-items-center">
        <a href="/tambahkec/{{ $kec[0]->kabupaten->id }}" type="button" class="btn btn-success">Tambah Kecamatan</a>
      </div>
      @else
      <div class="col d-flex justify-content-start align-items-center">
      <h2>Kecamatan</h2>
      </div>
      <div class="col d-flex justify-content-end align-items-center">
        <a href="/tambahlistkec/" type="button" class="btn btn-success">Tambah Kecamatan</a>
      </div>
      @endif
    </div>

    @if($message = Session::get('insertkec'))
  <div class="alert alert-success" role="alert">
    {{ $message }}
  </div>
  @elseif($message = Session::get('deletekec'))
  <div class="alert alert-success" role="alert">
    {{ $message }}
  </div>
  @elseif($message = Session::get('updatekec'))
  <div class="alert alert-success" role="alert">
    {{ $message }}
  </div>
  @endif
  </div>
  {{-- <div class="row">
    <div class="col d-flex">
      
      <div class="card bg-white rounded shadow mr-3 p-3 mb-3" style="max-width: 18rem; height: 11rem;">
        <div class="card-header bg-white"><h5>Total Kecamatan</h5></div>
        <div class="card-body">
          <h2 class="card-title">{{ $kab[0]->kecamatan->count() }}</h2>
        </div>
      </div>
      <div class="card bg-white rounded shadow p-3 mb-3" style="max-width: 15rem; height: 11rem;">
        <div class="card-header bg-white"><h5>Total Kecamatan</h5></div>
        <div class="card-body">
          <h2 class="card-title">{{ $data->desa->count() }}</h2>
        </div>
      </div>


    </div>
  </div> --}}
{{-- </div> --}}
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
    <form action="/kecamatan/search" method="GET">
      <div class="input-group">
        <input type="search" class="form-control" name="search" placeholder="Cari Kecamatan" autocomplete="off">
        <a class="btn btn-outline-secondary" type="submit"id="button-addon2"><img src="{{asset('/images/filter.png')}}" style="width: 20px; height:20px " alt=""></a>
      </div>
    </form>

    </div>
    
    <table class="table-striped w-100 table-sm">
      <thead class="table-success align-items-center">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama Kecamatan</th>
          <th scope="col">Nama Kabupaten</th>
          <th scope="col">Jumlah Desa</th>
          <th scope="col">Jumlah Banjar</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
    @php
      $no = 1;
      @endphp
    @if(count($kec)>0)
    @foreach($kec as $kecs)
    
    <tr>
      <td>{{ $no++}}</td>
      
      <td>{{ $kecs->nama }}</td>
      <td>{{ $kecs->kabupaten->nama }}</td>
      <td>{{ $kecs->desa->count() }}</td>
      <td>{{ $kecs->banjar->count() }}</td>
      <td> 
        <div class="dropdown">
        <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Option
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="/desa/{{ $kecs->nama }}">Lihat Desa</a>
          <a class="dropdown-item" href="/banjar/{{ $kecs->nama }}">Lihat Banjar</a>
          <a class="dropdown-item" href="/editkec/{{ $kecs->id }}">Edit Kecamatan</a>
          <a class="dropdown-item" href="/hapuskec/{{ $kecs->id }}">Hapus Kecamatan</a>
        </div>
      </div>
    </td>
    </tr>
    @endforeach
    @else
    <tr><td colspan="10" class="text-center fs-4">No Result Found!</td></tr>
  </tbody>
</table>


@endif
</div>

@endsection