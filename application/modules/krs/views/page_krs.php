<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

#myProgress 
    {
    width: 100%;
    background-color: #ddd;
    }

#myBar 
    {
    width: 10%;
    height: 30px;
    background-color: #4CAF50;
    text-align: center;
    line-height: 30px;
    color: white;
    }
.class1
{
     color: orange;
}
	</style>
</head>
<body>
<button id = "buttoncari" onclick = "cari()">Tampilkan Data</button>
<button id = "buttonLogin" onclick = "displayLoginBox()">Infort Data</button>
<div id = "cari"> 
		 <form action="<?php echo base_url('krs') ?>" method="POST">
                            <div class="row form-group">
                                <div class="col col-md-4">
                                    <div class="form-group">
                                        <label for="nf-email" class=" form-control-label">Tahun</label>	<br>
                                        <select class="form-control-sm form-control" name="tahun">
                                            <option value="">Please Select</option>
                                            <?php
                                            $thn_skr = date('Y');
                                            for ($x = $thn_skr; $x >= 2010; $x--) {
                                                ?>
                                            <option value="<?php echo $x ?>">
                                                <?php echo $x ?>
                                            </option>
                                            <?php

                                        }
                                        ?>
                                        </select>
											<br>
                                    </div>
                                    <div class="form-group">
                                        <label for="selectSm" class=" form-control-label">Semester</label>
											<br>
                                        <select name="semester" id="SelectLm" class="form-control-sm form-control">
                                            <option value="">Please select</option>
                                            <option value="1">Ganjil</option>
                                            <option value="2">Genap</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="selectSm" class=" form-control-label">Program Studi</label>
										<br>
                                        <select name="prodi" id="SelectLm" class="form-control-sm form-control">
                                            <option value="">Please select</option>
                                            <option value="54201">AGRIBISNIS</option>
                                            <option value="54211">AGROTEKNOLOGI</option>
                                            <option value="63201">ILMU ADMINISTRASI NEGARA</option>
                                            <option value="63101">ILMU ADMINISTRASI PUBLIK</option>
                                            <option value="74201">ILMU HUKUM</option>
                                            <option value="61201">MANAJEMEN</option>
                                            <option value="86208">PENDIDIKAN AGAMA ISLAM</option>
                                            <option value="88203">PENDIDIKAN BAHASA INGGRIS</option>
                                            <option value="34401">TEKNIK GEOLOGI</option>
                                            <option value="31201">TEKNIK PERTAMBANGAN</option>
                                            <option value="86203">TEKNOLOGI PENDIDIKAN</option>
                                        </select>
                                    </div>
									<br>
                                    <div style="overflow:auto;">
                                        <div>
                                            <button type="submit" onclick="move()" id="nextBtn">Tampilkan Data</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
</div>
<div id = "text_dumet"> 
   <form action="<?php echo base_url('krs/infort') ?>" method="POST">
                            <div class="row form-group">
                                <div class="col col-md-4">
                                    <div class="form-group">
                                        <label for="nf-email" class=" form-control-label">Tahun</label>	<br>
                                        <select class="form-control-sm form-control" name="tahun">
                                            <option value="">Please Select</option>
                                            <?php
                                            $thn_skr = date('Y');
                                            for ($x = $thn_skr; $x >= 2010; $x--) {
                                                ?>
                                            <option value="<?php echo $x ?>">
                                                <?php echo $x ?>
                                            </option>
                                            <?php

                                        }
                                        ?>
                                        </select>
											<br>
                                    </div>
                                    <div class="form-group">
                                        <label for="selectSm" class=" form-control-label">Semester</label>
											<br>
                                        <select name="semester" id="SelectLm" class="form-control-sm form-control">
                                            <option value="">Please select</option>
                                            <option value="1">Ganjil</option>
                                            <option value="2">Genap</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="selectSm" class=" form-control-label">Program Studi</label>
										<br>
                                        <select name="prodi" id="SelectLm" class="form-control-sm form-control">
                                            <option value="">Please select</option>
                                            <option value="54201">AGRIBISNIS</option>
                                            <option value="54211">AGROTEKNOLOGI</option>
                                            <option value="63201">ILMU ADMINISTRASI NEGARA</option>
                                            <option value="63101">ILMU ADMINISTRASI PUBLIK</option>
                                            <option value="74201">ILMU HUKUM</option>
                                            <option value="61201">MANAJEMEN</option>
                                            <option value="86208">PENDIDIKAN AGAMA ISLAM</option>
                                            <option value="88203">PENDIDIKAN BAHASA INGGRIS</option>
                                            <option value="34401">TEKNIK GEOLOGI</option>
                                            <option value="31201">TEKNIK PERTAMBANGAN</option>
                                            <option value="86203">TEKNOLOGI PENDIDIKAN</option>
                                        </select>
                                    </div>
									<br>
                                    <div style="overflow:auto;">
                                        <div>
                                            <button type="submit" onclick="move()" id="nextBtn">Tranfer Data</button>
											  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
</div>
<br>
	 
    <div id="myBar" class="w3-green" style="height:27px;width:0"></div>			
	<table>
	
		<tr>
			<th>No</th>
			<th>Nim</th>
			<th>Nama</th>
			<th>Kode MK</th>
			<th>Nama MK</th>
			<th>Kelas</th>
			<th>Semester</th>
			<th>Prodi</th>
		</tr>
		
		 <?php if(is_array($krs)): ?>
		 <?php $no=1; foreach($krs as $n):?>
		
		<tr>
			<td><?=$no?></td>
			<td><?=$n->nim;?></td>
			<td><?=$n->nama_mahasiswa;?></td>
			<td><?=$n->kode_mata_kuliah;?></td>
			<td><?=$n->nama_mata_kuliah;?></td>
			<td><?=$n->kelas;?></td>
			<td><?=$n->semester;?></td>
			<td><?=$n->kode_program_studi;?></td>
		</tr>
		
		 <?php $no++; endforeach;?>
		  <?php endif; ?>
	</table>
	<script>
function move() {
  var elem = document.getElementById("myBar");   
  var width = 1;
  var id = setInterval(frame, 10);
  function frame() {
    if (width >= 100) {
      clearInterval(id);
    } else {
      width++; 
      elem.style.width = width + '%'; 
    }
  }
}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
$("#text_dumet").hide();
$('#buttonLogin').on('click', function(e){
    $("#text_dumet").toggle();
    $(this).toggleClass('class1')
});
</script>
<script>
$("#cari").hide();
$('#buttoncari').on('click', function(e){
    $("#cari").toggle();
    $(this).toggleClass('class1')
});
</script>

</body>
</html>