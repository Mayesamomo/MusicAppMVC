<?php include '../view/header.php';?>
<main> 
    <h1>Product List</h1>
<?php include '../view/aside.php';?>

    <section>
        <h2 id="header"><?php echo $category_name; ?></h2>
        <table>
            <tr>
                <th>Code</th><th>Name</th><th class="price">Price</th><th>&nbsp;</th>
            </tr>
            <?php foreach($products as $product){?>
          <tr>
            <td><?php echo $product['productCode'];?></td>
            <td><?php echo $product['productName'];?></td>
            <td class="right"><?php echo $product['listPrice'];?></td>
            <td>
                <form action="." method='POST'>
                    <input type='hidden' name='action' value="delete_product">
                    <input type='hidden' name='product_id' value='<?php echo $product['productID'];?>'>
                    <input type='hidden' name='category_id' value='<?php echo $product['categoryID'];?>'>
                    <input type='submit' value='Delete'>
                </form>
            </td>
        </tr>
        <?php }?>
       </table>
        <p class="last_paragraph">
            <a href="?action=show_add_form">Add Product</a>
            <br>
            <!--A href="?action=show_add_form"> Add category</a>-->
            
        </p>
    </section>
</main>
<?php include '../view/footer.php';?>
