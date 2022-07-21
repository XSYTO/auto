@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">PAVADINIMAS</div>

                <div class="card-body">
                    <form method="POST" action="{{route('autoservice_store')}}">
                        Company Name: <input type="text" name="name" value="{{$name}}">
                        Address: <input type="text" name="address" value="{{$address}}">
                        Phone: <input type="text" name="phone" value="{{$phone}}">
                        {{-- <select name="author_id">
                            @foreach ($authors as $author)
                            <option value="{{$author->id}}">{{$author->name}} {{$author->surname}}</option>
                            @endforeach
                        </select> --}}
                        @csrf
                        <button type="submit">REGISTER</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
