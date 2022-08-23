@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Restaurant Edit</div>

                <div class="card-body">
                    <form method="POST" action="{{route('autoservice_update', $autoservice)}}">
                        Company Name: <input type="text" name="name" value="{{$autoservice->name}}">
                        Address: <input type="text" name="address" value="{{$autoservice->address}}">
                        Phone: <input type="text" name="phone" value="{{$autoservice->phone}}">
                        @csrf
                        @method('put');
                        <button type="submit">EDIT</button>
                    </form>

                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('autoservice_update', $autoservice)}}">
                        <select>
                        @foreach($autoservice->MechanicKid as $mechanic)
                            <option selected vlaue="{{$mechanic->id}}">{{$mechanic->name}} {{$mechanic->surname}}</option>
                        
                        Photo: <input type="file" name="photo" value="{{$mechanic->image}}">
                        </select>
                        @csrf
                        @method('put');
                        <button type="submit">EDIT</button>
                    </form>
                    @endforeach

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
