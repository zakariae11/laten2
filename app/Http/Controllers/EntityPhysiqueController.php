<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ContactRole;
use App\Models\Contrat;
use Illuminate\Http\Request;
use App\Models\EntityPhysique;
use App\Models\EntitySocial;

use Illuminate\Support\Facades\DB;


/**
 * Summary of EntityPhysiqueController
 */
class EntityPhysiqueController extends Controller
{
    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $entites = EntityPhysique::all();
        return view('entite_physique.index', compact('entites'));
    }

    public function create()
    {
        $entites = EntitySocial::select('id_entite_social', 'raison_social')->get();
        return view('entite_physique.create', compact('entites'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_entite_social' => 'required',
            'libelle' => 'required|string',
            'numero_client' => 'required',
            'adresse' => 'required',
            'code_postal' => 'required',
            'status_ep' => 'required'
        ]);
        EntityPhysique::create($validatedData);
        return redirect()->route('entite_physique.index')->with('success', 'Entite physique ajoutée avec succès.');
    }


    public function show($id)
    {
        $entitePhysique = EntityPhysique::find($id);
        return view('entite_physique.show', compact('entitePhysique'));
    }

    public function edit($id)
    {
        $entites = EntitySocial::select('id_entite_social', 'raison_social')->get();
        $entitePhysique = EntityPhysique::find($id);
        return view('entite_physique.edit', compact(['entitePhysique', 'entites']));
    }


    public function update(Request $request,  $id)
    {
        $entitePhysique = EntityPhysique::find($id);

        $request->validate([
            'id_entite_social' => 'required',
            'libelle' => 'required|string',
            'numero_client' => 'required',
            'adresse' => 'required',
            'code_postal' => 'required',
            'status_ep' => 'required'
        ]);

        $entitePhysique->update($request->all());
        return redirect()->route('entite_physique.index')->with('success', 'Entite physique mise à jour avec succès.');
    }

    public function destroy($id)
    {
        EntityPhysique::destroy($id);
        return redirect()->route('entite_physique.index')->with('success', 'Entite physique supprimée avec succès.');
    }

    public function showDetails($id)
    {
        $entityphysique = EntityPhysique::where('id_entite_physique', $id)->get();
        $contrats = Contrat::where('id_entite_physique', $id)->get();
        $contactRoles = ContactRole::where('id_entite_physique', $id)
            ->join('contact', 'contactRole.id_contact', '=', 'contact.id_contact')
            ->get();
        $articles = Article::join('contrat as c', 'article.id_contrat', '=', 'c.id_contrat')
            ->where('c.id_entite_physique', $id)
            ->get();

        return view('entite_physique.details', compact('entityphysique', 'contrats', 'contactRoles', 'articles'));
    }
}
