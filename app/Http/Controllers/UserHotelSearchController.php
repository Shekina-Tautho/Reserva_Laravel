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
        $hotel = Hotel::query();

        if(request()->filled('min_rate')) {
            $hotel->where('min_rate', '>=', request()->min_rate);
        }

        if(request()->filled('max_rate')) {
            $hotel->where('max_rate', '<=', request()->max_rate);
        }

        if(request()->has('free_breakfast')) {
            $hotel->where('features', 'like', '%Free Breakfast%');
        }

        if(request()->has('free_wifi')) {
            $hotel->where('features', 'like', '%Free WiFi%');
        }

        if(request()->has('parking_space')) {
            $hotel->where('features', 'like', '%Parking Space%');
        }

        if(request()->has('private_balcony')) {
            $hotel->where('features', 'like', '%Private Balcony%');
        }

        if(request()->has('restaurant')) {
            $hotel->where('features', 'like', '%Restaurant%');
        }

        if(request()->has('swimming_pool')) {
            $hotel->where('features', 'like', '%Swimming Pool%');
        }

        $hotels = $hotel->get();
        return view('pages.user.hotels', compact('hotels'));
    }

    public function sort(Request $request) 
    {
        $hotels = Hotel::query();

        if($request->filled('sort_by')) {
            if($request->sort_by == 'no_category') {
                $hotels->orderBy('id', 'asc');
            } elseif($request->sort_by == 'name_asc') {
                $hotels->orderBy('name', 'asc');
            } elseif($request->sort_by == 'name_desc') {
                $hotels->orderBy('name', 'desc');
            } elseif($request->sort_by == 'rating_desc') {
                $hotels->orderBy('rating', 'desc');
            } elseif($request->sort_by == 'rating_asc') {
                $hotels->orderBy('rating', 'asc');
            } elseif($request->sort_by == 'price_desc') {
                $hotels->orderBy('min_rate', 'desc');
            } elseif($request->sort_by == 'price_asc') {
                $hotels->orderBy('min_rate', 'asc');
            }
        }

        $hotels = $hotels->get();
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
