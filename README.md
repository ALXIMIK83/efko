1. composer install
2. php init
3. Настроить подключение к базе данных в файле common/config/main-local.php
4. yii migrate --migrationPath=@yii/rbac/migrations
5. yii migrate
6. Первый пользователь регистрируется в качестве администратора
