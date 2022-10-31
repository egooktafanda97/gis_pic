import geoJsonPolygonPku from "../../json/pekanbaru.json";
import { model__getDataIndustri } from "../model/main_model";
import { LayerSource } from "./LayerSource";
import { func__generateGeoJsonMarker } from "./fx";
import evn from "./Event";

export function _InitLoadMap({ map, mapContainer, lat, lng, zoom }, props) {
	const layer = LayerSource(map);
	const e = evn(map);
	// --------------------------------------------------------------------
	layer.Rotation();
	map.on("load", async () => {
		layer.PolygonPku(geoJsonPolygonPku);
		const DataIndustri = await model__getDataIndustri();
		if (DataIndustri?.data) {
			const geometri = func__generateGeoJsonMarker({
				data: DataIndustri?.data ?? [],
				type: (res) => "Feature",
				ethnicity: (res) => res?.category ?? "",
				geometryType: (res) => "Point",
				geometryProperties: (res) => {
					return {
						items: res,
					};
				},
				condition: (res) =>
					res?.latitude && res?.longitude && res?.longitude != 0 ? true : false,
				coordinatFormat: (res) => [
					parseFloat(res?.longitude ?? 0),
					parseFloat(res?.latitude ?? 0),
				],
			});

			geometri.geoJson.features = [geometri.features[0]];
			layer.CircleMarker(geometri.geoJson);
			layer.IconMarker(
				geometri.geoJson,
				`${window.web_public}img/marker/markers_industri.png`
			);
			let i = 0;
			const timer = setInterval(() => {
				if (i < geometri.features.length) {
					geometri.geoJson.features.push(geometri.features[i]);
					map.getSource("marker_data").setData(geometri.geoJson);
					if (map.getSource("pointer-marker")) {
						map.getSource("pointer-marker").setData(geometri.geoJson);
					}
					i++;
				} else {
					window.clearInterval(timer);
				}
			}, 10);
			layer._3DModelLayer(layer.LabelMode(), "__3dMode");
			e.mouseenter(["circle", "points"]);
			e.mouseleave(["circle", "points"]);
		}
	});
}

// export function __function_map({ map, mapContainer, lat, lng, zoom }, props) {
// 	// rotation ===========================================================
// 	let isRotating = true;
// 	function rotateCamera(timestamp) {
// 		map.rotateTo((timestamp / 100) % 360, { duration: 0 });
// 		if (isRotating !== false) {
// 			requestAnimationFrame(rotateCamera);
// 		}
// 	}
// 	class CustomControl {
// 		onAdd(map) {
// 			this._map = map;
// 			this._container = document.createElement("button");
// 			this._container.className = "mapboxgl-ctrl";
// 			this._container.textContent = "start rotate";
// 			this._container.onclick = () => {
// 				if (this.isRotating) {
// 					isRotating = false;
// 					rotateCamera(false);
// 					this._container.textContent = "start rotate";
// 				} else {
// 					isRotating = true;
// 					rotateCamera(0);
// 					this._container.textContent = "stop rotate";
// 				}
// 				this.isRotating = !this.isRotating;
// 			};
// 			return this._container;
// 		}
// 		onRemove() {
// 			this._container.parentNode.removeChild(this._container);
// 			this._map = undefined;
// 		}
// 	}
// 	map.addControl(
// 		new mapboxgl.NavigationControl({
// 			showCompass: true,
// 			visualizePitch: true,
// 		})
// 	);
// 	map.addControl(new CustomControl());
// 	// ======================================================================

// 	map.on("load", async () => {
// 		// Add a data source containing GeoJSON data.
// 		map.addSource("maine", {
// 			type: "geojson",
// 			data: Pekanbaru,
// 		});

// 		// Add a new layer to visualize the polygon.
// 		map.addLayer({
// 			id: "maine",
// 			type: "fill",
// 			source: "maine", // reference the data source
// 			// style: "mapbox://styles/mapbox/streets-v11",
// 			style: "mapbox://styles/mapbox/light-v10",
// 			layout: {},
// 			paint: {
// 				"fill-color": "#34a8eb",
// 				"fill-opacity": 0.1,
// 			},
// 		});
// 		// Add a black outline around the polygon.
// 		map.addLayer({
// 			id: "outline",
// 			type: "line",
// 			source: "maine",
// 			layout: {},
// 			paint: {
// 				"line-color": "#000",
// 				"line-width": 1,
// 				"line-dasharray": [2, 1],
// 			},
// 		});

// 		// //////// circle marker /////////////////////////////////////
// 		const getdata = await axios.get(
// 			`${window.base_url}Industri/getAllDataIndustri`
// 		);
// 		if (getdata?.status ?? 400 == 200) {
// 			const dataGeo = [];
// 			getdata.data.map((_) => {
// 				if (!isNaN(parseFloat(_.longitude)) && _.longitude) {
// 					dataGeo.push({
// 						type: "Feature",
// 						properties: {
// 							ethnicity: "industri",
// 							data: _,
// 						},
// 						geometry: {
// 							type: "Point",
// 							properties: { test: "testing testing" },
// 							coordinates: [
// 								parseFloat(_?.longitude ?? 0),
// 								parseFloat(_?.latitude ?? 0),
// 							],
// 						},
// 					});
// 				}
// 			});

// 			const geoObj = {
// 				type: "FeatureCollection",
// 				name: "marker",
// 				crs: {
// 					type: "name",
// 					properties: { name: "urn:ogc:def:crs:OGC:1.3:CRS84" },
// 				},
// 				features: dataGeo,
// 			};

// 			geoObj.features = [dataGeo[0]];

// 			map.addSource("marker_data", {
// 				type: "geojson",
// 				data: geoObj,
// 			});
// 			const mode_circle_radius_config = {
// 				mode_1: {
// 					property: "sqrt",
// 					stops: [
// 						[{ zoom: 8, value: 250 }, 10],
// 						// [{ zoom: 8, value: 250 }, 0],
// 						[{ zoom: 11, value: 250 }, 20],
// 						// [{ zoom: 11, value: 250 }, 20],
// 						[{ zoom: 15, value: 250 }, 0],
// 						[{ zoom: 20, value: 0 }, 0],
// 					],
// 				},
// 				mode_2: {
// 					base: 50,
// 					stops: [
// 						[12, 3],
// 						[40, 180],
// 					],
// 				},
// 			};
// 			map.addLayer({
// 				id: "circle",
// 				type: "circle",
// 				source: "marker_data",
// 				layout: {
// 					// Make the layer visible by default.
// 					visibility: "visible",
// 				},
// 				paint: {
// 					"circle-radius-transition": { duration: 300 },
// 					"circle-color": "#F98200",
// 					"circle-stroke-color": "#595655",
// 					"circle-stroke-opacity": 0.5,
// 					"circle-radius": mode_circle_radius_config.mode_2,
// 					"circle-color": [
// 						"match",
// 						["get", "ethnicity"],
// 						"White",
// 						"#fbb03b",
// 						"Black",
// 						"#223b53",
// 						"industri",
// 						"#e55e5e",
// 						"Asian",
// 						"#3bb2d0",
// 						/* other */ "#ccc",
// 					],
// 				},
// 			});

// 			// ///////////////////////////////////
// 			map.loadImage(
// 				window.web_public + "/img/marker/markers_industri.png",
// 				(error, image) => {
// 					if (error) throw error;
// 					map.addImage("custom-marker", image);
// 					// Add a GeoJSON source with 2 points
// 					map.addSource("pointer-marker", {
// 						type: "geojson",
// 						data: geoObj,
// 					});

// 					// Add a symbol layer
// 					map.addLayer({
// 						id: "points",
// 						type: "symbol",
// 						source: "pointer-marker",
// 						layout: {
// 							visibility: "none",
// 							"icon-image": "custom-marker",
// 							"icon-size": {
// 								base: 1.75,
// 								stops: [[14, 0.5]],
// 							},
// 							// get the title name from the source's "title" property
// 							"text-field": ["get", "title"],
// 							"text-font": ["Open Sans Semibold", "Arial Unicode MS Bold"],
// 							"text-offset": [0, 1.25],
// 							"text-anchor": "top",
// 						},
// 					});
// 				}
// 			);
// 			let i = 0;
// 			const timer = setInterval(() => {
// 				if (i < dataGeo.length) {
// 					geoObj.features.push(dataGeo[i]);
// 					map.getSource("marker_data").setData(geoObj);
// 					if (map.getSource("pointer-marker")) {
// 						map.getSource("pointer-marker").setData(geoObj);
// 					}
// 					i++;
// 				} else {
// 					window.clearInterval(timer);
// 				}
// 			}, 10);
// 			// //////////

// 			// Change the cursor to a pointer when the it enters a feature in the 'circle' layer.
// 			map.on("mouseenter", ["circle", "points"], () => {
// 				map.getCanvas().style.cursor = "pointer";
// 			});

// 			// Change it back to a pointer when it leaves.
// 			map.on("mouseleave", ["circle", "points"], () => {
// 				map.getCanvas().style.cursor = "";
// 			});
// 		}
// 		const labelMap = LabelMode(map);
// 		__3Dmode(map, labelMap, "__3dMode");

// 		const layerList = document.getElementById("menu");
// 		const inputs = layerList.getElementsByTagName("input");

// 		for (const input of inputs) {
// 			input.onclick = (layer) => {
// 				const layerId = layer.target.id;
// 				map.setStyle("mapbox://styles/mapbox/" + layerId);
// 			};
// 		}
// 	});

// 	// 3d

// 	// The 'building' layer in the Mapbox Streets
// 	// vector tileset contains building height data
// 	// from OpenStreetMap.

// 	// //////////////// map 3d

// 	// based on https://github.com/mapbox/mapbox-android-demo/issues/1190#issuecomment-550560738

// 	// highlight specific buildings
// }

// function LabelMode(map) {
// 	const layers = map.getStyle().layers;
// 	const labelLayerId = layers.find(
// 		(layer) => layer.type === "symbol" && layer.layout["text-field"]
// 	).id;
// 	return labelLayerId;
// 	// map.getStyle().layers.forEach((layer) => {
// 	// 	if (layer.type === "symbol" && layer.layout["text-field"]) {
// 	// 		map.removeLayer(layer.id);
// 	// 	}
// 	// });
// }

// function __3Dmode(map, labelLayerId, id) {
// 	map.addLayer(
// 		{
// 			id: id,
// 			source: "composite",
// 			"source-layer": "building",
// 			filter: ["==", "extrude", "true"],
// 			type: "fill-extrusion",
// 			minzoom: 15,
// 			layer: {
// 				visibility: "visible",
// 			},
// 			paint: {
// 				"fill-extrusion-color": "#aaa",

// 				// Use an 'interpolate' expression to
// 				// add a smooth transition effect to
// 				// the buildings as the user zooms in.
// 				"fill-extrusion-height": [
// 					"interpolate",
// 					["linear"],
// 					["zoom"],
// 					15,
// 					0,
// 					15.05,
// 					["get", "height"],
// 				],
// 				"fill-extrusion-base": [
// 					"interpolate",
// 					["linear"],
// 					["zoom"],
// 					15,
// 					0,
// 					15.05,
// 					["get", "min_height"],
// 				],
// 				"fill-extrusion-opacity": 0.6,
// 			},
// 		},
// 		labelLayerId
// 	);
// 	map.setFeatureState(
// 		{
// 			source: "composite",
// 			sourceLayer: "building",
// 			id: "241839661",
// 		},
// 		{
// 			highlight: "true",
// 		}
// 	);
// }

export const buildingDataDetail = (data) => {
	return [
		{
			label: ("NAMA " + data?.dataSektor ?? "")?.toUpperCase() ?? "",
			value: `${data?.nama_industri ?? "-"}`,
		},
		{
			label: ("Jenis " + data?.dataSektor ?? "")?.toUpperCase() ?? "",
			value: `${data?.dataSektor ?? "-"}`,
		},
		{
			label: ("Kategori " + data?.dataSektor ?? "")?.toUpperCase() ?? "",
			value: `${data?.pic_category_name ?? "-"}`,
		},
		{
			label: ("Tipe " + data?.dataSektor ?? "")?.toUpperCase() ?? "",
			value: `${data?.pic_industry_type_name ?? "-"}`,
		},
		{
			label: ("Sektor Utama " + data?.dataSektor ?? "")?.toUpperCase() ?? "",
			value: `${data?.nama_sektor_utama_industri ?? "-"}`,
		},
		{
			label: ("Sub Sektor " + data?.dataSektor ?? "")?.toUpperCase() ?? "",
			value: `${data?.nama_subsektor_industri ?? "-"}`,
		},
		{
			label: ("Nama Pemilik " + data?.dataSektor ?? "")?.toUpperCase() ?? "",
			value: `${data?.nama_pemilik_industri ?? "-"}`,
		},
		{
			label: ("Perizinan " + data?.dataSektor ?? "")?.toUpperCase() ?? "",
			value: `${data?.perizinan_industri ?? "-"}`,
		},
		{
			label: "Besar Model "?.toUpperCase() ?? "",
			value: `${data?.besar_modal_industri ?? "-"}`,
		},
		{
			label: ("Alamat " + data?.dataSektor ?? "")?.toUpperCase() ?? "",
			value: `${data?.alamat_industri ?? "-"}`,
		},
		{
			label: "Telepon "?.toUpperCase() ?? "",
			value: `${data?.telp_pemilik_industri ?? ""}`,
		},
	];
};
