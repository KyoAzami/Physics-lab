<?
    session_start();

    if (!isset($_SESSION['l'])) {
        $_SESSION['l'] = 0;
    }
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_SESSION['l']++;
    }

    header("Location: ./calculadora.php");
    exit();