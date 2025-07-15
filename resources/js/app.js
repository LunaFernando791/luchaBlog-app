import './bootstrap';
import Alpine from 'alpinejs'
import {
    ClassicEditor,
    Essentials,
    CKFinderUploadAdapter,
    Autoformat,
    Bold,
    Italic,
    BlockQuote,
    CKBox,
    CKFinder,
    EasyImage,
    Heading,
    Image,
    ImageCaption,
    ImageStyle,
    ImageToolbar,
    ImageUpload,
    PictureEditing,
    Indent,
    Link,
    List,
    MediaEmbed,
    Paragraph,
    PasteFromOffice,
    Table,
    TableToolbar,
    TextTransformation,
    CloudServices
} from 'ckeditor5';

import 'ckeditor5/ckeditor5.css';

class Editor extends ClassicEditor {
    static builtinPlugins = [
        Essentials,
        CKFinderUploadAdapter,
        Autoformat,
        Bold,
        Italic,
        BlockQuote,
        CKBox,
        CKFinder,
        CloudServices,
        EasyImage,
        Heading,
        Image,
        ImageCaption,
        ImageStyle,
        ImageToolbar,
        ImageUpload,
        Indent,
        Link,
        List,
        MediaEmbed,
        Paragraph,
        PasteFromOffice,
        PictureEditing,
        Table,
        TableToolbar,
        TextTransformation
    ];

    static defaultConfig = {
        toolbar: {
            items: [
                'undo', 'redo',
                '|', 'heading',
                '|', 'bold', 'italic',
                '|', 'link', 'uploadImage', 'insertTable', 'blockQuote', 'mediaEmbed',
                '|', 'bulletedList', 'numberedList', 'outdent', 'indent'
            ]
        },
        image: {
            toolbar: [
                'imageStyle:inline',
                'imageStyle:block',
                'imageStyle:side',
                '|',
                'toggleImageCaption',
                'imageTextAlternative'
            ]
        },
        table: {
            contentToolbar: [
                'tableColumn',
                'tableRow',
                'mergeTableCells'
            ]
        },
        language: 'en'
    };
}

document.addEventListener('DOMContentLoaded', () => {
    ClassicEditor.create(document.querySelector('#editor'), {
        plugins: [Essentials, Bold, Italic, Paragraph],
        toolbar: ['bold', 'italic', 'undo', 'redo'],
        licenseKey: 'GPL'
    })
    .catch(error => console.error(error));
});
window.Alpine = Alpine
Alpine.start()


