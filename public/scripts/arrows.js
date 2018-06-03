$("#rightArrow").click(function () {
    $('#week option:selected').next().attr('selected', 'selected');
    document.getElementById("choseWeek").submit();
});
$("#leftArrow").click(function () {
    $('#week option:selected').prev().attr('selected', 'selected');
    document.getElementById("choseWeek").submit();
});