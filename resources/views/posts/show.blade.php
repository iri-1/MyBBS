{{-- {{ var_dump($post) }}; --}}
{{-- {{dd($post)}} --}}
<x-layout>
    <x-slot name="title">
        {{ $post->title }} -My BBS
    </x-slot>
    <div class="back-link">
    {{-- &laquo; <a href="/">Back</a> --}}
    {{-- 以下も同じ意味ですが、ページの別名を使っています "/"を>name('posts.index') --}}
        &laquo; <a href="{{ route('posts.index') }}">Back</a>

        </div>
        {{-- ページに表示されるのは＄pots[i]の格納されている文字列 --}}
        <h1>
           <span> {{ $post->title }} </span>
            <a href="{{ route('posts.edit', $post)}}">Edit</a>

            <form method="post" action="{{ route('posts.destroy', $post)}}" id="delete_post">
                @method('DELETE')
                @csrf
                <button class="btn">[❌]</button>
            </form>
        </h1>

        {{-- <p>{{ $post->body }}</p> --}}
        {{-- 改行もちゃんと改行されるための修正 --}}
        <p>{!! nl2br(e($post->body)) !!}</p>
    <script>
        'use strict'

        {
            document.getElementById('delete_post').addEventListener('submit', e => {
                e.preventDefault();

                if (!confirm('本当に削除してもいいですか？')){
                    return;
                }
                e.target.submit();
            });
        }
    </script>
</x-layout>

