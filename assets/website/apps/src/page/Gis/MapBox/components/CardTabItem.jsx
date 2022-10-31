import React, { useRef, useEffect, useState } from "react";
import "../scss/CardTabItem.scss";
import DetilClick from "./DetailItem";
import { Tab, Tabs, TabList, TabPanel } from "react-tabs";
import "react-tabs/style/react-tabs.css";
export default function CardTabItem(props) {
	const [data, setData] = useState({});
	useEffect(() => {
		if (props.data != undefined && props.data != "") {
			setData(props.data);
		}
	}, [props.data]);
	return (
		<div className="cardItem-container pt-3">
			<DetilClick data={data} />
		</div>
	);
}
