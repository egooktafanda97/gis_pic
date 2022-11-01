import React from "react";
import "../scss/LeftContentSidebar";
import "../../../../scss/CheckBoxStyle";
import PicChecBox from "./ItemMenuPicCheck.jsx";
import ModeMap from "./ItemMenuMode";

export default function LeftContentSidebar(props) {
	// const layerList = document.getElementById("menu");
	// 	const inputs = layerList.getElementsByTagName("input");

	// 	for (const input of inputs) {
	// 		input.onclick = (layer) => {
	// 			const layerId = layer.target.id;
	// 			map.current.setStyle("mapbox://styles/mapbox/" + layerId, {
	// 				copy: {
	// 					copySources: ["maine"],
	// 					copyLayers: ["maine"],
	// 				},
	// 			});
	// 		};
	// 	}
	return (
		<div id="menuSidebarLeft">
			<h5>Menu</h5>
			<div className="mt-3 MenuContainer">
				<PicChecBox {...props} />
				<ModeMap {...props} />
			</div>
			<hr />
		</div>
	);
}
