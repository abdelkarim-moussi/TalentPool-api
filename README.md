# Gestion des Recrutements - API Laravel

## Description du Projet
Cette API a pour objectif de faciliter la mise en relation entre recruteurs et candidats en permettant la gestion des annonces, des candidatures et du suivi des recrutements.
L'architecture repose sur le **Repository Pattern** et une **couche Service** afin d'assurer une meilleure modularité et maintenabilité du code.

## Fonctionnalités
### 1. Gestion des Annonces
- Les recruteurs peuvent **ajouter**, **modifier** et **supprimer** des annonces.
- Les candidats peuvent **consulter** la liste des annonces et leurs détails afin de postuler.

### 2. Gestion des Candidatures
- Les candidats peuvent **postuler** à une annonce en envoyant leur **CV et lettre de motivation**.
- Les candidats peuvent **retirer leur candidature**.
- Les recruteurs peuvent **filtrer et récupérer les candidatures** associées à leurs annonces.

### 3. Suivi des Candidatures
- Les recruteurs peuvent **mettre à jour le statut** d'une candidature.
- Les candidats reçoivent une **notification par email** en cas de changement de statut.

### 4. Authentification et Sécurité
- Inscription et connexion avec **JWT** ou **Sanctum**.
- Réinitialisation du mot de passe.
- À l'inscription, l'utilisateur choisit son **rôle** (candidat ou recruteur), qui ne peut pas être modifié par la suite.

### 5. Statistiques et Rapports
- Les recruteurs peuvent **obtenir des statistiques** sur leurs annonces et candidatures.
- Les administrateurs peuvent **analyser l'utilisation globale** de la plateforme.

## Technologies Utilisées
- **Laravel** (Framework PHP)
- **MySQL** (Base de données)
- **JWT ou Sanctum** (Authentification)
- **Mailtrap / SMTP** (Gestion des emails)
- **Docker** (Facultatif, pour l'environnement de développement)

## Installation
1. Cloner le dépôt :
   ```bash
   git clone https://github.com/abdelkarim-moussi/TalentPool-api.git
   cd votre-repo
   ```
2. Installer les dépendances :
   ```bash
   composer install
   ```
3. Configurer l'environnement :
   ```bash
   cp .env.example .env
   ```
   - Modifier les paramètres de la base de données dans le fichier `.env`
4. Générer la clé d'application :
   ```bash
   php artisan key:generate
   ```
5. Exécuter les migrations et seeders :
   ```bash
   php artisan migrate --seed
   ```
6. Lancer le serveur :
   ```bash
   php artisan serve
   ```

## Endpoints Principaux
### Authentification
- `POST /api/register` : Inscription
- `POST /api/login` : Connexion
- `POST /api/logout` : Déconnexion

### Annonces
- `GET /api/annoncements` : Récupérer toutes les annonces
- `GET /api/annoncements/{id}` : Détails d'une annonce
- `POST /api/annoncements` : Ajouter une annonce (Recruteur uniquement)
- `PUT /api/annoncements/{id}` : Modifier une annonce (Recruteur uniquement)
- `DELETE /api/annoncements/{id}` : Supprimer une annonce (Recruteur uniquement)

### Candidatures
- `POST /api/applications` : Postuler à une annonce
- `DELETE /api/applications/{id}` : Retirer une candidature
- `GET /api/applications` : Récupérer les candidatures (Recruteur uniquement)
- `PUT /api/applications/{id}` : Mettre à jour le statut d’une candidature (Recruteur uniquement)

## Tests
Lancer les tests unitaires et fonctionnels avec :
```bash
php artisan test
```


## Licence
Ce projet est sous licence **Abdelkarim Moussi**. Vous êtes libre de l'utiliser et de le modifier selon vos besoins.

---
📌 *Projet conçu avec Laravel pour simplifier le processus de recrutement.*

