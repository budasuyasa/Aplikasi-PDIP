@extends('layouts.main')

@section('container')
<title>{{ $title }}</title>
<div class="container">
</div>
<div class="container mb-3">
  <div class="row">
    <div class="col col d-flex justify-content-start align-items-center">
      <h1>Banjar</h1>
    </div>
    <div class="col d-flex justify-content-end align-items-center">
     <a href="/tambahlistbanjar" type="button" class="btn btn-success">Tambah Banjar</a>

    </div>
  </div>
  <div class="row">
    <div class="col d-flex">
      
      <div class="card bg-white rounded shadow mr-3 p-3 mb-3" style="max-width: 18rem; height: 11rem;">
        <div class="card-header bg-white"><h5>Total Banjar</h5></div>
        <div class="card-body">
          <h2 class="card-title">{{ $banjar->count() }}</h2>
        </div>
      </div>
      {{-- <div class="card bg-white rounded shadow p-3 mb-3" style="max-width: 15rem; height: 11rem;">
        <div class="card-header bg-white"><h5>Total Kecamatan</h5></div>
        <div class="card-body">
          <h2 class="card-title">{{ $data->desa->count() }}</h2>
        </div>
      </div> --}}


    </div>
  </div>
  @if($message = Session::get('insertbanjar'))
  <div class="alert alert-success" role="alert">
    {{ $message }}
  </div>
  @elseif($message = Session::get('deletebanjar'))
  <div class="alert alert-success" role="alert">
    {{ $message }}
  </div>
  @elseif($message = Session::get('editbanjar'))
  <div class="alert alert-success" role="alert">
    {{ $message }}
  </div>
  @endif
</div>
    {{-- <div class="col-5 m-3 rounded bg-white shadow p-3">
      <h6>Total Kecamatan</h6>
      <h1>{{ $desa->count() }}</h1>
    </div>
    <div class="col-5 m-3 rounded bg-white shadow p-3">
      <h6>Total Kecamatan</h6>
      <h1>{{ $desa->count() }}</h1>
    </div> --}}

<div class="container bg-white shadow p-3 rounded">
  <div class="row d-flex justify-content-end align-items-center">
    <form action="/listdesa" method="GET">
      <div class="input-group">
        <input type="search" class="form-control" name="search" placeholder="Cari Desa" autocomplete="off">
        <a class="btn btn-outline-secondary" type="submit"id="button-addon2"><img src="{{asset('/images/filter.png')}}" style="width: 20px; height:20px " alt=""></a>
      </div>
    </form>

    </div>
    
    <table class="table-striped w-100 table-sm">
      <thead class="table-success align-items-center">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama Kabupaten</th>
          <th scope="col">Nama Kecamatan</th>
          <th scope="col">Nama Desa</th>
          <th scope="col">Nama Banjar</th>
          <th scope="col">Nama Kelihan</th>
          <th scope="col">Nomor Telepon</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
    @php
      $no = 1;
      @endphp
    @if(count($banjar)>0)
    @foreach($banjar as $bjr)
    
    <tr>
      <td>{{ $no++}}</td>
      
      <td>{{ $bjr->kabupaten->nama }}</td>
      <td>{{ $bjr->kecamatan->nama }}</td> 
      <td>{{ $bjr->nama_desa }}</td> 
      <td>{{ $bjr->nama_banjar }}</td>
      <td>{{ $bjr->nama_kelihan }}</td>
      <td>{{ $bjr->notelp_kelihan }}</td>
      <td> 
        <div class="dropdown">
        <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Option
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          
          <a class="dropdown-item" href="/editbanjar/{{ $bjr->id }}">Edit Banjar</a>
          <a class="dropdown-item" href="/deletelistbanjar/{{ $bjr->id }}">Hapus Banjar</a>
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