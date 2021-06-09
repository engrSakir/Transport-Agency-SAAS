<?php

namespace App\Http\Controllers\Backend\Manager;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;

class ExpenseController extends Controller
{
    public function getExpense()
    {
        $expense_dates = Expense::whereIn('category_id', auth()->user()->branch->expenseCategories->pluck('id'))->orderBy('id', 'desc')
            ->get()
            ->groupBy(function ($date) {
//                return Carbon::parse($date->created_at)->format('Y'); // grouping by years
//                return Carbon::parse($date->created_at)->format('m'); // grouping by months
                return Carbon::parse($date->created_at)->format('d-m-Y'); // grouping by date
            });
        $expense_categories = auth()->user()->branch->expenseCategories;
//        dd($expense_dates);
        return view('backend.manager.expense.expense', compact('expense_dates', 'expense_categories'));
    }


    public function storeExpense(Request $request)
    {
        $expense_categories = auth()->user()->branch->expenseCategories;
        foreach ($expense_categories as $expense_category) {
            $expense = new Expense();
            $expense->category_id = $expense_category->id;
            $expense->creator_id = auth()->user()->id;
            $expense->immediate = bn_to_en($request->input('immediate_for_' . Str::slug($expense_category->name, '_')));
            $expense->due = bn_to_en($request->input('due_for_' . Str::slug($expense_category->name, '_')));
            $expense->taka = en_to_bn($request->input('taka_for_' . Str::slug($expense_category->name, '_')));
            $expense->description = $request->input('description_for_' . Str::slug($expense_category->name, '_'));
            try {
                $expense->save();
            } catch (Exception $exception) {
                return back()->withErrors($exception->getMessage());
            }
        }
        return back()->withSuccess('সফল ভাবে সেভ হয়েছে।');
    }

    public function showExpense($expense_date)
    {
        $branch = auth()->user()->branch;
        $expenses = Expense::whereIn('category_id', $branch->expenseCategories->pluck('id'))
            ->whereDate('created_at', '=', Carbon::createFromFormat('d-m-Y', $expense_date))
            ->get();
            $pdf = PDF::loadView('backend.pdf.expense-one', compact('expenses', 'branch', 'expense_date'));
            return $pdf->stream('Invoice-'.config('app.name').'-(দৈনিক অফিসে রিপোর্ট -'.$expense_date.').pdf');
    }

    public function getExpenseCategory()
    {
        echo('<h1>This new feature is now Under Development</h1>');
    }

    public function storeExpenseCategory()
    {

    }


}
