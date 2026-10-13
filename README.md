# UniClub Hub — University Club & Event Management System

UniClub Hub is a university club and campus event management web application developed using **Laravel 13**. It provides a role-based workflow for submitting, reviewing, and finalizing club event proposals, with venue conflict detection and event registrations.

## Features

- User authentication, registration, and profile management (Laravel Breeze)
- Role-based access for **administrators, advisors, and club executives**
- Club creation and management
- Event proposal submission and advisor review
- Final administrative approval and venue allocation
- Venue scheduling conflict detection for overlapping time slots
- Student event registration and withdrawal
- Database-backed notifications for event proposal reviews

## Tech Stack

| Layer | Technology |
|---|---|
| Backend | PHP 8.3+, Laravel 13 |
| Frontend | Blade, Tailwind CSS, Alpine.js, JavaScript |
| Database | SQLite (default) |
| Assets | Vite |
| Authentication | Laravel Breeze |

## Approval Workflow

```text
Club Executive -> Submit Event Proposal (pending)
    -> Advisor Review (approved)
    -> Administrator Finalization + Venue Allocation (scheduled)
    -> Students Join or Leave the Event
```

Before final scheduling, the application checks whether a scheduled event already overlaps the chosen venue and time range.

## Local Setup

**Requirements:** PHP 8.3+, Composer, Node.js/npm, and PHP SQLite support.

```bash
git clone https://github.com/YOUR_USERNAME/uniclub-hub.git
cd uniclub-hub
composer install
cp .env.example .env
php artisan key:generate
```

Set the following in `.env` (along with any settings appropriate for your machine):

```dotenv
DB_CONNECTION=sqlite
```

Then initialize the database and start the application:

```bash
# Linux/macOS (on Windows, create an empty database/database.sqlite file manually)
touch database/database.sqlite
php artisan migrate
npm install
npm run build
php artisan serve
```

Open `http://127.0.0.1:8000`.

For frontend hot reload, run `npm run dev` in another terminal.

**Roles:** Newly registered accounts may need a role assigned in the database (`admin`, `advisor`, or `executive`) to access role-specific workflows. No production admin account is included.

**Venue data:** Add venues to the database before testing event finalization; there is no included venue seeder.

## Project Structure

```text
app/Http/Controllers/    # Club, event, registration, authentication, profile
app/Http/Middleware/     # Role checks
app/Models/              # Database models
app/Notifications/       # Event review notification
resources/views/         # Blade UI
routes/web.php           # Application routes
database/migrations/     # Database schema
```

## Testing

```bash
php artisan test
```

Automated coverage for the custom club and scheduling workflows is not yet established. Test the complete approval and registration flow locally before deployment.

## Notes

This is an academic/portfolio project and should be reviewed for production security and permissions before deployment. Do not commit `.env`, local databases, API keys, or installed dependencies. The repository intentionally excludes them.

## Screenshots

Add screenshots here showing the login page, role-based dashboards, event proposal form, and venue scheduling workflow.

## Credits

Developed as a university software engineering project. Add team members and their actual contributions here before publishing.
