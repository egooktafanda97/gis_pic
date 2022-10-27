import { PapperSet } from "./action";
import { State } from "./initialState";
function reducer(state = State, action) {
	switch (action.type) {
		case "PAPPER-SETTING":
			return {};
			break;
		default:
	}
}

export default reducer;
