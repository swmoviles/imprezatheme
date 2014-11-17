jQuery(document).ready(function (e) {
    var t = {
        loadVals: function () {
            var t = e("#_symple_shortcode").text(),
                n = t;
            e(".symple-input").each(function () {
                var t = e(this),
                    r = t.attr("id"),
                    r = r.replace("symple_", ""),
                    i = new RegExp("{{" + r + "}}", "g");
                n = n.replace(i, t.val())
            });
            e("#_symple_ushortcode").remove();
            e("#symple-sc-form-table").prepend('<div id="_symple_ushortcode" class="hidden">' + n + "</div>")
        },
        LoadChildVals: function () {
            var t = e("#_symple_child_shortcode").text(),
                n = "";
            shortcodes = "";
            e(".child-clone-row").each(function () {
                var n = e(this),
                    r = t;
                e(".symple-cinput", this).each(function () {
                    var t = e(this),
                        n = t.attr("id"),
                        n = n.replace("symple_", "");
                    re = new RegExp("{{" + n + "}}", "g");
                    r = r.replace(re, t.val())
                });
                shortcodes = shortcodes + r + "\n"
            });
            e("#_symple_child_shortcodes").remove();
            e(".child-clone-rows").prepend('<div id="_symple_child_shortcodes" class="hidden">' + shortcodes + "</div>");
            this.loadVals();
            n = e("#_symple_ushortcode").text().replace("{{child_shortcode}}", shortcodes);
            e("#_symple_ushortcode").remove();
            e("#symple-sc-form-table").prepend('<div id="_symple_ushortcode" class="hidden">' + n + "</div>")
        },
        children: function () {
            e(".child-clone-rows").appendo({
                subSelect: "> div.child-clone-row:last-child",
                allowDelete: false,
                focusFirst: false
            });
            e(".child-clone-row-remove").live("click", function () {
                var t = e(this),
                    n = t.parent();
                if (e(".child-clone-row").size() > 1) {
                    n.remove()
                } else {
                    alert("You need a minimum of one row")
                }
                return false
            })
        },
        resizeTB: function () {
            var t = e("#TB_ajaxContent"),
                n = e("#TB_window"),
                r = e("#symple-tb-wrap");
            n.css({
                height: r.outerHeight() + 50,
                width: r.outerWidth(),
                marginLeft: -(r.outerWidth() / 2)
            });
            t.css({
                paddingTop: 0,
                paddingLeft: 0,
                paddingRight: 0,
                height: n.outerHeight() - 47,
                overflow: "auto",
                width: r.outerWidth()
            })
        },
        load: function () {
            var t = this,
                n = e("#symple-tb-wrap"),
                r = e("#symple-sc-form", n),
                i = e("#_symple_shortcode", r).text(),
                s = e("#_symple_popup", r).text(),
                o = "";
            t.resizeTB();
            e(window).resize(function () {
                t.resizeTB()
            });
            t.loadVals();
            t.children();
            t.LoadChildVals();
            e(".symple-cinput", r).live("change", function () {
                t.LoadChildVals()
            });
            e(".symple-input", r).change(function () {
                t.loadVals()
            });
            e(".symple-insert", r).click(function () {
                if (window.tinyMCE) {
                    window.tinyMCE.execInstanceCommand("content", "mceInsertContent", false, e("#_symple_ushortcode", r).html());
                    tb_remove()
                }
            })
        }
    };
    e("#symple-tb-wrap").livequery(function () {
        t.load()
    })
})