import React from "react";
import "../scss/LeftContentSidebar";
import "../../../../scss/CheckBoxStyle";
import PicChecBox from "./ItemMenuPicCheck.jsx";
import ModeMap from "./ItemMenuMode";

export default function LeftContentSidebar(props) {
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
