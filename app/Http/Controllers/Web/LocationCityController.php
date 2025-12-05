<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\LocationCityRequest;
use App\Models\LocationCity;
use App\References\LocationClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LocationCityController extends Controller
{
    public function index(LocationClass $ref, Request $request)
    {
        return Inertia::render('Web/locationCityPage', [
            'cities'         => $ref->get_cities(true, $request->input('search')),
            'cityOption'    => $ref->get_provinces(false)
        ]);
    }

    public function store(LocationCityRequest $request)
    {
        $data = $request->validated();

        LocationCity::create([
            'name' => $data['name'],
            'old_name' => $data['oldName'],
            'district' => $data['district'],
            'zipcode' => $data['zipCode'],
            'code' => $data['code'],
            'is_municipality' => $data['isMunicipalities'],
            'is_chartered' => $data['isChartered'],
            'province_code' => $data['province']['id'],
            'created_by'    => Auth::user()->profile->fullname
        ]);

        return redirect()->back()->with('flash', [
            'status' => 'success',
            'title'  => 'City Created',
            'message' => 'City successfully created.',
        ]);;
    }
    function update(LocationCityRequest $request, string $id, string $type)
    {

        $data = $request->validated();
        $find = LocationCity::findOrFail($id);

        if ($type == 'form') {
            $find->update([
                'name'          => $data['name'],
                'old_name'      => $data['oldName'],
                'district'      => $data['district'],
                'zipcode'       => $data['zipCode'],
                'code'          => $data['code'],
                'is_municipality' => $data['isMunicipalities'],
                'is_chartered' => $data['isChartered'],
                'province_code' => $data['province']['id'],
                'updated_by'    => Auth::user()->profile->fullname,
                'updated_at'    => now()
            ]);
        } else {
            $find->update([
                'is_active' => $data['isActive'],
            ]);
        }

        return redirect()->back()->with('flash', [
            'status' => 'success',
            'title'  => 'City Updated',
            'message' => 'City successfully updated.',
        ]);
    }

    function destroy(int $id)
    {
        $find = LocationCity::findOrFail($id);
        $find->update([
            'is_delete' => true,
        ]);

        return redirect()->back()->with('flash', [
            'status' => 'success',
            'title'  => 'City Deleted',
            'message' => 'City successfully deleted.',
        ]);
    }
}
