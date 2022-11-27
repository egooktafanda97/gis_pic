import React, { useRef, useEffect, useState } from "react";
import { MapContainer, TileLayer, useMap, Marker, Popup } from "react-leaflet";
import { useHistory } from "react-router-dom";
import axios from "axios";
import "./css/style.scss";
import "../../scss/style.scss";

// import MapBox from "./MapBox/MapBox";
import MapBoxV2 from "./MapBox/MpBoxv2";
// import Leadletmap from "./LeafletJs/Leadletmap";

export default function Index() {
	return (
		<div className="container-map">
			<MapBoxV2 />
			{/* <MapBox /> */}
			{/* <Leadletmap /> */}
		</div>
	);
}
