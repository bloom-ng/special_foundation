<x-admin-layout :page="'campaigns'" :title="'Builder — ' . $campaign->title">

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,400;9..40,500;9..40,600;9..40,700&display=swap" rel="stylesheet">
<style>
    /* Builder overrides inside the admin shell */
    .builder-wrap { height: calc(100vh - 64px); display: flex; overflow: hidden; font-family: 'DM Sans', sans-serif; }

    /* ── Sidebar ─────────────────────────────────── */
    .bl-sidebar {
        width: 210px; flex-shrink: 0;
        background: #fff;
        border-right: 1px solid #e5e7eb;
        display: flex; flex-direction: column;
        overflow-y: auto;
    }
    .bl-section-label {
        padding: 12px 14px 4px;
        font-size: 9px; font-weight: 700;
        text-transform: uppercase; letter-spacing: .1em;
        color: #9ca3af;
    }
    .bl-pills { padding: 0 10px; display: flex; flex-direction: column; gap: 3px; }
    .bl-pill {
        display: flex; align-items: center; gap: 9px;
        padding: 7px 10px; border-radius: 8px;
        background: #f9fafb; border: 1px solid #e5e7eb;
        cursor: grab; user-select: none;
        font-size: 12px; font-weight: 500; color: #4b5563;
        transition: background .12s, border-color .12s, color .12s, transform .12s;
    }
    .bl-pill:hover { background: #eff6ff; border-color: #bfdbfe; color: #1d4ed8; transform: translateX(2px); }
    .bl-pill:active { cursor: grabbing; transform: scale(.97); }
    .bl-pill .pi { width: 17px; text-align: center; font-size: 13px; opacity: .75; }
    .bl-divider { height: 1px; background: #e5e7eb; margin: 8px 14px; }
    .bl-add-btn {
        margin: 10px; padding: 8px;
        border-radius: 8px; border: 1.5px dashed #d1d5db;
        background: transparent; color: #6b7280;
        font-size: 12px; font-weight: 600;
        cursor: pointer; transition: all .12s;
        font-family: 'DM Sans', sans-serif;
    }
    .bl-add-btn:hover { background: #f3f4f6; border-color: #6366f1; color: #6366f1; }

    /* ── Canvas ──────────────────────────────────── */
    .bl-canvas { flex: 1; overflow-y: auto; background: #f3f4f6; padding: 20px; }
    .canvas-frame { max-width: 100%; margin: 0 auto; transition: max-width .3s; }
    .canvas-frame.tablet { max-width: 768px; }
    .canvas-frame.mobile { max-width: 390px; }

    .canvas-empty {
        display: flex; flex-direction: column; align-items: center; justify-content: center;
        min-height: 300px; border: 2px dashed #d1d5db; border-radius: 14px;
        background: #fff; color: #9ca3af; gap: 10px;
    }
    .canvas-empty .big { font-size: 36px; }
    .canvas-empty p    { font-size: 13px; }

    /* ── Section card ────────────────────────────── */
    .sec-card {
        background: #fff; border: 1px solid #e5e7eb;
        border-radius: 12px; margin-bottom: 14px;
        transition: border-color .12s, box-shadow .12s;
    }
    .sec-card:hover { border-color: #c7d2fe; }
    .sec-card.drop-target { border-color: #6366f1; box-shadow: 0 0 0 3px rgba(99,102,241,.12); }

    .sec-head {
        display: flex; align-items: center; gap: 6px;
        padding: 8px 12px; border-bottom: 1px solid #f3f4f6;
        font-size: 10px; font-weight: 700;
        text-transform: uppercase; letter-spacing: .1em; color: #9ca3af;
    }
    .sec-handle { cursor: grab; font-size: 14px; opacity: .4; transition: opacity .1s; }
    .sec-handle:hover { opacity: .9; }

    /* ── Column drop zone ────────────────────────── */
    .col-zone {
        flex: 1; min-height: 80px;
        border: 1.5px dashed #e5e7eb; border-radius: 8px;
        padding: 8px; transition: border-color .12s, background .12s;
    }
    .col-zone.drop-target { border-color: #6366f1; background: rgba(99,102,241,.05); }
    .col-empty { display: flex; align-items: center; justify-content: center; min-height: 48px; font-size: 11px; color: #d1d5db; pointer-events: none; }

    /* ── Block chip ──────────────────────────────── */
    .bl-chip {
        display: flex; align-items: center; gap: 8px;
        padding: 6px 9px; border-radius: 7px;
        background: #f9fafb; border: 1px solid #e5e7eb;
        margin-bottom: 4px; font-size: 12px; font-weight: 500;
        cursor: pointer; position: relative;
        transition: border-color .12s, background .12s; user-select: none;
    }
    .bl-chip:hover    { background: #eff6ff; border-color: #bfdbfe; }
    .bl-chip.selected { border-color: #6366f1; background: #eef2ff; }
    .bl-chip .ci { font-size: 13px; opacity: .65; }
    .bl-chip .cl { flex: 1; color: #374151; }
    .bl-chip .cv { font-size: 10px; color: #9ca3af; max-width: 70px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis; }
    .bl-chip .cd {
        padding: 2px 6px; border-radius: 4px; font-size: 11px;
        color: #9ca3af; opacity: 0; border: none; background: none;
        cursor: pointer; transition: color .12s, background .12s; font-family: inherit;
    }
    .bl-chip:hover .cd { opacity: 1; }
    .bl-chip .cd:hover { color: #dc2626; background: #fee2e2; }

    /* ── Container block ─────────────────────────── */
    .bl-container {
        border: 1.5px dashed #c7d2fe; border-radius: 8px;
        padding: 8px; margin-bottom: 4px;
        background: #eef2ff; transition: border-color .12s;
    }
    .bl-container.selected    { border-color: #6366f1; }
    .bl-container.drop-target { border-color: #6366f1; background: rgba(99,102,241,.08); }
    .bc-head {
        display: flex; align-items: center; gap: 6px;
        font-size: 9px; font-weight: 700; text-transform: uppercase;
        letter-spacing: .1em; color: #818cf8;
        padding-bottom: 5px; margin-bottom: 5px;
        border-bottom: 1px solid #c7d2fe;
    }

    /* ── Live preview ────────────────────────────── */
    .bl-preview {
        border: 1px solid #e5e7eb; border-radius: 7px;
        padding: 10px; margin-top: 3px; margin-bottom: 5px;
        background: #f9fafb; font-size: 12px;
        pointer-events: none; overflow: hidden;
    }

    /* ── Settings panel ──────────────────────────── */
    .bl-panel {
        width: 268px; flex-shrink: 0;
        background: #fff; border-left: 1px solid #e5e7eb;
        display: flex; flex-direction: column;
    }
    .panel-head {
        display: flex; align-items: center; justify-content: space-between;
        padding: 10px 14px; border-bottom: 1px solid #f3f4f6;
        font-size: 10px; font-weight: 700;
        text-transform: uppercase; letter-spacing: .1em; color: #6b7280;
    }
    .panel-body { flex: 1; overflow-y: auto; padding: 14px; }
    .panel-empty { text-align: center; margin-top: 48px; font-size: 13px; color: #9ca3af; line-height: 1.7; }

    /* Fields */
    .field { margin-bottom: 13px; }
    .field label {
        display: block; font-size: 10px; font-weight: 700;
        text-transform: uppercase; letter-spacing: .08em;
        color: #6b7280; margin-bottom: 5px;
    }
    .field input, .field textarea, .field select {
        width: 100%; background: #f9fafb; border: 1px solid #d1d5db;
        border-radius: 7px; color: #111827;
        padding: 7px 10px; font-size: 13px; font-family: 'DM Sans', sans-serif;
        outline: none; transition: border-color .12s, box-shadow .12s;
    }
    .field input:focus, .field textarea:focus, .field select:focus { border-color: #6366f1; box-shadow: 0 0 0 3px rgba(99,102,241,.12); }
    .field textarea { resize: vertical; min-height: 80px; }
    .field input[type="color"]  { height: 36px; padding: 3px 6px; }
    .field input[type="number"] { -moz-appearance: textfield; }
    .field input[type="file"]   { padding: 5px; font-size: 12px; }
    .field .thumb { width: 100%; height: 110px; object-fit: cover; border-radius: 7px; border: 1px solid #e5e7eb; margin-top: 6px; display: block; }
    .field-row { display: flex; gap: 8px; }
    .field-row .field { flex: 1; }
    .panel-sep { height: 1px; background: #f3f4f6; margin: 10px 0; }

    /* Small icon buttons */
    .ic-btn {
        display: inline-flex; align-items: center; justify-content: center;
        width: 28px; height: 26px; border-radius: 6px;
        font-size: 12px; border: 1px solid #e5e7eb;
        background: #f9fafb; color: #6b7280; cursor: pointer;
        transition: all .12s; font-family: inherit;
    }
    .ic-btn:hover { background: #f3f4f6; border-color: #d1d5db; color: #111827; }
    .ic-btn.danger { color: #dc2626; border-color: #fecaca; background: #fff; }
    .ic-btn.danger:hover { background: #fee2e2; }

    .cols-btn {
        display: inline-flex; align-items: center; justify-content: center;
        width: 26px; height: 22px; border-radius: 5px; font-size: 11px; font-weight: 700;
        border: 1px solid #e5e7eb; background: #f9fafb; color: #6b7280;
        cursor: pointer; font-family: inherit; transition: all .12s;
    }
    .cols-btn.active, .cols-btn:hover { background: #6366f1; color: #fff; border-color: #6366f1; }

    /* Toast */
    #bl-toast {
        position: fixed; bottom: 24px; left: 50%;
        transform: translateX(-50%) translateY(14px);
        background: #111827; color: #f9fafb;
        border-radius: 10px; padding: 8px 18px;
        font-size: 13px; font-weight: 500;
        box-shadow: 0 8px 24px rgba(0,0,0,.18);
        opacity: 0; pointer-events: none; z-index: 9999;
        transition: opacity .2s, transform .2s;
    }
    #bl-toast.show { opacity: 1; transform: translateX(-50%) translateY(0); }

    /* Topbar strip inside admin shell */
    .bl-topbar {
        display: flex; align-items: center; gap: 10px;
        padding: 10px 16px;
        background: #fff; border-bottom: 1px solid #e5e7eb;
        flex-shrink: 0;
    }
    .bl-topbar-title { font-size: 13px; font-weight: 600; color: #374151; }
    .bl-topbar-sub   { font-size: 11px; color: #9ca3af; }

    /* Scrollbar */
    .bl-sidebar::-webkit-scrollbar,
    .bl-canvas::-webkit-scrollbar,
    .panel-body::-webkit-scrollbar { width: 4px; }
    .bl-sidebar::-webkit-scrollbar-thumb,
    .bl-canvas::-webkit-scrollbar-thumb,
    .panel-body::-webkit-scrollbar-thumb { background: #e5e7eb; border-radius: 99px; }
</style>
@endpush

{{-- ═══ TOAST ════════════════════════════════════════════════ --}}
<div id="bl-toast"></div>

{{-- ═══ BUILDER WRAPPER ════════════════════════════════════════ --}}
<div class="builder-wrap" x-data="pageBuilder()" @builder-save.window="save()" @set-viewport.window="viewport=$event.detail" @keydown.escape.window="selected=null;selectedId=null">

    {{-- ─── SIDEBAR ──────────────────────────────────────────── --}}
    <aside class="bl-sidebar">
        <div class="bl-section-label">Layout</div>
        <div class="bl-pills">
            <template x-for="el in layoutEls" :key="el.type">
                <div class="bl-pill" draggable="true" @dragstart="dragStart($event,{from:'sidebar',type:el.type})">
                    <span class="pi" x-text="el.icon"></span>
                    <span x-text="el.label"></span>
                </div>
            </template>
        </div>

        <div class="bl-divider"></div>

        <div class="bl-section-label">Content</div>
        <div class="bl-pills">
            <template x-for="el in contentEls" :key="el.type">
                <div class="bl-pill" draggable="true" @dragstart="dragStart($event,{from:'sidebar',type:el.type})">
                    <span class="pi" x-text="el.icon"></span>
                    <span x-text="el.label"></span>
                </div>
            </template>
        </div>

        <div class="bl-divider"></div>
        <button class="bl-add-btn" @click="addSection()">+ Add Section</button>
    </aside>

    {{-- ─── CENTER COLUMN (topbar + canvas) ────────────────────── --}}
    <div class="flex flex-col flex-1 min-w-0">

        {{-- Sub-topbar: breadcrumb + viewport + save --}}
        <div class="bl-topbar">
            <a href="{{ route('admin.campaigns.index') }}" class="text-xs text-gray-400 hover:text-indigo-600 transition-colors">Campaigns</a>
            <span class="text-gray-300 text-xs">/</span>
            <span class="bl-topbar-title">{{ $campaign->title }}</span>
            <span class="text-gray-300 text-xs">/</span>
            <span class="bl-topbar-sub">Builder</span>

            <div class="flex-1"></div>

            {{-- Viewport --}}
            <div class="flex gap-1 mr-2">
                <button @click="$dispatch('set-viewport','desktop')" :class="viewport==='desktop' ? 'cols-btn active' : 'cols-btn'" title="Desktop">🖥</button>
                <button @click="$dispatch('set-viewport','tablet')"  :class="viewport==='tablet'  ? 'cols-btn active' : 'cols-btn'" title="Tablet">📱</button>
                <button @click="$dispatch('set-viewport','mobile')"  :class="viewport==='mobile'  ? 'cols-btn active' : 'cols-btn'" title="Mobile">📲</button>
            </div>

            <a href="{{ route('campaign.show', $campaign->slug) }}" target="_blank"
               class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold text-gray-600 border border-gray-200 bg-gray-50 hover:bg-gray-100 transition-colors">
                👁 Preview
            </a>
            <button @click="save()"
                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold text-white bg-indigo-600 hover:bg-indigo-700 transition-colors border-0 cursor-pointer"
                    style="font-family:'DM Sans',sans-serif;">
                💾 Save
            </button>
        </div>

        {{-- Canvas --}}
        <div class="bl-canvas">
            <div class="canvas-frame" :class="viewport!=='desktop' ? viewport : ''">

                <div class="canvas-empty" x-show="layout.length===0">
                    <span class="big">🏗</span>
                    <p>Drag elements here or click <strong class="text-gray-600">+ Add Section</strong></p>
                </div>

                <template x-for="(section, si) in layout" :key="section.id">
                    <div class="sec-card"
                         :class="{'drop-target': dragState.overSection===si && dragState.movingSection!==null}"
                         draggable="true"
                         @dragstart.self="sectionDragStart($event,si)"
                         @dragend="sectionDragEnd()"
                         @dragover.prevent="sectionDragOver(si)"
                         @drop.prevent="sectionDrop(si)">

                        {{-- Section header --}}
                        <div class="sec-head">
                            <span class="sec-handle" title="Reorder">⠿</span>
                            <span>Section</span>
                            <span x-text="si+1" class="text-gray-400"></span>
                            <span class="flex-1"></span>

                            <template x-for="n in [1,2,3,4]" :key="n">
                                <button class="cols-btn" :class="{active:section.columns===n}" @click.stop="setCols(si,n)" x-text="n"></button>
                            </template>

                            <button @click.stop="cloneSection(si)"   class="ic-btn ml-1" title="Clone">⧉</button>
                            <button @click.stop="moveSection(si,-1)" class="ic-btn" title="Move up">↑</button>
                            <button @click.stop="moveSection(si,1)"  class="ic-btn" title="Move down">↓</button>
                            <button @click.stop="removeSection(si)"  class="ic-btn danger" title="Delete">✕</button>
                        </div>

                        {{-- Columns --}}
                        <div class="flex gap-3 p-3">
                            <template x-for="(col, ci) in section.children" :key="col.id">
                                <div class="col-zone"
                                     :class="{'drop-target': dragState.overCol===si+'-'+ci}"
                                     @dragover.prevent="dragState.overCol=si+'-'+ci"
                                     @dragleave.self="dragState.overCol=null"
                                     @drop.prevent="colDrop($event,si,ci)">

                                    <div class="col-empty" x-show="col.children.length===0">Drop here</div>

                                    <template x-for="(block, bi) in col.children" :key="block.id">
                                        <div>
                                            {{-- Container block --}}
                                            <template x-if="isContainer(block.type)">
                                                <div class="bl-container"
                                                     :class="{selected:selectedId===block.id,'drop-target':dragState.overContainer===block.id}"
                                                     @click.stop="select(block)"
                                                     @dragover.prevent="dragState.overContainer=block.id"
                                                     @dragleave.self="dragState.overContainer=null"
                                                     @drop.prevent.stop="containerDrop($event,block)">
                                                    <div class="bc-head">
                                                        <span x-text="meta(block.type).icon"></span>
                                                        <span x-text="meta(block.type).label"></span>
                                                        <span class="flex-1"></span>
                                                        <button @click.stop="removeBlock(si,ci,bi)" style="background:none;border:none;color:#dc2626;cursor:pointer;font-size:11px;padding:0">✕</button>
                                                    </div>
                                                    <template x-for="(child,chi) in block.children" :key="child.id">
                                                        <div class="bl-chip" :class="{selected:selectedId===child.id}" @click.stop="select(child)">
                                                            <span class="ci" x-text="meta(child.type).icon"></span>
                                                            <span class="cl" x-text="meta(child.type).label"></span>
                                                            <span class="cv" x-text="previewLabel(child)"></span>
                                                            <button class="cd" @click.stop="block.children.splice(chi,1)">✕</button>
                                                        </div>
                                                    </template>
                                                    <div x-show="block.children.length===0" class="text-xs text-center py-2" style="color:#a5b4fc;">Drop blocks here</div>
                                                </div>
                                            </template>

                                            {{-- Leaf block --}}
                                            <template x-if="!isContainer(block.type)">
                                                <div>
                                                    <div class="bl-chip"
                                                         :class="{selected:selectedId===block.id}"
                                                         draggable="true"
                                                         @dragstart="dragStart($event,{from:'block',si:si,ci:ci,bi:bi})"
                                                         @click.stop="select(block)">
                                                        <span class="ci" x-text="meta(block.type).icon"></span>
                                                        <span class="cl" x-text="meta(block.type).label"></span>
                                                        <span class="cv" x-text="previewLabel(block)"></span>
                                                        <button class="cd" @click.stop="removeBlock(si,ci,bi)">✕</button>
                                                    </div>
                                                    <div class="bl-preview" x-show="selectedId===block.id" x-html="livePreview(block)"></div>
                                                </div>
                                            </template>
                                        </div>
                                    </template>
                                </div>
                            </template>
                        </div>

                    </div>
                </template>
            </div>
        </div>

    </div>{{-- end center column --}}

    {{-- ─── SETTINGS PANEL ──────────────────────────────────────── --}}
    <aside class="bl-panel">
        <div class="panel-head">
            <span>Settings</span>
            <button x-show="selected" @click="selected=null;selectedId=null" class="ic-btn" style="font-size:10px">✕</button>
        </div>
        <div class="panel-body">

            <div class="panel-empty" x-show="!selected">
                Select a block<br>to edit its settings
            </div>

            <div x-show="selected">
                {{-- Badge --}}
                <div class="flex items-center gap-2 mb-4" x-show="selected">
                    <span class="text-xl" x-text="selected ? meta(selected.type).icon : ''"></span>
                    <span class="text-sm font-semibold text-gray-800" x-text="selected ? meta(selected.type).label : ''"></span>
                </div>

                {{-- HERO --}}
                <template x-if="selected && selected.type==='hero'">
                    <div>
                        <div class="field"><label>Title</label><input x-model="selected.data.title" placeholder="Hero title"></div>
                        <div class="field"><label>Subtitle</label><textarea x-model="selected.data.text" placeholder="Subtitle..."></textarea></div>
                        <div class="field"><label>CTA Label</label><input x-model="selected.data.ctaText" placeholder="Button label"></div>
                        <div class="field"><label>CTA Link</label><input x-model="selected.data.ctaLink" placeholder="https://..."></div>
                        <div class="field-row">
                            <div class="field"><label>BG Color</label><input type="color" x-model="selected.data.bgColor"></div>
                            <div class="field"><label>Align</label>
                                <select x-model="selected.data.textAlign">
                                    <option value="left">Left</option><option value="center">Center</option><option value="right">Right</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </template>

                {{-- TEXT --}}
                <template x-if="selected && selected.type==='text'">
                    <div>
                        <div class="field"><label>Content</label><textarea x-model="selected.data.content" style="min-height:110px" placeholder="Your text..."></textarea></div>
                        <div class="field-row">
                            <div class="field"><label>Size</label>
                                <select x-model="selected.data.fontSize">
                                    <option value="12px">XS</option><option value="14px">SM</option><option value="16px">Base</option>
                                    <option value="18px">LG</option><option value="22px">XL</option><option value="28px">2XL</option>
                                </select>
                            </div>
                            <div class="field"><label>Align</label>
                                <select x-model="selected.data.textAlign">
                                    <option value="left">Left</option><option value="center">Center</option><option value="right">Right</option>
                                </select>
                            </div>
                        </div>
                        <div class="field-row">
                            <div class="field"><label>Color</label><input type="color" x-model="selected.data.color"></div>
                            <div class="field"><label>Weight</label>
                                <select x-model="selected.data.fontWeight">
                                    <option value="400">Normal</option><option value="600">Semibold</option><option value="700">Bold</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </template>

                {{-- IMAGE --}}
                <template x-if="selected && selected.type==='image'">
                    <div>
                        <div class="field">
                            <label>Upload</label>
                            <input type="file" accept="image/*" @change="uploadImage($event)">
                            <img x-show="selected.data.src" :src="selected.data.src" class="thumb" alt="">
                        </div>
                        <div class="field"><label>Alt Text</label><input x-model="selected.data.alt" placeholder="Image description"></div>
                        <div class="field-row">
                            <div class="field"><label>Fit</label>
                                <select x-model="selected.data.objectFit">
                                    <option value="cover">Cover</option><option value="contain">Contain</option><option value="fill">Fill</option>
                                </select>
                            </div>
                            <div class="field"><label>Height px</label><input type="number" x-model="selected.data.height" placeholder="240"></div>
                        </div>
                    </div>
                </template>

                {{-- VIDEO --}}
                <template x-if="selected && selected.type==='video'">
                    <div>
                        <div class="field"><label>URL</label><input x-model="selected.data.url" placeholder="YouTube / Vimeo URL"></div>
                        <div class="field"><label>Aspect Ratio</label>
                            <select x-model="selected.data.aspect">
                                <option value="16/9">16:9</option><option value="4/3">4:3</option><option value="1/1">1:1</option>
                            </select>
                        </div>
                        <div class="field" style="display:flex;align-items:center;gap:8px;">
                            <input type="checkbox" id="vid-ap" x-model="selected.data.autoplay" style="accent-color:#6366f1;width:auto;">
                            <label for="vid-ap" style="text-transform:none;font-size:13px;margin:0;color:#374151;">Autoplay</label>
                        </div>
                    </div>
                </template>

                {{-- FLEX-DIV --}}
                <template x-if="selected && selected.type==='flex-div'">
                    <div>
                        <div class="field"><label>Direction</label>
                            <select x-model="selected.data.flexDir">
                                <option value="row">Row</option><option value="column">Column</option>
                                <option value="row-reverse">Row Reverse</option><option value="column-reverse">Column Reverse</option>
                            </select>
                        </div>
                        <div class="field-row">
                            <div class="field"><label>Gap px</label><input type="number" x-model="selected.data.gap" placeholder="16"></div>
                            <div class="field"><label>Padding px</label><input type="number" x-model="selected.data.padding" placeholder="16"></div>
                        </div>
                        <div class="field"><label>BG Color</label><input type="color" x-model="selected.data.bgColor"></div>
                        <div class="field"><label>Align Items</label>
                            <select x-model="selected.data.alignItems">
                                <option value="stretch">Stretch</option><option value="flex-start">Start</option>
                                <option value="center">Center</option><option value="flex-end">End</option>
                            </select>
                        </div>
                        <div class="field"><label>Justify</label>
                            <select x-model="selected.data.justifyContent">
                                <option value="flex-start">Start</option><option value="center">Center</option>
                                <option value="flex-end">End</option><option value="space-between">Space Between</option>
                                <option value="space-around">Space Around</option>
                            </select>
                        </div>
                    </div>
                </template>

                {{-- GRID-DIV --}}
                <template x-if="selected && selected.type==='grid-div'">
                    <div>
                        <div class="field-row">
                            <div class="field"><label>Columns</label><input type="number" x-model="selected.data.gridCols" min="1" max="12"></div>
                            <div class="field"><label>Gap px</label><input type="number" x-model="selected.data.gap" placeholder="16"></div>
                        </div>
                        <div class="field"><label>Padding px</label><input type="number" x-model="selected.data.padding" placeholder="16"></div>
                        <div class="field"><label>BG Color</label><input type="color" x-model="selected.data.bgColor"></div>
                    </div>
                </template>

                {{-- COLUMNS --}}
                <template x-if="selected && selected.type==='columns'">
                    <div>
                        <div class="field-row">
                            <div class="field"><label>Count</label><input type="number" x-model="selected.data.cols" min="1" max="6"></div>
                            <div class="field"><label>Gap px</label><input type="number" x-model="selected.data.gap" placeholder="16"></div>
                        </div>
                    </div>
                </template>

                {{-- BUTTON --}}
                <template x-if="selected && selected.type==='button'">
                    <div>
                        <div class="field"><label>Label</label><input x-model="selected.data.label" placeholder="Click me"></div>
                        <div class="field"><label>Link</label><input x-model="selected.data.link" placeholder="https://..."></div>
                        <div class="field"><label>Style</label>
                            <select x-model="selected.data.style">
                                <option value="primary">Primary</option><option value="secondary">Secondary</option><option value="outline">Outline</option>
                            </select>
                        </div>
                    </div>
                </template>

                {{-- DIVIDER --}}
                <template x-if="selected && selected.type==='divider'">
                    <div>
                        <div class="field"><label>Style</label>
                            <select x-model="selected.data.lineStyle">
                                <option value="solid">Solid</option><option value="dashed">Dashed</option><option value="dotted">Dotted</option>
                            </select>
                        </div>
                        <div class="field-row">
                            <div class="field"><label>Color</label><input type="color" x-model="selected.data.color"></div>
                            <div class="field"><label>Margin px</label><input type="number" x-model="selected.data.margin" placeholder="16"></div>
                        </div>
                    </div>
                </template>

                {{-- SPACER --}}
                <template x-if="selected && selected.type==='spacer'">
                    <div>
                        <div class="field"><label>Height px</label><input type="number" x-model="selected.data.height" placeholder="40"></div>
                    </div>
                </template>

                <div class="panel-sep"></div>
                <button @click="deleteSelected()"
                        class="w-full px-3 py-2 rounded-lg text-xs font-semibold text-red-600 border border-red-200 bg-red-50 hover:bg-red-100 transition-colors cursor-pointer"
                        style="font-family:'DM Sans',sans-serif;">
                    🗑 Delete Block
                </button>
            </div>
        </div>
    </aside>

</div>{{-- builder-wrap --}}

@push('scripts')

{{-- PHP → JS data bridge (outside @verbatim so Blade processes it) --}}
<script>
    window.BUILDER_LAYOUT   = @json(is_array($campaign->layout) ? $campaign->layout : (json_decode($campaign->layout, true) ?? []));
    window.BUILDER_SAVE_URL = "{{ route('admin.campaign.layout.update', $campaign->id) }}";
    window.BUILDER_CSRF     = "{{ csrf_token() }}";
</script>

@verbatim
<script>
/* ═══════════════════════════════════════════════════════
   ELEMENT REGISTRY
═══════════════════════════════════════════════════════ */
const REGISTRY = {
    'flex-div': { label:'Flex Div', icon:'↔', container:true,  parents:['column','flex-div','grid-div','columns'] },
    'grid-div': { label:'Grid Div', icon:'⊞', container:true,  parents:['column','flex-div','grid-div','columns'] },
    'columns':  { label:'Columns',  icon:'⫿', container:true,  parents:['column','flex-div','grid-div'] },
    'hero':     { label:'Hero',     icon:'✦', container:false, parents:['column','flex-div','grid-div','columns'] },
    'text':     { label:'Text',     icon:'T', container:false, parents:['column','flex-div','grid-div','columns'] },
    'image':    { label:'Image',    icon:'🖼', container:false, parents:['column','flex-div','grid-div','columns'] },
    'video':    { label:'Video',    icon:'▶', container:false, parents:['column','flex-div','grid-div','columns'] },
    'button':   { label:'Button',   icon:'⬭', container:false, parents:['column','flex-div','grid-div','columns'] },
    'divider':  { label:'Divider',  icon:'─', container:false, parents:['column','flex-div','grid-div','columns'] },
    'spacer':   { label:'Spacer',   icon:'⇕', container:false, parents:['column','flex-div','grid-div','columns'] },
};

function canNest(parentType, childType) {
    return (REGISTRY[childType]?.parents || []).includes(parentType);
}

function uid() { return Math.random().toString(36).slice(2, 9); }

function makeBlock(type) {
    const defaults = {
        'hero':     { title:'Hero Title', text:'', ctaText:'', ctaLink:'', bgColor:'#1e3a5f', textAlign:'center' },
        'text':     { content:'Your text here.', fontSize:'16px', textAlign:'left', color:'#111827', fontWeight:'400' },
        'image':    { src:'', alt:'', objectFit:'cover', height:220 },
        'video':    { url:'', aspect:'16/9', autoplay:false },
        'flex-div': { flexDir:'row', gap:16, padding:16, bgColor:'#f9fafb', alignItems:'stretch', justifyContent:'flex-start' },
        'grid-div': { gridCols:2, gap:16, padding:16, bgColor:'#f9fafb' },
        'columns':  { cols:2, gap:16 },
        'button':   { label:'Click Me', link:'#', style:'primary' },
        'divider':  { lineStyle:'solid', color:'#e5e7eb', margin:16 },
        'spacer':   { height:40 },
    };
    return { id:uid(), type, data:{ ...(defaults[type]||{}) }, children:[] };
}

function makeSection(cols = 2) {
    return {
        id:uid(), type:'section', columns:cols,
        children: Array.from({ length:cols }, () => ({ id:uid(), type:'column', children:[] }))
    };
}

/* ═══════════════════════════════════════════════════════
   LIVE PREVIEW RENDERER
═══════════════════════════════════════════════════════ */
function livePreview(block) {
    const d = block.data || {};
    switch (block.type) {
        case 'hero':
            return `<div style="background:${d.bgColor||'#1e3a5f'};padding:18px 14px;border-radius:7px;text-align:${d.textAlign||'center'}">
                        <div style="font-size:15px;font-weight:700;color:#fff;margin-bottom:5px">${d.title||'Hero Title'}</div>
                        ${d.text?`<div style="font-size:12px;color:rgba(255,255,255,.7);margin-bottom:9px">${d.text}</div>`:''}
                        ${d.ctaText?`<span style="display:inline-block;padding:5px 13px;background:#4f46e5;color:#fff;border-radius:5px;font-size:12px;font-weight:600">${d.ctaText}</span>`:''}
                    </div>`;
        case 'text':
            return `<p style="font-size:${d.fontSize||'16px'};color:${d.color||'#111827'};text-align:${d.textAlign||'left'};font-weight:${d.fontWeight||400};margin:0">${d.content||'Text block'}</p>`;
        case 'image':
            return d.src
                ? `<img src="${d.src}" style="width:100%;height:${d.height||220}px;object-fit:${d.objectFit||'cover'};border-radius:6px;display:block;">`
                : `<div style="width:100%;height:${d.height||220}px;background:#f3f4f6;border-radius:6px;display:flex;align-items:center;justify-content:center;font-size:12px;color:#9ca3af;border:1px dashed #d1d5db;">🖼 No image</div>`;
        case 'video': {
            const src = toEmbedUrl(d.url);
            return src
                ? `<div style="position:relative;aspect-ratio:${d.aspect||'16/9'};background:#000;border-radius:6px;overflow:hidden"><iframe src="${src}" style="position:absolute;inset:0;width:100%;height:100%;border:none" allowfullscreen></iframe></div>`
                : `<div style="aspect-ratio:${d.aspect||'16/9'};background:#f3f4f6;border-radius:6px;display:flex;align-items:center;justify-content:center;font-size:12px;color:#9ca3af;border:1px dashed #d1d5db;">▶ No URL</div>`;
        }
        case 'button': {
            const bs = { primary:'background:#4f46e5;color:#fff;border:none', secondary:'background:#e5e7eb;color:#374151;border:none', outline:'background:transparent;color:#4f46e5;border:1.5px solid #4f46e5' };
            return `<div style="text-align:center;padding:5px 0"><span style="${bs[d.style]||bs.primary};padding:7px 16px;border-radius:6px;font-size:13px;font-weight:600;display:inline-block">${d.label||'Button'}</span></div>`;
        }
        case 'divider':
            return `<hr style="border:none;border-top:1.5px ${d.lineStyle||'solid'} ${d.color||'#e5e7eb'};margin:${d.margin||16}px 0">`;
        case 'spacer':
            return `<div style="height:${d.height||40}px;background:repeating-linear-gradient(45deg,#e5e7eb 0,#e5e7eb 1px,transparent 0,transparent 50%) 0 0/8px 8px;border-radius:4px;"></div>`;
        default: return '';
    }
}

function toEmbedUrl(url) {
    if (!url) return null;
    const yt = url.match(/(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]+)/);
    if (yt) return 'https://www.youtube.com/embed/' + yt[1];
    const vi = url.match(/vimeo\.com\/(\d+)/);
    if (vi) return 'https://player.vimeo.com/video/' + vi[1];
    return url;
}

/* ═══════════════════════════════════════════════════════
   ALPINE COMPONENT
═══════════════════════════════════════════════════════ */
function pageBuilder() {
    return {
        layout: [], selected: null, selectedId: null, viewport: 'desktop',

        dragState: { payload:null, movingSection:null, overSection:null, overCol:null, overContainer:null },

        get layoutEls()  { return ['flex-div','grid-div','columns','spacer','divider'].map(t => ({ type:t, ...REGISTRY[t] })); },
        get contentEls() { return ['hero','text','image','video','button'].map(t => ({ type:t, ...REGISTRY[t] })); },

        meta(type)     { return REGISTRY[type] || { icon:'?', label:type, container:false }; },
        isContainer(t) { return !!REGISTRY[t]?.container; },
        livePreview,
        previewLabel(b) { const d=b.data||{}; return d.title||d.content||d.label||(d.src?'(image)':'')||(d.url?'(url)':'')||''; },

        select(block) { this.selected=block; this.selectedId=block.id; },

        deleteSelected() {
            if (!this.selected) return;
            const id = this.selected.id;
            const rm = (arr) => { const i=arr.findIndex(b=>b.id===id); if(i!==-1){arr.splice(i,1);return true;} return arr.some(b=>b.children&&rm(b.children)); };
            for (const s of this.layout) for (const c of s.children) if (rm(c.children)) { this.selected=null; this.selectedId=null; return; }
        },

        removeBlock(si,ci,bi) {
            const b=this.layout[si]?.children[ci]?.children[bi];
            if(b&&this.selectedId===b.id){this.selected=null;this.selectedId=null;}
            this.layout[si].children[ci].children.splice(bi,1);
        },

        addSection()     { this.layout.push(makeSection(2)); },
        removeSection(i) { if(!confirm('Remove this section?')) return; this.layout.splice(i,1); },
        cloneSection(i)  { const c=JSON.parse(JSON.stringify(this.layout[i])); const ri=o=>{o.id=uid();(o.children||[]).forEach(ri);}; ri(c); this.layout.splice(i+1,0,c); },
        moveSection(i,d) { const t=i+d; if(t<0||t>=this.layout.length) return; [this.layout[i],this.layout[t]]=[this.layout[t],this.layout[i]]; },
        setCols(si,n) {
            const s=this.layout[si]; s.columns=n;
            while(s.children.length<n) s.children.push({id:uid(),type:'column',children:[]});
            while(s.children.length>n){const o=s.children.pop().children; s.children[s.children.length-1].children.push(...o);}
        },

        dragStart(e,p)      { this.dragState.payload=p; e.dataTransfer.effectAllowed='copy'; },
        sectionDragStart(e,si) { this.dragState.movingSection=si; e.dataTransfer.effectAllowed='move'; },
        sectionDragEnd()    { this.dragState.movingSection=null; this.dragState.overSection=null; },
        sectionDragOver(si) { if(this.dragState.movingSection!==null) this.dragState.overSection=si; },
        sectionDrop(si) {
            const f=this.dragState.movingSection;
            if(f===null||f===si){this.dragState.movingSection=null;return;}
            const [m]=this.layout.splice(f,1); this.layout.splice(si,0,m);
            this.dragState.movingSection=null; this.dragState.overSection=null;
        },

        colDrop(e,si,ci) {
            e.stopPropagation();
            const p=this.dragState.payload; if(!p) return;
            if(p.from==='sidebar') {
                if(!canNest('column',p.type)){this.toast('Cannot drop '+p.type+' here');return;}
                const nb=makeBlock(p.type); this.layout[si].children[ci].children.push(nb); this.select(nb);
            } else if(p.from==='block') {
                const b=this.layout[p.si].children[p.ci].children.splice(p.bi,1)[0];
                if(b){this.layout[si].children[ci].children.push(b);this.select(b);}
            }
            this.dragState.overCol=null; this.dragState.payload=null;
        },

        containerDrop(e,container) {
            const p=this.dragState.payload; if(!p||p.from!=='sidebar') return;
            if(!canNest(container.type,p.type)){this.toast(p.type+' cannot nest inside '+container.type);return;}
            const nb=makeBlock(p.type); if(!container.children) container.children=[];
            container.children.push(nb); this.select(nb);
            this.dragState.overContainer=null; this.dragState.payload=null;
        },

        async uploadImage(e) {
            const file=e.target.files[0]; if(!file||!this.selected) return;
            const fd=new FormData(); fd.append('image',file);
            try {
                const res=await fetch('/admin/upload',{method:'POST',headers:{'X-CSRF-TOKEN':window.BUILDER_CSRF},body:fd});
                const j=await res.json(); this.selected.data.src=j.url;
            } catch { this.toast('Upload failed'); }
        },

        async save() {
            try {
                const res=await fetch(window.BUILDER_SAVE_URL,{method:'POST',headers:{'Content-Type':'application/json','X-CSRF-TOKEN':window.BUILDER_CSRF},body:JSON.stringify({layout:JSON.stringify(this.layout)})});
                if(!res.ok) throw new Error();
                this.toast('Saved successfully');
            } catch { this.toast('Save failed'); }
        },

        toast(msg) {
            const el=document.getElementById('bl-toast'); el.textContent=msg; el.classList.add('show');
            clearTimeout(this._tt); this._tt=setTimeout(()=>el.classList.remove('show'),2400);
        },

        init() { this.layout=window.BUILDER_LAYOUT||[]; },
    };
}
</script>
@endverbatim
@endpush

</x-admin-layout>