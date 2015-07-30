/*
 Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config )
{
    config.removePlugins = 'backup,magicline,divarea';
    config.extraPlugins = 'codemirror';
    config.skin = 'moonocolor';

    config.uiColor = '#F5F5F5';
    config.language = 'ru';
    config.filebrowserImageUploadUrl = '/uploader/?debug_mode=off&ajax=on';
    config.bodyClass = 'wysiwyg content_text';
    config.contentsCss = ["/source/css/content.css","https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"];
    config.autoGrow_maxHeight = 500;
    config.autoGrow_minHeight = 166;
    config.autoGrow_onStartup = true;
    config.enterMode = CKEDITOR.ENTER_DIV;
//    config.allowedContent = true;
//    config.protectedSource.push(/<(script).*>.*<\/script>/ig);
//    config.protectedSource.push(/<(code).*>.*<\/code>/ig);
//    config.protectedSource.push(/<(map).*>.*<\/map>/ig);
//    config.protectedSource.push(/<(area).*>/ig);
//    config.protectedSource.push(/<(form).*>.*<\/form>/ig);
  //  config.entities = false;
   // config.basicEntities = false;

    config.codeSnippet_languages = {
        javascript: 'JavaScript',
        html: 'Html'
    };

    config.toolbar_Basic =
        [
            ['Cut','Copy','Paste','PasteText','PasteFromWord'],
            ['Find','Replace','-','SelectAll','RemoveFormat'],
            ['Image','MediaEmbed','Table','HorizontalRule','SpecialChar'],
            ['Format','TextColor','Blockquote'],
            ['Maximize'],
            '/',
            ['Undo','Redo'],
            ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
            ['NumberedList','BulletedList','-','Outdent','Indent'],
            ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
            ['Link','Unlink','Anchor'],
        ];

    config.toolbar_Forum =
        [
            ['SelectAll','RemoveFormat'],
            ['Image','MediaEmbed','Table'],
            ['Blockquote'],
            ['Undo','Redo'],
            ['Bold','Italic','Underline','Strike'],
            ['NumberedList','BulletedList','-','Outdent','Indent'],
            ['Link','Unlink'],
        ];
};

CKEDITOR.dtd.$removeEmpty['i'] = false;
CKEDITOR.dtd.$removeEmpty['span'] = false;