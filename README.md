# fxGuard — Générateur No-Code de Menus de Véhicules GTA V

**fxGuard** est une plateforme web intuitive permettant de créer des **menus de véhicules personnalisés pour GTA V / FiveM** via une interface 100% no-code.

Conçue pour simplifier la configuration de vos véhicules, fxGuard permet à n’importe quel joueur ou admin de serveur de générer des fichiers de menu complets, sans toucher une ligne de code.

---

## Fonctionnalités principales

-  Interface web ergonomique (no-code)
-  Ajout, modification et organisation de véhicules GTA V
-  Création de menus par catégories
-  Export facile de fichiers de configuration
-  Gestion des utilisateurs (sessions, sauvegarde)

---

##  Stack technique

- **Langage serveur :** PHP (backend)
- **Langage client :** JavaScript
- **Styles :** SCSS, CSS, HTML
- **Base de données :** MariaDB (SQL)

---

##  Procédé de création

### 1. Idée de départ 

- Objectif : Créer un outil accessible pour générer des menus de véhicules GTA V, souvent longs et techniques à faire manuellement.
- Cible : Joueurs et développeurs de serveurs FiveM, avec ou sans expérience en code.


### 2. Développement 

- Back-end en PHP (gestion des utilisateurs, configurations, export)
- Front-end en HTML/CSS/SCSS + JavaScript

### 3. Sécurité & Tests 

- Gestion des sessions utilisateur en PHP (auth, logout, sécurité)
- Protection des inputs contre injections SQL / XSS

### 4. Export & Intégration 

- Génération automatique de fichiers .lua ou .json compatibles avec les menus de véhicules FiveM
- Test des configs sur un serveur test GTA V

---

## Visiter notre csite
- site web : http://stagiaires-kercode9.greta-bretagne-sud.org/edern-ferlicot/fxGuard/


##  Installation (en local)

> Requiert un environnement Apache + PHP + MySQL (ex: XAMPP, MAMP, Laragon)

```bash
git clone https://github.com/tonuser/fxGuard.git
cd fxGuard
# importer la base de données via le fichier database.sql puis configbdd.sql fourni dans le dossier "base_de_donnees"
# renommer le fichier bdd.env en .env et le configurer avec vos accès MySQL
# lancer le projet via localhost
