@php
    $columns = $section['children'] ?? [];
    $colCount = count($columns) ?: 1;
@endphp

<div class="builder-section" style="display:flex; gap:16px; padding:0; flex-wrap:wrap;">

    @foreach ($columns as $col)
        <div style="flex:1; min-width:0;">
            @foreach ($col['children'] ?? [] as $block)
                @include('campaigns.partials.block', ['block' => $block])
            @endforeach
        </div>
    @endforeach

</div>
