# Cyber01 pour mister Mathéo  amuse toi bien

# README - Environnement de Test de Sécurité Web

## Introduction

Ce projet consiste en un environnement Docker composé de deux services :
1. **MariaDB** - Base de données qui stocke les utilisateurs et leurs mots de passe.
2. **PHP/Apache** - Serveur web exposant un formulaire d'authentification qui interagit avec la base de données pour valider les identifiants.

Cet environnement est conçu pour effectuer des **tests de sécurité** afin d'illustrer les vulnérabilités communes dans les applications web.

## Différences avec Cyber01

Les attaques réalisables sur **Cyber02** sont similaires à celles de **Cyber01**. Toutefois, une **faille supplémentaire** permet d'accéder au serveur. Naviguez, analysez et **trouvez cette faille**, puis exploitez-la.

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
git clone https://github.com/NeoDarwin/cyber02.git
cd cyber02
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

Cet environnement est conçu pour être une base d'apprentissage des attaques courantes dans les applications web. Voici les attaques que vous pouvez tester sur cet environnement, avec en plus **une faille permettant de pénétrer le serveur**.

### 1. **Injection SQL**

L'une des attaques les plus courantes consiste à injecter des requêtes SQL malveillantes via le formulaire d'authentification.

#### Exemple d'attaque SQL :

Recherchez comment exploiter une injection SQL dans les champs d'authentification...

#### Pour se protéger :
- Utiliser des requêtes préparées ou des ORM pour éviter les injections SQL.

### 2. **Attaque par Force Brute**

Une attaque par force brute consiste à essayer toutes les combinaisons possibles de mots de passe jusqu'à ce que la bonne combinaison soit trouvée.

#### Exemple d'attaque :

Utilisez un outil comme **Hydra** pour tester la robustesse du formulaire d'authentification.

#### Pour se protéger :
- Mettre en place un verrouillage après plusieurs tentatives infructueuses.

### 3. **Exploitation de Mots de Passe en Clair**

Les mots de passe sont stockés en clair dans la base de données.

#### Pour se protéger :
- Utiliser un algorithme de hachage sécurisé tel que **bcrypt** ou **argon2**.

### 4. **Nouvelle faille à exploiter**

Cyber02 contient une **faille permettant d'accéder au serveur**. Votre objectif : **trouver cette faille et l'exploiter** pour obtenir un accès plus profond au système.

#### Pistes :
- Explorez les requêtes envoyées par l'application.
- Testez les points d'entrée possibles.
- Analysez le code source pour détecter des erreurs de configuration.

## Conclusion

Cyber02 vous offre un défi supplémentaire : en plus des attaques classiques, vous devez **trouver et exploiter une faille inédite**. Ce type d'exercice est une bonne mise en situation pour comprendre comment les attaquants procèdent dans un environnement réel.

**Bonne chasse et bon apprentissage !** 🚀

---

## Auteurs

- **Auteur** : JEAN-FRANCOIS MARQUETTE
