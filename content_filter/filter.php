	<script type="text/javascript">
		function select_city(){
			alert("city");
			var x = document.getElementById("selectCity");
			var i = x.selectedIndex;
			if(i != 0)
			{
				var url1="?page=<?php echo $page; ?>&city=";
				var url2=x.options[i].text;
				var url3="<?php if (!empty($_SESSION['filter_category'])) { echo '&filter='.$_SESSION['filter_category']; } ?>";
				var url = url1.concat(url2);
				url = url.concat(url3);
				window.location= url;
			}
			else
			{
				var url="index.php?page=<?php echo $page; ?>";
				var url3="<?php echo $_SESSION['filter_category']; ?>";
				url = url.concat(url3);
				window.location= url;
			}
		}
		function main_category_filter(){ 
			var is_empty="false";
			is_empty= '<?php if(empty($_SESSION["filter_city"])) echo true; ?>';
			if(is_empty) {
				var url = "<?php echo '?page='.$page.'?filter='; ?>"; }
			else {
				var url = "<?php echo '?page='.$page.'&city='.$_SESSION['filter_city']; ?>&filter="; }
				/*
				var empty = '<?php if(empty($_SESSION["filter_category"])) echo true; ?>';
				if(empty){
					var url = "<?php echo $_SESSION['current_url']; ?>&filter="; }
				else {
					var url = "<?php echo $_SESSION['current_url']; ?>"; } 
				*/
			if(document.getElementById("Gıda").checked == true) { url = url.concat("Gıda+"); }
			if(document.getElementById("Giyecekler").checked) { url = url.concat("Giyecekler+"); }
			if(document.getElementById("TemelEşyalar").checked) { url = url.concat("Temel Eşyalar+".replace(/\s+/g, '')); }
			window.location= url;
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
								<option value="">---</option>
								<?php 	
									for($i=0;$i<count($cities);$i++){
										$city1 = $cities[$i];  
								?>
								<option value='<?php echo $city1["city"]; ?>' 
									<?php if(isset($_GET['city']) && $_GET['city']==$city1["city"]) echo "selected"; ?> >
									<?php echo $city1["city"]; ?> </option>
								<?php } ?>
							</select>
						</div> <!-- cd-select -->
					</div> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->

				<div class="cd-filter-block">
					<h4>Ana Kategoriler</h4>
					<ul class="cd-filter-content cd-filters list">
						<?php for($i=0; $i < count($_SESSION["main_categories"]); $i++) { 
							  	  $category = $_SESSION["main_categories"][$i];	
						?>
						<li id='<?php echo "category_".$category; ?>'>
							<input onclick="main_category_filter()" 
							class="filter" type="checkbox" data-filter=<?php echo "." . $category; ?> id='<?php echo $category; ?>' 
							<?php if( !empty($_SESSION["filter"]) && in_array($category, $_SESSION["filter"])) echo "checked"; ?> />
			    			<label class="checkbox-label" for=<?php echo $category; ?> > <?php echo $category; ?> </label>
						</li>
						<?php } ?>
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
