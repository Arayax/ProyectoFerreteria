<?php


class categoria extends Entity
{
    
    protected function init(): void {
        
        $query = <<<SQL
CREATE TABLE categoriaProd (
  Id_categoria int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  descripcion_Prod varchar(255)
) 

SQL;
        // Throw an exception when query fails.
        if(!$this->database->query($query)) {
            throw new \Exception($this->database->error);
        }
    }

    public function create(): string {
        $query = 'INSERT INTO categoriaProd (descripcion_Prod) VALUES (?)';
        $stmt = $this->database->prepare($query);
        $stmt->bind_param('ss', $this->request['descripcion_Prod']);

        $stmt->execute();
        $stmt->close();

        return $this->database->insert_id;
    }

    
    public function findAll(): array {
        $query = 'SELECT id, descripcion_Prod FROM categoriaProd';
        $result = $this->database->query($query);

        $records = [];
        while ($item = $result->fetch_object()) {
            $records[] = $item;
        }

        return $records;
    }

   
    public function findById(): object {
        $query = "SELECT id, descripcion_Prod FROM categoriaProd WHERE id = " . $this->request['id'];
        $result = $this->database->query($query);

        return $result->fetch_object();
    }

    
    public function deleteById($id): bool {
        return $this->database->query("DELETE FROM stuff WHERE id={$id}");
    }

   
    public function updateItem() {
        if(!empty($this->request['descripcion_Prod'])) {
          $query = "UPDATE categoriaProd SET descripcion_Prod = '{$this->request['descripcion_Prod']}' WHERE id = {$this->request['id']}";
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