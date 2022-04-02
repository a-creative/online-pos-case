$('#calc').on('click', () => {

    if ($('#year').val()) {

        $.post('api.php', {
            year: $('#year').val()
        }, (result) => {
            $('#result').html(result);
            $('#year')
                .val('')
                .trigger('focus');
        });

    } else {

        $('#result').html('Husk at indtaste et tal!');

    }

});

$('#year').trigger('focus');