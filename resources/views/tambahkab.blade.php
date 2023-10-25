@extends('layouts.main')
@section('container')
    <h1 class="text-center">Tambah Data Kabupaten</h1>
        <div class="row justify-content-center">
            <div class="col-8 ">
                <div class="card ">
                    <div class="card-body">
                        <form action="/insertkab" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Nama Kabupaten</label>
                                  <input type="text" autocomplete="off" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama" placeholder="Masukan Nama Kabupaten">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection
