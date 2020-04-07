<?php


class categoria extends Entity
{
    
    protected function init(): void {
        
        $query = <<<SQL
CREATE TABLE IF NOT EXISTS categoriaProd (
  Id_categoria int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  categoria varchar(255)
) 

SQL;
       
        if(!$this->database->query($query)) {
            throw new \Exception($this->database->error);
        }
    }

    public function create(): string {
        $query = 'INSERT INTO categoriaProd (categoria) VALUES (?)';
        $stmt = $this->database->prepare($query);
        $stmt->bind_param('s', $this->request['categoria']);

        $stmt->execute();
        $stmt->close();

        return $this->database->insert_id;
    }

    
    public function findAll(): array {
        $query = 'SELECT Id_categoria, categoria FROM categoriaProd';
        $result = $this->database->query($query);

        $records = [];
        while ($item = $result->fetch_object()) {
            $records[] = $item;
        }

        return $records;
    }

   
    public function findById(): object {
        $query = "SELECT Id_categoria, categoria FROM categoriaProd WHERE Id_categoria = " . $this->request['id'];
        $result = $this->database->query($query);

        return $result->fetch_object();
    }

    
    public function deleteById($id): bool {
        return $this->database->query("DELETE FROM categoriaProd WHERE Id_categoria={$id}");
    }

   
    public function updateItem() {
        if(!empty($this->request['categoria'])) {
          $query = "UPDATE categoriaProd SET categoria = '{$this->request['categoria']}' WHERE Id_categoria = {$this->request['id']}";
          $this->database->query($query);

          return $this->database->affected_rows;
        }
        return FALSE;
    }

    public function __destruct()
    {
        $this->database->close();
    }
}