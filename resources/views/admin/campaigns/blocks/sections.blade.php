  {{-- 🔵 SECTIONS --}}
  @if ($campaign->sections)
  <div class="px-8 lg:px-20 space-y-16">

      @foreach ($campaign->sections as $section)
          <div class="max-w-4xl">

              @if (!empty($section["title"]))
                  <h3 class="text-2xl font-bold text-[#26225F] mb-4">
                      {{ $section["title"] }}
                  </h3>
              @endif

              @if (!empty($section["content"]))
                  <div class="text-lg leading-relaxed">
                      {!! $section["content"] !!}
                  </div>
              @endif

          </div>
      @endforeach

  </div>
@endif