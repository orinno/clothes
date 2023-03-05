@extends('layouts.dashboard')

@section('title', 'Dashboard')

@push('css')
    <link rel="stylesheet" href="/package/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="/package/weathericons/css/weather-icons.min.css">
    <link rel="stylesheet" href="/package/weathericons/css/weather-icons-wind.min.css">
    <link rel="stylesheet" href="/package/summernote/dist/summernote-bs4.css">
@endpush

@section('content')
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-stats">
                    <div class="card-stats-title">Order Statistics {{ date('M') }}</div>
                    <div class="card-stats-items">
                        <div class="card-stats-item">
                            <div class="card-stats-item-count">{{ $status['BARU'] }}</div>
                            <div class="card-stats-item-label">Baru</div>
                        </div>
                        <div class="card-stats-item">
                            <div class="card-stats-item-count">{{ $status['DIPROSES'] }}</div>
                            <div class="card-stats-item-label">Proses</div>
                        </div>
                        <div class="card-stats-item">
                            <div class="card-stats-item-count">{{ $status['SELESAI'] }}</div>
                            <div class="card-stats-item-label">Completed</div>
                        </div>
                    </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-archive"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Orders</h4>
                    </div>
                    <div class="card-body">
                        {{ $status['BARU'] + $status['DIPROSES'] + $status['SELESAI'] }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Income Today</h4>
                        </div>
                        <div class="card-body">
                            Rp. {{ number_format($income_today, 0, ',', '.') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total has served</h4>
                        </div>
                        <div class="card-body">
                            {{ number_format($transaksi_all_count, 0, ',', '.') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Income Mohthly</h4>
                        </div>
                        <div class="card-body">
                            Rp. {{ number_format($income_month, 0, ',', '.') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-user-group"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Konsumen</h4>
                        </div>
                        <div class="card-body">
                            {{ number_format($konsumen_all, 0, ',', '.') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-8 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Statistics Income</h4>
                </div>
                <div class="card-body">
                    <canvas id="myChart" height="182"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Recent Activities</h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled list-unstyled-border">
                        <li class="media">
                            <img class="mr-3 rounded-circle" width="50" src="/img/avatar/avatar-1.png" alt="avatar">
                            <div class="media-body">
                                <div class="float-right text-primary">Now</div>
                                <div class="media-title">Farhan A Mujib</div>
                                <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel
                                    metus scelerisque ante sollicitudin.</span>
                            </div>
                        </li>
                        <li class="media">
                            <img class="mr-3 rounded-circle" width="50" src="/img/avatar/avatar-2.png" alt="avatar">
                            <div class="media-body">
                                <div class="float-right">12m</div>
                                <div class="media-title">Ujang Maman</div>
                                <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel
                                    metus scelerisque ante sollicitudin.</span>
                            </div>
                        </li>
                        <li class="media">
                            <img class="mr-3 rounded-circle" width="50" src="/img/avatar/avatar-3.png" alt="avatar">
                            <div class="media-body">
                                <div class="float-right">17m</div>
                                <div class="media-title">Rizal Fakhri</div>
                                <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel
                                    metus scelerisque ante sollicitudin.</span>
                            </div>
                        </li>
                        <li class="media">
                            <img class="mr-3 rounded-circle" width="50" src="/img/avatar/avatar-4.png"
                                alt="avatar">
                            <div class="media-body">
                                <div class="float-right">21m</div>
                                <div class="media-title">Alfa Zulkarnain</div>
                                <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel
                                    metus scelerisque ante sollicitudin.</span>
                            </div>
                        </li>
                    </ul>
                    <div class="text-center pt-1 pb-1">
                        <a href="#" class="btn btn-primary btn-lg btn-round">
                            View All
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@php
    function _tanggal($tanggal)
    {
        $bulan = ['Januari', 'Ferbuari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        return $bulan[(int) $tanggal];
    }
@endphp

@push('js')
    <script src="/package/simpleweather/jquery.simpleWeather.min.js"></script>
    <script src="/package/chart.js/dist/Chart.min.js"></script>
    <script src="/package/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="/package/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="/package/summernote/dist/summernote-bs4.js"></script>
    <script src="/package/chocolat/dist/js/jquery.chocolat.min.js"></script>

    <script>
        $(document).ready(function() {

            var statistics_chart = document.getElementById("myChart").getContext('2d');

            if (statistics_chart != null) {
                var myChart = new Chart(statistics_chart, {
                    type: 'line',
                    data: {
                        labels: [
                            <?php foreach ($chart_data as $value) {
                                echo '"' . _tanggal($value->month) . '",';
                            } ?>
                        ],
                        datasets: [{
                            label: 'Statistics',
                            data: [
                                <?php foreach ($chart_data as $value) {
                                    echo $value->total . ', ';
                                } ?>
                            ],
                            borderWidth: 5,
                            borderColor: '#6777ef',
                            backgroundColor: 'transparent',
                            pointBackgroundColor: '#fff',
                            pointBorderColor: '#6777ef',
                            pointRadius: 4
                        }]
                    },
                    options: {
                        legend: {
                            display: false
                        },
                        scales: {
                            yAxes: [{
                                gridLines: {
                                    display: false,
                                    drawBorder: false,
                                }

                            }],
                            xAxes: [{
                                gridLines: {
                                    color: '#fbfbfb',
                                    lineWidth: 2
                                }
                            }]
                        },
                    }
                });
            }
        });
    </script>
@endpush
