@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">PAVADINIMAS</div>

                <div class="card-body">
                    <form method="POST" action="{{route('autoservice_update', $autoservice)}}">
                        Company Name: <input type="text" name="name" value="{{$autoservice->name}}">
                        Address: <input type="text" name="address" value="{{$autoservice->address}}">
                        Phone: <input type="text" name="phone" value="{{$autoservice->phone}}">
                        {{-- Worker: <input type="text" name="mechanic_name" value="{{$mechanic->name}}"> --}}
                        @csrf
                        @method('put');
                        <button type="submit">EDIT</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">PAVADINIMAS</div>
                 @foreach ($autoservices->autoserviceMechanics as $autoservice->autoserviceMechanic)
                <div class="card-body">
                    <form method="POST" action="{{route('mechanic_update', $mechanic)}}">
                        Worker: <input type="text" name="name" value="{{$autoservice->autoserviceMechanics->name}}">
                        Address: <input type="text" name="address" value="{{$autoservice->autoserviceMechanics->surname}}">
                        New Photo: <input type="url" name="images">
                        <img style="width:250px; height:350px" src="{{$autoservice->autoserviceMechanics->images}}" />
                        @csrf
                        @method('put');
                        <button type="submit">EDIT</button>
                    </form>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection --}}
