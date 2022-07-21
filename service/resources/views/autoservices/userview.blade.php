@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">PAVADINIMAS</div>

                <div class="card-body">
                    <h3>{{$autoservice->name}}</h3>
                    <h3>{{$autoservice->phone}}</h3>
                    <h3>{{$autoservice->address}}</h3>
                    @foreach ($mechanics as $mechanic)
                        <div>
                        {{$mechanic->name}} {{$mechanic->surname}}
                        <img style="width:250px height:350px" src="{{$mechanic->images}}"/>
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
