import React, { useEffect, useState } from "react";
import { FaMap } from "react-icons/fa";
import $ from "jquery";
import { addOrRemove } from "../function/fx";
import Event from "../function/Event";
import { LayerSource } from "../function/LayerSource";
import geoJsonPolygonPku from "../../json/pekanbaru.json";

export default function ItemMenuInfoGraphKecamatan(props) {
	const [trigger, setTrigger] = useState(false);
	const [main, setMain] = useState([]);
	return (
		<div className="ItemMenuContainer">
			<div
				className="container-main-menu"
				onClick={() => {
					setTrigger(!trigger);
				}}
			>
				<div className="LabelMenuContainer">
					<label htmlFor="">Kecamatan {props?.nama_kecamatan}</label>
				</div>
			</div>
			<div
				className={`child-main-menu right-modal-child ${trigger && "active"}`}
				style={{
					paddingLeft: "20px",
				}}
			>
				<div className="mb-2">
					<div className="mb-2">
						<strong>Batas Wilayah</strong>
					</div>
					<div
						dangerouslySetInnerHTML={{ __html: props?.batas_wilayah ?? "-" }}
					></div>
				</div>
				<div className="mb-2">
					<div className="mb-2">
						<strong>Letak</strong>
					</div>
					<div dangerouslySetInnerHTML={{ __html: props?.letak ?? "-" }}></div>
				</div>
				<div className="mb-2">
					<div className="mb-2">
						<strong>Geologi</strong>
					</div>
					<div
						dangerouslySetInnerHTML={{ __html: props?.geologi ?? "-" }}
					></div>
				</div>
				<div className="mb-2">
					<div className="mb-2">
						<strong>Iklim</strong>
					</div>
					<div dangerouslySetInnerHTML={{ __html: props?.iklim ?? "-" }}></div>
				</div>
			</div>
		</div>
	);
}
