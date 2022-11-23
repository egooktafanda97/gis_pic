import React, { useRef, useEffect, useState } from "react";
import mapboxgl from "mapbox-gl";
import { useHistory } from "react-router-dom";
import "mapbox-gl/dist/mapbox-gl.css";
import { useDispatch, useSelector } from "react-redux";
import { AiOutlineArrowLeft } from "react-icons/ai";
// =======================================================
// function
import { _InitLoadMap } from "./function/v2SetUpRun";
import { package_data_active } from "./model/main_model";
// Componsnet
import CardItemComponent from "./components/CardTabItem";
import LeftSidebarComponent from "./components/LeftContentSidebar";
import CardInfoWindow from "./components/CardInfoWindow";
import InfoGrafis from "./components/InfoGrafis";
// style
import "./scss/mapStyle.scss";
// =======================================================
// key----------------------------------------------------
mapboxgl.accessToken = process.env.MAPS_MAPBOX_KEY;
// -------------------------------------------------------
export default function MpBoxv2() {
	const mapContainer = useRef(null);
	let history = useHistory();
	const map = useRef(null);
	const getRedux = useSelector((state) => state);
	const dispatch = useDispatch();
	const [lng, setLng] = useState(101.4451276040001);
	const [lat, setLat] = useState(0.532236798000042);
	const [zoom, setZoom] = useState(11);
	const [sidebar, setSidebar] = useState(false);
	const [dataSelect, setDataSelect] = useState({});
	const [CollBackInit, setCollBackInit] = useState({});
	const [kodeKec, setKodeKec] = useState(null);
	const [itemSideRight, setItemSideRight] = useState(() => {});
	var popups = new mapboxgl.Popup({
		closeButton: false,
	});
	useEffect(() => {
		if (getRedux) {
			if (map.current) return;
			dispatch({
				type: "SEKTOR_ACTIVE",
				payload: package_data_active.map((i) => {
					return i.name;
				}),
			});
			map.current = new mapboxgl.Map({
				container: mapContainer.current,
				style: "mapbox://styles/mapbox/light-v10",
				center: [lng, lat],
				zoom: zoom,
				pitch: 45,
				bearing: -17.6,
				antialias: true,
			});
			_InitLoadMap(
				{ map: map.current },
				{
					circleFilter: package_data_active.map((i) => {
						return i.name;
					}),
				},
				(obj) => {
					setCollBackInit(obj);
				}
			);
			Events();
			EventMapBox();
		}
	});

	const Events = () => {
		map.current.on("mousemove", "counties", (e) => {
			map.current.getCanvas().style.cursor = "";
			map.current.setFilter("maine", ["in", "class", ""]);

			map.current.getCanvas().style.cursor = "pointer";
			const feature = e.features[0];
			map.current.setFilter("maine", ["in", "class", feature.properties.class]);

			// ////
			popups
				.setLngLat(e.lngLat)
				.setText(feature.properties?.name)
				.addTo(map.current);
		});
		map.current.on("click", "counties", (e) => {
			const feature = e.features[0];
			setKodeKec(feature.properties.class);
			// dispatch({
			// 	type: "SIDEBAR",
			// 	payload: {
			// 		sid: "right",
			// 		sid_right: true,
			// 	},
			// });
			// setItemSideRight(<InfoGrafis kode={feature.properties.class} />);
			// var popups = new mapboxgl.Popup();
			console.log(e.clickOnLayer);
			popups
				.setLngLat(e.lngLat)
				.setHTML(
					/*html*/ `
			<div class="box-popup">
				<div class="box-container-popup">
					<div class="header-popup">
						<strong>Kecamatan</strong>
						<i class="fa fa-times"></i>
					</div>
					<hr />
					<div class="items-popup">
						<span>key</span>
						<span>value</span>
					</div>
					<div class="items-popup">
						<span>key</span>
						<span>value</span>
					</div>
				</div>
			</div>
			`
				)
				.addTo(map.current);
		});
		map.current.on("mouseleave", "counties", function () {
			map.current.getCanvas().style.cursor = "";
			popups.remove();
		});
		map.current.on("mousemove", ["circle", "points"], (e) => {
			map.current.getCanvas().style.cursor = "";
			popups.remove();
		});
		// map.current.on("mouseleave", "counties", () => {
		// 	map.current.getCanvas().style.cursor = "";
		// 	map.current.setFilter("maine", ["in", "class", ""]);

		// 	dispatch({
		// 		type: "SIDEBAR",
		// 		payload: {
		// 			sid: "right",
		// 			sid_right: false,
		// 		},
		// 	});
		// });
	};

	const EventMapBox = () => {
		map.current.on("click", ["circle", "points"], (e) => {
			popups.remove();
			const zoom_var = map.current.getZoom();
			let Z = 15;

			if (zoom_var < 16) {
				// if (false) {
				Z = map.current.getZoom() < 15 ? 15 : zoom_var + 2;
				map.current.flyTo({
					center: e.features[0].geometry.coordinates,
					zoom: Z,
				});
			} else {
				const dataClick = e?.features[0]?.properties ?? "[]";
				const minData = JSON.parse(dataClick.data);
				const result = JSON.parse(dataClick.items);
				result.dataSektor = e?.features[0]?.properties?.ethnicity ?? "";
				setDataSelect({
					detail: minData,
					result: result,
				});

				dispatch({
					type: "SIDEBAR",
					payload: {
						sid: "right",
						sid_right: true,
					},
				});
				window.setTimeout(() => map.current.resize(), 500);

				const coordinates = e.features[0].geometry.coordinates.slice();
				const description = e.features[0].properties;

				while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
					coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
				}

				new mapboxgl.Popup()
					.setLngLat(coordinates)
					.setHTML(
						/*html*/ `
					<strong style="font-size:.8em; margin:3px;">
						${JSON.parse(description?.items ?? "[]")?.header?.nama}
					</strong>
					`
					)
					.addTo(map.current);

				setItemSideRight(
					<CardItemComponent
						data={{
							detail: minData,
							result: result,
						}}
					/>
				);
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
					map.current.setPaintProperty("maine", "fill-opacity", 0.75);
				}
			}
			lastZoom = currentZoom;
		});
		map.current.on("click", (e) => {
			setSidebar(false);
		});
		// map.current.on("contextmenu", "maine", function (e) {
		// 	var popups = new mapboxgl.Popup();
		// 	popups.setLngLat(e.lngLat).setHTML("ok").addTo(map.current);
		// });
	};

	useEffect(() => {
		map.current.resize();
	}, [getRedux]);

	const swithing = (val) => {
		console.log(val);
		map.current.setFilter("circle", [
			"match",
			["get", "ethnicity"],
			val.length > 0 ? val : [""],
			true,
			false,
		]);
	};

	return (
		<div
			className="root-map"
			style={{
				width: "100%",
				height: "100%",
			}}
		>
			<div
				ref={mapContainer}
				className={`map-container ${
					getRedux?.sid_map_right_sidebar ? "right-sidebar-active" : ""
				}`}
			/>
			{/* <button className="btn-sidebar" onClick={() => setSidebar(!sidebar)}>
        <i className="fa fa-bars"></i>
    </button> */}

			<div className={`sidebar-map ${sidebar ? "active" : ""}`}>
				<div className="top-sid">
					<div className="container-top-sid">
						<div
							style={{
								display: "flex",
								alignItems: "center",
								flexDirection: "row",
							}}
						>
							<div
								className="text-center"
								style={{ width: "50px" }}
								onClick={() => {
									history.push("/home");
								}}
							>
								<AiOutlineArrowLeft size={25} />
							</div>
							<h5 style={{ margin: "0" }}>GIS</h5>
						</div>
						<button
							className="btn-sidebar-close"
							onClick={() => setSidebar(!sidebar)}
						>
							<i className="fa fa-bars"></i>
						</button>
					</div>
				</div>
				<div className="content-left-sidebar">
					<LeftSidebarComponent
						swithing={swithing}
						map={map}
						InitData={CollBackInit}
					/>
				</div>
			</div>
			{/* {Object.keys(dataSelect) != 0 && ( */}
			<div
				className={`sidebar-map-right ${
					getRedux?.sid_map_right_sidebar ? "active" : ""
				}`}
			>
				{itemSideRight}
			</div>
			{/* )} */}

			{/* <div className="InfoWindowMulty">
                <CardInfoWindow />
            </div> */}
		</div>
	);
}
