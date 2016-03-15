	<script type="text/javascript">
		function select_city(){
			var x = document.getElementById("selectCity");
			var i = x.selectedIndex;
			if(i != 0)
			{
				var url1="index.php?page=<?php echo $page; ?>&city=";
				var url2= x.options[i].text;
				var url = url1.concat(url2);
				window.location= url;
			}
			else
			{
				var url="index.php?page=<?php echo $page; ?>";
				window.location= url;
			}
		}
	</script>
	<main class="cd-main-content">
		<div class="cd-tab-filter-wrapper">
			<div class="cd-tab-filter">
				<ul class="cd-filters">
					<li class="placeholder"> 
						<a data-type="tree" href="#0"><?php echo $_SESSION["tree"]; ?></a> <!-- selected option on mobile -->
					</li> 
					<li class="filter"><a class="selected" href="#0" data-type="all"><?php echo $_SESSION["tree"]; ?></a></li>
				</ul> <!-- cd-filters -->
			</div> <!-- cd-tab-filter -->
		</div> <!-- cd-tab-filter-wrapper -->

		<div class="cd-filter">
			<form method="post" action="index.php?page=home">
				<div class="cd-filter-block">
					<h4>Search</h4>
					<div class="cd-filter-content">
						<input type="search" placeholder="aranacak kelime...">
					</div> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->

				<div class="cd-filter-block">
					<h4>Şehir Seç</h4>
					
					<div class="cd-filter-content">
						<div class="cd-select cd-filters">
							<select class="filter" onchange="select_city()" name="selectCity" id="selectCity">
								<a href="index.php?page='$page'"> <option value="">---</option> </a>
								<?php 	
									for($i=0;$i<count($cities);$i++){
										$city1 = $cities[$i];  
								?>
								<a href="index.php?page='$page'"><option value='<?php echo $city1["city"]; ?>' 
									<?php if(isset($_GET['city']) && $_GET['city']==$city1["city"]) echo "selected"; ?> > <?php echo $city1["city"]; ?> </option></a>
								<?php } ?>
							</select>
						</div> <!-- cd-select -->
					</div> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->

				<div class="cd-filter-block">
					<h4>Check boxes</h4>

					<ul class="cd-filter-content cd-filters list">
						<li>
							<input class="filter" data-filter=".check1" type="checkbox" id="checkbox1">
			    			<label class="checkbox-label" for="checkbox1">Option 1</label>
						</li>

						<li>
							<input class="filter" data-filter=".check2" type="checkbox" id="checkbox2">
							<label class="checkbox-label" for="checkbox2">Option 2</label>
						</li>

						<li>
							<input class="filter" data-filter=".check3" type="checkbox" id="checkbox3">
							<label class="checkbox-label" for="checkbox3">Option 3</label>
						</li>
					</ul> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->

				<div class="cd-filter-block">
					<h4>Radio buttons</h4>

					<ul class="cd-filter-content cd-filters list">
						<li>
							<input class="filter" data-filter="" type="radio" name="radioButton" id="radio1" checked>
							<label class="radio-label" for="radio1">All</label>
						</li>

						<li>
							<input class="filter" data-filter=".radio2" type="radio" name="radioButton" id="radio2">
							<label class="radio-label" for="radio2">Choice 2</label>
						</li>

						<li>
							<input class="filter" data-filter=".radio3" type="radio" name="radioButton" id="radio3">
							<label class="radio-label" for="radio3">Choice 3</label>
						</li>
					</ul> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->
			</form>

			<a href="#0" class="cd-close">Kapat</a>
		</div> <!-- cd-filter -->

		<a href="#0" class="cd-filter-trigger">Filtreler</a>
	
<script src="content_filter/js/jquery-2.1.1.js"></script>
<script src="content_filter/js/jquery.mixitup.min.js"></script>
<script src="content_filter/js/main.js"></script> <!-- Resource jQuery -->
