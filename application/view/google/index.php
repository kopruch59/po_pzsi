<?php
echo 'Dla konta gmail ' . $results->summary . '<br />';

if (count($items) != 0) {

    echo "Nadchodzące wydarzenia:<br />";
    
    foreach ($items as $event) {

        $start = $event->start->dateTime ?: $event->start->date;

        echo $event->getSummary() . " ($start)<br />";
    }
} else {
    echo "Nie znaleziono wydarzeń<br />";
}
?>
<br />
