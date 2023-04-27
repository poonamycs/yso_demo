$((function () {
	"use strict";
	$("#wizard1").steps({
		headerTag: "h3",
		bodyTag: "section",
		autoFocus: !0,
		titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>'
	}), $("#wizard2").steps({
		headerTag: "h3",
		bodyTag: "section",
		autoFocus: !0,
		titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
		onStepChanging: function (a, e, nfd) {
			if (!(e < nfd)) return !0;
			if (0 === e) {
				var t = $("#so").parsley(),
					i = $("#po").parsley(),
					cn = $("#client_name").parsley(),
					pd = $("#po_date").parsley(),
					dd = $("#delivery_date").parsley(),
					s = $("#tpi").parsley();
					ae = $("#age").parsley();
					
				if (t.isValid() && i.isValid() && cn.isValid() && pd.isValid() && dd.isValid() && s.isValid() && ae.isValid()) return !0;
				t.validate(), i.validate(), cn.validate(), pd.validate(), dd.validate(), s.validate(), ae.validate()
			}
			if (1 === e) {
				var n = $("#email").parsley();
				if (n.isValid()) return !0;
				n.validate()
			}
		}
	}), $("#wizard3").steps({
		headerTag: "h3",
		bodyTag: "section",
		autoFocus: !0,
		titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
		stepsOrientation: 1
	})
}));