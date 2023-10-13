@extends('layouts.main')
@section('main')
<div class="content">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-body">
            <div class="row">
              <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                  <i class="nc-icon nc-globe text-warning"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">Peramalan Bulan Berikutnya</p>
                  <p class="card-title">{{ $forecasting[count($forecasting) - 1] }}</p>
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
                  <i class="nc-icon nc-money-coins text-success"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">MAE</p>
                  <p class="card-title">{{ $mad }}</p>
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
                  <i class="nc-icon nc-vector text-danger"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">MSE</p>
                  <p class="card-title">{{ $mse }}</p>
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
                  <i class="nc-icon nc-favourite-28 text-primary"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">MAPE</p>
                  <p class="card-title">{{ $mape }}</p>
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
@endsection