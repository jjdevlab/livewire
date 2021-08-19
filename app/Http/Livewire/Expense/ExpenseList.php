<?php

namespace App\Http\Livewire\Expense;

use App\Models\Expense;
use Livewire\Component;

class ExpenseList extends Component
{
    public function render()
    {
//        $expenses = Expense::all(['id','description','amount','type','created_at']);
        $expenses = auth()->user()->expenses()->count() ?
            auth()->user()->expenses()->orderByDesc('created_at')->paginate(5) :
            [];
        return view('livewire.expense.expense-list', compact('expenses'));
    }

    public function remove($expense)
    {
        $expense = auth()->user()->expenses()->find($expense);
        $expense->delete();

        session()->flash('message', 'Registro deletado com sucesso');
    }
}
