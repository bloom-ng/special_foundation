@php
    $inputClass = 'appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white';
@endphp

<div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="group">Group</label>
        <select class="{{ $inputClass }}" id="group" name="group" required>
            @foreach (\App\Models\SupportOption::getGroups() as $value => $label)
                <option value="{{ $value }}" {{ old('group', $option->group ?? '') === $value ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
    </div>

    <div class="w-full md:w-1/2 px-3 mb-6">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="sort_order">Display Order</label>
        <input class="{{ $inputClass }}" id="sort_order" type="number" min="0" name="sort_order"
               value="{{ old('sort_order', $option->sort_order ?? 0) }}">
        <p class="text-sm text-gray-500 mt-1">Lower numbers appear first within the group.</p>
    </div>

    <div class="w-full px-3 mb-6">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="title">Heading</label>
        <input class="{{ $inputClass }}" id="title" type="text" name="title" value="{{ old('title', $option->title ?? '') }}" required>
    </div>

    <div class="w-full px-3 mb-6">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="body">Copy</label>
        <textarea class="{{ $inputClass }}" id="body" name="body" rows="3">{{ old('body', $option->body ?? '') }}</textarea>
        <p class="text-sm text-gray-500 mt-1">Two to three lines reads best.</p>
    </div>

    <div class="w-full md:w-1/2 px-3 mb-6">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="button_label">Button label</label>
        <input class="{{ $inputClass }}" id="button_label" type="text" name="button_label" value="{{ old('button_label', $option->button_label ?? '') }}" required>
    </div>

    <div class="w-full md:w-1/2 px-3 mb-6">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="button_url">Button link</label>
        <input class="{{ $inputClass }}" id="button_url" type="text" name="button_url" value="{{ old('button_url', $option->button_url ?? '') }}" required>
        <p class="text-sm text-gray-500 mt-1">A path such as /donate, or a full https:// address.</p>
    </div>

    <div class="w-full md:w-1/2 px-3 mb-6">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="secondary_label">Second button label</label>
        <input class="{{ $inputClass }}" id="secondary_label" type="text" name="secondary_label" value="{{ old('secondary_label', $option->secondary_label ?? '') }}">
        <p class="text-sm text-gray-500 mt-1">Optional.</p>
    </div>

    <div class="w-full md:w-1/2 px-3 mb-6">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="secondary_url">Second button link</label>
        <input class="{{ $inputClass }}" id="secondary_url" type="text" name="secondary_url" value="{{ old('secondary_url', $option->secondary_url ?? '') }}">
    </div>

    <div class="w-full px-3 mb-6">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="image">Image</label>
        <input class="{{ $inputClass }}" id="image" type="file" name="image" accept="image/jpeg,image/png,image/jpg,image/webp">
        <p class="text-sm text-gray-500 mt-1">Landscape, recommended 800×500 px. Leave empty to keep the current image.</p>
        @if (! empty($option?->image))
            <img class="h-20 w-32 mt-3 rounded object-cover border border-[#25A8D6]" src="{{ asset('storage/' . $option->image) }}" alt="{{ $option->title }}">
        @endif
    </div>

    <div class="w-full md:w-1/2 px-3 mb-6">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="track_id">Tracking name</label>
        <input class="{{ $inputClass }}" id="track_id" type="text" name="track_id" value="{{ old('track_id', $option->track_id ?? '') }}">
        <p class="text-sm text-gray-500 mt-1">Used to report clicks on this card, e.g. sponsor-a-scholar.</p>
    </div>

    <div class="w-full md:w-1/2 px-3 mb-6">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="status">Shown on the page</label>
        <select class="{{ $inputClass }}" id="status" name="status" required>
            <option value="active" {{ old('status', $option->status ?? 'active') === 'active' ? 'selected' : '' }}>Shown</option>
            <option value="inactive" {{ old('status', $option->status ?? 'active') === 'inactive' ? 'selected' : '' }}>Hidden</option>
        </select>
    </div>
</div>
