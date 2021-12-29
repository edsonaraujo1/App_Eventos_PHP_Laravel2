/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	
	// %REMOVE_START%
	// The configuration options below are needed when running CKEditor from source files.
	config.plugins = 'toolbar,clipboard,panelbutton,panel,floatpanel,colorbutton,colordialog,templates,menu,contextmenu,copyformatting,resize,elementspath,enterkey,entities,popup,filetools,filebrowser,find,fakeobjects,floatingspace,listblock,richcombo,font,format,horizontalrule,htmlwriter,wysiwygarea,image,indent,indentblock,indentlist,smiley,justify,menubutton,link,list,liststyle,magicline,pagebreak,pastetext,pastefromword,preview,print,removeformat,save,selectall,showblocks,showborders,sourcearea,specialchar,scayt,stylescombo,tab,table,tabletools,tableselection,undo,lineutils,widgetselection,widget,notificationaggregator,uploadwidget,uploadimage,wsc';
	config.skin = 'moono-lisa';
	// %REMOVE_END%
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
    //config.uiColor = '#AADC6E';
	var pret_1 = 'http://127.0.0.1:8000';
    // Define changes to default configuration here.
    // For the complete reference:
	config.syntaxhighlight_lang = 'PHP';
	config.syntaxhighlight_hideControls = true;
	config.languages = 'vi';
	config.filebrowserBrowseUrl = pret_1 + '/js/ckfinder/ckfinder.html';
	config.filebrowserImageBrowseUrl = pret_1 + '/js/ckfinder/ckfinder.html?Types=Images';
	config.filebrowserFlashBrowseUrl = pret_1 + '/js/ckfinder/ckfinder.html?Types=Flash';
	config.filebrowserUploadUrl = pret_1 + '/js/ckfinder/core/connector/php/vendor/connector.php?command=QuickUpload&type=File';
	config.filebrowserImageUploadUrl = pret_1 + '/js/Data';
	config.filebrowserFlashUploadUrl = pret_1 + '/js/ckfinder/core/connector/php/vendor/connector.php?command=QuickUpload&type=Flash';

	CKFinder.setupCKEditor(null, pret_1 + '/js/ckfinder/');

};
