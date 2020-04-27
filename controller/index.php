<?php

/*
 * This is the controller php file possible passed values of section and $category_id
 * 1) None - then this is the index page so show the default category (categoryID=1)
 * 2)POST input->
 * 3)GET input
 */

//need the folowing files to connect to DB and to make functions available
require'../model/database.php';
require'../model/product_db.php';
require'../model/category_db.php';
// a variable 'action' is needed ,it can be passed by POST, GET or not at all
//if not at all then make action = default of list_products 
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) 
    {
    
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL)
        $action = 'list_products';
}

//Now depending on what the value of action perform the following
switch ($action) {
    
    case 'list_products':
        //no value of cation passed
        $category_id = filter_input(INPUT_GET, "category_id", FILTER_VALIDATE_INT);
        if ($category_id == NULL || $category_id == false) 
        {
            $category_id =1; //default setting
        }
//ok we have a value for $category_id = get the name, get all categories(for Menu).
        $category_name = get_category_name($category_id); //funtion in the model/category_db.php
        $categories = get_categories();                   //function in the model/category_db.php
        //get the products for the category
       $products = get_products_by_category($category_id); //function in the model/producr_db.php
       include '../view/product_list.php';
       break;
    case 'delete_product':
        // ok action is to delete a product , the product and the category id
        $product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
        $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
        if($action ==NULL || $category_id==FALSE || $product_id ==NULL || $product_id ==FALSE)
        {
            $error = "Missing or incorrect product_id or category_id. ";
            include '../view/error.php';
        }
        else
        {
            delete_product($product_id);
            header("Location: .?category_id=$category_id");
        }
        break;
    case 'show_add_form':
        //Add a product display the form from the link at the bottom of the product_list page
        $categories = get_categories();
        include '../view/product_add.php';
        break;
    case 'add_product':
        //Add the product -> action on the add product form
        $category_id = filter_input(INPUT_POST, 'category_id',FILTER_VALIDATE_INT);
        $code =filter_input(INPUT_POST, 'code');
        $name = filter_input(INPUT_POST, 'name');
        $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
        if($category_id==NULL || $category_id== FALSE || $code ==NULL || $name ==NULL || $price == FALSE )
        {
            //echo $_SERVER['REQUEST_URL']; //troubleshooting to see the current url
            $error = "Invalid product data. Check all the filed and try again. ";
            include '../view/error.php';
        } 
        else
        {
            add_product($category_id, $code, $name, $price);  //function in model/product_db.php
            header("Location: .?category_id");
            
        }
        break;
        
    DEFAULT:
        echo "Unknown actio value " . $action;
}

?>
