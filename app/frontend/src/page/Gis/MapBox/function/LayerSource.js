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
				generateId: true,
			});

			// Add a new layer to visualize the polygon.
			map.addLayer({
				id: "maine",
				type: "fill",
				source: "maine", // reference the data source
				layout: {},
				paint: {
					"fill-outline-color": "#484896",
					"fill-color": "#6e599f",
					"fill-opacity": 0.75,
				},
				filter: ["in", "class", ""],
			});
			map.addLayer(
				{
					id: "counties",
					type: "fill",
					source: "maine",
					paint: {
						"fill-outline-color": "rgba(0,0,0,0.1)",
						"fill-color": "rgba(0,0,0,0.1)",
					},
				}
				// "settlement-label"
			);

			map.addLayer({
				id: "outline",
				type: "line",
				source: "maine",
				layout: {},
				paint: {
					"line-color": "red",
					"line-width": 1,
					"line-dasharray": [2, 1],
				},
			});
		},
		CircleMarker: (geoJson, circleColors) => {
			const arr = ["match", ["get", "ethnicity"]];
			circleColors.map((x) => {
				arr.push(x?.item);
				arr.push(x?.color);
			});
			arr.push("#000");
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
					"circle-color": arr,
				},
			});
		},
		IconMarker: (geoJson, marker) => {
			if (marker.length > 0) {
				map.addSource("pointer-marker", {
					type: "geojson",
					data: geoJson,
				});
				const marker_id = ["match", ["get", "marker_id"]];
				marker.map((its, i) => {
					marker_id.push(its.id_marker);
					marker_id.push(`marker-${its.id_marker}`);
				});
				marker_id.push("-");
				marker.map((itm, i) => {
					if (itm) {
						map.loadImage(
							`${BASE_URL}assets/img/icon_map/${itm?.marker}`,
							(error, image) => {
								if (error) throw error;
								map.addImage(`marker-${itm.id_marker}`, image);
							}
						);
					}
				});
				map.addLayer({
					id: `points`,
					type: "symbol",
					source: "pointer-marker",
					layout: {
						visibility: "none",
						"icon-image": marker_id,
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
						visibility: "none",
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
