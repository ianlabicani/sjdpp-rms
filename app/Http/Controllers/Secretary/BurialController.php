<?php

namespace App\Http\Controllers\Secretary;

use App\Http\Controllers\Controller;
use App\Models\Burial;
use Illuminate\Http\Request;

class BurialController extends Controller
{
    public function index(Request $request)
    {
        $query = Burial::query();

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('informant', 'like', "%{$search}%")
                  ->orWhere('place', 'like', "%{$search}%")
                  ->orWhere('presider', 'like', "%{$search}%")
                  ->orWhere('status', 'like', "%{$search}%");
            });
        }

        // Filter by date range
        if ($request->filled('date_from')) {
            $query->where('date_of_burial', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->where('date_of_burial', '<=', $request->date_to);
        }

        // Filter by year
        if ($request->filled('year')) {
            $query->whereYear('date_of_burial', $request->year);
        }

        // Sort order
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');

        $allowedSorts = ['created_at', 'date_of_burial', 'date_of_death', 'name', 'age'];
        if (in_array($sortBy, $allowedSorts)) {
            $query->orderBy($sortBy, $sortOrder);
        } else {
            $query->latest();
        }

        $burials = $query->paginate(10)->withQueryString();

        // Get available years for filter
        $years = Burial::selectRaw('YEAR(date_of_burial) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        return view('secretary.burial.index', compact('burials', 'years'));
    }

    public function create()
    {
        return view('secretary.burial.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'date_of_death' => 'required|date',
            'date_of_burial' => 'required|date|after_or_equal:date_of_death',
            'age' => 'required|integer|min:0',
            'status' => 'required|string|max:255',
            'informant' => 'required|string|max:255',
            'place' => 'required|string|max:255',
            'presider' => 'required|string|max:255',
        ]);

        Burial::create($validated);

        return redirect()->route('secretary.burial.index')
            ->with('success', 'Burial record created successfully.');
    }

    public function show(Burial $burial)
    {
        return view('secretary.burial.show', compact('burial'));
    }

    public function edit(Burial $burial)
    {
        return view('secretary.burial.edit', compact('burial'));
    }

    public function update(Request $request, Burial $burial)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'date_of_death' => 'required|date',
            'date_of_burial' => 'required|date|after_or_equal:date_of_death',
            'age' => 'required|integer|min:0',
            'status' => 'required|string|max:255',
            'informant' => 'required|string|max:255',
            'place' => 'required|string|max:255',
            'presider' => 'required|string|max:255',
        ]);

        $burial->update($validated);

        return redirect()->route('secretary.burial.index')
            ->with('success', 'Burial record updated successfully.');
    }

    public function destroy(Burial $burial)
    {
        $burial->delete();

        return redirect()->route('secretary.burial.index')
            ->with('success', 'Burial record deleted successfully.');
    }
}
