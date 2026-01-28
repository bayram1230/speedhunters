<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") { /* Sicherstellen, dass dies die allererste Zeile in der Datei ist. */

    $name = strip_tags(trim($_POST["name"])); /* 1. Formulardaten sicher erfassen */
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);


    if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) { /* 2. Überprüfen, ob alle Felder korrekt ausgefüllt sind */

        http_response_code(400); /* Wenn etwas fehlt, wird eine Fehlermeldung angezeigt und das Skript stoppt. */
        echo "Fehler: Bitte füllen Sie alle Felder korrekt aus und versuchen Sie es erneut.";
        exit;
    }


    $recipient = "karahan_bayram42@hotmail.com"; /* 3. E-Mail-Versand Hier die eigene E-Mail eintragen */
    $subject = "Neue Kontaktanfrage von: $name";
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Nachricht:\n$message\n";
    $email_headers = "From: $name <$email>";


    if (!mail($recipient, $subject, $email_content, $email_headers)) { /* Wenn der Mailversand fehlschlägt, wird eine Fehlermeldung ausgegeben */
        http_response_code(500);
        echo "Es gab ein Problem beim Senden der E-Mail.";
        exit;
    }

    header("Location: ../html/danke.html"); /* 4. Wenn alles erfolgreich war, zur Danke-Seite weiterleiten. */
    exit();
} else {

    http_response_code(403); /* Verhindert, dass jemand die PHP-Datei direkt im Browser aufruft. */
    echo "Ungültige Anfrage.";
}
