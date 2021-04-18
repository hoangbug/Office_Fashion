/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function(config) {
    // Define changes to default configuration here. For example:
    // config.language = 'fr';
    // config.uiColor = '#AADC6E';
    config.filebrowserBrowseUrl = 'assets/ckf/ckfinder.html';
    config.filebrowserImageBrowseUrl = 'assets/ckf/ckfinder.html?type=Images';
    config.filebrowserFlashBrowseUrl = 'assets/ckf/ckfinder.html?type=Flash';
    config.filebrowserUploadUrl = 'assets/ckf/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.filebrowserImageUploadUrl = 'assets/ckf/core/connector/php/connector.php?command=QuickUpload&type=Images';
    config.filebrowserFlashUploadUrl = 'assets/ckf/core/connector/php/connector.php?command=QuickUpload&type=Flash';
    config.extraPlugins = 'video';
};