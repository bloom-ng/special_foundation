@php
    $columns  = $section['children'] ?? [];
    $direction = $section['direction'] ?? 'row';
    $isRow    = $direction !== 'column';
@endphp

<div class="builder-section" style="
    display: flex;
    flex-direction: {{ $isRow ? 'row' : 'column' }};
    gap: 16px;
    flex-wrap: nowrap;
    align-items: stretch;
">
    @foreach ($columns as $col)
        <div style="{{ $isRow ? 'flex:1; min-width:0;' : 'width:100%;' }}
            display:flex; flex-direction:column; gap:12px;">
            @foreach ($col['children'] ?? [] as $block)
                @include('partials.block', ['block' => $block])
            @endforeach
        </div>
    @endforeach
</div>
