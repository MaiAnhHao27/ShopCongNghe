<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Online</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #343a40;
            color: #ffffff;
            padding: 10px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo h2 {
            margin: 0;
            padding: 0;
            font-size: 24px;
        }

        .search form {
            display: flex;
            align-items: center;
        }

        .search input[type="search"] {
            padding: 8px;
            border-radius: 5px;
            border: none;
            margin-right: 10px;
        }

        .search button {
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #ffffff;
            cursor: pointer;
        }

        .search button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <h2>SHOP ONLINE</h2>
        </div>
        <div class="search">
            <form action="timkiem.php" method="GET">
                <input type="search" name="keyword" id="" placeholder="Tìm kiếm ...">
                <button type="submit">Tìm kiếm</button>
            </form>
        </div>
    </header>
</body>
</html>
