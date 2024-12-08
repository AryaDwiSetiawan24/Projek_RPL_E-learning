<x-guru-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article
                class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <a href="/guru/posts" class="font-bold text-sm text-blue-600 hover:underline">&laquo; Kembali ke
                        semua kelas</a>
                    <address class="flex items-center my-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                                alt="{{ $post->author->name }}">
                            <div>
                                <a href="/guru/posts?author={{ $post->author->username }}" rel="author"
                                    class="text-xl font-bold text-gray-900 dark:text-white">{{ $post->author->name }}</a>
                                <p class="text-base mb-1 text-gray-500 dark:text-gray-400">
                                    {{ $post->created_at->diffForHumans() }}</p>
                                <a href="/guru/posts?category={{ $post->category->slug }}"> <span
                                        class="bg-{{ $post->category->color }}-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                        {{ $post->category->name }}
                                    </span>
                                </a>
                            </div>
                        </div>
                    </address>
                    <h1
                        class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                        {{ $post->title }}</h1>
                </header>
                {{-- menampilka body --}}
                <p class="lead">{{ $post->body }}</p>

                {{-- isi materi --}}
                <div class="container">
                    <a href="{{ route('guru.create') }}"><button type="button"
                            class="inline-flex items-center rounded-md bg-gray-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Unggah
                            Materi</button></a>
                            @forelse ($materials as $material)

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Diunggah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @forelse ($materials as $material) --}}
                                <tr>
                                    <td>{{ $material->title }}</td>
                                    <td>{{ $material->description }}</td>
                                    <td>{{ $material->created_at->diffForHumans() }}</td>
                                    <td class="px-4 py-2">
                                        <div class="flex space-x-2" role="group" aria-label="Basic example">
                                            <a href="{{ route('materials.edit', $material->id) }}">
                                                <button type="button"
                                                    class="inline-flex items-center rounded-md bg-yellow-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-yellow-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-500">Edit</button>
                                            </a>
                                            <a href="{{ route('materials.show', $material->id) }}" target="_blank">
                                                <button type="button"
                                                    class="inline-flex items-center rounded-md bg-gray-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-800">Lihat</button></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                </tbody>
                            </table>
                        </div>
                        @empty
                            <div>
                                <p class="text-center font-semibold text-m my-4">Belum ada materi!</p>
                            </div>
                        </tr>
                        @endforelse
                </article>
            </div>
        </main>

    </x-guru-layout>
