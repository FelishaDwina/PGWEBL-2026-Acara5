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
    <div class="card shadow">
        <div class="card-header">
            <h4 class="mb-0">Aplikasi Geospasial</h4>
        </div>
        <div class="card-body">
            <p>Aplikasi ini dibuat untuk memenuhi tugas mata kuliah Praktikum Pemrograman Geospasial
            Web Lanjut. Aplikasi ini menampilkan peta interaktif yang menunjukkan onjek dengan geometri
            titik,garis, dan area yang dapat ditambah, ditampilkan, diubah, dan dihapus. Aplikasi
            ini dikembangkan dengan menggunakan Laravel dan PostgreSQL - PostGIS.
            </p>
        </div>
    </div>

    <div class='container mt-3'>
    <div class="row">
        <div class="col-3">
            <div class="card text-dark" style="background-color: #FFE4E1;">
                <div class="card-header">
                    <h3>Jumlah Point</h3>
                </div>
                <div class="card-body text-center">
                    <h1>{{$points_counts}}</h1>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header">
                    <h3>Jumlah Polyline</h3>
                </div>
                <div class="card-body text-center">
                    <h1>{{$polylines_counts}}</h1>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header">
                    <h3>Jumlah Polygon</h3>
                </div>
                <div class="card-body text-center">
                    <h1>{{$polygons_counts}}</h1>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header">
                    <h3>Jumlah User</h3>
                </div>
                <div class="card-body text-center">
                    <h1>{{$users_counts}}</h1>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function () {
    $('#tabelku').DataTable();
});
</script>
@endsection
