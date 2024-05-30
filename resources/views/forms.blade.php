<x-admin-layout title="Admin | Forms" page="forms">

            <main class="w-full flex-grow p-6">
                <h1 class="w-full text-3xl text-black pb-6">Forms</h1>

                <div class="flex flex-wrap">
                    <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
                        <p class="text-xl pb-6 flex items-center">
                            <i class="fas fa-list mr-3"></i> Contact Form
                        </p>
                        <div class="leading-loose">
                            <form class="p-10 bg-[#25A8D6] rounded shadow-xl">
                                <div class="pb-2">
                                    <label class=" block text-sm text-white pb-1" for="name">Name</label>
                                    <input class="w-full rounded-full px-5 py-1 text-black bg-white  rounded" id="name" name="name" type="text" required="" placeholder="Your Name" aria-label="Name">
                                </div>
                                <div class="mt-2">
                                    <label class="block text-sm text-white pb-1" for="email">Email</label>
                                    <input class="w-full px-5 rounded-full py-4 text-black bg-white  rounded" id="email" name="email" type="text" required="" placeholder="Your Email" aria-label="Email">
                                </div>
                                <div class="mt-2">
                                    <label class=" block text-sm text-white pb-1" for="message">Message</label>
                                    <textarea class="w-full px-5 rounded-3xl py-2 text-black bg-white  rounded" id="message" name="message" rows="6" required="" placeholder="Your inquiry.." aria-label="Email"></textarea>
                                </div>
                                <div class="mt-6">
                                    <button class="px-6 rounded-full py-1 text-white font-light tracking-wider bg-[#26225F] " type="submit">SUBMIT</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="w-full lg:w-1/2 mt-6 pl-0 lg:pl-2">
                        <p class="text-xl pb-6 flex items-center">
                            <i class="fas fa-list mr-3"></i> Checkout Form
                        </p>
                        <div class="leading-loose">
                            <form class="p-10 bg-[#25A8D6] rounded shadow-xl">
                                <div class="pb-2">
                                    <label class="block text-sm text-white pb-1" for="cus_name">Name</label>
                                    <input class="w-full px-5 py-1 text-black bg-white rounded-full" id="cus_name" name="cus_name" type="text" required="" placeholder="Your Name" aria-label="Name">
                                </div>
                                <div class="mt-2">
                                    <label class="block text-sm text-white pb-1" for="cus_email">Email</label>
                                    <input class="w-full px-5  py-4 text-black bg-white rounded-full" id="cus_email" name="cus_email" type="text" required="" placeholder="Your Email" aria-label="Email">
                                </div>
                                <div class="mt-2">
                                    <label class=" block text-sm text-white pb-1" for="cus_email">Address</label>
                                    <input class="w-full pl-4 px-2 py-2 text-black bg-white rounded-full" id="cus_email" name="cus_email" type="text" required="" placeholder="Street" aria-label="Email">
                                </div>
                                <div class="mt-2">
                                    <label class="hidden text-sm block text-white pb-1" for="cus_email">City</label>
                                    <input class="w-full pl-4 px-2 py-2 text-black bg-white rounded-full" id="cus_email" name="cus_email" type="text" required="" placeholder="City" aria-label="Email">
                                </div>
                                <div class="inline-block mt-2 w-1/2 pr-1">
                                    <label class="hidden block text-sm text-white pb-1" for="cus_email">Country</label>
                                    <input class="w-full pl-4 px-2 py-2 text-black bg-white rounded-full" id="cus_email" name="cus_email" type="text" required="" placeholder="Country" aria-label="Email">
                                </div>
                                <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
                                    <label class="hidden block text-sm text-white pb-1" for="cus_email">Zip</label>
                                    <input class="w-full pl-4 px-2 py-2 text-black bg-white rounded-full" id="cus_email"  name="cus_email" type="text" required="" placeholder="Zip" aria-label="Email">
                                </div>
                                <p class="text-lg text-white font-medium py-4">Payment information</p>
                                <div class="">
                                    <label class="block text-sm text-white pb-1" for="cus_name">Card</label>
                                    <input class="w-full pl-4 px-2 py-2 text-black bg-white rounded-full" id="cus_name" name="cus_name" type="text" required="" placeholder="Card Number MM/YY CVC" aria-label="Name">
                                </div>
                                <div class="mt-6">
                                    <button class="px-6 rounded-full py-1 text-white font-light tracking-wider bg-[#26225F]" type="submit">$3.00</button>
                                </div>
                            </form>
                        </div>
                        <p class="pt-6 text-gray-600">
                            Source: <a class="underline" href="https://tailwindcomponents.com/component/checkout-form">https://tailwindcomponents.com/component/checkout-form</a>
                        </p>
                    </div>
                </div>
                
            </main><footer class="w-full bg-white text-right p-4">
                    Built by <a target="_blank" href="https://bloomdigitmedia.com" class="underline">Bloom</a>.
                </footer>
        </x-admin-layout> 