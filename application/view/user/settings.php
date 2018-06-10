<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-offset-3" align="center">
            <h2>Ustawienia</h2>
            <form action="" method="post" name="addForm">
                <div id="group">
                    <label for="group">Wybierz grupę</label>
                    <select class="form-control groupSelect" name="group">
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
                <div id="saving">
                    <label for="savingToGoogle">Zapisywać wydarzenia do kalendarza Google?</label>
                    <input type="checkbox" name="savingToGoogle"
                        <?= (string)$user->saving_to_google != 1 ?: 'checked'; ?>
                    >
                </div>
                <div class="inputs">
                    <input type="submit" class="btn-primary btn" value="Zapisz ustawienia" name="submit" />
                    <input type="hidden" value="1" name="save_settings" />
                </div>
            </form>
        </div>
    </div>
</div>
