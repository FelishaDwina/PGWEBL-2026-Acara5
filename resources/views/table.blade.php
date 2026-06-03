@extends('layouts.template')
@section('styles')
<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }

    /* Header tabel */
    .table thead th {
        background-color: #FF69B4 !important;
        color: white !important;
    }

    /* Baris ganjil */
    .table tbody tr:nth-child(odd) td {
        background-color: #FFF0F5 !important;
    }

    /* Baris genap */
    .table tbody tr:nth-child(even) td {
        background-color: #FFB6C1 !important;
    }

    /* Hover */
    .table tbody tr:hover td {
        background-color: #FF69B4 !important;
        color: white;
    }

    /* Header card pink */
    .card-header {
        background-color: #FF69B4;
        color: white;
    }

</style>
<!-- DataTables CSS -->
<link rel="stylesheet"
href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endsection
@section('content')
<div class="container mt-4">
    <!-- Judul halaman -->
    <h2 class="mb-3">Halaman Tabel</h2>
    <div class="card shadow">
        <div class="card-header">
            <h4 class="mb-0">Tabel Data Point</h4>
        </div>
        <div class="card-body">
            <table id="tabledatapoints"
            class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Foto</th>
                        <th>Tanggal Dibuat</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($points as $p)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$p['name']}}</td>
                            <td>{{$p['description']}}</td>
                            <td>
                                <img src="{{asset('storage/images').'/'.$p['image']}}" alt="" width="200">
                            </td>
                            <td>{{$p['created_at']}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card mt-4 shadow">
        <div class="card-header">
            <h4 class="mb-0">Tabel Data Polyline</h4>
        </div>
        <div class="card-body">
            <table id="tabledatapolylines"
            class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Foto</th>
                        <th>Tanggal Dibuat</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($polylines as $p)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$p['name']}}</td>
                            <td>{{$p['description']}}</td>
                            <td>
                                <img src="{{asset('storage/images').'/'.$p['image']}}" alt="" width="200">
                            </td>
                            <td>{{$p['created_at']}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card mt-4 shadow">
        <div class="card-header">
            <h4 class="mb-0">Tabel Data Polygon</h4>
        </div>
        <div class="card-body">
            <table id="tabledatapolygons"
            class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Foto</th>
                        <th>Tanggal Dibuat</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($polygons as $p)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$p['name']}}</td>
                            <td>{{$p['description']}}</td>
                            <td>
                                <img src="{{asset('storage/images').'/'.$p['image']}}" alt="" width="200">
                            </td>
                            <td>{{$p['created_at']}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#tabledatapoints').DataTable();
    });
</script>
<script>
    $(document).ready(function () {
        $('#tabledatapolylines').DataTable();
    });
</script>
<script>
    $(document).ready(function () {
        $('#tabledatapolygons').DataTable();
    });
</script>
@endsection
