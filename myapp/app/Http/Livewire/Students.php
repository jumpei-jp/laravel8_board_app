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

    public $ids;
    public $firstname;
    public $lastname;
    public $email;
    public $phone;
    public $modalStatus;

    public function openModal() //modalStatusをtrueにしmodalを表示する
    {
        $this->resetInputFields();
        $this->modalStatus = true;
    }

    public function closeModal() //modalStatusをfalseにしmodalを閉じる
    {
        $this->modalStatus = false;
    }

    public function resetInputFields() //Inputタグの中身を空にする
    {
        $this->firstname = '';
        $this->lastname = '';
        $this->email = '';
        $this->phone = '';
    }

    public function store() //バリデーションをした後に、生徒のデータを保存
    {
        $validatedData = $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);
        Student::create($validatedData);
        session()->flash('message', '新規投稿に成功しました。');
        $this->resetInputFields();
        $this->closeModal();
    }

}

