export { hideAll }

function hideAll() {
    $("section").each(function () {
        $(this).addClass("not-active");
    });
}