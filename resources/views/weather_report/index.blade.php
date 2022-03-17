@extends('layouts.app')
@section('title','WeatherApp')
@section('content')]
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-md-8 col-lg-6 col-xl-4">
              <h3 class="mb-4 pb-2 fw-normal">Check the weather forecast</h3>
            <form action="{{route('store')}}" method="post"> 
              @csrf
              <div class="input-group rounded mb-3">
                <input type="text" name="city" class="form-control rounded" placeholder="City" aria-label="city"
                  aria-describedby="search-addon" />
                <button type="submit" class="input-group-text border-0 fw-bold"> Check!</button>
              </div>
              <div>
                  @if($errors->has('city'))
                      <span style="color:red" class="input-group-text border-0 fw-bold">
                          {{ $errors->first('city') }}
                      </span>
                  @endif
              </div>
            </form>
            @if(!empty($weather_data))
              <div class="card shadow-0 border">
                <div class="card-body p-4">
                  <h4 class="mb-1 sfw-normal">{{$weather_data->city_name}}, {{$weather_data->country_name}}</h4>
                  <p class="mb-2">Current temperature: <strong>{{ $weather_data->temp}}°C</strong></p>
                  <p>Feels like: <strong>{{$weather_data->feels_like}}°C</strong></p>
                  <p>Max: <strong>{{$weather_data->temp_max}}°C</strong>, Min: <strong>{{$weather_data->temp_min}}°C</strong></p>
                  <div class="d-flex flex-row align-items-center">
                  </div>
                </div>
              </div>
            @else
              <div class="card shadow-0 border">
                <div class="card-body p-4">
                  <h4 class="mb-1 sfw-normal">No Record</h4>
                </div>
              </div>
            @endif
            </div>
          </div>
        </div>
@endsection
