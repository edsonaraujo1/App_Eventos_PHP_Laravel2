/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function (config) {

    // %REMOVE_START%
    // The configuration options below are needed when running CKEditor from source files.
    config.plugins = 'about';
    config.skin = 'moono-lisa';
    // %REMOVE_END%
    // Define changes to default configuration here. For example:
    // config.language = 'fr';
    //config.uiColor = '#AADC6E';
    var pret_1 = $('#URLi0').val();
    // Define changes to default configuration here.
    // For the complete reference:
    config.syntaxhighlight_lang = 'csharp';
    config.syntaxhighlight_hideControls = true;
    config.languages = 'vi';
    config.filebrowserBrowseUrl = pret_1 + '/Content/ckfinder/ckfinder.html';
    config.filebrowserImageBrowseUrl = pret_1 + '/Content/ckfinder/ckfinder.html?Types=Images';
    config.filebrowserFlashBrowseUrl = pret_1 + '/Content/ckfinder/ckfinder.html?Types=Flash';
    config.filebrowserUploadUrl = pret_1 + '/Content/ckfinder/core/connector/aspx/connector.aspx?command=QuickUpload&type=File';
    config.filebrowserImageUploadUrl = pret_1 + '/Content/Data';
    config.filebrowserFlashUploadUrl = pret_1 + '/Content/ckfinder/core/connector/aspx/connector.aspx?command=QuickUpload&type=Flash';

    CKFinder.setupCKEditor(null, pret_1 + '/Content/ckfinder/');

};
