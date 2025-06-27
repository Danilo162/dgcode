<?php

namespace App\Http\Controllers;

class GalleryController extends Controller
{
    public function photos()
    {
        $albums = [
            ['nom' => 'Projets Afrique', 'photos_count' => 25],
            ['nom' => 'Formations', 'photos_count' => 15]
        ];
        return view('galerie.photos', compact('albums'));
    }

    public function videos()
    {
        $categories = [
            ['nom' => 'Documentaires', 'videos_count' => 8],
            ['nom' => 'Témoignages', 'videos_count' => 12]
        ];
        return view('galerie.videos', compact('categories'));
    }

    public function album($album)
    {
        $photos = [['titre' => 'Photo 1'], ['titre' => 'Photo 2']];
        return view('galerie.album', compact('photos', 'album'));
    }

    public function photo($id)
    {
        $photo = ['id' => $id, 'titre' => 'Photo', 'description' => 'Description photo'];
        return view('galerie.photo', compact('photo'));
    }

    public function random()
    {
        return response()->json([['titre' => 'Photo aléatoire']]);
    }
}

