<h1>User profile homepage</h1>
<?php
echo !empty($userData) ? 'Witaj ' . $userData['name'] : 'Niezalogowany';
