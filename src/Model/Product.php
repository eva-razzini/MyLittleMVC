<?php

namespace App\Model;

class Product extends AbstractProduct
{
    // Supposez que vous ayez une table "products" dans votre base de données

    public function findPaginated($page)
    {
        // Nombre d'éléments par page
        $itemsPerPage = 10;

        // Calcul de l'offset
        $offset = ($page - 1) * $itemsPerPage;

        // Requête SQL pour récupérer les produits paginés
        $sql = "SELECT * FROM products LIMIT :limit OFFSET :offset";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':limit', $itemsPerPage, \PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, \PDO::PARAM_INT);
        $stmt->execute();

        // Récupérer les résultats
        $products = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $product = new Product();
            $product->setId($row['id']);
            $product->setName($row['name']);
            $product->setDescription($row['description']);
            $product->setPrice($row['price']);

            $products[] = $product;
        }

        return $products;
    }
}
