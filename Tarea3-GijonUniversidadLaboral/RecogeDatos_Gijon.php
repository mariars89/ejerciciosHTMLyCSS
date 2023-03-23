<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
   Formulario de Gijón
  </title>
  
</head>

<body>
  <h1>Validación formulario de Gijón</h1>

  <?php
function recoge($var, $m = "")
{
    $tmp = is_array($m) ? [] : "";
    if (isset($_REQUEST[$var])) {
        if (!is_array($_REQUEST[$var]) && !is_array($m)) {
            $tmp = trim(htmlspecialchars($_REQUEST[$var]));
        } elseif (is_array($_REQUEST[$var]) && is_array($m)) {
            $tmp = $_REQUEST[$var];
            array_walk_recursive($tmp, function (&$valor) {
                $valor = trim(htmlspecialchars($valor));
            });
        }
    }
    return $tmp;
}

$nombre    = recoge("nombre");
$apellidos = recoge("apellidos");
$telefono = recoge("telefono");
$email = recoge("email");
$num_personas = recoge("num_personas");
$idioma = recoge("idioma");
$tipo_visita = recoge("tipo_visita");
$arte = recoge("arte");
$historia = recoge("historia");
$gastronomia = recoge("gastronomia");
$naturaleza = recoge("naturaleza");
$recibir = recoge("recibir");




$nombreOk    = false;
$apellidosOk = false;
$telefonoOk = false;
$emailOk = false;
$num_personasOk = false;
$idiomaOk = false;
$tipo_visitaOk = false;
$arteOk = false;
$historiaOk = false;
$gastronomiaOk = false;
$naturalezaOk = false;
$recibirOk = false;


if ($nombre == "") {
    print "  <p class=\"aviso\">No ha escrito su nombre.</p>\n";
    print "\n";
} else {
    $nombreOk = true;
}

if ($apellidos == "") {
    print "  <p class=\"aviso\">No ha escrito sus apellidos.</p>\n";
    print "\n";
} else {
    $apellidosOk = true;
}
if ($telefono == "") {
    print "  <p class=\"aviso\">No ha escrito su teléfono.</p>\n";
    print "\n";
} else {
    $telefonoOk = true;
}
if ($email == "") {
    print "  <p class=\"aviso\">No ha escrito su dirección de correo.</p>\n";
    print "\n";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    print "  <p class=\"aviso\">No ha escrito una dirección de correo correcta.</p>\n";
    print "\n";
} else {
    $emailOk = true;
}


if ($num_personas == "") {
    print "  <p class=\"aviso\">No ha escrito el número de personas para la visita.</p>\n";
    print "\n";
} elseif (!is_numeric($num_personas)) {
    print "  <p class=\"aviso\">No ha escrito el número de personas como número.</p>\n";
    print "\n";
} elseif (!ctype_digit($num_personas)) {
    print "  <p class=\"aviso\">No ha escrito el número de personas como número entero.</p>\n";
    print "\n";
} elseif ($num_personas < 1|| $num_personas > 50) {
    print "  <p class=\"aviso\">El número de personas no está entre 1 y 50 .</p>\n";
    print "\n";
} else {
    $num_personasOk = true;
}

if ($idioma == "...") {
    print "  <p class=\"aviso\">No ha indicado su idioma.</p>\n";
    print "\n";
} elseif ($idioma != "1" && $idioma != "2" && $idioma != "3" && $idioma != "4") {
    print "  <p class=\"aviso\">Por favor, indique su idioma.</p>\n";
    print "\n";
} else {
    $idiomaOk = true;
}

if ($tipo_visita == "") {
    print "  <p class=\"aviso\">No ha indicado su tipo de visita.</p>\n";
    print "\n";
} elseif ($tipo_visita != "guiada" && $tipo_visita != "libre") {
    print "  <p class=\"aviso\">Por favor, indique si su visita es guiada o libre.</p>\n";
    print "\n";
} else {
    $tipo_visitaOk = true;
}


if ($arte != "" && $arte != "on") {
    print "  <p class=\"aviso\">Por favor, indique si le gusta o no el arte.</p>\n";
    print "\n";
} else {
    $arteOk = true;
}

if ($historia != "" && $historia != "on") {
    print "  <p class=\"aviso\">Por favor, indique si le gusta o no la historia.</p>\n";
    print "\n";
} else {
    $historiaOk = true;
}

if ($gastronomia != "" && $gastronomia != "on") {
    print "  <p class=\"aviso\">Por favor, indique si le gusta o no la gastronomía.</p>\n";
    print "\n";
} else {
    $gastronomiaOk = true;
}

if ($naturaleza != "" && $naturaleza != "on") {
    print "  <p class=\"aviso\">Por favor, indique si le gusta o no la naturaleza.</p>\n";
    print "\n";
} else {
    $naturalezaOk = true;
}

if ($recibir == "-1") {
    print "  <p class=\"aviso\">No ha indicado si desea recibir correo.</p>\n";
    print "\n";
} elseif ($recibir != "0" && $recibir != "1") {
    print "  <p class=\"aviso\">Por favor, indique si quiere recibir o no correo.</p>\n";
    print "\n";
} else {
    $recibirOk = true;
}


if ($nombreOk && $apellidosOk && $telefonoOk && $emailOk && $num_personasOk && $idiomaOk && $tipo_visitaOk
&& $arteOk && $historiaOk && $gastronomiaOk && $naturalezaOk && $recibirOk) {
    print "  <p>Su nombre es <strong>$nombre</strong>.</p>\n";
    print "\n";
    print "  <p>Sus apellidos son <strong>$apellidos</strong>.</p>\n";
    print "\n";
    print "  <p>El teléfono es <strong>$telefono</strong>.</p>\n";
    print "\n";
    print "  <p>El email es <strong>$email</strong>.</p>\n";
    print "\n";
    print "  <p>El número de personas para la visita es <strong>$num_personas</strong>.</p>\n";
    print "\n";
    if ($tipo_visita == "guiada") {
        print "  <p>Es una <strong>visita guiada</strong>.</p>\n";
    } elseif ($estadoCivil == "libre") {
        print "  <p>Es una <strong>visita libre</strong>.</p>\n";
    } else {
        print "  <p>El tipo de visita no es <strong>ni guiada ni libre</strong>.</p>\n";
    }
    print "\n";
    
    if ($idioma  == 1) {
        print "  <p>Idioma <strong>Español</strong>.</p>\n";
    } elseif ($idioma  == 2) {
        print "  <p>Idioma <strong>Inglés</strong>.</p>\n";
    } elseif ($idioma  == 3) {
        print "  <p>Idioma <strong>Francés</strong>.</p>\n";
    } else {
        print "  <p>Idioma  <strong>Alemán</strong>.</p>\n";
    }
    print "\n";

    if ($arte != "on" && $historia != "on" && $gastronomia != "on" &&
        $naturaleza != "on") {
        print "  <p class=\"aviso\">No ha marcado ninguna área de interés.</p>\n";
    } else {
        print "  <p>Le gusta: ";
        if ($arte == "on") {
            print "<strong>El arte</strong>, ";
        }
        if ($historia== "on") {
            print "<strong>La historia</strong>, ";
        }
        if ($gastronomia == "on") {
            print "<strong>La gastronomía</strong>, ";
        }
        if ($naturaleza == "on") {
            print "<strong>La naturaleza</strong>, ";
        }
        
        print "</p>\n";
        print "\n";

        if ($recibir == "0") {
            print "  <p><strong>No</strong> recibirá correos nuestros.</p>\n";
            print "\n";
        } else {
            print "  <p><strong>Sí</strong> recibirá correos nuestros.</p>\n";
            print "\n";
        }
    }
}
?>
  <p><a href="index.html">Volver al formulario.</a></p>
 
</body>
</html>
