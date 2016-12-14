/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others' },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'about' }
	];

	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	// config.removeButtons = 'Underline,Subscript,Superscript';
	config.removeButtons = 'Cut,Copy,Paste,Anchor,PasteFromWord,Subscript,Superscript,Styles';
	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;h4;pre';

	// Simplify the dialog windows.
	// config.removeDialogTabs = 'image:advanced;link:advanced';
	config.extraPlugins = 'justify';

	// config ckfinder
	var duong_dan='/lib/';
    config.filebrowserBrowseUrl         =duong_dan+ 'ckfinder/ckfinder.html';
    config.filebrowserImageBrowseUrl  	=duong_dan+ 'ckfinder/ckfinder.html?type=Images';
    config.filebrowserUploadUrl 	=duong_dan+ 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.filebrowserImageUploadUrl 	=duong_dan+ 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
};
