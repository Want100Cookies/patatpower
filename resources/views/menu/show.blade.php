@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Menu item</div>

                    <div class="card-body">
                        <p>Name: {{ $menuItem->name }}</p>
                        <p>Price: &euro; {{ $menuItem->price }}</p>
                        @can('edit', \App\MenuItem::class)
                            <a href="{{ route('menu-items.edit', $menuItem->id) }}" class="btn btn-secondary">Edit</a>
                            <delete-button url="{{ route('menu-items.destroy', $menuItem->id) }}"></delete-button>
                        @endcan
                        <a href="{{ route('menu-items.index') }}" class="btn btn-primary">Go to menu</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection