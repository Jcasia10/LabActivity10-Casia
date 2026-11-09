# Lab Activity 10 - Barangay Bulletin

This Laravel 12 project is a database-backed bulletin for Barangay Matina Crossing Hall.

## Personalization

- Site title: **Barangay Bulletin – Purok Casia**
- Kagawad: Julianne Marie Casia (`kagawad.casia@bulletin.test`)
- Birthday post date: October 13, 2026
- Custom category: Community
- Posts per page: 5, matching the five letters in Casia

## Run locally

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
npm install
npm run dev
php artisan serve
```

The application uses SQLite at `database/database.sqlite`. The database file is intentionally
not included in the repository.
