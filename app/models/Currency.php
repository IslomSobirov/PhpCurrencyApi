<?php 
// include_once '../config/Model.php';

class Currency extends Model{
    
    
    public function __construct($db)
    {
        $this->table = "currency";
        $this->conn = $db;
    }
    
    public function create($name, $rate)
    {
        $query = "INSERT INTO " .$this->table . " (name, rate) VALUES (:name, :rate)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':rate', $rate);

        $stmt->execute();
        
    }

    public function edit($id, $name, $rate)
    {
        $query = "UPDATE " . $this->table . " SET name=?, rate=? WHERE id =?";

        $stmt = $this->conn->prepare($query);
        
        return $stmt->execute([$name, $rate, $id]);
                
    }


    public function updateAll()
    {
        $file = simplexml_load_file('http://www.cbr.ru/scripts/XML_daily.asp');
        $id = 1;
        foreach($file as $item){
            $this->edit($id, $item->Name, $item->Value);
            $id++;
        }
    }

}