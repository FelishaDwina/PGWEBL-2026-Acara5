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
    <h2 class="mb-3">Halaman Tabel Area</h2>
    <div class="card shadow">
        <div class="card-header">
            <h4 class="mb-0">Data Polygons</h4>
        </div>
        <div class="card-body">
            <table id="tabelku"
            class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Area (Hectares)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Kota Baru</td>
                        <td>Isine stadion kridosono</td>
                        <td>3.53</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Alun-alun Utara</td>
                        <td>Area ne iki</td>
                        <td>5.28</td>
                    </tr>
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
    $('#tabelku').DataTable();
});
</script>
@endsection
