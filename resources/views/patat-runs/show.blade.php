@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Patat run</div>

                    <div class="card-body">
                        <p>Deadline: {{ $patatRun->deadline->toDateTimeString() }} ({{ $patatRun->deadline->diffForHumans() }})</p>

                        @can('edit', \App\PatatRun::class)
                            <a href="{{ route('patat-runs.edit', $patatRun->id) }}" class="btn btn-secondary">Edit</a>
                        @endcan

                        @can('delete', \App\PatatRun::class)
                            <delete-button url="{{ route('patat-runs.destroy', $patatRun->id) }}"></delete-button>
                        @endcan

                        <a href="{{ route('home') }}" class="btn btn-primary">Go to dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection