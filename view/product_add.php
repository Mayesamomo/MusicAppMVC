<?php include 'header.php';?>
<main>
    <?php include '../view/aside.php';?>
    <section>
        <h1>Add Product</h1>
        <form action="index.php" method="POST" id="add_product_form">
            <input type="hidden" name="action" value="add_product">
            <label>Category:</label>
            <select name="catgeory_id" class="">
                <?php foreach ($categories as $category){?>
                <option value="<?php echo $category['categoryID'];?>">
                    <?php echo $category['categoryName'];?>
                </option>
                <?php }?>
            </select>
            <br>
            <label>Code:</label>
            <input type="text" name="code" placeholder="Enter Product Code" required />
            <br>
            <label>Name:</label>
            <input type="text" name="name" placeholder="Enter Product Name" required/>
            <br>
            <label>Price:</label>
            <input type="text" name="price" placeholder="Enter Product Price" required/>
            <br><br>
            <label>&nbsp;</label>
            <input type="submit" value="Add Product"/>
            <br>
        </form>
    </section>
</main>
<?php include 'footer.php';