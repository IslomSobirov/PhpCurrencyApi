<?php 
class Model {

    protected $conn;
    protected $table;
    private $paginationNum;


    //Get all elements from table
    public function all() 
    {
        $query = "SELECT * from " . $this->table;
        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        $currencies = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $currency_item = array(
                "id" => $id,
                "name" => $name,
                "rate" => $rate
            );

            array_push($currencies, $currency_item);
        }

        return $currencies;
    }


    //Find element with given id
    public function find($id)
    {
        $query = "SELECT * FROM " .$this->table ." Where id = " .$id;
        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        $currency = array();
    
        $row = $stmt->fetch();

        
        if($row == null)
        {
            return false;
        }
        
            extract($row);
        $currency_item = [
            'id' => $id,
            'name' => $name,
            'rate' => $rate
        ];
        array_push($currency, $currency_item);
        return $currency;
    }

    //Counting number of elements in the table
    public function count()
    {
        $query = "SELECT count(*) as total from " .$this->table;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $num = $stmt->fetch(PDO::FETCH_OBJ);

        return $num->total;

    }

    //get elements from pagination
    public function paginate($page = 0)
    {
        if($page > 0) {
            $page--;
            $page = $page * 4;
        }

        $query = "SELECT * from " . $this->table. " LIMIT " . $page . "," .$this->paginationNum;
        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        $currencies = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $currency_item = array(
                "id" => $id,
                "name" => $name,
                "rate" => $rate
            );

            array_push($currencies, $currency_item);
        }
        return $currencies;
    }


    //Setters for pagination
    public function setPagNum($num)
    {
        $this->paginationNum = $num;
    }
    //Getter for pagination
    public function getPagNum()
    {
        return $this->paginationNum;
    }


}