function loader(action) {
    if (action === 'block') {
        $("#ld").show();
        $("#overlay").show();
    } else {
        $("#ld").hide();
        $("#overlay").hide();
    }
}

$("#services").on("change", function(e) {
    e.preventDefault();
    loader('block');
    let service = $("#services option:selected").data("slug");

    if (service == "erp") {
        $("#schoolInfomation").show();
        $("#schoolName").attr("required", true);
    } else {
        $("#schoolInfomation").hide();
        $("#schoolName").attr("required", false);
    }
    setTimeout(function() {
        loader('hide');

    }, 100);

});