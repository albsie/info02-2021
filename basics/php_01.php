<?php
/*
      PHP = Hypertext Preprocessor
      Es ist eine serverseitige Scriptsprache. PHP wird analysiert und ausgeführt, wenn es keine Syntaxfehler gitb.
      Bei der Ausführung wird der PHP-Code im vergleich zu Compilersprachen sukzessive in Maschinencode umgewandeld.

      PHP kann nur interpretiert werden, wenn ein sog. PHP Modul auf dem Server aktiviert ist und wenn die Datei eine .php-Endung besitzt.

      PHP ist im vergleich zu JS fehlerintolerant, d.h. das Script wird gar nicht ausgeführt wenn ein Syntaxfehler vorhanden ist.

      Nach jedem Befehl muss ein Semikolon (;) stehen.

      evtl. DokumentRoot verschieben in http.d.conf
      DocumentRoot "C:\xampp\htdocs"
      <Directory "C:\xampp\htdocs">


*/

/*
Mehrzeiliger Kommentar
*/

// Einzeiliger Kommentar
# Einzeiliger Kommentar

// Ausgabe auf dem Bildschirm
echo 'Test';

// PHP kann HTML, CSS und JavaScript ausgeben
echo '<h1 style="color: red">Hallo Info 2</h1>';
echo '<script type="text/javascript">
  alert("Hallo Welt");
</script>';

// PHP wird im Quellcode nicht angezeigt

// PHP Dateien können sowohl HTML als auch JS Bestandteile enthalten
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>mein erstes PHP Script</title>
  </head>
  <body>
    <?php echo '<h2 style="color: blue">First PHP Lesson</h2>'; ?>
  </body>
</html>
