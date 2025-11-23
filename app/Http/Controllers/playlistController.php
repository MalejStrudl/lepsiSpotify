<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlists;
use App\Models\Songs;
use App\Models\Specifikations;
use App\Models\SpecifikationsPlaylists;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class playlistController extends Controller
{
    public function showPlaylists()
    {
        $playlists = Playlists::all();
        $specifications = Specifikations::all();
        $dances = $specifications->where('importance', 1);
        $plays = $specifications->where('importance', 2);
        $types = $specifications->where('importance', 3);
        return view('Playlists/playlistList', [
            'playlists' => $playlists, 
            'dances' => $dances,
            'plays' => $plays,
            'types' => $types,
        ]);
    }
    public function addPlaylistShow()
    {
        $specifications = Specifikations::all();
    $dances = $specifications->where('importance', 1);
    $plays = $specifications->where('importance', 2);
    $types = $specifications->where('importance', 3);
        return view('Playlists/addPlaylist', 
        [
        'dances' => $dances,
        'plays' => $plays,
        'types' => $types,
    ]);
    }

    public function selectSpecification(Request $request)
    {
        $specifications = Specifikations::all();
        $dances = $specifications->where('importance', 1);
        $plays = $specifications->where('importance', 2);
        $types = $specifications->where('importance', 3);
        // Získáme pole ID vybraných specifikací, např. [1, 5]
        $selectedSpecIds = $request->input('specifications', []);
        
        // Počet specifikací, které musí playlist splňovat
        $specCount = count($selectedSpecIds); 

        if (empty($selectedSpecIds)) {
            // Žádné specifikace -> vrátit všechny playlisty
            $songsInSpecification = Playlists::all(); 
        } else {
            // 1. Krok: Najdeme ID playlistů, které odpovídají VŠEM vybraným specifikacím.
            $matchingPlaylistIds = SpecifikationsPlaylists::select('id_play')
                
                // Filtruj záznamy, kde id_spec je v poli $selectedSpecIds
                ->whereIn('id_spec', $selectedSpecIds) 
                
                // Seskup záznamy podle ID playlistu
                ->groupBy('id_play') 
                
                // Vyber jen ty skupiny (playlisty), které mají počet záznamů
                // roven celkovému počtu vybraných specifikací ($specCount)
                ->havingRaw('COUNT(id_play) = ?', [$specCount]) 
                
                // Získej čisté pole IDček
                ->pluck('id_play') 
                ->toArray();

            // 2. Krok: Vyber playlisty na základě získaných ID
            $songsInSpecification = Playlists::whereIn('id', $matchingPlaylistIds)->get();
        }

        return view('Playlists/playlistList', [
            'playlists' => $songsInSpecification,
            'dances' => $dances,
            'plays' => $plays,
            'types' => $types,
        ]);
    }

    public function addPlaylist(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'songs' => 'nullable|array',
            'specifications.*' => 'required',
            'paths.*' => 'file|mimes:mp3,wav,ogg|max:20000',
        ]);

        $playlist = Playlists::create([
            'name' => $validatedData['name'],
            'type' => $validatedData['type'],
        ]);
        $songs = $request->songs ?? [];
        $paths = $request->file('paths') ?? [];
        foreach ($songs as $index => $songTitle) {
            if (isset($paths[$index])) {
                $uploadPath = $paths[$index]->store('music', 'public');
            } else {
                $uploadPath = null;
            }
            Songs::create([
                'title' => $songTitle,
                'path' => $uploadPath,
                'playlist_id' => $playlist->id,
            ]);
        }
        $specifications = $validatedData['specifications'];
        foreach ($specifications as $spec) {
            SpecifikationsPlaylists::create([
                'id_spec' => $spec,
                'id_play' => $playlist->id
            ]);
        }
        return redirect()->route('playlist.list')->with('success', 'Playlist added successfully!');
    }

    public function playlistView($playlistName)
    {
        $playlist = Playlists::where('name', $playlistName)->first();
        $songs = Songs::where('playlist_id', $playlist->id)->get();
        return view('Playlists/playlistView', ['songs' => $songs]);
    }

    public function addSpecification(Request $req) {
        $valid = $req->validate([
            'name' => 'required',
            'importance' => 'required|integer|min:1'
        ]);
        Specifikations::create([
            'name' => $valid['name'],
            'playlist_id' => '0',
            'importance' => $valid['importance'],
        ]);
        return redirect()->back();
    }

    
}
