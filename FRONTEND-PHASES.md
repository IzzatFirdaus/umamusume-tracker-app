# Frontend Implementation Plan (SPEC-05 / SPEC-06 alignment)

I'll inventory the repo and produce a prioritized implementation plan to align the codebase with SPEC-06 / SPEC-05; below is a concise checklist, recommended phases, and the exact next step I can start on immediately (with estimated effort).

---

## Checklist (task list)

Complete these tasks in order; check items as you finish them.

- [ ] Phase 0 — Quick safety & verification
  - [ ] Verify Laravel boots cleanly and `storage`/`bootstrap/cache` are writable
  - [ ] Run `php artisan optimize:clear` and `php artisan config:cache`
  - [ ] Confirm compiled assets are present and referenced by Blade

- [ ] Phase 1 — Stat UI (high-impact)
  - [ ] Add CSS variables in `resources/sass/app.scss` for stat colours
  - [ ] Create `resources/views/components/x-stat-bar.blade.php`
  - [ ] Wire component into plan list and `plan_details_modal`
  - [ ] Run build and verify visuals in browser

- [ ] Phase 2 — Dynamic rows & accessibility
  - [ ] Implement `x-skill-card` component and dynamic row builder improvements
  - [ ] Ensure keyboard navigation, ARIA attributes, and touch target sizing (≥44px)
  - [ ] Add basic unit/feature tests for dynamic behavior where possible

- [ ] Phase 3 — Theming, dark mode & exports
  - [ ] Centralize theme tokens and add dark-mode overrides
  - [ ] Smooth color transitions for theme toggle
  - [ ] Standardize TXT export formatting and add preview modal

- [ ] Phase 4 — Optional enhancements
  - [ ] Add Chart.js progress charts (optional)
  - [ ] Add avatar upload preview and image handling (optional)

- [ ] Tooling & integrations
  - [ ] Install Bootstrap (npm or CDN). Recommended: `npm install bootstrap@5.3.8`
  - [ ] Install SweetAlert2 (npm or CDN). Recommended: `npm install sweetalert2`
  - [ ] Run `npm ci` and `npm run dev` to build assets
  - [ ] Add CI job to build assets and run tests on PRs

- [ ] Smoke test
  - [ ] Restart Laragon / PHP server, load a few pages, and confirm no bootstrap exceptions and assets load

---

---

## Repository inventory (high level — files I found relevant)

- Frontend entrypoints
  - `resources/js/app.js` — main JS (bootstrap import adjusted).
  - `resources/sass/app.scss` — main styles (Bootstrap + custom tokens).

- Views & components
  - `resources/views/*.blade.php` and legacy `components/` PHP partials (plan list, modals, navbar, stats panel).

- Assets & build
  - `webpack.mix.js`, `package.json` — Mix build (we ran `npm run dev` successfully).
  - Compiled `public/js/app.js`, `public/css/app.css` produced by Mix.

- Utilities & backend endpoints
  - `plan_details_modal.php`, `plan-list.php`, and API endpoints like `get_plan_turns.php` used by frontend.

- Logs / infra
  - `storage/logs/laravel.log` — previously contained bootstrap errors; fixes applied earlier.

---

## Prioritized implementation plan (phased, minimal risk → higher impact)

### Phase 0 — Quick safety & verification (30–60m)

1. Verify Laravel boots cleanly and assets are served (`php artisan optimize:clear`, restart PHP/Laragon if permission errors persist).
2. Confirm `app.js` and `app.css` are updated and loaded by Blade layout.

Deliverable: App boots and serves compiled assets.

### Phase 1 — Small, high-impact UI fixes (1–3 hours)

- Add unified stat color CSS variables in `resources/sass/app.scss` (`--color-speed`, `--color-stamina`, `--color-power`, `--color-guts`, `--color-wit`) and ensure dark-mode overrides.
- Create a small Blade component `resources/views/components/x-stat-bar.blade.php` and a tiny JS helper to update widths/values if needed.
- Wire `x-stat-bar` into `plan_details_modal.blade.php` and plan card partials.

Deliverable: Stat bars use theme colors and appear consistently across plan cards and modal.

### Phase 2 — Dynamic skill UI & accessibility improvements (3–6 hours)

- Implement `x-skill-card` Blade component: left colored border by type, SP display, acquired toggle, notes.
- Improve JS dynamic row builder for skills (attach autocomplete hook and button handlers).
- Ensure touch targets (≥44px), sticky Save/Export bar on mobile, and keyboard access for dynamic rows.

Deliverable: Skills tab uses component rows; add/remove works; improved mobile UX.

### Phase 3 — Theming, Dark Mode polish & TXT exports (2–4 hours)

- Centralize theme tokens in `app.scss` and implement smooth transitions on color change for dark-mode toggle.
- Make TXT export formatting consistent and add an export preview modal using `plan_details_modal`.

Deliverable: Polished dark mode, smooth transitions, consistent export formatting.

### Phase 4 — Optional enhancements (time TBD)

- Add Chart.js Progress Chart tab and small analytics.
- Avatar upload with preview (server endpoints + JS).
- Tailwind migration (if desired — large effort).

---

## Estimates & priorities

- Quick wins: Phase 1 — immediate visible improvement and low risk.
- Medium: Phase 2 — improves UX and is more invasive in templates & JS.
- Large: Phase 3/4 — more design and new dependencies.

---

## Concrete next action I can start now (recommended)

Implement Phase 1 (stat CSS vars + `x-stat-bar` component + wire into plan list and modal). This is low-risk, quick to test, and delivers the most visible fidelity toward the spec.

If you want me to proceed I will:

1. Add CSS variables to `resources/sass/app.scss` and dark-mode overrides.
2. Create `resources/views/components/x-stat-bar.blade.php`.
3. Insert the component into `plan_details_modal.blade.php` and the plan card partials where stat bars appear.
4. Re-run `npm run dev` to compile updated CSS and confirm files in `public/`.
5. Load a quick server-side smoke check and confirm assets are referenced in the served HTML.

Estimated effort: 1–3 hours (Phase 1 end-to-end).

---

## References & alignment

This plan references the Malaysia Government Design System (MYDS) and the MyGovEA "Prinsip Reka Bentuk" so the work aligns to official patterns for accessibility, layout, and citizen-centric design.

- [MYDS (design tokens, component library, grid system, accessibility)](https://github.com/govtechmy/myds)
- [MyGovEA Prinsip Reka Bentuk (citizen-centric design principles, accessibility, minimal UI, language guidance)](https://mygovea.jdn.gov.my/page-prinsip-reka-bentuk/)

How the references map to the phases

- Grid (12/8/4) → applies when updating layout and component widths (Phase 1/2).
- Colour tokens & theme → implement primitive colours + mode-aware tokens for stat bars and dark-mode (Phase 1/3).
- Accessibility (WCAG, keyboard, focus, ARIA) → enforced during Phase 2 and Phase 3 QA.
- Citizen-centric & language guidance → applied to UI copy, labels, and testing with users (Phase 0–2).
- Components-first approach (use small reusable components) → ensures future compatibility with MYDS components and easier maintenance (Phase 1–2).

---

## SweetAlert2

Add SweetAlert2 for nicer confirmation and alert dialogs. Two simple options:

- Install via npm (preferred if building assets):

```powershell
npm install sweetalert2
```

Then import in `resources/js/app.js` or a module:

```javascript
import Swal from 'sweetalert2';
// example: Swal.fire({ title: 'Saved', icon: 'success' });
```

- Or include via CDN (fast, no build step):

```html
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
```

Include the script tag in your Blade layout (before </body>) and call `Swal.fire(...)` from inline scripts or your compiled JS.

---

## Bootstrap (add to project)

Bootstrap provides the responsive grid, utility classes, and components the plan references. Two integration options below.

- Install via npm (recommended if you build assets):

```powershell
npm install bootstrap@5.3.8
```

Integration notes after npm install:

- SCSS (preferred for theming): import Bootstrap in `resources/sass/app.scss` near the top so your variables and overrides take effect:

```scss
// in resources/sass/app.scss
@import 'bootstrap/scss/bootstrap';
// ...your custom variables and styles
```

- JS: import the bundled Bootstrap JS (includes Popper) in `resources/js/app.js`:

```javascript
// in resources/js/app.js
import 'bootstrap/dist/js/bootstrap.bundle';
```

- CDN option (fast, no build step): add these in your Blade layout head/body:

```html
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- ... your styles ... -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
```

Notes:

- If you use the SCSS import, add Bootstrap variables/overrides before importing the main `bootstrap` file so your tokens take effect.
- Re-run `npm run dev` after installing to compile updated CSS/JS into `public/`.

---

## SweetAlert2 (updated integration guidance)

You can add SweetAlert2 for nicer confirmation and alert dialogs. Two simple options:

- Install via npm (preferred when building assets alongside Bootstrap):

```powershell
npm install sweetalert2
```

Then import in `resources/js/app.js` after Bootstrap JS import (if present):

```javascript
import 'bootstrap/dist/js/bootstrap.bundle';
import Swal from 'sweetalert2';

// example usage
// Swal.fire({ title: 'Saved', icon: 'success' });
```

- Or include via CDN (fast, no build step):

```html
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
```

Place the SweetAlert2 script tag before your own inline scripts or after your compiled JS so `Swal` is available when you call it.

SweetAlert2 does not require Bootstrap, but using the Bootstrap styles alongside SweetAlert2 makes dialogs visually consistent in your UI. If you use the CDN approach for Bootstrap, include Bootstrap CSS in the head and the JS bundle before SweetAlert2 to keep script ordering predictable.
