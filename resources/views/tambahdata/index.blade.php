@extends('layouts.main')
@section('main')
<div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 mt-2 " style="margin-bottom: 40vh">
            <h6 class="font-weight-bold text-primary m-0">Tambah Data Penjualan</h6>
            <br>
            <form action="/addData" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="bln_thn" class="form-label">Bulan Tahun</label>
                  <input type="text" class="form-control" id="bln_thn" name="bln_thn" required placeholder="Example: Agustus 2021"> 
                  
                </div>
                <div class="mb-3">
                  <label for="d_aktual" class="form-label">Penjualan</label>
                  <input type="text" class="form-control" id="d_aktual" name="d_aktual" required>
                </div>
               
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
          </div>
        </div>
      </div>
    </div>
@endsection