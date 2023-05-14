<x-layout>
    <x-slot name="title">
        My BBS
    </x-slot>
    <h1>
       <span> My BBS (new)</span>
        <a href=" {{route('posts.create') }}">[Add]</a>
    </h1>

    <ul>
        {{-- @foreach ($posts as $post)
            <li>{{ $post }}</li>
        @endforeach --}}

        @forelse ($posts as $post)
        <li>
            {{-- <a href="/posts/{{$index}}"> --}}
            {{-- <a href="{{route('posts.show', $post->id)}}"> --}}
            <a href="{{route('posts.show', $post)}}">
            {{ $post->title }}
            </a>
        </li>
        @empty
        <li> NO posts yet!</li>
        @endempty
    </ul>
</x-layout>
