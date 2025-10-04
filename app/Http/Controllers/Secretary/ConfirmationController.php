<?php

namespace App\Http\Controllers\Secretary;

use App\Http\Controllers\Controller;
use App\Models\Confirmation;
use Illuminate\Http\Request;

class ConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Confirmation::query();

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('parish_of_baptism', 'like', "%{$search}%")
                    ->orWhere('province_of_baptism', 'like', "%{$search}%")
                    ->orWhere('place_of_baptism', 'like', "%{$search}%")
                    ->orWhere('parents', 'like', "%{$search}%")
                    ->orWhere('sponsor', 'like', "%{$search}%")
                    ->orWhere('name_of_minister', 'like', "%{$search}%");
            });
        }

        // Filter by confirmation date range
        if ($request->filled('date_from')) {
            $query->whereDate('date_of_confirmation', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('date_of_confirmation', '<=', $request->date_to);
        }

        // Filter by year
        if ($request->filled('year')) {
            $query->where('year', $request->year);
        }

        // Sorting
        $allowedSorts = ['created_at', 'date_of_confirmation', 'name', 'year'];
        $sort = in_array($request->sort, $allowedSorts) ? $request->sort : 'created_at';
        $query->orderBy($sort, 'desc');

        $confirmations = $query->paginate(10)->withQueryString();

        // Get available years for filter
        $years = Confirmation::selectRaw('DISTINCT year')->orderBy('year', 'desc')->pluck('year');

        // Statistics
        $stats = [
            'total' => Confirmation::count(),
            'this_year' => Confirmation::whereYear('date_of_confirmation', now()->year)->count(),
            'this_month' => Confirmation::whereYear('date_of_confirmation', now()->year)
                ->whereMonth('date_of_confirmation', now()->month)->count(),
        ];

        return view('secretary.confirmation.index', compact('confirmations', 'years', 'stats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('secretary.confirmation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'year' => 'required|integer|min:1900|max:' . (now()->year + 1),
            'date_of_confirmation' => 'required|date',
            'name' => 'required|string|max:255',
            'parish_of_baptism' => 'required|string|max:255',
            'province_of_baptism' => 'required|string|max:255',
            'place_of_baptism' => 'required|string|max:255',
            'parents' => 'required|string|max:255',
            'sponsor' => 'required|string|max:255',
            'name_of_minister' => 'required|string|max:255',
        ]);

        Confirmation::create($validated);

        return redirect()->route('secretary.confirmation.index')
            ->with('success', 'Confirmation record created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Confirmation $confirmation)
    {
        return view('secretary.confirmation.show', compact('confirmation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Confirmation $confirmation)
    {
        return view('secretary.confirmation.edit', compact('confirmation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Confirmation $confirmation)
    {
        $validated = $request->validate([
            'year' => 'required|integer|min:1900|max:' . (now()->year + 1),
            'date_of_confirmation' => 'required|date',
            'name' => 'required|string|max:255',
            'parish_of_baptism' => 'required|string|max:255',
            'province_of_baptism' => 'required|string|max:255',
            'place_of_baptism' => 'required|string|max:255',
            'parents' => 'required|string|max:255',
            'sponsor' => 'required|string|max:255',
            'name_of_minister' => 'required|string|max:255',
        ]);

        $confirmation->update($validated);

        return redirect()->route('secretary.confirmation.index')
            ->with('success', 'Confirmation record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Confirmation $confirmation)
    {
        $confirmation->delete();

        return redirect()->route('secretary.confirmation.index')
            ->with('success', 'Confirmation record deleted successfully.');
    }
}
