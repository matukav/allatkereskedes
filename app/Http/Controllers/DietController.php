<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diet;
use App\Http\Requests\DietRequest;
use App\Http\Resources\Diet as DietResource;
use App\Http\Controllers\api\ResponseController;
use Illuminate\Support\Facades\Gate;

class DietController extends Controller
{
    public function getDiets(){
        $diet = Diet::all();
        return $this->sendResponse( DietResource::collection( $diet ), "Diet siker");
    }
}
