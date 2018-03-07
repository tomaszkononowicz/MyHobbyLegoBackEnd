function show_photos(title) {
    $.ajax({
        method: "POST",
        url: "search_query",
        dataType: "text",
        data: { search: title, type: 'ajax' },
        success: function (data) {
            $("#container").html(data);
        }
    });
};
