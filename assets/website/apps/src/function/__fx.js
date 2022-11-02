module.exports = {
	empty: (args) => {
		if (args == null) return true;
		if (args.length > 0) return false;
		if (args.length === 0) return true;
		if (typeof args !== "object") return true;
		for (var key in args) {
			if (hasOwnProperty.call(args, key)) return false;
		}
		return true;
	},
};
