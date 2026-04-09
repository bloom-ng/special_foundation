/* ==========================================================================
   PAGE BUILDER — Alpine v2 component + helpers
   Loaded as a plain <script> (no module/defer) so pageBuilder() is globally
   available before Alpine's deferred DOMContentLoaded handler fires.
   ========================================================================== */

/* --------------------------------------------------------------------------
   ELEMENT REGISTRY
   container : can receive children via drop
   parents   : valid parent context types this element may live inside
   -------------------------------------------------------------------------- */
var REGISTRY = {
    'flex-div': { label: 'Flex Div',  icon: '↔', container: true,  parents: ['column', 'flex-div', 'grid-div', 'columns'] },
    'grid-div': { label: 'Grid Div',  icon: '⊞', container: true,  parents: ['column', 'flex-div', 'grid-div', 'columns'] },
    'columns':  { label: 'Columns',   icon: '⫿', container: true,  parents: ['column', 'flex-div', 'grid-div'] },
    'hero':     { label: 'Hero',      icon: '✦', container: false, parents: ['column', 'flex-div', 'grid-div', 'columns'] },
    'text':     { label: 'Text',      icon: 'T', container: false, parents: ['column', 'flex-div', 'grid-div', 'columns'] },
    'image':    { label: 'Image',     icon: '🖼', container: false, parents: ['column', 'flex-div', 'grid-div', 'columns'] },
    'video':    { label: 'Video',     icon: '▶', container: false, parents: ['column', 'flex-div', 'grid-div', 'columns'] },
    'button':   { label: 'Button',    icon: '⬭', container: false, parents: ['column', 'flex-div', 'grid-div', 'columns'] },
    'divider':  { label: 'Divider',   icon: '─', container: false, parents: ['column', 'flex-div', 'grid-div', 'columns'] },
    'spacer':   { label: 'Spacer',    icon: '⇕', container: false, parents: ['column', 'flex-div', 'grid-div', 'columns'] },
};

/* --------------------------------------------------------------------------
   NESTING RULE
   A child may be placed inside parentType only if parentType is in child's
   parents list. Leaf blocks have no container:true flag, so they cannot
   receive children (video can go in flex-div, but flex-div cannot go in video).
   -------------------------------------------------------------------------- */
function canNest(parentType, childType) {
    return (REGISTRY[childType] && REGISTRY[childType].parents || []).includes(parentType);
}

/* --------------------------------------------------------------------------
   UTILITIES
   -------------------------------------------------------------------------- */
function uid() {
    return Math.random().toString(36).slice(2, 9);
}

function makeBlock(type) {
    var defaults = {
        'hero':     { title: 'Hero Title', text: '', ctaText: '', ctaLink: '', bgColor: '#1e3a5f', textAlign: 'center' },
        'text':     { content: 'Your text here.', fontSize: '16px', textAlign: 'left', color: '#111827', fontWeight: '400' },
        'image':    { src: '', alt: '', objectFit: 'cover', height: 220 },
        'video':    { url: '', aspect: '16/9', autoplay: false },
        'flex-div': { flexDir: 'row', gap: 16, padding: 16, bgColor: '#f9fafb', alignItems: 'stretch', justifyContent: 'flex-start' },
        'grid-div': { gridCols: 2, gap: 16, padding: 16, bgColor: '#f9fafb' },
        'columns':  { cols: 2, gap: 16 },
        'button':   { label: 'Click Me', link: '#', style: 'primary' },
        'divider':  { lineStyle: 'solid', color: '#e5e7eb', margin: 16 },
        'spacer':   { height: 40 },
    };
    return { id: uid(), type: type, data: Object.assign({}, defaults[type] || {}), children: [] };
}

function makeSection(cols) {
    cols = cols || 1;
    return {
        id: uid(), type: 'section', columns: cols, direction: 'row',
        children: Array.from({ length: cols }, function() { return { id: uid(), type: 'column', children: [] }; })
    };
}

/* --------------------------------------------------------------------------
   TREE HELPERS
   findAndRemoveBlock walks the full layout tree, removes the node with the
   matching id and returns it. Used by all drag moves and delete operations.
   -------------------------------------------------------------------------- */
function findAndRemoveBlock(layout, id) {
    function removeFrom(arr) {
        var i = arr.findIndex(function(b) { return b.id === id; });
        if (i !== -1) return arr.splice(i, 1)[0];
        for (var k = 0; k < arr.length; k++) {
            if (arr[k].children && arr[k].children.length) {
                var found = removeFrom(arr[k].children);
                if (found) return found;
            }
        }
        return null;
    }
    for (var s = 0; s < layout.length; s++) {
        for (var c = 0; c < layout[s].children.length; c++) {
            var found = removeFrom(layout[s].children[c].children);
            if (found) return found;
        }
    }
    return null;
}

/* --------------------------------------------------------------------------
   LIVE PREVIEW RENDERER
   Returns an HTML string shown inline in the canvas for each block type.
   -------------------------------------------------------------------------- */
function livePreview(block) {
    var d = block.data || {};
    switch (block.type) {
        case 'hero':
            return '<div style="background:' + (d.bgColor || '#1e3a5f') + ';padding:18px 14px;border-radius:7px;text-align:' + (d.textAlign || 'center') + '">' +
                '<div style="font-size:15px;font-weight:700;color:#fff;margin-bottom:5px">' + (d.title || 'Hero Title') + '</div>' +
                (d.text ? '<div style="font-size:12px;color:rgba(255,255,255,.7);margin-bottom:9px">' + d.text + '</div>' : '') +
                (d.ctaText ? '<span style="display:inline-block;padding:5px 13px;background:#4f46e5;color:#fff;border-radius:5px;font-size:12px;font-weight:600">' + d.ctaText + '</span>' : '') +
                '</div>';

        case 'text':
            return '<p style="font-size:' + (d.fontSize || '16px') + ';color:' + (d.color || '#111827') + ';text-align:' + (d.textAlign || 'left') + ';font-weight:' + (d.fontWeight || 400) + ';margin:0">' + (d.content || 'Text block') + '</p>';

        case 'image':
            return d.src
                ? '<img src="' + d.src + '" style="width:100%;height:' + (d.height || 220) + 'px;object-fit:' + (d.objectFit || 'cover') + ';border-radius:6px;display:block;">'
                : '<div style="width:100%;height:' + (d.height || 220) + 'px;background:#f3f4f6;border-radius:6px;display:flex;align-items:center;justify-content:center;font-size:12px;color:#9ca3af;border:1px dashed #d1d5db;">🖼 No image</div>';

        case 'video': {
            var src = toEmbedUrl(d.url);
            return src
                ? '<div style="position:relative;aspect-ratio:' + (d.aspect || '16/9') + ';background:#000;border-radius:6px;overflow:hidden"><iframe src="' + src + '" style="position:absolute;inset:0;width:100%;height:100%;border:none" allowfullscreen></iframe></div>'
                : '<div style="aspect-ratio:' + (d.aspect || '16/9') + ';background:#f3f4f6;border-radius:6px;display:flex;align-items:center;justify-content:center;font-size:12px;color:#9ca3af;border:1px dashed #d1d5db;">▶ No URL</div>';
        }

        case 'button': {
            var bs = {
                primary:   'background:#4f46e5;color:#fff;border:none',
                secondary: 'background:#e5e7eb;color:#374151;border:none',
                outline:   'background:transparent;color:#4f46e5;border:1.5px solid #4f46e5'
            };
            return '<div style="text-align:center;padding:5px 0"><span style="' + (bs[d.style] || bs.primary) + ';padding:7px 16px;border-radius:6px;font-size:13px;font-weight:600;display:inline-block">' + (d.label || 'Button') + '</span></div>';
        }

        case 'divider':
            return '<hr style="border:none;border-top:1.5px ' + (d.lineStyle || 'solid') + ' ' + (d.color || '#e5e7eb') + ';margin:' + (d.margin || 16) + 'px 0">';

        case 'spacer':
            return '<div style="height:' + (d.height || 40) + 'px;background:repeating-linear-gradient(45deg,#e5e7eb 0,#e5e7eb 1px,transparent 0,transparent 50%) 0 0/8px 8px;border-radius:4px;"></div>';

        case 'flex-div':
            return '<div style="background:' + (d.bgColor || '#f9fafb') + ';padding:' + (d.padding || 16) + 'px;border-radius:6px;display:flex;flex-direction:' + (d.flexDir || 'row') + ';gap:' + (d.gap || 16) + 'px;align-items:' + (d.alignItems || 'stretch') + ';justify-content:' + (d.justifyContent || 'flex-start') + ';min-height:40px;font-size:11px;color:#818cf8;border:1.5px dashed #c7d2fe;">Flex container</div>';

        case 'grid-div':
            return '<div style="background:' + (d.bgColor || '#f9fafb') + ';padding:' + (d.padding || 16) + 'px;border-radius:6px;display:grid;grid-template-columns:repeat(' + (d.gridCols || 2) + ',1fr);gap:' + (d.gap || 16) + 'px;min-height:40px;font-size:11px;color:#818cf8;border:1.5px dashed #c7d2fe;">Grid container</div>';

        case 'columns':
            return '<div style="display:grid;grid-template-columns:repeat(' + (d.cols || 2) + ',1fr);gap:' + (d.gap || 16) + 'px;min-height:40px;font-size:11px;color:#818cf8;border:1.5px dashed #c7d2fe;padding:8px;border-radius:6px;">Columns (' + (d.cols || 2) + ')</div>';

        default: return '';
    }
}

function toEmbedUrl(url) {
    if (!url) return null;
    var yt = url.match(/(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]+)/);
    if (yt) return 'https://www.youtube.com/embed/' + yt[1];
    var vi = url.match(/vimeo\.com\/(\d+)/);
    if (vi) return 'https://player.vimeo.com/video/' + vi[1];
    return url;
}

/* --------------------------------------------------------------------------
   ALPINE COMPONENT — pageBuilder()
   -------------------------------------------------------------------------- */
function pageBuilder() {
    /* Resolve the initial layout once, before Alpine touches anything.
       window.BUILDER_LAYOUT is set synchronously by the inline <script>
       before Alpine's deferred script runs, so it is always available here. */
    var _raw = window.BUILDER_LAYOUT;
    if (typeof _raw === 'string') { try { _raw = JSON.parse(_raw); } catch(e) { _raw = []; } }
    var _initialLayout = Array.isArray(_raw) ? _raw : [];

    return {
        /* ── state ──────────────────────────────────────────────────── */
        layout:     _initialLayout,
        selected:   null,
        selectedId: null,
        viewport:   'desktop',

        /* dragState tracks every aspect of an in-flight drag operation   */
        dragState: {
            payload:            null,  // { from:'sidebar', type } | { from:'canvas', blockId }
            movingSection:      null,  // index of section being dragged
            overSection:        null,  // index of section being hovered (for section reorder)
            overCol:            null,  // "si-ci" key of column being hovered
            insertAt:           null,  // insertion index within that column
            overContainer:      null,  // block.id of container being hovered
            containerInsertAt:  null,  // insertion index within container.children
        },

        /* ── computed element lists for the sidebar ──────────────────── */
        get layoutEls()  { return ['flex-div', 'grid-div', 'columns', 'spacer', 'divider'].map(function(t) { return Object.assign({ type: t }, REGISTRY[t]); }); },
        get contentEls() { return ['hero', 'text', 'image', 'video', 'button'].map(function(t) { return Object.assign({ type: t }, REGISTRY[t]); }); },

        /* ── helpers ─────────────────────────────────────────────────── */
        meta:         function(type)  { return REGISTRY[type] || { icon: '?', label: type, container: false }; },
        isContainer:  function(t)     { return !!(REGISTRY[t] && REGISTRY[t].container); },
        livePreview:  livePreview,
        previewLabel: function(b)     { var d = b.data || {}; return d.title || d.content || d.label || (d.src ? '(image)' : '') || (d.url ? '(url)' : '') || ''; },

        /* ── selection ───────────────────────────────────────────────── */
        select: function(block) {
            this.selected   = block;
            this.selectedId = block.id;
        },

        /* ── delete operations ───────────────────────────────────────── */
        deleteSelected: function() {
            if (!this.selected) return;
            findAndRemoveBlock(this.layout, this.selected.id);
            this.selected   = null;
            this.selectedId = null;
        },

        removeBlock: function(blockId) {
            if (this.selectedId === blockId) { this.selected = null; this.selectedId = null; }
            findAndRemoveBlock(this.layout, blockId);
        },

        /* ── section operations ──────────────────────────────────────── */
        addSection: function() {
            this.layout.push(makeSection(1));
        },

        removeSection: function(i) {
            if (!confirm('Remove this section?')) return;
            this.layout.splice(i, 1);
        },

        cloneSection: function(i) {
            var c = JSON.parse(JSON.stringify(this.layout[i]));
            var ri = function(o) { o.id = uid(); (o.children || []).forEach(ri); };
            ri(c);
            this.layout.splice(i + 1, 0, c);
        },

        moveSection: function(i, d) {
            var t = i + d;
            if (t < 0 || t >= this.layout.length) return;
            var tmp = this.layout[i]; this.layout[i] = this.layout[t]; this.layout[t] = tmp;
            /* Alpine v2 mutation trigger */
            this.layout = this.layout.slice();
        },

        setCols: function(si, n) {
            var s = this.layout[si]; s.columns = n;
            while (s.children.length < n) s.children.push({ id: uid(), type: 'column', children: [] });
            while (s.children.length > n) {
                var overflow = s.children.pop().children;
                s.children[s.children.length - 1].children.push.apply(s.children[s.children.length - 1].children, overflow);
            }
        },

        /* ── DRAG: sidebar pills ─────────────────────────────────────── */
        dragStart: function(e, p) {
            this.dragState.payload = p; /* { from:'sidebar', type } */
            e.dataTransfer.effectAllowed = 'copy';
        },

        /* ── DRAG: canvas blocks (all block types) ───────────────────── */
        blockDragStart: function(e, blockId) {
            this.dragState.payload = { from: 'canvas', blockId: blockId };
            e.dataTransfer.effectAllowed = 'move';
        },

        /* ── DRAG: section reorder ───────────────────────────────────── */
        sectionDragStart: function(e, si) {
            this.dragState.movingSection = si;
            e.dataTransfer.effectAllowed = 'move';
        },

        sectionDragEnd: function() {
            this.dragState.movingSection = null;
            this.dragState.overSection   = null;
        },

        sectionDragOver: function(si) {
            if (this.dragState.movingSection !== null) this.dragState.overSection = si;
        },

        sectionDrop: function(si) {
            var f = this.dragState.movingSection;
            if (f === null || f === si) { this.dragState.movingSection = null; return; }
            var moved = this.layout.splice(f, 1)[0];
            this.layout.splice(si, 0, moved);
            this.dragState.movingSection = null;
            this.dragState.overSection   = null;
        },

        /* ── DRAGOVER: column zone — compute insert position ─────────── */
        colDragOver: function(e, si, ci) {
            /* Skip if this is a section reorder drag */
            if (this.dragState.movingSection !== null) return;
            this.dragState.overCol = si + '-' + ci;
            var chips = Array.from(e.currentTarget.querySelectorAll(':scope > [data-block-id]'));
            var idx = chips.length;
            for (var i = 0; i < chips.length; i++) {
                var r = chips[i].getBoundingClientRect();
                if (e.clientY < r.top + r.height / 2) { idx = i; break; }
            }
            this.dragState.insertAt = idx;
        },

        colDragLeave: function() {
            this.dragState.overCol  = null;
            this.dragState.insertAt = null;
        },

        /* ── DROP: column zone ───────────────────────────────────────── */
        colDrop: function(e, si, ci) {
            e.stopPropagation();
            var p = this.dragState.payload;
            if (!p) { this._clearDragState(); return; }

            var col = this.layout[si].children[ci];
            var idx = this.dragState.insertAt !== null ? this.dragState.insertAt : col.children.length;

            if (p.from === 'sidebar') {
                if (!canNest('column', p.type)) { this.toast('Cannot drop ' + p.type + ' directly in a column'); this._clearDragState(); return; }
                var nb = makeBlock(p.type);
                col.children.splice(idx, 0, nb);
                this.select(nb);

            } else if (p.from === 'canvas') {
                var block = findAndRemoveBlock(this.layout, p.blockId);
                if (block) {
                    var safeIdx = Math.min(idx, col.children.length);
                    col.children.splice(safeIdx, 0, block);
                    this.select(block);
                }
            }
            this._clearDragState();
        },

        /* ── DRAGOVER: container block ───────────────────────────────── */
        containerDragOver: function(e, container) {
            this.dragState.overContainer = container.id;
            var children = e.currentTarget.querySelectorAll(':scope > [data-block-id]');
            var chips = Array.from(children);
            var idx = chips.length;
            for (var i = 0; i < chips.length; i++) {
                var r = chips[i].getBoundingClientRect();
                if (e.clientY < r.top + r.height / 2) { idx = i; break; }
            }
            this.dragState.containerInsertAt = idx;
        },

        containerDragLeave: function() {
            this.dragState.overContainer     = null;
            this.dragState.containerInsertAt = null;
        },

        /* ── DROP: container block ───────────────────────────────────── */
        containerDrop: function(e, container) {
            e.stopPropagation();
            var p = this.dragState.payload;
            if (!p) { this._clearDragState(); return; }
            if (!container.children) container.children = [];

            var idx = this.dragState.containerInsertAt !== null ? this.dragState.containerInsertAt : container.children.length;

            if (p.from === 'sidebar') {
                if (!canNest(container.type, p.type)) {
                    this.toast(p.type + ' cannot nest inside ' + container.type);
                    this._clearDragState(); return;
                }
                var nb = makeBlock(p.type);
                container.children.splice(idx, 0, nb);
                this.select(nb);

            } else if (p.from === 'canvas') {
                if (p.blockId === container.id) { this._clearDragState(); return; } /* can't drop onto self */
                var block = findAndRemoveBlock(this.layout, p.blockId);
                if (block) {
                    if (!canNest(container.type, block.type)) {
                        this.toast(block.type + ' cannot go inside ' + container.type);
                        /* Re-insert the block since we removed it from findAndRemoveBlock */
                        this._clearDragState(); return;
                    }
                    var safeIdx = Math.min(idx, container.children.length);
                    container.children.splice(safeIdx, 0, block);
                    this.select(block);
                }
            }
            this._clearDragState();
        },

        /* ── DROP: empty canvas ──────────────────────────────────────── */
        canvasDragOver: function(e) {
            if (this.dragState.movingSection !== null) return;
            this.dragState.overCanvas = true;
        },

        canvasDragLeave: function() {
            this.dragState.overCanvas = false;
        },

        canvasDrop: function(e) {
            e.stopPropagation();
            var p = this.dragState.payload;
            if (!p || p.from !== 'sidebar') { this.dragState.overCanvas = false; return; }

            // Create a new section and the block
            var newSec = makeSection(1);
            var nb = makeBlock(p.type);
            newSec.children[0].children.push(nb);

            this.layout.push(newSec);
            this.select(nb);
            this.dragState.overCanvas = false;
            this._clearDragState();
        },

        /* ── IMAGE UPLOAD ────────────────────────────────────────────── */
        uploadImage: async function(e) {
            var file = e.target.files[0];
            if (!file || !this.selected) return;
            var fd = new FormData(); fd.append("image", file);
            try {
                var res = await fetch("/admin/upload", { method: "POST", headers: { "X-CSRF-TOKEN": window.BUILDER_CSRF }, body: fd });
                var j = await res.json();
                this.selected.data.src = j.url;
            } catch (err) { this.toast("Upload failed"); }
        },

        /* ── SAVE ────────────────────────────────────────────────────── */
        save: async function() {
            try {
                var res = await fetch(window.BUILDER_SAVE_URL, {
                    method: "POST",
                    headers: { "Content-Type": "application/json", "X-CSRF-TOKEN": window.BUILDER_CSRF },
                    body: JSON.stringify({ layout: JSON.stringify(this.layout) })
                });
                if (!res.ok) throw new Error();
                this.toast("Saved successfully");
            } catch (err) { this.toast("Save failed"); }
        },

        /* ── TOAST ───────────────────────────────────────────────────── */
        toast: function(msg) {
            var el = document.getElementById("bl-toast");
            el.textContent = msg; el.classList.add("show");
            clearTimeout(this._tt);
            this._tt = setTimeout(function() { el.classList.remove("show"); }, 2400);
        },

        /* ── INTERNAL ────────────────────────────────────────────────── */
        _clearDragState: function() {
            this.dragState.payload            = null;
            this.dragState.overCol            = null;
            this.dragState.insertAt           = null;
            this.dragState.overContainer      = null;
            this.dragState.containerInsertAt  = null;
            this.dragState.overCanvas         = false;
        },

        init: function() { /* layout is pre-resolved above */ },
    };
}
