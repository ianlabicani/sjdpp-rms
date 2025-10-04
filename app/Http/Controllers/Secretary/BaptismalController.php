<?php

namespace App\Http\Controllers\Secretary;

use App\Http\Controllers\Controller;
use App\Models\Baptismal;
use Illuminate\Http\Request;

class BaptismalController extends Controller
{
    public function index(Request $request)
    {
        $query = Baptismal::query();

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('fathers_name', 'like', "%{$search}%")
                  ->orWhere('mothers_name', 'like', "%{$search}%")
                  ->orWhere('church_name', 'like', "%{$search}%")
                  ->orWhere('priest_name', 'like', "%{$search}%")
                  ->orWhere('sponsor', 'like', "%{$search}%")
                  ->orWhere('secondary_sponsor', 'like', "%{$search}%");
            });
        }

        // Filter by date range
        if ($request->filled('date_from')) {
            $query->where('baptism_date', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->where('baptism_date', '<=', $request->date_to);
        }

        // Filter by year
        if ($request->filled('year')) {
            $query->whereYear('baptism_date', $request->year);
        }

        // Sort order
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');

        $allowedSorts = ['created_at', 'baptism_date', 'birth_date', 'name'];
        if (in_array($sortBy, $allowedSorts)) {
            $query->orderBy($sortBy, $sortOrder);
        } else {
            $query->latest();
        }

        $baptismals = $query->paginate(10)->withQueryString();

        // Get available years for filter
        $years = Baptismal::selectRaw('YEAR(baptism_date) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        return view('secretary.baptismal.index', compact('baptismals', 'years'));
    }

    public function create()
    {
        return view('secretary.baptismal.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'baptism_date' => 'required|date',
            'fathers_name' => 'required|string|max:255',
            'mothers_name' => 'required|string|max:255',
            'church_name' => 'required|string|max:255',
            'sponsor' => 'required|string|max:255',
            'secondary_sponsor' => 'nullable|string|max:255',
            'priest_name' => 'required|string|max:255',
            'book_number' => 'required|integer|min:1',
            'page_number' => 'required|integer|min:1',
            'line_number' => 'required|integer|min:1',
        ]);

        Baptismal::create($validated);

        return redirect()->route('secretary.baptismal.index')
            ->with('success', 'Baptismal record created successfully.');
    }

    public function show(Baptismal $baptismal)
    {
        return view('secretary.baptismal.show', compact('baptismal'));
    }

    public function edit(Baptismal $baptismal)
    {
        return view('secretary.baptismal.edit', compact('baptismal'));
    }

    public function update(Request $request, Baptismal $baptismal)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'baptism_date' => 'required|date',
            'fathers_name' => 'required|string|max:255',
            'mothers_name' => 'required|string|max:255',
            'church_name' => 'required|string|max:255',
            'sponsor' => 'required|string|max:255',
            'secondary_sponsor' => 'nullable|string|max:255',
            'priest_name' => 'required|string|max:255',
            'book_number' => 'required|integer|min:1',
            'page_number' => 'required|integer|min:1',
            'line_number' => 'required|integer|min:1',
        ]);

        $baptismal->update($validated);

        return redirect()->route('secretary.baptismal.index')
            ->with('success', 'Baptismal record updated successfully.');
    }

    public function destroy(Baptismal $baptismal)
    {
        $baptismal->delete();

        return redirect()->route('secretary.baptismal.index')
            ->with('success', 'Baptismal record deleted successfully.');
    }

    public function certificate(Baptismal $baptismal)
    {
        return view('secretary.baptismal.certificate', compact('baptismal'));
    }
}

