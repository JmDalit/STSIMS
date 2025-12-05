<?php

namespace App\References;

use App\Models\LocationBarangays;
use App\Models\LocationCity;
use App\Models\LocationProvinces;
use App\Models\LocationRegions;

class LocationClass
{
    public function get_regions(bool $main, $search = null)
    {
        if ($main) {
            return LocationRegions::where('is_delete', false)->when($search, function ($query) {
                $search = strtolower(request('search'));
                $query->where(function ($query) use ($search) {
                    $query->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"])
                        ->orWhereRaw('LOWER(code) LIKE ?', ["%{$search}%"])
                        ->orWhereRaw('LOWER(region) LIKE ?', ["%{$search}%"])
                        ->orWhereRaw('LOWER(island) LIKE ?', ["%{$search}%"]);
                });
            })->orderBy('id')->paginate(10);
        } else {
            return
                LocationRegions::where('is_active', true)->where('is_delete', false)->get()->when($search, function ($query) {
                    $search = strtolower(request('search'));
                    $query->where(function ($query) use ($search) {
                        $query->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"]);
                    });
                })->map(function ($row) {
                    return [
                        'id' => $row->code,
                        'name' => $row->region,
                    ];
                });
        }
    }


    public function get_provinces(bool $main, $search = null)
    {
        if ($main) {
            return LocationProvinces::where('is_delete', false)->when($search, function ($query) {
                $search = strtolower(request('search'));

                $query->where(function ($query) use ($search) {
                    $query->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"])
                        ->orWhereRaw('LOWER(code) LIKE ?', ["%{$search}%"])
                        ->orWhereRaw('LOWER(old_name) LIKE ?', ["%{$search}%"]);
                });
            })->orderBy('id')->paginate(10);
        } else {
            return
                LocationProvinces::where('is_active', true)->where('is_delete', false)->get()->when($search, function ($query) {
                    $search = strtolower(request('search'));
                    $query->where(function ($query) use ($search) {
                        $query->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"]);
                    });
                })->map(function ($row) {
                    return [
                        'id' => $row->code,
                        'name' => $row->name,
                    ];
                });
        }
    }


    public function get_cities(bool $main, $search = null)
    {
        if ($main) {
            return LocationCity::where('is_delete', false)->when($search, function ($query) {
                $search = strtolower(request('search'));
                $query->where(function ($query) use ($search) {
                    $query->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"])
                        ->orWhereRaw('LOWER(code) LIKE ?', ["%{$search}%"])
                        ->orWhereRaw('LOWER(old_name) LIKE ?', ["%{$search}%"]);
                });
            })->orderBy('id')->paginate(10);
        } else {
            return
                LocationCity::where('is_active', true)->where('is_delete', false)->get()->when($search, function ($query) {
                    $search = strtolower(request('search'));
                    $query->where(function ($query) use ($search) {
                        $query->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"]);
                    });
                })->map(function ($row) {
                    return [
                        'id' => $row->code,
                        'name' => $row->name,
                    ];
                });
        }
    }

    public function get_barangay(bool $main, $search = null)
    {
        if ($main) {
            return LocationBarangays::where('is_delete', false)->when($search, function ($query) {
                $search = strtolower(request('search'));
                $query->where(function ($query) use ($search) {
                    $query->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"])
                        ->orWhereRaw('LOWER(code) LIKE ?', ["%{$search}%"])
                        ->orWhereRaw('LOWER(old_name) LIKE ?', ["%{$search}%"]);
                });
            })->orderBy('id')->paginate(10);
        } else {
            return
                LocationBarangays::where('is_active', true)->where('is_delete', false)->limit(10)->get()->when($search, function ($query) {
                    $search = strtolower(request('search'));
                    $query->where(function ($query) use ($search) {
                        $query->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"]);
                    });
                })->map(function ($row) {
                    return [
                        'id' => $row->code,
                        'name' => $row->name,
                    ];
                });
        }
    }

    public function getFullAddress($search  = '')
    {

        return
            LocationBarangays::where('is_active', true)->where('is_delete', false)->with(['cityCode'])->when($search, function ($query) use ($search) {

                $search = strtolower($search);

                $query->where(function ($query) use ($search) {
                    $query->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"])
                        ->orwhereHas('cityCode', function ($query) use ($search) {
                            $query->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"])
                                ->orWhereHas('provinceCode', function ($query) use ($search) {
                                    $query->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"])
                                        ->orWhereHas('regionCode', function ($query) use ($search) {
                                            $query->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"]);
                                        });
                                });
                        });
                });
            })->limit(50)->get()->map(function ($row) {
                return [
                    'id' => $row->code . '-' . $row->cityCode->code . '-' . $row->cityCode->provinceCode->code . '-' . $row->cityCode->provinceCode->regionCode->code,
                    'name' => $row->name . ', ' . $row->cityCode->name . ', ' . $row->cityCode->provinceCode->name . ', ' . $row->cityCode->provinceCode->regionCode->name,
                ];
            });
    }
}
