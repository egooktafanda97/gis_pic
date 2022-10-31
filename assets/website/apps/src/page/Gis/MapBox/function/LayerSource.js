import React, { useRef, useEffect, useState } from "react";
import mapboxgl from "!mapbox-gl";
import "mapbox-gl/dist/mapbox-gl.css";

export function LayerSource(maps) {
	const map = maps;
	const LayerObj = {
		PolygonPku: (geoJson) => {
			map.addSource("maine", {
				type: "geojson",
				data: geoJson,
			});

			// Add a new layer to visualize the polygon.
			map.addLayer({
				id: "maine",
				type: "fill",
				source: "maine", // reference the data source
				layout: {},
				paint: {
					"fill-color": "#34a8eb",
					"fill-opacity": 0.1,
				},
			});
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
		},
		CircleMarker: (geoJson) => {
			console.log(">", geoJson);
			map.addSource("marker_data", {
				type: "geojson",
				data: geoJson,
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
						[12, 3],
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
					"circle-stroke-color": "#595655",
					"circle-stroke-opacity": 0.5,
					"circle-radius": mode_circle_radius_config.mode_2,
					"circle-color": [
						"match",
						["get", "ethnicity"],
						"White",
						"#fbb03b",
						"Black",
						"#223b53",
						"Industri",
						"#e55e5e",
						"Asian",
						"#3bb2d0",
						/* other */ "#ccc",
					],
				},
			});
		},
		IconMarker: (geoJson, iconUrl) => {
			map.loadImage(iconUrl, (error, image) => {
				if (error) throw error;
				map.addImage("custom-marker", image);
				map.addSource("pointer-marker", {
					type: "geojson",
					data: geoJson,
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
			});
		},
		_3DModelLayer: (labelLayerId, id) => {
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
		},
		Rotation: () => {
			let isRotating = true;
			function rotateCamera(timestamp) {
				map.rotateTo((timestamp / 100) % 360, { duration: 0 });
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
		},
		LabelMode: () => {
			const layers = map.getStyle().layers;
			const labelLayerId = layers.find(
				(layer) => layer.type === "symbol" && layer.layout["text-field"]
			).id;
			return labelLayerId;
		},
	};

	return LayerObj;
}
