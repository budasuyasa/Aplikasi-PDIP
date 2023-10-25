@extends('layouts.main')

@section('container')
<title>{{ $title }}</title>
<div class="container">
</div>
<div class="container mb-3">
  <div class="row">
    <div class="col col d-flex justify-content-start align-items-center">
      <h2>Desa</h2>
    </div>
    <div class="col d-flex justify-content-end align-items-center">
      @if(count($desa)>0)
        
      <a href="/tambahdesa/{{ $desa[0]->kecamatan->id }}" type="button" class="btn btn-success">Tambah Desa</a>
      @else
      <a href="/tambahlistdesa" type="button" class="btn btn-success">Tambah Desa</a>
      @endif

    </div>
  </div>
  {{-- <div class="row">
    <div class="col d-flex">
      
      <div class="card bg-white rounded shadow mr-3 p-3 mb-3" style="max-width: 18rem; height: 11rem;">
        <div class="card-header bg-white"><h5>Total Desa</h5></div>
        <div class="card-body">
          <h2 class="card-title">{{ $desa->count() }}</h2>
        </div>
      </div>
      <div class="card bg-white rounded shadow p-3 mb-3" style="max-width: 15rem; height: 11rem;">
        <div class="card-header bg-white"><h5>Total Kecamatan</h5></div>
        <div class="card-body">
          <h2 class="card-title"></h2>
        </div>
      </div>


    </div>
  </div> --}}
  @if($message = Session::get('editdesa'))
  <div class="alert alert-success" role="alert">
    {{ $message }}
  </div>
  @elseif($message = Session::get('hapusdesa'))
  <div class="alert alert-success" role="alert">
    {{ $message }}
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
        <input type="search" class="form-control" name="search" placeholder="Cari Kecamatan" autocomplete="off">
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
          <th scope="col">Nama Bendesa</th>
          <th scope="col">Afiliasi Partai</th>
          <th scope="col">Jumlah Banjar</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
    @php
      $no = 1;
      @endphp
    @if(count($desa)>0)
    @foreach($desa as $desa)
    
    <tr>
      <td>{{ $no++}}</td>
      
      <td>{{ $desa->kabupaten->nama }}</td>
      <td>{{ $desa->kecamatan->nama }}</td>
      <td>{{ $desa->nama_desa }}</td>
      <td>{{ $desa->nama_bendesa }}</td>
      <td>{{ $desa->afiliasi_partai }}</td>
      <td>{{ $desa->banjar->count() }}</td>
      <td> 
        <div class="dropdown">
        <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Option
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="/desa/banjar/{{ $desa->id }}">Lihat Banjar</a>
          <a class="dropdown-item" href="/editdesa/{{ $desa->id }}">Edit Desa</a>
          <a class="dropdown-item" href="/hapusdesa/{{ $desa->id }}">Hapus Desa</a>
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