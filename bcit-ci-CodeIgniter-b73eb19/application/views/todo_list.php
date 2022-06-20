
<!doctype html>
<html lang="tr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>TODO List</title>
	<?php $this->load->view("dependencies/style"); ?>


</head>
<body>
<br>
<br>
<div class="container">

	<h3 class="text-center">Yapılması Gerekenler</h3>
	<br>
	<div class="row">
		<div class="col-md-12">

			<form method="post" action="<?php echo base_url("todo/insert"); ?>" >
				<div class="row">
					<div class="col-md-11 form-group">

						<input required placeholder="Görev gir.." name="todo_title" type="text" class="form-control">

					</div>



				<div class="col-md-12">
					<div class="row">
						<div class="col-md-11 form-group">
							<select required  name="todo_priority" class="form-control">
								<option value="Öncelik Belirtilmedi">Öncelik Belirtilmedi</option>
								<option value="Çok Yüksek Öncelik">Çok Yüksek Öncelik</option>
								<option value="Yüksek Öncelik">Yüksek Öncelik</option>
								<option value="Normal Öncelik">Normal Öncelik</option>
								<option value="Düşük Öncelik">Düşük Öncelik</option>




							</select>
						</div>

					</div>




				</div>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-11 form-group">
						<label>İsteğe Bağlı Bitmesi Gereken Tarihi Girebilirsiniz :</label>
								<br>

								<input  placeholder="İsteğe Bağlı Bitmesi Gereken Tarih Ekleyebilirsiniz." type="date" name="todo_finishdate" class="form-control">
							</div>

						</div>
						<div class="col-md-12 text-center">

							<button class = "btn btn-primary">KAYDET</button>

							<br>
							<br>
							<br>
							<br>
						</div>


			</form>

		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered table-hover table-striped">

				<thead>
				<th class ="text-center">Oluşturulan Tarih</th>
				<th class ="text-center">Açıklama</th>
				<th class ="text-center">Durum</th>
				<th class = "text-center">Öncelik</th>
				<th class ="text-center">Bitmesi Gereken Tarihi</th>
				<th class ="text-center">Sil</th>
				</thead>
				<tbody>
				<?php foreach($todos as $todo){ ?>

				<tr>
					<td>


					<?php echo date('d-m-Y',strtotime($todo->createdAt)); ?>
					</td>
					<td class="text-left" style="word-wrap:break-word; max-width:300px; ">
						<label><?php echo $todo->title; ?></label>
					</td>

					<td class="text-center">
						<input
								type="checkbox"
								data-url="<?php echo base_url("todo/iscompletedsetter/$todo->id") ?>"
								class="js-switch" <?php echo ($todo->isCompleted) ? "checked" : ""; ?> />
					</td>
					<td class="text-center">
					<?php echo $todo->priority; ?>




					</td>

					<td class ="text-center">
						<?php
						if($todo->finishdate!=NULL){
							echo date('d-m-Y',strtotime($todo->finishdate)) ;
						}else{
							echo 'Tarih Belirtilmedi';
						}
						?>





					</td>
					<td class="text-center">
						<a href="<?php echo base_url("todo/delete/$todo->id"); ?>" class="btn btn-danger">Sil</a>

					</td>
				</tr>
				<?php }  ?>

				</tbody>


			</table>



		</div>


	</div>

</div>


<?php $this->load->view("dependencies/scripts"); ?>
</body>
</html>

