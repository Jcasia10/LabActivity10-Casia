# Lab Activity 10 - Barangay Bulletin

The Barangay Matina Crossing Hall in Davao City still posts announcements (clean-up drives, Bakuna schedules, curfew reminders, ayuda payouts) on a cork board outside the hall.
Kapitan wants an online Barangay Bulletin, a small blog where barangay officials (authors) publish posts that residents can browse, search and page through. 

## Personalization

- Site title: **Barangay Bulletin – Purok Casia**
- Kagawad: Julianne Marie Casia (`kagawad.casia@bulletin.test`)
- Birthday post date: October 13, 2026
- Custom category: Community
- Posts per page: 6, "Casia" have 5 letters but according to the instruction we use 6 as the minimum

## Run locally

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
npm install
npm run dev #sometimes you have to use npm.cmd run dev"
php artisan serve
```

The application uses SQLite at `database/database.sqlite`. The database file is intentionally
not included in the repository.

## Requirements checklist

- [x] 1. Migrations: Authors and posts use Blueprint helpers, foreign keys, timestamps, reversible `up()`/`down()` methods, and pass rollback/re-run verification.
- [x] 2. Separate views migration: `views` is added and removed by `add_views_to_posts_table`; it is not in the original posts migration.
- [x] 3. Eloquent models: `Author` and `Post` use explicit `$fillable` and casts; `docs/tinker.png` shows `find()` → change → `save()`.
- [x] 4. Factories: Author and Post factories use Faker; Post has a `draft()` state and exactly five categories.
- [x] 5. Seeders: `DatabaseSeeder` calls `AuthorSeeder` before `PostSeeder`; seeding creates 5 authors, 51 posts, 40 published posts, and 10 drafts.
- [x] 6. Query filters: The bulletin lists published posts only, puts pinned posts first, sorts newest first, and supports conditional title/category filters.
- [x] 7. Pagination: The implementation has `paginate(6)`, `withQueryString()`, `links()`, and a showing-count line. Casia has five letters, so the lab minimum of 6 applies.
- [x] 8. Show page: Published posts use `findOrFail`, drafts return 404, views increment through `save()`, and counts appear in the list and detail page.
- [x] 9. Blade/Tailwind views: Both pages extend the layout and include escaped output, `@forelse`/`@empty`, a Pinned badge, responsive classes, and a filter form.
- [x] 10. Authenticity: The code, personalized data, and README are complete; meaningful multi-commit history must still be maintained in the Git repository.
