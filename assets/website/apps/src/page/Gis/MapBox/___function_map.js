import React, { useRef, useEffect, useState } from "react";
import mapboxgl from "!mapbox-gl";
import "mapbox-gl/dist/mapbox-gl.css";
import axios from "axios";
import "./mapStyle.scss";

import CardItemComponent from "./CardTabItem";
import $ from "jquery";
import { generateNewMarker } from "./MarkerComponent";
import Pekanbaru from "../json/pekanbaru.json";

export function __function_map({ map, mapContainer, lat, lng, zoom }, props) {
	// rotation

	let isRotating = true;

	function rotateCamera(timestamp) {
		// clamp the rotation between 0 -360 degrees
		// Divide timestamp by 100 to slow rotation to ~10 degrees / sec
		map.rotateTo((timestamp / 100) % 360, { duration: 0 });
		// Request the next frame of the animation.
		if (isRotating !== false) {
			requestAnimationFrame(rotateCamera);
		}
	}

	class CustomControl {
		onAdd(map) {
			this._map = map;
			this._container = document.createElement("button");
			this._container.className = "mapboxgl-ctrl";
			this._container.textContent = "start rotate";
			this._container.onclick = () => {
				if (this.isRotating) {
					isRotating = false;
					rotateCamera(false);
					this._container.textContent = "start rotate";
				} else {
					isRotating = true;
					rotateCamera(0);
					this._container.textContent = "stop rotate";
				}
				this.isRotating = !this.isRotating;
			};
			return this._container;
		}

		onRemove() {
			this._container.parentNode.removeChild(this._container);
			this._map = undefined;
		}
	}

	map.addControl(
		new mapboxgl.NavigationControl({
			showCompass: true,
			visualizePitch: true,
		})
	);

	map.addControl(new CustomControl());

	map.on("load", async () => {
		// Add a data source containing GeoJSON data.
		map.addSource("maine", {
			type: "geojson",
			data: Pekanbaru,
		});

		// Add a new layer to visualize the polygon.
		map.addLayer({
			id: "maine",
			type: "fill",
			source: "maine", // reference the data source
			// style: "mapbox://styles/mapbox/streets-v11",
			style: "mapbox://styles/mapbox/light-v10",
			layout: {},
			paint: {
				"fill-color": "#34a8eb",
				"fill-opacity": 0.1,
			},
		});
		// Add a black outline around the polygon.
		map.addLayer({
			id: "outline",
			type: "line",
			source: "maine",
			layout: {},
			paint: {
				"line-color": "#000",
				"line-width": 1,
				"line-dasharray": [2, 1],
			},
		});

		// //////// circle marker /////////////////////////////////////
		const getdata = await axios.get(
			`${window.base_url}Industri/getAllDataIndustri`
		);
		if (getdata?.status ?? 400 == 200) {
			const dataGeo = [];
			getdata.data.map((_) => {
				dataGeo.push({
					type: "Feature",
					properties: {
						ethnicity: "industri",
						data: _,
					},
					geometry: {
						type: "Point",
						properties: { test: "testing testing" },
						coordinates: [
							parseFloat(_?.longitude ?? 0),
							parseFloat(_?.latitude ?? 0),
						],
					},
				});
			});

			const geoObj = {
				type: "FeatureCollection",
				name: "marker",
				crs: {
					type: "name",
					properties: { name: "urn:ogc:def:crs:OGC:1.3:CRS84" },
				},
				features: dataGeo,
			};

			map.addSource("marker_data", {
				type: "geojson",
				data: geoObj,
			});
			const mode_circle_radius_config = {
				mode_1: {
					property: "sqrt",
					stops: [
						[{ zoom: 8, value: 250 }, 10],
						// [{ zoom: 8, value: 250 }, 0],
						[{ zoom: 11, value: 250 }, 20],
						// [{ zoom: 11, value: 250 }, 20],
						[{ zoom: 15, value: 250 }, 0],
						[{ zoom: 20, value: 0 }, 0],
					],
				},
				mode_2: {
					base: 50,
					stops: [
						[12, 2],
						[40, 180],
					],
				},
			};
			map.addLayer({
				id: "circle",
				type: "circle",
				source: "marker_data",
				layout: {
					// Make the layer visible by default.
					visibility: "visible",
				},
				paint: {
					"circle-radius-transition": { duration: 300 },
					"circle-color": "#F98200",
					"circle-stroke-color": "#D23B00",
					"circle-stroke-opacity": 0.5,
					"circle-radius": mode_circle_radius_config.mode_1,
					"circle-color": [
						"match",
						["get", "ethnicity"],
						"White",
						"#fbb03b",
						"Black",
						"#223b53",
						"industri",
						"#e55e5e",
						"Asian",
						"#3bb2d0",
						/* other */ "#ccc",
					],
				},
			});

			// ///////////////////////////////////
			map.loadImage(
				window.web_public + "/img/marker/markers_industri.png",
				(error, image) => {
					if (error) throw error;
					map.addImage("custom-marker", image);
					// Add a GeoJSON source with 2 points
					map.addSource("pointer-marker", {
						type: "geojson",
						data: geoObj,
					});

					// Add a symbol layer
					map.addLayer({
						id: "points",
						type: "symbol",
						source: "pointer-marker",
						layout: {
							visibility: "none",
							"icon-image": "custom-marker",
							"icon-size": {
								base: 1.75,
								stops: [[14, 0.5]],
							},
							// get the title name from the source's "title" property
							"text-field": ["get", "title"],
							"text-font": ["Open Sans Semibold", "Arial Unicode MS Bold"],
							"text-offset": [0, 1.25],
							"text-anchor": "top",
						},
					});
				}
			);
			// //////////

			// Change the cursor to a pointer when the it enters a feature in the 'circle' layer.
			map.on("mouseenter", ["circle", "points"], () => {
				map.getCanvas().style.cursor = "pointer";
			});

			// Change it back to a pointer when it leaves.
			map.on("mouseleave", ["circle", "points"], () => {
				map.getCanvas().style.cursor = "";
			});
		}
		const labelMap = LabelMode(map);
		__3Dmode(map, labelMap, "__3dMode");
	});

	// 3d

	// The 'building' layer in the Mapbox Streets
	// vector tileset contains building height data
	// from OpenStreetMap.

	// //////////////// map 3d

	// based on https://github.com/mapbox/mapbox-android-demo/issues/1190#issuecomment-550560738

	// highlight specific buildings
}

function LabelMode(map) {
	const layers = map.getStyle().layers;
	const labelLayerId = layers.find(
		(layer) => layer.type === "symbol" && layer.layout["text-field"]
	).id;
	return labelLayerId;
	// map.getStyle().layers.forEach((layer) => {
	// 	if (layer.type === "symbol" && layer.layout["text-field"]) {
	// 		map.removeLayer(layer.id);
	// 	}
	// });
}

function __3Dmode(map, labelLayerId, id) {
	map.addLayer(
		{
			id: id,
			source: "composite",
			"source-layer": "building",
			filter: ["==", "extrude", "true"],
			type: "fill-extrusion",
			minzoom: 15,
			layer: {
				visibility: "visible",
			},
			paint: {
				"fill-extrusion-color": "#aaa",

				// Use an 'interpolate' expression to
				// add a smooth transition effect to
				// the buildings as the user zooms in.
				"fill-extrusion-height": [
					"interpolate",
					["linear"],
					["zoom"],
					15,
					0,
					15.05,
					["get", "height"],
				],
				"fill-extrusion-base": [
					"interpolate",
					["linear"],
					["zoom"],
					15,
					0,
					15.05,
					["get", "min_height"],
				],
				"fill-extrusion-opacity": 0.6,
			},
		},
		labelLayerId
	);
	map.setFeatureState(
		{
			source: "composite",
			sourceLayer: "building",
			id: "241839661",
		},
		{
			highlight: "true",
		}
	);
}
