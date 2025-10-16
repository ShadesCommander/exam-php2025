# 🧭 TP noté — Développement PHP POO
## Sujet : Mini site automobile
## 🎯 Objectif

Vous allez développer un site web en PHP orienté objet, permettant de présenter :

- une liste de voitures (modèles de la marque),

- des articles d’actualité sur ces voitures,

- des offres commerciales liées à certains modèles

- des prises de contacts liées aux voitures.

Ce TP a pour but de mettre en pratique toutes les notions vues en cours :

- la programmation orientée objet (POO) en PHP,

-  la connexion à une base de données avec PDO,

- la structure MVC simplifiée,

- la gestion CRUD complète (Create, Read, Update, Delete).

Lien d'un repository d'init du projet : https://github.com/MaxVast/exam-php2025

### 🚗 Fonctionnalités attendues
#### 1. Gestion des voitures

🔹 Chaque voiture doit comporter :

- un id

- une marque

- un modèle

- une année

- une image

- un prix

##### 🧩 Le site doit permettre :

- d’afficher la liste de toutes les voitures,

- de consulter la fiche détaillée d’une voiture (avec son image et ses infos),

- et pour l’administrateur uniquement, de :

- ajouter une nouvelle voiture,

- modifier les informations d’une voiture existante,

- supprimer une voiture.

#### 2. Gestion des articles (news)

🔹 Chaque article possède :

- un id

- un titre

- un contenu

- une date de publication

- une voiture associée (facultative)

##### 🧩 Le site doit permettre :

- d’afficher tous les articles (du plus récent au plus ancien),

- d’afficher le détail d’un article,

- de lister la voiture liée à un article si elle existe,

- et pour l’administrateur uniquement :

- créer un nouvel article,

- modifier un article existant,

- supprimer un article.

#### 3. Gestion des offres commerciales

🔹 Chaque offre doit contenir :

- un id

- un titre

- une description

- un prix promotionnel

- une date de validité

- une voiture liée (obligatoire)

##### 🧩 Le site doit permettre :

- d’afficher la liste des offres disponibles,

- de consulter le détail d’une offre, avec les informations de la voiture liée,

🔹 pour l’administrateur uniquement :

- ajouter une nouvelle offre,

- modifier une offre existante,

- supprimer une offre.

#### 4. Gestion des offres commerciales
Le site doit également permettre à un visiteur de remplir un formulaire de contact pour être rappelé au sujet d’une voiture.

🔹 Champs attendus dans le formulaire :

- Nom

- Prénom

- Email

- Téléphone

- Espace commentaire

🔹 fonctionnalités à mettre en place :

- Le formulaire doit être accessible depuis la page d’une voiture.

- Les données doivent être enregistrées dans la base de données (table contacts) et uniquement consultables par l’administrateur.

🔹 pour l’administrateur uniquement :

- L’administrateur connecté pourra accéder à la liste complète des contacts.

- La liste des contacts affichera :  Nom, Prénom, Voiture associée, Date.

- Chaque contact affichera : Nom, Prénom, Email, Téléphone, Commentaire, Voiture associée, Date.

- Aucune modification des messages n’est autorisée, uniquement consultation et éventuellement suppression.

🔹 Validation des données :

- Vérification que chaque champ obligatoire est rempli.

- Vérification du format des champs (email valide, téléphone numérique, longueur maximale des champs texte, etc.).

#### 🔑 Gestion des utilisateurs

🔹 Le site ne contient qu’un seul utilisateur administrateur :

- Il n’y a pas de système d’inscription ou de création de compte.

- L’administrateur doit pouvoir se connecter via un formulaire de connexion simple (login/mot de passe).

🔹 Une fois connecté, il accède à un panneau d’administration lui permettant de gérer :

- les voitures (ajouter, modifier, supprimer),

- les articles,

- les offres.

##### 👉 Si l’administrateur n’est pas connecté, il ne doit pas pouvoir accéder aux pages de gestion (ajout, édition, suppression).

### 🗃️ Structure minimale de la base de données
| Table  | column |---|---|---|---|---|---|---|
|---|---|---|---|---|---|---|---|---|
|  users | id | username | password | isAdmin |
|  cars |  id | marque | modele | annee | image | prix |
|  articles | id | titre | contenu | date_publication | voiture_id (nullable) |
|  offers | id | titre | description | prix_promo | date_validite | voiture_id (non null) |
|  contacts | id | nom | prenom | email | telephone | commentaire | voiture_id | date_creation |


🔹 Les relations sont les suivantes :
```bash
articles.voiture_id → cars.id (facultatif)

offres.voiture_id → cars.id (obligatoire)

contacts.voiture_id → cars.id (obligatoire)
```

### ⚙️ Contraintes techniques

Le projet doit utiliser PDO pour toutes les interactions avec la base de données.

Le code doit être entièrement orienté objet.

Les classes attendues au minimum :

Car, CarRepository

Article, ArticleRepository

Offer, OfferRepository

User, UserRepository (pour la connexion admin)

Contact, ContactRepository

🔹 Le projet doit être structuré de manière claire :
```bash
project/
│
├── App/
│   ├── Config/
│   │   └── ...
│   ├── Entity/
│   │   └── ...
│   ├── Repository/
│   │   └── ...
│
│── index.php
│
└── autoload.php
```
#### ⚠️ Important : vous devez compléter cette structure par vous‑mêmes pour chaque module de votre projet (voitures, articles, offres).

Chaque module (par exemple cars, articles, offers, contacts) doit avoir ses propres pages CRUD (list.php, create.php, edit.php, delete.php) et éventuellement ses propres sous-dossiers de vues.

L’objectif est que vous soyez capables de structurer un projet PHP orienté objet de manière lisible et organisée.

##### 💡 Astuce : vous pouvez créer des dossiers à la racine (cars/, articles/, offers/, contacts/) ou organiser les vues et fichiers de chaque module sous App/View/<module>/. L’important est que la logique soit claire et que l’autoload fonctionne correctement.

#### ⚠️ Important : Aucune données des $_POST ne doit être utilisé directement dans les requêtes SQL :
les données doivent d’abord être encapsulées dans des objets avant d’être passées au Repository.

Une interface graphique minimale mais propre sera valorisée dans la notation (même sans framework CSS).

📆 Consignes de rendu :

Le projet doit réalisé seul et doit être déposé sur GitHub en repository privée.

Date limite de rendu : mardi 21 octobre à 18h (dernier délai)

Vous devez m’ajouter en collaborateur : MaxVast

Seul le dernier commit GITHUB avant 18:00:00 sera pris en compte

Le dépôt doit contenir :

- le code complet,

- le(s) fichier(s) .sql pour créer la base de données,

- un fichier README.md expliquant comment lancer le projet, ce que vous avez mis en place, votre  réflexion.

💎 Bonus (optionnel)

- Filtrer les offres ou articles par voiture.

- Ajouter une pagination sur la liste des voitures.

- Ajouter un champ “type de moteur” ou “carburant” sur les voitures.

- Améliorer la mise en page avec du HTML/CSS & JS (menu, cartes, images…).