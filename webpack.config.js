const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

module.exports = {
	entry: {
		main: "./source/main.js",
		backend: "./source/backend.js",
		tinymce: "./source/scripts/tinymce.js",
	},
	output: {
		path: path.resolve(__dirname, "dist"),
		filename: "[name].js",
		clean: true,
	},
	plugins: [
		new MiniCssExtractPlugin({
			filename: "main.css",
		}),
	],
	module: {
		rules: [
			{
				test: /\.css$/,
				use: [
					MiniCssExtractPlugin.loader,
					"css-loader",
					{
						loader: "postcss-loader",
						options: {
							postcssOptions: {
								plugins: [
									require("tailwindcss"),
									require("autoprefixer"),
								],
							},
						},
					},
				],
			},
		],
	},
};
