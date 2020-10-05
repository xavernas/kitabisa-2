<?php

namespace App\Http\Controllers\API;

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
            return "Data '".$request->name."' berhasil dimasukkan!";
        } else {
            return "Data '".$request->name."' gagal dimasukkan!";
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
            return "Data tidak ditemukan!";
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
            return "Data tidak ditemukan!";
        }

        $item_updated->team_name = $request->name;
        $status=$item_updated->save();
        if ($status){
            return "Update Data Berhasil!";
        } else {
            return "Update Data Gagal!";
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
            return "Data tidak ditemukan!";
        }
        $status=$item_deleted->delete();
        if ($status){
            return "Delete Data Berhasil!";
        } else {
            return "Delete Data Gagal!";
        }
    }
}
