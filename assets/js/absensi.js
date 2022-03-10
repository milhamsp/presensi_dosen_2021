$(document).ready(function(){
			$('#hari').change(function(){ 
                var hari=$(this).val();
                $("#dosen").val("");
                $("div.form-group select.form-control[name=kelas]").val("");
                $("div.form-group select.form-control[name=mtkuliah]").val("");
                $.ajax({
                    url : "<?php echo site_url('main/get_dosen');?>",
                    method : "POST",
                    data : {hari: hari},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        // var html = '<option value="">--Pilih--</option>';
                        var i;
                        var dosen = [];
                        // $('#dosen').html(html);
                        for(i=0; i<data.length; i++){
                            
                            dosen.push(data[i].DOSEN);
                            // html += '<option value="'+data[i].DOSEN+'">'+data[i].DOSEN+'</option>';
                        }
                        // console.log(dosen);
                        $("#dosen").autocomplete({
		                	source: dosen
		                });
                        $( "#dosen" ).autocomplete( "option", "appendTo", "#absen" );
                    }
                });
                return false;
            });
			$('#dosen').change(function(){ 
                var dosen=$(this).val();
                var hari=$('#hari').val();
                $("div.form-group select.form-control[name=mtkuliah]").val("");
                $.ajax({
                    url : "<?php echo site_url('main/get_kelas');?>",
                    method : "POST",
                    data : {dosen: dosen, hari:hari},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        var html = '<option value="">--Pilih--</option>';
                        var i;
                        $('#kelas').html(html);
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].KELAS+'>'+data[i].KELAS+'</option>';
                        }
                        $('#kelas').html(html);
                    }
                });
                return false;
            });
            $('#kelas').change(function(){ 
                var kelas=$(this).val();
                var dosen=$('#dosen').val();
                var hari=$('#hari').val();
                $.ajax({
                    url : "<?php echo site_url('main/get_mtkuliah');?>",
                    method : "POST",
                    data : {kelas: kelas,dosen:dosen,hari:hari},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        var html = '<option value="">--Pilih--</option>';
                        var i;
                        $('#mtkuliah').html(html);
                        for(i=0; i<data.length; i++){
                            html += '<option value="'+data[i].MTKULIAH+'">'+data[i].MTKULIAH+'</option>';
                        }
                        $('#mtkuliah').html(html);
                    }
                });
                return false;
            });
		});