<x-layout>
    <x-slot name="title">
        Add New Post - My BBS
    </x-slot>

    <div class="back-link">
        {{-- &laquo; <a href="/">Back</a> --}}

        {{-- 以下も同じ意味ですが、ページの別名を使っています "/"を>name('posts.index') --}}
        <a class="btn-success btn-lg h-auto" href="{{ route('posts.index') }}">戻る</a>

        </div>
        {{-- ページに表示されるのは＄pots[i]の格納されている文字列 --}}
        <h2>新しい投稿登録</h2>
        <form method="post" action="{{ route('posts.store') }}">
            @csrf

            <div class="form-group">
                <label>
                    Title
                    <input type="text" name="title" value="{{ old('title') }}">
                </label>
                @error('title')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>
                    Body
                    <textarea name="body">{{ old('body') }}</textarea>
                </label>
                @error('body')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-button2">
                <button class="btn-success btn-lg h-auto">投稿</button>
            </div>

        </form>
</x-layout>

