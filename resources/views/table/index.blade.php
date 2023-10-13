
@extends('layouts.main')
@section('main')

<div class="content">
  
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <h2>Data Peramalan Penjualan Es Oyen</h2>
          <!-- Tambahkan Tombol Tambah Data Peramalan -->
          
          
          <p>Alpha: {{ $alpha->n_alpha }}</p>
                    <form method="post" action="/alpha/update">
                        @csrf
                            {{-- @method('post') --}}
                        <div class="input-group mb-3">
                            <input type="text"  placeholder="                 Masukkan Alpha" aria-describedby="button-addon2" name="n_alpha" style="width: 250px; border: none; margin-right: 15px;">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2" style="background-color: #51BCDA">Edit Alpha</button>
                        </div>
                    </form> 
          <br>
          <!-- Tabel Data Peramalan -->
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Bulan Tahun</th>
                  <th>Penjualan</th>
                  <th>Forecasting</th>
                  <th>Absolute Error</th>
                  <th>Error^2</th>
                  <th>Error%</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1;?>
                @foreach ($dataAktual as $key => $aktual)
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $aktual->bln_thn }}</td>
                        <td>{{ $aktual->d_aktual }}</td>
                        <td>{{ $forecasting[$key] }}</td>
                        <td>{{ $error[$key] }}</td>
                        <td>{{ $errorKuadrat[$key] }}</td>
                        <td>{{ $errorPersen[$key] }}%</td>

                    <?php $no++?>
                </tr>
                @endforeach
                <!-- Tambahkan baris-baris data peramalan lainnya di sini -->
              </tbody>
            </table>
          </div>
          <div class="row mt-4">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-body">
                  <div class="row">
                    <div class="col-5 col-md-4">
                      {{-- <div class="icon-big text-center icon-warning">
                        <i class="nc-icon nc-globe text-warning"></i>
                      </div> --}}
                    </div>
                    <div class="col-7 col-md-8">
                      <div class="numbers">
                        <p class="card-category" style="color: black"><strong>Peramalan Bulan Berikutnya</strong></p>
                        <p class="card-title" style="color: indianred">{{ $forecasting[count($forecasting) - 1] }}</p>
                        <p></p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <hr />
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-body">
                  <div class="row">
                    <div class="col-5 col-md-4">
                      <div class="icon-big text-center icon-warning">
                        {{-- <i class="nc-icon nc-money-coins text-success"></i> --}}
                      </div>
                    </div>
                    <div class="col-7 col-md-8">
                      <div class="numbers">
                        <p class="card-category" style="color: black"><strong>MAE</strong></p>
                        <p class="card-title" style="color: indianred">{{ $mad }}</p>
                        <p></p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <hr />
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-body">
                  <div class="row">
                    <div class="col-5 col-md-4">
                      <div class="icon-big text-center icon-warning">
                        {{-- <i class="nc-icon nc-vector text-danger"></i> --}}
                      </div>
                    </div>
                    <div class="col-7 col-md-8">
                      <div class="numbers">
                        <p class="card-category" style="color: black"><strong>MSE</strong></p>
                        <p class="card-title" style="color: indianred">{{ $mse }}</p>
                        <p></p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <hr />
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-body">
                  <div class="row">
                    <div class="col-5 col-md-4">
                      <div class="icon-big text-center icon-warning">
                        {{-- <i class="nc-icon nc-favourite-28 text-primary"></i> --}}
                      </div>
                    </div>
                    <div class="col-7 col-md-8">
                      <div class="numbers">
                        <p class="card-category" style="color: black"><strong>MAPE</strong></p>
                        <p class="card-title" style="color: indianred">{{ $mape }}</p>
                        <p></p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 mt-3">
        <canvas id="forecastChart"></canvas>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        var ctx = document.getElementById('forecastChart').getContext('2d');
                        var chart = new Chart(ctx, {
                            type: 'line',
                            data: @json($chartData), // Pastikan variabel $chartData sudah ada dan terdefinisi
                            options: {
                                scales: {
                                    x: {
                                        title: {
                                            display: true,
                                            text: 'Bulan Tahun'
                                        }
                                    },
                                    y: {
                                        title: {
                                            display: true,
                                            text: 'Nilai'
                                        }
                                    }
                                }
                            }
                        });
                    </script>
      </div>
    </div>
  </div>
  @if(session()->has('success'))
  <script>alert('Alpha Berhasil diperbarui')</script>
@endif
@if(session()->has('error'))
<script>alert('Alpha Gagal diperbarui')</script>                  
@endif
@endsection