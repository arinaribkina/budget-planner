<?php

namespace App\Http\Controllers;

use App\Models\FinancialGoal;
use Illuminate\Http\Request;

class FinancialGoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $goals = FinancialGoal::all();

    return view('financial-goals.index', compact('goals'));
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
    FinancialGoal::create([
        'user_id' => auth()->id(),
        'name' => $request->name,
        'target_amount' => $request->target_amount,
        'current_amount' => $request->current_amount,
        'deadline' => $request->deadline
    ]);

    return redirect()->route('financial-goals.index');
}

    /**
     * Display the specified resource.
     */
    public function show(FinancialGoal $financialGoal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FinancialGoal $financialGoal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FinancialGoal $financialGoal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FinancialGoal $financialGoal)
{
    $financialGoal->delete();

    return redirect()->route('financial-goals.index');
}
}
