<x-admin-layout title="Admin | Edit Media Mention" page="media-mentions">

    <main class="w-full flex-grow p-6">
        <div class="flex justify-between items-center">
            <h1 class="text-3xl text-black pb-6">Edit Media Mention</h1>
            <a href="{{ url('/admin/media-mentions') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
                Back to Media Mentions
            </a>
        </div>
        <div class="w-full mt-6">
            <form method="POST" action="/admin/media-mentions/{{ $mention->id }}" class="bg-white rounded-lg shadow-md p-6">
                @csrf
                @method('PUT')
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="title">Title</label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('name') border-red-500 @enderror rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                            id="title" name="title" type="text" required placeholder="e.g. Kaleidoscope (Channels TV)" aria-label="Title" value="{{ old('title', $mention->title) }}">
                        <!-- <p class="text-sm text-gray-500 mt-1">You can add simple text. If you need a line break, you can include a <br> tag.</p> -->
                    </div>

                    <div class="w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="url">Link (URL)</label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('name') border-red-500 @enderror rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                            id="url" name="url" type="url" required placeholder="https://example.com" aria-label="Link" value="{{ old('url', $mention->url) }}">
                    </div>
                </div>
                <div class="flex items-center justify-end">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Save</button>
                </div>
            </form>
        </div>

    </main>

</x-admin-layout>
