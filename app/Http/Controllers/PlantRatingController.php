<?php
namespace App\Http\Controllers;

use App\Plant;

class PlantRatingController extends Controller
{

    /**
     * Rate the given article.
     *
     * @param \App\Plant $plant
     */
    public function store(Plant $plant)
    {
        request()->validate([
            'rating' => ['required', 'in:1,2,3,4,5']
        ]);
        $plant->rate(request('rating'));
    }
}
