// Set the default TinyMCE editor height to 200 (as it can't go lower)
acf.add_filter("wysiwyg_tinymce_settings", function (mceInit, id, field) {
	mceInit.height = 200;
	return mceInit;
});
