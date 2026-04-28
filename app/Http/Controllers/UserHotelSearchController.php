<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class UserHotelSearchController extends Controller
{
    public function index() 
    {
        if(request()->has('search')) {
            $hotels = Hotel::with('address')
                ->where('name', 'LIKE', '%' . request()->search . '%')
                ->orWhereHas('address', function($query) {
                    $query->where('country', 'LIKE', '%' . request()->search . '%')
                          ->orWhere('administrative_area', 'LIKE', '%' . request()->search . '%')
                          ->orWhere('locality', 'LIKE', '%' . request()->search . '%')
                          ->orWhere('thoroughfare', 'LIKE', '%' . request()->search . '%');
                })->get();
        } else {
            $hotels = Hotel::with('address')->get();
        }
        return view('pages.user.hotels', compact('hotels'));
        
        //$hotels = Hotel::all();
        //return view('pages.user.hotels', compact('hotels'));
    }

    public function filter() 
    {
        $query = Hotel::query();

        if(request()->filled('min_rate')) {
            $query->where('min_rate', '>=', request()->min_rate);
        }

        if(request()->filled('max_rate')) {
            $query->where('max_rate', '<=', request()->max_rate);
        }

        if(request()->has('free_breakfast')) {
            $query->where('features', 'like', '%Free Breakfast%');
        }

        if(request()->has('free_wifi')) {
            $query->where('features', 'like', '%Free WiFi%');
        }

        if(request()->has('parking_space')) {
            $query->where('features', 'like', '%Parking Space%');
        }

        if(request()->has('private_balcony')) {
            $query->where('features', 'like', '%Private Balcony%');
        }

        if(request()->has('restaurant')) {
            $query->where('features', 'like', '%Restaurant%');
        }

        if(request()->has('swimming_pool')) {
            $query->where('features', 'like', '%Swimming Pool%');
        }

        $hotels = $query->get();
        return view('pages.user.hotels', compact('hotels'));
    }

    /*
    public function filter(Request $request) 
    {
        $query = Hotel::query();

        if($request->filled('min_rate')) {
            $query->where('min_rate', '>=', $request->min_rate);
        }

        if($request->filled('max_rate')) {
            $query->where('max_rate', '<=', $request->max_rate);
        }

        if($request->filled('features')) {
            foreach($request->features as $feature) {
                $query->whereJsonContains('features', $feature);
            }
        }

        $hotels = $query->get();
        return view('pages.user.hotels', compact('hotels'));
    }
    */
}
