var CADMIN = {}
CADMIN._initSupport = function() {
    if (jQuery('.wg_support_add_item').length > 0) {
        jQuery(document).on('click', '.wg_support_add_item', function(event) {
            event.preventDefault();
            var clone = jQuery(this).parents('.widget-content').find(".wg_support_list .wg_support_item").first().clone();
            clone.find("input").val("");
            jQuery(this).parents('.widget-content').find('.wg_support_list').append(clone);
        });
    }
}
CADMIN._initBrowseImage = function() {
    jQuery(document).on("click", ".h_remove_image_button", function(e) {
        e.preventDefault();
        var parent = jQuery(this).parent();
        parent.find('input').val('').trigger('change');
        parent.find('img').attr('src', '');
    });
    jQuery(document).on("click", ".h_upload_image_button", function(e) {
        e.preventDefault();
        var $button = jQuery(this);
        var file_frame = wp.media.frames.file_frame = wp.media({
            title: 'Select or upload image',
            library: {
                type: 'image'
            },
            button: {
                text: 'Select'
            },
            multiple: false
        });
        file_frame.on('select', function() {
            var attachment = file_frame.state().get('selection').first().toJSON();
            var parent = $button.parent();
            parent.find('input').val(attachment.id).trigger('change');
            var url = attachment.sizes.full.url;
            if (url == undefined) {
                url = attachment.url;
            }
            parent.find('img').attr('src', url);
        });
        file_frame.open();
    });
    jQuery(document).on("click", ".h_upload_video_button", function(e) {
        e.preventDefault();
        var $button = jQuery(this);
        var file_frame = wp.media.frames.file_frame = wp.media({
            title: 'Select or upload video',
            library: {
                type: 'video'
            },
            button: {
                text: 'Select'
            },
            multiple: false
        });
        file_frame.on('select', function() {
            var attachment = file_frame.state().get('selection').first().toJSON();
            console.log(attachment);
            var parent = $button.parent();
            parent.find('input').val(attachment.url).trigger('change');
            parent.find('img').attr('src', 'images/film.png');
        });
        file_frame.open();
    });
}

jQuery(document).ready(function($) {
    CADMIN._initSupport();
    CADMIN._initBrowseImage();
});
var CUSTOM_CHECKBOX_ADMIN = (function() {
    var initPost = function() {
        if (jQuery('.post_checkbox input[type=checkbox]').length == 0) return;
        jQuery('.post_checkbox input[type=checkbox]').change(function(event) {
            event.preventDefault();
            jQuery.ajax({
                    url: ajaxurl,
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        action: "post_custom_admin",
                        post: jQuery(this).data('post-id'),
                        name: jQuery(this).attr('name'),
                        value: jQuery(this).is(":checked") ? 1 : 0
                    },
                })
                .done(function(json) {
                    toastr.success(json.data);
                });
        });
    }
    var initTutor = function() {
        if (jQuery('.tutor_checkbox input[type=checkbox]').length == 0) return;
        jQuery('.tutor_checkbox input[type=checkbox]').change(function(event) {
            event.preventDefault();
            jQuery.ajax({
                    url: ajaxurl,
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        action: "tutor_custom_admin",
                        post: jQuery(this).data('post-id'),
                        name: jQuery(this).attr('name'),
                        value: jQuery(this).is(":checked") ? 1 : 0
                    },
                })
                .done(function(json) {
                    toastr.success(json.data);
                });
        });
    }

    function changInput(_this) {
        jQuery.ajax({
                url: ajaxurl,
                type: 'GET',
                dataType: 'json',
                data: {
                    action: 'post_custom_admin',
                    post: jQuery(_this).data('post-id'),
                    name: jQuery(_this).attr('name'),
                    value: jQuery(_this).val()
                },
            })
            .done(function(json) {
                toastr.success(json.data);
            });
    };

    function changCheckboxActive(_this) {
        jQuery.ajax({
                url: ajaxurl,
                type: 'GET',
                dataType: 'json',
                data: {
                    action: 'post_custom_admin',
                    post: jQuery(_this).data('post-id'),
                    name: jQuery(_this).attr('name'),
                    value: jQuery(_this).is(":checked") ? 1 : 0
                },
            })
            .done(function(json) {
                toastr.success(json.data);
            });
    };
    var initInputText = function() {
        jQuery(document).on('change', '.group_input input[name="ord"]', function(event) {
            event.preventDefault();
            changInput(this);
        });
    }
    var initInputCheckboxActive = function() {
        jQuery(document).on('change', '.group_input input[name="act"]', function(event) {
            event.preventDefault();
            changCheckboxActive(this);
        });
    }
    return {
        _: function() {
            initPost();
            initInputText();
            initTutor();
        }
    }
})();
jQuery(document).ready(function($) {
    CUSTOM_CHECKBOX_ADMIN._();
});
jQuery(document).ready(

    function($) {

        $( '.widget-control-save' ).click(

            function() {

                var saveID   = $( this ).attr( 'id' );

                var ID       = saveID.replace( /-savewidget/, '' );

                var numberID = ID + '-the_random_number';

                var randNum  = $( '#'+numberID ).val();

                var textTab  = ID + '-wp_editor_' + randNum + '-html';

                $( '#'+textTab ).trigger( 'click' );

            }

        );

    }

);