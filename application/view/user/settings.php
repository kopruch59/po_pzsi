<?php
?>
<div class="container" style="margin-top: 20px;">
    <div class="row justify-content-center">
        <div class="col-md-6 col-offset-3" align="center">
            <h2>Wybierz grupe:</h2>
            <form action="" method="post" name="addForm">
                <div id="group">
    <label for="group"></label>
    <select name="group">
        <?php
        if (isset($userGroup)) {
            echo "<option value='" . $userGroup . "'>" . $userGroup . "</option>";
        }
        foreach ($groups as $group) {
            echo "<option value='" . $group['name'] . "'>" . $group['name'] . "</option>";
        }
        ?>
    </select>
    <div id="group_error"></div>
</div>
                <input type="submit" class="btn-primary btn" value="Zapisz ustawienia" name="submit" />
                <input type="hidden" value="1" name="save_settings" />
            </form>
        </div>
    </div>
</div>
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

