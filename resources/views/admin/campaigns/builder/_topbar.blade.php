{{-- ═══ TOPBAR ══════════════════════════════════════════════════════════════ --}}
{{-- Sub-topbar inside the admin shell: breadcrumb, viewport switcher,        --}}
{{-- live-preview link, and save button.                                       --}}
<div class="flex items-center gap-2.5 px-6 py-3 bg-white border-b border-gray-200 flex-shrink-0" style="font-family:'Outfit', sans-serif;">

    {{-- Breadcrumb --}}
    <div class="flex items-center gap-2">
        <a href="{{ route('admin.campaigns.index') }}"
           class="text-xs font-semibold text-slate-400 hover:text-indigo-600 transition-colors uppercase tracking-wider">
            Campaigns
        </a>
        <span class="text-slate-200 text-xs">/</span>
        <span class="text-sm font-bold text-slate-800">{{ $campaign->title }}</span>
        <span class="text-slate-200 text-xs">/</span>
        <span class="text-xs font-semibold text-slate-400 uppercase tracking-widest">Builder</span>
    </div>

    <div class="flex-1"></div>

    {{-- Viewport switcher --}}
    <div class="flex gap-1.5 mr-4 bg-slate-100 p-1 rounded-xl">
        <button @click="$dispatch('set-viewport','desktop')"
                class="px-3 py-1.5 rounded-lg transition-all"
                :class="viewport==='desktop' ? 'bg-white shadow-sm text-indigo-600' : 'text-slate-400 hover:bg-white/50'"
                title="Desktop 🖥">🖥</button>
        <button @click="$dispatch('set-viewport','tablet')"
                class="px-3 py-1.5 rounded-lg transition-all"
                :class="viewport==='tablet'  ? 'bg-white shadow-sm text-indigo-600' : 'text-slate-400 hover:bg-white/50'"
                title="Tablet 📱">📱</button>
        <button @click="$dispatch('set-viewport','mobile')"
                class="px-3 py-1.5 rounded-lg transition-all"
                :class="viewport==='mobile'  ? 'bg-white shadow-sm text-indigo-600' : 'text-slate-400 hover:bg-white/50'"
                title="Mobile 📲">📲</button>
    </div>

    {{-- Live preview link --}}
    <a href="{{ route('campaign.show', $campaign->slug) }}" target="_blank"
       class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-bold uppercase tracking-widest
              text-slate-600 border border-slate-200 bg-white hover:bg-slate-50 transition-all shadow-sm active:scale-95">
        👁 Preview
    </a>

    {{-- Save button --}}
    <button @click="save()"
            class="inline-flex items-center gap-2 px-5 py-2 rounded-xl text-xs font-bold uppercase tracking-widest
                   text-white bg-indigo-600 hover:bg-indigo-700 transition-all border-0 shadow-lg shadow-indigo-200 active:scale-95 cursor-pointer">
        💾 Save
    </button>

</div>
