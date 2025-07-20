# 📋 Gestionnaire de Tâches PHP

Une application web simple et élégante de gestion de tâches développée en PHP avec une architecture MVC, utilisant Bootstrap 5 pour l'interface utilisateur.

## ✨ Fonctionnalités

- ✅ **Ajouter** une nouvelle tâche avec titre et description
- ✏️ **Modifier** une tâche existante
- 🗑️ **Supprimer** une tâche
- ✔️ **Marquer une tâche comme terminée** ou la réactiver
- 🔍 **Filtrer les tâches** par statut (toutes, en cours, terminées)
- 📱 **Interface responsive** avec Bootstrap 5
- 🎨 **Design épuré** inspiré des principes de Dieter Rams

## 🛠️ Technologies utilisées

- **Backend** : PHP 7.4+ (sans framework)
- **Base de données** : MySQL 5.7+
- **Frontend** : HTML5, CSS3, Bootstrap 5
- **Architecture** : MVC (Model-View-Controller)
- **Serveur web** : Apache avec mod\_rewrite

## 📋 Prérequis

Avant d'installer l'application, assurez-vous d'avoir :

- PHP 7.4 ou supérieur
- MySQL 5.7 ou supérieur
- Apache avec mod\_rewrite activé
- Un serveur local (XAMPP, WAMP, MAMP, ou équivalent)

## 🚀 Installation

### 1. Cloner le projet

\`\`\`bash
git clone https://github.com/votre-username/task-manager-php.git
cd task-manager-php
\`\`\`

### 2. Configurer la base de données

1. Démarrez votre serveur MySQL
2. Créez la base de données en important le fichier SQL :

\`\`\`bash
mysql -u root -p < database.sql
\`\`\`

Ou via phpMyAdmin :
- Créez une nouvelle base de données nommée \`task_manager\`
- Importez le fichier \`database.sql\`

### 3. Configurer la connexion à la base de données

Modifiez le fichier \`config/database.php\` avec vos paramètres :

\`\`\`php
private $host = 'localhost';
private $database = 'task_manager';
private $username = 'root';        // Votre nom d'utilisateur MySQL
private $password = '';            // Votre mot de passe MySQL
\`\`\`

### 4. Configurer le serveur web

#### Option A : Serveur de développement PHP (recommandé pour les tests)

\`\`\`bash
php -S localhost:8000
\`\`\`

Puis ouvrez votre navigateur à l'adresse : \`http://localhost:8000\`

#### Option B : Apache/XAMPP

1. Copiez le dossier du projet dans votre répertoire web (\`htdocs\` pour XAMPP)
2. Assurez-vous que mod\_rewrite est activé dans Apache
3. Accédez à l'application via : \`http://localhost/task-manager-php\`

## 📁 Structure du projet

\`\`\`
task-manager-php/
├── index.php              # Point d'entrée principal
├── .htaccess              # Configuration Apache
├── README.md              # Documentation
├── database.sql           # Schéma de base de données
├── config/
│   └── database.php       # Configuration BDD
├── core/                  # Classes de base du framework
│   ├── Router.php         # Gestionnaire de routes
│   ├── Controller.php     # Contrôleur de base
│   └── Model.php          # Modèle de base
├── app/
│   ├── controllers/
│   │   └── TaskController.php  # Contrôleur des tâches
│   ├── models/
│   │   └── Task.php       # Modèle Task
│   └── views/
│       ├── layout/
│       │   ├── header.php # En-tête commun
│       │   └── footer.php # Pied de page commun
│       └── tasks/
│           ├── index.php  # Liste des tâches
│           ├── create.php # Formulaire de création
│           └── edit.php   # Formulaire de modification
└── public/
    ├── css/
    │   └── style.css      # Styles personnalisés
    └── js/
        └── app.js         # JavaScript personnalisé
\`\`\`

## 🎯 Utilisation

### Ajouter une tâche
1. Cliquez sur "Nouvelle Tâche"
2. Remplissez le titre (obligatoire) et la description (optionnelle)
3. Cliquez sur "Créer la tâche"

### Gérer les tâches
- **Terminer une tâche** : Cliquez sur le bouton "Terminer"
- **Réactiver une tâche** : Cliquez sur "Réactiver" pour une tâche terminée
- **Modifier une tâche** : Cliquez sur l'icône crayon
- **Supprimer une tâche** : Cliquez sur l'icône poubelle (confirmation requise)

### Filtrer les tâches
Utilisez les boutons de filtre en haut de la liste :
- **Toutes** : Affiche toutes les tâches
- **En cours** : Affiche uniquement les tâches non terminées
- **Terminées** : Affiche uniquement les tâches terminées

## 🔧 Personnalisation

### Modifier les couleurs
Éditez le fichier \`public/css/style.css\` et modifiez les variables CSS :

\`\`\`css
:root {
    --primary-color: #0d6efd;    /* Couleur principale */
    --success-color: #198754;    /* Couleur de succès */
    --warning-color: #ffc107;    /* Couleur d'avertissement */
    --danger-color: #dc3545;     /* Couleur de danger */
}
\`\`\`

### Ajouter de nouveaux champs
1. Modifiez la table \`tasks\` dans la base de données
2. Mettez à jour le modèle \`app/models/Task.php\`
3. Modifiez les vues dans \`app/views/tasks/\`

## 🐛 Dépannage

### Erreur "Page non trouvée"
- Vérifiez que mod\_rewrite est activé dans Apache
- Assurez-vous que le fichier \`.htaccess\` est présent

### Erreur de connexion à la base de données
- Vérifiez les paramètres dans \`config/database.php\`
- Assurez-vous que MySQL est démarré
- Vérifiez que la base de données \`task_manager\` existe

### Problèmes de permissions
- Assurez-vous que le serveur web a les permissions de lecture sur tous les fichiers
- Sur Linux/Mac : \`chmod -R 755 task-manager-php/\`

## 🤝 Contribution

Les contributions sont les bienvenues ! Pour contribuer :

1. Forkez le projet
2. Créez une branche pour votre fonctionnalité (\`git checkout -b feature/nouvelle-fonctionnalite\`)
3. Committez vos changements (\`git commit -am 'Ajouter une nouvelle fonctionnalité'\`)
4. Poussez vers la branche (\`git push origin feature/nouvelle-fonctionnalite\`)
5. Ouvrez une Pull Request

## 📄 Licence

Ce projet est sous licence MIT. Voir le fichier \`LICENSE\` pour plus de détails.

## 👨‍💻 Auteur

Développé avec ❤️ en suivant les principes de design de Dieter Rams pour une interface simple, fonctionnelle et élégante.

---

**Note** : Cette application est conçue à des fins éducatives et de démonstration. Pour un usage en production, considérez l'ajout de fonctionnalités de sécurité supplémentaires comme la validation CSRF, l'authentification utilisateur, et la sanitisation avancée des données.
\`\`\`
