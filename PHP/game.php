<?php
    require "db_connection.php";
    require "check_logged_in.php";

    $sql = "SELECT state_of_game, turn, player1, player2 FROM games WHERE player1 = '".$token."' OR player2 = '".$token."'";
    $result = $conn->query($sql);

    if($result->num_rows != 1)
    {
        header("Location: lobby.php");
        die();
    }
?>

<html>
    <head>
        <title>Vier-Gewinnt</title>
        <link rel="stylesheet" href="../CSS/game.css">
        <script src="../JS/game.js"></script>
    </head>
    <body style="background-image: url(../IMG/logscreen.jpeg); background-repeat: norepeat">

        <!--Navigation Bar-->
        <ul class="dashboard">
			<li class="logo" style="display: inline">
                <a href="lobby.php">
                    <img src="../IMG/4gewinnt_logo.png" style="height: 100%; width: auto">
                </a>
            </li>
			<li style="display: inline">
                <a href="../PHP/login.php">
                    <button type="button" class="logoutbtn" onclick="logout()">
                        Logout
                    </button>
                </a>
            </li>
			<li style="display: inline">
                <a href="settings.php">
                    <button type="button" class="sbtn">
                        Settings
                    </button>
                </a>
            </li>
        </ul>

        <!--Page-->
        <div id="web-page" style="display: inline-grid; grid-template-columns: 1fr 1fr">      

            <!--Game Area-->  
            <div id='game_area' style='display: inline-grid; grid-template-columns: auto auto auto auto auto auto auto'>
            </div>

            <!--User Interface-->
            <div id="game_ui" style="display: grid">
                <div id="current_turn">
                </div>
                <div id="color_picker" style="display: block; padding: 50px">
                    <div id="color_p1">
                        <p>Color Player 1</p>
                        <img src="../IMG/panel_black.png" style="max-width: 10%; max-height: 10%; border-width: 2px; border-style: solid; border-color: #FF0000">
                        <img src="../IMG/panel_blue.png" style="max-width: 10%; max-height: 10%;">
                        <img src="../IMG/panel_brown.png" style="max-width: 10%; max-height: 10%;">
                        <img src="../IMG/panel_orange.png" style="max-width: 10%; max-height: 10%;">
                        <img src="../IMG/panel_pink.png" style="max-width: 10%; max-height: 10%;">
                        <img src="../IMG/panel_purple.png" style="max-width: 10%; max-height: 10%;">
                        <img src="../IMG/panel_red.png" style="max-width: 10%; max-height: 10%;">
                        <img src="../IMG/panel_yellow.png" style="max-width: 10%; max-height: 10%;">
                    </div>
                    <div id="color_p2">
                        <p>Color Player 2</p>
                        <img src="../IMG/panel_black.png" style="max-width: 10%; max-height: 10%;">
                        <img src="../IMG/panel_blue.png" style="max-width: 10%; max-height: 10%;">
                        <img src="../IMG/panel_brown.png" style="max-width: 10%; max-height: 10%;">
                        <img src="../IMG/panel_orange.png" style="max-width: 10%; max-height: 10%;">
                        <img src="../IMG/panel_pink.png" style="max-width: 10%; max-height: 10%;">
                        <img src="../IMG/panel_purple.png" style="max-width: 10%; max-height: 10%;">
                        <img src="../IMG/panel_red.png" style="max-width: 10%; max-height: 10%;">
                        <img src="../IMG/panel_yellow.png" style="max-width: 10%; max-height: 10%;">
                    </div>
                </div>
                <p id="error_message" style="color: red"></p>
            </div>
        </div>

        <script type="text/javascript">
            load_game_area();
            check_for_winner();
            setInterval(interval, 1000);
        </script> 
    </body>
</html>