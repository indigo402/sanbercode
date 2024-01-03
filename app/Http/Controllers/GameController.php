<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
        public function create()
        {
            $platforms = DB::table('platform')->get();

            return view('game.tambah', ['platforms' => $platforms]);
        }

        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required',
                'gameplay' => 'required',
                'developer' => 'required',
                'year' => 'required',
                'platform' => 'required'
            ]);            
        
            DB::table('game')->insert([
                'name' => $request['name'],
                'gameplay' => $request['gameplay'],
                'developer' => $request['developer'],
                'year' => $request['year'],
                'platform_id' => $request['platform'] // Sesuaikan dengan nama kolom yang benar
            ]);            
        
            return redirect('/game');
        }

    public function index(){

        $game = DB::table('game')->get();
        // dd($game);

        return view('game.tampil', ['game' => $game]); 
    }

    public function show($id)
{
    $game = DB::table('game')->where('id', $id)->first();

    // Pastikan bahwa ID platform yang Anda ambil sesuai dengan relasi dengan game
    // Jika misalnya ada kolom 'platform_id' di dalam tabel 'game', gantilah dengan kolom tersebut
    $platformId = $game->platform_id;

    $platform = DB::table('platform')->where('id', $platformId)->first();

    if ($game) {
        return view('game.detail', ['game' => $game, 'platform' => $platform]);
    } else {
        // Handle ketika data game tidak ditemukan
        return abort(404);
    }
}
    

public function edit($id){
            
    $game = DB::table('game')->where('id', $id)->first();

    $platforms = DB::table('platform')->get();
    $selectedPlatformId = $game->platform_id;

    return view('game.edit', [
        'game' => $game,
        'platforms' => $platforms,
        'selectedPlatformId' => $selectedPlatformId,
    ]);
}

    
public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'gameplay' => 'required',
        'developer' => 'required',
        'year' => 'required',
        'platform' => 'required',
    ]);  
    
    DB::table('game')
      ->where('id', $id)
      ->update(
        [
        'name' => $request->name,
        'gameplay' => $request->gameplay,
        'developer' => $request->developer,
        'year' => $request->year,
        'platform_id' => $request->platform
        ],
    );    

return redirect('/game');
}


   
    public function destroy($id)
        {
            DB::table('game')->where('id', $id)->delete();    

            return redirect('/game');
        }
}
