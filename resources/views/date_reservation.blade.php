@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">  
            <div class="card-header">Dear {{__(Auth::user()->name)}} please choose your Date:</div>          
                <div class="card-body">
                    <form method="post" class="mb-2">
                        @csrf{{ csrf_field() }}
                        <select class="form-select" name="date" id="date">
                            <option selected>pick your date</option>
                            @for ($i = date("Y-m-d" , strtotime('now')) ; $i <= date("Y-m-d", strtotime("7 days")) ; $i++)
                                <option value="{{ $i }}">{{ $i }}  {{$desable_day["$i"]}}</option>
                            @endfor
                        </select>
                        <input class="my-4" type="submit" name=submit value="Submit" id="checkBtn">
                    </form>
                    <p>Nearest available time: {{$suggestion}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection