<?php


class producto extends Entity
{
    
    protected function init(): void {
        
        $query = <<<SQL
CREATE TABLE IF NOT EXISTS producto  (
  Id_Producto int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  descripcion_Prod varchar(255) NOT NULL,
  Precio float NOT NULL,
  cant_Producto int(11) NOT NULL,
  categoria_Id int(10) UNSIGNED NOT NULL
) 
 

SQL;
      
        if(!$this->database->query($query)) {
            throw new \Exception($this->database->error);
        }
    }

   
    public function create(): string {
        $query = 'INSERT INTO producto (descripcion_Prod, Precio, cant_Producto, categoria_Id) VALUES (?, ?, ?, ?)';
        $stmt = $this->database->prepare($query);
        $stmt->bind_param('siii', $this->request['descripcion_Prod'], $this->request['Precio'], $this->request['cant_Producto'], $this->request['categoria_Id']);

        $stmt->execute();
        $stmt->close();

        return $this->database->insert_id;
    }

    
    public function findAll(): array {
        $query = 'SELECT Id_Producto, descripcion_Prod, Precio, cant_Producto, categoria_Id FROM producto';
        $result = $this->database->query($query);

        $records = [];
        while ($item = $result->fetch_object()) {
            $records[] = $item;
        }

        return $records;
    }

   
    public function findById(): object {
        $query = "SELECT Id_Producto, descripcion_Prod, Precio, cant_Producto, categoria_Id FROM producto WHERE id = " . $this->request['id'];
        $result = $this->database->query($query);

        return $result->fetch_object();
    }

    
    public function deleteById($id): bool {
        return $this->database->query("DELETE FROM stuff WHERE id={$id}");
    }

   
    public function updateItem() {
        if(!empty($this->request['descripcion_Prod']) && !empty($this->request['Precio'])  && !empty($this->request['cant_Producto']) && !empty($this->request['categoria_Id'])) {
            
          $query = "UPDATE producto SET descripcion_Prod = '{$this->request['descripcion_Prod']}', Precio = '{$this->request['Precio']}' , cant_Producto = '{$this->request['cant_Producto']}' , categoria_Id = '{$this->request['categoria_Id']}' WHERE id = {$this->request['id']}";
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