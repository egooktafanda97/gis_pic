import React, { useEffect, useState } from "react";
import { FaMap } from "react-icons/fa";
import $ from "jquery";
import { addOrRemove } from "../function/fx";
import Event from "../function/Event";
import { LayerSource } from "../function/LayerSource";
import geoJsonPolygonPku from "../../json/pekanbaru.json";

export default function ItemMenuInfoGraph(props) {
	const { name, item } = props;
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
					<label htmlFor="">{name}</label>
				</div>
			</div>
			<div className={`child-main-menu ${trigger && "active"}`}>
				{item?.map((x, i) => (
					<div className="componentCheck LabelMenuContainer">
						<div className="mb-1 detail-value-item">
							<div
								style={{
									display: "flex",
									justifyContent: "space-between",
									alignItems: "flex-start",
									width: "100%",
								}}
							>
								<div
									style={{
										width: "30px",
									}}
								>
									<i className="fa fa-list-alt"></i>
								</div>
								<div
									style={{
										width: "calc(100% - 30px)",
									}}
								>
									<div>
										<strong>{x?.nama?.toUpperCase() ?? ""}</strong>
									</div>
									<span>{x?.keterangan ?? ""}</span>
								</div>
							</div>
						</div>
					</div>
				))}
			</div>
		</div>
	);
}
