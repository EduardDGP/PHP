

<!DOCTYPE html>
<html>
<head>
    <title>Seleccionar Ciudad</title>
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

        p {
            color: #555;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }

        select {
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
    <?php
    $paises = array(
        "España" => array("Lugo", "Cádiz", "Almería", "Sevilla", "Alicante"),
        "Francia" => array("París", "Niza", "Marsella", "Lyon", "Burdeos"),
        "Italia" => array("Milán", "Roma", "Torino", "Venecia", "Palermo"),
        "Estados Unidos" => array("New York", "Los Angeles", "Chicago", "Houston", "Philadelphia"),
        'Alemania' => array('Berlín', 'Hamburgo', 'Múnich', 'Colonia', 'Fráncfort'),
        'Japón' => array('Tokio', 'Osaka', 'Kioto', 'Yokohama', 'Nagoya'),
        'Australia' => array('Sídney', 'Melbourne', 'Brisbane', 'Perth', 'Adelaida'),
        'Brasil' => array('Sao Paulo', 'Río de Janeiro', 'Belo Horizonte', 'Brasilia', 'Salvador'),
        'China' => array('Pekín', 'Shanghái', 'Cantón', 'Shenzhen', 'Wuhan'),
        'Reino Unido' => array('Londres', 'Manchester', 'Birmingham', 'Glasgow', 'Liverpool'),
        'Canadá' => array('Toronto', 'Montreal', 'Vancouver', 'Calgary', 'Ottawa'),
        'Rusia' => array('Moscú', 'San Petersburgo', 'Novosibirsk', 'Ekaterimburgo', 'Kazán'),
        'Corea del Sur' => array('Seúl', 'Busan', 'Incheon', 'Daegu', 'Gwangju')
        // Agrega más países y ciudades aquí
    );
        $nombre = $_POST["nombre"];
        $pais = $_POST["pais"];
        if ($nombre != null && $pais != null){
            // Si no tiene nombre y pais lo redirije de nuevo a index.php
            if (preg_match('/^[A-ZÁÉÍÓÚÜÑ][a-záéíóúüñ\s]+(?:[A-ZÁÉÍÓÚÜÑ][a-záéíóúüñ\s]*)*$/', $nombre)) {
                //Esto es una ezpresión para controlar el nombre, tambien se le pueden añadir apellidos
    ?>
                <h1>Bienvenido, <?php echo $nombre; ?>!</h1>
                <p>Selecciona una ciudad en <?php echo $pais; ?>:</p>
                <form method="post" action="mostrar_info.php">
                    <input type="hidden" name="nombre" value="<?php echo $nombre; ?>">
                    <input type="hidden" name="pais" value="<?php echo $pais; ?>">
                    <select name="ciudad">
                        <?php
                        foreach ($paises[$pais] as $ciudad) {
                            echo "<option value='$ciudad'>$ciudad</option>";
                        }
                        ?>
                    </select>
                    <input type="submit" value="Continuar">
                </form>
        <?php
            }else{
                echo "Nombre incorrecto";
            }
            } else {
                //Redirige a la pagina principal
                header("Location:index.php");
            }
    ?>
    <!--
        <%
    Dim paises
    Set paises = CreateObject("Scripting.Dictionary")
    paises.Add "España", Array("Lugo", "Cádiz", "Almería", "Sevilla", "Alicante")
    paises.Add "Francia", Array("París", "Niza", "Marsella", "Lyon", "Burdeos")
    paises.Add "Italia", Array("Milán", "Roma", "Torino", "Venecia", "Palermo")
    ' ... (similar for other countries and cities)

    Dim nombre, pais
    nombre = Request.Form("nombre")
    pais = Request.Form("pais")

    If Not IsEmpty(nombre) And Not IsEmpty(pais) Then
        ' If name and country are provided, proceed
        If RegExpTest(nombre, "^[A-ZÁÉÍÓÚÜÑ][a-záéíóúüñ\s]+(?:[A-ZÁÉÍÓÚÜÑ][a-záéíóúüñ\s]*)*$") Then
    %>
            <h1>Bienvenido, <%= nombre %>!</h1>
            <p>Selecciona una ciudad en <%= pais %>:</p>
            <form method="post" action="mostrar_info.asp">
                <input type="hidden" name="nombre" value="<%= nombre %>">
                <input type="hidden" name="pais" value="<%= pais %>">
                <select name="ciudad">
                    <% For Each ciudad In paises(pais) %>
                        <option value="<%= ciudad %>"><%= ciudad %></option>
                    <% Next %>
                </select>
                <input type="submit" value="Continuar">
            </form>
    <%
        Else
            ' Invalid name, display an error
            Response.Write("Nombre incorrecto")
        End If
    Else
        ' Redirect to the main page if name and country are not provided
        Response.Redirect("index.asp")
    End If

    Function RegExpTest(ByVal input, ByVal pattern)
        Dim regex, matches
        Set regex = New RegExp
        regex.Pattern = pattern
        regex.IgnoreCase = True
        Set matches = regex.Execute(input)
        RegExpTest = matches.Count > 0
    End Function
    %>

    -->
</body>
</html>