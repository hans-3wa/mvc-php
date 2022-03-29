<?php 

require_once "../repository/ProductRepository.php";

class AbstractController {
    
    public function querySearch()
    {
        $query = $_GET['q'] ?? "";
        $repository = new ProductRepository();
        $data = $repository->fetchQuery($query);
        echo json_encode($data);
    }

}