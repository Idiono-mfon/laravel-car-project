<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateValidationRequest;
use App\Models\Car;
use App\Models\Product;
use App\Rules\Uppercase;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        // $cars = [];
        $cars = Car::all();

        // Converting collection to array
        //$cars = Car::all()->toArray();


        // Converting collection to a JSON str
        //$cars = Car::all()->toJson();

        // To convert from json to object

        // json_decode($cars); //Convert Json str to Object

        // echo ($cars);

        // die();

        // $cars = Car::where('name', 'Audi')->get();

        // $cars = Car::where('name', 'Audi')->firstOrFail();

        // $cars = Car::where('name', 'Audi')->findOrFail();

        //print_r(Car::where('name', 'Audi')->count());
        // print_r(Car::all()->count());

        // dd(Car::sum('founded'));
        // dd(Car::avg('founded'));

        // To chunk

        // $all = [];

        // $cars = Car::chunk(2, function ($cars) {
        //     foreach ($cars as $car) {
        //         $all[] = $car;
        //     }
        // });

        return view('cars.index', ['cars' => $cars]);
        //return view('cars.index', ['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateValidationRequest $request)
    {

        // Handle Validation
        $request->validated();

        // dd($result);

        // Generate an image name
        $newImageName = time() . '-' . strtolower($request->name) . '.' . strtolower($request->image->extension());

        // Move the image into the require folder
        // in my this case, public/images
        $request->image->move(public_path('images'), $newImageName);

        // $request->validated();
        //dd($request->all());

        // dd($validated);

        //Implement Validation
        // $request->validate([
        //     "name" => "required|unique:cars,name",
        //     // Checking if the name attribute is uppercase
        //     // "name" => new Uppercase, (Using the rule created)
        //     "founded" => "required|integer|min:0|max:2021",
        //     "description" => "required"
        // ]);

        // If is valid, it will proceed and create the resource.
        // If it is not valid, it will redirect to the page where the submission request was initiated with the errors.

        // dd($request->all());
        // dd('Ok');

        // dd($request->get('name'));
        // dd($request->bearerToken());
        // dd($request->exists('name'));

        // Approach 1

        // $car = new Car;

        // $car->name = $request->input('name');
        // $car->founded = $request->input('founded');
        // $car->description = $request->input('description');
        // $car->save();

        // Ensure to specify to specify columns name that you want mass assignment


        $car = Car::create([
            'name' => $request->input('name'),
            'founded' => $request->input('founded'),
            'description' => $request->input('description'),
            "image_path" => $newImageName
        ]);

        return redirect('/cars');
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
        $car = Car::findOrFail($id);
        // Try out Product

        // This should be implemented in Product Controller

        //$product = Product::findOrFail($id);

        //dd($product->car);
        // dd($car->products);
        return view('cars.show')->with('car', $car);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Display Edit Page
        $car = Car::findOrFail($id);
        return view('cars.edit')->with('car', $car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateValidationRequest $request, $id)
    {

        // Validate Request
        $request->validated();

        $car = Car::where('id', $id)->update([
            'name' => $request->input('name'),
            'founded' => $request->input('founded'),
            'description' => $request->input('description')
        ]);

        return redirect('/cars');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect('/cars');
    }
}
