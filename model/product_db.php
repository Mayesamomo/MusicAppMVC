<?php

function get_products_by_category($category_id) {
    /*     * ***********************************************
     * Function to get all products by category from DB 
     * Parameters: the category ID
     * Return: query array of  all products for the ID
     * ************************************************* */

    global $db;
    $query = "SELECT * FROM products  WHERE categoryID =:category_id  ORDER BY productID";
    $statement = $db->prepare($query);
    $statement->bindValue(":category_id", $category_id);
    try {
        $statement->execute();
    } catch (Exception $ex) {
//redirect to an error page passing the error message 
        header("Location:../view/error.php?msg=" . $ex->getMessage());
        exit();
    }
    $products = $statement->fetchAll();
    $statement->closeCursor();

    return $products;
}

function get_products($product_id) {
    /*     * ********************************
     * Function to get a product by product ID for DB
     * Parameters:the product ID 
     * Return: query array of thr product for the ID 
     * ****************************** */
    global $db;
    $query = "SELECT * FROM products WHERE productID = :product_id";
    $statement = $db->prepare($query);
    $statement->bindValue(":product_id", $product_id);
    try {
        $statement->execute();
    } catch (PDOException $ex) {
        //redirect to an error page passing error message
        header("Location:../view/error.php?msg=" . $ex->getMessage());
        exit();
    }
    $product = $statement->fetch();
    $statement->closeCursor();

    return $product;
}

function delete_product($product_id) {
    /*     * ********************************
     * Function to delete a product by product ID for DB
     * Parameters:the product IDto delete
     * Return:nothing
     * ****************************** */
    global $db;
    $query = "DELETE FROM products WHERE productID = :product_id";
    $statement = $db->prepare($query);
    $statement->bindValue(":product_id", $product_id);
    try {
        $statement->execute();
    } catch (PDOException $ex) {
        //redirect to an error page passing the error message
        heaeder("Location:../view/error.php?msg=" . $ex->getMessage());
        exit();
    }
    $product = $statement->fetch();
    $statement->closeCursor();
}

function add_product($category_id, $code, $name, $price) {
    /*     * ********************************
     * Function to add a product by product ID for DB
     * Parameters: categoy ID, product code, productname,list price
     * Return:nothing
     * ****************************** */
    global $db;
    $query = "INSERT INTO products(categoryID, productCode,"
            . "productName, listPrice)
            VALUES (:category_id, :code, :name, :price)";
    $statement = $db->prepare($query);
    $statement->bindValue(":category_id", $category_id);
    $statement->bindValue("code", $code);
    $statement->bindValue("name", $name);
    $statement->bindValue("price", $price);

    try {
        $statement->execute();
    } catch (PDOException $ex) {
        //redirect to an error page passing the error message
        $categories = get_categories();
        heaeder("Location:../view/error.php?msg=" . $ex->getMessage());
        exit();
    }
    $statement->closeCursor();
}
?>
