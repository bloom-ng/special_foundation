  {{-- 🔵 TESTIMONIAL --}}
  @if ($campaign->testimonial)
  <div class="px-8 lg:px-20 my-20">
      <div class="bg-[#26225F] text-white p-10 rounded-2xl text-center italic text-lg">
          “{!! $campaign->testimonial !!}”
      </div>
  </div>
@endif