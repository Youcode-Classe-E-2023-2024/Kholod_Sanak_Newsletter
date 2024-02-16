# Plateforme de Communication et Marketing - README

Bienvenue dans la documentation de la plateforme de communication et de marketing, une solution complète développée pour notre client en pleine croissance. Cette plateforme vise à centraliser et rationaliser les opérations en ligne, en mettant l'accent sur la communication, la gestion de l'information et la collaboration au sein de l'équipe.

## Fonctionnalités Principales

### 1. Gestion de Newsletter (Spatie)
La plateforme intègre le package Spatie Newsletter pour simplifier la création, l'envoi et le suivi des campagnes de newsletters. Les fonctionnalités de gestion des abonnements et des listes de diffusion sont intuitives et conviviales.

### 2. Authentification avec Gestion des Rôles (Policies et Guards)
La sécurité et la confidentialité des données sont assurées par un système d'authentification robuste basé sur les politiques et gardes de Laravel. Trois rôles distincts sont définis : Administrateur, Rédacteur et Membre, chacun ayant des autorisations spécifiques.

### 3. Fonctionnalités Forgot Password et Remember Me
Une expérience utilisateur fluide est garantie avec les fonctionnalités "forgot password" pour la réinitialisation du mot de passe et "remember me" pour la connexion automatique.

### 4. Media Library (Spatie)
La gestion de médias est simplifiée avec Spatie Media Library, permettant aux utilisateurs de télécharger, organiser et partager des fichiers multimédias associés à des utilisateurs ou des projets spécifiques.

### 5. Soft Delete
La plateforme intègre la fonctionnalité "soft delete" pour éviter la perte accidentelle de données, marquant les enregistrements comme supprimés plutôt que de les supprimer physiquement de la base de données.

### 6. Middleware
Des middleware sont mis en place pour gérer les autorisations spécifiques aux rôles, assurant que chaque utilisateur accède uniquement aux fonctionnalités autorisées en fonction de son rôle.

### 7. Génération PDF
La plateforme peut générer des fichiers PDF à partir de données spécifiques, offrant des fonctionnalités telles que la création de rapports mensuels sur les performances des campagnes de newsletters ou des récapitulatifs des médias téléchargés sur une période donnée.

### 8. Modélisation avec 3 Rôles
La base de données est modélisée pour prendre en charge les trois rôles définis (Administrateur, Rédacteur, Membre), assurant une séparation claire des données et des responsabilités.

## Modélisation UML

### Diagramme de Classes
![Diagramme de Classes](modelisation/classe.pdf)

### Diagramme de Cas d'Utilisation
![Diagramme de Cas d'Utilisation](url_vers_l_image_diagramme_utilisation.png)

## Installation

1. Clonez le repository.
2. Exécutez `composer install` pour installer les dépendances.
3. Copiez le fichier `.env.example` et renommez-le en `.env`. Configurez la base de données et d'autres variables d'environnement.
4. Exécutez `php artisan key:generate`.
5. Exécutez `php artisan migrate` pour créer les tables de la base de données.
6. Profitez de la plateforme !

## Contribution

Les contributions sont les bienvenues. Assurez-vous de lire les directives de contribution avant de commencer. Merci de contribuer à faire de cette plateforme un outil encore plus puissant.

## Licence

Ce projet est sous licence [MIT](LICENSE).
