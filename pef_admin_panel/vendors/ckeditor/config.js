/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config
	
	config.filebrowserBrowseUrl = '/pulari_eco_foundation/pef_admin_panel/vendors/kcfinder/browse.php?type=files';
	config.filebrowserImageBrowseUrl = '/pulari_eco_foundation/pef_admin_panel/vendors/kcfinder/browse.php?type=images';
	config.filebrowserFlashBrowseUrl = '/pulari_eco_foundation/pef_admin_panel/vendors/kcfinder/browse.php?type=flash';
	config.filebrowserUploadUrl = '/pulari_eco_foundation/pef_admin_panel/vendors/kcfinder/upload.php?type=files';	
	config.filebrowserImageUploadUrl = '/pulari_eco_foundation/pef_admin_panel/vendors/kcfinder/upload.php?type=images';
    config.filebrowserFlashUploadUrl = '/pulari_eco_foundation/pef_admin_panel/vendors/kcfinder/upload.php?type=flash';
	
	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		//{ name: 'editing',     groups: [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
		{ name: 'editing',     groups: [ 'Find','Replace','-','SelectAll','-' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'forms' },
		{ name: 'tools' },
		
		{ name: 'others' },
		'/',
		{ name: 'styles' , groups: [ 'Format' ] },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		
		//{ name: 'colors' },
		//{ name: 'about' }
	];

	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	config.removeButtons = 'Underline,Subscript,Superscript';

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';
	//config.disableNativeSpellChecker = false;
	//config.scayt_autoStartup = true;
	// Simplify the dialog windows.
	//config.removeDialogTabs = 'image:advanced;link:advanced';
	
	config.removePlugins = 'liststyle,tabletools,scayt,menubutton,contextmenu';
	//CKEDITOR.config.disableNativeSpellChecker = false;
	CKEDITOR.config.browserContextMenuOnCtrl = true;
};
