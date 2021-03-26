function saveAll()
{
    $.post('index.php', $("form#all_settings").serialize(), function(data) {

        $('#messages').html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Settings saved!</strong> The results should now be visible.</div>');
    }, 'json');
}

// image selector
function selectImage(itemId, file, itemIdNum)
{
    $('.item_imagepicker_selectable').removeClass('active');
    $('#' + itemId).val(file);
    $('#' + itemId + "_selected").val(itemIdNum);
    $('#' + itemId + '_' + 'item_' + itemIdNum).addClass('active');
}


$(document).ready(function() {
    $('.subnav').scrollspy();

    $("input.item_type_colorpicker").miniColors();

    var $win = $(window)
        , $nav = $('.subnav')
        , navTop = $('.subnav').length && $('.subnav').offset().top - 40
        , isFixed = 0;

    processScroll();

    $nav.on('click', function () {
        if (!isFixed) setTimeout(function () {  $win.scrollTop($win.scrollTop() - 47) }, 10)
    });

    $win.on('scroll', processScroll);

    function processScroll() {
        var i, scrollTop = $win.scrollTop()
        if (scrollTop >= navTop && !isFixed) {
            isFixed = 1
            $nav.addClass('subnav-fixed')
        } else if (scrollTop <= navTop && isFixed) {
            isFixed = 0
            $nav.removeClass('subnav-fixed')
        }
    }

    // color presets
    $('.preset').each(function() {
        $(this).click(function(){
            var preset_id   = $(this).data("preset-id");
            var this_preset = presets[preset_id];
            $.each(this_preset, function(key, value) {
                var this_element = $('#' + key);
                $(this_element).val(value);
                if (this_element.hasClass('item_type_colorpicker')) {
                    $(this_element).miniColors('value', value);
                }
            });

        });
    });
});