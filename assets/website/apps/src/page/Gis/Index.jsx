import React, { useRef, useEffect, useState } from "react";
import { MapContainer, TileLayer, useMap, Marker, Popup } from "react-leaflet";
import { useHistory } from "react-router-dom";
import axios from "axios";
import "./css/style.scss";
import "../../scss/style.scss";

import MapBox from "./MapBox/MapBox";
import Leadletmap from "./LeafletJs/Leadletmap";

export default function Index() {
	const [data, seteData] = useState([]);
	const getDataAPi = async () => {
		const getdata = await axios.get(
			`${window.base_url}Industri/getAllDataIndustri`
		);
		if (getdata?.status ?? 400 == 200) {
			seteData(getdata.data);
		}
	};
	useEffect(() => {
		getDataAPi();
	}, []);
	return (
		<div className="container-map">
			<MapBox data={data ?? []} />
			{/* <Leadletmap /> */}
		</div>
	);
}
