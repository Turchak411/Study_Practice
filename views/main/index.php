<?php
require ROOT.'/views/layouts/header.php';
echo "<code>";
print_r($_SESSION);
echo "</code>";
?>
<div class="img_center"><img src="/template/resources/menu.png" width="270" height="283"></div>
<div class="table_center">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam cum debitis distinctio dolor eaque enim expedita fuga fugit laudantium, odio quas qui, repudiandae, ullam vel velit veritatis vitae. A, laboriosam.
    <table class="trans_bc" border="1" width="200px">
        <tr class="trans_bc">
            <td align="center">
                <form method="post" action="">
                    <button type="submit" name="login">Sign up</button>
                    <br>
                </form>
            </td>
        </tr>
        <tr class="trans_bc">
            <td align="center">
                <form method="post" action="">
                    <button type="submit" name="registration">Registration</button>
                    <br>
                </form>
            </td>
        </tr>
        <tr class="trans_bc">
            <td align="center">
                <form method="post" action="">
                    <button type="submit" name="contacts">Contacts</button>
                </form>
            </td>
        </tr>
    </table>
</div>
