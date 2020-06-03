<?php

namespace App;

use Ixudra\Curl\Facades\Curl;

class Result  
{   
    
    public function getResultsRequests($resultsArray){
        $somePoke = [];
        foreach($resultsArray as $result) {
            $pokeData = Curl::to($result["url"])->get();
            $pokeJsonToArray = json_decode($pokeData,true);
            array_push($somePoke, $pokeJsonToArray);
          }
          return $somePoke;
    }
}