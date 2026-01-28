<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") { /* Überprüft, ob das Formular mit der POST-Methode gesendet wurde. */

    $name = strip_tags(trim($_POST["name"])); /* 1. Formulardaten sicher erfassen. (optional, aber gute Praxis) */
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    if (empty($name) || !filter_var($email, FILTER_VALIDATE_EMAIL)) { /* 2. Einfache Überprüfung, ob die wichtigsten Felder ausgefüllt sind. Wenn nicht, wird das Skript mit einer Fehlermeldung beendet. */
        http_response_code(400); /* Sendet einen "Bad Request"-Status */
        echo "Error: Please fill out the name and email fields correctly.";
        exit(); /* Stoppt das Skript */
    }

    $to = "karahan_bayram42@hotmail.com";
    $subject = "Neue Probefahrt-Anfrage von: " . $name;
    $body = "Name: " . $name . "\n";
    $body .= "Email: " . $email . "\n\n";
    $body .= "Nachricht:\n" . $message;
    $headers = "From: " . $email;

    mail($to, $subject, $body, $headers);

    header("Location: ../html/danke.html"); /* 3. Wenn die Überprüfung erfolgreich war, zur Danke-Seite weiterleiten.Der Pfad ../html/danke.html geht vom /php-Ordner eine Ebene hoch und dann in den /html-Ordner. */
    exit(); /* WICHTIG: Immer exit() nach einer Weiterleitung aufrufen. */

} else {
    http_response_code(403); /* Wenn jemand versucht, die PHP-Datei direkt im Browser aufzurufen, wird eine Fehlermeldung angezeigt. */
    echo "Access Forbidden.";
}
