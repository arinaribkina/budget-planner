<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;
use App\Models\Category;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $incomes = Income::all();

    return view('incomes.index', compact('incomes'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    if (Category::count() == 0) {
        return redirect()
            ->route('categories.index')
            ->with('error', 'First create a category.');
    }

    Income::create([
        'user_id' => auth()->id(),
'category_id' => Category::first()->id,
        'amount' => $request->amount,
        'description' => $request->description,
        'date' => $request->date
    ]);

    return redirect()->route('incomes.index');
}
    /**
     * Display the specified resource.
     */
    public function show(Income $income)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Income $income)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Income $income)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
public function destroy(Income $income)
{
    $income->delete();

    return redirect()->route('incomes.index');
}
}
