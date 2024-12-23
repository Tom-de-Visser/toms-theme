// Set the default TinyMCE editor height to 200 (as it can't go lower).
acf.add_filter("wysiwyg_tinymce_settings", function (mceInit, id, field) {
	mceInit.height = 200;
	return mceInit;
});

// Limit the color picker to a defined palette.
acf.add_filter("color_picker_args", function (args, $field) {
	args.palettes = ["#14b8a6", "#6366f1", "#f43f5e", "#f59e0b"];
	return args;
});
