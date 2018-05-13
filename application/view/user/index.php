<h1>User profile homepage</h1>
<?php
echo !empty($userData) ? 'Witaj ' . $userData['g_first_name'] . ' ' . $userData['g_last_name'] : 'Niezalogowany';
