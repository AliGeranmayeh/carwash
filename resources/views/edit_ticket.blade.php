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
                    <form action="" method="post">
                        @csrf{{ csrf_field() }}
                        <div class="form-check">
                            <input class="form-check-input"name=car_body type="checkbox" value="true" id="check">
                            <label class="form-check-label" for="car_body">
                              Outside Washing ---> 15 Minutes , 25 Toman
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name=interior_leaning type="checkbox" value="true" id="check">
                            <label class="form-check-label" for="interior_leaning">
                                Interior Cleaning ---> 20 Minutes , 30 Toman
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name=zero_washing type="checkbox" value="true" id="check">
                            <label class="form-check-label" for="zero_washing">
                                Zero Washing ---> 60 Minutes , 80 Toman
                            </label>
                        </div>
                        
                        <input type="submit" name=submit value="Submit" id="checkBtn">
                    </form>
                </div>
            </div>
            <div class="card">            
                <div class="card-body">
                    <form method="post" class="mb-2">
                        @csrf{{ csrf_field() }}
                        <select class="form-select" name="date" id="date">
                            <option selected>pick your date</option>
                            @for ($i = date("Y-m-d" , strtotime('now')) ; $i <= date("Y-m-d", strtotime("7 days")) ; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                        <input class="mb-2" type="submit" name=submit value="Submit" id="checkBtn">
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form method="post" class="mb-2">
                        @csrf{{ csrf_field() }}
                        
                        <select class="form-select" name="time" id="time">
                            <option selected>pick your time</option>  
                            @for ($i = 9 ; $i <= 20; $i ++ )
                                <option value = "{{$i}}-{{$i+1}}">{{$i}}-{{$i+1}}</option>
                            @endfor     
                        </select>
                        <input class="mb-2" type="submit" name=submit value="Submit" id="checkBtn">
                    </form>
                </div>
            </div>
                
            </div>
        </div>
    </div>
</div>
@endsection