<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guía Turística Europea</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 20px auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }

        input[type="text"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Bienvenido a la Guía Turística Europea</h1>
    <form method="POST" action="seleccionar_ciudad.php">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" required><br>

        <label for="pais">Selecciona un país: </label>
        <select name="pais" required>
            <?php
            $paises = array(
                "España", "Francia", "Italia", "Estados Unidos", "Alemania", "Japón",
                "Australia", "Brasil", "China", "Reino Unido", "Canadá", "Rusia", "Corea del Sur"
            );

            foreach ($paises as $pais) {
                echo "<option value='" . htmlspecialchars($pais) . "'>" . htmlspecialchars($pais) . "</option>";
            }
            ?>
        </select>

        <input type="submit" value="Continuar">
    </form>

<!--
    COMENTARIO JSP Y ASP
            
        <% ' ASP Comment: This ASP page displays a welcome message and a form to collect user information %>
    <html>
    <head>
        <title>Bienvenido a la Guía Turística Europea</title>
        <style>
            body {
                font-family: 'Arial', sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 20px;
                text-align: center;
            }

            h1 {
                color: #333;
            }

            label {
                display: block;
                margin-bottom: 10px;
            }

            input, select {
                margin-bottom: 15px;
            }
        </style>
    </head>
        <body>
            <h1>Bienvenido a la Guía Turística Europea</h1>
            <form method="POST" action="seleccionar_ciudad.asp">
                <label for="nombre">Nombre: </label>
                <input type="text" name="nombre" required><br>

                <label for="pais">Selecciona un país: </label>
                <select name="pais" required>
                    <% ' ASP Comment: Loop through an array of countries to populate the dropdown list %>
                    <% 
                        Dim paises
                        paises = Array("España", "Francia", "Italia", "Estados Unidos", "Alemania", "Japón", _
                                    "Australia", "Brasil", "China", "Reino Unido", "Canadá", "Rusia", "Corea del Sur")
                        For Each pais In paises
                    %>
                            <option value='<%= pais %>'><%= pais %></option>
                    <%
                        Next
                    %>
                </select>
                <input type="submit" value="Continuar">
            </form>
        </body>
    </html>
-->
</body>
</html>
