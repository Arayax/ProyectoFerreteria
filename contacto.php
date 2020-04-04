<?php


class contacto extends Entity
{
    
    protected function init(): void {
        
        $query = <<<SQL
CREATE TABLE IF NOT EXISTS contacto  (
  Id_contacto int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  email varchar(255) NOT NULL,
  mensaje varchar(255) NOT NULL
  
) 
 

SQL;
      
        if(!$this->database->query($query)) {
            throw new \Exception($this->database->error);
        }
    }


    
   
    public function create(): string {
        $query = 'INSERT INTO contacto (email, mensaje) VALUES (?, ?)';
        $stmt = $this->database->prepare($query);
        $stmt->bind_param('ss', $this->request['email'], $this->request['mensaje']);

        $stmt->execute();
        $stmt->close();

        return $this->database->insert_id;
    }


    public function findAll(): array {
        $query = 'SELECT Id_contacto, email, mensaje  FROM contacto';
        $result = $this->database->query($query);

        $records = [];
        while ($item = $result->fetch_object()) {
            $records[] = $item;
        }

        return $records;
    }
}