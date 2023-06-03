<?php

namespace App\Http\Controllers;

use App\Models\EntityPhysique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientInformationsController extends Controller
{
    public function clientInformations()
    {
        $informations =  EntityPhysique::join('contrat as c', 'entite_physique.id_entite_physique', '=', 'c.id_entite_physique')
            ->join('article as a', 'c.id_contrat', '=', 'a.id_contrat')
            ->where('c.type_contrat', 'PREPAID')
            ->where('a.remise', 0.0)
            ->get();

        return view('clientInformations', compact('informations'));
    }

    public function updateArticlesDiscount($id)
    {
        $remise = DB::raw('montant * 0.1');
    
        $informations = DB::table('entite_physique as ep')
            ->join('contrat as c', 'ep.id_entite_physique', '=', 'c.id_entite_physique')
            ->join('article as a', 'c.id_contrat', '=', 'a.id_contrat')
            ->where('c.type_contrat', '=', 'PREPAID')
            ->where('a.remise', '=', 0)
            ->where('c.id_entite_physique', '=', $id)
            ->update(['a.remise' => $remise]);
            session()->flash('success_message', 'Remise updated successfully.');
    
        return redirect('clientInfos')->with(['informations' => $informations]);
    }
}
