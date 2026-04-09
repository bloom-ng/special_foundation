@php
    $type = $block['type'] ?? 'unknown';
    $d    = $block['data'] ?? [];
    $kids = $block['children'] ?? [];
@endphp

@switch($type)

    {{-- ── Hero ── --}}
    @case('hero')
        <div style="
            background: {{ $d['bgColor'] ?? '#1a1a2e' }};
            padding: 60px 32px;
            text-align: {{ $d['textAlign'] ?? 'center' }};
            border-radius: 0px;
        ">
            <h1 style="margin:0 0 16px; font-size:clamp(28px,5vw,52px); font-weight:800; color:#fff; line-height:1.2;">
                {{ $d['title'] ?? '' }}
            </h1>
            @if (!empty($d['text']))
                <p style="margin:0 0 28px; font-size:18px; color:rgba(255,255,255,.75); max-width:640px; margin-left:auto; margin-right:auto;">
                    {{ $d['text'] }}
                </p>
            @endif
            @if (!empty($d['ctaText']))
                <a href="{{ $d['ctaLink'] ?? '#' }}"
                   style="display:inline-block; padding:14px 32px; background:#4f7dff; color:#fff; border-radius:8px; font-size:16px; font-weight:700; text-decoration:none;">
                    {{ $d['ctaText'] }}
                </a>
            @endif
        </div>
    @break

    {{-- ── Text ── --}}
    @case('text')
        <p style="
            margin: 0;
            font-size: {{ $d['fontSize'] ?? '16px' }};
            font-weight: {{ $d['fontWeight'] ?? '400' }};
            text-align: {{ $d['textAlign'] ?? 'left' }};
            color: {{ $d['color'] ?? 'inherit' }};
        ">{{ $d['content'] ?? '' }}</p>
    @break

    {{-- ── Image ── --}}
    @case('image')
        @if (!empty($d['src']))
            <img
                src="{{ $d['src'] }}"
                alt="{{ $d['alt'] ?? '' }}"
                style="
                    width: 100%;
                    height: {{ ($d['height'] ?? 200) }}px;
                    object-fit: {{ $d['objectFit'] ?? 'cover' }};
                    border-radius: 8px;
                    display: block;
                "
            >
        @endif
    @break

    {{-- ── Video ── --}}
    @case('video')
        @php
            $url = $d['url'] ?? '';
            $embed = null;
            if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]+)/', $url, $m)) {
                $embed = "https://www.youtube.com/embed/{$m[1]}";
            } elseif (preg_match('/vimeo\.com\/(\d+)/', $url, $m)) {
                $embed = "https://player.vimeo.com/video/{$m[1]}";
            } else {
                $embed = $url ?: null;
            }
            $aspect = $d['aspect'] ?? '16/9';
        @endphp
        @if ($embed)
            <div style="position:relative; aspect-ratio:{{ $aspect }}; background:#000; border-radius:8px; overflow:hidden;">
                <iframe src="{{ $embed }}"
                        style="position:absolute;inset:0;width:100%;height:100%;border:none;"
                        allowfullscreen
                        {{ !empty($d['autoplay']) ? 'allow="autoplay"' : '' }}>
                </iframe>
            </div>
        @endif
    @break

    {{-- ── Button ── --}}
    @case('button')
        @php
            $styles = [
                'primary'   => 'background:#4f7dff;color:#fff;border:none;',
                'secondary' => 'background:#2a3352;color:#e8edf8;border:none;',
                'outline'   => 'background:transparent;color:#4f7dff;border:2px solid #4f7dff;',
            ];
            $btnStyle = $styles[$d['style'] ?? 'primary'] ?? $styles['primary'];
        @endphp
        <div style="text-align:center; padding:8px 0;">
            <a href="{{ $d['link'] ?? '#' }}"
               style="{{ $btnStyle }} padding:12px 28px; border-radius:8px; font-size:15px; font-weight:700; text-decoration:none; display:inline-block; cursor:pointer;">
                {{ $d['label'] ?? 'Button' }}
            </a>
        </div>
    @break

    {{-- ── Divider ── --}}
    @case('divider')
        <hr style="
            border: none;
            border-top: 1.5px {{ $d['lineStyle'] ?? 'solid' }} {{ $d['color'] ?? '#e5e7eb' }};
            margin: {{ $d['margin'] ?? 16 }}px 0;
        ">
    @break

    {{-- ── Spacer ── --}}
    @case('spacer')
        <div style="height: {{ $d['height'] ?? 40 }}px;"></div>
    @break

    {{-- ── Flex Div (container) ── --}}
    @case('flex-div')
        <div style="
            display: flex;
            flex-direction: {{ $d['flexDir'] ?? 'row' }};
            gap: {{ $d['gap'] ?? 16 }}px;
            padding: {{ $d['padding'] ?? 16 }}px;
            background: {{ $d['bgColor'] ?? 'transparent' }};
            align-items: {{ $d['alignItems'] ?? 'stretch' }};
            justify-content: {{ $d['justifyContent'] ?? 'flex-start' }};
            border-radius: 8px;
        ">
            @foreach ($kids as $child)
                @include('partials.block', ['block' => $child])
            @endforeach
        </div>
    @break

    {{-- ── Grid Div (container) ── --}}
    @case('grid-div')
        <div style="
            display: grid;
            grid-template-columns: repeat({{ $d['gridCols'] ?? 2 }}, 1fr);
            gap: {{ $d['gap'] ?? 16 }}px;
            padding: {{ $d['padding'] ?? 16 }}px;
            background: {{ $d['bgColor'] ?? 'transparent' }};
            border-radius: 8px;
        ">
            @foreach ($kids as $child)
                @include('partials.block', ['block' => $child])
            @endforeach
        </div>
    @break

    {{-- ── Columns (container) ── --}}
    @case('columns')
        <div style="
            display: flex;
            gap: {{ $d['gap'] ?? 16 }}px;
            flex-wrap: wrap;
        ">
            @foreach ($kids as $child)
                <div style="flex:1; min-width:200px;">
                    @include('partials.block', ['block' => $child])
                </div>
            @endforeach
        </div>
    @break

    @default
        {{-- Unknown block type: silently ignore in production --}}
    @break

@endswitch
