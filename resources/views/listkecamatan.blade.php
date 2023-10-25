@extends('layouts.main')

@section('container')
<title>{{ $title }}</title>

<div class="container mb-3">
    <div class="row">
        <div class="col col d-flex justify-content-start align-items-center">
            <h1>Kecamatan</h1>
        </div>
        <div class="col d-flex justify-content-end align-items-center">
            <a href="/tambahlistkec" type="button" class="btn btn-success">Tambah Kecamatan</a>

        </div>
    </div>
    <div class="row">
        <div class="col d-flex">

            <div class="card bg-white rounded shadow mr-3 p-3 mb-3" style="max-width: 18rem; height: 11rem;">
                <div class="card-header bg-white">
                    <h5>Total Kecamatan</h5>
                </div>
                <div class="card-body">
                    <h2 class="card-title">{{ $data->count() }}</h2>
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
@if($message = Session::get('tambahlistkec'))
<div class="alert alert-success" role="alert">
    {{ $message }}
</div>
@endif
</div>

<div class="container bg-white shadow p-4 rounded">
    <div class="row d-flex justify-content-end align-items-center">
        <form action="/listkec" method="GET">
            <div class="input-group">
                <input type="search" class="form-control" name="search" placeholder="Cari Kecamatan" autocomplete="off">
            </div>
        </form>

        <div class="dropdown ml-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Filter Data
            </button>
            <div class="dropdown-menu" name="filterlistkec" aria-labelledby="dropdownMenuButton">
                <form action="/filterlistkec">
                    <a class="dropdown-item" href="/filterlistkec" value="nama">Nama (ASC)</a>
                    <a class="dropdown-item" value="">Another action</a>
                    <a class="dropdown-item" value="">Something else here</a>
                </form>
            </div>
        </div>
    </div>


    <div class="row">

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
                @if(count($kec)>0)
                @foreach($kec as $no => $kecs)

                <tr>
                    <td>{{ $no + $kec->firstItem()}}</td>

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
                {{-- @else
    <tr><td colspan="5" class="text-center fs-4">No Result Found!</td></tr> --}}
            </tbody>
        </table>
        @endif
    </div>

    <div class="row">

        {{ $kec->links() }}
    </div>
</div>

@endsection
