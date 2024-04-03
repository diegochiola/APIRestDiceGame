<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    //Funciones propias del game
    public function index(Request $request)
    {
    
    }

    public function createGame(Request $request){

       //
    }
    public function destroyAllGames(Request $request, $userId)
    {
      
    }

    //funcionalidades a partir del game
    public function winner()
    {
        //
    }
    public function loser()
    {
        //
    }
    public function ranking()
    {
        //
    }
    public function getGames(){
        //
    }
    //porcentaje de wins para un user especifico
    public function percentageOfWins() {
           
    }
    
     //percentage of wins by user
    private function calculatePercentageOfWins(){
       
    }
    
        
    //calcular el porcentaje de wins de todos los users
    public function allUsersPercentageOfWins()
        {
            
        }
        //calcular el porcentaje total de wins en todos los games
        private function calculateTotalPercentageOfWins()
        {
           
        }
        //porcentaje total de wins en todos los games
        public function getTotalPercentageOfWins()
        {
          
        }

}
