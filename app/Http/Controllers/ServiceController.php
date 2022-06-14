<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

// use Illuminate\Support\Str;

class ServiceController extends Controller
{

    public function getAllServices()
    {
        $services = Service::get();
        return response()->json([
            'services' => $services
        ], 200);
    }

    public function getServiceDescriptionsDetails($serviceSlug)
    {
        // return $serviceSlug;
        $servicedescriptionsdetail = Service::where('slug', $serviceSlug)
            ->with('servicedescriptions')
            ->first();
        // return $servicedescriptionsdetail;
        return response()->json([
            'servicedescriptionsdetail' => $servicedescriptionsdetail
        ], 200);
    }

    public function index()
    {
        $services = Service::get();

        return response()->json([
            'services' => $services
        ], 200);
    }

    public function frontServices()
    {
        $services = Service::get();

        return response()->json([
            'services' => $services
        ], 200);
    }

    public function allServiceDescriptionDetails($serviceSlug)
    {
        // return $serviceSlug;
        $servicedescriptionsdetail = Service::where('slug', $serviceSlug)->with('servicedescriptions');
        return response()->json([
            'servicedescriptionsdetail' => $servicedescriptionsdetail
        ], 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // return $request;
        $slug = slugify($request->title);

        Service::create([
            'title' => $request->title,
            'slug' => $slug,
            'smallDescription' => $request->smallDescription
        ]);

        return response()->json('success', 200);
    }

    public function show($slug)
    {
        $service = Service::where('slug', $slug)->first();

        $service->status = explode(",", $service->status);
      
        // dd($service);

        return response()->json([
            'service' => $service,
        ], 200);
    }

    public function edit(Service $service)
    {
        //
    }

    public function update(Request $request)
    {
        $service = Service::find($request->id);

        $service->title = $request->title;
        $service->smallDescription = $request->smallDescription;
        $service->slug = slugify($request->title);

        $service->update();

        return response()->json('success', 200);

    }

    public function allService()
    {
        $services = Service::get();

        return response()->json([
            'services' => $services
        ], 200);
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return response()->json([
            'message' => 'Delete request complete',
        ], 200);
    }
}
