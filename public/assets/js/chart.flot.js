$((function () {
	"use strict";
	$.plot("#flotBar1", [{
		data: [
			[0, 3],
			[1, 8],
			[2, 5],
			[3, 13],
			[4, 5],
			[5, 7],
			[6, 4],
			[7, 6],
			[8, 3],
			[9, 7]
		]
	}], {
		series: {
			bars: {
				show: !0,
				lineWidth: 0,
				fillColor: "#285cf7",
				barWidth: .5
			},
			highlightColor: "#007bff"
		},
		grid: {
			borderWidth: 1,
			borderColor: "rgba(171, 167, 167,0.2)",
			hoverable: !0
		},
		yaxis: {
			tickColor: "rgba(171, 167, 167,0.2)",
			font: {
				color: "#5f6d7a",
				size: 10
			}
		},
		xaxis: {
			tickColor: "rgba(171, 167, 167,0.2)",
			font: {
				color: "#5f6d7a",
				size: 10
			}
		}
	}), $.plot("#flotBar2", [{
		data: [
			[0, 3],
			[2, 8],
			[4, 5],
			[6, 13],
			[8, 5],
			[10, 7],
			[12, 8],
			[14, 10]
		],
		bars: {
			show: !0,
			lineWidth: 0,
			fillColor: "#285cf7",
			barWidth: .8
		}
	}, {
		data: [
			[1, 5],
			[3, 7],
			[5, 10],
			[7, 7],
			[9, 9],
			[11, 5],
			[13, 4],
			[15, 6]
		],
		bars: {
			show: !0,
			lineWidth: 0,
			fillColor: "#7987a1",
			barWidth: .8
		}
	}], {
		grid: {
			borderWidth: 1,
			borderColor: "rgba(171, 167, 167,0.2)"
		},
		yaxis: {
			tickColor: "rgba(171, 167, 167,0.2)",
			font: {
				color: "#666",
				size: 10
			}
		},
		xaxis: {
			tickColor: "rgba(171, 167, 167,0.2)",
			font: {
				color: "#666",
				size: 10
			}
		}
	});
	var o = [
			[0, 2],
			[1, 3],
			[2, 6],
			[3, 5],
			[4, 7],
			[5, 8],
			[6, 10]
		],
		r = [
			[0, 1],
			[1, 2],
			[2, 5],
			[3, 3],
			[4, 5],
			[5, 6],
			[6, 9]
		],
		e = ($.plot($("#flotLine1"), [{
			data: o,
			label: "New Customer",
			color: "#007bff"
		}, {
			data: r,
			label: "Returning Customer",
			color: "#f7557a"
		}], {
			series: {
				lines: {
					show: !0,
					lineWidth: 2
				},
				shadowSize: 0
			},
			points: {
				show: !1
			},
			legend: {
				noColumns: 1,
				position: "nw"
			},
			grid: {
				borderWidth: 1,
				borderColor: "rgba(171, 167, 167,0.2)",
				hoverable: !0
			},
			yaxis: {
				min: 0,
				max: 15,
				color: "#eee",
				tickColor: "rgba(171, 167, 167,0.2)",
				font: {
					size: 10,
					color: "#999"
				}
			},
			xaxis: {
				color: "#eee",
				tickColor: "rgba(171, 167, 167,0.2)",
				font: {
					size: 10,
					color: "#999"
				}
			}
		}), $.plot($("#flotLine2"), [{
			data: o,
			label: "New Customer",
			color: "#560bd0"
		}, {
			data: r,
			label: "Returning Customer",
			color: "#f7557a"
		}], {
			series: {
				lines: {
					show: !0,
					lineWidth: 2
				},
				shadowSize: 0
			},
			points: {
				show: !0
			},
			legend: {
				noColumns: 1,
				position: "ne"
			},
			grid: {
				borderWidth: 1,
				borderColor: "rgba(171, 167, 167,0.2)",
				hoverable: !0
			},
			yaxis: {
				min: 0,
				max: 15,
				color: "#eee",
				tickColor: "rgba(171, 167, 167,0.2)",
				font: {
					size: 10,
					color: "#999"
				}
			},
			xaxis: {
				color: "#eee",
				tickColor: "rgba(171, 167, 167,0.2)",
				font: {
					size: 10,
					color: "#999"
				}
			}
		}), $.plot($("#flotArea1"), [{
			data: o,
			label: "New Customer",
			color: "#f7557a "
		}, {
			data: r,
			label: "Returning Customer",
			color: "#007bff"
		}], {
			series: {
				lines: {
					show: !0,
					lineWidth: 1,
					fill: !0,
					fillColor: {
						colors: [{
							opacity: 0
						}, {
							opacity: .8
						}]
					}
				},
				shadowSize: 0
			},
			points: {
				show: !1
			},
			legend: {
				noColumns: 1,
				position: "nw"
			},
			grid: {
				borderWidth: 1,
				borderColor: "rgba(171, 167, 167,0.2)",
				hoverable: !0
			},
			yaxis: {
				min: 0,
				max: 15,
				color: "#eee",
				tickColor: "rgba(171, 167, 167,0.2)",
				font: {
					size: 10,
					color: "#999"
				}
			},
			xaxis: {
				color: "#eee",
				tickColor: "rgba(171, 167, 167,0.2)",
				font: {
					size: 10,
					color: "#999"
				}
			}
		}), $.plot($("#flotArea2"), [{
			data: o,
			label: "New Customer",
			color: "#f7557a"
		}, {
			data: r,
			label: "Returning Customer",
			color: "#560bd0"
		}], {
			series: {
				lines: {
					show: !0,
					lineWidth: 1,
					fill: !0,
					fillColor: {
						colors: [{
							opacity: 0
						}, {
							opacity: .3
						}]
					}
				},
				shadowSize: 0
			},
			points: {
				show: !0
			},
			legend: {
				noColumns: 1,
				position: "nw"
			},
			grid: {
				borderWidth: 1,
				borderColor: "rgba(171, 167, 167,0.2)",
				hoverable: !0
			},
			yaxis: {
				min: 0,
				max: 15,
				color: "#eee",
				tickColor: "rgba(171, 167, 167,0.2)",
				font: {
					size: 10,
					color: "#999"
				}
			},
			xaxis: {
				color: "#eee",
				tickColor: "rgba(171, 167, 167,0.2)",
				font: {
					size: 10,
					color: "#999"
				}
			}
		}), [{
			label: "Series 1",
			data: [
				[1, 10]
			],
			color: "#6610f2"
		}, {
			label: "Series 2",
			data: [
				[1, 30]
			],
			color: "#007bff"
		}, {
			label: "Series 3",
			data: [
				[1, 90]
			],
			color: "#8500ff"
		}, {
			label: "Series 4",
			data: [
				[1, 70]
			],
			color: "#f7557a"
		}, {
			label: "Series 5",
			data: [
				[1, 80]
			],
			color: "#494c57"
		}]);

	function l(o, r) {
		return '<div style="font-size:8pt; text-align:center; padding:2px; color:white;">' + o + "<br/>" + Math.round(r.percent) + "%</div>"
	}
	$.plot("#flotPie1", e, {
		series: {
			pie: {
				show: !0,
				radius: 1,
				label: {
					show: !0,
					radius: 2 / 3,
					formatter: l,
					threshold: .1
				}
			}
		},
		grid: {
			hoverable: !0,
			clickable: !0
		}
	}), $.plot("#flotPie2", e, {
		series: {
			pie: {
				show: !0,
				radius: 1,
				innerRadius: .5,
				label: {
					show: !0,
					radius: 2 / 3,
					formatter: l,
					threshold: .1
				}
			}
		},
		grid: {
			borderWidth: 1,
			borderColor: "rgba(171, 167, 167,0.2)",
			hoverable: !0
		}
	})
}));