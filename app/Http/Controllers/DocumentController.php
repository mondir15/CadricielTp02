<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\documents;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;

class DocumentController extends Controller
{
    public function index()
    {
        // Récupérer les fichiers paginés
        $files = documents::paginate(3);
        
        // Récupérer l'étudiant associé à l'utilisateur connecté
        $etudiant = auth()->user()->etudiant;
        
        return view('documents.index', compact('files'))->with('etudiant', $etudiant);
    }

    public function create()
    {
        // Récupérer l'étudiant associé à l'utilisateur connecté
        $etudiant = auth()->user()->etudiant;
        
        return view('documents.create')->with('etudiant', $etudiant);
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'file' => 'required|mimes:pdf,zip,doc|max:2048',
            'nomDocument' => 'required',
        ]);

        // Récupérer le fichier soumis
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $path = $file->store('assets/files');

        // Créer un nouvel enregistrement dans la base de données
        documents::create([
            'nomDocument' => $request->input('nomDocument') . '.' . $file->getClientOriginalExtension(),
            'path' => $path,
            'user_id' => auth()->user()->id,
        ]);

        return redirect('/documents')->with('success');
    }

    public function destroy($id)
    {
        // Récupérer le fichier à supprimer
        $file = documents::findOrFail($id);

        // Vérifier si l'utilisateur connecté est le propriétaire du fichier
        if ($file->user_id !== auth()->user()->id) {
            return redirect()->route('documents.index')->with('error');
        }

        // Supprimer le fichier de stockage
        Storage::delete($file->path);

        // Supprimer l'enregistrement de la base de données
        $file->delete();

        return redirect()->route('documents.index')->with('success');
    }
}
