@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">New menu item</div>

                    <div class="card-body">
                        {!! form($form) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection