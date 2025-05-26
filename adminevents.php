<?php
session_start();
require_once("logowanie/connection.php");

if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styl_pyknijmy3.css">
</head>

<body>
    <section>
        <h1>Lista wydarzeń</h1>
        <a class="back" href="index.php">← Wróć na stronę główną</a>
        <a class="back" href="admin_panel.php">Wróć do panelu admina</a>
        <input type="hidden" id="sport-checkbox">
        <input type="hidden" id="nauka-checkbox">
        <input type="hidden" id="rozrywka-checkbox">
        <div id="wydarzenia-container">
            <h2>Wydarzenia</h2>
            <ul id="lista"></ul>
        </div>
    </section>
    <script src="wyswietlanieadmin.js"></script>
</body>

<style>
    body {
        background-color: #ffeb3b;
        color: black;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        padding: 20px;
    }

    h1 {
        color: white;
        font-size: 350%;
        text-shadow: 4px 4px 0px black;
    }

    p {
        color: black;
    }

    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        background-color: white;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    th,
    td {
        padding: 14px 20px;
        text-align: left;
    }

    th {
        background-color: #f5f5f7;
        font-weight: 600;
        color: #333;
        font-size: 15px;
        border-bottom: 1px solid #e0e0e0;
    }

    td {
        background-color: #fff;
        color: #444;
        font-size: 14px;
        border-bottom: 1px solid #f0f0f0;
    }

    tr:last-child td {
        border-bottom: none;
    }

    tr:nth-child(even) td {
        background-color: #fafafa;
    }

    a.back {
        display: inline-block;
        padding: 10px 20px;
        background-color: #f5f5f7;
        color: #333;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        font-size: 15px;
        font-weight: 500;
        border: none;
        border-radius: 10px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
        cursor: pointer;
        transition: all 0.2s ease-in-out;
        margin-top: 1%;
    }

    a.back:hover {
        background-color: #eaeaec;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.12);
    }
</style>

</html>