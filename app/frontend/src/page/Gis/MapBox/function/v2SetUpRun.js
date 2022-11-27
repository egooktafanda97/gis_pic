// import geoJsonPolygonPku from "../../json/pekanbaru.json";
import geoJsonPolygonPku from "../../json/pkuGeo.json";
import { model__getData, model__getDatapekanbaru } from "../model/main_model";
import { LayerSource } from "./LayerSource";
import { func__generateGeoJsonMarker } from "./fx";
import evn from "./Event";

function randomColor(brightness) {
	function randomChannel(brightness) {
		var r = 255 - brightness;
		var n = 0 | (Math.random() * r + brightness);
		var s = n.toString(16);
		return s.length == 1 ? "0" + s : s;
	}
	return (
		"#" +
		randomChannel(brightness) +
		randomChannel(brightness) +
		randomChannel(brightness)
	);
}
const colors = [
	"#1e81b0",
	"#e28743",
	"#eab676",
	"#76b5c5",
	"#21130d",
	"#873e23",
	"#abdbe3",
	"#063970",
	"#154c79",
];
const GenerateColorCircle = (arrObj, items) => {
	var g = arrObj.map((_, i) => {
		return {
			item: _,
			color: colors[i],
			data: items[_],
		};
	});
	return g;
};

export function _InitLoadMap(
	{ map, mapContainer, lat, lng, zoom },
	{ circleFilter },
	callBack
) {
	const layer = LayerSource(map);
	const e = evn(map);
	// --------------------------------------------------------------------
	layer.Rotation();
	map.on("load", async () => {
		const GeoJsonData = await model__getData();
		if (GeoJsonData?.data) {
			const geometri = GeoJsonData?.data?.geoJson;
			const jumlhItem = GeoJsonData?.data?.item;
			const marker = GeoJsonData?.data?.marker;
			var ItemKey = Object.keys(jumlhItem);
			const configureItem = GenerateColorCircle(ItemKey, jumlhItem);
			model__getDatapekanbaru((res) => {
				layer.PolygonPku(res?.data);
				callBack({
					polygonPku: res?.data,
					geometri: geometri,
					items: configureItem,
					marker: marker,
				});
			});
			const featureGeo = geometri?.features;
			geometri.features = [geometri.features[0]];
			await layer.CircleMarker(geometri, configureItem);
			layer.IconMarker(geometri, marker);
			let i = 0;
			const timer = setInterval(() => {
				if (i < featureGeo.length) {
					geometri.features.push(featureGeo[i]);
					map.getSource("marker_data").setData(geometri);
					if (map.getSource("pointer-marker")) {
						map.getSource("pointer-marker").setData(geometri);
					}
					i++;
				} else {
					window.clearInterval(timer);
				}
			}, 10);
		}
	});
}
