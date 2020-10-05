<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Player;

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
        $new_player = new Player;
        $new_player->name = $request->name;
        $new_player->birth_date = $request->birth;
        $new_player->team = $request->team;
        $status=$new_player->save();
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
        $item_searched=Player::find($id);
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
        $item_updated=Player::find($id);
        if (empty($item_searched)){
            return "Data tidak ditemukan!";
        }

        $item_updated->name = $request->name;
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
