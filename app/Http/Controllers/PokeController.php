<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use App\AllPokemon;
use App\Result;

class PokeController extends Controller
{  
   public function index() {
      return view('index');
   }

   public function show($name){
    $onePoke = new Result;
    $pokemon = $onePoke->getOnePoke($name);
    return view('show', [
      'pokemon' => $pokemon,
  ]);
   }

   public function findPokemon(Request $request){

    if($request->has('query')){
      $this->validate($request, [
        'query' => 'string|min:3|max:20'
      ]);
      $search = $request->get('query');
    } else { 
      $search = "bulbasaur";
     }

     $allPokemon = new AllPokemon;
     $allPokemon = $allPokemon->getApiCall();

     $resultsArray = [];
     foreach($allPokemon as $pokemon){
          if (stripos($pokemon["name"], $search) !== false) {
                array_push($resultsArray, $pokemon);
          }
      }
      
      $resultsCalls = new Result;
      $somePoke = $resultsCalls->getResultsRequests($resultsArray);
      
      
    return view('find', [
        'somePoke' => $somePoke,
    ]);

}
}