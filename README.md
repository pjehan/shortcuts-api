# Installation

```shell script
composer install
cp .env .env.local
```

Modifier le fichier .env.local

```shell script
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load
```

Démarrer le serveur

```shell script
symfony server:start
```