import React, { useRef, useEffect, useState } from "react";
import mapboxgl from "mapbox-gl";
import "mapbox-gl/dist/mapbox-gl.css";
import axios from "axios";
import "./mapStyle.scss";

import CardItemComponent from "./CardTabItem";
import $ from "jquery";
import { generateNewMarker } from "./MarkerComponent";
import Pekanbaru from "../json/pekanbaru.json";
import { __function_map } from "./___function_map";

mapboxgl.accessToken =
	"pk.eyJ1IjoiZWdvb2t0YWZhbmRhOTciLCJhIjoiY2pyN2tobWJuMGZpaDN5cXE3NTdydm8zbiJ9.iLZFxTrH353ju9RuZzX5Jw";

export default function MapBox(props) {
	const mapContainer = useRef(null);
	const map = useRef(null);
	const [lng, setLng] = useState(101.4451276040001);
	const [lat, setLat] = useState(0.532236798000042);
	const [zoom, setZoom] = useState(10.5);
	const [sidebar, setSidebar] = useState(false);
	const [dataSelect, setDataSelect] = useState({});
	useEffect(() => {
		if (map.current) return;
		map.current = new mapboxgl.Map({
			container: mapContainer.current,
			// style: "mapbox://styles/mapbox/streets-v11",
			// style: "mapbox://styles/mapbox/satellite-v9",
			style: "mapbox://styles/mapbox/light-v10",
			center: [lng, lat],
			zoom: zoom,
			pitch: 45,
			bearing: -17.6,
			antialias: true,
		});
		__function_map({
			map: map.current,
			mapContainer: mapContainer,
			lat: lat,
			lng: lng,
			zoom: zoom,
		});
		EventMapBox();
	});

	const EventMapBox = () => {
		map.current.on("click", ["circle", "points"], (e) => {
			// var features = map.current.queryRenderedFeatures(e);
			const zoom_var = map.current.getZoom();
			let Z = 15;
			if (zoom_var < 16) {
				Z = map.current.getZoom() < 15 ? 15 : zoom_var + 2;
				map.current.flyTo({
					center: e.features[0].geometry.coordinates,
					zoom: Z,
				});
			} else {
				const dataClick = e?.features[0]?.properties?.data ?? "[]";
				const minData = JSON.parse(dataClick);
				minData.dataSektor = e?.features[0]?.properties?.ethnicity ?? "";
				setDataSelect(minData);
			}
		});

		let lastZoom = map.current.getZoom();

		map.current.on("zoom", () => {
			const currentZoom = map.current.getZoom();
			if (currentZoom > lastZoom) {
				if (currentZoom >= 14.8) {
					map.current.setLayoutProperty("circle", "visibility", "none");
					map.current.setLayoutProperty("points", "visibility", "visible");
					map.current.setPaintProperty("maine", "fill-opacity", 0);
				}
			} else {
				if (currentZoom < 14.8) {
					map.current.setLayoutProperty("circle", "visibility", "visible");
					map.current.setLayoutProperty("points", "visibility", "none");
					map.current.setPaintProperty("maine", "fill-opacity", 0.1);
				}
			}
			lastZoom = currentZoom;
		});
	};

	return (
		<div
			className="root-map"
			style={{
				width: "100%",
				height: "100%",
			}}
		>
			<div ref={mapContainer} className="map-container right-sidebar-active" />
			<button className="btn-sidebar" onClick={() => setSidebar(!sidebar)}>
				<i className="fa fa-bars"></i>
			</button>
			<div className={`sidebar-map ${sidebar ? "active" : ""}`}></div>
			{Object.keys(dataSelect) != 0 && (
				<div className={`sidebar-map-right active`}>
					<CardItemComponent data={dataSelect} />
				</div>
			)}
		</div>
	);
}
