@extends('layouts.app')

@section('content')
<!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                @if (Auth::guest())
                    <img class="img-responsive" alt="" src="{{url('penggajian/img/lock.png')}}">
                    <div class="intro-text">
                        <span class="name">SELAMAT DATANG</span>
                        <hr class="star-light">
                        <span class="skills">Anda Tidak Meiliki Hak Akses , Anda Harus Login/Registrasi Terlebih Dahulu!</span>
                    </div>
                    @else
                    
                    <div class="intro-text">
                     <h1><b><font face="Maiandra GD" color="white"><center>PENGGAJIAN</center></font></b></h1>
                        <hr class="star-light">
                         <h4><font face="Maiandra GD" color="white"></font></h4></div>
                    </div>
                        
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </header>
<br>
   <div class="right_col" role="main">
          <div class="">
<h1><b><font face="Maiandro GD" color="white"><center>Data Penggajian</center></font></b></h1>
            <div class="clearfix"></div>
 <center><a href="{{url('Penggajians/create')}}" class="btn btn-primary">Input Data Penggajian<i class="fa fa-pencil"></i></a></center>
            <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                  <div class="x_title">
                 <hr>
                 
                 
                  <div class="x_content">

                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr class="bg-danger">
                          <th><p class="center"><center>No.</center></p></th>
                          <th><p class="center"><center>Pegawai</center></p></th>
                          <th><p class="center"><center>Jumlah Jam Lembur</center></p></th>
                          <th><p class="center"><center>Jumlah Uang Lembur</center></p></p></th>
                          <th><p class="center"><center>Gaji Pokok</center></p></p></th>
                          <th><p class="center"><center>Total Gaji</center></p></p></th>
                          <th><p class="center"><center>Tanggal Pengambilan</center></p></p></th>
                          <th><p class="center"><center>Status Pengambilan</center></p></p></th>
                          <th><p class="center"><center>Petugas Penerima</center></p></p></th>
                          <th colspan="3"><p class="center"><center>Tindakan</center></p></th>
                        </tr>
                      </thead>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($gajian as $data)
                            <tbody>
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->Tunjangan_pegawai->Pegawai->User->name}}</td>
                                    <td>{{$data->Jumlah_jam_lembur}} </td>
                                    <td>{{$data->Jumlah_uang_lembur}} </td>
                                    <td>{{$data->Gaji_pokok}} </td>
                                    <td>{{$data->Total_gaji}} </td>
                                    <td>{{$data->updated_at}} </td>
                                    
                                    @if($data->Status_pengambilan == 0)
                                    
                                        <td>Belum Diambil </td>
                                    
                                    @endif
                                    @if($data->Status_pengambilan == 1)
                                    
                                        <td>Sudah Diambil</td>
                                    
                                    @endif
                                  <td>{{$data->Petugas_penerima}} </td>
                                 <th><a href="{{url('Penggajians',$data->id)}}" class="btn btn-primary">lihat</i></a></th>
                                 <th><a title="Edit" href="{{route('Penggajians.edit',$data->id)}}" class="btn btn-warning">ubah</i></a></th>
                                 <th>
                                   <a data-toggle="modal" href="#delete{{ $data->id }}" class="btn btn-danger" title="Delete" >hapus</i></a>
                                  @include('modals.del', [
                                    'url' => route('Penggajians.destroy', $data->id),
                                    'model' => $data
                                  ])
                                 </th>
                             </tr>
                         @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


@endsection