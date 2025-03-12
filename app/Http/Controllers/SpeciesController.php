<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Species;
use App\Http\Requests\SpeciesRequest;
use App\Http\Resources\SpeciesResource;
use App\Http\Controllers\ResponseController;
use Illuminate\Support\Facades\Gate;

class SpeciesController extends ResponseController
{

    public function getSpecies(){
        $species = Species::all();
        return $this->sendResponse(SpeciesResource::collection($species), "Siker");
    }
}
