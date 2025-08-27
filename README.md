# Uma Musume Career Tracker System

🌸 Uma Musume Career Tracker System Documentation — Laravel 11+ Compatible

This project is a Laravel-style application for tracking, managing, and analyzing the career progression of Uma Musume: Pretty Derby characters. It combines Blade views, a component-driven UI, turn-by-turn stat logging, skill management, and exportable run logs.

## Quickstart

1. Copy the example environment and set DB credentials:

```powershell
Copy-Item .env.example .env
# Edit .env to add your DB credentials and other settings
```

1. Install PHP dependencies:

```powershell
composer install
```

1. Generate the application key:

```powershell
php artisan key:generate
```

1. (Optional) Run migrations and seeders locally:

```powershell
php artisan migrate --seed
```

1. Install frontend dependencies and build assets (if you change frontend files):

```powershell

npm install
npm run dev
```

1. Serve the app locally:

```powershell
php artisan serve
```

Visit: [http://127.0.0.1:8000](http://127.0.0.1:8000)

## Overview

Uma Tracker is a Laravel-based platform designed to track, manage, and analyze the career progression of Uma Musume characters. It supports detailed, turn-by-turn stat logging, dynamic skill management, career analytics, and exports.

## Features

- Track multiple Uma Musume characters and career runs
- Log detailed stats per turn (Speed, Stamina, Power, Guts, Wit)
- Track skill acquisition with SP costs, types, and notes
- Log growth rate bonuses and aptitudes (Track, Distance, Style)
- Annotate runs with notes and special conditions
- Export full run logs to Excel (.xlsx)
- Responsive UI (TailwindCSS + Alpine.js / or Bootstrap as present)
- Dynamic skill rows and real-time UI interactions
- Dark mode support via class-based toggling
- Reusable Blade components (skill cards, stamina bars, grids, inputs)

## Technologies Used

- Laravel 11+
- PHP 8.2+
- MySQL / MariaDB
- Blade + TailwindCSS (project also contains legacy CSS)
- Alpine.js for front-end interactions
- Laravel Eloquent ORM
- Maatwebsite/Laravel-Excel for exports
- Laravel Sanctum (optional API authentication)

## Data Models (summary)

### UmaMusume

| Field | Type | Description |
|---|---|---|
| id | int, PK | Unique identifier |
| name | string | Character name |
| image_url | string | URL to the character image |
| aptitude_style | json | Array of running style suitabilities |
| aptitude_distance | json | Array of distance suitabilities |
| aptitude_track | json | Array of track suitabilities |
| growth_speed | int | Speed growth bonus (%) |
| growth_stamina | int | Stamina growth bonus (%) |

### CareerRun

| Field | Type | Description |
|---|---|---|
| id | int, PK | Unique identifier |
| uma_musume_id | int, FK | FK to UmaMusume |
| year | enum | Career year (Junior, Classic, Senior) |
| status | enum | Ongoing, Finished, Failed |
| uma_class | enum | Uma's class (Debut..Legend) |
| current_turn | int | Current turn number |
| current_race | string | Current race name |
| total_sp_available | int | Total SP available |
| stamina_percentage | int | Current stamina % |

### StatProgress

| Field | Type | Description |
|---|---|---|
| id | int, PK | Unique identifier |
| career_run_id | int, FK | FK to CareerRun |
| speed | int | Speed stat at this turn |
| stamina | int | Stamina stat at this turn |
| power | int | Power stat at this turn |
| guts | int | Guts stat at this turn |
| wit | int | Wit stat at this turn |
| turn_number | int | Turn number for this stat entry |

### Skill

| Field | Type | Description |
|---|---|---|
| id | int, PK | Unique identifier |
| name | string | Skill name |
| description | text | Full description of effect |
| type | enum | Category (Speed, Accel, Recovery, Debuff, etc.) |
| sp_cost | int | SP cost to acquire the skill |
| best_for | string | Recommended usage/strategy |

### SkillCareerRun

| Field | Type | Description |
|---|---|---|
| id | int, PK | Unique identifier |
| career_run_id | int, FK | FK to CareerRun |
| skill_id | int, FK | FK to Skill |
| status | enum | Acquired, Skipped, Suggested |
| turn_acquired | int | Turn number when acquired |

## User Flow Example

1. Character Registration: create an `UmaMusume` with aptitudes and growth rates.
2. Career Initiation: start a `CareerRun` for the character.
3. Turn-by-Turn Logging: log `StatProgress` per turn and manage skills.
4. Skill Actions: mark skills as Acquired / Skipped / Suggested in `SkillCareerRun`.
5. Run Conclusion: mark `CareerRun` as Finished or Failed.
6. Export: export full run logs to Excel for analysis.

## Optional API Routes (examples)

| Method | Endpoint | Description |
|---|---|---|
| GET | /api/uma | List Uma Musume characters |
| GET | /api/uma/{id} | View a single Uma Musume profile |
| POST | /api/uma | Register a new Uma Musume |
| PUT | /api/uma/{id} | Update an Uma Musume profile |
| POST | /api/career | Start a new CareerRun |

## Blade Components (reusable)

- `x-umamusume::skill-card` — input card for skill details
- `x-umamusume::stamina-bar` — visual stamina meter
- `x-umamusume::add-skill-button` — adds dynamic skill rows
- `x-umamusume::remove-skill-button` — removes dynamic skill rows
- `x-umamusume::aptitude-inputs` — aptitude rating inputs
- `x-umamusume::growth-rate-inputs` — growth rate inputs
- `x-umamusume::initial-career-run-form` — initial run form
- `x-umamusume::responsive-grid` — responsive grid wrapper
- `x-umamusume::animated-transition` — Alpine-driven transitions

## Future Roadmap

- AI-assisted skill recommendations
- Graphical stat trend visualizations
- Import/export legacy spreadsheets
- Skill icon detection / autocomplete
- Visual graphs of stat progression
- Stat outcome predictors
- Role-based collaboration and access controls

## Setup Instructions (local development)

Clone this repository:

```powershell
git clone https://github.com/IzzatFirdaus/umamusume-tracker-app.git
cd umamusume-tracker-app
```

Install PHP dependencies:

```powershell
composer install
```

Copy environment and generate key:

```powershell
Copy-Item .env.example .env
php artisan key:generate
```

Configure database credentials in `.env`, then run migrations (optional for first run):

```powershell
php artisan migrate --seed
```

Install frontend dependencies and build assets:

```powershell
npm install
npm run dev
```

Serve the app locally:

```powershell
php artisan serve
```

Open [http://127.0.0.1:8000](http://127.0.0.1:8000) in your browser.

## Notes

- Requires PHP >= 8.2
- Ensure `bootstrap/cache` and `storage` directories are writable by your PHP process.

## License

MIT License — free for academic and personal use; attribution appreciated.
