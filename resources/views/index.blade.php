<x-layout>
    <x-slot name="title">
        My BBS
    </x-slot>

    <h1>My BBS</h1>
    {{-- <ul>
        {{-- <li><?php echo htmlspecialchars($posts[0], ENT_QUOTES, 'UTF-8'); ?></li> --}}
        {{-- <li>{{ $posts[0] }}</li>
        <li>{{ $posts[1] }}</li>
        <li>{{ $posts[2] }}</li> --}}
    {{-- </ul> --}}

    {{-- Bladeでのループ処理方法 --}}
            {{-- ↓ --}}
    <ul>
        {{-- @foreach ($posts as $post)
            <li>{{ $post }}</li>
        @endforeach --}}


        {{-- データに空があった時の分岐のループ --}}
        @forelse ($posts as $post)
            <li>
                <a href="{{ route('posts.show', $post) }}">
                {{ $post->title }}
                </a>
            </li>
        @empty
            <li>No posts yet!</li>
        @endforelse
    </ul>
</x-layout>
