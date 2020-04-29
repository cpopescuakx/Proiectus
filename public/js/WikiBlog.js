$('#summernoteBlog').summernote({
    placeholder: 'Contingut',
    tabsize: 2,
    height: 100,
    minHeight: 100,
    maxHeight: 400
});

/* Comprovem si el contingut del post esta buit al fer submit i
    evitem continuar si està buit
*/
$('#postCreationForm').on('submit', function(e) {
    // Comprovem si el contingut del post esta buit
    if ($('#summernoteBlog').summernote('isEmpty')) {
        console.log('Introdueix el contingut del post!');
        // Evitar el submit
        e.preventDefault();
    }
});
$('#summernoteWiki').summernote({
    placeholder: 'Contingut',
    tabsize: 2,
    height: 100,
    minHeight: 100,
    maxHeight: 400
});


/* Comprovem si el contingut del post esta buit al fer submit i
    evitem continuar si està buit
*/
$('#articleCreationForm').on('submit', function(e) {
    // Comprovem si el contingut del post esta buit
    if ($('#summernoteWiki').summernote('isEmpty')) {
        console.log('Introdueix el contingut del article!');
        // Evitar el submit
        e.preventDefault();
    }
})
