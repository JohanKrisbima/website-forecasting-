<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Alpha;

class TableController extends Controller
{
    //
    public function index(){
        $dataAktual = Penjualan::all();
        $alpha = Alpha::first();
    
        // Inisialisasi variabel-variabel perhitungan
        $forecasting = [];
        $error = [];
        $absoluteError = [];
        $errorKuadrat = [];
        $errorPersen = [];
    
        // Inisialisasi variabel untuk metrik MAD, MSE, dan MAPE
        $mad = 0;
        $mse = 0;
        $mape = 0;
    
        // Inisialisasi variabel chart data
        $bulanTahun = [];
        $chartData = [
            'labels' => $bulanTahun,
            'datasets' => [
                [
                    'label' => 'Data Aktual',
                    'backgroundColor' => 'rgba(0, 0, 255, 0.2)',
                    'borderColor' => 'blue',
                    'data' => $dataAktual->pluck('d_aktual'),
                ],
                [
                    'label' => 'Forecasting',
                    'backgroundColor' => 'rgba(255, 0, 0, 0.2)',
                    'borderColor' => 'red',
                    'data' => [],
                ],
            ],
        ];
    
        // Loop untuk menghitung peramalan, error, dan metrik lainnya
        foreach ($dataAktual as $key => $penjualan) {
            // Hitung peramalan (forecasting) dengan metode single exponential smoothing
            if ($key === 0) {
                $forecasting[$key] = $penjualan->d_aktual;
            } else {
                $forecasting[$key] = $alpha->n_alpha * $dataAktual[$key - 1]->d_aktual + (1 - $alpha->n_alpha) * $forecasting[$key - 1];
            }
    
            // Hitung error
            $error[$key] = $penjualan->d_aktual - $forecasting[$key];
    
            // Hitung absolute error
            $absoluteError[$key] = abs($error[$key]);
    
            // Hitung error kuadrat
            $errorKuadrat[$key] = pow($error[$key], 2);
    
            // Hitung error persen
            $errorPersen[$key] = ($error[$key] / $penjualan->d_aktual) * 100;
    
            // Hitung MAD
            // $mad += $absoluteError[$key];
    
            // // Hitung MSE
            // $mse += $errorKuadrat[$key];
    
            // // Hitung MAPE
            // $mape += abs($errorPersen[$key]);
           
            
    
            // Tambahkan bulan-tahun untuk chart
            $bulanTahun[] = $penjualan->bln_thn;
        }
    
        // Hitung rata-rata MAD, MSE, dan MAPE
        $mad = array_sum($absoluteError) / count($dataAktual);
        $mse = array_sum($errorKuadrat) / count($dataAktual);
        $mape = array_sum($errorPersen) / count($dataAktual);
    
        // Hitung peramalan (forecasting) untuk bulan berikutnya
        $lastKey = count($dataAktual) - 1;
        $forecastingNextMonth = $alpha->n_alpha * $dataAktual[$lastKey]->d_aktual + (1 - $alpha->n_alpha) * $forecasting[$lastKey];
        $forecasting[] = $forecastingNextMonth;
        // Update chart data dengan data peramalan
        $chartData['labels'] = $bulanTahun;
        $chartData['datasets'][1]['data'] = array_merge($forecasting, [$forecastingNextMonth]);
        $chartData['labels'][] = "Forecasting Bulan Berikutnya";
        $chartData['datasets'][1]['data'][] = $forecastingNextMonth;
        $active = 'data penjualan';
        return view('table.index', [
            'dataAktual' => $dataAktual,
            'forecasting' => $forecasting,
            'forecastingNextMonth' => $forecastingNextMonth,
            'error' => $error,
            'absoluteError' => $absoluteError,
            'errorKuadrat' => $errorKuadrat,
            'errorPersen' => $errorPersen,
            'mad' => $mad,
            'mse' => $mse,
            'mape' => $mape,
            'alpha' => $alpha,
            'chartData' => $chartData,
            'active' => 'forecasting']);
    }

    public function update(Request $request)
    {
        $request->validate([
            'n_alpha' => 'required|numeric',
        ]);

        $alphaValue = Alpha::firstOrFail();
        $alphaValue->update($request->only('n_alpha'));

        return redirect('/table')->with('success', 'Nilai Alpha berhasil diperbarui.');
    }
}
