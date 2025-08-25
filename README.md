# Projet Todo - Master M1 (2024-2025)

Application **Flutter + API PHP/MySQL** permettant aux utilisateurs d’organiser leur quotidien.  
Chaque utilisateur ne voit que ses propres tâches.  

---

## fonctionnalités

- **Gestion des comptes**
  - Inscription / Connexion / Déconnexion
- **Gestion des tâches**
  - Création, modification, suppression
  - Marquer comme accomplie
  - Historique des tâches terminées
  - Recherche d’une tâche
- **Fonctionnalités additionnelles**
  - Photo de profil persistante
  - Géolocalisation + météo
- **Page d’accueil**
  - Liste des tâches
  - Température actuelle
  - Photo de profil
  - Bouton de déconnexion

---

## structure du projet

/flutter_todo_app → Application Flutter (mobile)
/todo → API PHP/MySQL (backend)

pgsql
Copier
Modifier

---

## ⚙nstallation de l’API (Backend)

1. Copier le dossier **todo** dans `C:/xampp/htdocs/`
2. Démarrer **Apache** et **MySQL** depuis XAMPP
3. Créer la base de données MySQL :
   ```sql
   CREATE DATABASE todo_db;

   CREATE TABLE accounts_table (
     account_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
     email VARCHAR(100) NOT NULL,
     password VARCHAR(500)
   );

   CREATE TABLE todo_tables (
     todo_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
     account_id INT NOT NULL,
     date DATE NOT NULL,
     todo VARCHAR(500),
     done BOOLEAN,
     CONSTRAINT fk_account_id FOREIGN KEY(account_id) REFERENCES accounts_table(account_id)
   );

   CREATE USER 'default-user'@'localhost';
   GRANT INSERT, SELECT, UPDATE, DELETE ON todo_db.* TO 'default-user'@'localhost';
Tester l’API :
→ http://localhost/todo/ doit afficher Web API

📱 Installation du Frontend (Flutter)
Aller dans le dossier flutter_todo_app

bash
Copier
Modifier
cd flutter_todo_app
flutter pub get
Lancer l’application :

bash
Copier
Modifier
flutter run
Configuration API :

Remplacer localhost par l’adresse IP de ton PC si tu testes sur un téléphone

S’assurer que le téléphone et le PC sont sur le même réseau

👨‍🎓 Auteur
Projet réalisé dans le cadre du Master M1 (2024-2025)
Nom : Ablay Embaye
Encadrant : Moustapha D. Fall
