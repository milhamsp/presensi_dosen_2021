$(document).ready(function() {
		    $('#tbl_absen').DataTable({
		    	"autoWidth": false,
		    	dom: 'Bfrtip',
			    buttons: [{
	                extend: 'excelHtml5',
	                title: 'Absensi Dosen',
	                text: '<i class="bi-file-earmark-excel mx-1"></i>Export'
	            }],
	            initComplete: function () {
		            var btns = $('.dt-button');
		            btns.addClass('btn btn-primary');
		            btns.removeClass('dt-button');
		        }
			});
			var mg;
			for(mg=1;mg<=14;mg++){
				$('#tbl_monkos_'+mg).DataTable({
			    	"autoWidth": false,
			    	dom: 'Bfrtip',
			    	buttons: [{
		                extend: 'excelHtml5',
		                title: 'Monitoring Minggu ke-'+mg,
		                text: '<i class="bi-file-earmark-excel"></i> Export'
		            }],
		            "columnDefs": [{
		                "targets": [ 0 ],
		                "visible": false,
		                "searchable": true
		            },
		            {
		                "targets": [ 13 ],
		                "visible": false,
		                "searchable": true
		            }],
		            initComplete: function () {
			            var btns = $('.dt-button');
			            btns.addClass('btn btn-primary');
			            btns.removeClass('dt-button');
			        }
				});

				$('#tbl_tot_'+mg).DataTable({
			    	"autoWidth": false,
			    	dom: 'Bfrtip',
			    	buttons: [{
		                extend: 'excelHtml5',
		                title: 'Totalan Minggu ke-'+mg,
		                text: '<i class="bi-file-earmark-excel"></i> Export'
		            }],
		            initComplete: function () {
			            var btns = $('.dt-button');
			            btns.addClass('btn btn-primary');
			            btns.removeClass('dt-button');
			        }
				});

				$('#tbl_tot_reg_'+mg).DataTable({
				    	"autoWidth": false,
				    	dom: 'Bfrtip',
				    	buttons: [{
			                extend: 'excelHtml5',
			                title: 'Totalan Region Minggu ke-'+mg,
			                text: '<i class="bi-file-earmark-excel"></i> Export'
			            }],
			            "columnDefs": [
			            {
			                "targets": [ 12 ],
			                "visible": true,
			                "searchable": true
			            }],
			            initComplete: function () {
				            var btns = $('.dt-button');
				            btns.addClass('btn btn-primary');
				            btns.removeClass('dt-button');
				        }
					});

				/*$('#tot_region_'+mg).change(function(){ 
	                var tot_reg=$(this).val();
	                
	            });*/
			}
			var table1 = $('#tbl_monkos_1').DataTable();
			$('#region_1').on('change', function(){
			    table1.column(13).search(this.value).draw();
			});
			var table2 = $('#tbl_monkos_2').DataTable();
			$('#region_2').on('change', function(){
			    table2.column(13).search(this.value).draw();
			});
			var table3 = $('#tbl_monkos_3').DataTable();
			$('#region_3').on('change', function(){
			    table3.column(13).search(this.value).draw();
			});
			var table4 = $('#tbl_monkos_4').DataTable();
			$('#region_4').on('change', function(){
			    table4.column(13).search(this.value).draw();
			});
			var table5 = $('#tbl_monkos_5').DataTable();
			$('#region_5').on('change', function(){
			    table5.column(13).search(this.value).draw();
			});
			var table6 = $('#tbl_monkos_6').DataTable();
			$('#region_6').on('change', function(){
			    table6.column(13).search(this.value).draw();
			});
			var table7 = $('#tbl_monkos_7').DataTable();
			$('#region_7').on('change', function(){
			    table7.column(13).search(this.value).draw();
			});
			var table8 = $('#tbl_monkos_8').DataTable();
			$('#region_8').on('change', function(){
			    table8.column(13).search(this.value).draw();
			});
			var table9 = $('#tbl_monkos_9').DataTable();
			$('#region_9').on('change', function(){
			    table9.column(13).search(this.value).draw();
			});
			var table10 = $('#tbl_monkos_10').DataTable();
			$('#region_10').on('change', function(){
			    table10.column(13).search(this.value).draw();
			});
			var table11 = $('#tbl_monkos_11').DataTable();
			$('#region_11').on('change', function(){
			    table11.column(13).search(this.value).draw();
			});
			var table12 = $('#tbl_monkos_12').DataTable();
			$('#region_12').on('change', function(){
			    table12.column(13).search(this.value).draw();
			});
			var table13 = $('#tbl_monkos_13').DataTable();
			$('#region_13').on('change', function(){
			    table13.column(13).search(this.value).draw();
			});
			var table14 = $('#tbl_monkos_14').DataTable();
			$('#region_14').on('change', function(){
			    table14.column(13).search(this.value).draw();
			});

			var tabletot_1 = $('#tbl_tot_reg_1').DataTable();
			$('#tot_region_1').on('change', function(){
			    tabletot_1.column(12).search(this.value).draw();
			});
			var tabletot_2 = $('#tbl_tot_reg_2').DataTable();
			$('#tot_region_2').on('change', function(){
			    tabletot_2.column(12).search(this.value).draw();
			});
			var tabletot_3 = $('#tbl_tot_reg_3').DataTable();
			$('#tot_region_3').on('change', function(){
			    tabletot_3.column(12).search(this.value).draw();
			});
			var tabletot_4 = $('#tbl_tot_reg_4').DataTable();
			$('#tot_region_4').on('change', function(){
			    tabletot_4.column(12).search(this.value).draw();
			});
			var tabletot_5 = $('#tbl_tot_reg_5').DataTable();
			$('#tot_region_5').on('change', function(){
			    tabletot_5.column(12).search(this.value).draw();
			});
			var tabletot_6 = $('#tbl_tot_reg_6').DataTable();
			$('#tot_region_6').on('change', function(){
			    tabletot_6.column(12).search(this.value).draw();
			});
			var tabletot_7 = $('#tbl_tot_reg_7').DataTable();
			$('#tot_region_7').on('change', function(){
			    tabletot_7.column(12).search(this.value).draw();
			});
			var tabletot_8 = $('#tbl_tot_reg_8').DataTable();
			$('#tot_region_8').on('change', function(){
			    tabletot_8.column(12).search(this.value).draw();
			});
			var tabletot_9 = $('#tbl_tot_reg_9').DataTable();
			$('#tot_region_9').on('change', function(){
			    tabletot_9.column(12).search(this.value).draw();
			});
			var tabletot_10 = $('#tbl_tot_reg_10').DataTable();
			$('#tot_region_10').on('change', function(){
			    tabletot_10.column(12).search(this.value).draw();
			});
			var tabletot_11 = $('#tbl_tot_reg_11').DataTable();
			$('#tot_region_11').on('change', function(){
			    tabletot_11.column(12).search(this.value).draw();
			});
			var tabletot_12 = $('#tbl_tot_reg_12').DataTable();
			$('#tot_region_12').on('change', function(){
			    tabletot_12.column(12).search(this.value).draw();
			});
			var tabletot_13 = $('#tbl_tot_reg_13').DataTable();
			$('#tot_region_13').on('change', function(){
			    tabletot_13.column(12).search(this.value).draw();
			});
			var tabletot_14 = $('#tbl_tot_reg_14').DataTable();
			$('#tot_region_14').on('change', function(){
			    tabletot_14.column(12).search(this.value).draw();
			});
		});
