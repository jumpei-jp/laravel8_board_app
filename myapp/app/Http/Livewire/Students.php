<?php

namespace App\Http\Livewire;

use App\Models\Student; //追加分
use Livewire\Component;

class Students extends Component
{
    public function render()
    {
        $students = Student::orderBy('id', 'DESC')->get(); //studentのidを全件取得
        return view('livewire.students.index', compact('students'));
    }
}
