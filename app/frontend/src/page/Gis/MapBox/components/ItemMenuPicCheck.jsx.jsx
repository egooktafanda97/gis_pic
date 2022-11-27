import React, { useEffect, useState } from "react";
import { FcTodoList } from "react-icons/fc";
// import { package_data_active } from "../model/main_model";
import { useDispatch, useSelector } from "react-redux";
import $ from "jquery";

import { addOrRemove } from "../function/fx";
const ItemMenuPicCheck = (props) => {
	const { swithing, InitData } = props;
	const getRedux = useSelector((state) => state);
	const dispatch = useDispatch();
	const [trigger, setTrigger] = useState(true);
	useEffect(() => {
		if (!fx?.empty(props.InitData) && props.InitData?.items?.length > 0) {
			dispatch({
				type: "SEKTOR_ACTIVE",
				payload: props.InitData?.items?.map((i) => {
					return i?.item;
				}),
			});
		}
	}, [props?.InitData?.items]);
	const handleChange = (e) => {
		const AxisData = [...getRedux?.sektor_map_active];
		let new_arr = addOrRemove(AxisData, e.target.value);
		dispatch({
			type: "SEKTOR_ACTIVE",
			payload: new_arr,
		});
		swithing(new_arr);
	};

	return (
		<div className="ItemMenuContainer">
			<div
				className="container-main-menu"
				onClick={() => {
					setTrigger(!trigger);
				}}
			>
				<div className="IconMenuContainer dropDown">
					<FcTodoList size={30} />
				</div>
				<div className="LabelMenuContainer">
					<label htmlFor="">PIC</label>
				</div>
			</div>
			<div className={`child-main-menu ${trigger && "active"}`}>
				{!fx?.empty(InitData) &&
					InitData?.items?.map((itm, key) => (
						<div
							className="componentCheck LabelMenuContainer"
							style={{
								display: "flex",
								alignItems: "center",
							}}
							key={key}
						>
							<div
								style={{
									width: "10px",
									height: "10px",
									borderRadius: "100%",
									background: itm?.color,
									marginRight: "10px",
								}}
							></div>
							<div>
								<input
									className="checkbox-effect checkbox-effect-1"
									id={`get-up-${key + 1}`}
									type="checkbox"
									defaultValue={itm?.item}
									name={itm?.item}
									defaultChecked={true}
									onChange={(e) => {
										handleChange(e, itm);
									}}
								/>
								<label htmlFor={`get-up-${key + 1}`}>{itm?.item}</label>
							</div>
						</div>
					))}
			</div>
		</div>
	);
};

export default ItemMenuPicCheck;
