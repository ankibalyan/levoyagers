/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	config.protectedSource.push(/<\?[\s\S]*?\?>/g); // PHP Code
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	config.uiColor = '#A0B0F0';
	
	config.toolbar="cplay";
	config.toolbar_cplay=[
		['Maximize','Source','Cut','Copy','Paste','PasteText'],
		['Undo','Redo','RemoveFormat','Bold','Italic','Underline','Subscript','Superscript'],
		['NumberedList','BulletedList','Outdent','Indent'],
		['JustifyLeft','JustifyCenter','JustifyRight'],
		['TextColor','BGColor'],
		['Link','Unlink','Anchor','Image','Flash','jwplayer'],
		['Table','SpecialChar','HorizontalRule'],
		['Styles','Format','Font','FontSize']
	];
};
