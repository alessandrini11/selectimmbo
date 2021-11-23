# Installation
Télécharger et installer [composer](https://getcomposer.org/download/)
Télecharger et installer le [Cli de symfony](https://symfony.com/download)
- installer les dépendences du projet `composer install`
## Mise en place du projet
### Mise en place de la base de donné
Modifier le fichier `.env` pour rajouter vos variables d'environements
DATABASE_URL="mysql://`db_user`:`db_password`@127.0.0.1:3306/`db_name`?serverVersion=5.7"
### lancement du serveur de dévéloppement
- lancer le serveur `symfony serve`
### Documentation de l'api
```bash
Ouvrir l'application sur URL http://localhost:8000/api
```
