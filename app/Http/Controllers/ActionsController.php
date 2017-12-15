<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Character;

class ActionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function encounter($travel_data){
        // Get location, roll for rarity, choose creature, go to battle method, go to edit DB method...
        $travel_data['message'] = "Encountered";
        return $this->edit($travel_data);
        }

    public function encounterCheck($travel_data){
        $dice_roll = mt_rand(1,2);
        if($dice_roll > 1) {
            //Encountered! Go to encounter method...
            return $this->encounter($travel_data);
        } else {
            //Travelled safely - go to edit DB method...
            return $this->edit($travel_data);
        }
    }


    public function edit($travel_data){
        // $logged_user_id = auth()->user()->id;
        $character = $travel_data['character'];
        foreach($character as $char) {
            $name = $char->name;
            $id = $char->id;
            $user_id = $char->user_id;
            $type = $char->type;
            $gender = $char->gender;
            $status = $char->status;
            $temple = $char->temple;
            $location = $char->location;
            $hp = $char->hp;
            $max_hp = $char->max_hp;
            $xp = $char->xp;
            $speed = $char->speed;
            $strength = $char->strength;
            $stamina = $char->stamina;
            $defence = $char->defence;
            $points = $char->points;
            $created_at = $char->created_at;
        }
        
        //if ($logged_user_id == $user_id) {
            $dbCharacter = Character::find($id);
            $dbCharacter->location = $location;
            $dbCharacter->name = $name;
            $dbCharacter->type = $type;
            $dbCharacter->gender = $gender;
            $dbCharacter->status = $status;
            $dbCharacter->temple = $temple;
            $dbCharacter->location = $location;
            $dbCharacter->hp = $hp;
            $dbCharacter->max_hp = $max_hp;
            $dbCharacter->xp = $xp;
            $dbCharacter->speed = $speed;
            $dbCharacter->strength = $strength;
            $dbCharacter->stamina = $stamina;
            $dbCharacter->defence = $defence;
            $dbCharacter->points = $points;
            $dbCharacter->created_at = $created_at;
            $dbCharacter->save();
            
            $travel_data['character'] = $dbCharacter;
            return $travel_data;
    }

    public function travel($char_id, $direction){
        $user_id = auth()->user()->id;
        $character = DB::table('characters')
        ->select('*')
        ->where('user_id', '=', $user_id)
        ->where('id', '=', $char_id)
        ->get();

        $invalidLocation = array(1,2,3,4,5,6,7,8,9,10,11,12,13,25,37,49,61,73,85,97,109,121,133,24,36,48,60,72,84,96,108,120,132,134,135,136,137,138,139,140,141,142,143,144);
        $char_count = count($character);
        
                if($char_count > 0) {
                    // User has a character already made
                    foreach($character as $char) {
                        $location = $char->location;
                        $name = $char->name;
                        
                        switch ($direction) {
                            case "N":
                                if (!in_array(($location - 12),$invalidLocation)){
                                    $location -= 12;
                                    $message = "$name travels North.";
                                } else {
                                    $message = "$name cannot travel there.";
                                }
                                break;
                            case "NE":
                                if (!in_array(($location - 11),$invalidLocation)){
                                    $location -= 11;
                                    $message = "$name travels NorthEast.";
                                } else {
                                    $message = "$name cannot travel there.";
                                }
                                break;
                            case "E":
                            if (!in_array(($location + 1),$invalidLocation)){
                                $location += 1;
                                $message = "$name travels East.";
                            } else {
                                $message = "$name cannot travel there.";
                            }
                                break;
                            case "SE":
                            if (!in_array(($location + 13),$invalidLocation)){
                                $location += 13;
                                $message = "$name travels SouthEast.";
                            } else {
                                $message = "$name cannot travel there.";
                            }
                                break;
                            case "S":
                            if (!in_array(($location + 12),$invalidLocation)){
                                $location += 12;
                                $message = "$name travels South.";
                            } else {
                                $message = "$name cannot travel there.";
                            }
                                break;
                            case "SW":
                            if (!in_array(($location + 11),$invalidLocation)){
                                $location += 11;
                                $message = "$name travels SouthWest.";
                            } else {
                                $message = "$name cannot travel there.";
                            }
                                break;
                            case "W":
                            if (!in_array(($location - 1),$invalidLocation)){
                                $location -= 1;
                                $message = "$name travels West.";
                            } else {
                                $message = "$name cannot travel there.";
                            }
                                break;
                            case "NW":
                            if (!in_array(($location - 13),$invalidLocation)){
                                $location -= 13;
                                $message = "$name travels NorthWest.";
                            } else {
                                $message = "$name cannot travel there.";
                            }
                                break;

                            default:
                            $location = $location;
                            $message = "$name did not travel.";
                        } 
                        $char->location = $location;
                    }
                    $travel_data = array('message' => $message, 'character' => $character);
                    return $this->encounterCheck($travel_data);
                    //return $travel_data;
                } else {
                    // Invalid character
                    return redirect("/characters")->with('error','Invalid character.');
                }
    } // End of travel
}
