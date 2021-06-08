<?php

namespace App\Http\Controllers\Backend\Manager;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{
    public function getExpense(){
        $expenses = Expense::whereIn('category_id', auth()->user()->branch->expenseCategories->pluck('id'))->groupBy('created_at')->orderBy('id', 'desc')->get();
        $expense_categories = auth()->user()->branch->expenseCategories;
        return view('backend.manager.expense.expense', compact('expenses', 'expense_categories'));
    }

    public function getExpenseCategory(){
        echo ('<h1>This new feature is now Under Development</h1>');
    }

    public function storeExpense(){

    }

    public function storeExpenseCategory(){

    }



}
