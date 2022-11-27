import React, { lazy } from "react";
// pages ///////////////////////////////
// /////////////////////////////////////
import Layout from "../layout/layout";

export default [
	{
		exact: true,
		name: "home",
		path: ["/home"],
		label: "Home",
		Component: lazy(() => import("../page/Home/Index")),
	},
	{
		exact: true,
		name: "gis",
		path: ["/gis"],
		label: "Gis",
		Component: lazy(() => import("../page/Gis/Index")),
	},
	{
		exact: true,
		name: "master",
		path: ["/master"],
		label: "Master Data",
		Component: lazy(() => import("../page/Master/Index")),
	},
];
