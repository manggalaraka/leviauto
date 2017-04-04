
        <script type="text/javascript">
        //iCheckbox and iRadion - custom elements
            function init_checkbox(){
                if($(".icheckbox").length > 0){
                     $(".icheckbox,.iradio").on('ifCreated ifClicked ifChanged ifChecked ifUnchecked ifDisabled ifEnabled ifDestroyed check ', function(event){ 
                     var id = $(this).attr('id');
                     var val = $(this).attr('value');
                    if(event.type ==="ifChecked"){
                        var type = "add";
                        $(this).trigger('click');  
                        $('input').iCheck('update');
                        generate_value(type,val);
                    }
                    if(event.type ==="ifUnchecked"){
                        var type = "min";
                        $(this).trigger('click');  
                        $('input').iCheck('update');
                        generate_value(type,val);
                    }       
                    }).iCheck({
                        checkboxClass: 'icheckbox_minimal-grey',radioClass: 'iradio_minimal-grey',
                        increaseArea: '20%'
                    });
                }
            } 

            function generate_value(type,data){
                $.ajax({
                  type: "post",
                  url: "<?php echo site_url('/layanan/generate_waktu_harga')?>",
                  cache:"false",
                  dataType: "json",
                  data: {   'data_type':type,
                            'data_encode':data},
                  success: function(result){
                        set_harga(result[0]);            
                        set_waktu(result[1]);
                   },
                    error: function(data) {
                       alert("gagal generate value");
                    }
                });  
            }

            function set_harga(harga){
                var getHarga = parseFloat(document.getElementById("harga").value);
                var setHarga = getHarga + parseFloat(harga);
                document.getElementById("harga").value = setHarga;
            }   

            function set_waktu(waktu){
                var getWaktu = document.getElementById("estimasi_waktu").value;     
                var times = getWaktu.split(":");   
                var hours = times [0]
                var minutes = times[1];
                var seconds = times[2];
                seconds =  (parseFloat(hours)*3600)+ (parseFloat(minutes) * 60)+ parseFloat(seconds); 
                var kalkulasi = seconds+waktu;
                var setwaktu =secondsToHms(kalkulasi);   
                document.getElementById("estimasi_waktu").value = setwaktu; 
            }

            function secondsToHms(d) {
                d = Number(d);
                var h = Math.floor(d / 3600);
                var m = Math.floor(d % 3600 / 60);
                var s = Math.floor(d % 3600 % 60);
                  var result = (h < 10 ? "0" + h : h);
                      result += ":" + (m < 10 ? "0" + m : m);
                      result += ":" + (s  < 10 ? "0" + s : s);
                  return result;
            }

            function set_harga_waktu(harga,waktu){ 
            }

            init_checkbox();

        </script>
