// import geoJsonPolygonPku from "../../json/pekanbaru.json";
import geoJsonPolygonPku from "../../json/pkuGeo.json";
import { model__getData, model__getDatapekanbaru } from "../model/main_model";
import { LayerSource } from "./LayerSource";
import { func__generateGeoJsonMarker } from "./fx";
import evn from "./Event";

const genColor = () => {
	const randomColor = Math.floor(Math.random() * 16777215).toString(16);
	return randomColor;
};

const GenerateColorCircle = (arrObj) => {
	var g = arrObj.map((_) => {
		return {
			item: _,
			color: `#${genColor()}`,
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
			const circleColors = GenerateColorCircle(ItemKey);
			model__getDatapekanbaru((res) => {
				layer.PolygonPku(res?.data);
				callBack({
					polygonPku: res?.data,
					geometri: geometri,
				});
			});
			const featureGeo = geometri?.features;
			geometri.features = [geometri.features[0]];
			await layer.CircleMarker(geometri, circleColors);
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
