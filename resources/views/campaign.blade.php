<x-guest-layout
    :title="$campaign->title"
    page="campaign"
>

    @php
        $layout = is_array($campaign->layout) ? $campaign->layout : (json_decode($campaign->layout, true) ?? []);
    @endphp

    @foreach ($layout as $section)
        @include('partials.section', ['section' => $section])
    @endforeach

</x-guest-layout>