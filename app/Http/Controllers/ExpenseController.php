<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function __construct()
    {
        // Ensure user is authenticated for all actions
        $this->middleware('auth');
    }

    /**
     * Display a listing of the user's expenses.
     */
    public function index()
    {
        // Fetch expenses belonging to the authenticated user, latest first, paginated
        $expenses = Expense::where('user_id', Auth::id())->latest()->paginate(10);
        return view('expenses.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new expense.
     */
    public function create()
    {
        return view('expenses.create');
    }

    /**
     * Store a newly created expense in storage.
     */
    public function store(Request $request)
    {
        // Validate input data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'category' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Attach the authenticated user's ID
        $validated['user_id'] = Auth::id();

        // Create the expense
        Expense::create($validated);

        return redirect()->route('expenses.index')->with('success', 'Expense added successfully.');
    }

    /**
     * Show the form for editing the specified expense.
     */
    public function edit(Expense $expense)
    {
        // Authorize the user for this action
        $this->authorize('update', $expense);

        return view('expenses.edit', compact('expense'));
    }

    /**
     * Update the specified expense in storage.
     */
    public function update(Request $request, Expense $expense)
    {
        // Authorize the user for this action
        $this->authorize('update', $expense);

        // Validate updated data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'category' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Update expense
        $expense->update($validated);

        return redirect()->route('expenses.index')->with('success', 'Expense updated successfully.');
    }

    /**
     * Remove the specified expense from storage.
     */
    public function destroy(Expense $expense)
    {
        // Authorize the user for this action
        $this->authorize('delete', $expense);

        $expense->delete();

        return redirect()->route('expenses.index')->with('success', 'Expense deleted successfully.');
    }
}
