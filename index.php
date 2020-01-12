<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" integrity="sha256-+N4/V/SbAFiW1MPBCXnfnP9QSN3+Keu+NlB+0ev/YKQ=" crossorigin="anonymous" />

<div class="container">
<div class="row">
<div class="col-lg-12">
<hr>
<style>
    body{
        overflow-y: scroll;
    }
	.status{
		display: none;
	}
</style>
</div>


<div class="col-lg-12">
    <h2><b>ALSER</b> <small>to <b>CSV</b></small></h2>

</div>
<div class="col-lg-11">
	<button type="button" class="btn btn-primary load_file">Загрузить структуру <i class="fas fa-sitemap"></i></button>
	<!--  -->
	<button type="button" class="btn btn-secondary load_all_file">Комплексная выгрузка <i class="fas fa-save"></i></button>


</div>
<div class="col-lg-1">
	<div style="float:right;" class="spinner-border status" role="status">
	  <span class="sr-only">Loading...</span>
	</div>
</div>
<div class="col-lg-12">
    <p></p>
    <div class="alert alert-primary" role="alert">
      <i class="fas fa-user-clock"></i> Комплексная загрузка може занять некоторое время. Будьте терпеливы. <a href="#" style="float:right;">Инструкия и информация ></a>
    </div>
    <p></p>
    <hr>
	<div class="results">
	</div>
</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<script>
	$(document).ready(function(){
		$('.load_file').click(function(){
			$('.status').fadeIn('fast');
			$.ajax({
			  url: '/modules/get_top_cat.php',
			  success: function(data) {
			    $('.results').html(data);
			  }
			});
		});
	});
</script>
