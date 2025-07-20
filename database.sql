-- Base de données pour le gestionnaire de tâches
-- Créer la base de données
CREATE DATABASE IF NOT EXISTS task_manager CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Utiliser la base de données
USE task_manager;

-- Table des tâches
CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    status ENUM('pending', 'completed') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    INDEX idx_status (status),
    INDEX idx_created_at (created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insérer quelques tâches d'exemple
INSERT INTO tasks (title, description, status) VALUES
('Configurer l\'environnement de développement', 'Installer PHP, MySQL et configurer Apache', 'completed'),
('Créer la structure MVC', 'Mettre en place les dossiers controllers, models, views', 'completed'),
('Implémenter les fonctionnalités CRUD', 'Ajouter, modifier, supprimer et lister les tâches', 'pending'),
('Améliorer l\'interface utilisateur', 'Utiliser Bootstrap pour un design responsive', 'pending'),
('Tester l\'application', 'Vérifier toutes les fonctionnalités et corriger les bugs', 'pending');

-- Afficher les tâches créées
SELECT * FROM tasks ORDER BY created_at DESC;
