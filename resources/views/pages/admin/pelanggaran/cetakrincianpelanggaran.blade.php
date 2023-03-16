<!DOCTYPE html>
<html>
<head>
	<title>Pelanggaran Siswa</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 10pt;
		}
	</style>
	<center>
		
		<h5><u>PELANGGARAN SISWA</u></h4>
		<p style="font-size: 9pt; font-style: italic;">Tanggal Cetak : {{$date}}</p>
	</center>
	<hr style="border: solid;">
	
			 <div style="font-size: 16px; color: blue; padding-bottom: 10px">
                    <a>Data Siswa</a>
             </div>

	 	
            <table class="table table-striped">
                <tbody>
                   @foreach($pelanggaran as $pe)
                      @if($loop->first)
                     

                    <tr>
                        <td style="font-weight: bold;">NISN</td>
                        <td style="font-weight: bold;">: {{$pe->nisn}}</td>
                        <td style="font-weight: bold;">Kelas</td>
                        <td style="font-weight: bold;">: {{$pe->nama_kelas}}</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Nama </td>
                        <td style="font-weight: bold;">: {{$pe->nama}}</td>
                        
                        <td style="font-weight: bold;">Tahun Akademik</td>
                        <td style="font-weight: bold;">: {{$pe->nama_tahunakademik}}</td>
                      
                    </tr>
                       @endif
                        @endforeach
                </tbody>
            </table>
      
       <hr>
        	<div style="font-size: 16px; color: blue; padding-bottom: 10px">
                <a>Rincian Pelanggaran</a>
            </div>
                    
 
	<table class="table table-striped" id="pembayaranTable">
                    <thead>
                    <tr class="bg-warning color white">
                        <th style="color: black;">No</th>
                        <th style="color: black;">Nama Pelanggaran</th>
                        <th style="color: black;">Keterangan</th>
                        <th style="color: black;">Poin</th>
                        <th style="color: black;">Petugas</th>
                        <th style="color: black;">Tanggal</th>
                      </tr>
                    </thead>



                    <?php
                      // $tgl = date("d-m-Y", strtotime($pel->tgl_pelanggaran)); 
                      $no=1;
                      $totalpoin=0;
                      ?>
                @foreach($pelanggaran as $pel)
                <?php
                      $tgl = date("d-m-Y", strtotime($pel->tgl_pelanggaran)); 
                      
                      ?>

                <tr>
                    <td>{{ $no++}}</td>
                    <td>{{ $pel ->nama_pelanggaran}}</td>
                    <td>{{ $pel ->detail_keterangan}}</td>
                    <td>{{ $pel ->poin}}</td>
                    <td>{{ $pel ->nama_petugas}}</td>
                    <td>{{$tgl}}</td>

                    <?php $totalpoin+=$pel->poin; ?>
                    
                </tr>
                @endforeach
                   <tr style="background-color: #e1e1ea" >
                          <td colspan="3" style="color: black; font-style: bold;">Total Poin   : </td>
                          <td style="color: black; font-style: bold;">{{$totalpoin}} </td>
                          
                        </tr>
            </tbody>
                      
                        
                    
                    </table>
 
</body>
</html>