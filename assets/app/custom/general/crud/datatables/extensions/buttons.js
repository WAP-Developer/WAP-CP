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
		var table = $('#kt_table_2').DataTable({
			responsive: true,

			buttons: [
				'print',
				'copyHtml5',
				'excelHtml5',
				'csvHtml5',
				'pdfHtml5',
			],
		});

		$('#export_print').on('click', function (e) {
			e.preventDefault();
			table.button(0).trigger();
		});

		$('#export_copy').on('click', function (e) {
			e.preventDefault();
			table.button(1).trigger();
		});

		$('#export_excel').on('click', function (e) {
			e.preventDefault();
			table.button(2).trigger();
		});

		$('#export_csv').on('click', function (e) {
			e.preventDefault();
			table.button(3).trigger();
		});

		$('#export_pdf').on('click', function (e) {
			e.preventDefault();
			table.button(4).trigger();
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
