// Call the dataTables jQuery plugin
$(document).ready(function () {
  $("#dataTable").DataTable({
    columnDefs: [
      {
        orderable: false, // Disables user sorting
        targets: [0, 4], // Target the first and fifth columns
      },
    ],
  });
});
