<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Créer une nouvelle tâche</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="/tasks/store">
                    <div class="mb-3">
                        <label for="title" class="form-label">Titre <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" required maxlength="255">
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Description optionnelle de la tâche..."></textarea>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="/tasks" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i>
                            Retour
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg me-1"></i>
                            Créer la tâche
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
