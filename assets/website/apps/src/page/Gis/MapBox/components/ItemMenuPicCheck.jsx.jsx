import React, { useEffect, useState } from "react";
import { FcTodoList } from "react-icons/fc";
import { package_data_active } from "../model/main_model";
import { useDispatch, useSelector } from "react-redux";
import $ from "jquery";

import { addOrRemove } from "../function/fx";
const ItemMenuPicCheck = (props) => {
	const getRedux = useSelector((state) => state);
	const dispatch = useDispatch();
	useEffect(() => {
		dispatch({
			type: "SEKTOR_ACTIVE",
			payload: package_data_active.map((i) => {
				return i.name;
			}),
		});
	}, []);
	const handleChange = (e) => {
		const AxisData = [...getRedux?.sektor_map_active];
		let new_arr = addOrRemove(AxisData, e.target.value);
		dispatch({
			type: "SEKTOR_ACTIVE",
			payload: new_arr,
		});
		props.swithing(new_arr);
	};

	return (
		<div className="ItemMenuContainer">
			<div
				className="container-main-menu"
				onClick={() => {
					$(".child-main-menu").toggleClass("active");
				}}
			>
				<div className="IconMenuContainer dropDown">
					<FcTodoList size={30} />
				</div>
				<div className="LabelMenuContainer">
					<label htmlFor="">PIC</label>
				</div>
			</div>
			<div className="child-main-menu">
				{package_data_active.map((itm, key) => (
					<div className="componentCheck LabelMenuContainer" key={key}>
						<div>
							<input
								className="checkbox-effect checkbox-effect-1"
								id={`get-up-${key + 1}`}
								type="checkbox"
								defaultValue={itm.name}
								name={itm.name}
								defaultChecked={true}
								onChange={(e) => {
									handleChange(e, itm);
								}}
							/>
							<label htmlFor={`get-up-${key + 1}`}>{itm?.label}</label>
						</div>
					</div>
				))}
			</div>
		</div>
	);
};

export default ItemMenuPicCheck;
