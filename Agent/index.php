<!DOCTYPE html>
<html>

<head>
    <title>Agent</title>
</head>
<style>
    body {
        margin: 0;
        background: #ddd;
    }

    table {
        font-size: 22px;
    }

    td {
        text-align: center;
    }

    #td1 {
        background-color: lightseagreen;
        color: white;
        border: 10px;
        margin-top: -10px;
        padding: 10px;
    }

    .basic_box {
        border: 1px solid #ccc;
        border-radius: 15px;
        margin: auto;
        width: 600px;
        padding: 50px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19);
    }

    th {
        font-weight: bold;
        padding-left: 15px;
    }

    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        width: 22%;
        font-size: 24px;
        background-color: lightseagreen;
        text-decoration: none;
        position: fixed;
        height: 100%;
        overflow: auto;
    }

    li {
        color: white;
    }

    li a {
        display: block;
        color: white;
        padding: 8px 16px;
        text-decoration: none;
    }

    li a.active {
        background-color: #e6b800;
        color: white;
    }

    li a:hover:not(.active) {
        background-color: #ffa500;
        color: white;
        text-decoration: underline;
    }


    /* Style the outer menu */
    .outer-menu {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .outer-menu li {
        margin-bottom: 10px;
    }

    /* Style the inner menu */
    .inner-menu {
        list-style: none;
        margin: 0;
        padding: 0;
        display: none;
    }

    .inner-menu li {
        size: 50px;
        margin-bottom: 5px;
    }

    /* Show the inner menu when the outer menu item is hovered */
    .outer-menu li:hover .inner-menu {
        display: block;
    }


    #e1 {
        float: center;
        margin-top: 32px;

    }

    header h1 {
        float: right;
        margin-top: 32px;
    }

    .divider {

        width: 100px;
        height: 2px;
        background: #ffa500;
        /*margin: 0 auto;*/
        margin-left: auto;
        margin-right: auto;
        margin-top: 100px;

    }

    .heading {
        text-align: center;
        margin-bottom: 60px;
        margin-left: 115px;
        /*margin-top: 200px;*/
    }

    h2 {

        text-transform: uppercase;
        font-weight: bold;
        color: black;
    }
</style>

<body>


    <table style="width: 100%;">
        <tr>
            <td id="td1" style="padding: 10px; font-size: 48px;"><b> HoteLUX</b><span style="color: #ffa500;">.</span></td>
        </tr>
    </table>


    <ul class="outer-menu" style="position: fixed;">

        <li><a href="">Profil</a></li>
        <li><a href="">Clients</a>

        </li>
        <li><a href="">Résérvations</a>

        </li>
        <li><a href="">Chambres</a>

        </li>
        <li><a href="">Activités</a></li>

        <li><a href="../index.html">Déconnexion</a></li>
    </ul>
    <div class="container">
        <div class="divider"></div>
        <div class="heading">
            <h2>Bienvenue à espace agent de réception</h2>
        </div>

</body>

</html>