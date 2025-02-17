<?php

if (isset($_GET["lang"])) {
    $lang_file = file_get_contents("lang/" . $_GET["lang"] . "_" . strtoupper($_GET["lang"] . ".json"));
    $lang = json_decode($lang_file, true);
    // var_dump($lang);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internalization</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        a {
            text-decoration: none;
            list-style: none;
            color: inherit;
        }

        li {
            list-style: none;
        }

        nav {
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 12px;
            background-color: green;
            color: white;
        }

        nav ul {
            display: flex;
            gap: 20px;
        }
    </style>
</head>

<body>
    <nav>
        <h1>Logo</h1>
        <ul>
            <li><a href="#home"><?php echo $lang["home"] ?></a></li>
            <li><a href="#services"><?php echo $lang["services"] ?></a></li>
            <li><a href="#products"><?php echo $lang["products"] ?></a></li>
            <li>
                <form action="" method="get">
                    <select name="lang" id="lang" onchange="this.form.submit()">
                        <option value="en" <?php echo isset($_GET["lang"]) && $_GET["lang"] == "en" ? "selected" : "" ?>>
                            English</option>
                        <option value="id" <?php echo isset($_GET["lang"]) && $_GET["lang"] == "id" ? "selected" : "" ?>>
                            Indonesia</option>
                    </select>
                </form>
            </li>
        </ul>
    </nav>

    <h1>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, quos, quae id omnis consequuntur nobis, dignissimos
        repellat nisi magni maxime eligendi quis? Nam, quisquam rerum. Non aperiam tempora sed molestiae quasi
        aspernatur.</p>
</body>

</html>