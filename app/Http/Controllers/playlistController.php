<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlists;
use App\Models\Songs;
use Illuminate\Support\Facades\Storage;

class playlistController extends Controller
{
    public function showPlaylists()
    {
        $playlists = Playlists::all();
        return view('Playlists/playlistList', ['playlists' => $playlists]);
    }
    public function addPlaylistShow()
    {
        return view('Playlists/addPlaylist');
    }

    public function addPlaylist(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'songs' => 'nullable|array',
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
        return redirect()->route('playlist.list')->with('success', 'Playlist added successfully!');
    }

    public function playlistView($playlistName)
    {
        $playlist = Playlists::where('name', $playlistName)->first();
        $songs = Songs::where('playlist_id', $playlist->id)->get();
        return view('Playlists/playlistView', ['songs' => $songs]);
    }

    
}
