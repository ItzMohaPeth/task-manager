<?php
class Task extends Model {
    protected $table = 'tasks';
    
    public function findByStatus($status = null) {
        if ($status === null) {
            return $this->findAll();
        }
        
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE status = ? ORDER BY created_at DESC");
        $stmt->execute([$status]);
        return $stmt->fetchAll();
    }
    
    public function toggleStatus($id) {
        $task = $this->findById($id);
        if ($task) {
            $newStatus = $task['status'] === 'completed' ? 'pending' : 'completed';
            return $this->update($id, ['status' => $newStatus]);
        }
        return false;
    }
}
?>
