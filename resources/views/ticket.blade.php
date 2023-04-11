@extends('layouts.app')

@section('content')
@if ($error != '')
    <div class="alert alert-danger" role="alert">
        <strong>{{$error}}</strong>
    </div>
@endif
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">            
                <div class="card-body">
                    <p>Name: {{$user_name}}</p>
                    <p>Phone Number: {{$user_number}}</p>
                    <p>Tracking Code: {{$tracking_code}}</p>
                    <p>Reserved Date: {{$date}}</p>
                    <p>Reserved Time: {{$time}}</p>
                    <form method="post" class="mb-2">
                        @csrf{{ csrf_field() }}
                        <input class="my-2" type="submit" name=delete value="Delete" id="delete">
                        <button class="mx-3" style="border: 1px black solid"><a style="text-decoration: none;color: black;" href="/edit_ticket">Edit</a></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection