@extends('template')

@section('content')
  @include('navbar')

  <div class="container-fluid page-body-wrapper">
    <div class="main-panel px-lg-5">
      <div class="content-wrapper">
        <div class="page-header">
          <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
              <i class="mdi mdi-home"></i>
            </span> Dashboard
          </h3>
          <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">
                <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
              </li>
            </ul>
          </nav>
        </div>
        <div class="row">
          <div class="col-12 grid-margin">
            @if (session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
            @endif

            @if (session('error'))
              <div class="alert alert-danger">
                {{ session('error') }}
              </div>
            @endif

            <div class="card mt-2">
              <div class="card-body">
                <h4 class="card-title">Manage Projects</h4>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th> Project </th>
                        <th> Expired </th>
                        <th> Price </th>
                        <th> Status </th>
                        <th class="text-center"> Settings </th>
                        <th class="text-center"> Manage </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          Cloud Hosting VPS (<strong>Business Package</strong>)
                        </td>
                        <td> Feb 4, 2026 </td>
                        <td> IDR14.700.000,-/year </td>
                        <td>
                          <label class="badge badge-gradient-success">ACTIVE</label>
                        </td>
                        <td class="text-center">
                          <style>
                            /* Gaya untuk toggle */
                            .toggle-wrapper {
                              position: relative;
                              display: inline-block;
                              width: 50px;
                              height: 26px;
                              cursor: pointer;
                            }

                            /* Input checkbox (disembunyikan) */
                            .toggle-checkbox {
                              opacity: 0;
                              width: 0;
                              height: 0;
                            }

                            /* Slider toggle */
                            .toggle-slider {
                              position: absolute;
                              top: 0;
                              left: 0;
                              right: 0;
                              bottom: 0;
                              background-color: #ccc;
                              border-radius: 20px;
                              transition: background-color 0.3s;
                            }

                            /* Handle bulat */
                            .toggle-slider:before {
                              content: '';
                              position: absolute;
                              height: 20px;
                              width: 20px;
                              left: 3px;
                              bottom: 3px;
                              background-color: white;
                              border-radius: 50%;
                              transition: transform 0.3s;
                              box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
                            }

                            /* Jika checkbox aktif */
                            .toggle-checkbox:checked+.toggle-slider {
                              background-color: #4caf50;
                            }

                            .toggle-checkbox:checked+.toggle-slider:before {
                              transform: translateX(24px);
                            }
                          </style>
                          <form action="{{ route('toggleProjectStatus') }}" method="POST" id="toggle-form"
                            style="text-align: center;">
                            @csrf
                            <input type="hidden" name="is_active" id="is_active" value="{{ $isActive ? 1 : 0 }}">
                            <label class="toggle-wrapper">
                              <input type="checkbox" id="is_active_toggle" class="toggle-checkbox"
                                {{ $isActive ? 'checked' : '' }}
                                onchange="document.getElementById('is_active').value = this.checked ? 1 : 0; document.getElementById('toggle-form').submit();">
                              <span class="toggle-slider"></span>
                            </label>
                          </form>

                        </td>
                        <td class="text-center"><a href="{{ route('terminal') }}" class="btn btn-primary btn-sm">Access Terminal</a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
              <div class="card-body">
                <canvas id="serverUptimeChart" width="400" height="300"></canvas>
              </div>
            </div>
          </div>
          <div class="col-md-6 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
              <div class="card-body">
                <canvas id="resourceUsageChart" width="400" height="300"></canvas>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    // Server Uptime Chart
    const ctx1 = document.getElementById('serverUptimeChart').getContext('2d');
    const serverUptimeChart = new Chart(ctx1, {
      type: 'line',
      data: {
        labels: Array.from({
          length: 24
        }, (_, i) => `${i}:00`), // 24 Hours
        datasets: [{
          label: 'Uptime (%)',
          data: Array.from({
            length: 24
          }, () => Math.random() < 0.2 ? 99.5 : 100),
          borderColor: 'rgba(255,255,255,0.8)',
          backgroundColor: 'rgba(255,255,255,0.2)',
          tension: 0.4
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            display: true,
            position: 'top',
            labels: {
              color: 'white'
            }
          }
        },
        scales: {
          x: {
            ticks: {
              color: 'white'
            }
          },
          y: {
            reverse: false, // Membalik sumbu Y
            ticks: {
              color: 'white'
            },
            min: 50,
            max: 100 // Tetapkan rentang sesuai data
          }
        }
      }
    });


    // Resource Usage Chart
    const ctx2 = document.getElementById('resourceUsageChart').getContext('2d');
    const resourceUsageChart = new Chart(ctx2, {
      type: 'bar',
      data: {
        labels: ['CPU', 'Memory', 'Disk I/O'],
        datasets: [{
          label: 'Usage (%)',
          data: [65, 80, 70],
          backgroundColor: ['rgba(255,255,255,0.8)', 'rgba(255,255,255,0.6)', 'rgba(255,255,255,0.4)']
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            display: false
          }
        },
        scales: {
          x: {
            ticks: {
              color: 'white'
            }
          },
          y: {
            ticks: {
              color: 'white'
            },
            beginAtZero: true,
            max: 100
          }
        }
      }
    });
  </script>
@endsection
