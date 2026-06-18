<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Category;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $expenses = Expense::all();

    return view('expenses.index', compact('expenses'));
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

    Expense::create([
        'user_id' => auth()->id(),
        'category_id' => Category::first()->id,
        'amount' => $request->amount,
        'description' => $request->description,
        'date' => $request->date
    ]);

    return redirect()->route('expenses.index');
}

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
{
    $expense->delete();

    return redirect()->route('expenses.index');
}
}
