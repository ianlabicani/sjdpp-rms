<?php

namespace App\Http\Controllers\Secretary;

use App\Http\Controllers\Controller;
use App\Models\Wedding;
use Illuminate\Http\Request;

class WeddingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Wedding::query();

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('husband_name', 'like', "%{$search}%")
                    ->orWhere('wife_name', 'like', "%{$search}%")
                    ->orWhere('municipality', 'like', "%{$search}%")
                    ->orWhere('barangay', 'like', "%{$search}%")
                    ->orWhere('presider', 'like', "%{$search}%")
                    ->orWhere('sponsor1', 'like', "%{$search}%")
                    ->orWhere('sponsor2', 'like', "%{$search}%");
            });
        }

        // Filter by marriage date range
        if ($request->filled('date_from')) {
            $query->whereDate('date_of_marriage', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('date_of_marriage', '<=', $request->date_to);
        }

        // Filter by year
        if ($request->filled('year')) {
            $query->where('year', $request->year);
        }

        // Sorting
        $allowedSorts = ['created_at', 'date_of_marriage', 'husband_name', 'wife_name', 'year'];
        $sort = in_array($request->sort, $allowedSorts) ? $request->sort : 'created_at';
        $query->orderBy($sort, 'desc');

        $weddings = $query->paginate(10)->withQueryString();

        // Get available years for filter
        $years = Wedding::selectRaw('DISTINCT year')->orderBy('year', 'desc')->pluck('year');

        // Statistics
        $stats = [
            'total' => Wedding::count(),
            'this_year' => Wedding::whereYear('date_of_marriage', now()->year)->count(),
            'this_month' => Wedding::whereYear('date_of_marriage', now()->year)
                ->whereMonth('date_of_marriage', now()->month)->count(),
        ];

        return view('secretary.wedding.index', compact('weddings', 'years', 'stats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('secretary.wedding.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'year' => 'required|integer|min:1900|max:' . (now()->year + 1),
            'date_of_marriage' => 'required|date',
            'husband_name' => 'required|string|max:255',
            'wife_name' => 'required|string|max:255',
            'husband_status' => 'required|string|max:255',
            'wife_status' => 'required|string|max:255',
            'husband_age' => 'required|integer|min:1|max:150',
            'wife_age' => 'required|integer|min:1|max:150',
            'municipality' => 'required|string|max:255',
            'barangay' => 'required|string|max:255',
            'husband_parents' => 'required|string|max:255',
            'wife_parents' => 'required|string|max:255',
            'sponsor1' => 'required|string|max:255',
            'sponsor2' => 'required|string|max:255',
            'place_of_sponsor' => 'required|string|max:255',
            'presider' => 'required|string|max:255',
        ]);

        Wedding::create($validated);

        return redirect()->route('secretary.wedding.index')
            ->with('success', 'Wedding record created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Wedding $wedding)
    {
        return view('secretary.wedding.show', compact('wedding'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wedding $wedding)
    {
        return view('secretary.wedding.edit', compact('wedding'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wedding $wedding)
    {
        $validated = $request->validate([
            'year' => 'required|integer|min:1900|max:' . (now()->year + 1),
            'date_of_marriage' => 'required|date',
            'husband_name' => 'required|string|max:255',
            'wife_name' => 'required|string|max:255',
            'husband_status' => 'required|string|max:255',
            'wife_status' => 'required|string|max:255',
            'husband_age' => 'required|integer|min:1|max:150',
            'wife_age' => 'required|integer|min:1|max:150',
            'municipality' => 'required|string|max:255',
            'barangay' => 'required|string|max:255',
            'husband_parents' => 'required|string|max:255',
            'wife_parents' => 'required|string|max:255',
            'sponsor1' => 'required|string|max:255',
            'sponsor2' => 'required|string|max:255',
            'place_of_sponsor' => 'required|string|max:255',
            'presider' => 'required|string|max:255',
        ]);

        $wedding->update($validated);

        return redirect()->route('secretary.wedding.index')
            ->with('success', 'Wedding record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wedding $wedding)
    {
        $wedding->delete();

        return redirect()->route('secretary.wedding.index')
            ->with('success', 'Wedding record deleted successfully.');
    }
}
