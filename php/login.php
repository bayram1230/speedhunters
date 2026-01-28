<?php

session_start(); // Session starten
require_once 'hash.php'; // Externe Hash-Datei einbinden (Konstanten ERLAUBTER_BENUTZER, PASSWORT_HASH)

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Überprüfen, ob die Anfrage eine POST-Anfrage ist (Formularübermittlung)
    $benutzer = trim($_POST["benutzer"] ?? ''); // Benutzername aus POST-Daten, trimmen, Null-Coalescing
    $passwort = trim($_POST["passwort"] ?? ''); // Passwort aus POST-Daten, trimmen, Null-Coalescing

    if ($benutzer === ERLAUBTER_BENUTZER && password_verify($passwort, PASSWORT_HASH)) { // Benutzername und Passwort überprüfen

        $_SESSION['user_logged_in'] = true; // Session-Variable für Login-Status setzen
        $_SESSION['username'] = $benutzer; // Benutzername in Session speichern
        $_SESSION['show_login_animation'] = true; // Flag für Login-Animation in Session setzen

        session_write_close(); // Session-Daten speichern und Session-Lock freigeben

        header('Location: exclusivecars.php'); // Weiterleitung zu exklusivem Bereich
        exit(); // Skript beenden
    }
}
header('Location: ../html/login.html'); // Weiterleitung zur Login-Seite (Standard oder bei Fehlern)
exit(); // Skript beenden