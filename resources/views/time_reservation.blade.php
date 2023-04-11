@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dear {{__(Auth::user()->name)}} please choose your washing time:</div>
            <div class="card-body">
                <form method="post" class="mb-2">
                    @csrf{{ csrf_field() }}
                    
                    <select class="form-select" name="time" id="time">
                        <option selected>pick your time</option>  
                        @for ($i = 9 ; $i <= 20; $i++ )
                            @php
                                $start = $i;
                                $end = $start+1;
                            @endphp
                            <option value = "{{$start}}-{{$end}}" {{$active_inputs["$start-$end"]}}>{{$start}}-{{$end}}</option>
                        @endfor     
                    </select>
                    <input class="mb-2" type="submit" name=submit value="Submit" id="checkBtn">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection