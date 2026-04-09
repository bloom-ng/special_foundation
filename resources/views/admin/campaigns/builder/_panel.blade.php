{{-- ═══ SETTINGS PANEL ══════════════════════════════════════════════════════ --}}
<aside class="bl-panel drop-shadow-lg">

    {{-- ── Header ──────────────────────────────────────────────── --}}
    <div class="panel-header mt-5">
        <div>
            <h3>Block Settings</h3>
            <p class="panel-subtitle" x-text="selected ? meta(selected.type).label + ' properties' : 'Select a block to configure'"></p>
        </div>
        <button x-show="selected"
                @click="selected = null; selectedId = null"
                class="ic-btn hover:bg-red-50 hover:text-red-500 hover:border-red-200 transition-colors"
                title="Deselect">✕</button>
    </div>

    {{-- ── Body ───────────────────────────────────────────────── --}}
    <div class="flex-1 overflow-y-auto" x-cloak>

        {{-- Empty state --}}
        <div class="flex flex-col items-center justify-center text-center px-8 py-16" x-show="!selected">
            <div class="w-16 h-16 rounded-2xl bg-slate-100 flex items-center justify-center text-3xl mb-4">⚙️</div>
            <p class="text-[13px] font-semibold text-slate-600">Nothing selected</p>
            <p class="text-[11px] text-slate-400 mt-1.5 leading-relaxed">Click any block on the canvas<br>to edit its properties</p>
        </div>

        {{-- Settings form --}}
        <div x-show="selected">

            {{-- Block badge --}}
            <div class="px-4 pt-4 pb-2">
                <div class="panel-block-badge" x-show="selected">
                    <div class="badge-icon" x-text="selected ? meta(selected.type).icon : ''"></div>
                    <div>
                        <div class="badge-label" x-text="selected ? meta(selected.type).label : ''"></div>
                        <div class="badge-sub">Block Properties</div>
                    </div>
                </div>
            </div>

            {{-- Fields --}}
            <div class="px-4 pb-4 space-y-0">

                {{-- ── HERO ──────────────────────────────── --}}
                <template x-if="selected && selected.type === 'hero'">
                    <div class="space-y-2.5">
                        <div class="field-group">
                            <div class="field-group-title">Content</div>
                            <div class="field">
                                <label>Headline</label>
                                <input x-model="selected.data.title" placeholder="Enter hero headline…">
                            </div>
                            <div class="field">
                                <label>Subtitle</label>
                                <textarea x-model="selected.data.text" placeholder="Supporting text…" style="min-height:72px"></textarea>
                            </div>
                        </div>
                        <div class="field-group">
                            <div class="field-group-title">Call to Action</div>
                            <div class="field">
                                <label>Button Label</label>
                                <input x-model="selected.data.ctaText" placeholder="e.g. Donate Now">
                            </div>
                            <div class="field">
                                <label>Button URL</label>
                                <input x-model="selected.data.ctaLink" placeholder="https://…">
                            </div>
                        </div>
                        <div class="field-group">
                            <div class="field-group-title">Appearance</div>
                            <div class="field">
                                <label>Background Color</label>
                                <div class="color-field">
                                    <input type="color" x-model="selected.data.bgColor">
                                    <span class="color-hex" x-text="selected.data.bgColor || '#1e3a5f'"></span>
                                    <span class="color-label">BG</span>
                                </div>
                            </div>
                            <div class="field">
                                <label>Text Alignment</label>
                                <select x-model="selected.data.textAlign">
                                    <option value="left">Left</option>
                                    <option value="center">Center</option>
                                    <option value="right">Right</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </template>

                {{-- ── TEXT ──────────────────────────────── --}}
                <template x-if="selected && selected.type === 'text'">
                    <div class="space-y-2.5">
                        <div class="field-group">
                            <div class="field-group-title">Content</div>
                            <div class="field">
                                <label>Text</label>
                                <textarea x-model="selected.data.content" placeholder="Write your text here…"></textarea>
                            </div>
                        </div>
                        <div class="field-group">
                            <div class="field-group-title">Typography</div>
                            <div class="field-row">
                                <div class="field">
                                    <label>Font Size</label>
                                    <select x-model="selected.data.fontSize">
                                        <option value="12px">12px — XS</option>
                                        <option value="14px">14px — SM</option>
                                        <option value="16px">16px — Base</option>
                                        <option value="18px">18px — LG</option>
                                        <option value="22px">22px — XL</option>
                                        <option value="28px">28px — 2XL</option>
                                    </select>
                                </div>
                                <div class="field">
                                    <label>Weight</label>
                                    <select x-model="selected.data.fontWeight">
                                        <option value="400">Regular</option>
                                        <option value="600">Semibold</option>
                                        <option value="700">Bold</option>
                                    </select>
                                </div>
                            </div>
                            <div class="field-row">
                                <div class="field">
                                    <label>Text Color</label>
                                    <div class="color-field">
                                        <input type="color" x-model="selected.data.color">
                                        <span class="color-hex" x-text="selected.data.color || '#111827'"></span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label>Alignment</label>
                                    <select x-model="selected.data.textAlign">
                                        <option value="left">Left</option>
                                        <option value="center">Center</option>
                                        <option value="right">Right</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>

                {{-- ── IMAGE ─────────────────────────────── --}}
                <template x-if="selected && selected.type === 'image'">
                    <div class="space-y-2.5">
                        <div class="field-group">
                            <div class="field-group-title">Image Source</div>
                            <div class="field">
                                <label>Upload Image</label>
                                <input type="file" accept="image/*" @change="uploadImage($event)">
                                <img x-show="selected.data.src" :src="selected.data.src" class="thumb" alt="">
                            </div>
                            <div class="field">
                                <label>Alt Text</label>
                                <input x-model="selected.data.alt" placeholder="Describe the image…">
                            </div>
                        </div>
                        <div class="field-group">
                            <div class="field-group-title">Display</div>
                            <div class="field-row">
                                <div class="field">
                                    <label>Object Fit</label>
                                    <select x-model="selected.data.objectFit">
                                        <option value="cover">Cover</option>
                                        <option value="contain">Contain</option>
                                        <option value="fill">Fill</option>
                                    </select>
                                </div>
                                <div class="field">
                                    <label>Height (px)</label>
                                    <input type="number" x-model="selected.data.height" placeholder="240" min="40">
                                </div>
                            </div>
                        </div>
                    </div>
                </template>

                {{-- ── VIDEO ─────────────────────────────── --}}
                <template x-if="selected && selected.type === 'video'">
                    <div class="space-y-2.5">
                        <div class="field-group">
                            <div class="field-group-title">Video Source</div>
                            <div class="field">
                                <label>Video URL</label>
                                <input x-model="selected.data.url" placeholder="YouTube or Vimeo URL">
                            </div>
                        </div>
                        <div class="field-group">
                            <div class="field-group-title">Playback</div>
                            <div class="field">
                                <label>Aspect Ratio</label>
                                <select x-model="selected.data.aspect">
                                    <option value="16/9">16:9 — Widescreen</option>
                                    <option value="4/3">4:3 — Standard</option>
                                    <option value="1/1">1:1 — Square</option>
                                </select>
                            </div>
                            <div class="check-field">
                                <input type="checkbox" id="vid-ap" x-model="selected.data.autoplay">
                                <label for="vid-ap">Autoplay on load</label>
                            </div>
                        </div>
                    </div>
                </template>

                {{-- ── BUTTON ────────────────────────────── --}}
                <template x-if="selected && selected.type === 'button'">
                    <div class="space-y-2.5">
                        <div class="field-group">
                            <div class="field-group-title">Content</div>
                            <div class="field">
                                <label>Button Label</label>
                                <input x-model="selected.data.label" placeholder="Click me">
                            </div>
                            <div class="field">
                                <label>Link URL</label>
                                <input x-model="selected.data.link" placeholder="https://…">
                            </div>
                        </div>
                        <div class="field-group">
                            <div class="field-group-title">Style</div>
                            <div class="field">
                                <label>Variant</label>
                                <select x-model="selected.data.style">
                                    <option value="primary">Primary — filled</option>
                                    <option value="secondary">Secondary — muted</option>
                                    <option value="outline">Outline — bordered</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </template>

                {{-- ── DIVIDER ───────────────────────────── --}}
                <template x-if="selected && selected.type === 'divider'">
                    <div class="space-y-2.5">
                        <div class="field-group">
                            <div class="field-group-title">Divider Style</div>
                            <div class="field">
                                <label>Line Style</label>
                                <select x-model="selected.data.lineStyle">
                                    <option value="solid">Solid</option>
                                    <option value="dashed">Dashed</option>
                                    <option value="dotted">Dotted</option>
                                </select>
                            </div>
                            <div class="field-row">
                                <div class="field">
                                    <label>Color</label>
                                    <div class="color-field">
                                        <input type="color" x-model="selected.data.color">
                                        <span class="color-hex" x-text="selected.data.color || '#e2e8f0'"></span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label>Margin (px)</label>
                                    <input type="number" x-model="selected.data.margin" placeholder="16" min="0">
                                </div>
                            </div>
                        </div>
                    </div>
                </template>

                {{-- ── SPACER ────────────────────────────── --}}
                <template x-if="selected && selected.type === 'spacer'">
                    <div class="space-y-2.5">
                        <div class="field-group">
                            <div class="field-group-title">Spacer</div>
                            <div class="field">
                                <label>Height (px)</label>
                                <input type="number" x-model="selected.data.height" placeholder="40" min="4">
                            </div>
                        </div>
                    </div>
                </template>

                {{-- ── FLEX-DIV ──────────────────────────── --}}
                <template x-if="selected && selected.type === 'flex-div'">
                    <div class="space-y-2.5">
                        <div class="field-group">
                            <div class="field-group-title">Flex Layout</div>
                            <div class="field">
                                <label>Direction</label>
                                <select x-model="selected.data.flexDir">
                                    <option value="row">Row — left to right</option>
                                    <option value="column">Column — top to bottom</option>
                                    <option value="row-reverse">Row Reverse</option>
                                    <option value="column-reverse">Column Reverse</option>
                                </select>
                            </div>
                            <div class="field-row">
                                <div class="field">
                                    <label>Gap (px)</label>
                                    <input type="number" x-model="selected.data.gap" placeholder="16" min="0">
                                </div>
                                <div class="field">
                                    <label>Padding (px)</label>
                                    <input type="number" x-model="selected.data.padding" placeholder="16" min="0">
                                </div>
                            </div>
                        </div>
                        <div class="field-group">
                            <div class="field-group-title">Alignment</div>
                            <div class="field">
                                <label>Align Items</label>
                                <select x-model="selected.data.alignItems">
                                    <option value="stretch">Stretch</option>
                                    <option value="flex-start">Start</option>
                                    <option value="center">Center</option>
                                    <option value="flex-end">End</option>
                                </select>
                            </div>
                            <div class="field">
                                <label>Justify Content</label>
                                <select x-model="selected.data.justifyContent">
                                    <option value="flex-start">Start</option>
                                    <option value="center">Center</option>
                                    <option value="flex-end">End</option>
                                    <option value="space-between">Space Between</option>
                                    <option value="space-around">Space Around</option>
                                </select>
                            </div>
                        </div>
                        <div class="field-group">
                            <div class="field-group-title">Style</div>
                            <div class="field">
                                <label>Background Color</label>
                                <div class="color-field">
                                    <input type="color" x-model="selected.data.bgColor">
                                    <span class="color-hex" x-text="selected.data.bgColor || '#f9fafb'"></span>
                                    <span class="color-label">Fill</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>

                {{-- ── GRID-DIV ──────────────────────────── --}}
                <template x-if="selected && selected.type === 'grid-div'">
                    <div class="space-y-2.5">
                        <div class="field-group">
                            <div class="field-group-title">Grid Layout</div>
                            <div class="field-row">
                                <div class="field">
                                    <label>Columns</label>
                                    <input type="number" x-model="selected.data.gridCols" min="1" max="12" placeholder="2">
                                </div>
                                <div class="field">
                                    <label>Gap (px)</label>
                                    <input type="number" x-model="selected.data.gap" placeholder="16" min="0">
                                </div>
                            </div>
                            <div class="field">
                                <label>Padding (px)</label>
                                <input type="number" x-model="selected.data.padding" placeholder="16" min="0">
                            </div>
                        </div>
                        <div class="field-group">
                            <div class="field-group-title">Style</div>
                            <div class="field">
                                <label>Background Color</label>
                                <div class="color-field">
                                    <input type="color" x-model="selected.data.bgColor">
                                    <span class="color-hex" x-text="selected.data.bgColor || '#f9fafb'"></span>
                                    <span class="color-label">Fill</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>

                {{-- ── COLUMNS ───────────────────────────── --}}
                <template x-if="selected && selected.type === 'columns'">
                    <div class="space-y-2.5">
                        <div class="field-group">
                            <div class="field-group-title">Columns Container</div>
                            <div class="field-row">
                                <div class="field">
                                    <label>Count</label>
                                    <input type="number" x-model="selected.data.cols" min="1" max="6" placeholder="2">
                                </div>
                                <div class="field">
                                    <label>Gap (px)</label>
                                    <input type="number" x-model="selected.data.gap" placeholder="16" min="0">
                                </div>
                            </div>
                        </div>
                    </div>
                </template>

                {{-- ── COLUMN ZONE ───────────────────────── --}}
                <template x-if="selected && selected.type === 'column'">
                    <div class="space-y-2.5">
                        <div class="field-group">
                            <div class="field-group-title">Column Style</div>
                            <div class="field">
                                <label>Background Color</label>
                                <div class="color-field">
                                    <input type="color" x-model="selected.data.bgColor">
                                    <span class="color-hex" x-text="selected.data.bgColor || '#ffffff'"></span>
                                    <span class="color-label">Fill</span>
                                </div>
                            </div>
                            <div class="field">
                                <label>Vertical Alignment</label>
                                <select x-model="selected.data.valign">
                                    <option value="start">Top</option>
                                    <option value="center">Middle</option>
                                    <option value="end">Bottom</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </template>

            </div>{{-- /fields --}}

            {{-- ── Delete button ─────────────────────────── --}}
            <div class="px-4 pb-5 pt-2">
                <div class="h-px bg-slate-100 mb-4"></div>
                <button @click="deleteSelected()"
                        class="w-full flex items-center justify-center gap-2 py-2.5 px-4
                               rounded-lg border border-red-200 bg-red-50
                               text-[12px] font-semibold text-red-600
                               hover:bg-red-100 hover:border-red-300
                               active:scale-[0.98] transition-all cursor-pointer">
                    <span>🗑</span>
                    <span>Delete Block</span>
                </button>
            </div>

        </div>{{-- /x-show selected --}}
    </div>{{-- /body --}}

</aside>
