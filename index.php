<!DOCTYPE html>
<html>

<body>

    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #c9e0ab;
            }

            h2 {
                color: #333;
                background-color: #ddd;
                padding: 10px;
                margin: 0;
                text-align: center;
            }

            form {
                width: 300px;
                margin: 20px auto;
                padding: 20px;
                background-color: #fff;
                border: 1px solid #ddd;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            }

            form label {
                display: block;
                margin-bottom: 10px;
            }

            form input[type="text"] {
                width: 100%;
                padding: 10px;
                margin-bottom: 20px;
                border: 1px solid #ddd;
                border-radius: 5px;
                box-sizing: border-box;
            }

            form input[type="submit"] {
                width: 100%;
                padding: 10px;
                background-color: #4CAF50;
                color: #fff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            form input[type="submit"]:hover {
                background-color: #45a049;
            }

            .output {
                margin: 20px auto;
                padding: 20px;
            }

            .hasil {
                text-align: center;
            }

            @media only screen and (max-width: 600px) {
                form {
                    width: 100%;
                }
            }
        </style>
    </head>
    <h2>Kalkulator IMT</h2>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Berat badan (kg): <input type="text" name="berat_badan"><br>
        Tinggi badan (cm): <input type="text" name="tinggi_badan"><br>
        <input type="submit">
    </form>
    <div class="output hasil">
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $berat_badan = $_POST['berat_badan'];
            $tinggi_badan = $_POST['tinggi_badan'] / 100;
            $imt = round($berat_badan / ($tinggi_badan * $tinggi_badan), 2);

            if ($imt < 18.5) {
                $klasifikasi = "Sangat Kurus";
            } elseif ($imt >= 18.5 && $imt < 24.9) {
                $klasifikasi = "Normal";
            } elseif ($imt >= 25 && $imt < 29.9) {
                $klasifikasi = "Gemuk";
            } else {
                $klasifikasi = "Obesitas";
            }

            echo "IMT: " . number_format($imt, 2) . "<br>";
            echo "Klasifikasi: " . $klasifikasi;
        }

        ?>
    </div>

</body>

</html>