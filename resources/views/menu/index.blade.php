@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Menu

                        @can('edit', \App\MenuItem::class)
                            <a href="{{ route('menu-items.create') }}" class="btn btn-primary btn-sm float-right ml-3">New</a>

                            @if (\Request::has('trashed'))
                                <a href="{{ route('menu-items.index') }}" class="btn btn-outline-info btn-sm float-right">Non-trashed</a>
                            @else
                                <a href="{{ route('menu-items.index') }}?trashed" class="btn btn-outline-info btn-sm float-right">Trashed</a>
                            @endif
                        @endcan
                    </div>

                    <div class="card-body">
                        <ul class="list-group">
                            @forelse($menu as $menuItem)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>{{ $menuItem->name }}</span>

                                    <span>
                                        <span class="badge badge-primary badge-pill">&euro; {{ $menuItem->price }}</span>

                                        @if (\Request::has('trashed'))
                                            <delete-button type="success" url="{{ route('menu-items.destroy', $menuItem->id) }}">Restore</delete-button>
                                        @else
                                            <a href="{{ route('menu-items.show', $menuItem->id) }}" class="btn btn-primary btn-sm">Show</a>
                                        @endif
                                    </span>
                                </li>
                            @empty
                                <li class="list-group-item">There are no menu items yet...</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection