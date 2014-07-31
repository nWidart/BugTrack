$( document ).ready(function() {

    // Ajax request for bug saving
    var updateBug = function(form) {
        var button = form.find('button');
        button.text('Saving...');

        $.ajax({
            type: 'POST',
            url: '/api/bugs/' + form.find('input[name="bugId"]').val() + '/edit',
            data: form.serialize(),
            success: function(data) {
                $(".jsSuccessMessage").text('Bug updated');
                $(".jsSuccessMessage").fadeIn();
                button.text('Saved');
            },
            error:function (xhr, ajaxOptions, thrownError){
                console.log('error...', xhr);
            }
        });
    };

    var deleteBug = function(bugId, tr) {
        $.ajax({
            type: 'POST',
            url: '/api/bugs/' + bugId + '/delete',
            data: {'bugId' : bugId},
            success: function(data) {
                tr.css('background-color', 'red').fadeOut();
            },
            error:function (xhr, ajaxOptions, thrownError){
                console.log('error...', xhr);
            }
        });
    };

    $('.alert').on('click', function() {
        $(this).fadeOut();
    });

    $('.jsBugForm').on('submit', function (event) {
        event.preventDefault();
        updateBug($(this));
    });

    // Auto save the bug form every 10seconds
    if ($(".jsBugForm").length >= 1) {
        window.setInterval(function() {
            updateBug($(".jsBugForm"));
        }, 10000);
    }

    // Delete the bug on click 'x'
    $('.jsDeleteBug').on('click', function(event) {
        event.preventDefault();
        var tr = $(this).parent().parent().parent();
        deleteBug($(this).data('bugid'), tr);
    });
});