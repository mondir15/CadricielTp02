<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Récupérer tous les étudiants
        $etudiants = Etudiant::all();

        // Afficher la vue "index" avec la liste des étudiants
        return view('etudiants.index', ['etudiants' => $etudiants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Récupérer toutes les villes
        $villes = \App\Models\Ville::all();

        // Afficher la vue "create" avec les villes
        return view('etudiants.create', ['villes' => $villes]);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Créer un nouvel étudiant avec les données du formulaire
        $etudiant = Etudiant::create([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'phone' => $request->phone,
            'email' => $request->email,
            'date_de_naissance' => $request->date_de_naissance,
            'ville_id' => $request->ville_id,
        ]);

        // Rediriger vers la page d'affichage de l'étudiant créé
        return redirect()->route('etudiants.show', $etudiant->id);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Trouver l'étudiant avec l'ID spécifié
        $etudiant = Etudiant::find($id);

        // Afficher la vue "show" avec les informations de l'étudiant
        return view('etudiants.show', ['etudiant' => $etudiant]);
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        // Récupérer toutes les villes
        $villes = \App\Models\Ville::all();

        // Afficher la vue "edit" avec l'étudiant et les villes
        return view('etudiants.edit', ['etudiant' => $etudiant, 'villes' => $villes]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);

        // Mettre à jour les attributs de l'étudiant avec les nouvelles valeurs en utilisant la méthode update()
        $etudiant->update($validatedData);

        // Rediriger vers la page d'affichage de l'étudiant mis à jour
        return redirect()->route('etudiants.show', $etudiant->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();

        return redirect()->route('etudiants.index');
    }
}