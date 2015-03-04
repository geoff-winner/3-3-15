<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <title>Find a Car</title>
</head>
<body>
    <div class="container">
        <h1>Find a Car!</h1>
        <form action="cartest.php">
            <div class="form-group">
                <label for="price">Enter Maximum Price:</label>
                <input id="price" name="price" class="form-control" type="number">
            </div>
            <div class="form-group">
                <label for="miles">Enter Maximum Miles:</label>
                <input id="miles" name="miles" class="form-control" type="number">
            </div>
            <button type="submit" class="btn-success">Submit</button>
        </form>
    </div>
</body>
</html>
