<?php

namespace App\Controller;

use App\Model\Entity\Product;
use App\Repository\ProductRepository;
use App\View\ProductView;

class ProductController
{

    private ProductView $view;

    private ProductRepository $repository;

    public function __construct()
    {
        $this->view = new ProductView();
        $this->repository = new ProductRepository();
    }

    public function shop(): void
    {
        $datas = $this->repository->fetchAll();

        if (isset($datas['error'])) {
            echo $this->view->display400('Une erreur est survenu');
            return;
        }

        $products = [];
        foreach ($datas as $data) {
            $product = new Product();
            $product->setId($data['id']);
            $product->setName($data['name']);
            $product->setQuantity($data['quantity']);
            $product->setPrice($data['price']);
            $product->setUrlPicture($data['url_picture']);
            $product->setDescription($data['description']);

            $products[] = $product;
        }

        echo $this->view->displayShop($products);
    }

    public function getProduct(): void
    {
        $id = (int)$_GET['id'];
        $data = $this->repository->fetchId($id);
        if(!$data){
            header('location: ./index.php?url=404');
        }

        $product = new Product();
        $product->setId($data['id']);
        $product->setName($data['name']);
        $product->setQuantity($data['quantity']);
        $product->setPrice($data['price']);
        $product->setUrlPicture($data['url_picture']);
        $product->setDescription($data['description']);

        echo $this->view->displayProduct($product);
    }

    public function querySearch()
    {
        $query = $_GET['q'] ?? "";
        $products = $this->repository->fetchQuery($query);
        echo json_encode($products);
    }

}