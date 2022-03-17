<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\WeatherReportRequest;
use App\WeatherReport;

class WeatherReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $id = auth()->user()->id;
        $weather_data = WeatherReport::select("*")
                                        ->where("user_id", "=", $id)
                                        ->latest()->first();
        return view('weather_report.index',compact('weather_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WeatherReportRequest $request)
    {
        $city =  $request->city;
        $url =  Http::get("https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=407221231c8d5be80681be84ef98cf14");
        if($url['cod']==200) {
            $weather_report_detail = new WeatherReport;
            $weather_report_detail->user_id = auth()->user()->id;
            $weather_report_detail->city_name = $url['name'];
            $weather_report_detail->country_name = $url['sys']['country'];
            $weather_report_detail->feels_like = $url['main']['feels_like'];
            $weather_report_detail->temp = $url['main']['temp'];
            $weather_report_detail->temp_min = $url['main']['temp_min'];
            $weather_report_detail->temp_max = $url['main']['temp_max'];
            $weather_report_detail->save();
            return redirect()->back();
        }
        else{
            return view('weather_report.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
