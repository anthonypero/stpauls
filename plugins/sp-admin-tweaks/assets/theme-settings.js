jQuery(document).ready(function($){

    var mediaUploader;

    $('#upload-header-logo').on('click',function(e) {
        e.preventDefault();
        if( mediaUploader ){
            mediaUploader.open();
            return;
        }

        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose an Image',
            button: {
                text: 'Choose image'
            },
            multiple: false
        });

        mediaUploader.on('select', function(){
            attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#header-logo').val(attachment.url);
            $('#header-logo-preview').css('background-image','url(' + attachment.url + ')');
        });

        mediaUploader.open();

    });

    $('#upload-default-featured-image').on('click',function(e) {
        e.preventDefault();
        if( mediaUploader ){
            mediaUploader.open();
            return;
        }

        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose an Image',
            button: {
                text: 'Choose image'
            },
            multiple: false
        });

        mediaUploader.on('select', function(){
            attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#default-featured-image').val(attachment.url);
            $('#default-featured-image-preview').css('background-image','url(' + attachment.url + ')');
        });

        mediaUploader.open();

    });

    $('#upload-sp-site-icon').on('click',function(e) {
        e.preventDefault();
        if( mediaUploader ){
            mediaUploader.open();
            return;
        }

        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose an Image',
            button: {
                text: 'Choose image'
            },
            multiple: false
        });

        mediaUploader.on('select', function(){
            attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#sp-site-icon').val(attachment.url);
            $('#sp-site-icon-preview').css('background-image','url(' + attachment.url + ')');
        });

        mediaUploader.open();

    });
});