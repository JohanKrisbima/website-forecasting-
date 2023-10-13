@extends('layouts.main')
@section('main')
<div class="content">
  @if(session()->has('successDelete'))
    <script>alert('Berhasil Dihapus')</script>
  @endif
  @if(session()->has('successAdd'))
    <script>alert('Berhasil DiTambahkan')</script>
  @endif
  @if(session()->has('successUpdate'))
    <script>alert('Berhasil Diupdate')</script>
  @endif
  @if(session()->has('error'))
  <script>alert('Data Penjualan tidak ditemukan')</script>                  
  @endif
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!-- Tambahkan Tombol Tambah Data -->
          <a href="/addData" class="btn btn-primary">Tambah Data</a>
          <br /><br /><!-- Tabel Data Penjualan -->
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Bulan Tahun</th>
                  <th>Penjualan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php  $no =1; ?>
                @foreach ($penjualan as $p)
                  <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $p->bln_thn }}</td>
                    <td>{{ $p->d_aktual }}</td>
                    <td>
                      <a href="/editData/{{ $p->id }}" class="btn btn-info btn-sm">Edit</a>
                      <a href="/delete/{{ $p->id }}" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                  </tr>
                <?php $no++ ?>
                @endforeach
                <!-- Tambahkan baris-baris data lainnya di sini -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection