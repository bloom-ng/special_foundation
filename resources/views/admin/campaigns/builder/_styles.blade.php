<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
    /* ── Reset & Variables ────────────────────────────────────── */
    :root {
        --b-primary: #6366f1;
        --b-primary-hover: #4f46e5;
        --b-primary-light: #eef2ff;
        --b-bg-gray: #f8fafc;
        --b-border: #e2e8f0;
        --b-text-main: #1e293b;
        --b-text-muted: #64748b;
        --b-shadow-sm: 0 1px 2px rgba(0,0,0,0.05);
        --b-shadow-md: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -1px rgba(0,0,0,0.06);
        --b-radius-lg: 12px;
        --b-radius-md: 8px;
    }

    [x-cloak] { display: none !important; }

    /* ── Layout Wrapper ───────────────────────────────────────── */
    .builder-wrap {
        height: calc(100vh - 64px);
        display: flex;
        overflow: hidden;
        background: var(--b-bg-gray);
        font-family: 'Outfit', sans-serif;
        color: var(--b-text-main);
    }

    /* ── Sidebar (Left) ───────────────────────────────────────── */
    .bl-sidebar {
        width: 240px;
        background: #fff;
        border-right: 1px solid var(--b-border);
        box-shadow: 2px 0 10px rgba(0,0,0,0.02);
        z-index: 10;
    }

    .bl-sidebar-section-title {
        padding: 20px 16px 8px;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: var(--b-text-muted);
    }

    .bl-pill {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 9px 12px;
        background: #fff;
        border: 1px solid var(--b-border);
        border-radius: var(--b-radius-md);
        cursor: grab;
        transition: all 0.15s ease;
        user-select: none;
        box-shadow: 0 1px 3px rgba(0,0,0,0.04);
    }
    .bl-pill:hover {
        border-color: var(--b-primary);
        background: var(--b-primary-light);
        transform: translateY(-1px);
        box-shadow: 0 3px 8px rgba(99,102,241,0.12);
    }
    .bl-pill:active { cursor: grabbing; transform: scale(0.97); }

    .bl-pill-icon {
        width: 28px;
        height: 28px;
        border-radius: 7px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        font-style: normal;
        flex-shrink: 0;
    }
    .bl-pill-icon--layout {
        background: #ede9fe;
        color: #7c3aed;
    }
    .bl-pill-icon--content {
        background: #e0f2fe;
        color: #0369a1;
    }
    .bl-pill:hover .bl-pill-icon--layout { background: #ddd6fe; }
    .bl-pill:hover .bl-pill-icon--content { background: #bae6fd; }

    .bl-pill-label {
        flex: 1;
        font-size: 12px;
        font-weight: 600;
        color: var(--b-text-main);
    }
    .bl-pill:hover .bl-pill-label { color: var(--b-primary); }

    .bl-pill-drag {
        font-size: 13px;
        color: #cbd5e1;
        opacity: 0;
        transition: opacity 0.15s;
    }
    .bl-pill:hover .bl-pill-drag { opacity: 1; color: #a5b4fc; }

    /* ── Canvas (Middle) ──────────────────────────────────────── */
    .bl-canvas {
        flex: 1;
        padding: 40px;
        background: #f1f5f9;
        overflow-y: auto;
    }

    .canvas-frame {
        width: 100%;
        margin: 0 auto;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        min-height: 100%;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 10px 25px -5px rgba(0,0,0,0.05), 0 8px 10px -6px rgba(0,0,0,0.05);
        padding: 24px;
        position: relative;
    }
    .canvas-frame.tablet { max-width: 768px; }
    .canvas-frame.mobile { max-width: 390px; }

    .canvas-empty-state {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 300px;
        border: 2px dashed #cbd5e1;
        border-radius: var(--b-radius-lg);
        color: var(--b-text-muted);
        transition: all 0.2s;
        background: rgba(255,255,255,0.5);
    }
    .canvas-empty-state.drop-target {
        border-color: var(--b-primary);
        background: var(--b-primary-light);
        color: var(--b-primary);
    }

    /* ── Section Cards ───────────────────────────────────────── */
    .sec-card {
        background: #fff;
        border: 1px solid var(--b-border);
        border-radius: var(--b-radius-lg);
        margin-bottom: 24px;
        transition: all 0.2s;
        position: relative;
    }
    .sec-card:hover { border-color: #cbd5e1; box-shadow: var(--b-shadow-sm); }
    .sec-card.drop-target { border-color: var(--b-primary); box-shadow: 0 0 0 3px rgba(99,102,241,0.1); }

    .sec-header {
        display: flex;
        align-items: center;
        padding: 12px 16px;
        border-bottom: 1px solid var(--b-border);
        background: #fafafa;
        border-radius: var(--b-radius-lg) var(--b-radius-lg) 0 0;
    }
    .sec-title { font-size: 11px; font-weight: 700; text-transform: uppercase; color: var(--b-text-muted); letter-spacing: 0.05em; }

    /* ── Section Columns Flex ────────────────────────────────── */
    .sec-columns-flex {
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        gap: 16px;
        padding: 16px;
        min-height: 160px;
        align-items: stretch;
    }
    .sec-columns-flex > * { flex: 1 1 0; min-width: 0; }
    .sec-columns-flex.sec-dir-col { flex-direction: column; }
    .sec-columns-flex.sec-dir-col > * { flex: none; width: 100%; }

    /* ── Column Drop Zones ───────────────────────────────────── */
    .col-zone {
        min-height: 160px;
        border: 2px dashed #94a3b8;
        border-radius: var(--b-radius-lg);
        padding: 16px;
        transition: all 0.25s ease;
        background: #f8fafc;
        display: flex;
        flex-direction: column;
        gap: 12px;
        position: relative;
    }
    .col-zone.drop-target {
        border-color: var(--b-primary);
        border-style: solid;
        background: var(--b-primary-light);
        box-shadow: inset 0 0 20px rgba(99,102,241,0.08);
    }

    /* ── Empty drop zone placeholder ────────────────────────── */
    .empty-col-msg {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 8px;
        border-radius: 8px;
        border: 2px dashed #c7d2fe;
        background: linear-gradient(135deg, #eef2ff 0%, #f5f3ff 100%);
        color: #818cf8;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.12em;
        pointer-events: none;
        min-height: 120px;
        padding: 24px;
        text-align: center;
    }
    .empty-col-msg .drop-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: rgba(99,102,241,0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        margin-bottom: 4px;
    }

    /* ── Block Chips ─────────────────────────────────────────── */
    .bl-chip {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 8px 12px;
        background: #fff;
        border: 1px solid var(--b-border);
        border-radius: var(--b-radius-md);
        margin-bottom: 8px;
        cursor: grab;
        transition: all 0.2s;
    }
    .bl-chip:hover { border-color: var(--b-primary); box-shadow: var(--b-shadow-sm); }
    .bl-chip.selected { border-color: var(--b-primary); background: var(--b-primary-light); box-shadow: 0 0 0 2px rgba(99,102,241,0.1); }

    .bl-preview {
        padding: 12px;
        border: 1px solid var(--b-border);
        border-radius: var(--b-radius-md);
        background: #fff;
        margin-bottom: 16px;
        pointer-events: none;
    }

    /* ── Settings Panel (Right) ──────────────────────────────── */
    .bl-panel {
        width: 320px;
        min-width: 320px;
        background: #fff;
        border-left: 1px solid var(--b-border);
        display: flex;
        flex-direction: column;
        z-index: 10;
        box-shadow: -2px 0 20px rgba(0,0,0,0.06);
    }

    /* Panel header */
    .panel-header {
        padding: 16px 20px;
        border-bottom: 1px solid var(--b-border);
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: #fff;
        flex-shrink: 0;
    }
    .panel-header h3 {
        font-size: 14px;
        font-weight: 700;
        margin: 0;
        color: var(--b-text-main);
        letter-spacing: -0.01em;
    }
    .panel-header .panel-subtitle {
        font-size: 11px;
        color: #94a3b8;
        font-weight: 500;
        margin-top: 1px;
    }

    /* Block type badge */
    .panel-block-badge {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 16px;
        margin-bottom: 20px;
        background: linear-gradient(135deg, #eef2ff, #f5f3ff);
        border: 1px solid #e0e7ff;
        border-radius: 10px;
    }
    .panel-block-badge .badge-icon {
        width: 36px;
        height: 36px;
        border-radius: 9px;
        background: #fff;
        box-shadow: 0 1px 4px rgba(99,102,241,0.15);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        flex-shrink: 0;
    }
    .panel-block-badge .badge-label {
        font-size: 13px;
        font-weight: 700;
        color: #3730a3;
        line-height: 1.2;
    }
    .panel-block-badge .badge-sub {
        font-size: 10px;
        color: #818cf8;
        font-weight: 500;
        margin-top: 2px;
    }

    /* Field groups */
    .field-group {
        background: #fff;
        border: 1px solid #e8ecf0;
        border-radius: 10px;
        padding: 14px 16px;
        margin-bottom: 10px;
    }
    .field-group:last-of-type { margin-bottom: 0; }

    .field-group-title {
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: #94a3b8;
        margin-bottom: 12px;
        padding-bottom: 8px;
        border-bottom: 1px solid #f1f5f9;
    }

    /* Field layout */
    .field-row { display: flex; gap: 10px; }
    .field-row > .field { flex: 1; min-width: 0; margin-bottom: 0; }
    .field { margin-bottom: 14px; }
    .field:last-child { margin-bottom: 0; }

    /* Labels */
    .field > label {
        display: block;
        font-size: 11px;
        font-weight: 600;
        color: #475569;
        margin-bottom: 6px;
        letter-spacing: 0.01em;
    }

    /* Inputs, selects, textareas */
    .field input:not([type=color]):not([type=checkbox]):not([type=file]),
    .field select,
    .field textarea {
        width: 100%;
        padding: 9px 12px;
        border: 1.5px solid #e2e8f0;
        border-radius: 8px;
        font-size: 13px;
        font-family: 'Outfit', sans-serif;
        font-weight: 400;
        background: #fff;
        color: #0f172a;
        transition: border-color 0.15s, box-shadow 0.15s;
        outline: none;
        line-height: 1.5;
    }
    .field input:not([type=color]):not([type=checkbox]):not([type=file]):hover,
    .field select:hover,
    .field textarea:hover {
        border-color: #c7d2fe;
    }
    .field input:not([type=color]):not([type=checkbox]):not([type=file]):focus,
    .field select:focus,
    .field textarea:focus {
        border-color: var(--b-primary);
        box-shadow: 0 0 0 3px rgba(99,102,241,0.12);
    }
    .field input::placeholder,
    .field textarea::placeholder { color: #cbd5e1; }

    /* Select arrow */
    .field select {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 24 24' fill='none' stroke='%2364748b' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 11px center;
        padding-right: 32px;
        cursor: pointer;
    }

    /* Number inputs */
    .field input[type=number] { -moz-appearance: textfield; }
    .field input[type=number]::-webkit-inner-spin-button,
    .field input[type=number]::-webkit-outer-spin-button { opacity: 1; }

    /* Textarea */
    .field textarea { resize: vertical; min-height: 80px; }

    /* Image preview thumbnail */
    .thumb {
        display: block;
        width: 100%;
        height: 120px;
        object-fit: cover;
        border-radius: 8px;
        border: 1.5px solid #e2e8f0;
        margin-top: 10px;
        background: #f8fafc;
    }

    /* File input */
    .field input[type=file] {
        width: 100%;
        font-size: 12px;
        color: #64748b;
        cursor: pointer;
    }
    .field input[type=file]::file-selector-button {
        padding: 6px 12px;
        margin-right: 10px;
        border: 1.5px solid #e0e7ff;
        border-radius: 6px;
        background: #eef2ff;
        color: #4f46e5;
        font-size: 11px;
        font-weight: 700;
        font-family: 'Outfit', sans-serif;
        cursor: pointer;
        transition: all 0.15s;
    }
    .field input[type=file]::file-selector-button:hover {
        background: #e0e7ff;
        border-color: #c7d2fe;
    }

    /* Color swatch picker */
    .color-field {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 6px 12px 6px 6px;
        border: 1.5px solid #e2e8f0;
        border-radius: 8px;
        background: #fff;
        cursor: pointer;
        transition: border-color 0.15s, box-shadow 0.15s;
    }
    .color-field:hover { border-color: #c7d2fe; }
    .color-field:focus-within {
        border-color: var(--b-primary);
        box-shadow: 0 0 0 3px rgba(99,102,241,0.12);
    }
    .color-field input[type=color] {
        width: 32px;
        height: 32px;
        border: none;
        border-radius: 6px;
        padding: 0;
        cursor: pointer;
        background: none;
        outline: none;
        flex-shrink: 0;
    }
    .color-field .color-hex {
        font-size: 12px;
        font-family: 'Courier New', monospace;
        font-weight: 600;
        color: #475569;
        letter-spacing: 0.04em;
        flex: 1;
    }
    .color-field .color-label {
        font-size: 10px;
        color: #94a3b8;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.06em;
    }

    /* Checkbox / toggle row */
    .check-field {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 12px;
        border: 1.5px solid #e2e8f0;
        border-radius: 8px;
        background: #fff;
        cursor: pointer;
        transition: border-color 0.15s;
    }
    .check-field:hover { border-color: #c7d2fe; background: #fafbff; }
    .check-field input[type=checkbox] {
        width: 16px;
        height: 16px;
        accent-color: var(--b-primary);
        cursor: pointer;
        flex-shrink: 0;
    }
    .check-field label {
        font-size: 13px;
        font-weight: 500;
        text-transform: none !important;
        letter-spacing: 0 !important;
        color: #334155;
        margin: 0 !important;
        cursor: pointer;
        flex: 1;
    }

    /* ── Utilities ───────────────────────────────────────────── */
    .ic-btn {
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 6px;
        border: 1px solid var(--b-border);
        background: #fff;
        color: var(--b-text-muted);
        cursor: pointer;
        transition: all 0.2s;
    }
    .ic-btn:hover { background: #f8fafc; color: var(--b-text-main); border-color: #cbd5e1; }
    .ic-btn.danger:hover { background: #fef2f2; color: #ef4444; border-color: #fecaca; }

    .cols-btn {
        padding: 4px 10px;
        font-size: 12px;
        font-weight: 600;
        border: 1px solid var(--b-border);
        background: #fff;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.2s;
    }
    .cols-btn.active { background: var(--b-primary); color: #fff; border-color: var(--b-primary); }

    .drop-indicator {
        height: 3px;
        background: var(--b-primary);
        border-radius: 2px;
        margin: 4px 0;
        box-shadow: 0 0 10px rgba(99,102,241,0.3);
    }

    /* Scrollbars */
    ::-webkit-scrollbar { width: 6px; height: 6px; }
    ::-webkit-scrollbar-track { background: transparent; }
    ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
    ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
</style>
