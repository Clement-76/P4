$(function () {
    tinymce.init({
        selector: '#post_content',
        width: '70%',
        height: 300,
        plugins: "lists, textcolor, image, link, code, fullscreen, wordcount, autolink, autosave, table, hr",
        toolbar: "undo, redo | formatselect | bold, italic, underline, forecolor, blockquote | link, image | alignleft, aligncenter, alignright | bullist, numlist | fullscreen",
        autosave_restore_when_empty: true,
        menu: {
            edit: {title: 'Edit', items: 'undo redo | cut copy paste pastetext | selectall'},
            insert: {title: 'Insert', items: 'link | hr'},
            format: {title: 'Format', items: 'bold italic underline strikethrough | removeformat | code'},
            table: {title: 'Table', items: 'inserttable tableprops deletetable | cell row column'},
            tools: {title: 'Tools', items: 'restoredraft'}
        }
    });
});
