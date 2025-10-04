<?php

namespace App\Http\Controllers\Priest;

use App\Http\Controllers\Controller;
use App\Models\Baptismal;
use App\Models\Burial;
use App\Models\Confirmation;
use App\Models\Wedding;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    // Baptismal Records
    public function baptismal(Request $request)
    {
        $query = Baptismal::latest();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('child_name', 'like', '%'.$request->search.'%')
                    ->orWhere('father_name', 'like', '%'.$request->search.'%')
                    ->orWhere('mother_name', 'like', '%'.$request->search.'%');
            });
        }

        if ($request->filled('date_from')) {
            $query->where('baptism_date', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->where('baptism_date', '<=', $request->date_to);
        }

        $baptismals = $query->paginate(15);
        $total = Baptismal::count();

        return view('priest.records.baptismal', compact('baptismals', 'total'));
    }

    public function showBaptismal(Baptismal $baptismal)
    {
        return view('priest.records.show-baptismal', compact('baptismal'));
    }

    // Burial Records
    public function burial(Request $request)
    {
        $query = Burial::latest();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('deceased_name', 'like', '%'.$request->search.'%')
                    ->orWhere('informant_name', 'like', '%'.$request->search.'%');
            });
        }

        if ($request->filled('date_from')) {
            $query->where('burial_date', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->where('burial_date', '<=', $request->date_to);
        }

        $burials = $query->paginate(15);
        $total = Burial::count();

        return view('priest.records.burial', compact('burials', 'total'));
    }

    public function showBurial(Burial $burial)
    {
        return view('priest.records.show-burial', compact('burial'));
    }

    // Confirmation Records
    public function confirmation(Request $request)
    {
        $query = Confirmation::latest();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('confirmand_name', 'like', '%'.$request->search.'%')
                    ->orWhere('sponsor_name', 'like', '%'.$request->search.'%');
            });
        }

        if ($request->filled('date_from')) {
            $query->where('confirmation_date', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->where('confirmation_date', '<=', $request->date_to);
        }

        $confirmations = $query->paginate(15);
        $total = Confirmation::count();

        return view('priest.records.confirmation', compact('confirmations', 'total'));
    }

    public function showConfirmation(Confirmation $confirmation)
    {
        return view('priest.records.show-confirmation', compact('confirmation'));
    }

    // Wedding Records
    public function wedding(Request $request)
    {
        $query = Wedding::latest();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('groom_name', 'like', '%'.$request->search.'%')
                    ->orWhere('bride_name', 'like', '%'.$request->search.'%');
            });
        }

        if ($request->filled('date_from')) {
            $query->where('wedding_date', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->where('wedding_date', '<=', $request->date_to);
        }

        $weddings = $query->paginate(15);
        $total = Wedding::count();

        return view('priest.records.wedding', compact('weddings', 'total'));
    }

    public function showWedding(Wedding $wedding)
    {
        return view('priest.records.show-wedding', compact('wedding'));
    }
}
