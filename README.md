# Prosit-CRUD

![PHP](https://img.shields.io/badge/PHP-%3E%3D7.4-blue)
![PDO](https://img.shields.io/badge/Database-PDO-orange)
![License](https://img.shields.io/badge/License-MIT-green)

## 📖 Table des matières
- [Description du projet](#description-du-projet)
- [Objectifs principaux](#objectifs-principaux)
- [Fonctionnalités prévues](#fonctionnalités-prévues)
- [Perspectives](#perspectives)
- [Installation](#installation)

---

## 📝 Description du projet

**Exercice : C’est parti mon cookie !**  
Le projet consiste à développer une application web permettant de gérer les entités d'une base de données via des opérations CRUD (Create, Read, Update, Delete). L'objectif est de mettre en place une couche d'abstraction pour sécuriser les interactions avec la base de données, notamment contre les injections SQL, et de dynamiser les formulaires de gestion des données.

---

## 🎯 Objectifs principaux
- Implémenter les CRUD pour les entités définies dans le MCD.
- Sécuriser les interactions avec la base de données grâce à des requêtes préparées (PDO).
- Gérer l'authentification et les restrictions d'accès basées sur une matrice des droits.
- Dynamiser les formulaires pour la saisie, modification et affichage des données.

---

## 🚀 Fonctionnalités prévues
1. Gestion des entreprises (CRUD complet).
2. Gestion des offres de stage (si le temps le permet).
3. Mise en place d'une authentification sécurisée avec sessions ou cookies.
4. Restriction d'accès aux pages selon les rôles (exemple : création d'offres réservée aux pilotes et administrateurs).

---

## 🔮 Perspectives
Bien que le développement d'une application mobile ne soit pas encore décidé, une étude des technologies existantes sera réalisée pour anticiper un éventuel besoin.

---

## ⚙️ Installation

1. Clonez ce dépôt :
   ```bash
   git clone https://github.com/Doggo785/Prosit-CRUD.git
   ```
2. Configurez la base de données dans `src/config/database.php` :
   - Créez la base de données et les tables nécessaires en utilisant les requêtes SQL fournies.
   - Mettez à jour les informations de connexion (hôte, utilisateur, mot de passe).
3. Lancez un serveur local PHP :
   ```bash
   php -S localhost:8000
   ```
4. Accédez à l'application via [http://localhost:8000](http://localhost:8000).