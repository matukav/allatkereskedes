<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests\AnimalRequest;
use App\Http\Resources\AnimalResource;
use App\Models\Animal;


use App\Http\Requests\DietRequest;
use App\Http\Resources\DietResource;
use App\Models\Diet;


use App\Http\Requests\SpeciesRequest;
use App\Http\Resources\SpeciesResource;
use App\Models\Species;


use Illuminate\Support\Facades\Gate;

class AnimalController extends Controller
{
    public function getAnimals(){
        $animals = Animals::all();
        return $this->sendResponse( AnimalResource::collection($animals), "Siker");
    }

    public function addAnimal(Request $request){

    }

    public function updateAnimal(Request $request){

    }

    public function deleteAnimal(Request $request){

    }
}
