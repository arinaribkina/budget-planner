<?php

namespace App\Http\Controllers;

use App\Models\BudgetLimit;
use App\Models\Category;
use Illuminate\Http\Request;

class BudgetLimitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $limits = BudgetLimit::all();
    $categories = Category::all();

    return view('budget-limits.index', compact('limits', 'categories'));
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

   BudgetLimit::create([
    'user_id' => auth()->id(),
    'category_id' => $request->category_id,
    'limit_amount' => $request->limit_amount
]);

    return redirect()->route('budget-limits.index');
}

    /**
     * Display the specified resource.
     */
    public function show(BudgetLimit $budgetLimit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BudgetLimit $budgetLimit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BudgetLimit $budgetLimit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BudgetLimit $budgetLimit)
{
    $budgetLimit->delete();

    return redirect()->route('budget-limits.index');
}
}
