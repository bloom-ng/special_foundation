<x-admin-layout :page="'campaigns'" :title="'Edit Campaign'">
    <main class="w-full flex-grow p-6">

        {{-- HEADER --}}
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl">Create Campaign</h1>
            <a href="{{ route("admin.campaigns.index") }}" class="bg-gray-500 text-white px-4 py-2 rounded">Back</a>
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

        <form id="campaign-form" method="POST" action="{{ route("admin.campaigns.store") }}" enctype="multipart/form-data"
            class="bg-white p-6 rounded shadow">

            @csrf

            <div class="space-y-6">

                {{-- TITLE --}}
                <input type="text" name="title" value="{{ old("title") }}" class="w-full bg-gray-200 p-3 rounded"
                    placeholder="Campaign Title" required>

                {{-- HERO --}}
                <div class="border-t pt-4">
                    <h2 class="font-bold">Hero Section</h2>

                    <input type="text" name="hero_title" value="{{ old("hero_title") }}"
                        class="w-full bg-gray-200 p-2 mb-2" placeholder="Hero Title">

                    <textarea name="hero_text" class="tinymce w-full bg-gray-200 p-2" placeholder="Hero Text">{{ old("hero_text") }}</textarea>

                    <input type="file" name="hero_image" class="mt-2">
                </div>

                {{-- BANNER --}}
                <div class="border-t pt-4">
                    <h2 class="font-bold">Banner</h2>

                    <input type="file" name="banner_image" class="mb-2">

                    <label>
                        <input type="checkbox" name="show_banner" checked>
                        Show Banner
                    </label>
                </div>

                {{-- COUNTDOWN --}}
                <div class="border-t pt-4">
                    <label>
                        <input type="checkbox" name="show_countdown">
                        Enable Countdown
                    </label>

                    <input type="datetime-local" name="countdown_date" class="w-full bg-gray-200 p-2 mt-2"
                        value="{{ old("countdown_date") }}">
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
                    <textarea name="testimonial" class="tinymce w-full bg-gray-200 p-2" placeholder="Testimonial">{{ old("testimonial") }}</textarea>
                </div>

                {{-- CTA --}}
                <div class="border-t pt-4 space-y-2">
                    <input name="primary_cta_text" value="{{ old("primary_cta_text") }}"
                        class="w-full bg-gray-200 p-2 rounded" placeholder="Primary CTA Text">

                    <input name="primary_cta_link" value="{{ old("primary_cta_link") }}"
                        class="w-full bg-gray-200 p-2 rounded" placeholder="Primary CTA Link">

                    <input name="secondary_cta_text" value="{{ old("secondary_cta_text") }}"
                        class="w-full bg-gray-200 p-2 rounded" placeholder="Secondary CTA Text">

                    <input name="secondary_cta_link" value="{{ old("secondary_cta_link") }}"
                        class="w-full bg-gray-200 p-2 rounded" placeholder="Secondary CTA Link">
                </div>

                {{-- MENU --}}
                <div class="border-t pt-4">
                    <label>
                        <input type="checkbox" name="show_in_menu" checked>
                        Show in Menu
                    </label>

                    <input type="text" name="menu_title" value="{{ old("menu_title") }}"
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
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded">Create Campaign</button>
            </div>
        </form>
    </main>
    @push("scripts")
        <script src="/js/tinymce/tinymce.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

        <script>
            console.log("🔥 JS LOADED");
            document.addEventListener('DOMContentLoaded', function() {

                const form = document.getElementById('campaign-form');

                if (!form) {
                    console.error("❌ FORM NOT FOUND");
                    return;
                }
                // INIT TINYMCE ON LOAD
                function initTinyMCE() {
                    if (typeof tinymce !== 'undefined') {
                        tinymce.remove();
                        tinymce.init({
                            selector: '.tinymce',
                            height: 200,
                            menubar: false
                        });
                    }
                }

                initTinyMCE();

                // ======================
                // SECTIONS
                // ======================
                let sectionCount = 0;

                function addSection(title = '', content = '') {
                    sectionCount++;

                    let id = "section-editor-" + sectionCount;

                    let div = document.createElement('div');
                    div.className = "bg-gray-100 p-4 rounded section-item";

                    div.innerHTML = `
                <strong>Section ${sectionCount}</strong>
                <button type="button" class="remove text-red-500 ml-2">X</button>

                <input type="text"
                    class="section-title w-full mt-2 p-2"
                    value="${title}"
                    placeholder="Section Title">

                <textarea id="${id}"
                    class="section-content tinymce w-full mt-2 p-2">${content}</textarea>
            `;

                    document.getElementById('sections-container').appendChild(div);
                    initTinyMCE();
                }

                const addSectionBtn = document.getElementById('add-section');

                if (addSectionBtn) {
                    addSectionBtn.addEventListener('click', () => addSection());
                } else {
                    console.error("❌ add-section button not found");
                }

                document.addEventListener('click', function(e) {
                    if (e.target.classList.contains('remove')) {
                        e.target.closest('.section-item').remove();
                    }
                });

                const sectionsContainer = document.getElementById('sections-container');

                if (sectionsContainer) {
                    new Sortable(sectionsContainer, {
                        animation: 150
                    });
                } else {
                    console.error("❌ sections-container not found");
                }

                // ======================
                // STATS
                // ======================
                let statCount = 0;

                function addStat(number = '', label = '') {
                    statCount++;

                    let div = document.createElement('div');
                    div.className = "bg-gray-100 p-4 rounded stat-item";

                    div.innerHTML = `
                <strong>Stat ${statCount}</strong>
                <button type="button" class="remove-stat text-red-500 ml-2">X</button>

                <input type="number"
                    class="stat-number w-full mt-2 p-2"
                    placeholder="Number"
                    value="${number}">

                <input type="text"
                    class="stat-label w-full mt-2 p-2"
                    placeholder="Label"
                    value="${label}">
            `;

                    document.getElementById('stats-container').appendChild(div);
                }

                const addStatBtn = document.getElementById('add-stat');

                if (addStatBtn) {
                    addStatBtn.addEventListener('click', () => addStat());
                } else {
                    console.error("❌ add-stat button not found");
                }

                document.addEventListener('click', function(e) {
                    if (e.target.classList.contains('remove-stat')) {
                        e.target.closest('.stat-item').remove();
                    }
                });

                const statsContainer = document.getElementById('stats-container');

                if (statsContainer) {
                    new Sortable(statsContainer, {
                        animation: 150
                    });
                } else {
                    console.error("❌ stats-container not found");
                }

                // ======================
                // FORM SUBMIT
                // ======================
                form.addEventListener('submit', function(e) {
                    console.log("✅ SUBMIT TRIGGERED");
                    // Sync TinyMCE content
                    if (typeof tinymce !== 'undefined') {
                        tinymce.triggerSave();
                    }

                    // -------- SECTIONS --------
                    let sections = [];

                    document.querySelectorAll('.section-item').forEach(section => {

                        let textarea = section.querySelector('.section-content');

                        let content = textarea.value;

                        // fallback for tinymce
                        if (tinymce.get(textarea.id)) {
                            content = tinymce.get(textarea.id).getContent();
                        }

                        sections.push({
                            title: section.querySelector('.section-title').value,
                            content: content
                        });
                    });

                    document.getElementById('sections-input').value = JSON.stringify(sections || []);

                    // -------- STATS --------
                    let stats = [];

                    document.querySelectorAll('.stat-item').forEach(stat => {

                        let number = stat.querySelector('.stat-number').value;
                        let label = stat.querySelector('.stat-label').value;

                        if (number || label) {
                            stats.push({
                                number: number,
                                label: label
                            });
                        }
                    });

                    document.getElementById('stats-input').value = JSON.stringify(stats || []);

                    // DEBUG
                    console.log("Submitting...");
                    console.log("Sections:", sections);
                    console.log("Stats:", stats);

                    // Safety fallback
                    if (!document.getElementById('stats-input').value) {
                        document.getElementById('stats-input').value = "[]";
                    }

                    if (!document.getElementById('sections-input').value) {
                        document.getElementById('sections-input').value = "[]";
                    }
                });

            });
        </script>
    @endpush
</x-admin-layout>
