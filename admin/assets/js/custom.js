/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 * 
 */
$(function () {

    $('form#chat-form').submit(function (e) {
        var form = $(this);
        var url = $(this)[0].action;

        e.preventDefault();
        if($('#message').val() !='') {
            var formData = new FormData(this);
            $.ajax({
                url: url,
                data: new FormData(this),
                cache:false,
                processData:false,
                contentType:false,
                type:'POST',
                dataType: 'json',
                success: function (data, textStatus, xhr) {
                    $('#message').val('');
                    $('.note-editable').html('');
                    if (data.status == '1') {
                        $('.chat-content').append(data.html);
                    }
                },
                error: function () {
                    alert("Error posting feed.");
                }
            });
        }
    });
});
