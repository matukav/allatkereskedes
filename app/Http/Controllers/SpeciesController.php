<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Species;
use App\Http\Requests\SpeciesRequest;
use App\Http\Resources\Species as SpeciesResource;
use App\Http\Controllers\ResponseController;
use Illuminate\Support\Facades\Gate;

class SpeciesController extends ResponseController
{
    // $species = Species::all();
    // return $this->sendResponse( SResource::collection( $diet ), "Diet siker");

    
    public function getSpeciesId($speciesAni) {
        $species = Species::where("species", $speciesAni)->first();
        $id = $species->id;
        return $id;
    }
}
