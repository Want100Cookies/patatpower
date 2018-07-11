@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header">
                        Active patat runs
                        <a href="{{ route('patat-runs.create') }}" class="btn btn-primary btn-sm float-right ml-3">New</a>
                    </div>

                    <div class="card-body">
                        <ul class="list-group">
                            @forelse($activePatatRuns as $patatRun)
                                <li class="list-group-item">
                                    {{ $patatRun->owner->name }} | {{ $patatRun->deadline }}
                                </li>
                            @empty
                                <li class="list-group-item">
                                    No patat runs are active, create one now
                                </li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Past patat runs</div>

                    <div class="card-body">
                        <ul class="list-group">
                            @forelse($pastPatatRuns as $patatRun)
                                <li class="list-group-item">
                                    {{ $patatRun->owner->name }} | {{ $patatRun->deadline }}
                                </li>
                            @empty
                                <li class="list-group-item">
                                    No patat runs have ever been created...
                                </li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection