@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Menu

                        @can('edit', \App\MenuItem::class)
                            <a href="{{ route('menu-items.create') }}" class="btn btn-primary btn-sm float-right">New</a>
                        @endcan
                    </div>

                    <div class="card-body">
                        <ul class="list-group">
                            @forelse($menu as $menuItem)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $menuItem->name }}
                                    <span class="badge badge-primary badge-pill">&euro; {{ $menuItem->price }}</span>

                                    @can('edit', \App\MenuItem::class)
                                        <a href="{{ route('menu-items.edit', $menuItem->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    @endcan
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