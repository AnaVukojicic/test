<?php

namespace App\Http\Controllers;

use App\Models\ExpenseSubtype;
use App\Http\Requests\StoreExpenseSubtypeRequest;
use App\Http\Requests\UpdateExpenseSubtypeRequest;
use App\Models\ExpenseType;

class ExpenseSubtypeController extends Controller
{
    public function index()
    {
        return view('expense-subtype.index',[
            'subtypes'=>ExpenseSubtype::all()
        ]);
    }

    public function create()
    {
        return view('expense-subtype.create',[
            'types'=>ExpenseType::query()->orderBy('name')->get()
        ]);
    }

    public function store(StoreExpenseSubtypeRequest $request)
    {
        ExpenseSubtype::query()->create($request->all());
        return redirect()->route('expense-subtype.index');
    }

    public function show(ExpenseSubtype $expenseSubtype)
    {

    }

    public function edit(ExpenseSubtype $expenseSubtype)
    {
        return view('expense-subtype.edit',[
            'subtype'=>$expenseSubtype,
            'types'=>ExpenseType::query()->orderBy('name')->get()
        ]);
    }

    public function update(UpdateExpenseSubtypeRequest $request, ExpenseSubtype $expenseSubtype)
    {
        $expenseSubtype->update($request->all());
        return redirect()->route('expense-subtype.index');
    }

    public function destroy(ExpenseSubtype $expenseSubtype)
    {
        $expenseSubtype->delete();
        return redirect()->route('expense-subtype.index');
    }
}
