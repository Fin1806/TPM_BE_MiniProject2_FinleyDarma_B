<?php

namespace App\Http\Controllers;

use App\Models\car;
use App\Models\Price;
use Illuminate\Http\Request;

class carController extends Controller
{
    public function welcome(){
        $cars = car::all();
        return view('welcome', compact('cars'));
    }
    public function store(Request $request){

        $request->validate([
            'Cars'=> 'required|min:3',
            'Brand'=> 'required|max:15',
            'Car_Type'=> 'required|min:3',
            'Fuel_Type'=> 'required|min:5',
            'image'=> 'required|mimes:png,jpg',
        ]);

        $filePath = public_path('storage/images');
        $file = $request->file('image');
        $fileName = $request->Cars .'-'. $request->Brand .'-'. $file->getClientOriginalName();
        $file ->move($filePath, $fileName);

        car::create([
            // nama atribut => $request -> nama inputan`
            'Cars' => $request -> Cars,
            'Brand' => $request -> Brand,
            'Car_Type' => $request -> Car_Type,
            'Fuel_Type' => $request -> Fuel_Type,
            'image' => $fileName,
            'price_id' => $request -> price_num,
        ]);
        session()->flash('success',$request->Cars . ' has been added!');
        return redirect(route('welcome'));
    }
    public function createCars(){
    $prices = price::all();
    return view('createCars', compact('prices'));

    }

    public function editCars($id){
        $prices = price::all();

        $car = Car::findOrFail($id);
        return view('editCars', compact('car','prices'));
    }


    public function updateCar($id, Request $request){
        $request->validate([
            'Cars'=> 'required|min:3',
            'Brand'=> 'required|max:15',
            'Car_Type'=> 'required|min:3',
            'Fuel_Type'=> 'required|min:5',
            'image'=> 'required|mimes:png,jpg',
        ]);

        $car = Car::findOrFail($id);

        $filePath = public_path('storage/images');
        $file = $request->file('image');
        $fileName = $request->Cars .'-'. $request->Brand .'-'. $file->getClientOriginalName();
        $file ->move($filePath, $fileName);

        $car->update([
            'Cars' => $request -> Cars,
            'Brand' => $request -> Brand,
            'Car_Type' => $request -> Car_Type,
            'Fuel_Type' => $request -> Fuel_Type,
            'image'=> $fileName,
            'price_id'=> $request -> price_num,
        ]);

        session()->flash('success',$request->Cars . ' Data has been Edited!');
         return redirect(route('welcome'));
    }

    public function deleteCar($id){
        Car::destroy($id);
        session()->flash('success','Data has been deleted!');
        return redirect(route('welcome'));
    }
}
