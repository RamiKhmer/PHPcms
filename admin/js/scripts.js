tinymce.init({
    selector: 'textarea',
    plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
    toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
    toolbar_mode: 'floating',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
});

// tinymce.init({ selector: 'textarea' });

// In this example, replace <textarea id="mytextarea">
//  with a TinyMCE 5.0 editor instance by passing the selector '#mytextarea' to tinymce.init().

$(document).ready(function() {
    $('#selectAllBoxs').click(function(event) {
        if (this.checked) {
            $('.checkBoxs').each(function() {
                this.checked = true;
            });
        } else {
            $('.checkBoxs').each(function() {
                this.checked = false;
            });
        }
    })
});