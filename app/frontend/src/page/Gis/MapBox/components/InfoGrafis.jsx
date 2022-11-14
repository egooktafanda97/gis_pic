import React, { useEffect, useState } from "react";
import { FaMap } from "react-icons/fa";
import { getInfoGrafis } from "../model/main_model";
import ItemInfoMenuGrap from "./ItemMenuInfoGraph";
import { useDispatch, useSelector } from "react-redux";
const InfoGrafis = (props) => {
	const { kode } = props;
	const getRedux = useSelector((state) => state);
	const dispatch = useDispatch();

	const [trigger, setTrigger] = useState(false);
	const [info, setInfo] = useState([]);
	useEffect(() => {
		if (kode != null) {
			getData(kode);
		}
	}, [kode]);
	const getData = async (kode) => {
		const d = await getInfoGrafis(kode);
		const arr = [];
		Object.keys(d?.data).forEach((key) => {
			arr.push({
				name: key,
				item: d?.data[key],
			});
		});
		setInfo(arr);
	};
	return (
		<div className="tabs">
			<ul className="tabs__list">
				<li className="tabs__item tabs__item--active">
					<a>
						<div
							className="w-100 card-header-label"
							style={{
								display: "flex",
								justifyContent: "center",
								alignItems: "center",
							}}
						>
							<div
								style={{
									width: "100%",
									display: "flex",
									justifyContent: "space-between",
									alignItems: "center",
								}}
							>
								<div
									style={{
										width: "80%",
										display: "flex",
										justifyContent: "center",
										alignItems: "center",
									}}
								>
									<strong>Info Grafis</strong>
								</div>

								<div
									style={{
										width: "20%",
										display: "flex",
										justifyContent: "center",
										alignItems: "center",
									}}
								>
									<button
										className="card-tab-close"
										onClick={() => {
											dispatch({
												type: "SIDEBAR",
												payload: {
													sid: "right",
													sid_right: false,
												},
											});
										}}
									>
										<i className="fa fa-times"></i>
									</button>
								</div>
							</div>
						</div>
					</a>
				</li>
			</ul>
			<div className="tabs__content">
				<div className="p-3">
					<div id="menuSidebarLeft" style={{ marginTop: "10px" }}>
						<div className="MenuContainer">
							{info.length > 0 &&
								info.map((_) => {
									return <ItemInfoMenuGrap {..._} />;
								})}

							{info.length == 0 && (
								<h5>Tidak ada informasi pada kecamatan ini</h5>
							)}
						</div>
						<hr />
					</div>
				</div>
			</div>
		</div>
	);
};

export default InfoGrafis;
