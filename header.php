<?
session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <nav>
                <div class="main-wrapper"></div>
                <ul>
                    <li><a href="index.php">Home</a></li>
                </ul>
                <div class="nav-login">
                    <?php
                    if(isset($_SESSION['u_id'])){
                        echo '<form action="include/logout.inc.php">
                        <button type="submit" name="submit">Logout</button
                        </form>';
                    }  else {
                        
                   echo '<form action="include/login.inc.php" method = "POST">
                        <input type="text" name="uid" placeholder="Username/Email">
                        <input type="password" name="pwd" placeholder="Password">
                        <button type="submit" name="submit">Login</button>
                        </form> <a href="signup.php">Sign Up</a> ';
                    }?>
                                    
                </div>
            </nav>
        </header>