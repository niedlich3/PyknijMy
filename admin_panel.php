<?php
session_start();
require_once("logowanie/connection.php");

if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    header("Location: index.php");
    exit;
}



$query = "SELECT user_id, id, user_name, email, gender, birthdate, date FROM users";
$result = mysqli_query($conn, $query);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_user_id'])) {
    $userIdToDelete = intval($_POST['delete_user_id']);


    $delete_query = "DELETE FROM users WHERE id = $userIdToDelete";
    if (mysqli_query($conn, $delete_query)) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Panel administratora</title>

</head>

<body>

    <h1>Panel administratora</h1>

    <p>Lista zarejestrowanych użytkowników:</p>

    <table>
        <tr>
            <th>ID</th>
            <th>Nazwa użytkownika</th>
            <th>Email</th>
            <th>Płeć</th>
            <th>Data urodzenia</th>
            <th>Data rejestracji</th>
            <th>Usuń</th> <!-- NOWA KOLUMNA -->
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['user_name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['gender']) ?></td>
                <td><?= htmlspecialchars($row['birthdate']) ?></td>
                <td><?= htmlspecialchars($row['date']) ?></td>
                <td>
                    <form method="post" onsubmit="return confirm('Czy na pewno chcesz usunąć tego użytkownika?');">
                        <input type="hidden" name="delete_user_id" value="<?= htmlspecialchars($row['id']) ?>">
                        <?php if ($_SESSION['user_id'] != $row['user_id']): ?>
                            <button type="submit" style="border:none; background:none; color:red; font-size: 18px; cursor: pointer;">❌</button>
                        <?php endif; ?>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <a class="back" href="index.php">← Wróć na stronę główną</a>
    <a class="back" href="adminevents.php">Lista wydarzeń</a>

</body>
<style>
    body {
        background-color: #ffeb3b;
        color: #fff;
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