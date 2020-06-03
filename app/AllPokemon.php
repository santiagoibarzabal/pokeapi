<?php

namespace App;

use Ixudra\Curl\Facades\Curl;

class AllPokemon  
{   
    public function getApiCall(){
        $data = Curl::to("https://pokeapi.co/api/v2/pokemon/?limit=1000")->get();
        $apiJsonToArray = json_decode($data,true);
        $allPokemon = $apiJsonToArray["results"];
        return $allPokemon;
    }
}