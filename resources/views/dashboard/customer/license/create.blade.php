@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.customer.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="Dashboard" route="dashboard.admin.index" />
    <x-breadcrumb-item title="license" route="dashboard.customer.license.create" />
@endsection
@section('content')
<x-session-alerts></x-session-alerts>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    @if(Session::has('info'))
    <div class="row">
        <div class="col-md-12">
            <p class="alert alert-info">{{ Session::get('info') }}</p>
        </div>
    </div>
@endif
    <div class="col-md-12">
        <x-card type="info">
            <x-card-header>License</x-card-header>
        <form style="padding:10px;" action="{{ route('dashboard.customer.license.create') }}" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">
            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control" required  name="site"  placeholder="site">   
            <div class="form-group">
                <label>End date:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                  </div>
                  <input id="date" name="end_date" type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="" required>
                </div>
                <!-- /.input group -->
            </div>
            <input type="text" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control" required name="price"  placeholder="price">
            <select name="status" style="padding:10px; margin: 10px 0px 16px 0px; height: 40px; border-radius: 7px; font-size: 16px;"class="form-control">
                <option value="active">active<option>
                <option value="deactive">deactive<option>
            </select>
            {{ csrf_field() }}
             <x-card-footer>
                <button type="submit" style=" margin: 20px 0px; height: 42px;width: 100%;font-size: 20px;"  class="btn btn-primary">Send</button>
             </x-card-footer>
            </form>
    </x-card>
    <script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('description', {
        // Load the Farsi interface.
            language: 'fa'
        });
        CKFinder.setupCKEditor(null, 'ckfinder/ckfinder.js');
    </script>
    </div>
    @endsection