<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAMP Stack con Docker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
        }
        h2 {
            color: #2980b9;
        }
        .info-box {
            background-color: #fff;
            border-left: 4px solid #3498db;
            padding: 15px;
            margin-bottom: 20px;
        }
        .version {
            font-weight: bold;
            color: #e74c3c;
        }
        .links {
            margin-top: 30px;
        }
        .links a {
            display: inline-block;
            margin-right: 15px;
            padding: 10px 15px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .links a:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>LAMP Stack con Docker</h1>
        
        <div class="info-box">
            <h2>Informazioni PHP</h2>
            <p>Versione PHP: <span class="version"><?php echo phpversion(); ?></span></p>
            <p>Server: <?php echo $_SERVER['SERVER_SOFTWARE']; ?></p>
        </div>
        
        <div class="info-box">
            <h2>Test Connessione MySQL</h2>
            <?php
            $host = 'mysql';
            $user = 'lamp_user';
            $pass = 'lamp_password';
            $db = 'lamp_db';
            
            $conn = new mysqli($host, $user, $pass, $db);
            
            if ($conn->connect_error) {
                echo "<p>Connessione al database fallita: " . $conn->connect_error . "</p>";
            } else {
                echo "<p>Connessione al database riuscita!</p>";
                echo "<p>MySQL versione: " . $conn->server_info . "</p>";
                $conn->close();
            }
            ?>
        </div>
        
        <div class="info-box">
            <h2>Estensioni PHP Caricate</h2>
            <ul>
                <?php
                $extensions = get_loaded_extensions();
                sort($extensions);
                foreach ($extensions as $extension) {
                    echo "<li>$extension</li>";
                }
                ?>
            </ul>
        </div>
        
        <div class="links">
            <h2>Collegamenti Utili</h2>
            <a href="http://localhost:8000" target="_blank">PHPMyAdmin</a>
            <a href="phpinfo.php" target="_blank">PHP Info</a>
        </div>
    </div>
</body>
</html>