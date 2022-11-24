import React, { useRef, useEffect, useState } from "react";
import { buildingDataDetail } from "../function/ObjectFunction";
import axios from "axios";
import { useDispatch, useSelector } from "react-redux";

export default function DetailItem(props) {
	const getRedux = useSelector((state) => state);
	const dispatch = useDispatch();

	const [data, setData] = useState({});
	const [address, setAddress] = useState("");
	const [ItemDetail, setItemDetail] = useState([]);

	useEffect(() => {
		if (!fx?.empty(props.data) && props.data != undefined && props.data != "") {
			const { detail, result } = props.data;
			fetchDataAlamatGoogle(
				`${parseFloat(result?.latitude.replace(/\s/g, ""))}`,
				`${parseFloat(result?.longitude.replace(/\s/g, ""))}`
			);
			setData(result);
			setItemDetail(detail ?? {});
		}
	}, [props.data]);

	const fetchDataAlamatGoogle = async (lat, lng) => {
		const result = await axios.get(
			`${window.base_url}IntegrasiData/alamatGoogleMaps/${lat}/${lng}`
		);
		setAddress(result?.data ?? "");
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
									<strong>{data?.dataSektor ?? ""}</strong>
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
					<div className="card-image-content">
						<img
							className="ImgData"
							src={`${BASE_URL}assets/img/foto/${data?.gambar}`}
							alt=""
						/>
					</div>
					<h5 className="mt-2">{data?.header?.nama?.toUpperCase() ?? ""}</h5>
					<small>{data?.header?.jenis?.toUpperCase() ?? ""}</small>
					<div className="mt-2 address">
						{address.administrative_area_level_1 != undefined && (
							<small>
								{`
                                ${address?.administrative_area_level_4 ?? ""},
                                ${address?.administrative_area_level_3 ?? ""},
                                ${address?.administrative_area_level_2 ?? ""},
                                ${address?.administrative_area_level_1 ?? ""}`}
							</small>
						)}
					</div>
					<hr
						style={{
							marginTop: "2px",
							marginBottom: "2px",
							color: "#d5d5d5",
						}}
					/>
					<div className="mb-3"></div>
					{/* =================================================== */}
					{ItemDetail.map((_, inx) => (
						<div className="mb-3 detail-value-item">
							<div
								style={{
									display: "flex",
									justifyContent: "space-between",
									alignItems: "flex-start",
									width: "100%",
								}}
							>
								<div
									style={{
										width: "30px",
									}}
								>
									<i className="fa fa-list-alt"></i>
								</div>
								<div
									style={{
										width: "calc(100% - 30px)",
									}}
								>
									<div>
										<strong>{_?.label?.toUpperCase() ?? ""}</strong>
									</div>
									<span>{_?.value == "" ? "-" : _?.value ?? "-"}</span>
								</div>
							</div>
						</div>
					))}
				</div>

				{/* <div
            className="tabs__inner-content tabs__inner-content--active"
            id="tab1"
        >
            <h1>Tabs design and animation</h1>
            <p>
                This is an example of how a tab bar can interact and be animated
                by EricaIsNenya.
            </p>
            <p>
                Check out her amazing works and be inspired at{" "}
                <a href="http://ericasalvetti.com">http://ericasalvetti.com</a>
            </p>
        </div> */}
			</div>
		</div>
	);
}
