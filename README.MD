Установка: 

    composer install
    php init

Прописать имя и пароль базы данных в /config/db-local.php.

    php yii migrate

Прописать имя и пароль базы данных в /config/test_db-local.php. \
Команда для запуска тестов:

    make test


<hr>


Запуск докер:

    make perm
    make build
    make up
    make composer

Команды для запуска:
    
    make prepare

Прописать имя и пароль базы данных в /config/db-local.php.

    make migrate

Прописать имя и пароль базы данных в /config/test_db-local.php. \
Команда для запуска тестов:

    make test

