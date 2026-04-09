<x-admin-layout :page="'campaigns'" :title="'Builder — ' . $campaign->title">

@push('styles')
    @include('admin.campaigns.builder._styles')
@endpush

{{-- Toast notification (outside Alpine scope so it is accessible via getElementById) --}}
<div id="bl-toast"></div>

{{-- ═══ BUILDER WRAPPER ════════════════════════════════════════════════════ --}}
{{-- x-data mounts the pageBuilder() Alpine component defined in page-builder.js. --}}
{{-- Event listeners handle keyboard shortcuts and dispatched viewport events.  --}}
<div class="builder-wrap"
     x-data="pageBuilder()"
     @builder-save.window="save()"
     @set-viewport.window="viewport = $event.detail"
     @keydown.escape.window="selected = null; selectedId = null">

    {{-- Left: element palette --}}
    @include('admin.campaigns.builder._sidebar')

    {{-- Centre: topbar + canvas --}}
    <div class="flex flex-col flex-1 min-w-0">
        @include('admin.campaigns.builder._topbar')
        @include('admin.campaigns.builder._canvas')
    </div>

    {{-- Right: block settings panel --}}
    @include('admin.campaigns.builder._panel')

</div>{{-- /builder-wrap --}}

@push('scripts')
    @include('admin.campaigns.builder._scripts')
@endpush

</x-admin-layout>
