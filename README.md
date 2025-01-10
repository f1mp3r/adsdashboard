## Installation & Setup

```
git clone https://github.com/f1mp3r/adsdashboard.git
cd adsdashboard
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan serve
```

The seeds will create a user for each role, as well as seed ads and subscriptions.

All users' passwords are set to `password`.


| Role     |     Email     |  Password  |
|----------|:-------------:|------:|
| Viewer   | viewer@test.com | password |
| Editor   | editor@test.com | password |
| Admin    | admin@test.com | password |
| Super Admin | superadmin@test.com | password |

---

### Additional things done:

- added notification when creating a template from an ad
- added new subscriptions widget
