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
                        <th> Settings </th>
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
                        <td>
                          <form action="{{ route('toggleProjectStatus') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-warning">Switch (Activate Site)</button>
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
