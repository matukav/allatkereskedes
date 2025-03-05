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

class AnimalController extends ResponseController
{
    public function addAnimal(Request $request){
        $animal = new Animal;
        $animal->name = $request["name"];
        $animal->coat = $request["coat"];
        $animal->birthdate = $request["birthdate"];

        $animal->save();

        return $this->sendResponse( $animal, "Sikeres hozzáadás" );
    }

    public function getAnimals(){
        $animals = Animal::all();
        return $this->sendResponse( AnimalResource::collection($animals), "Siker");
    }

    public function updateAnimal(Request $request){

    }

    public function deleteAnimal(Request $request){

    }
}
