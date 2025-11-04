<?php

namespace App\Http\Controllers\Secretary;

use App\Http\Controllers\Controller;
use App\Models\FirstCommunion;
use Illuminate\Http\Request;

class FirstCommunionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request('search');
        $year = request('year');
        $month = request('month');

        $communions = FirstCommunion::query()
            ->when($search, function ($query) use ($search) {
                $query->whereJsonContains('names', $search)
                    ->orWhereJsonContains('parents', $search)
                    ->orWhere('address', 'like', "%{$search}%");
            })
            ->when($year, function ($query) use ($year) {
                $query->where('year', $year);
            })
            ->when($month, function ($query) use ($month) {
                $query->where('month', $month);
            })
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->orderBy('day', 'desc')
            ->paginate(15);

        return view('secretary.first-communion.index', compact('communions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('secretary.first-communion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'year' => 'required|integer|min:1900|max:'.now()->year,
            'month' => 'required|integer|min:1|max:12',
            'day' => 'required|integer|min:1|max:31',
            'names' => 'required|array|min:1',
            'names.*' => 'required|string|max:255',
            'parents' => 'required|array|min:1',
            'parents.*' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'minister' => 'nullable|string|max:255',
            'baptismal_date' => 'nullable|date',
            'baptismal_place' => 'nullable|string|max:255',
        ]);

        // Filter out empty entries
        $validated['names'] = array_filter($validated['names']);
        $validated['parents'] = array_filter($validated['parents']);

        FirstCommunion::create($validated);

        return redirect()->route('secretary.first-communion.index')
            ->with('success', 'First Communion record created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(FirstCommunion $firstCommunion)
    {
        return view('secretary.first-communion.show', compact('firstCommunion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FirstCommunion $firstCommunion)
    {
        return view('secretary.first-communion.edit', compact('firstCommunion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FirstCommunion $firstCommunion)
    {
        $validated = $request->validate([
            'year' => 'required|integer|min:1900|max:'.now()->year,
            'month' => 'required|integer|min:1|max:12',
            'day' => 'required|integer|min:1|max:31',
            'names' => 'required|array|min:1',
            'names.*' => 'required|string|max:255',
            'parents' => 'required|array|min:1',
            'parents.*' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'minister' => 'nullable|string|max:255',
            'baptismal_date' => 'nullable|date',
            'baptismal_place' => 'nullable|string|max:255',
        ]);

        // Filter out empty entries
        $validated['names'] = array_filter($validated['names']);
        $validated['parents'] = array_filter($validated['parents']);

        $firstCommunion->update($validated);

        return redirect()->route('secretary.first-communion.show', $firstCommunion)
            ->with('success', 'First Communion record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FirstCommunion $firstCommunion)
    {
        $firstCommunion->delete();

        return redirect()->route('secretary.first-communion.index')
            ->with('success', 'First Communion record deleted successfully.');
    }
}
