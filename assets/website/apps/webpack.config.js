const path = require("path");
const HtmlWebpackPlugin = require("html-webpack-plugin");
const Dotenv = require("dotenv-webpack");
const webpack = require("webpack");

module.exports = {
	entry: path.join(__dirname, "src", "index.js"),
	output: {
		filename: "[name].bundle.js",
		path: path.resolve(__dirname, "dist"),
	},
	module: {
		rules: [
			{
				test: /\.(js|jsx)$/,
				exclude: /(node_modules)/,
				use: {
					loader: "babel-loader",
				},
			},
			{
				test: /\.scss$/,
				use: [
					{
						loader: "style-loader",
					},
					{
						loader: "css-loader",
					},
					{
						loader: "sass-loader",
					},
				],
			},
			{
				test: /\.css$/,
				use: [
					{ loader: "style-loader" },
					{
						loader: "css-loader",
					},
				],
			},
			{
				test: /\.svg$/,
				loader: "svg-inline-loader",
			},
			{
				test: /\.(png|svg|jpg|jpeg|gif|ico)$/,
				exclude: /node_modules/,
				use: ["file-loader?name=[name].[ext]"], // ?name=[name].[ext] is only necessary to preserve the original file name
			},
			{
				test: /\.json$/,
				use: ["json-loader"],
				type: "javascript/auto",
			},
		],
	},
	plugins: [
		new HtmlWebpackPlugin({
			template: path.join(__dirname, "public", "index.html"),
			template: path.resolve(__dirname, "public", "index.html"),
			favicon: "./public/favicon.ico",
			filename: "index.html",
			manifest: "./public/manifest.json",
		}),
		new Dotenv({
			path: `./.env`,
		}),
		new webpack.ProvidePlugin({
			axios: "axios",
		}),
	],
	optimization: {
		minimize: true,
	},
	resolve: {
		extensions: [".js", ".jsx", ".scss", ".css"],
	},
	devServer: {
		historyApiFallback: true,
	},
};
