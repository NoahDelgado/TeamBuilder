# TeamBuilder

## Variable local
Pour attribuer les variables local il faux crée un ficher config.php dans le dossier model
### Utilisteur
l'utilisateur doit être défini par son ID dans une constante nommé 'USER_ID'
### Base de données
pour crée la base de donnée il suffit d'executer le script SQL 'teambuildereval.sql' présent dans le dossier sql du model.

la configuration de la DB se fait au travers de 4 constantes dans lesquels ont renseignes respectivement les données suivante :
- 'HOST' => Le nom ou l'ip de l'hote
- 'DB_NAME' => le nom de la DB
- 'DB_USER' => le nom d'utilisateur de la DB
- 'DB_PASSWORD' => le mot de passe de la DB