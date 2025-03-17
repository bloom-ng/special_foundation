<x-guest-layout title="Event Registration - {{ $event->name }}" page="events">
    <div class="relative bg-cover bg-center h-40 bg-[#26225F] bg-blend-multiply"
        style="background-image: url('{{ asset('/images/rectangle-background.png') }}');">
        <div class="h-full">
            <div class="h-full flex flex-row justify-center items-center text-[30px] lg:text-[48px] montserrat-bold font-extrabold text-[#25A8D6]">
                {{ $event->name }}
            </div>
        </div>
    </div>

    <div class="w-full py-20 px-8 lg:px-20">
        <div class="w-full max-w-4xl mx-auto">
            <div class="bg-[#25A8D6] rounded-lg p-8">
                <div class="mb-8">
                    <h1 class="text-[#26225F] text-[32px] pb-2 montserrat-bold font-extrabold">
                        Register for {{ $event->name }}
                    </h1>
                    <p class="text-white montserrat-medium text-lg font-semibold">
                        Fill in the form below to register for this event. We'll get back to you with more details.
                    </p>
                </div>

                <form method="POST" action="{{ route('events.submit-registration', ['eventId' => $event->id]) }}" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div>
                            <input class="w-full rounded-full px-6 py-3.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#26225F]" 
                                   name="first_name"
                                   type="text" 
                                   placeholder="First Name" 
                                   required />
                            @error('first_name')
                                <p class="text-red-800 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <input class="w-full rounded-full px-6 py-3.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#26225F]" 
                                   name="last_name"
                                   type="text" 
                                   placeholder="Last Name" 
                                   required />
                            @error('last_name')
                                <p class="text-red-800 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div>
                            <input class="w-full rounded-full px-6 py-3.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#26225F]" 
                                   name="email"
                                   type="email" 
                                   placeholder="Email Address" 
                                   required />
                            @error('email')
                                <p class="text-red-800 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <input class="w-full rounded-full px-6 py-3.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#26225F]" 
                                   name="phone_number"
                                   type="text" 
                                   placeholder="Phone Number" 
                                   required />
                            @error('phone_number')
                                <p class="text-red-800 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div>
                            <input class="w-full rounded-full px-6 py-3.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#26225F]" 
                                   name="company"
                                   type="text" 
                                   placeholder="Company/Organization (Optional)" />
                            @error('company')
                                <p class="text-red-800 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex items-center px-6">
                            <label class="text-white mr-4 montserrat-medium">Will you attend?</label>
                            <label class="inline-flex items-center mr-4">
                                <input type="radio" name="will_attend" value="1" checked class="text-[#26225F]">
                                <span class="ml-2 text-white">Yes</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="will_attend" value="0" class="text-[#26225F]">
                                <span class="ml-2 text-white">No</span>
                            </label>
                            @error('will_attend')
                                <p class="text-red-800 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-center mt-8">
                        <button type="submit" class="bg-[#26225F] text-white px-12 py-3 rounded-full hover:bg-opacity-90 transition-colors montserrat-medium">
                            Submit Registration
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
