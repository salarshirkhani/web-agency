@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
<x-breadcrumb-item title="Dashboard" route="dashboard.admin.index" />
<x-breadcrumb-item title="Manage Panels" route="dashboard.admin.panel.manage" />
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
            <x-card-header>Panels</x-card-header>
                <x-card-body>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>site</th>
                                <th>name</th>
                                <th>user</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                                <tbody>
                             @foreach($posts as $item)
                                <tr>
                                    <td>{{ $item->site }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>
                                    <a href="{{route('dashboard.admin.panel.deletepanel',['id'=>$item->id])}}" class="delete_post" ><i class="fa fa-fw fa-eraser"></i></a>
                                    </td>
                                    <td>
                                    <a href="{{route('dashboard.admin.panel.updatepanel',['id'=>$item->id])}}" class="edit_post" target="_blank"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                             @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>site</th>
                                    <th>name</th>
                                    <th>user</th>
                                    <th>Delete</th>
                                    <th>Edit</th>
                                </tr>
                                </tfoot>
                        </table>
                    </div>
                    </x-card-body>
                <x-card-footer>
                    <a href="{{route('dashboard.admin.panel.create')}}" class="btn btn-success">Add new Panel</a>
                </x-card-footer>
        </x-card>
    </div>
    @endsection
