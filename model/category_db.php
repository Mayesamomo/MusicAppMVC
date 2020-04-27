<?php

function get_categories()
{
    /* * *****************************************************
     * Function to get all category name from DB
     * Parameters:none
     * Returns:Query Results array with all category fields
     * records
     * ****************************************************** */
    global $db;
    $query = " SELECT * FROM categories "
            ." ORDER BY categoryID ";
    $statement = $db->prepare($query);
    try{
        $statement->execute();
    }
    catch(PDOException $ex){
        //redirect to an error page passing the message
        header("location:../view/error.php?msg=").$ex->getMessage();
    }
    $categories =$statement->fetchAll();
//    $category_name = $category['categoryName'];
    $statement->closeCursor();
    
    return $categories;
}

function get_category_name($category_id)
{
   
    /* * *****************************************************
     * Function to get all category name from DB
     * Parameters:the category ID
     * Returns:the category name for the ID
     * ****************************************************** */
    global $db;
    $query = "SELECT * FROM categories WHERE categoryID= :category_id";
    $statement= $db->prepare($query);
    $statement->bindValue(":category_id", $category_id);
    try{
    $statement->execute();
    }
    catch(PDOException $ex){
        //redirect to an error page passing the message
        header("location:../view/error.php?msg=").$ex->getMessage();
    }
    $category =$statement->fetch();
    $category_name = $category['categoryName'];
    $statement->closeCursor();
    
    return $category_name;
}
