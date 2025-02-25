"# Cyber01" pour mister Mathéo  amuse toi bien
# README - Environnement de Test de Sécurité Web

## Introduction

Ce projet consiste en un environnement Docker composé de deux services :
1. **MariaDB** - Base de données qui stocke les utilisateurs et leurs mots de passe.
2. **PHP/Apache** - Serveur web exposant un formulaire d'authentification qui interagit avec la base de données pour valider les identifiants.

Cet environnement est conçu pour effectuer des **tests de sécurité** afin d'illustrer les vulnérabilités communes dans les applications web.

## Prérequis

- **Docker** installé sur votre machine.
- **Docker Compose** pour faciliter la gestion des services multi-conteneurs.

### Installation des Prérequis

Si vous n'avez pas encore Docker et Docker Compose, vous pouvez les installer en suivant ces instructions :

- [Installer Docker](https://docs.docker.com/get-docker/)
- [Installer Docker Compose](https://docs.docker.com/compose/install/)

## Lancer l'Environnement

### 1. Cloner ou Télécharger le Projet

Clonez ou téléchargez ce projet sur votre machine locale.

```bash
git clone https://github.com/NeoDarwin/cyber01.git
cd <dossier-du-projet>
```

### 2. Lancer les Conteneurs avec Docker Compose

Assurez-vous que Docker et Docker Compose sont installés, puis exécutez la commande suivante pour démarrer l'environnement :

```bash
docker-compose up -d
```

Cette commande :
- Démarre deux services :
  1. **MariaDB** - La base de données avec les utilisateurs.
  2. **PHP/Apache** - Le serveur web avec le formulaire d'authentification.
  
Les conteneurs s'exécutent en arrière-plan. Le serveur web sera accessible sur [http://localhost](http://localhost).

### 3. Tester l'Application

Accédez au formulaire d'authentification via votre navigateur à l'adresse suivante :

[http://localhost](http://localhost)

Vous pouvez tester l'authentification avec les identifiants par défaut :
- **Nom d'utilisateur** : `admin`
- **Mot de passe** : `secret`

Si les identifiants sont valides, un message de bienvenue s'affichera. Sinon, un message d'erreur s'affichera pour vous signaler une tentative de connexion échouée.

---

## Attaques Possibles à Mener

Cet environnement est conçu pour être une base d'apprentissage des attaques courantes dans les applications web. Voici les attaques que vous pouvez tester sur cet environnement.

### 1. **Injection SQL**

L'une des attaques les plus courantes consiste à injecter des requêtes SQL malveillantes via le formulaire d'authentification. Le mot de passe est comparé dans la requête SQL sans validation adéquate, ce qui permet à un attaquant d'exécuter des commandes SQL arbitraires.

#### Exemple d'attaque SQL :

Dans le champ **Nom d'utilisateur**, Recherchez comment faire ....

Cette injection pourrait permettre de contourner la validation des utilisateurs si le mot de passe est aussi injecté dans la requête SQL.

#### Pour se protéger :
- Utiliser des requêtes préparées ou des ORM pour éviter les injections SQL. Corriger le code et refaite l'attaque

### 2. **Attaque par Force Brute**

Une attaque par force brute consiste à essayer toutes les combinaisons possibles de mots de passe jusqu'à ce que la bonne combinaison soit trouvée. Comme cet environnement utilise des mots de passe en clair, cette attaque est facilitée.

#### Exemple d'attaque :

Un attaquant peut utiliser un script ou un outil comme **Hydra** pour envoyer des tentatives de connexion en masse sur le formulaire d'authentification.
Recherchez comment faire...


#### Pour se protéger :
- Utiliser une gestion des tentatives de connexion avec un mécanisme de verrouillage après un certain nombre d'échecs.
- Ajouter une solution de **captcha** pour ralentir les attaques automatisées.

  Modifier le code puis refaite votre attaque

### 3. **Exploitation de Mots de Passe en Clair**

Les mots de passe dans cet environnement sont stockés en clair dans la base de données. Un attaquant peut facilement accéder à la base de données (en cas de compromission du serveur) et récupérer tous les mots de passe.

#### Pour se protéger :
- Utiliser un algorithme de hachage sécurisé tel que **bcrypt** ou **argon2** pour stocker les mots de passe.
- Appliquer des pratiques de sécurité pour protéger les accès à la base de données.
Corrigez en modifiant le code


## Conclusion

Cet environnement vous permet de tester et de comprendre plusieurs attaques courantes dans les applications web, telles que l'injection SQL, les attaques par force brute, les failles XSS, et bien plus. Ces exercices sont un excellent moyen de comprendre comment sécuriser une application et de se protéger contre ces attaques. 

**N'oubliez pas** : dans un contexte de production, vous devez toujours prendre des mesures de sécurité appropriées (par exemple, hachage des mots de passe, validation des entrées, gestion des erreurs, etc.) pour protéger votre application des vulnérabilités.

---

## Auteurs

- **Auteur** : JEAN-FRANCOIS MARQUETTE

--- 

Ce README explique comment mettre en place un environnement de test de cybersécurité, avec un focus sur les différentes attaques et la façon de se protéger contre elles.
