# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Development Commands

### PHP/Laravel Commands

- `composer install` - Install PHP dependencies
- `php artisan serve` - Start development server (runs on <http://127.0.0.1:8000>)
- `php artisan migrate --seed` - Run database migrations with seeders
- `php artisan key:generate` - Generate application key
- `php artisan make:*` - Use Laravel's make commands to create files (controllers, models, migrations, etc.)

### Frontend Commands  

- `npm install` - Install frontend dependencies
- `npm run dev` or `npm run development` - Build assets for development
- `npm run watch` - Watch files and rebuild on changes
- `npm run prod` or `npm run production` - Build assets for production

### Testing & Quality

- No specific test commands configured - check with user if tests exist
- Check for lint/typecheck commands if making significant changes

## Architecture Overview

This is a Laravel 11+ application that tracks Uma Musume character career progression. The app follows Laravel 10 structure (not migrated to Laravel 11 streamlined structure).

### Core Domain Models

- **Plan**: Main tracking entity (equivalent to CareerRun in README)
- **Turn**: Turn-by-turn progress tracking with stat logging
- **Skill**: Skills that can be acquired during careers
- **ActivityLog**: Activity tracking for plans

### Key Controllers

- `PlanController` / `PlansController` - Main plan management
- `PlanDetailsController` - Detailed plan views
- `StatsController` - Statistics and analytics
- `ExportController` - Data export functionality
- `AutosuggestController` - Autosuggest features

### Frontend Architecture

- Uses Laravel Mix for asset compilation (`webpack.mix.js`)
- Blade templates with Bootstrap 5.3.7 + Bootstrap Icons
- Sass/SCSS for styling (`resources/sass/app.scss`)
- Alpine.js mentioned in README for interactions
- Responsive design with reusable Blade components

### Database Structure

Key relationships:

- Plans have many Turns (turn-by-turn stat progression)
- Plans can have associated Skills through pivot tables
- ActivityLog tracks plan-related activities

## Laravel-Specific Guidelines

This project follows Laravel Boost guidelines from `.github/copilot-instructions.md`:

### Code Standards

- Use PHP 8.2+ features including constructor property promotion
- Always use explicit return type declarations
- Use curly braces for all control structures
- Follow existing code conventions by checking sibling files

### Laravel Best Practices

- Use `php artisan make:*` commands to create new files
- Pass `--no-interaction` to artisan commands
- Prefer Eloquent relationships over raw queries
- Use Form Request classes for validation
- Use named routes with `route()` function for URL generation
- Use `config()` instead of `env()` outside config files

### Frontend Integration

- If frontend changes aren't reflected, user may need to run `npm run dev` or `npm run build`
- Assets are managed through Laravel Mix

## Environment Setup

1. Copy `.env.example` to `.env` and configure database credentials
2. Run `composer install`
3. Run `php artisan key:generate`
4. Run `php artisan migrate --seed` (optional for first setup)
5. Run `npm install && npm run dev` for frontend assets
6. Serve with `php artisan serve`

## Important Notes

- This is a migrated Laravel 11+ app using Laravel 10 structure (middleware in `app/Http/Middleware/`, etc.)
- Uses Maatwebsite/Laravel-Excel for data exports
- Has Laravel Sanctum configured for optional API authentication
- Bootstrap 5.3.7 is the primary CSS framework
- Check existing Blade components in `resources/views/partials/` before creating new ones
