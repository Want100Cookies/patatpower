@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-header">Active patat runs</div>

                <div class="card-body">
                    <ul class="list-group">
                        @forelse($activePatatRuns as $patatRun)
                            <li class="list-group-item">
                                {{ $patatRun->owner->name }} | {{ $patatRun->deadline }}
                            </li>
                        @empty
                            <li class="list-group-item">
                                No patat runs are active
                            </li>
                        @endforelse
                    </ul>

                    <a href="{{ route('patat-runs.index') }}" class="btn btn-primary mt-3">View all</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mn-3">
                <div class="card-header">Menu</div>

                <div class="card-body">
                    <ul class="list-group">
                        @forelse($menu as $menuItem)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $menuItem->name }}
                                <span class="badge badge-primary badge-pill">&euro; {{ $menuItem->price }}</span>
                            </li>
                        @empty
                            <li class="list-group-item">There are no menu items yet...</li>
                        @endforelse
                    </ul>

                    <a href="{{ route('menu-items.index') }}" class="btn btn-primary mt-3">View whole menu</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
