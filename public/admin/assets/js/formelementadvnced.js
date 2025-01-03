(() => {
    "use strict";
    $((function(e) {
        function a(e) {
            return e.id ? $('<span><img src="https://laravel8.spruko.com/noa/assets/images/users/' + e.element.value.toLowerCase() + '.jpg" class="rounded-circle avatar-sm" /> ' + e.text + "</span>") : e.text
        }
        $(".select2").select2({
            minimumResultsForSearch: 1 / 0,
            width: "100%"
        }), $(".select2-show-search").select2({
            minimumResultsForSearch: "",
            width: "100%"
        }), $(".select2-style1").select2({
            templateResult: a,
            templateSelection: a,
            escapeMarkup: function(e) {
                return e
            }
        }), $("#datepicker-date").bootstrapdatepicker({
            format: "mm/dd/yyyy",
            viewMode: "date",
            multidate: !0,
            multidateSeparator: "-"
        }),$("#datepicker-date1").bootstrapdatepicker({
            format: "mm/dd/yyyy",
            viewMode: "date",
            multidate: !0,
            multidateSeparator: "-"
        }), $("#datepicker-month").bootstrapdatepicker({
            format: "MM",
            viewMode: "months",
            minViewMode: "months",
            multidate: !0,
            multidateSeparator: "-"
        }), $("#datepicker-year").bootstrapdatepicker({
            format: "yyyy",
            viewMode: "year",
            minViewMode: "years",
            multidate: !0,
            multidateSeparator: "-"
        }), $(".fc-datepicker").datepicker({
            showOtherMonths: !0,
            selectOtherMonths: !0
        }), $("#datepickerNoOfMonths").datepicker({
            showOtherMonths: !0,
            selectOtherMonths: !0,
            numberOfMonths: 2
        }), $("#bootstrapDatePicker1").datepicker({
            autoclose: !0,
            format: "dd-mm-yyyy",
            todayHighlight: !0
        }).datepicker("update", new Date), $("#datetimepicker1").appendDtpicker({
            closeOnSelected: !0,
            onInit: function(e) {
                var a = e.getPicker();
                $(a).addClass("main-datetimepicker")
            }
        }), $("#datetimepicker2").datetimepicker({
            format: "yyyy-mm-dd hh:ii",
            autoclose: !0
        }), $("input#defaultconfig").maxlength({
            alwaysShow: !0,
            warningClass: "badge badge-xs bg-warning",
            limitReachedClass: "badge badge-xs bg-primary"
        }), $("input#thresholdConfig").maxlength({
            threshold: 20,
            warningClass: "badge badge-xs bg-warning",
            limitReachedClass: "badge badge-xs bg-primary"
        }), $("input#alloptions").maxlength({
            alwaysShow: !0,
            threshold: 10,
            separator: " of ",
            preText: "You have ",
            postText: " chars remaining.",
            validate: !0,
            warningClass: "badge badge-xs bg-warning",
            limitReachedClass: "badge badge-xs bg-primary"
        }), $("textarea#textarea").maxlength({
            alwaysShow: !0,
            warningClass: "badge badge-xs bg-warning",
            limitReachedClass: "badge badge-xs bg-primary"
        }), $("input#place-top-left").maxlength({
            alwaysShow: !0,
            placement: "top-left",
            warningClass: "badge badge-xs bg-warning",
            limitReachedClass: "badge badge-xs bg-primary"
        }), $("input#place-top-right").maxlength({
            alwaysShow: !0,
            placement: "top-right",
            warningClass: "badge badge-xs bg-warning",
            limitReachedClass: "badge badge-xs bg-primary"
        }), $("input#place-bottom-left").maxlength({
            alwaysShow: !0,
            placement: "bottom-left",
            warningClass: "badge badge-xs bg-warning",
            limitReachedClass: "badge badge-xs bg-primary"
        }), $("input#place-bottom-right").maxlength({
            alwaysShow: !0,
            placement: "bottom-right",
            warningClass: "badge badge-xs bg-warning",
            limitReachedClass: "badge badge-xs bg-primary"
        })
    }))
})();
