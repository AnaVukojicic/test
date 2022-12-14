<?php

namespace App\Http\Controllers;

use App\Models\ExpenseType;
use App\Http\Requests\StoreExpenseTypeRequest;
use App\Http\Requests\UpdateExpenseTypeRequest;

class ExpenseTypeController extends Controller
{
    public function index()
    {
        return view('expense-type.index',[
            'types'=>ExpenseType::all()
        ]);
    }

    public function create()
    {
        return view('expense-type.create');
    }

    public function store(StoreExpenseTypeRequest $request)
    {
        ExpenseType::query()->create($request->all());
        return redirect()->route('expense-type.index');
    }

    public function show(ExpenseType $expenseType)
    {

    }

    public function edit(ExpenseType $expenseType)
    {
        return view('expense-type.edit',['expense_type'=>$expenseType]);
    }

    public function update(UpdateExpenseTypeRequest $request, ExpenseType $expenseType)
    {
        $expenseType->update($request->all());
        return redirect()->route('expense-type.index');
    }

    public function destroy(ExpenseType $expenseType)
    {
        $expenseType->delete();
        return redirect()->route('expense-type.index');
    }

    public function attachTypeToUser(ExpenseType $expense_type){
        $currentUser=auth()->user();
        if($currentUser->hasExpenseType($expense_type->id)){
            $currentUser->expense_types()->detach($expense_type->id);
        }else{
            $currentUser->expense_types()->attach($expense_type->id);
        }
        return redirect()->route('settings');
    }
}
