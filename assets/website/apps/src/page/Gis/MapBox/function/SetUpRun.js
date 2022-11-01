import geoJsonPolygonPku from "../../json/pekanbaru.json";
import { model__getDataIndustri } from "../model/main_model";
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
		layer.PolygonPku(geoJsonPolygonPku);
		const DataIndustri = await model__getDataIndustri();
		if (DataIndustri?.data?.result) {
			const geometri = func__generateGeoJsonMarker({
				data: DataIndustri?.data?.result ?? [],
				type: (res) => "Feature",
				ethnicity: (res) => res?.category ?? "",
				geometryType: (res) => "Point",
				geometryProperties: (res) => {
					return {
						items: res,
					};
				},
				condition: (res) =>
					res?.latitude && res?.longitude && res?.longitude != 0 ? true : false,
				coordinatFormat: (res) => [
					parseFloat(res?.longitude ?? 0),
					parseFloat(res?.latitude ?? 0),
				],
			});
			callBack({
				polygonPku: geoJsonPolygonPku,
				geometri: geometri,
			});
			geometri.geoJson.features = [geometri.features[0]];
			layer.CircleMarker(geometri.geoJson);
			layer.IconMarker(
				geometri.geoJson,
				`${window.web_public}img/marker/markers_industri.png`
			);
			let i = 0;
			const timer = setInterval(() => {
				if (i < geometri.features.length) {
					geometri.geoJson.features.push(geometri.features[i]);
					map.getSource("marker_data").setData(geometri.geoJson);
					if (map.getSource("pointer-marker")) {
						map.getSource("pointer-marker").setData(geometri.geoJson);
					}
					i++;
				} else {
					window.clearInterval(timer);
				}
			}, 10);
			layer._3DModelLayer(layer.LabelMode(), "__3dMode");
			e.mouseenter(["circle", "points"]);
			e.mouseleave(["circle", "points"]);

			map.setFilter("circle", [
				"match",
				["get", "ethnicity"],
				circleFilter,
				true,
				false,
			]);
		}
	});
}
