 {{-- 🔵 STATS --}}
 @if (!empty($campaign->stats))
 <div class="px-8 lg:px-20 pb-20">
     <div class="grid md:grid-cols-3 gap-6">

         @foreach ($campaign->stats as $stat)
             <div class="bg-[#F5FAFD] border border-[#25A8D6] p-8 rounded-xl text-center">

                 <div class="flex items-center justify-center text-[#26225F]">

                     <h3 class="montserrat-bold text-3xl md:text-4xl ">
                         {{ $stat["number"] ?? "" }}
                     </h3>

                     <span class="montserrat-bold text-3xl md:text-4xl ml-1">
                         +
                     </span>

                 </div>

                 <div class="montserrat-thin font-normal w-inherit">
                     {{ $stat["label"] ?? "" }}
                 </div>

             </div>
         @endforeach

     </div>
 </div>
@endif