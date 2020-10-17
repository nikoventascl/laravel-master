/*
 Template Name: Urora - Bootstrap 4 Admin Dashboard
 Author: Mannatthemes
 Website: www.mannatthemes.com
 File: form-editor. Js
 */


!function($) {
    "use strict";


    if($("#elm1").length > 0){
        tinymce.init({
            selector: "textarea#elm1",
            language : 'es_MX',
            theme: "modern",
            height:300,
            image_dimensions: {width: '400', height: '200'},
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
            style_formats: [
                {title: 'Texto en negrita', inline: 'b'},
                {title: 'Texto rojo', inline: 'span', styles: {color: '#ff0000'}},
                {title: 'Encabezado rojo', block: 'h1', styles: {color: '#ff0000'}},
                {title: 'Ejemplo 1', inline: 'span', classes: 'example1'},
                {title: 'Ejemplo 2', inline: 'span', classes: 'example2'},
                {title: 'Estilos de tabla'},
                {title: 'Fila de tabla 1', selector: 'tr', classes: 'tablerow1'}
            ]
        });
    }
}
(window.jQuery);




