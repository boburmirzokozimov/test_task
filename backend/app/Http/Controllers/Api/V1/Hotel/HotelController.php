<?php

namespace App\Http\Controllers\Api\V1\Hotel;

use App\Http\Controllers\Controller;
use App\Http\Filters\HotelFilter;
use App\Http\Requests\HotelRequest;
use App\Http\Resources\Api\V1\HotelResource;
use App\Models\Hotel;

class HotelController extends Controller
{
    public function __invoke(HotelRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(HotelFilter::class, ['queryParams' => array_filter($data)]);
        $hotel = Hotel::filter($filter)->get();
        return HotelResource::collection($hotel);
    }
}
