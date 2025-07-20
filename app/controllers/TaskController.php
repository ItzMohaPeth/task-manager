<?php
class TaskController extends Controller {
    private $taskModel;
    
    public function __construct() {
        $this->taskModel = new Task();
    }
    
    public function index() {
        $filter = $_GET['filter'] ?? 'all';
        
        switch ($filter) {
            case 'pending':
                $tasks = $this->taskModel->findByStatus('pending');
                break;
            case 'completed':
                $tasks = $this->taskModel->findByStatus('completed');
                break;
            default:
                $tasks = $this->taskModel->findAll();
                break;
        }
        
        $this->view('tasks/index', [
            'tasks' => $tasks,
            'currentFilter' => $filter
        ]);
    }
    
    public function create() {
        $this->view('tasks/create');
    }
    
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title'] ?? '');
            $description = trim($_POST['description'] ?? '');
            
            if (empty($title)) {
                $_SESSION['error'] = 'Le titre est obligatoire.';
                $this->redirect('/tasks/create');
                return;
            }
            
            $data = [
                'title' => $title,
                'description' => $description,
                'status' => 'pending',
                'created_at' => date('Y-m-d H:i:s')
            ];
            
            if ($this->taskModel->create($data)) {
                $_SESSION['success'] = 'Tâche créée avec succès.';
            } else {
                $_SESSION['error'] = 'Erreur lors de la création de la tâche.';
            }
        }
        
        $this->redirect('/tasks');
    }
    
    public function edit($id) {
        $task = $this->taskModel->findById($id);
        
        if (!$task) {
            $_SESSION['error'] = 'Tâche non trouvée.';
            $this->redirect('/tasks');
            return;
        }
        
        $this->view('tasks/edit', ['task' => $task]);
    }
    
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title'] ?? '');
            $description = trim($_POST['description'] ?? '');
            
            if (empty($title)) {
                $_SESSION['error'] = 'Le titre est obligatoire.';
                $this->redirect("/tasks/edit/{$id}");
                return;
            }
            
            $data = [
                'title' => $title,
                'description' => $description
            ];
            
            if ($this->taskModel->update($id, $data)) {
                $_SESSION['success'] = 'Tâche mise à jour avec succès.';
            } else {
                $_SESSION['error'] = 'Erreur lors de la mise à jour de la tâche.';
            }
        }
        
        $this->redirect('/tasks');
    }
    
    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->taskModel->delete($id)) {
                $_SESSION['success'] = 'Tâche supprimée avec succès.';
            } else {
                $_SESSION['error'] = 'Erreur lors de la suppression de la tâche.';
            }
        }
        
        $this->redirect('/tasks');
    }
    
    public function toggle($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->taskModel->toggleStatus($id)) {
                $_SESSION['success'] = 'Statut de la tâche mis à jour.';
            } else {
                $_SESSION['error'] = 'Erreur lors de la mise à jour du statut.';
            }
        }
        
        $this->redirect('/tasks');
    }
}
?>
