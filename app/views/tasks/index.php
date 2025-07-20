<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Mes Tâches</h1>
    <a href="/tasks/create" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i>
        Nouvelle Tâche
    </a>
</div>

<!-- Filtres -->
<div class="mb-4">
    <div class="btn-group" role="group">
        <a href="/tasks?filter=all" class="btn <?= $currentFilter === 'all' ? 'btn-primary' : 'btn-outline-primary' ?>">
            Toutes
        </a>
        <a href="/tasks?filter=pending" class="btn <?= $currentFilter === 'pending' ? 'btn-primary' : 'btn-outline-primary' ?>">
            En cours
        </a>
        <a href="/tasks?filter=completed" class="btn <?= $currentFilter === 'completed' ? 'btn-primary' : 'btn-outline-primary' ?>">
            Terminées
        </a>
    </div>
</div>

<!-- Liste des tâches -->
<?php if (empty($tasks)): ?>
    <div class="text-center py-5">
        <i class="bi bi-inbox display-1 text-muted"></i>
        <h4 class="text-muted mt-3">Aucune tâche trouvée</h4>
        <p class="text-muted">Commencez par créer votre première tâche.</p>
        <a href="/tasks/create" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i>
            Créer une tâche
        </a>
    </div>
<?php else: ?>
    <div class="row">
        <?php foreach ($tasks as $task): ?>
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card h-100 <?= $task['status'] === 'completed' ? 'task-completed' : '' ?>">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title <?= $task['status'] === 'completed' ? 'text-decoration-line-through text-muted' : '' ?>">
                                <?= htmlspecialchars($task['title']) ?>
                            </h5>
                            <span class="badge <?= $task['status'] === 'completed' ? 'bg-success' : 'bg-warning' ?>">
                                <?= $task['status'] === 'completed' ? 'Terminée' : 'En cours' ?>
                            </span>
                        </div>
                        
                        <?php if (!empty($task['description'])): ?>
                            <p class="card-text <?= $task['status'] === 'completed' ? 'text-muted' : '' ?>">
                                <?= htmlspecialchars($task['description']) ?>
                            </p>
                        <?php endif; ?>
                        
                        <small class="text-muted">
                            Créée le <?= date('d/m/Y à H:i', strtotime($task['created_at'])) ?>
                        </small>
                    </div>
                    
                    <div class="card-footer bg-transparent">
                        <div class="btn-group w-100" role="group">
                            <form method="POST" action="/tasks/toggle/<?= $task['id'] ?>" class="flex-fill">
                                <button type="submit" class="btn btn-sm <?= $task['status'] === 'completed' ? 'btn-outline-warning' : 'btn-outline-success' ?> w-100">
                                    <i class="bi <?= $task['status'] === 'completed' ? 'bi-arrow-counterclockwise' : 'bi-check' ?>"></i>
                                    <?= $task['status'] === 'completed' ? 'Réactiver' : 'Terminer' ?>
                                </button>
                            </form>
                            
                            <a href="/tasks/edit/<?= $task['id'] ?>" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-pencil"></i>
                            </a>
                            
                            <form method="POST" action="/tasks/delete/<?= $task['id'] ?>" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette tâche ?')">
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
