<div class="bg-[#25A8D6] px-12 lg:px-20 py-20">
    <div>
        <h1 class="text-[#26225F] text-[35px] pb-2 poppins-bold">
            Apply Now
        </h1>
        <p class="text-white poppins-medium text-sm">
            Fill in the form below to initiate application and we’d
            get back to you as soon as possible.
        </p>
    </div>
    <form method="POST" action="/beneficiaries" class="py-10 flex flex-col gap-4">
        @csrf
        <div class="flex flex-row flex-wrap lg:flex-nowrap gap-4">
            <input class="basis-full lg:basis-1/2 rounded-full ps-10 placeholder:text-xs py-3.5" name="name"
                type="text" placeholder="Name of Beneficiary" required />
            <input class="basis-full lg:basis-1/2 rounded-full ps-10 placeholder:text-xs py-3.5" name="email"
                type="email" placeholder="Email Address" required />
        </div>
        <div class="flex flex-row flex-wrap lg:flex-nowrap gap-4">
            <input class="basis-full lg:basis-1/2 rounded-full ps-10 placeholder:text-xs py-3.5" name="contact_number"
                type="text" placeholder="Contact Number" required />
            <input class="basis-full lg:basis-1/2 rounded-full ps-10 placeholder:text-xs py-3.5"
                name="area_of_residence" type="text" placeholder="Area of Residence" required />
        </div>
        <div class="relative flex flex-row gap-4">
            <input class="w-full rounded-full ps-10 placeholder:text-xs py-3.5" type="number"
                value="{{ $programme }}" placeholder="Program Applying To" hidden name="programme" />
            <div class="w-full">
                <textarea class="w-full h-72 rounded-3xl ps-10 placeholder-start-0 placeholder:text-xs py-3.5"
                    placeholder="Purpose for Application" name="purpose_of_application" required></textarea>
            </div>
        </div>

        <button type="submit" class="text-white bg-[#26225F] px-20 py-2 rounded-full w-fit">Submit</button>
    </form>
</div>
