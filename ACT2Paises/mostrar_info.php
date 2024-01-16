<!DOCTYPE html>
<html>
<head>
    <title>Información de la Ciudad</title>
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

        p {
            color: #555;
            margin-bottom: 20px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php
        $nombre = $_POST["nombre"];
        $pais = $_POST["pais"];
        $ciudad = $_POST["ciudad"];
        if ($nombre != null && $ciudad != null && $pais){
                echo "<h1>Bienvenido, $nombre!</h1>";
                echo "<p>Has seleccionado la ciudad de $ciudad en $pais.</p>";
                echo "<p>Para obtener más información sobre $ciudad, visita <a href='https://en.wikipedia.org/wiki/$ciudad' target='_blank'>este enlace</a>.</p>";
        } else {
            header("Location: index.php");
            exit;
        } 
    ?>
    <!-- 
        COMENTARIOS JSP Y ASP

        <%
    Dim nombre, pais, ciudad
    nombre = Request.Form("nombre")
    pais = Request.Form("pais")
    ciudad = Request.Form("ciudad")

    If Not IsEmpty(nombre) And Not IsEmpty(ciudad) And Not IsEmpty(pais) Then
    %>
        <html>
        <head>
            <title>Información de la Ciudad</title>
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

                p {
                    color: #555;
                    margin-bottom: 20px;
                }

                a {
                    color: #007bff;
                    text-decoration: none;
                }

                a:hover {
                    text-decoration: underline;
                }
            </style>
        </head>
        <body>
            <h1>Bienvenido, <%= nombre %>!</h1>
            <p>Has seleccionado la ciudad de <%= ciudad %> en <%= pais %>.</p>
            <p>Para obtener más información sobre <%= ciudad %>, visita <a href='https://en.wikipedia.org/wiki/<%= ciudad %>' target='_blank'>este enlace</a>.</p>
        </body>
        </html>
    <%
        Else
            Response.Redirect("index.asp")
        End If
    %>

    -->
</body>
</html>