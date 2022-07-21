@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">PAVADINIMAS</div>

                <div class="card-body">
                    <form method="POST" action="{{route('mechanic_store')}}">
                        Name: <input type="text" name="name" value="{{$name}}">
                        Surname: <input type="text" name="surname" value="{{$surname}}">
                        Photo: <input type="url" name="images" value="{{$images}}">
                        <select name="autoservice_id">
                            @foreach ($autoservices as $autoservice)
                            <option value="{{$autoservice->id}}">{{$autoservice->name}}</option>
                            @endforeach
                        </select>
                        @csrf
                        <button type="submit">REGISTER</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
