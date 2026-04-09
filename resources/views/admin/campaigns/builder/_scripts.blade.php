{{-- ═══ SCRIPTS ═════════════════════════════════════════════════════════════ --}}
{{-- PHP → JS data bridge (outside @verbatim so Blade processes it).          --}}
{{-- Must be a regular <script> (no defer/async) so pageBuilder() is in the   --}}
{{-- global scope before Alpine's deferred DOMContentLoaded handler fires.    --}}

{{-- 1. Expose server-side data as window globals --}}
<script>
    window.BUILDER_LAYOUT   = @json(is_array($campaign->layout) ? $campaign->layout : (json_decode($campaign->layout, true) ?? []));
    window.BUILDER_SECTIONS = @json($campaign->sections ?? []);
    window.BUILDER_SAVE_URL = "{{ route('admin.campaign.layout.update', $campaign->id) }}";
    window.BUILDER_CSRF     = "{{ csrf_token() }}";
</script>

{{-- 2. Load the page builder component (REGISTRY, helpers, pageBuilder())    --}}
<script src="{{ asset('js/page-builder.js') }}"></script>
