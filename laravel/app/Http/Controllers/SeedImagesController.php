<?php

namespace App\Http\Controllers;

use App\Jobs\RunPythonScript;
use App\Models\SeedImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SeedImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seedImage = SeedImages::latest()->first();

        return view('seed-images.index', compact('seedImage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('seed-images.create');
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000000',
        ]);

        $input = $request->all();

        if ($request->hasFile('image')) {
            $destinationPath = 'image/';
            $image = $request->file('image');
            $seedImage =  'new_image.' . $image->getClientOriginalExtension();
  
            if (Storage::exists($destinationPath . $input['image'])) {
                Storage::delete($destinationPath . $input['image']);
            }

            $image->move($destinationPath, $seedImage);

            $input['image'] = time() . '_' . $seedImage;
        }

        SeedImages::create($input);

        // dispatch the job
        RunPythonScript::dispatch();

        Log::info('RUN model.py');

        $output = [];
        // Run the python model
        exec('/usr/local/bin/python3 /Users/ransisathsarani/Documents/IIT/Rice-Seed-Identification-System/model.py', $output);
        $predicted_class = end($output);

        Log::info('End RUN model.py: Output: ' . $predicted_class);

        return redirect()->route('seed-images.index')
            ->with('success', "Image Identified Successfully")
            ->with('predicted_class', $predicted_class);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SeedImages  $seedImages
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $seedImage = SeedImages::latest()->first();
        return view('seed-images.show', compact('seedImage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SeedImages  $seedImages
     * @return \Illuminate\Http\Response
     */
    public function edit(SeedImages $seedImages)
    {
        return view('seed-images.edit', compact('seedImages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SeedImages  $seedImages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SeedImages $seedImages)
    {

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }

        $seedImages->update($input);

        return redirect()->route('seed-images.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SeedImages  $seedImages
     * @return \Illuminate\Http\Response
     */
    public function destroy(SeedImages $seedImages)
    {
        $seedImages->delete();

        return redirect()->route('seed-images.index')
            ->with('success', 'Product deleted successfully');
    }

    /**
     * get the json array of rice seed varities
     *
     * @return void
     */
    public function getRiceSeedInfo()
    {
        // Define an associative array of data
        $data = [
            [
                'name' => 'Dikwee Rice',
                'description' => 'A Sri Lankan traditional rice seed variety',
                'nutrition' => [
                    'calories' => '130 kcal',
                    'carbohydrates' => '28.3 g',
                    'protein' => '2.7 g',
                    'fat' => '0.4 g',
                    'fiber' => '1.3 g'
                ],
                'medical_value' => [
                    'low glycemic index' => 'good for diabetic patients',
                    'antioxidants' => 'helps prevent cancer and heart disease',
                    'vitamins and minerals' => 'contains essential vitamins and minerals such as iron and magnesium'
                ]
            ],
            [
                'name' => 'Hondarawalu Rice',
                'description' => 'A Sri Lankan traditional rice seed variety',
                'nutrition' => [
                    'calories' => '135 kcal',
                    'carbohydrates' => '30 g',
                    'protein' => '2.9 g',
                    'fat' => '0.4 g',
                    'fiber' => '1.7 g'
                ],
                'medical_value' => [
                    'low glycemic index' => 'good for diabetic patients',
                    'antioxidants' => 'helps prevent cancer and heart disease',
                    'vitamins and minerals' => 'contains essential vitamins and minerals such as iron and calcium'
                ]
            ],
            [
                'name' => 'Madathawalu Rice',
                'description' => 'A Sri Lankan traditional rice seed variety',
                'nutrition' => [
                    'calories' => '130 kcal',
                    'carbohydrates' => '28.3 g',
                    'protein' => '2.7 g',
                    'fat' => '0.4 g',
                    'fiber' => '1.3 g'
                ],
                'medical_value' => [
                    'low glycemic index' => 'good for diabetic patients',
                    'antioxidants' => 'helps prevent cancer and heart disease',
                    'vitamins and minerals' => 'contains essential vitamins and minerals such as iron and magnesium'
                ]
            ],
            [
                'name' => 'Pachchaperumal Rice',
                'description' => 'A Sri Lankan traditional rice seed variety',
                'nutrition' => [
                    'calories' => '120 kcal',
                    'carbohydrates' => '26 g',
                    'protein' => '2.5 g',
                    'fat' => '0.3 g',
                    'fiber' => '1.2 g'
                ],
                'medical_value' => [
                    'low glycemic index' => 'good for diabetic patients',
                    'antioxidants' => 'helps prevent cancer and heart disease',
                    'vitamins and minerals' => 'contains essential vitamins and minerals such as iron and magnesium'
                ]
            ],
        ];

        // // Define an array of data
        // $data = [
        //   'dikwee' => [
        //     'nutrition' => [

        //     ],
        //     'medical_value' => [

        //     ]
        //   ],
        //   'Hondarawalu' => 'ddd',
        //   ''
        // ];

        // Encode the array as JSON
        $jsonData = json_encode($data);

        return response()->json([
            "status_code" => 200,
            "message" => "Success",
            "data" => $data
        ], 200);
    }
}
