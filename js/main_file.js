$ = jQuery;
$(document).ready(function () {
    $("#yoodule-table").DataTable({
        processing: true,
        serverSide: true,
        sServerMethod: "post",
        ajax: {
            url: "/wp-admin/admin-ajax.php",
            data: { action: "datatables_endpoint" },
            dataSrc: "data",
        },
        columns: [{ data: "id" }, { data: "price_name" }, { data: "price_currency" }, { data: "price_amount" }],
        searchable: true,

        order: [[2, "desc"]],
        responsive: true,
        sPaging: true,
        displayLength: 5,
        lengthMenu: [5, 10, 25, 50, 75, 100],

        language: {
            paginate: { previous: "&nbsp;", next: "&nbsp;" },
            processing: "  <div class=\"d-flex justify-content-center bg-transparent\" >\n" +
                "            <div class=\"spinner-border text-primary\" role=\"status\" style='width: 50px; height: 50px; vertical-align: middle' aria-hidden=\"true\"></div>\n" +
                "          </div>",
            sLoadingRecords: "&nbsp;"
        },


        fnInfoCallback: (setting, rTurn) => {
            var fErr = " Could not find anything",
                sErr = " kindly try again!!!!."
            if (setting.json.error === "error") {
                let err = setting.oPreviousSearch.sSearch
                Notiflix.Notify.failure(err + fErr, sErr)
            }
            return rTurn
        },
    });
});