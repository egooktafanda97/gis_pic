export function func__generateGeoJsonMarker(formatingList) {
	const dataGeo = [];
	formatingList?.data?.map((_) => {
		if (formatingList?.condition(_) ?? false) {
			dataGeo.push({
				type: formatingList?.type(_) ?? "",
				properties: {
					ethnicity: formatingList?.ethnicity(_) ?? "",
					data: _,
				},
				geometry: {
					type: formatingList?.geometryType(_) ?? "",
					properties: formatingList?.geometryProperties(_) ?? {},
					coordinates: formatingList?.coordinatFormat(_) ?? {},
				},
			});
		}
	});

	const geoObj = {
		type: "FeatureCollection",
		name: "marker",
		crs: {
			type: "name",
			properties: { name: "urn:ogc:def:crs:OGC:1.3:CRS84" },
		},
		features: dataGeo,
	};
	return {
		geoJson: geoObj,
		features: dataGeo,
	};
}
export const addOrRemove = (array, item) => {
	const exists = array.includes(item);

	if (exists) {
		return array.filter((c) => {
			return c !== item;
		});
	} else {
		const result = array;
		result.push(item);
		return result;
	}
};
