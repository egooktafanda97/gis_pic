// import geoJsonPolygonPku from "../../json/pekanbaru.json";
import geoJsonPolygonPku from "../../json/pkuGeo.json";
import { model__getData, model__getDatapekanbaru } from "../model/main_model";
import { LayerSource } from "./LayerSource";
import { func__generateGeoJsonMarker } from "./fx";
import evn from "./Event";

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
		model__getDatapekanbaru((res) => {
			layer.PolygonPku(res?.data);
		});

		const GeoJsonData = await model__getData();
		if (GeoJsonData?.data) {
			const geometri = GeoJsonData?.data?.geoJson;
			const config = GeoJsonData?.data?.setting;
			callBack({
				polygonPku: geoJsonPolygonPku,
				geometri: geometri,
				config: config,
			});

			const featureGeo = geometri?.features;
			geometri.features = [geometri.features[0]];
			await layer.CircleMarker(geometri, config);
			layer.IconMarker(geometri, config);
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