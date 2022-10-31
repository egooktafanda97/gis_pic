import axios from "axios";

export const model__getDataIndustri = () => {
	const getdata = axios
		.get(`${window.base_url}Industri/getAllDataIndustri`)
		.catch((err) => {
			console.log(err.reponse);
		});
	return getdata;
};

export const package_data_active = [
	{
		name: "Industri",
		label: "Industri",
		getFunction: model__getDataIndustri,
	},
];
