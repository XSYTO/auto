@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">PAVADINIMAS</div>

                <div class="card-body">
                    <form method="POST" action="{{route('mechanic_store')}}" enctype="multipart/form-data" >
                        Dish Name: <input type="text" name="name" value="{{$name}}">
                        About Dish: <input type="text" name="about">
                        Photo: <input type="file" name="images" value="{{$images}}">
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
