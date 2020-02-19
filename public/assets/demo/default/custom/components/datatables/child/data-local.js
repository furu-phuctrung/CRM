var DatatableChildDataLocalDemo = function() {
    var r = function(e) {
        $("<div/>").attr("id", "child_data_local_" + e.data.RecordID).appendTo(e.detailCell).mDatatable({
            data: {
                type: "local",
                source: e.data.Orders,
                pageSize: 10
            },
            layout: {
                theme: "default",
                scroll: !0,
                height: 300,
                footer: !1,
                spinner: {
                    type: 1,
                    theme: "default"
                }
            },
            sortable: !0,
            columns: [{
                field: "OrderID",
                title: "Order ID",
                sortable: !1
            }, {
                field: "ShipCountry",
                title: "Country",
                width: 100
            }, {
                field: "ShipAddress",
                title: "Ship Address"
            }, {
                field: "ShipName",
                title: "Ship Name"
            }, {
                field: "OrderDate",
                title: "Order Date"
            }, {
                field: "TotalPayment",
                title: "Total Payment"
            }, {
                field: "Status",
                title: "Status",
                template: function(e) {
                    var r = {
                        1: {
                            title: "Pending",
                            class: "m-badge--brand"
                        },
                        2: {
                            title: "Delivered",
                            class: " m-badge--metal"
                        },
                        3: {
                            title: "Canceled",
                            class: " m-badge--primary"
                        },
                        4: {
                            title: "Success",
                            class: " m-badge--success"
                        },
                        5: {
                            title: "Info",
                            class: " m-badge--info"
                        },
                        6: {
                            title: "Danger",
                            class: " m-badge--danger"
                        },
                        7: {
                            title: "Warning",
                            class: " m-badge--warning"
                        }
                    };
                    return '<span class="m-badge ' + r[e.Status].class + ' m-badge--wide">' + r[e.Status].title + "</span>"
                }
            }, {
                field: "Type",
                title: "Type",
                template: function(e) {
                    var r = {
                        1: {
                            title: "Online",
                            state: "danger"
                        },
                        2: {
                            title: "Retail",
                            state: "primary"
                        },
                        3: {
                            title: "Direct",
                            state: "accent"
                        }
                    };
                    return '<span class="m-badge m-badge--' + r[e.Type].state + ' m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-' + r[e.Type].state + '">' + r[e.Type].title + "</span>"
                }
            }]
        })
    };
    return {
        init: function() {
            var e;
            e = JSON.parse('[{}]'), $(".m_datatable").mDatatable({
                data: {
                    type: "local",
                    source: e,
                    pageSize: 10
                },
                layout: {
                    theme: "default",
                    scroll: !1,
                    height: null,
                    footer: !1
                },
                sortable: !0,
                filterable: !1,
                pagination: !0,
                detail: {
                    title: "Load sub table",
                    content: r
                },
                search: {
                    input: $("#generalSearch")
                },
                columns: [{
                    field: "RecordID",
                    title: "",
                    sortable: !1,
                    width: 20,
                    textAlign: "center"
                }, {
                    field: "FirstName",
                    title: "First Name"
                }, {
                    field: "LastName",
                    title: "Last Name"
                }, {
                    field: "Company",
                    title: "Company"
                }, {
                    field: "Email",
                    title: "Email"
                }, {
                    field: "Phone",
                    title: "Phone"
                }, {
                    field: "Status",
                    title: "Status",
                    template: function(e) {
                        var r = {
                            1: {
                                title: "Pending",
                                class: "m-badge--brand"
                            },
                            2: {
                                title: "Delivered",
                                class: " m-badge--metal"
                            },
                            3: {
                                title: "Canceled",
                                class: " m-badge--primary"
                            },
                            4: {
                                title: "Success",
                                class: " m-badge--success"
                            },
                            5: {
                                title: "Info",
                                class: " m-badge--info"
                            },
                            6: {
                                title: "Danger",
                                class: " m-badge--danger"
                            },
                            7: {
                                title: "Warning",
                                class: " m-badge--warning"
                            }
                        };
                        return '<span class="m-badge ' + r[e.Status].class + ' m-badge--wide">' + r[e.Status].title + "</span>"
                    }
                }, {
                    field: "Type",
                    title: "Type",
                    template: function(e) {
                        var r = {
                            1: {
                                title: "Online",
                                state: "danger"
                            },
                            2: {
                                title: "Retail",
                                state: "primary"
                            },
                            3: {
                                title: "Direct",
                                state: "accent"
                            }
                        };
                        return '<span class="m-badge m-badge--' + r[e.Type].state + ' m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-' + r[e.Type].state + '">' + r[e.Type].title + "</span>"
                    }
                }, {
                    field: "Actions",
                    width: 110,
                    title: "Actions",
                    sortable: !1,
                    overflow: "visible",
                    template: function(e, r, a) {
                        return '\t\t\t\t\t\t<div class="dropdown ' + (a.getPageSize() - r <= 4 ? "dropup" : "") + '">\t\t\t\t\t\t\t<a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">  <i class="la la-ellipsis-h"></i></a>\t\t\t\t\t\t  \t<div class="dropdown-menu dropdown-menu-right">\t\t\t\t\t\t    \t<a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>\t\t\t\t\t\t    \t<a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>\t\t\t\t\t\t    \t<a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>\t\t\t\t\t\t  \t</div>\t\t\t\t\t\t</div>\t\t\t\t\t\t<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">\t\t\t\t\t\t\t<i class="la la-edit"></i>\t\t\t\t\t\t</a>\t\t\t\t\t\t<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">\t\t\t\t\t\t\t<i class="la la-trash"></i>\t\t\t\t\t\t</a>\t\t\t\t\t'
                    }
                }]
            })
        }
    }
}();
jQuery(document).ready(function() {
    DatatableChildDataLocalDemo.init()
});
