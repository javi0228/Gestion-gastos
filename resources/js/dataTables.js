import DataTable from "datatables.net-dt";

// DataTable variable
const searchButton = document.getElementById("search-button");
const searchInput = document.getElementById("search-input");
var table;
const initExpensesTable = (filter = null) => {
    let menageId = window.location.href.split("/").slice(-1)[0];
    let expenses;
    // Destroy table if it exists to create it again
    if (table) table.destroy();
    $.ajax({
        type: "get",
        url: location.origin + "/api/expenses",
        data: { filter, menageId },
        success: function (response) {
            // Parse the data to json
            response = JSON.parse(response);
            table = new DataTable("#expenseDatatable", {
                data: response.data,
                columns: [
                    { data: "description" },
                    {
                        data: "amount",
                        className: "text-center",
                    },
                    { data: "name", className: "text-center" },
                ],
                responsive: true,
                // Hide search input
                searching: false,
                // Hide max entries dropdown
                paging: false,
                // Traduction
                language: {
                    zeroRecords: "No hay datos",
                    info: "Página _PAGE_ de _PAGES_",
                },
            });
        },
    });

    return expenses;
};

document.addEventListener("DOMContentLoaded", () => {
    initExpensesTable();
});
searchButton.addEventListener("click", () => {
     initExpensesTable(searchInput.value);
});
