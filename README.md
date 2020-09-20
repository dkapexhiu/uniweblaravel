# UniWeb

## Getting Started

### Installation

1. [Clone the Repository](#clone-repo)
2. [Database Configuration](#database)
3. [Populating the Database with some dummy data (optional)](#seeder)

#### 1. Clone the Repository

a. Clone the Repository

```bash
git clone repo
```

b. Go to the `uniweb` directory

```bash
cd 'uniweb'
```

c. Install Dependencies

```bash
composer install
```

#### 2. Database Configuration

```
APP_NAME='UniWeb'
...
DB_DATABASE=uniweb
DB_USERNAME=myUsername
DB_PASSWORD=myPassword
```

Generate the Application Key

```bash
php artisan key:generate
```

Reset the Database if you have already ran the Database Migration at least once, else proceed to the next step.

```bash
php artisan migrate:reset
```

Run the Database Migration

```
php artisan migrate
```

#### 3. Populating the Database with some dummy data (optional)

a. Populate the Database by running the Database Seeder. A dummy data has been provided.

```
composer dump-autoload
```

```
php artisan db:seed
```

b. Create a symbolic link:

```bash
php artisan storage:link
```

c. In the root directory of the repository, go to `public/img`. Copy both `cover_images` and `profile_pictures` to `public/storage/`.

d. After that you're all set! You may now use the dummy accounts.
