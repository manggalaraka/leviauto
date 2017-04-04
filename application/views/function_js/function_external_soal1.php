<script>
function exe_soal1(){
	var get_nilai = document.getElementById("nilai_awal").value;

	if(get_nilai == null || isNaN(get_nilai)){
		alert("pastikan nilai tidak kosong dan berupa angka");
	}else{
		post_nilai(get_nilai);
	}
}

function post_nilai(nilai){
	$.ajax({
	      type: "post",
          cache:"false",
          dataType: "json",
	      url : "<?php echo site_url('soal1/converter_to_decimal')?>",
	      data: {'nilai': nilai},
	      success: function(result){
	      	alert("hasil convert decimal ke biner "+ result)
	      },
	      error: function(result) {
	      	alert("request gagal");
	      }
	      });	

}
</script>