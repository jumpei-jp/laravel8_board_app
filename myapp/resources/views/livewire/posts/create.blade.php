<div>
    <button type="button" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow" 
            wire:click.prevent="openModal()">新規追加</button>
    <x-jet-modal wire:model="modalStatus">
        <x-slot name="slot">
            <div class="flex justify-between items-center border-b p-2 text-xl">
                <div></div>
                <h6 class="text-xl font-bold">新規追加</h6>
                <button type="button" wire:click.prevent="closeModal()">×</button>
            </div>
            <div class="md:w-1/3">
                <label for="inline-title">タイトル</label>
                <input type="text" name="タイトル" wire:model="title">
                @error('title')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="md:w-1/3">
                <label for="inline-title">内容</label>
                <input type="text" name="内容" wire:model="body">
                @error('title')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            {{--<ul>
                @foreach($posts as $post)
                <li wire:key="{{ $post->id }}">
                    <a>{{ $post->title}}</a>
                </li>
                @endforeach
            </ul> --}}

            {{--<a href="{{route('posts.create')}}">作成</a>--}}
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="button" wire:click.prevent="store()">作成</button>
        </x-slot>
    </x-jet-modal>


</div>
