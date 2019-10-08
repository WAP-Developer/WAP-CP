"use strict";
var KTDatatablesExtensionButtons = function () {

	var initTable1 = function () {

		// begin first table
		var table = $('#wap_table').DataTable({
			responsive: true,
			// Pagination settings
			dom: `<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>
			<'row'<'col-sm-12'tr>>
			<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,

			buttons: [
				'print',
				'excelHtml5',
				'pdfHtml5',
			]
		});

	};

	var initTable2 = function () {
		// begin first table
		var table = $('#no-search').DataTable({
			responsive: true,
			// Pagination settings
			dom: `<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>
					<'row'<'col-sm-12'tr>>
					<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
			"searching": false,

			buttons: [
				'print',
				'excelHtml5',
				'pdfHtml5',
			]
		});
	};

	return {

		//main function to initiate the module
		init: function () {
			initTable1();
			initTable2();
		},

	};

}();

jQuery(document).ready(function () {
	KTDatatablesExtensionButtons.init();
});
