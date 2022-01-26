@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="Dashboard" route="dashboard.admin.index" />
    <x-breadcrumb-item title="Manage License" route="dashboard.admin.license.manage" />
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
                                <th>delete</th>                               
                                <th>edit</th>
                            </tr>
                            </thead>
                                <tbody>
                             @foreach($posts as $item)
                                <tr>
                                    <td>{{ $item->site }}</td>
                                    <td>{{ $item->token }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->paid }}</td>
                                    <td>
                                    <a href="{{route('dashboard.admin.product.deleteproduct',['id'=>$item->id])}}" class="delete_post" ><i class="fa fa-fw fa-eraser"></i></a>                 
                                    </td>
                                    <td>
                                    <a href="{{route('dashboard.admin.product.updateproduct',['id'=>$item->id])}}" class="edit_post" target="_blank"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                             @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>site</th>
                                    <th>token</th>
                                    <th>status</th>
                                    <th>paid</th>
                                    <th>delete</th>                               
                                    <th>edit</th>
                                </tr>
                                </tfoot>
                        </table>
                    </div>
                    </x-card-body>
                <x-card-footer>
                    <a href="{{route('dashboard.admin.license.create')}}" class="btn btn-success">Add new product</a>
                </x-card-footer>      
        </x-card>
    </div>
    @endsection