<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Team;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Player::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (empty(Team::find($request->team))){
            return "Team not found! Please input other team!";
        }
        $new_player = new Player;
        $new_player->name = $request->name;
        $new_player->birth_date = $request->birth;
        $new_player->team = $request->team;
        $status=$new_player->save();
        if ($status){
            return "Data '".$request->name."' succeeded entered!";
        } else {
            return "Data '".$request->name."' failed entered!";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item_searched=Player::find($id);
        if (!empty($item_searched)){
            return $item_searched;
        } else {
            return "Data not found!";
        }
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
        $item_updated=Player::find($id);
        if (empty($item_updated)){
            return "Data not found!";
        }

        $item_updated->name = $request->name;
        $item_updated->birth_date = $request->birth;
        $item_updated->team = $request->team;

        $status=$item_updated->save();
        if ($status){
            return "Update Data Succeeded!";
        } else {
            return "Update Data Failed!";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item_deleted=Player::find($id);
        if (empty($item_deleted)){
            return "Player not found!";
        }
        $status=$item_deleted->delete();
        if ($status){
            return "Player Deleted!";
        } else {
            return "Player Delete Failed! Please try again with other data!";
        }
    }
}
