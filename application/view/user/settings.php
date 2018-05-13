<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-offset-3" align="center">
            <h2>Wybierz grupę:</h2>
            <form action="" method="post" name="addForm">
                <div id="group">
                    <label for="group"></label>
                    <select name="group">
                        <option value="">-- Wybierz --</option>
                        <?php
                        foreach ($groups as $group) {
                            $selected = ($group['name'] == $userGroup) ? 'selected' : '';
                            echo "<option value='" . $group['name'] . "' $selected>" . $group['name'] . "</option>";
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
