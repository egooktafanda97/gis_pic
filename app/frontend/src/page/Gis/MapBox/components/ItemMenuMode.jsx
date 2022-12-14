import React, { useEffect, useState } from "react";
import { FaMap } from "react-icons/fa";
import $ from "jquery";
import { addOrRemove } from "../function/fx";
import Event from "../function/Event";
import { LayerSource } from "../function/LayerSource";
import geoJsonPolygonPku from "../../json/pekanbaru.json";

const ItemMenuMode = (props) => {
	const { map, swithing, InitData } = props;
	const [trigger, setTrigger] = useState(false);
	useEffect(() => {
		if (!map.current || InitData?.geometri == undefined) return;
		// map.current?.removeSource("maine");
		$("[name='map_mode']").change(function () {
			// map.current?.removeSource("maine");
			const MainData = InitData;

			const e = Event(map.current);
			e.mapMode($(this).attr("id"), (maps) => {
				const layer = LayerSource(maps);
				layer.PolygonPku(InitData?.polygonPku);
				if (MainData?.geometri == undefined) return;

				// geometri.features = [geometri.features[0]];
				layer.CircleMarker(MainData?.geometri, MainData?.items);
				layer.IconMarker(MainData?.geometri, MainData?.marker);
				// let i = 0;
				// const timer = setInterval(() => {
				// 	if (i < featureGeo.length) {
				// 		geometri.features.push(featureGeo[i]);
				// 		map.getSource("marker_data").setData(geometri);
				// 		if (map.getSource("pointer-marker")) {
				// 			map.getSource("pointer-marker").setData(geometri);
				// 		}
				// 		i++;
				// 	} else {
				// 		window.clearInterval(timer);
				// 	}
				// }, 10);
				if (!map?.current?.getLayer("__3dMode")) {
					layer._3DModelLayer(layer.LabelMode(), "__3dMode");
				}

				e.mouseenter(["circle", "points"]);
				e.mouseleave(["circle", "points"]);
			});
		});
	}, [map, InitData]);

	return (
		<div className="ItemMenuContainer">
			<div
				className="container-main-menu"
				onClick={() => {
					setTrigger(!trigger);
				}}
			>
				<div className="IconMenuContainer dropDown">
					<FaMap size={25} />
				</div>
				<div className="LabelMenuContainer">
					<label htmlFor="">Map Mode</label>
				</div>
			</div>
			<div className={`child-main-menu ${trigger && "active"}`}>
				<div className="componentCheck LabelMenuContainer">
					<div className="radio">
						<input id="satellite-v9" name="map_mode" type="radio" />
						<label htmlFor="satellite-v9" className="radio-label">
							Satellite Mode
						</label>
					</div>
				</div>
				<div className="componentCheck LabelMenuContainer">
					<div className="radio">
						<input id="light-v10" name="map_mode" type="radio" defaultChecked />
						<label htmlFor="light-v10" className="radio-label">
							Light Mode
						</label>
					</div>
				</div>
				<div className="componentCheck LabelMenuContainer">
					<div className="radio">
						<input id="dark-v10" name="map_mode" type="radio" />
						<label htmlFor="dark-v10" className="radio-label">
							Dark Mode
						</label>
					</div>
				</div>
				<div className="componentCheck LabelMenuContainer">
					<div className="radio">
						<input id="streets-v11" name="map_mode" type="radio" />
						<label htmlFor="streets-v11" className="radio-label">
							Streets Mode
						</label>
					</div>
				</div>
				<div className="componentCheck LabelMenuContainer">
					<div className="radio">
						<input id="outdoors-v11" name="map_mode" type="radio" />
						<label htmlFor="outdoors-v11" className="radio-label">
							Outdoors Mode
						</label>
					</div>
				</div>
			</div>
		</div>
	);
};

export default ItemMenuMode;
