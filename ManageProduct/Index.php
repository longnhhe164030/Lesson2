<!DOCTYPE html>
<html>
    <head>
    Manage Product Lists
    </head>
    <body>
        <form action="manage.php" method="POST">
        <label for="name">Product Name:</label>
        <input type="text" name="name" required><br><br>
        
        <label for="price">Price:</label>
        <input type="number" name="price" required><br><br>
        
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" required><br><br>

               <button type="submit" name="action" value="add">Add Product</button>
               <button type="submit" name="action" value="display">Display Products</button>
               <button type="submit" name="action" value="search">Search</button>
               <button type="submit" name="action" value="sort">Sort Products</button>      
        </form>
    </body>
</html>
