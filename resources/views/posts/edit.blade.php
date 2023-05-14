<x-layout>
    <x-slot name="title">
        Edit Post - My BBS
    </x-slot>

    <div class="back-link">
        {{-- &laquo; <a href="/">Back</a> --}}

        {{-- 以下も同じ意味ですが、ページの別名を使っています "/"を>name('posts.index') --}}
     <a class="btn-success btn-lg h-auto" href="{{ route('posts.show' ,$post) }}">Back</a>

        </div>
        {{-- ページに表示されるのは＄pots[i]の格納されている文字列 --}}
        <h1>投稿修正</h1>
        <form method="post" action="{{ route('posts.update',$post)}}">
            @method('PATCH')
            @csrf

            <div class="form-group">
                <label>
                    Title
                    <input type="text" name="title" value="{{ old('title', $post->title) }}">
                </label>
                @error('title')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>
                    Body
                    <textarea name="body">{{ old('body', $post->body) }}</textarea>
                </label>
                @error('body')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-button">
                <button class="btn-success btn-lg h-auto">更新</button>
            </div>

        </form>
</x-layout>

