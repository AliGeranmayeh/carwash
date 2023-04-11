@extends('layouts.app')

@section('content')
<div class="container">
    @if ($error !== "")
    <div class="alert alert-danger" role="alert">
        <p>{{$error}}</p>
      </div>    
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dear {{__(Auth::user()->name)}} please choose your washing methods:</div>

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
                        
                        <input class="my-4" type="submit" name=submit value="Submit" id="checkBtn">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
