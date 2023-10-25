<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<h2 class="text-center">Data Kabupaten Provinsi Bali</h2>
    <table class="table-striped w-100 table-sm">
        <thead class="table-success align-items-center">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Kabupaten</th>
                <th scope="col">Jumlah Kecamatan</th>
                <th scope="col">Jumlah Desa</th>
                <th scope="col">Jumlah Banjar</th>
            </tr>
        </thead>
        <tbody>
            @php
            $no = 1;
            @endphp
            @foreach($data as $kabs)

            <tr>
                <td>{{ $no++}}</td>

                <td>{{ $kabs->nama }}</td>
                <td>{{ $kabs->kecamatan->count() }}</td>
                <td>{{ $kabs->desa->count() }}</td>
                <td>{{ $kabs->banjar->count() }}</td>
                <td></td>
              
            </tr>
            @endforeach
            
        </tbody>
    </table>

