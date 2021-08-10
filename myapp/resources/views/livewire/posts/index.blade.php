<div>
    @include('livewire.posts.create')
    <table class="table-auto">　
        <thead>
            <tr>
                <th class="px-4 py-2">ユーザID</th>
                <th class="px-4 py-2"> 更新時刻</th>
                <th class="px-4 py-2">タイトル</th>
                <th class="px-4 py-2">内容</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr class="bg-blue-200">
                <td class="border px-4 py-2">{{ $post->user_id}}</td>
                <td class="border px-4 py-2">{{ $post->updated_at}}</td>
                <td class="border px-4 py-2">{{ $post->title}}</td>
                <td class="border px-4 py-2">{{ $post->body}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
