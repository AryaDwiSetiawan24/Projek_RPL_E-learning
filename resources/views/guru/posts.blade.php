<x-guru-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="mb-4py-4 px- mx-auto max-w-screen-xl lg:py-4 lg:px-0">
            <button type="button" class="mb-4 ml-4 inline-flex items-center rounded-md bg-gray-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500"><a href="{{ route('guru.create') }}">Unggah Materi</a></button>

            {{-- lg:grid-cols-3 untuk ubah tampilan posts --}}
             <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-1">
                @forelse ($posts as $post)
                    <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md">
                        <div class="flex justify-between items-center mb-5 text-gray-500">

                            {{-- Category/Tingkat Kelas --}}
                            <a href="/guru/posts?category={{ $post->category->slug }}">
                                <span
                                    class="bg-{{ $post->category->color }}-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded">
                                    {{ $post->category->name }}
                                </span>
                            </a>
                        </div>

                        {{-- Posts --}}
                        <a href="posts/{{ $post->slug }}">
                            <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 hover:underline">
                                {{ $post->title }}</h2>
                        </a>
                        <p class="mb-5 font-light text-gray-500">{{ Str::limit($post['body'], 150) }}</p>
                        <div class="flex justify-between items-center">

                            {{-- Author/Guru --}}
                            <a href="/guru/posts?author={{ $post->author->username }}">
                                <div class="flex items-center space-x-3">
                                    <img class="w-7 h-7 rounded-full"
                                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                                        alt="{{ $post->author->name }}" />
                                    <span class="font-medium text-xs">
                                        {{ $post->author->name }}
                                    </span>
                                </div>
                            </a>
                        </div>
                    </article>
                @empty
                    <div>
                        <p class="font-semibold text-xl my-4">Kelas tidak ditemukan!</p>
                        <a href="/guru/posts" class="block text-blue-600">&laquo; Kembali ke semua kelas</a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-guru-layout>
