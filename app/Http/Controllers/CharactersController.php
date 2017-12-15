<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Character;

class CharactersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        // Check if user has Primary character
        $characters = DB::table('characters')
        ->select('*')
        ->where('user_id', '=', $user_id)
        ->where('type', '=', '1')
        ->get();

        $char_count = count($characters);

        if($char_count > 0) {
            // User has a character already made
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
            }

            // Check if user has Secondary characters
            $d_characters = DB::table('characters')
            ->select('*')
            ->where('user_id', '=', $user_id)
            ->where('type', '=', '2')
            ->get();

            $d_char_count = count($d_characters);
            
            if($d_char_count > 0) {
                // User has Secondary character
                foreach($d_characters as $d_char) {
                    $d_name = $d_char->name;
                    $d_id = $d_char->id;
                    $d_gender = $d_char->gender;
                    // Gender condition
                    if($d_gender == 1) {
                        $d_gender = "Male";
                    } else {
                        $d_gender = "Female";
                    }
                    $d_status = $d_char->status;
                    // Status condition
                    if($d_status == 1) {
                        $d_status = "Alive";
                    } elseif($status == 2) {
                        $d_status = "Fighting";
                    } else {
                        $d_status = "Dead";
                    }
                    $d_temple = $d_char->temple;
                    // Temple name
                    if($d_temple == 1) {
                        $d_temple = "Fire";
                    } elseif($d_temple == 2) {
                        $d_temple = "Water";
                    } else {
                        $d_temple = "Earth";
                    }
                    $d_location = $d_char->location;
                    $d_hp = $d_char->hp;
                    $d_max_hp = $d_char->max_hp;
                    $d_hp_percent = $d_max_hp / $hp;
                    $d_hp_percent = $d_hp_percent * 100;
                    $d_xp = $d_char->xp;
                    $d_speed = $d_char->speed;
                    $d_strength = $d_char->strength;
                    $d_stamina = $d_char->stamina;
                    $d_defence = $d_char->defence;
                    $d_points = $d_char->points;
                    $d_created_at = $d_char->created_at;
                }

                $data = [
                    'characters' => $char_count,
                    'name' => $name,
                    'id' => $id,
                    'char_type' => 2,
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
                    'created_at' => $created_at,
                    'd_characters' => $d_char_count,
                    'd_name' => $d_name,
                    'd_id' => $d_id,
                    'd_gender' => $d_gender,
                    'd_status' => $d_status,
                    'd_temple' => $d_temple,
                    'd_location' => $d_location,
                    'd_hp' => $d_hp,
                    'd_max_hp' => $d_max_hp,
                    'd_hp_percent' => $d_hp_percent,
                    'd_xp' => $d_xp,
                    'd_speed' => $d_speed,
                    'd_strength' => $d_strength,
                    'd_stamina' => $d_stamina,
                    'd_defence' => $d_defence,
                    'd_points' => $d_points,
                    'd_created_at' => $d_created_at
                ];
            } else {
                // No Secondary characters found
                $data = [
                    'characters' => $char_count,
                    'd_characters' => $d_char_count,
                    'name' => $name,
                    'id' => $id,
                    'char_type' => 1,
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

            return view('pages.characters')->with('data', $data);
        } else {
            // User has no characters
            $data = [
                'characters' => $char_count,
            ];
            return view('pages.characters')->with('data', $data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'input-character-name' => 'required',
            'input-temple' => 'required',
            'input-gender' => 'required',
        ]);

        // Create Booking
        $character = new Character;
        $character->user_id = auth()->user()->id;
        $character->name = $request->input('input-character-name');
        $character->temple = $request->input('input-temple');
        $character->gender = $request->input('input-gender');
        // Set correct temple location for chosen temple
        if($character->temple == 1) {
            $character->location = 58;
        } elseif ($character->temple == 2) {
            $character->location = 64;
        } else {
            $character->location = 117;
        }

        $character->save();

        return redirect('/characters')->with('success', 'Character created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
