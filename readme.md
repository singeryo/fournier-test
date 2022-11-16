# Test technique Fournier

Test réalisé avec Symfony 5.4 et EasyAdmin 4.

## Requirements

## Installation

- Configuration d'un ``.env.local`` basé sur le ``.env`` existant
- ``composer install``
- Création de la BDD avec ``php bin/console doctrine:database:create`` et ``php bin/console doctrine:migrations:migrate``

Lancer le serveur avec le binaire symfony ``symfony serve`` et visiter http://localhost:8000.


## Les différentes pages

### Partie admin

Back-office disponible sur ``/admin``.

### Partie API

Services avec employés disponibles en JSON sur ``/api/services``.

### Home

Disponible à la racine.
