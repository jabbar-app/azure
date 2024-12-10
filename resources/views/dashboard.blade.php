@extends('template')

@section('content')
  @include('navbar')

  <div class="container-fluid page-body-wrapper">
    <div class="main-panel">
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
                        <th> Status </th>
                        <th class="text-center"> Settings </th>
                        <th> Price </th>
                        <th> Manage </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          Cloud Hosting VPS (<strong>Business Package</strong>)
                        </td>
                        <td> Feb 4, 2026 </td>
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
                        <td> IDR14.700.000,-/year </td>
                        <td><a href="{{ route('terminal') }}" class="btn btn-primary btn-sm">Access Terminal</a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
              <div class="card-body">
                <img src="../../assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                {{-- Random Chart 1 --}}
              </div>
            </div>
          </div>
          <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
              <div class="card-body">
                <img src="../../assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                {{-- Random Chart 1 --}}
              </div>
            </div>
          </div>
          <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Traffic Sources</h4>
                <div class="doughnutjs-wrapper d-flex justify-content-center">
                  <canvas id="traffic-chart"></canvas>
                </div>
                {{-- Random Chart 3 --}}
                <div id="traffic-chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
