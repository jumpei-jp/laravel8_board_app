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
        session()->flash('message', 'successed create new user');
        $this->resetInputFields();
        $this->closeModal();
    }

    public $modalUpdateStatus;

    public function openUpdateModal($id) //
        {
            $student = Student::where('id', $id)->first();
            $this->ids = $student->id;
            $this->firstname = $student->firstname;
            $this->lastname = $student->lastname;
            $this->email = $student->email;
            $this->phone = $student->phone;
            $this->modalUpdateStatus = true;
        }

    public function closeUpdateModal()
        {
            $this->modalUpdateStatus = false;
        }

    public function update()
        {
            $validatedData = $this->validate([
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
            ]);
            if ($this->ids) {
                $student = Student::find($this->ids);
                $student->update([
                    'firstname' => $this->firstname,
                    'lastname' => $this->lastname,
                    'email' => $this->email,
                    'phone' => $this->phone,
                ]);
                session()->flash('message', '投稿の編集に成功しました。');
                $this->resetInputFields();
                $this->closeUpdateModal();
            }
        }

    public function delete($id)
        {
            if($id)
            {
                Student::where('id', $id)->delete();
                session()->flash('message', '投稿の削除に成功しました。');
            }
        }


}

