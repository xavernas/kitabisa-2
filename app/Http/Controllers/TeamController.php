<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Team::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_team = new Team;
        $new_team->team_name = $request->name;
        $status=$new_team->save();
        if ($status){
            return "Data '".$request->name."' successfully entered!";
        } else {
            return "Data '".$request->name."' failed to be entered!";
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
        $item_searched=Team::find($id);
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
        $item_updated=Team::find($id);
        if (empty($item_searched)){
            return "Data not found!";
        }

        $item_updated->team_name = $request->name;
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
        $item_deleted=Team::find($id);
        if (empty($item_searched)){
            return "Data not found!";
        }
        $status=$item_deleted->delete();
        if ($status){
            return "Delete Data Succeeded!";
        } else {
            return "Delete Data Failed! Please try again with other data!";
        }
    }
}
