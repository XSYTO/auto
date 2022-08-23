<?php

namespace App\Http\Controllers;

use App\Models\Autoservice;
use App\Models\Mechanic;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class AutoserviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autoservices = Autoservice::all();

        return view('/autoservices/autoservice' , ['autoservices' => $autoservices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faker = Faker::create('lt_LT');

        $phone = '+370' . $faker->numberBetween($min = 60000000, $max = 69999999);
        $address = $faker->address;
        $name = $faker->company;
        
        return view('/autoservices/create')->with('phone', $phone)->with('address', $address)->with('name', $name);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'address' => 'required|string|max:150',
            'phone' => 'required|max:12',
        ]);

        $autoservice = new Autoservice;
        $autoservice->name = $request->get('name');
        $autoservice->address = $request->get('address');
        $autoservice->phone = $request->get('phone');

        $autoservice->save();
        return redirect()->route('autoservice_index');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Autoservice  $autoservice
     * @return \Illuminate\Http\Response
     */
    public function show(Autoservice $autoservice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Autoservice  $autoservice
     * @return \Illuminate\Http\Response
     */
    public function edit(Autoservice $autoservice)
    {

        return view('autoservices.edit', ['autoservice' => $autoservice]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Autoservice  $autoservice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Autoservice $autoservice, Mechanic $mechanic)// , Service $service
    {
        $autoservice->name = $request->name;
        $autoservice->address = $request->address;
        $autoservice->phone = $request->phone;
        //mechanic
        $mechanic->name = $request->mechanic_name;
        $mechanic->surname = $request->mechanic_surname;
        $mechanic->surname = $request->mechanic_surname;
        $mechanic->image = $request->mechanic_image;
        // service
        // $service->name = $request->service_name;
        // $service->price = $request->service_price;
        // $service->duration = $request->service_duration;
        $autoservice->save();
        return redirect()->route('autoservice_index');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Autoservice  $autoservice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Autoservice $autoservice)
    {
        if($autoservice->autoserviceMechanics->count()){
            $message = "<span style='color:red'>Hey !!STOP!! we have some workers over here!!!</span>";
            return view('edit', ['autoservice' => $autoservice])->with('message' , $message);
        }
        $autoservice->delete();
        return redirect()->route('autoservice.index');
    }
    
}
