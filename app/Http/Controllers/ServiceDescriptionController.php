<?php

namespace App\Http\Controllers;

use App\Models\ServiceDescription;
use App\Models\Service;
use Illuminate\Http\Request;
use Image;

class ServiceDescriptionController extends Controller
{

    public function index()
    {
        //
    }

    public function allServiceDescription()
    {
        $servicedescriptions = ServiceDescription::with('service')->get();

        return response()->json([
            'servicedescriptions' => $servicedescriptions
        ], 200);

    }

    public function allServiceDescriptionDetails($serviceSlug)
    {
        // return $serviceSlug;
        $servicedescriptionsdetail = ServiceDescription::find($serviceSlug->id);

        return response()->json([
            'servicedescriptionsdetail' => $servicedescriptionsdetail,
        ], 200);

        // $servicedescriptionsdetails = ServiceDescription::get();

        // return response()->json([
        //     'servicedescriptionsdetails' => $servicedescriptionsdetails
        // ], 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // return $request;
        $fileOne = explode(';', $request->imageOne);
        $fileOne = explode('/', $fileOne[0]);
        $file_one_ex = end($fileOne);

        $fileTwo = explode(';', $request->imageTwo);
        $fileTwo = explode('/', $fileTwo[0]);
        $file_two_ex = end($fileTwo);

        $file_one_name = \Str::random(10) . '.' . $file_one_ex;
        $file_two_name = \Str::random(10) . '.' . $file_two_ex;

        ServiceDescription::create([
            'service_id' => $request->service_id,
            'mainDescription' => $request->mainDescription,
            'imageOne' => $file_one_name,
            'mainDescription' => $request->mainDescription,
            'mainDescriptionOne' => $request->mainDescriptionOne,
            'imageTwo' => $file_two_name,
            'pointOne' => $request->pointOne,
            'pointTwo' => $request->pointTwo,
            'pointThree' => $request->pointThree,
            'pointFour' => $request->pointFour,
            'mainDescriptionTwo' => $request->mainDescriptionTwo,
            'smallDescriptionOne' => $request->smallDescriptionOne,
            'smallHeaderOne' => $request->smallHeaderOne,
            'smallHeaderTwo' => $request->smallHeaderTwo,
            'smallHeaderThree' => $request->smallHeaderThree,
            'smallDescOne' => $request->smallDescOne,
            'smallDescTwo' => $request->smallDescTwo,
            'smallDescThree' => $request->smallDescThree,
        ]);

        Image::make($request->imageOne)->resize(770, 400)->save(public_path('/uploads/service/main/').$file_one_name);
        Image::make($request->imageTwo)->resize(370, 230)->save(public_path('/uploads/service/other/').$file_two_name);

        return response()->json('success', 200);
    }

    public function show(ServiceDescription $servicedescription)
    {
        // return $servicedescription;
        $servicedescription = ServiceDescription::find($servicedescription->id);

        return response()->json([
            'servicedescription' => $servicedescription,
        ], 200);

    }

    public function edit(ServiceDescription $serviceDescription)
    {
        //
    }

    public function update(Request $request)
    {
        $servicedescription = ServiceDescription::find($request->id);
        
        $servicedescription->service_id = $request->service_id;
        $servicedescription->mainDescription = $request->mainDescription;
        $servicedescription->mainDescriptionOne = $request->mainDescriptionOne;
        $servicedescription->pointOne = $request->pointOne;
        $servicedescription->pointTwo = $request->pointTwo;
        $servicedescription->pointThree = $request->pointThree;
        $servicedescription->pointFour = $request->pointFour;
        $servicedescription->mainDescriptionTwo = $request->mainDescriptionTwo;
        $servicedescription->smallDescriptionOne = $request->smallDescriptionOne;
        $servicedescription->smallHeaderOne = $request->smallHeaderOne;
        $servicedescription->smallHeaderTwo = $request->smallHeaderTwo;
        $servicedescription->smallHeaderThree = $request->smallHeaderThree;
        $servicedescription->smallDescOne = $request->smallDescOne;
        $servicedescription->smallDescTwo = $request->smallDescTwo;
        $servicedescription->smallDescThree = $request->smallDescThree;

        if ($request->imageOne != $servicedescription->imageOne) {
            $fileOne = explode(';', $request->imageOne);
            $fileOne = explode('/', $fileOne[0]);
            $fileOne_ex = end($fileOne);
            $fileOne_name = \Str::random(10) . '.' . $fileOne_ex;
            $servicedescription->imageOne = $fileOne_name;
            Image::make($request->imageOne)->resize(800, 600)->save(public_path('/uploads/service/main/').$fileOne_name);
        }

        if ($request->imageTwo != $servicedescription->imageTwo) {
            $fileTwo = explode(';', $request->imageTwo);
            $fileTwo = explode('/', $fileTwo[0]);
            $fileTwo_ex = end($fileTwo);
            $fileTwo_name = \Str::random(10) . '.' . $fileTwo_ex;
            $servicedescription->imageTwo = $fileTwo_name;
            Image::make($request->imageTwo)->resize(800, 600)->save(public_path('/uploads/service/other/').$fileTwo_name);
        }


        $servicedescription->save();

        return response()->json(['success' => true], 200);
    }

    public function destroy(ServiceDescription $servicedescription)
    {
        $filenameOne = $servicedescription->imageOne;
        $filenameTwo = $servicedescription->imageTwo;
        if ($servicedescription->delete()) {
            if (file_exists(public_path('/uploads/service/main/'. $filenameOne))) {
                unlink(public_path('/uploads/service/main/'. $filenameOne));
            }
        }

        if ($servicedescription->delete()) {
            if (file_exists(public_path('/uploads/service/other/'. $filenameTwo))) {
                unlink(public_path('/uploads/service/other/'. $filenameTwo));
            }
        }

        // $project->delete();
        
        return response()->json([
            'message' => 'Delete request complete',
            'status_code' => 200
        ], 200);
    }
}
