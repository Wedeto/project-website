$(document).foundation();
$(function () {
    $('pre').addClass('callout');

    hljs.initHighlightingOnLoad();

    let headingConfig = {
        options: [
            {modelElement: 'paragraph', title: 'Paragraph', class: 'cl-heading_paragraph'},
            {modelElement: 'heading1', title: 'Heading 1', viewElement: 'h1'},
            {modelElement: 'heading2', title: 'Heading 2', viewElement: 'h2'},
            {modelElement: 'heading3', title: 'Heading 3', viewElement: 'h3'},
            {modelElement: 'pre', title: 'Pre-formatted', viewElement: 'pre'}
        ]
    };

    //new Foundation.Sticky($('#navigation-menu'), {});
    $('#main-content').children().wrap('<div class="editor"></div>');
    
    $('.editor').each(function () {
        InlineEditor.create(this, {heading: headingConfig})
        .then(editor => {
            console.log('editor init');
            console.log(editor.plugins);
        })
        .catch(error => {
            console.error(error);
        });
    });
});
