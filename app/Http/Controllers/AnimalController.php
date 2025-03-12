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
    public function getAnimals(){
        $animals = Animal::all();
        return $this->sendResponse(AnimalResource::collection($animals), "Siker");
    }

    public function addAnimal(Request $request){

            $animals = new Animal;
            $animals->name = $request["name"];
            $animals->coat = $request["coat"];
            $animals->birthdate = $request["birthdate"];
            $animals->species_id = $request["species_id"];
            $animals->diet_id = $request["diet_id"]; 
        
            $animals->save();
        
            return $this->sendResponse($animals, "Hozzáadva");       
    }

    public function updateAnimal(Request $request){

        $animals = Animal::find( $request[ "id" ]);

        if( is_null( $animals)) {

            $this->sendError( "Adathiba", [ "Nincs" ] );

        }
        $animals->name = $request[ "name" ];
        $animals->coat = $request[ "coat" ];
        $animals->birthdate = $request[ "birthdate" ];
        $animals->coat = $request[ "coat" ];
        $animals->species_id = $request[ "species_id" ];
        $animals->diet_id = $request[ "diet_id" ];

        $animals->update();

        return $this->sendResponse( $animals, "Sikeres módosítás" );
    }

    public function deleteAnimal(Request $request){
        $animals = Animal::find($request["id"]);
        if (is_null($animals)) {
            return $this->sendError( "Animal not found", 404); 
        }
    
        $animals->delete();
        return $this->sendResponse($animals, "Törölve");
    }
}
