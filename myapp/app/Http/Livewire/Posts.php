<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post; //作成したpostモデルを使うことを宣言
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class Posts extends Component //PostsクラスにComponentクラスを継承する　componentは親クラス
{
    //renderが呼び出されたら、$postsを定義。
    //compact関数で$postsを渡す
    public function render()
    {
        $posts = Post::orderby('updated_at', 'DESC')->get(); //Postクラスの呼び出し　::　$postsに入れる
        return view('livewire.posts.index', compact('posts')); //compact関数で$posts変数を返す
    }

    // public $ids;
    // public $created_at; //作成時間
    // public $updated_at; //
    public $user_id;
    public $title;
    public $body;
    public $modalStatus;

    public function openModal()
    {
        $this->resetInputFields();
        $this->modalStatus = true;
    }

    public function closeModal()
    {
        $this->modalStatus = false;
    }

    public function resetInputFields()
    {
        $this->title = '';
        $this->body = '';
    }

    public function store(Request $request)
    {
        //バリデーションして入力を必須とする。
        $validatedData = $this->validate([
        'title' => 'required',
            'body' => 'required',
        ]);

        // dd($request->all());
        Post::create([
            'title' => $validatedData['title'], //validateしたデータをtitleに入力
            'body' => $validatedData['body'], //validateしたデータをbodyに入力
            'user_id' => auth()->id(), //認証済みのidを取得してuser_idに入力
        ]);
        session()->flash('message', '投稿しました。'); //flashメソッドを使ってsessionにmessageというデータを保存
        $this->resetInputFields();
        $this->closeModal();

    }

    public function save()
    {
        $this->validate();

        Post::create([
            "title" => $this->title,
            "body" => $this->body
        ]);

        $this->reset();
    }

}
