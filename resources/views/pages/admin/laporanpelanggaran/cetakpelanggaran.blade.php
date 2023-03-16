<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widht=device-widht, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
        <style type="text/css">
        table tr td,
        table tr th{
            font-size: 10pt;
        }
    </style>
    
    <title>CETAK DATA PELANGGARAN</title>
</head>
<body>
    <div class="form-group">
        <h4 align="center">MTs. NURUR RAHMAH SAMBIRAMPAK LOR </h4>
        <p align="center" style="padding-top: -30px"><b>Laporan Data Pelanggaran Siswa</b></p>
        <p align="center" style="font-size: 9pt; padding-bottom:60px font-style: italic;">Tanggal Cetak : {{$date}}</p>
        <table class="table table-striped solid">
            <head>
            <tr class="bg-primary color white">
                <th style="color: white;">No</th>
                <th style="color: white;">NISN</th>
                <th style="color: white;">Nama</th>
                <th style="color: white;">Pelanggaran</th>
                <th style="color: white;">Poin</th>
                <th style="color: white;">Keterangan</th>
                <th style="color: white;">Tanggal</th>
                <th style="color: white;">Petugas</th>
            </tr>
            </head>
            <?php $no=1; ?>
            @foreach($pelanggaran as $pel)
            <?php
                      $tgl = date("d-m-Y", strtotime($pel->tgl_pelanggaran)); 
                      
                      ?>
            <tr>
                <td>{{ $no++}}</td>
                <td>{{ $pel ->nisn}}</td>
                <td>{{ $pel ->nama}}</td>
                <td>{{ $pel ->nama_pelanggaran}}</td>
                <td>{{ $pel ->poin}}</td>
                <td>{{ $pel ->detail_keterangan}}</td>
                <td>{{$tgl}}</td>
                <td>{{ $pel ->nama_petugas}}</td>
             </tr>
             @endforeach
    
        </table>
    </div>
</body>

</html>