$(document).ready(function () {
    $('[data-toggle="popover"]').popover();
});

onunload = function ()
{
    var week = document.getElementById('week');
    self.name = 'weekidx' + week.selectedIndex;
}

onload = function ()
{
    var idx, week = document.getElementById('week');
    week.selectedIndex = (idx = self.name.split('weekidx')) ? idx[1] : 0;
}


