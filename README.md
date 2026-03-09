# Systeme de gestion de scolarite - ProfEtud

Application web PHP/MySQL pour la gestion academique avec deux espaces:
- espace etudiant (consultation des notes, depôt de requetes et devoirs),
- espace enseignant (consultation dossiers et attribution/modification/suppression des notes).

## Apercu fonctionnel

### Espace etudiant
- Authentification via `login.php` / `connexion.php`.
- Inscription conditionnee a un matricule/UI existant (`inscription.php`).
- Tableau de bord etudiant (`index6.php`):
  - recapitulatif profil,
  - historique des requetes deposees,
  - historique des devoirs deposes.
- Depot de requete PDF (`requete.php` -> table `reqetrep` + dossier `Documents/Requete/`).
- Depot de devoir ZIP (`devoir.php` -> table `devoir` + dossier `Documents/Devoir/`).
- Consultation des notes par UE (`index8.php`).

### Espace enseignant
- Tableau de bord enseignant (`indexprof.php`) avec acces:
  - gestion des dossiers etudiants,
  - gestion des notes,
  - affichage global des notes.
- Navigation dossier etudiant:
  - `index.php` -> `Dossier.php` -> `Semestre.php` -> `ue.php` -> `Td.php`.
- Gestion des notes:
  - ajout (`Add.php`),
  - modification (`Mod.php`),
  - suppression (`Del.php`).
- Affichage consolide des notes par UE (`index3.php`).

## Stack technique
- PHP procedural (sans framework)
- MySQL
- HTML/CSS/JavaScript
- Font Awesome local (`assert/font-awesome`)

## Structure du projet

Fichiers principaux:
- `login.php`: interface connexion/inscription.
- `connexion.php`: logique de connexion (verif mot de passe hash).
- `inscription.php`: creation compte avec `password_hash`.
- `index6.php`: accueil etudiant.
- `indexprof.php`: accueil enseignant.
- `index2.php`: ecran de gestion des notes (prof).
- `index3.php`: affichage global des notes.
- `index8.php`: affichage des notes cote etudiant.
- `Add.php`, `Mod.php`, `Del.php`: CRUD des notes.
- `requete.php`, `devoir.php`: upload de fichiers.
- `connect.php`: connexion base de donnees.
- `apptest (4).sql`: dump de la base.

Dossiers:
- `css/`: feuilles de style.
- `js/`: scripts front.
- `images/`: illustrations de l'interface.
- `Documents/`: fichiers televerses (devoirs/requetes).

## Base de donnees

Le dump `apptest (4).sql` contient notamment les tables utiles a l'application:
- `accounts` (comptes de connexion),
- `etudiant`,
- `enseignant`,
- `ue`,
- `semestre`,
- `typeeval`,
- `evaluation`,
- `participer` (notes),
- `devoir`,
- `reqetrep`.

## Installation locale

### 1. Prerequis
- PHP 8.x (ou compatible)
- MySQL 8.x
- Apache (XAMPP/WAMP/Laragon)

### 2. Importer la base
1. Creer une base nommee `apptest`.
2. Importer le fichier `apptest (4).sql` dans cette base.

### 3. Configurer la connexion DB
Le fichier `connect.php` utilise:
- host: `localhost`
- user: `root`
- password: vide
- database: `apptest`

Adapter ces valeurs selon votre environnement local.

### 4. Verifier les permissions d'upload
Verifier les droits d'ecriture sur:
- `Documents/Requete/`
- `Documents/Devoir/`

### 5. Lancer l'application
1. Placer le projet dans le dossier web de votre serveur local.
2. Ouvrir `login.php` dans le navigateur.

## Flux de roles

- Le champ `accounts.role` stocke:
  - soit un `Matricule` etudiant,
  - soit un `UI` enseignant.
- A la connexion, l'application verifie ce role et redirige vers:
  - `index6.php` (etudiant),
  - `indexprof.php` (enseignant).

## Limitations connues (etat actuel du code)

- Requetes SQL construites par concatenation (risque injection SQL).
- Peu de validations serveur sur les uploads (extension controlee surtout cote client JS).
- Organisation monolithique en pages PHP avec logique melangee vue/metier.
- Controle d'acces non uniforme sur toutes les pages.

## Pistes d'amelioration

- Passer toutes les requetes en prepared statements.
- Renforcer la validation serveur des fichiers (MIME, taille, nommage, antivirus).
- Centraliser l'authentification/autorisation.
- Ajouter journalisation et gestion d'erreurs.
- Introduire une architecture MVC progressive.

## Auteur

Projet universitaire "ProfEtud" - gestion de scolarite.
