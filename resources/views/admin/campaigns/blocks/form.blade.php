  {{-- 🔵 FORM --}}
  <div class="bg-[#25A8D6] px-8 lg:px-20 py-20 text-white">

    <div class="max-w-2xl">
        <h2 class="text-3xl font-bold mb-6">
            Get Involved
        </h2>

        <form method="POST" action="/leads" class="flex flex-col space-y-6">
            @csrf

            <input
                class="h-[60px] px-6 rounded-full text-black"
                type="text" name="name" placeholder="Full Name" required>

            <div class="flex flex-col lg:flex-row gap-4">
                <input
                    class="w-full h-[60px] px-6 rounded-full text-black"
                    type="email" name="email" placeholder="Email Address" required>

                <input
                    class="w-full h-[60px] px-6 rounded-full text-black"
                    type="text" name="phone" placeholder="Phone Number" required>
            </div>

            <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">

            <button
                class="bg-[#26225F] py-4 rounded-full font-bold">
                SUBMIT
            </button>

        </form>
    </div>

</div>