{{-- UPDATE CAMPAIGN FORM --}}
<x-admin-layout :page="'campaigns'" :title="'Edit Campaign'">

    <main class="w-full flex-grow p-6">

        {{-- HEADER --}}
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl">Edit Campaign</h1>
            <a href="{{ route('admin.campaigns.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Back</a>
        </div>

        {{-- ERRORS --}}
        @if ($errors->any())
            <div class="bg-red-100 p-4 mb-4 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.campaigns.update', $campaign) }}" enctype="multipart/form-data"
            class="bg-white p-6 rounded shadow">

            @csrf
            @method('PUT')

            <div class="space-y-6">

                {{-- TITLE --}}
                <input type="text" name="title" value="{{ old('title', $campaign->title) }}"
                    class="w-full bg-gray-200 p-3 rounded" placeholder="Campaign Title">

                {{-- HERO --}}
                <div class="border-t pt-4">
                    <h2 class="font-bold">Hero</h2>

                    <input type="text" name="hero_title" value="{{ old('hero_title', $campaign->hero_title) }}"
                        class="w-full bg-gray-200 p-2 mb-2" placeholder="Hero Title">

                    <textarea name="hero_text" class="tinymce w-full bg-gray-200 p-2"
                        placeholder="Hero Text">{{ old('hero_text', $campaign->hero_text) }}</textarea>

                    @if($campaign->hero_image)
                        <img src="{{ asset('storage/' . $campaign->hero_image) }}" class="w-40 mt-2 rounded">
                    @endif

                    <input type="file" name="hero_image" class="mt-2">
                </div>

                {{-- BANNER --}}
                <div class="border-t pt-4">
                    <h2 class="font-bold">Banner</h2>

                    @if($campaign->banner_image)
                        <img src="{{ asset('storage/' . $campaign->banner_image) }}" class="w-40 mb-2 rounded">
                    @endif

                    <input type="file" name="banner_image" class="mb-2">

                    <label>
                        <input type="checkbox" name="show_banner" {{ old('show_banner', $campaign->show_banner) ? 'checked' : '' }}>
                        Show Banner
                    </label>
                </div>

                {{-- COUNTDOWN --}}
                <div class="border-t pt-4">
                    <label>
                        <input type="checkbox" name="show_countdown" {{ old('show_countdown', $campaign->show_countdown) ? 'checked' : '' }}>
                        Enable Countdown
                    </label>

                    <input type="datetime-local" name="countdown_date"
                        value="{{ old('countdown_date', optional($campaign->countdown_date)?->format('Y-m-d\TH:i')) }}"
                        class="w-full bg-gray-200 p-2 mt-2">
                </div>

                {{-- STATS --}}
                <div class="border-t pt-4">
                    <h2 class="font-bold mb-2">Stats</h2>

                    <div id="stats-container" class="space-y-4"></div>
                    <button type="button" id="add-stat" class="bg-purple-500 text-white px-4 py-2 mt-2 rounded">
                        + Add Stat
                    </button>
                </div>
                <input type="hidden" name="stats" id="stats-input">

                {{-- TESTIMONIAL --}}
                <div class="border-t pt-4">
                    <textarea name="testimonial" class="tinymce w-full bg-gray-200 p-2"
                        placeholder="Testimonial">{{ old('testimonial', $campaign->testimonial) }}</textarea>
                </div>

                {{-- CTA --}}
                <div class="border-t pt-4 space-y-2">
                    <input name="primary_cta_text" value="{{ old('primary_cta_text', $campaign->primary_cta_text) }}"
                        class="w-full bg-gray-200 p-2 rounded" placeholder="Primary CTA Text">

                    <input name="primary_cta_link" value="{{ old('primary_cta_link', $campaign->primary_cta_link) }}"
                        class="w-full bg-gray-200 p-2 rounded" placeholder="Primary CTA Link">

                    <input name="secondary_cta_text" value="{{ old('secondary_cta_text', $campaign->secondary_cta_text) }}"
                        class="w-full bg-gray-200 p-2 rounded" placeholder="Secondary CTA Text">

                    <input name="secondary_cta_link" value="{{ old('secondary_cta_link', $campaign->secondary_cta_link) }}"
                        class="w-full bg-gray-200 p-2 rounded" placeholder="Secondary CTA Link">
                </div>

                {{-- MENU --}}
                <div class="border-t pt-4">
                    <label>
                        <input type="checkbox" name="show_in_menu" {{ old('show_in_menu', $campaign->show_in_menu) ? 'checked' : '' }}>
                        Show in Menu
                    </label>

                    <input type="text" name="menu_title" value="{{ old('menu_title', $campaign->menu_title) }}"
                        class="w-full bg-gray-200 p-2 mt-2" placeholder="Menu Title">
                </div>

                {{-- SECTIONS --}}
                <div class="border-t pt-4">
                    <h2 class="font-bold mb-2">Sections</h2>
                    <div id="sections-container" class="space-y-4"></div>
                    <button type="button" id="add-section" class="bg-green-500 text-white px-4 py-2 mt-2 rounded">
                        + Add Section
                    </button>
                </div>
                <input type="hidden" name="sections" id="sections-input">

                {{-- SUBMIT --}}
                <button class="bg-blue-600 text-white px-6 py-2 rounded">Update Campaign</button>
            </div>
        </form>
    </main>

    {{-- SCRIPTS --}}
    <script src="/js/tinymce/tinymce.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {

        // --- SECTIONS ---
        let sectionCount = 0;
        const existingSections = @json($campaign->sections ?? []);
        function initTinyMCE() {
            tinymce.remove();
            tinymce.init({ selector: '.tinymce', height: 200, menubar: false });
        }
        function addSection(title = '', content = '') {
            sectionCount++;
            let div = document.createElement('div');
            div.className = "bg-gray-100 p-4 rounded section-item";
            div.innerHTML = `
                <strong>Section ${sectionCount}</strong>
                <button type="button" class="remove text-red-500 ml-2">X</button>
                <input type="text" class="section-title w-full mt-2 p-2" value="${title}" placeholder="Section Title">
                <textarea class="section-content tinymce w-full mt-2 p-2">${content}</textarea>
            `;
            document.getElementById('sections-container').appendChild(div);
            initTinyMCE();
        }
        existingSections.forEach(s => addSection(s.title, s.content));
        document.getElementById('add-section').onclick = () => addSection();
        document.addEventListener('click', function(e){ if(e.target.classList.contains('remove')) e.target.closest('.section-item').remove(); });
        new Sortable(document.getElementById('sections-container'), { animation: 150 });
        document.querySelector('form').addEventListener('submit', function(){
            tinymce.triggerSave();
            let sections = [];
            document.querySelectorAll('.section-item').forEach(section => {
                sections.push({ title: section.querySelector('.section-title').value, content: section.querySelector('.section-content').value });
            });
            document.getElementById('sections-input').value = JSON.stringify(sections);
        });

        // --- STATS ---
        let statCount = 0;
        const existingStats = @json($campaign->stats ?? []);
        function addStat(number = '', label = '') {
            statCount++;
            let div = document.createElement('div');
            div.className = "bg-gray-100 p-4 rounded stat-item";
            div.innerHTML = `
                <strong>Stat ${statCount}</strong>
                <button type="button" class="remove-stat text-red-500 ml-2">X</button>
                <input type="number" class="stat-number w-full mt-2 p-2" placeholder="Number" value="${number}">
                <input type="text" class="stat-label w-full mt-2 p-2" placeholder="Description" value="${label}">
            `;
            document.getElementById('stats-container').appendChild(div);
        }
        existingStats.forEach(stat => addStat(stat.number, stat.label));
        document.getElementById('add-stat').onclick = () => addStat();
        document.addEventListener('click', function(e){ if(e.target.classList.contains('remove-stat')) e.target.closest('.stat-item').remove(); });
        new Sortable(document.getElementById('stats-container'), { animation: 150 });
        document.querySelector('form').addEventListener('submit', function(){
            let stats = [];
            document.querySelectorAll('.stat-item').forEach(stat => {
                stats.push({ number: stat.querySelector('.stat-number').value, label: stat.querySelector('.stat-label').value });
            });
            document.getElementById('stats-input').value = JSON.stringify(stats);
        });

    });
    </script>

    </x-admin-layout>