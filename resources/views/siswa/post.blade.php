<x-siswa-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <main class="rounded-lg pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article
                class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <a href="/siswa/posts" class="font-medium text-sm text-blue-600 hover:underline">&laquo; Kembali ke semua kelas</a>
                    <address class="flex items-center my-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                                alt="{{ $post->author->name }}">
                            <div>
                                <a href="/siswa/posts?author={{ $post->author->username }}" rel="author"
                                    class="text-xl font-bold text-gray-900 dark:text-white">{{ $post->author->name }}</a>
                                <p class="text-base mb-1 text-gray-500 dark:text-gray-400">
                                    {{ $post->created_at->diffForHumans() }}</p>
                                <a href="/siswa/posts?category={{ $post->category->slug }}"> <span
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
                <p>{{ $post->body }}</p>

                {{-- materi --}}
                <div class="container">
                    @forelse ($materials as $material)
                        <div class="card bg-gray-100 shadow-md rounded-lg p-4 mb-4">
                            <h2 class="text-xl font-bold text-gray-800">{{ $material->title }}</h2>
                            <p class="text-sm text-gray-500">
                                {{ $post->created_at->diffForHumans() }}</p>
                                <p class="text-sm text-gray-600 mb-2">Pengunggah: {{ $material->uploader->name }}</p>
                            <p class="text-base text-gray-700 mb-4">Deskripsi: {{ $material->description }}</p>
                            <a href="{{ route('siswa.showMaterials', $material->id) }}" target="_blank">
                                <button type="button"
                                    class="text-sm bg-gray-800 text-white py-2 px-4 rounded-md hover:bg-indigo-700">
                                    Lihat Materi
                                </button>
                            </a>
                        </div>
                    @empty
                    <div class="card border border-gray-200 rounded-lg p-4 mb-4 text-center">
                        <p class="text-lg text-gray-500">Belum ada materi!!</p>
                    </div>
                    @endforelse
                </div>

            </article>
        </div>
    </main>

</x-siswa-layout>
