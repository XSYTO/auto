@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">PAVADINIMAS</div>
                @foreach ($services as $service)
                <div class="card-body">
                    <div>
                    {{$service->ServiceParent->name}} {{$service->name}} {{$service->price}}
                    </div>
                    @endforeach
                    @csrf
                    @method('put');
                    <button type="submit">EDIT</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
