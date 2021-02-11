<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Houses;
use Illuminate\Http\Request;

class HousesController extends Controller
{
    /**
     * @return object
     */
    public function index()
    {
        return Houses::all();
    }

    /**
     *  @param Request $request
     *
     *  @return object
     */
    public function search(Request $request)
    {

        $houseQuery = Houses::query()->select('*');

        if ($request->Name){
            $houseQuery->where('Name', 'like', '%'.$request->Name.'%');
        }
        if ($request->Bedrooms){
            $houseQuery->where('Bedrooms', '=', $request->Bedrooms);
        }
        if ($request->Bathrooms){
            $houseQuery->where('Bathrooms', '=', $request->Bathrooms);
        }
        if ($request->Storeys){
            $houseQuery->where('Storeys', '=', $request->Storeys);
        }
        if ($request->Garages){
            $houseQuery->where('Garages', '=', $request->Garages);
        }
        if ($request->PriceMin != null && $request->PriceMax != null){
            $houseQuery->whereBetween('Price', [$request->PriceMin, $request->PriceMax]);
        }

        $house = $houseQuery->get();

        $status = 200;

        if ($house->isEmpty()){
            $status = 204;
        }
        return response(json_encode($house), $status);
    }
}
