# Uma Musume Tracker App (Laravel 11)

This is a Laravel 11-style application migrated from a legacy PHP app. The app provides plan tracking, stats, autosuggest, and export endpoints with Blade views.

## Quickstart

1. Copy .env.example to .env and set DB credentials.
2. Install vendors:

```powershell
composer install
```

3. Generate app key:

```powershell
php artisan key:generate
```

1. Serve:

```powershell
php artisan serve
```

Visit: <https://127.0.0.1:8000>

## Notes

- Requires PHP >= 8.2
- Ensure `bootstrap/cache` is writable.
