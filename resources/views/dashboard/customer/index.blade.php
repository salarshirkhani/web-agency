@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.customer.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="Dashboard" route="dashboard.customer.index" />
@endsection
@section('content')
    <div class="container">
        <div class="row">
        <x-session-alerts></x-session-alerts>
        <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$posts->count()}}</h3>
  
                <p>New Licenses</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$income}}<sup style="font-size: 20px">$</sup></h3>
  
                <p>Income</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection
