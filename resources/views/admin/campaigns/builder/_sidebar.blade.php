{{-- ═══ SIDEBAR ════════════════════════════════════════════════════════════ --}}
<aside class="bl-sidebar flex flex-col flex-shrink-0">

    <div class="p-5 border-b border-slate-100">
        <h2 class="text-[15px] font-bold text-slate-800">Page Builder</h2>
        <p class="text-[10px] text-slate-400 font-semibold uppercase tracking-wider mt-0.5">Drag blocks to canvas</p>
    </div>

    <div class="flex-1 overflow-y-auto pb-4 scrollbar-hide">

        {{-- ── Layout elements ──────────────────────────────────── --}}
        <p class="bl-sidebar-section-title">Layout</p>
        <div class="px-3 space-y-1.5">
            <template x-for="el in layoutEls" :key="el.type">
                <div class="bl-pill"
                     draggable="true"
                     @dragstart="dragStart($event, { from: 'sidebar', type: el.type })">
                    <span class="bl-pill-icon bl-pill-icon--layout" x-text="el.icon"></span>
                    <span class="bl-pill-label" x-text="el.label"></span>
                    <span class="bl-pill-drag">⠿</span>
                </div>
            </template>
        </div>

        <div class="h-px bg-slate-100 mx-4 my-4"></div>

        {{-- ── Content elements ─────────────────────────────────── --}}
        <p class="bl-sidebar-section-title">Content</p>
        <div class="px-3 space-y-1.5">
            <template x-for="el in contentEls" :key="el.type">
                <div class="bl-pill"
                     draggable="true"
                     @dragstart="dragStart($event, { from: 'sidebar', type: el.type })">
                    <span class="bl-pill-icon bl-pill-icon--content" x-text="el.icon"></span>
                    <span class="bl-pill-label" x-text="el.label"></span>
                    <span class="bl-pill-drag">⠿</span>
                </div>
            </template>
        </div>
    </div>

    {{-- ── Add section shortcut ─────────────────────────────── --}}
    <div class="p-3 border-t border-slate-100 bg-slate-50/50">
        <button class="w-full py-2.5 rounded-xl border-2 border-dashed border-indigo-200
                       bg-indigo-50 text-indigo-600 text-[11px] font-bold uppercase tracking-widest
                       hover:bg-indigo-100 hover:border-indigo-300
                       active:scale-[0.98] cursor-pointer transition-all"
                @click="addSection()">
            + Add Section
        </button>
    </div>

</aside>
