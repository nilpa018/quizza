# Mise en pratique HTML, CSS, PHP, MySQL, JQuery, Bootstrap, Responsive, Scrum, Github.

Nous allons créer une application web qui permet de jouer à des quiz et de gérer les questions.

# Fonctionnalités demandées

### Partie 1 : Gestion du Quiz

- **Description**: Une interface d'administration pour créer, lire, mettre à jour et supprimer des questions de quiz et leurs réponses associées.
- **Fonctionnalités**:
    - **CRUD des questions et réponses**: Ajouter, éditer, supprimer et afficher des questions de quiz.
    - **CRUD des quiz**: Ajouter, éditer, supprimer et afficher des quiz. Un quiz utilise plusieurs questions. Une question peut être utilisée dans plusieurs quiz.
    - **Catégorisation**: Possibilité de catégoriser les questions (par thème, difficulté).
- **Technologies**:
    - **PHP**: Pour la logique de gestion des questions et réponses.
    - **MySQL**: Pour stocker les questions, réponses, catégories et informations des utilisateurs.
    - **Bootstrap**: Pour une interface d'administration agréable et responsive.

### Partie 2 : Jeu de Quiz

- **Description**: Une interface utilisateur interactive pour répondre aux quiz.
- **Fonctionnalités**:
    - Affichage de la liste des quiz disponibles.
    - **Lancer un quiz**: Lancer un quiz fait défiler les questions.
    - **Réponses en temps réel**: Validation des réponses et affichage des résultats instantanément.
    - **Scores et feedback**: Afficher les scores des utilisateurs et fournir des feedbacks après chaque question ou à la fin du quiz.
    - **Minuteur**: Ajouter un minuteur pour chaque question.
    - **Responsive Design**: Utiliser Bootstrap pour que l'interface soit accessible sur tous les types d'appareils.
- **Technologies**:
    - **jQuery**: Pour les interactions dynamiques et les appels AJAX au serveur pour récupérer et envoyer des données.
    - **Bootstrap**: Pour le design et la mise en page adaptative.

# Plan de Travail en Méthodologie Agile

## **Backlog**

### Épopée : Préparation du projet

- **TECH01** : Initialiser le dépot github.
- **TECH02** : Faire le schéma de la BDD (toute l’équipe).
- **TECH03** : Créer la BDD et mettre l’extract SQL dans le dépôt git.

### Épopée : Gestion du Quiz

- **US01** : En tant qu'utilisateur, je veux pouvoir ajouter des questions de quiz pour enrichir la base de données.
- **US02** : En tant qu'utilisateur, je veux pouvoir modifier les questions existantes pour corriger ou améliorer les questions.
- **US03** : En tant qu'utilisateur, je veux pouvoir supprimer des questions pour garder la base de données propre.
- **US04** : En tant qu'utilisateur, je veux pouvoir afficher la liste des questions pour avoir une vue d'ensemble.
- **US05** : En tant qu'utilisateur, je veux pouvoir ajouter des quiz en regroupant plusieurs questions pour créer des jeux de quiz.
- **US06** : En tant qu'utilisateur, je veux pouvoir éditer les quiz existants pour les mettre à jour.
- **US07** : En tant qu'utilisateur, je veux pouvoir supprimer des quiz pour gérer le contenu proposé.
- **US08** : En tant qu'utilisateur, je veux pouvoir catégoriser les questions par thème et difficulté pour une meilleure organisation.

### Épopée : Jeu de Quiz

- **US09** : En tant qu'utilisateur, je veux voir la liste des quiz disponibles pour choisir celui que je veux jouer.
- **US10** : En tant qu'utilisateur, je veux pouvoir lancer un quiz pour répondre aux questions.
- **US11** : En tant qu'utilisateur, je veux que mes réponses soient validées en temps réel pour savoir immédiatement si j'ai bien répondu.
- **US12** : En tant qu'utilisateur, je veux voir mon score et recevoir des feedbacks après chaque question pour évaluer mes performances.
- **US13** : En tant qu'utilisateur, je veux qu'un minuteur soit ajouté pour chaque question pour augmenter le challenge.
- **US14** : En tant qu'utilisateur, je veux que l'interface soit responsive pour pouvoir jouer sur n'importe quel appareil.

**Scrum Meetings**: Début du 2ème jour, chaque groupe fera un scrum meeting.

**Revue de Sprint et Rétrospective**: Fin du 2ème jour, à 16h, chaque groupe à 5 min pour montrer et passer en revue les fonctionnalités développées, proposez des améliorations possibles pour les prochains projets.

## Conseils

Pour réussir ce projet, voici quelques conseils pratiques qui vous aideront à utiliser efficacement les technologies et à gérer votre travail de manière organisée :

### Utilisation de Git

- **Commits réguliers**: Faites des commits très régulièrement. Chaque modification significative du code doit être commitée.
- **Un commit = une fonctionnalité**: Ne regroupez pas plusieurs fonctionnalités dans un même commit. Chaque commit doit être spécifique et descriptif.
- **Messages de commit clairs**: Écrivez des messages de commit clairs et détaillés. Par exemple, utilisez des messages comme "Ajout de la fonctionnalité CRUD pour les questions" ou "Correction de bug dans la validation des réponses".
- **Branches**: Utilisez des branches git (par fonctionnalité ou par developpeur). Fusionnez dans la branche `main` seulement lorsque les fonctionnalités sont testées et stables.

### Gestion de Projet en Méthodologie Agile

- **Sprint planning**: Discutez ensemble avant de prendre une tâche (US).
- **Daily stand-ups**: Discutez  régulièrement de l’avancement, des obstacles et des plans pour la suite.

### Développement en PHP et MySQL

- **Séparation des préoccupations**: Organisez votre code en séparant la logique de traitement (PHP) de la présentation (HTML/CSS).
- **Sécurisation des données**: Utilisez des requêtes préparées pour interagir avec la base de données afin de prévenir les injections SQL.
- **Validation côté serveur**: Validez les données à la fois côté client (jQuery) et côté serveur (PHP) pour assurer l'intégrité des données.

### Développement avec jQuery et Bootstrap

- **Responsive design**: Utilisez les classes Bootstrap pour assurer que votre interface est responsive et fonctionne bien sur tous les types d'appareils.
- **Interaction dynamique**: Utilisez AJAX pour des interactions dynamiques sans rechargement de page, améliorant ainsi l'expérience utilisateur.

### Collaboration et Communication

- **Communication ouverte**: Communiquez régulièrement avec votre coéquipier pour synchroniser vos efforts et résoudre les problèmes rapidement.
- **Partage des responsabilités**: Distribuez les tâches de manière équitable et selon les compétences de chacun pour maximiser l'efficacité.
- **Feedback constructif**: Donnez et recevez des feedbacks constructifs pour améliorer continuellement la qualité du projet.

Le succès ou l'échec d'un projet dépend souvent de la qualité de la communication dans l'équipe. Assurez-vous de bien communiquer, d'écouter attentivement les autres, de résoudre les problèmes ensemble et de donner des avis constructifs. Une bonne communication fluidifie la collaboration et aide à surmonter les obstacles plus facilement.

En suivant ces conseils et en restant engagés, vous êtes sur la voie de la réussite. Bonne chance et amusez-vous bien ! 🚀

### Ressources Utiles

- **Tutoriels PHP et MySQL**: [PHP Manual](https://www.php.net/manual/en/) et [MySQL Documentation](https://dev.mysql.com/doc/)
- **jQuery Documentation**: [jQuery Documentation](https://api.jquery.com/)
- **Bootstrap Documentation**: [Bootstrap Documentation](https://getbootstrap.com/docs/5.0/getting-started/introduction/)