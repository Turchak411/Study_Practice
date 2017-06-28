<?php
?>

<html>
<head>
    <title>Airline Terminal - Main Page</title>
    <link href="style_main.css" rel="stylesheet" type="text/css">

    <div style="text-align:center">
        <label><span class="label">
        Welcome to the Main Terminal page!
                </span></label>
    </div>
</head>

<body>
<div style="text-align:center">
    <br><br><br><br>
    <table class="trans_bc" border="0" width="200px">
        <tr>
            <th>
                <label>
                    <span class="label">Tables</span>
                </label>
            </th>
            <th>
                <label>
                    <span class="label">Queries</span>
                </label>
            </th>
        </tr>
        <tr>
            <td>
                <form method="post" action="">
                    <button class="big_butt" type="submit" name="query_0">Aircraft</button>
                    <br>
                </form>
            </td>
            <td>
                <form method="post" action="">
                    <button class="big_butt" type="submit" name="query_5">Aircraft with MAX operating days</button>
                    <br>
                </form>
            </td>
        </tr>
        <tr>
            <td>
                <form method="post" action="">
                    <button class="big_butt" type="submit" name="query_1">Aircraft Repair Interprise</button>
                </form>
            </td>
            <td>
                <form method="post" action="">
                    <button class="big_butt" type="submit" name="query_6_Page">Aircraft Repair Interprise - Rating</button>
                    <br>
                </form>
            </td>
        </tr>
        <tr>
            <td>
                <form method="post" action="">
                    <button  class="big_butt" type="submit" name="query_2">Airline</button>
                </form>
            </td>
            <td>
                <form method="post" action="">
                    <button class="big_butt" type="submit" name="query_7_Page">Airline - Rating</button>
                    <br>
                </form>
            </td>
        </tr>
        <tr>
            <td>
                <form method="post" action="">
                    <button class="big_butt" type="submit" name="query_3">Repair</button>
                </form>
            </td>
            <td>
                <form method="post" action="">
                    <button class="big_butt" type="submit" name="query_8_Page">Aircraft repair - Cost</button>
                    <br>
                </form>
            </td>
        </tr>
        <tr>
            <td>
                <form method="post" action="">
                    <button class="big_butt" type="submit" name="query_4">Service</button>
                </form>
            </td>
            <td>
                <form method="post" action="">
                    <button class="big_butt" type="submit" name="query_9_Page">Aircraft service - Cost</button>
                    <br>
                </form>
            </td>
        </tr>
    </table>
</div>
</body>
</html>