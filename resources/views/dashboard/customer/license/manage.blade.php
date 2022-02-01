@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.customer.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="Dashboard" route="dashboard.admin.index" />
    <x-breadcrumb-item title="Manage License" route="dashboard.customer.license.manage" />
@endsection
@section('content')
    @if(Session::has('info'))
    <div class="row">
        <div class="col-md-12">
            <p class="alert alert-info">{{ Session::get('info') }}</p>
        </div>
    </div>
@endif
    <div class="col-md-12">
        <x-card type="info">
            <x-card-header>Manage License</x-card-header>
                <x-card-body>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>site</th>
                                <th>token</th>
                                <th>status</th>
                                <th>paid</th>
                            </tr>
                            </thead>
                                <tbody>
                             @foreach($posts as $item)
                                <tr>
                                    <td>{{ $item->site }}</td>
                                    <td>{{ $item->token }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->paid }}</td>
                                </tr>
                             @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>site</th>
                                    <th>token</th>
                                    <th>status</th>
                                    <th>paid</th>
                                </tr>
                                </tfoot>
                        </table>
                    </div>
                    </x-card-body>
                <x-card-footer>
                    <a href="{{route('dashboard.customer.license.create')}}" class="btn btn-success">Add new License</a>
                </x-card-footer>      
        </x-card>
    </div>
    @endsection