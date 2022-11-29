const path = require("path");
const HtmlWebpackPlugin = require("html-webpack-plugin");
const Dotenv = require("dotenv-webpack");
const webpack = require("webpack");
var WebpackNotifierPlugin = require("webpack-notifier");
const fx = require("./src/function/__fx");

const config = require("../config/env.json");

module.exports = (env) => {
	const conf = env.prod ? config?.PRODUC : config?.DEVELOPMENT;

	return {
		entry: path.join(__dirname, "src", "index.js"),
		resolve: {
			extensions: [".js", ".jsx", ".scss", ".css"],
		},
		output: {
			filename: "[name].bundle.js",
			path: path.resolve(__dirname, "../public/bundle"),
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
					test: /\.(png|jpe?g|gif)$/i,
					use: [
						{
							loader: "file-loader",
						},
					],
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
			new WebpackNotifierPlugin(),
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
			new webpack.DefinePlugin({
				CONFIG: JSON.stringify(conf?.WEBSITE),
				BASE_URL: JSON.stringify(conf?.BASE_URL),
				BASE_API_PUBLIC: JSON.stringify(conf?.BASE_API_PUBLIC),
				API: JSON.stringify(conf?.BASE_API),
				MODE: env,
				fx: fx,
			}),
			new webpack.ProvidePlugin({
				axios: "axios",
			}),
		],
		optimization: {
			minimize: true,
		},

		devServer: {
			historyApiFallback: true,
		},
	};
};
