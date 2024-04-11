@extends('layouts.index')
@section('navbar')
    @include('layouts.navbar')
@endsection

@section('page-title')
    @include('layouts.page-title')
@endsection

@section('content')
<div id="clients_data" data_url="{{route('functions.clients_data')}}"></div>

<div class="container clearfix">
    <button href="#" class="button button-border button-rounded button-fill button-aqua btn_add" get_url="{{Route('functions.clients_form')}}"><span><i class="icon-plus1"></i>New Client</span></button>
    <div class="table-responsive">
        <table id="clients_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Options</th>
                </tr>
            </thead>
        </table>
    </div>

</div>
@endsection

@section('scripts')
    @parent
    <script type="text/javascript" src="{{asset('js/clients.js')}}"></script>
@endsection