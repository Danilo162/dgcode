<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// ===== ContactController MINIMAL =====
class ContactController extends Controller
{
    public function index()
    {
        $bureaux = [
            ['nom' => 'Siège Abidjan', 'adresse' => 'Plateau', 'telephone' => '+225 XX XX XX XX']
        ];
        return view('contact.index', compact('bureaux'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'email' => 'required|email',
            'message' => 'required|min:10'
        ]);

        // Enregistrement simple
        DB::table('contact_messages')->insert([
            'nom' => $request->nom,
            'email' => $request->email,
            'message' => $request->message,
            'created_at' => now()
        ]);

        return redirect()->back()->with('success', 'Message envoyé');
    }
}
