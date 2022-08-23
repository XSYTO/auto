@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">Restaurants</div>

                <div class="card-body">
                    {{-- @if(Auth::user()->role < 4)
                    @foreach ($Restaurants as $restaurant)
                    <a href="{{route('service_index', $service)}}">{{$autoservice->name}}</a>
                    <br>
                    @endforeach
                    @endif --}}
                    {{-- <a href="{{route('autoservice_edit', $autoservice)}}">{{$autoservice->name}}</a> --}}
                    <?php $count = 0; ?>
                    @foreach ($autoservices as $autoservice)
                    <div>{{$autoservice->name}}</div>
                    <br>
                    <button type="button" id="{{$autoservice->id}}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $count; ?>">
                        Choose Your Dish
                    </button>
                    @if(Auth::user()->role > 4)
                    <a href="{{route('autoservice_edit', $autoservice)}}">Edit</a>
                    @endif
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal<?php echo $count; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="{{$autoservice->id}}">{{$autoservice->name}}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <select>
                                        @foreach($autoservice->MechanicKid as $mechanic)

                                        <option value="{{$mechanic->id}}">{{$mechanic->name}} {{$mechanic->surname}}</option>
                                        @endforeach

                                    </select>
                                    <select>
                                        @foreach($autoservice->ServiceKid as $service)

                                        <option value="{{$service->id}}">{{$service->name}} {{$service->price}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                    {{-- Mechanic: <select>
                        @foreach($autoservice->MechanicKid as $mechanic)
                        <option value="{{$mechanic->id}}">{{$mechanic->name}} {{$mechanic->surname}}</option>
                    @endforeach
                    </select> --}}
                    {{-- <img alt="{{$mechanic->id}}" style="width:100px; height:200px" src="{{$mechanic->images}}" /> --}}
                    <?php $count++ ; ?>
                    @endforeach

                    <br>
                </div>
            </div>
        </div>
    </div>
    @endsection
