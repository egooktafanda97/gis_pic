import { PapperSet } from "./action";
import { State } from "./initialState";
function reducer(state = State, action) {
	switch (action.type) {
		case "PAPPER-SETTING":
			return {};
			break;
		case "SIDEBAR":
			if (action?.payload?.sid == "right") {
				return {
					...state,
					sid_map_right_sidebar: action?.payload?.sid_right ?? false,
				};
			}
			break;
		case "SEKTOR_ACTIVE":
			return {
				...state,
				sektor_map_active: action?.payload,
			};
			break;
		default:
			return { ...state };
			break;
	}
}

export default reducer;
