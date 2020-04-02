
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="log.css">
</head>

<body>

<div class="hero">
    <h1> bi3a w charya</h1>
    <div class="form-box">
        <form action="ProdRegist.php" method="post" id="login" class="input-group">
            <input type="text" class="input-field" placeholder="Product Name" name="pname" required>
            <input type="text" class="input-field" placeholder="Type" name="type" required>
            <input type="number" class="input-field" placeholder="Price" name="prix" required>
            <input type="text" class="input-field" placeholder="Category" name="category" required>
            <input type="number" class="input-field" placeholder="Quantity" name="quantity" required>
            <textarea class="input-field" placeholder= "Product description" name= "description" required></textarea>
            <button type="submit" class="submit-btn" name="submit_btn">Register</button>
        </form>
    </div>
</div>
</body>

</html>