 {{-- 🔵 COUNTDOWN --}}
 @if ($campaign->show_countdown && $campaign->countdown_date)
 <div class="text-center py-10">
     <div id="countdown" class="text-3xl lg:text-4xl font-bold text-[#25A8D6]"></div>
 </div>

 <script>
     var countDownDate = new Date("{{ $campaign->countdown_date }}").getTime();

     setInterval(function() {
         var now = new Date().getTime();
         var distance = countDownDate - now;

         var d = Math.floor(distance / (1000 * 60 * 60 * 24));
         var h = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
         var m = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
         var s = Math.floor((distance % (1000 * 60)) / 1000);

         document.getElementById("countdown").innerHTML =
             d + "d " + h + "h " + m + "m " + s + "s";
     }, 1000);
 </script>
@endif
