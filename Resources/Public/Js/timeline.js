$("ul.timeline").each(function () {
    let classes = $(this).attr('class').split(' ');
    $(this).attr('class', classes[0] + " " + classes[1]);
    let layout = classes[1].replace("timeline", "");
    let backColor = classes[2].replace("col", "");
    let foreColor = classes[3].replace("foreCol", "");

    $(this).css("color", foreColor);
    if(layout === "1") {
        $("ul.timeline1").css("border-left-color", backColor);
    } else if(layout === "2") {
        $("ul.timeline2 div.timeline-footer").css("background-color", backColor);
    } else {
        $("ul.timeline3").css("border-left-color", backColor);
    }
});