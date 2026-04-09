 {{-- 🔵 HEADER / HERO --}}
 <div class="relative bg-cover bg-center h-40 bg-[#26225F] bg-blend-multiply"
 style="background-image: url('{{ $campaign->banner_image ? asset("storage/" . $campaign->banner_image) : asset("/images/rectangle-background.png") }}');">

 <div class="h-full flex items-center justify-center">
     <h1 class="text-[30px] lg:text-[48px] font-extrabold text-[#25A8D6] text-center">
         {{ $campaign->title }}
     </h1>
 </div>
</div>