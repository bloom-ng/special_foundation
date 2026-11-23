<x-admin-layout :page="'support-options'" :title="'Create Card'">
    <main class="w-full flex-grow p-6">
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Please fix the following errors:</strong>
                <ul class="mt-2">
                    @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                </ul>
            </div>
        @endif

        <div class="flex justify-between items-center">
            <h1 class="text-3xl text-black pb-6">Create Card</h1>
            <a href="{{ route('admin.support-options.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">Back to Cards</a>
        </div>

        <form method="POST" action="{{ route('admin.support-options.store') }}" enctype="multipart/form-data" class="bg-white rounded-lg shadow-md p-6 mt-6">
            @csrf
            @include('admin.support-options._fields', ['option' => null])
            <div class="flex items-center justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Card</button>
            </div>
        </form>
    </main>
</x-admin-layout>
