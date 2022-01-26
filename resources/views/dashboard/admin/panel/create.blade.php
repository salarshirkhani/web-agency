@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
<x-breadcrumb-item title="Dashboard" route="dashboard.admin.index" />
<x-breadcrumb-item title="Add Page" route="dashboard.admin.pages.create" />
@endsection
@section('content')
@if(Session::has('info'))
    <div class="row">
        <div class="col-md-12">
            <p class="alert alert-info">{{ Session::get('info') }}</p>
        </div>
    </div>
@endif
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <div class="col-md-12">
        <x-card type="info">
            <x-card-header>Pages</x-card-header>
        <form style="padding:10px;" action="{{ route('dashboard.admin.panel.create') }}" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">
            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control" required name="site"  placeholder="site">
            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control" required name="name"  placeholder="name">            
            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control" required name="email"  placeholder="email">
            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control" required name="phone"  placeholder="phone">
            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control" required name="percent"  placeholder="percent">      
            <select name="status" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control">
                <option value="active">active<option>
                <option value="deactive">deactive<option>
            </select>
            <select name="user" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control">
                @foreach ($users as $item)
                     <option value="{{$item->id}}">{{$item->name}}<option> 
                @endforeach
            </select>
            {{ csrf_field() }}
             <x-card-footer>
                <button type="submit" style=" margin: 20px 0px; height: 42px;width: 100%;font-size: 20px;"  class="btn btn-primary">Send</button>
             </x-card-footer>
            </form>
    </x-card>
    </div>
    @endsection