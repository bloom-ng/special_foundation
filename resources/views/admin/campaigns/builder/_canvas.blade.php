{{-- ═══ CANVAS ══════════════════════════════════════════════════════════════ --}}
<div class="bl-canvas flex-1 overflow-y-auto">
    <div class="canvas-frame" :class="viewport !== 'desktop' ? viewport : ''">

        {{-- Empty state (Now with drag & drop support) --}}
        <div class="canvas-empty-state"
             x-show="layout.length === 0"
             :class="{ 'drop-target': dragState.overCanvas }"
             @dragover.prevent="canvasDragOver($event)"
             @dragleave.self="canvasDragLeave()"
             @drop.prevent="canvasDrop($event)">
            <span class="text-4xl mb-4">🏗</span>
            <p class="text-lg font-semibold text-slate-600">Your canvas is empty</p>
            <p class="text-sm text-slate-400">Drag an element here or click <strong class="text-slate-600 hover:text-indigo-600 cursor-pointer" @click="addSection()">+ Add Section</strong></p>
        </div>

        {{-- ── Sections ────────────────────────────────────────── --}}
        <template x-for="(section, si) in layout" :key="section.id">
            <div class="sec-card shadow-sm hover:shadow-md transition-shadow duration-200"
                 :class="{ 'drop-target': dragState.overSection === si && dragState.movingSection !== null }"
                 draggable="true"
                 @dragstart.self="sectionDragStart($event, si)"
                 @dragend="sectionDragEnd()"
                 @dragover.prevent="sectionDragOver(si)"
                 @drop.prevent="sectionDrop(si)">

                {{-- Section header --}}
                <div class="sec-header flex items-center gap-3 bg-slate-50/80 px-4 py-2.5 rounded-t-xl border-b border-slate-100">
                    <span class="cursor-grab text-slate-300 hover:text-slate-500 transition-colors" title="Drag to reorder">⠿</span>
                    <span class="sec-title text-[11px] font-bold text-slate-400 uppercase tracking-widest">Section <span x-text="si + 1"></span></span>
                    
                    <div class="flex-1"></div>

                    {{-- Direction toggle --}}
                    <div class="flex items-center gap-1 bg-white p-1 rounded-lg border border-slate-200">
                        <button class="px-2 py-1 text-[11px] font-bold rounded-md transition-all"
                                :class="(section.direction || 'row') === 'row' ? 'bg-indigo-600 text-white shadow-sm' : 'text-slate-400 hover:bg-slate-50'"
                                @click.stop="section.direction = 'row'" title="Horizontal layout">⬌</button>
                        <button class="px-2 py-1 text-[11px] font-bold rounded-md transition-all"
                                :class="section.direction === 'column' ? 'bg-indigo-600 text-white shadow-sm' : 'text-slate-400 hover:bg-slate-50'"
                                @click.stop="section.direction = 'column'" title="Vertical layout">⬍</button>
                    </div>

                    <div class="h-4 w-px bg-slate-200"></div>

                    {{-- Column count buttons --}}
                    <div class="flex items-center gap-1 bg-white p-1 rounded-lg border border-slate-200">
                        <template x-for="n in [1,2,3,4]" :key="n">
                            <button class="px-2.5 py-1 text-[11px] font-bold rounded-md transition-all"
                                    :class="section.columns === n ? 'bg-indigo-600 text-white shadow-sm' : 'text-slate-400 hover:bg-slate-50 hover:text-slate-600'"
                                    @click.stop="setCols(si, n)" x-text="n"></button>
                        </template>
                    </div>

                    <div class="h-4 w-px bg-slate-200"></div>

                    <div class="flex items-center gap-1">
                        <button @click.stop="cloneSection(si)"   class="ic-btn" title="Clone section">⧉</button>
                        <button @click.stop="moveSection(si,-1)" class="ic-btn" title="Move up">↑</button>
                        <button @click.stop="moveSection(si, 1)" class="ic-btn" title="Move down">↓</button>
                        <button @click.stop="removeSection(si)"  class="ic-btn danger" title="Delete section">✕</button>
                    </div>
                </div>

                {{-- ── Columns ─────────────────────────────────── --}}
                <div class="sec-columns-flex"
                     :class="{ 'sec-dir-col': section.direction === 'column' }">
                    <template x-for="(col, ci) in section.children" :key="col.id">

                        {{-- Column drop zone --}}
                        <div class="col-zone"
                             :class="{ 'drop-target': dragState.overCol === si + '-' + ci }"
                             @dragover.prevent="colDragOver($event, si, ci)"
                             @dragleave.self="colDragLeave()"
                             @drop.prevent="colDrop($event, si, ci)">

                            {{-- Empty column placeholder --}}
                            <div class="flex flex-col items-center justify-center flex-1 min-h-24 py-8 text-stone-500 pointer-events-none transition-opacity border-dashed border-2 border-stone-400 rounded-xl"
                                 x-show="col.children.length === 0">
                                <span class="text-xl mb-1">↡</span>
                                <span class="text-[11px] font-medium uppercase tracking-wider">Drop Content</span>
                            </div>

                            {{-- ── Blocks ──────────────────── --}}
                            <template x-for="(block, bi) in col.children" :key="block.id">
                                <div class="relative group">
                                    {{-- Drop indicator BEFORE this block --}}
                                    <div class="drop-indicator absolute -top-1.5 left-0 right-0 z-10"
                                         x-show="dragState.overCol === si + '-' + ci && dragState.insertAt === bi"
                                         x-cloak></div>

                                    {{-- ── Container block (flex-div, grid-div, columns) ── --}}
                                    <template x-if="isContainer(block.type)">
                                        <div class="bl-container p-3 border-2 border-dashed border-indigo-100 rounded-xl bg-indigo-50/30 hover:border-indigo-300 transition-all cursor-grab active:cursor-grabbing"
                                             :class="{ 'ring-2 ring-indigo-500 ring-offset-2': selectedId === block.id, 'bg-indigo-50/60 border-indigo-400': dragState.overContainer === block.id }"
                                             :data-block-id="block.id"
                                             draggable="true"
                                             @dragstart.stop="blockDragStart($event, block.id)"
                                             @click.stop="select(block)"
                                             @dragover.prevent="containerDragOver($event, block)"
                                             @dragleave.self="containerDragLeave()"
                                             @drop.prevent.stop="containerDrop($event, block)">

                                            {{-- Container header --}}
                                            <div class="bc-head flex items-center gap-2 mb-3 pb-2 border-b border-indigo-100/50">
                                                <span class="text-indigo-500 font-bold" x-text="meta(block.type).icon"></span>
                                                <span class="text-[10px] font-bold uppercase tracking-wider text-indigo-400" x-text="meta(block.type).label"></span>
                                                <div class="flex-1"></div>
                                                <button @click.stop="removeBlock(block.id)"
                                                        class="text-indigo-300 hover:text-red-500 transition-colors">✕</button>
                                            </div>

                                            {{-- Container children --}}
                                            <div class="space-y-2">
                                                <template x-for="(child, chi) in block.children" :key="child.id">
                                                    <div class="relative">
                                                        {{-- Drop indicator before child --}}
                                                        <div class="drop-indicator absolute -top-1 left-0 right-0 z-10"
                                                             x-show="dragState.overContainer === block.id && dragState.containerInsertAt === chi"
                                                             x-cloak></div>

                                                        {{-- Child block chip + preview --}}
                                                        <div :data-block-id="child.id">
                                                            <div class="bl-chip shadow-sm"
                                                                 :class="{ 'border-indigo-500 bg-indigo-50': selectedId === child.id }"
                                                                 draggable="true"
                                                                 @dragstart.stop="blockDragStart($event, child.id)"
                                                                 @click.stop="select(child)">
                                                                <span class="text-slate-400" x-text="meta(child.type).icon"></span>
                                                                <span class="flex-1 text-slate-700 font-medium" x-text="meta(child.type).label"></span>
                                                                <span class="text-[10px] text-slate-400 truncate max-w-[80px]" x-text="previewLabel(child)"></span>
                                                                <button class="opacity-0 group-hover:opacity-100 p-1 hover:text-red-500 transition-all" @click.stop="removeBlock(child.id)">✕</button>
                                                            </div>
                                                            <div class="bl-preview shadow-sm" x-html="livePreview(child)"></div>
                                                        </div>
                                                    </div>
                                                </template>
                                            </div>

                                            {{-- Drop indicator after last child --}}
                                            <div class="drop-indicator mt-2"
                                                 x-show="dragState.overContainer === block.id && dragState.containerInsertAt === block.children.length"
                                                 x-cloak></div>

                                            {{-- Empty container placeholder --}}
                                            <div x-show="block.children.length === 0"
                                                 class="text-[10px] text-center py-4 text-indigo-300 font-bold uppercase tracking-widest border-2 border-dashed border-indigo-100/50 rounded-lg">
                                                Drop inside
                                            </div>
                                        </div>
                                    </template>

                                    {{-- ── Leaf block (text, image, video, hero, button, divider, spacer) ── --}}
                                    <template x-if="!isContainer(block.type)">
                                        <div :data-block-id="block.id" class="group">
                                            <div class="bl-chip shadow-sm border-slate-200 group-hover:border-slate-300 transition-colors"
                                                 :class="{ 'border-indigo-500 bg-indigo-50': selectedId === block.id }"
                                                 draggable="true"
                                                 @dragstart.stop="blockDragStart($event, block.id)"
                                                 @click.stop="select(block)">
                                                <span class="text-slate-400 text-sm" x-text="meta(block.type).icon"></span>
                                                <span class="flex-1 text-slate-700 font-medium" x-text="meta(block.type).label"></span>
                                                <span class="text-[10px] text-slate-400 truncate max-w-[120px]" x-text="previewLabel(block)"></span>
                                                <button class="ml-2 text-slate-300 hover:text-red-500 transition-colors" @click.stop="removeBlock(block.id)">✕</button>
                                            </div>
                                            {{-- Live preview — always visible --}}
                                            <div class="bl-preview shadow-sm border-slate-100 group-hover:border-slate-200 transition-colors" x-html="livePreview(block)"></div>
                                        </div>
                                    </template>
                                </div>
                            </template>

                            {{-- Drop indicator AFTER last block in column --}}
                            <div class="drop-indicator absolute -bottom-1.5 left-0 right-0 z-10"
                                 x-show="dragState.overCol === si + '-' + ci && dragState.insertAt === col.children.length"
                                 x-cloak></div>

                        </div>{{-- /col-zone --}}
                    </template>
                </div>{{-- /flex columns --}}

            </div>{{-- /sec-card --}}
        </template>

    </div>{{-- /canvas-frame --}}
</div>{{-- /bl-canvas --}}
