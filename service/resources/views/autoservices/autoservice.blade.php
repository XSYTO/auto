@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($autoservices as $autoservice)

            <div class="card">
                <div class="card-header">{{$autoservice->name}}</div>

                <div class="card-body">
                    {{-- @if(Auth::user()->role < 4)
                    @foreach ($autoservices as $autoservice)
                    <a href="{{route('service_index', $service)}}">{{$autoservice->name}}</a>
                    <br>
                    @endforeach
                    @endif --}}
                    {{-- <a href="{{route('autoservice_edit', $autoservice)}}">{{$autoservice->name}}</a> --}}

                    Mechanic: <select>
                        @foreach($autoservice->MechanicKid as $mechanic)
                        <option value="{{$mechanic->id}}">{{$mechanic->name}} {{$mechanic->surname}}</option>
                        @endforeach
                    </select>
                        {{-- <img alt="{{$mechanic->id}}" style="width:100px; height:200px" src="{{$mechanic->images}}" /> --}}
                    <br>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
