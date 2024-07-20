## Локальный сервер

Для развертывания проекта на локальной машине и запуска локального сервера выполните следующие шаги:

**1. Клонировать проект:**
```Bash
git clone https://github.com/underground4/task
```
**2. Перейти в директорию:**
```Bash
cd task/
```
**3. Установить зависимости:**
```Bash
composer install
```
**4. Скопировать переменные окружения:**
```Bash
cp .env.example .env
```
**5. Выполнить миграции:**
```bash
php artisan migrate
```
**5. Заполнить данными(В таком порядке!!!):**
```bash
php artisan db:seed --class="RoleSeeder"
php artisan db:seed --class="DatabaseSeeder"
```

