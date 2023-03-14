<footer id="page-footer" class="opacity-0">
	<div class="content py-20 font-size-xs clearfix">
		<!-- <div class="float-right">
			Crafted with <i class="fa fa-heart text-pulse"></i> by <a class="font-w600" href="https://1.envato.market/ydb" target="_blank">pixelcave</a>
		</div> -->
		<div class="float-left">
			<a class="font-w600" target="_blank">CBI</a> &copy; <span class="js-year-copy">2023</span>
		</div>
	</div>
</footer>
<!-- END Footer -->
</div>
<!-- END Page Container -->

<!--
	Codebase JS Core

	Vital libraries and plugins used in all pages. You can choose to not include this file if you would like
	to handle those dependencies through webpack. Please check out assets/_es6/main/bootstrap.js for more info.

	If you like, you could also include them separately directly from the assets/js/core folder in the following
	order. That can come in handy if you would like to include a few of them (eg jQuery) from a CDN.

	assets/js/core/jquery.min.js
	assets/js/core/bootstrap.bundle.min.js
	assets/js/core/simplebar.min.js
	assets/js/core/jquery-scrollLock.min.js
	assets/js/core/jquery.appear.min.js
	assets/js/core/jquery.countTo.min.js
	assets/js/core/js.cookie.min.js
-->
<script src="<?= base_url(). 'assets/js/codebase.core.min.js'?>"></script>

<!--
	Codebase JS

	Custom functionality including Blocks/Layout API as well as other vital and optional helpers
	webpack is putting everything together at assets/_es6/main/app.js
-->
<script src="<?= base_url(). 'assets/js/codebase.app.min.js'?>"></script>

<!-- Page JS Plugins -->
<!-- <script src="assets/js/plugins/chartjs/Chart.bundle.min.js"></script> -->

<!-- Page JS Code -->
<!-- <script src="assets/js/pages/be_pages_dashboard.min.js"></script> -->
<!-- Page JS Plugins -->
<script src="<?= base_url(). 'assets/js/plugins/datatables/jquery.dataTables.min.js'?>"></script>
<script src="<?= base_url(). 'assets/js/plugins/datatables/dataTables.bootstrap4.min.js'?>"></script>

<!-- Page JS Code -->
<script src="<?= base_url(). 'assets/js/pages/be_tables_datatables.min.js'?>"></script>
<script src="<?= base_url(). 'assets/js/xlsx.full.min.js'?>"></script>
<script>
	var isAddDocuments = '<?php echo isset($is_add_documents) ? $is_add_documents : 'false'; ?>' === 'true';
	var isAddDocumentsLisensi = '<?php echo isset($is_add_documents_lisensi) ? $is_add_documents_lisensi : 'false'; ?>' === 'true';
	var mapOfSheet = {};
	var dataTableRows = [];
	var mapOfSheetLisensi = {};
	var dataTableRowsLisensi = [];


	function refreshDataTable() {
		$("#DataTables_Table_0").DataTable().clear().draw();
		let usedRows = ["nama_alat", "pabrik_pembuat", "kapasitas", "lokasi", "no_seri", "no_perijinan", "expired_date", "status"];

		dataTableRows.forEach(function callback(row, index) {
			//usinf datatable add every row
			var cells = [(index + 1)];
			usedRows.forEach((key) => {
				if (key === "status") {
					if (row[key] === 'active') {
						//create option for active and processing status
						cells.push('<select class="form-control" id="status-' + index + '" onchange="updateStatus(' + index + ')"><option value="active" selected>Aktif</option><option value="processing">Diproses</option></select>');
					} else if (row[key] === 'processing') {
						//create option for active and processing status
						cells.push('<select class="form-control" id="status-' + index + '" onchange="updateStatus(' + index + ')"><option value="active">Aktif</option><option value="processing" selected>Diproses</option></select>');
					} else {
						cells.push("<span class='badge badge-danger'> Tidak Aktif </span>");
					}
				} else if (typeof(row[key]) === 'undefined') {
					cells.push("");
				} else {
					cells.push(row[key]);
				}
			});
			// add icon button to delete row using jquery $("table tr:eq(2)").remove();
			cells.push("<button class='btn btn-danger btn-sm' onClick='deleteThisRow(" + index + ")'><i class='fa fa-trash'></i></button>");

			$("#DataTables_Table_0").DataTable().row.add(cells).draw();
		});

	}

	function refreshDataTableLisensi() {
		$("#DataTables_Table_0").DataTable().clear().draw();
		let usedRows = ["jenis_lisensi", "nama", "seksi", "npk", "no_sio","masa-berlaku", "status"];

		dataTableRowsLisensi.forEach(function callback(row, index) {
			//usinf datatable add every row
			var cells = [(index + 1)];
			usedRows.forEach((key) => {
				if (key === "status") {
					if (row[key] === 'active') {
						//create option for active and processing status
						cells.push('<select class="form-control" id="status-' + index + '" onchange="updateStatusLisensi(' + index + ')"><option value="active" selected>Aktif</option><option value="processing">Diproses</option></select>');
					} else if (row[key] === 'processing') {
						//create option for active and processing status
						cells.push('<select class="form-control" id="status-' + index + '" onchange="updateStatusLisensi(' + index + ')"><option value="active">Aktif</option><option value="processing" selected>Diproses</option></select>');
					} else {
						cells.push("<span class='badge badge-danger'> Tidak Aktif </span>");
					}
				} else if (typeof(row[key]) === 'undefined') {
					cells.push("");
				} else {
					cells.push(row[key]);
				}
			});
			// add icon button to delete row using jquery $("table tr:eq(2)").remove();
			cells.push("<button class='btn btn-danger btn-sm' onClick='deleteThisRowLisensi(" + index + ")'><i class='fa fa-trash'></i></button>");

			$("#DataTables_Table_0").DataTable().row.add(cells).draw();
		});

	}

	function updateStatus(index) {
		dataTableRows[index].status = $("#status-" + index).val();
		console.log(dataTableRows[index]);
	}

	function updateStatusLisensi(index) {
		dataTableRowsLisensi[index].status = $("#status-" + index).val();
		console.log(dataTableRowsLisensi[index]);
	}

	function onUploadFile() {
		var file = document.getElementById("file").files[0];
		var reader = new FileReader();
		reader.onload = function(e) {
			var data = e.target.result;
			var workbook = XLSX.read(data, {
				type: 'binary'
			});
			workbook.SheetNames.forEach(function(sheetName) {
				// Here is your object
				var XL_row_object = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
				var json_object = JSON.stringify(XL_row_object);
				mapOfSheet[sheetName] = json_object;
			})
			// console.log(mapOfSheet);
			// console.log(JSON.parse(mapOfSheet["Sheet1"]));
			// console.log(JSON.parse(mapOfSheet["Sheet1"])[0].nama_alat);
			// console.log(JSON.parse(mapOfSheet["Sheet1"])[0].pabrik_pembuat);
			// console.log(JSON.parse(mapOfSheet["Sheet1"])[0].kapasitas);
			// console.log(JSON.parse(mapOfSheet["Sheet1"])[0].lokasi);
			// console.log(JSON.parse(mapOfSheet["Sheet1"])[0].no_seri);
			// console.log(JSON.parse(mapOfSheet["Sheet1"])[0].no_perijinan);
			// console.log(JSON.parse(mapOfSheet["Sheet1"])[0].expired_date);
			// console.log(JSON.parse(mapOfSheet["Sheet1"])[0].status);
			// console.log(JSON.parse(mapOfSheet["Sheet1"])[0].keterangan);
			// console.log(JSON.parse(mapOfSheet["Sheet1"])[0].file);
			// console.log(JSON.parse(mapOfSheet["Sheet1"])[0].file_name);
			// console.log(JSON.parse(mapOfSheet["Sheet1"])[0].file_type);
			// console.log(JSON.parse(mapOfSheet["Sheet1"])[0].file_size);
			// console.log(JSON.parse(mapOfSheet["Sheet1"])[0].file_path);
			//
		}
	}

	function onUploadFileLisensi() {
		var file = document.getElementById("fileLisensi").files[0];
		var reader = new FileReader();
		reader.onload = function(e) {
			var data = e.target.result;
			var workbook = XLSX.read(data, {
				type: 'binary'
			});
			workbook.SheetNames.forEach(function(sheetName) {
				// Here is your object
				var XL_row_object = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
				var json_object = JSON.stringify(XL_row_object);
				mapOfSheetLisensi[sheetName] = json_object;
			})
			// console.log(mapOfSheet);
			// console.log(JSON.parse(mapOfSheet["Sheet1"]));
			// console.log(JSON.parse(mapOfSheet["Sheet1"])[0].nama_alat);
			// console.log(JSON.parse(mapOfSheet["Sheet1"])[0].pabrik_pembuat);
			// console.log(JSON.parse(mapOfSheet["Sheet1"])[0].kapasitas);
			// console.log(JSON.parse(mapOfSheet["Sheet1"])[0].lokasi);
			// console.log(JSON.parse(mapOfSheet["Sheet1"])[0].no_seri);
			// console.log(JSON.parse(mapOfSheet["Sheet1"])[0].no_perijinan);
			// console.log(JSON.parse(mapOfSheet["Sheet1"])[0].expired_date);
			// console.log(JSON.parse(mapOfSheet["Sheet1"])[0].status);
			// console.log(JSON.parse(mapOfSheet["Sheet1"])[0].keterangan);
			// console.log(JSON.parse(mapOfSheet["Sheet1"])[0].file);
			// console.log(JSON.parse(mapOfSheet["Sheet1"])[0].file_name);
			// console.log(JSON.parse(mapOfSheet["Sheet1"])[0].file_type);
			// console.log(JSON.parse(mapOfSheet["Sheet1"])[0].file_size);
			// console.log(JSON.parse(mapOfSheet["Sheet1"])[0].file_path);
			//
		}
	}

	function refreshDataTableAdd() {
		$("#DataTables_Table_0").DataTable().clear().draw();
		let usedRows = ["nama_alat", "pabrik_pembuat", "kapasitas", "lokasi", "no_seri", "no_perijinan", "expired_date", "status"];
		//create row with forms inside it and in column action add button to add row
		var formsCell = ["", "<input type='text' class='form-control' name='nama_alat' id='nama_alat' placeholder='Nama Alat'>",
			"<input type='text' class='form-control' name='pabrik_pembuat' id='pabrik_pembuat' placeholder='Pabrik Pembuat'>",
			"<input type='text' class='form-control' name='kapasitas' id='kapasitas' placeholder='Kapasitas'>",
			"<input type='text' class='form-control' name='lokasi' id='lokasi' placeholder='Lokasi'>",
			"<input type='text' class='form-control' name='no_seri' id='no_seri' placeholder='No Seri'>",
			"<input type='text' class='form-control' name='no_perijinan' id='no_perijinan' placeholder='No Perijinan'>",
			"<input type='date' class='form-control' data-date='' data-date-format='YYYY/MM/DD' name='expired_date' id='expired_date' placeholder='2022/11/20'>",
			" ",
			"<button class='btn btn-success btn-sm' onClick='addThisRow()'><i class='fa fa-plus'></i></button>"
		];
		$("#DataTables_Table_0").DataTable().row.add(formsCell).draw();

		dataTableRows.forEach(function callback(row, index) {
			//usinf datatable add every row
			var cells = [(index + 1)];
			usedRows.forEach((key) => {
				if (key === "status") {
					if (row[key] === 'active') {
						//create option for active and processing status
						cells.push('<select class="form-control" id="status-' + index + '" onchange="updateStatus(' + index + ')"><option value="active" selected>Aktif</option><option value="processing">Diproses</option></select>');
					} else if (row[key] === 'processing') {
						//create option for active and processing status
						cells.push('<select class="form-control" id="status-' + index + '" onchange="updateStatus(' + index + ')"><option value="active">Aktif</option><option value="processing" selected>Diproses</option></select>');
					} else {
						cells.push("<span class='badge badge-danger'> Tidak Aktif </span>");
					}
				} else if (typeof(row[key]) === 'undefined') {
					cells.push("");
				} else {
					cells.push(row[key]);
				}

			});
			// add icon button to delete row using jquery $("table tr:eq(2)").remove();
			cells.push("<button class='btn btn-danger btn-sm' onClick='deleteThisRow(" + index + ")'><i class='fa fa-trash'></i></button>");

			$("#DataTables_Table_0").DataTable().row.add(cells).draw();
		})
	}

	function refreshDataTableAddLisensi() {
		$("#DataTables_Table_0").DataTable().clear().draw();
		let usedRows = ["jenis_lisensi", "nama", "seksi", "npk", "no_sio", "masa_berlaku", "status"];
		//create row with forms inside it and in column action add button to add row
		var formsCell = ["", "<input type='text' class='form-control' name='jenis_lisensi' id='jenis_lisensi' placeholder='Jenis Lisensi'>",
			"<input type='text' class='form-control' name='nama' id='nama' placeholder='Nama'>",
			"<input type='text' class='form-control' name='seksi' id='seksi' placeholder='seksi'>",
			"<input type='text' class='form-control' name='npk' id='npk' placeholder='NPK'>",
			"<input type='text' class='form-control' name='no_sio' id='no_sio' placeholder='No Sio'>",
			"<input type='date' class='form-control' data-date='' data-date-format='YYYY/MM/DD' name='masa_berlaku' id='masa_berlaku' placeholder='2022/11/20'>",
			" ",
			"<button class='btn btn-success btn-sm' onClick='addThisRowLisensi()'><i class='fa fa-plus'></i></button>"
		];
		$("#DataTables_Table_0").DataTable().row.add(formsCell).draw();

		dataTableRowsLisensi.forEach(function callback(row, index) {
			//usinf datatable add every row
			var cells = [(index + 1)];
			usedRows.forEach((key) => {
				if (key === "status") {
					if (row[key] === 'active') {
						//create option for active and processing status
						cells.push('<select class="form-control" id="status-' + index + '" onchange="updateStatusLisensi(' + index + ')"><option value="active" selected>Aktif</option><option value="processing">Diproses</option></select>');
					} else if (row[key] === 'processing') {
						//create option for active and processing status
						cells.push('<select class="form-control" id="status-' + index + '" onchange="updateStatusLisensi(' + index + ')"><option value="active">Aktif</option><option value="processing" selected>Diproses</option></select>');
					} else {
						cells.push("<span class='badge badge-danger'> Tidak Aktif </span>");
					}
				} else if (typeof(row[key]) === 'undefined') {
					cells.push("");
				} else {
					cells.push(row[key]);
				}

			});
			// add icon button to delete row using jquery $("table tr:eq(2)").remove();
			cells.push("<button class='btn btn-danger btn-sm' onClick='deleteThisRowLisensi(" + index + ")'><i class='fa fa-trash'></i></button>");

			$("#DataTables_Table_0").DataTable().row.add(cells).draw();
		})
	}

	function addThisRow() {
		//get data from first cell form in datatable
		var nama_alat = $("#nama_alat").val();
		var pabrik_pembuat = $("#pabrik_pembuat").val();
		var kapasitas = $("#kapasitas").val();
		var lokasi = $("#lokasi").val();
		var no_seri = $("#no_seri").val();
		var no_perijinan = $("#no_perijinan").val();
		var expired_date = $("#expired_date").val();
		//if expired_date is yyyy-mm-dd then convert it to yyyy/mm/dd
		if (expired_date.includes("-")) {
			expired_date = expired_date.replace(/-/g, "/");
		}
		var date = new Date(expired_date);
		var status = 'active';
		let today = new Date();
		today.setHours(0, 0, 0, 0);
		if (date < today) {
			status = 'expired';
		} else {
			status = 'active';
		}

		//add data to array
		dataTableRows.push({
			nama_alat: nama_alat,
			pabrik_pembuat: pabrik_pembuat,
			kapasitas: kapasitas,
			lokasi: lokasi,
			no_seri: no_seri,
			no_perijinan: no_perijinan,
			expired_date: expired_date,
			status: status
		});
		//refresh datatable
		refreshDataTableAdd();

	}

	function addThisRowLisensi() {
		//get data from first cell form in datatable
		var jenis_lisensi = $("#jenis_lisensi").val();
		var nama = $("#nama").val();
		var seksi = $("#seksi").val();
		var npk = $("#npk").val();
		var no_sio = $("#no_sio").val();
		var masa_berlaku = $("#masa_berlaku").val();
		//if expired_date is yyyy-mm-dd then convert it to yyyy/mm/dd
		if (masa_berlaku.includes("-")) {
			masa_berlaku = masa_berlaku.replace(/-/g, "/");
		}
		var date = new Date(masa_berlaku);
		var status = 'active';
		let today = new Date();
		today.setHours(0, 0, 0, 0);
		if (date < today) {
			status = 'expired';
		} else {
			status = 'active';
		}

		//add data to array
		dataTableRowsLisensi.push({
			jenis_lisensi: jenis_lisensi,
			nama: nama,
			seksi: seksi,
			npk: npk,
			no_sio: no_sio,
			masa_berlaku: masa_berlaku,
			status: status
		});
		//refresh datatable
		refreshDataTableAddLisensi();

	}

	function deleteThisRow(index) {
		dataTableRows.splice(index, 1);
		if (isAddDocuments) {
			refreshDataTableAdd();
		} else {
			refreshDataTable();
		}
	}

	function deleteThisRowLisensi(index) {
		dataTableRowsLisensi.splice(index, 1);
		if (isAddDocumentsLisensi) {
			refreshDataTableAddLisensi();
		} else {
			refreshDataTableLisensi();
		}
	}

	$(document).ready(function() {
		//init datatable for add documents if isAddDocuments is true
		let url=window.location.href;
		
		if (url.includes("/addLisensi")) {
			refreshDataTableAddLisensi();
		}else if(url.includes("/add")){
			refreshDataTableAdd();
		} else {
			// refreshDataTable();
		}

		$('[data-toggle="tooltip"]').tooltip();

		$('#modal-block-upload').on('show.bs.modal', function(event) {
			var button = $(event.relatedTarget) // Button that triggered the modal
			var id = button.data('id') // Extract info from data-* attributes
			// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
			// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
			var modal = $(this)
			// modal.find('.modal-title').text('New message to ' + recipient)
			$('#form-modal-upload').attr('action', '<?php echo base_url('upload/') ?>' + id);
		})

		$('#file').change(function(e) {
			var files = e.target.files,
				f = files[0];
			var reader = new FileReader();
			reader.onload = function(e) {
				var data = e.target.result;
				var workbook = XLSX.read(data, {
					type: 'binary'
				});
				workbook.SheetNames.forEach(function(sheetName) {
					console.log(sheetName);
					// console.log(sheetName.toLowerCase().includes('all'));
					// if (sheetName.toLowerCase().includes('all')) {
					// Here is your object

					var XL_row_object = XLSX.utils.sheet_to_json(workbook.Sheets[sheetName]);
					var json_object = JSON.stringify(XL_row_object);
					console.log(XL_row_object);
					var rows = [];
					XL_row_object.forEach((obj) => {
						var newobj = {}
						var key, keys = Object.keys(obj);
						var n = keys.length;
						while (n--) {
							console.log(keys[n] + ':' + obj[keys[n]]);
							key = keys[n];
							newobj[key.toLowerCase().trim().replace(" ", "_")] = obj[key].toString();

						}
						// check if is expired date is nan or not
						if (isNaN(newobj.expired_date)) {
							newobj.expired_date = newobj.expired_date;
						} else {
							var serial = newobj['expired_date'];
							// newobj['expired_date'] = newobj['__empty_1'] + "/" + newobj['__empty'] + "/" + newobj['expired'];
							var utc_days = Math.floor(serial - 25569);
							var utc_value = utc_days * 86400;
							var date_info = new Date(utc_value * 1000);

							var fractional_day = serial - Math.floor(serial) + 0.0000001;

							var total_seconds = Math.floor(86400 * fractional_day);

							var seconds = total_seconds % 60;

							total_seconds -= seconds;

							var hours = Math.floor(total_seconds / (60 * 60));
							var minutes = Math.floor(total_seconds / 60) % 60;

							var date = new Date(date_info.getFullYear(), date_info.getMonth(), date_info.getDate(), hours, minutes, seconds);
							// assign date as yyyy/mm/dd string to newobj expired_date
							newobj['expired_date'] = date.getFullYear() + "/" + (date.getMonth() + 1) + "/" + date.getDate();

						}
						// string of yyyy/mm/dd to date
						var expired_date = newobj['expired_date'];
						var date = new Date(expired_date);



						// var date = new Date(newobj['expired_date']);
						// newobj['date'] = date;
						newobj['status'] = 'aktif';
						let today = new Date();
						today.setHours(0, 0, 0, 0);
						if (date < today) {
							newobj['status'] = 'expired';
						} else {
							newobj['status'] = 'active';
						}
						rows.push(newobj);
					})

					mapOfSheet[sheetName] = rows;
					// console.log(json_object);
					console.table(rows);
					console.table(mapOfSheet);

				})
				var html_select_content = "<label for='option-sheet'>select sheet</label>"
				html_select_content += "<select class='form-control' id='option-sheet'>";
				Object.keys(mapOfSheet).forEach((key) => {
					html_select_content += "<option value='" + key + "'>" + key + "</option>";
				})
				html_select_content += "</select>";
				$("#select-sheet").empty();
				$("#select-sheet").append(html_select_content);
			};
			reader.onerror = function(ex) {
				console.log(ex);
			};
			reader.readAsBinaryString(f);
		});

		// load excel file
		$('#load').click(function() {
			var sheet = $('#option-sheet').val();
			dataTableRows = dataTableRows.concat(mapOfSheet[sheet]);
			//load rows to table
			var usedRows = ["nama_alat", "pabrik_pembuat", "kapasitas", "lokasi", "no_seri", "no_perijinan", "expired_date"];
			refreshDataTable();
		})
		// on import-table click then post json from datatable to server
		$('#import-table').click(function() {
			console.log(dataTableRows);
			var jsonObjects = [];
			var usedRows = ["nama_alat", "pabrik_pembuat", "kapasitas", "lokasi", "no_seri", "no_perijinan", "expired_date", "status"];
			dataTableRows.forEach(function callback(row, index) {
				var jsonObject = {};
				usedRows.forEach((key) => {
					if (typeof(row[key]) === 'undefined') {
						jsonObject[key] = "";
					} else {
						jsonObject[key] = row[key];
					}
				});
				jsonObjects.push(jsonObject);
			});
			console.log(JSON.stringify(jsonObjects));
			// var usedRows = ["nama_alat", "pabrik_pembuat", "kapasitas", "lokasi", "no_seri", "no_perijinan", "expired_date"];
			//then post raw json data to  document/imports
			$.ajax({
				url: 'document/imports',
				type: 'POST',
				data: JSON.stringify(jsonObjects),
				success: function(data) {
					console.log(data);
					// alert('success');
					//then locate to root path /
					window.location.href = '<?php echo base_url(); ?>';
				},
				error:function(data){
					console.log(data);
				}
			});

		});
		// when id="exports-table" clicked then get json from <?php echo base_url('document/exports'); ?> and export to excel using XLSX utils
		$('#exports-table').click(function() {
			$.ajax({
				url: 'document/exports',
				type: 'GET',
				//specify dataType to json
				dataType: 'json',
				success: function(data) {
					console.log(data);
					//then locate to root path /
					var wb = XLSX.utils.book_new();
					var ws = XLSX.utils.json_to_sheet(data);
					XLSX.utils.book_append_sheet(wb, ws, "reports 1");
					//write with name document-export-<current date>.xlsx
					XLSX.writeFile(wb, "document-export-" + new Date().toISOString().slice(0, 10) + ".xlsx");
				}
			});
		});

		// script untuk cetak data karyawan
		// $('#exports-table-karyawan').click(function() {
		// 	$.ajax({
		// 		url: 'document/exportsKar',
		// 		type: 'GET',
		// 		//specify dataType to json
		// 		dataType: 'json',
		// 		success: function(data) {
		// 			console.log(data);
		// 			//then locate to root path /
		// 			var wb = XLSX.utils.book_new();
		// 			var ws = XLSX.utils.json_to_sheet(data);
		// 			XLSX.utils.book_append_sheet(wb, ws, "reports 1");
		// 			//write with name document-export-<current date>.xlsx
		// 			XLSX.writeFile(wb, "data-karyawan-ehs-" + new Date().toISOString().slice(0, 10) + ".xlsx");
		// 		}
		// 	});
		// });

		// // script untuk cetak data shift 
		// $('#exports-table-shift').click(function() {
		// 	$.ajax({
		// 		url: 'document/exportsShift',
		// 		type: 'GET',
		// 		//specify dataType to json
		// 		dataType: 'json',
		// 		success: function(data) {
		// 			console.log(data);
		// 			//then locate to root path /
		// 			var wb = XLSX.utils.book_new();
		// 			var ws = XLSX.utils.json_to_sheet(data);
		// 			XLSX.utils.book_append_sheet(wb, ws, "reports 1");
		// 			//write with name document-export-<current date>.xlsx
		// 			XLSX.writeFile(wb, "data-shift-kerja-ehs-" + new Date().toISOString().slice(0, 10) + ".xlsx");
		// 		}
		// 	});
		// });
		
		// // script untuk cetak data material dalam proses wwt 
		// $('#exports-table-proseswwt').click(function() {
		// 	$.ajax({
		// 		url: 'produksi/exportsProsesWWT',
		// 		type: 'GET',
		// 		//specify dataType to json
		// 		dataType: 'json',
		// 		success: function(data) {
		// 			console.log(data);
		// 			//then locate to root path /
		// 			var wb = XLSX.utils.book_new();
		// 			var ws = XLSX.utils.json_to_sheet(data);
		// 			XLSX.utils.book_append_sheet(wb, ws, "reports 1");
		// 			//write with name document-export-<current date>.xlsx
		// 			XLSX.writeFile(wb, "data-pemakaian-material-proses-wwt-" + new Date().toISOString().slice(0, 10) + ".xlsx");
		// 		}
		// 	});
		// });

		$('[data-toggle="tooltip-lisensi"]').tooltip();

		$('#modal-block-upload-lisensi').on('show.bs.modal', function(event) {
			var button = $(event.relatedTarget) // Button that triggered the modal
			var id = button.data('id') // Extract info from data-* attributes
			// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
			// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
			var modal = $(this)
			// modal.find('.modal-title').text('New message to ' + recipient)
			$('#form-modal-upload-lisensi').attr('action', '<?php echo base_url('uploadLisensi/') ?>' + id);
		})

		$('#fileLisensi').change(function(e) {
			var files = e.target.files,
				f = files[0];
			var reader = new FileReader();
			reader.onload = function(e) {
				var data = e.target.result;
				var workbook = XLSX.read(data, {
					type: 'binary'
				});
				workbook.SheetNames.forEach(function(sheetName) {
					console.log(sheetName);
					// console.log(sheetName.toLowerCase().includes('all'));
					// if (sheetName.toLowerCase().includes('all')) {
					// Here is your object

					var XL_row_object = XLSX.utils.sheet_to_json(workbook.Sheets[sheetName]);
					var json_object = JSON.stringify(XL_row_object);
					console.log(XL_row_object);
					var rows = [];
					XL_row_object.forEach((obj) => {
						var newobj = {}
						var key, keys = Object.keys(obj);
						var n = keys.length;
						while (n--) {
							console.log(keys[n] + ':' + obj[keys[n]]);
							key = keys[n];
							newobj[key.toLowerCase().trim().replace(" ", "_")] = obj[key].toString();

						}
						// check if is expired date is nan or not
						if (isNaN(newobj.masa_berlaku)) {
							newobj.masa_berlaku = newobj.masa_berlaku;
						} else {
							var serial = newobj['masa_berlaku'];
							// newobj['expired_date'] = newobj['__empty_1'] + "/" + newobj['__empty'] + "/" + newobj['expired'];
							var utc_days = Math.floor(serial - 25569);
							var utc_value = utc_days * 86400;
							var date_info = new Date(utc_value * 1000);

							var fractional_day = serial - Math.floor(serial) + 0.0000001;

							var total_seconds = Math.floor(86400 * fractional_day);

							var seconds = total_seconds % 60;

							total_seconds -= seconds;

							var hours = Math.floor(total_seconds / (60 * 60));
							var minutes = Math.floor(total_seconds / 60) % 60;

							var date = new Date(date_info.getFullYear(), date_info.getMonth(), date_info.getDate(), hours, minutes, seconds);
							// assign date as yyyy/mm/dd string to newobj expired_date
							newobj['masa_berlaku'] = date.getFullYear() + "/" + (date.getMonth() + 1) + "/" + date.getDate();

						}
						// string of yyyy/mm/dd to date
						var masa_berlaku = newobj['masa_berlaku'];
						var date = new Date(masa_berlaku);



						// var date = new Date(newobj['expired_date']);
						// newobj['date'] = date;
						newobj['status'] = 'aktif';
						let today = new Date();
						today.setHours(0, 0, 0, 0);
						if (date < today) {
							newobj['status'] = 'expired';
						} else {
							newobj['status'] = 'active';
						}
						rows.push(newobj);
					})

					mapOfSheetLisensi[sheetName] = rows;
					// console.log(json_object);
					console.table(rows);
					console.table(mapOfSheetLisensi);

				})
				var html_select_content = "<label for='option-sheet'>select sheet</label>"
				html_select_content += "<select class='form-control' id='option-sheet'>";
				Object.keys(mapOfSheetLisensi).forEach((key) => {
					html_select_content += "<option value='" + key + "'>" + key + "</option>";
				})
				html_select_content += "</select>";
				$("#select-sheet").empty();
				$("#select-sheet").append(html_select_content);
			};
			reader.onerror = function(ex) {
				console.log(ex);
			};
			reader.readAsBinaryString(f);
		});

		// load excel file
		$('#loadLisensi').click(function() {
			var sheet = $('#option-sheet').val();
			dataTableRowsLisensi = dataTableRowsLisensi.concat(mapOfSheetLisensi[sheet]);
			//load rows to table
			var usedRows = ["jenis_lisensi", "nama", "seksi", "npk", "no_sio", "masa_berlaku","status"];
			refreshDataTableLisensi();
		})

		
		// on import-table click then post json from datatable to server
		$('#import-table-lisensi').click(function() {
			console.log(dataTableRowsLisensi);
			var jsonObjects = [];
			var usedRows = ["jenis_lisensi", "nama", "seksi", "npk", "no_sio", "masa_berlaku", "status"];
			dataTableRowsLisensi.forEach(function callback(row, index) {
				var jsonObject = {};
				usedRows.forEach((key) => {
					if (typeof(row[key]) === 'undefined') {
						jsonObject[key] = "";
					} else {
						jsonObject[key] = row[key];
					}
				});
				jsonObjects.push(jsonObject);
			});
			console.log(JSON.stringify(jsonObjects));
			// var usedRows = ["nama_alat", "pabrik_pembuat", "kapasitas", "lokasi", "no_seri", "no_perijinan", "expired_date"];
			//then post raw json data to  document/imports
			$.ajax({
				url: 'document/importsLisensi',
				type: 'POST',
				data: JSON.stringify(jsonObjects),
				success: function(data) {
					console.log(data);
					// alert('success');
					//then locate to root path /
					window.location.href = '<?php echo base_url(); ?>';
				}
			});

		});

		// when id="exports-table" clicked then get json from <?php echo base_url('document/exports'); ?> and export to excel using XLSX utils
		$('#exports-table-lisensi').click(function() {
			$.ajax({
				url: 'document/exportsLisensi',
				type: 'GET',
				//specify dataType to json
				dataType: 'json',
				success: function(data) {
					console.log(data);
					//then locate to root path /
					var wb = XLSX.utils.book_new();
					var ws = XLSX.utils.json_to_sheet(data);
					XLSX.utils.book_append_sheet(wb, ws, "reports 1");
					//write with name document-export-<current date>.xlsx
					XLSX.writeFile(wb, "document-export-lisensi-" + new Date().toISOString().slice(0, 10) + ".xlsx");
				}
			});
		});
	});
</script>

</body>

</html>
