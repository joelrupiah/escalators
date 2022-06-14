<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousel;

class CarouselController extends Controller
{
    public function getCarousels()
    {
        $carousels = Carousel::get();
    }

    public function addCarousel(Request $request)
    {
        
    }

    public function editCarousel($slug)
    {
        
    }
}
