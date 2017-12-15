<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Character;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'about']]);
    }
    //
    public function index(){
        return view("pages.index");
    }

    public function about(){
        return view("pages.about");
    }

    public function play($char_type){
        $user_id = auth()->user()->id;
        $characters = DB::table('characters')
        ->select('*')
        ->where('user_id', '=', $user_id)
        ->where('type', '=', $char_type)
        ->get();

        $char_count = 0;
        $char_count = count($characters);
        
                if($char_count == 1) {
                    // Confirmed user has a character with $char_type
                    foreach($characters as $char) {
                        $name = $char->name;
                        $id = $char->id;
                        $gender = $char->gender;
                        // Gender condition
                        if($gender == 1) {
                            $gender = "Male";
                        } else {
                            $gender = "Female";
                        }
                        $status = $char->status;
                        // Status condition
                        if($status == 1) {
                            $status = "Alive";
                        } elseif($status == 2) {
                            $status = "Fighting";
                        } else {
                            $status = "Dead";
                        }
                        $temple = $char->temple;
                        // Temple name
                        if($temple == 1) {
                            $temple = "Fire";
                        } elseif($temple == 2) {
                            $temple = "Water";
                        } else {
                            $temple = "Earth";
                        }

                        $location = $char->location;
                        $hp = $char->hp;
                        $max_hp = $char->max_hp;
                        $hp_percent = $max_hp / $hp;
                        $hp_percent = $hp_percent * 100;
                        $xp = $char->xp;
                        $speed = $char->speed;
                        $strength = $char->strength;
                        $stamina = $char->stamina;
                        $defence = $char->defence;
                        $points = $char->points;
                        $created_at = $char->created_at;

                        $data = [
                            'characters' => $char_count,
                            'name' => $name,
                            'id' => $id,
                            'char_type' => $char_type,
                            'gender' => $gender,
                            'status' => $status,
                            'temple' => $temple,
                            'location' => $location,
                            'hp' => $hp,
                            'max_hp' => $max_hp,
                            'hp_percent' => $hp_percent,
                            'xp' => $xp,
                            'speed' => $speed,
                            'strength' => $strength,
                            'stamina' => $stamina,
                            'defence' => $defence,
                            'points' => $points,
                            'created_at' => $created_at
                        ];
                    }
                    
                    return view("pages.play")->with('data', $data);
                
                } else {
                    return redirect("/characters")->with('error','Invalid character.');
                }
            }
        }
