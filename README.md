# SJDPP Parish — Records Management System (RMS)

This repository contains the source for the SJDPP Parish Records Management System — a small Laravel application used by the parish secretary and priest to manage sacramental records (baptismal, confirmation, wedding, burial) and scheduling.

This README replaces the previous placeholder content and includes focused setup notes, an overview of the project structure, and quick commands for development on Windows (cmd.exe).

## Key features

-   Manage sacramental records: baptismal, confirmation, wedding, burial
-   Scheduling system for sacraments with approval workflow (pending → approved/declined → completed/cancelled)
-   Role-based interfaces for Secretary and Priest
-   Simple dashboard with status summaries
-   PDF/printable certificates for records

## Tech stack

-   PHP 8.x and Laravel (framework)
-   Blade templates for frontend UI
-   MySQL (or other supported relational DB)
-   Node.js + npm for asset tooling (Vite / Tailwind)

## Project layout (high level)

-   `app/` — Laravel app code (Models, Controllers, Providers)
-   `resources/views/` — Blade templates for secretary/priest/public views
-   `database/migrations/` — table migrations and seeders
-   `public/` — built assets and front controller
-   `tests/` — PHPUnit / Pest tests

## How to Set Up the Project

After cloning the repository, follow these steps to set up the Laravel application:

1. **Install Dependencies**:
   Install PHP dependencies using Composer:

    ```bash
    composer install
    ```

    Install Node.js dependencies:

    ```bash
    npm install
    ```

2. **Create and Configure the `.env` File**:
   Copy the example `.env` file and configure the environment variables:

    ```bash
    cp .env.example .env
    ```

    Update the `.env` file with your database credentials and other configurations.

3. **Generate Application Key**:
   Generate a new application key:

    ```bash
    php artisan key:generate
    ```

4. **Run Database Migrations**:
   Migrate the database to create the required tables:

    ```bash
    php artisan migrate
    ```

5. **Create Storage Link**:
   If the application stores uploaded files (e.g., images), run the following command to create a symbolic link between the `storage/app/public` directory and `public/storage`:

    ```bash
    php artisan storage:link
    ```

    This allows publicly accessible files to be served from the `storage` directory.

6. **Serve the Application**:
   Start the development server:

    ```bash
    composer run dev
    ```

    Your application will be available at `http://127.0.0.1:8000`.

## Notes about recent changes

This branch contains several UX and data-model improvements:

-   Consolidated scheduling status to a single `status` field and added `priest_notes` and `priest_reviewed_at` to track priest approval

-   Status enum values: `pending`, `approved`, `declined`, `completed`, `cancelled`

-   Secretary dashboard simplified to numbers-only view

-   Dynamic page titles added across many Blade views

## Contributing

If you'd like to contribute, please open an issue describing the change or improvement, then submit a pull request.

## License & Contact

This project is open-source. Add an appropriate license file if you plan to publish it publicly.

For questions, reach out to the repository owner.
