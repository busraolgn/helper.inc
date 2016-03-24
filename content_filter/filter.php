	<script type="text/javascript">
		function select_city(){  
			var x = document.getElementById("selectCity");
			var i = x.selectedIndex;
			var is_empty_category = "<?php if(empty($_SESSION['filter'])) echo 'true'; ?>";
			if(i != 0)
			{
				var url1="<?php echo '?page='.$page.'&city='; ?>";
				var url2=x.options[i].text;
				var url = url1.concat(url2);
				if(!is_empty_category){ 
					var url3="<?php echo '&filter='.implode('+' , $_SESSION['filter']); ?>";
					url = url.concat(url3); 
				} 
				window.location= url;
			} 
			else
			{ 
				if (is_empty_category) {
					var url="<?php echo 'index.php?page='.$page; ?>";
				}
				else {
					var url="<?php echo 'index.php?page='.$page.'&filter='; ?>";
					var url3="<?php echo implode('+' , $_SESSION['filter']); ?>";
					url = url.concat(url3);
				}
				window.location= url;
			} 
		}
		function main_category_filter(){ 
			var filter = "";
			if(document.getElementById("Gıda").checked) { filter = filter.concat("Gıda+"); }
			if(document.getElementById("Giyecekler").checked) { filter = filter.concat("Giyecekler+"); }
			if(document.getElementById("TemelEşyalar").checked) { filter = filter.concat("TemelEşyalar+".replace(/\s+/g, '')); }
			
			var is_empty_category="false";
			var is_empty_city="false";
			is_empty_city= "<?php if(empty($_SESSION['filter_city'])) echo 'true'; ?>";
			/*eğer ana kategorilerden seçili olan varsa*/
			if(filter){ /*bir şehir kriteri varsa cur_url n yanına filter ekle yoksa direk filter ekle*/
				if(is_empty_city) {
					var url = "<?php echo '?page='.$page.'&filter='; ?>".concat(filter);
					/*url = url.concat(filter);*/
				}
				else {
					var url = "<?php echo '?page='.$page.'&city='.$_SESSION['filter_city'].'&filter='; ?>"; 
					url = url.concat(filter);
				} 
			}
			else{ /*eğer ana kategorilerden hiçbiri seçili değilse..*/
				if(is_empty_city) {
					var url = "<?php echo '?page='.$page; ?>";
				}
				else {
					var url = "<?php echo '?page='.$page.'&city='.$_SESSION['filter_city']; ?>"; 
				}			}
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
							<?php if(!empty($_SESSION["filter"]) && in_array(trim($category," "), $_SESSION["filter"])) echo "checked"; ?> />
			    			<label class="checkbox-label" for=<?php echo $category; ?> > <?php echo $category; ?> </label>
						</li>
						<?php } ?>
					</ul> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->

				<?php if(!empty($_SESSION["filter"])) { ?>
				<div class="cd-filter-block">
					<?php for ($j=0; $j < count($_SESSION["filter"]); $j++) { ?>
					<h4><?php echo $_SESSION["filter"][$j]."kategorisine ait filtreler" ?></h4>
					<ul class="cd-filter-content cd-filters list">
						<?php for ($i=0; $i < count($_SESSION["sub_categories"][$_SESSION["filter"][$j]]); $i++) { ?>
							<li>
							<input class="filter" data-filter="" type="radio" name=<?php echo $_SESSION["sub_categories"][$_SESSION["filter"][$j]][$i]; ?> id=<?php echo $_SESSION["sub_categories"][$_SESSION["filter"][$j]][$i]; ?> 
							<?php /*if(!empty($_SESSION["sub_filter"]) && in_array(trim($_SESSION["sub_categories"][$_SESSION["filter"][$j]][$i]," "), $_SESSION["sub_filter"])) echo "checked";*/ ?> >
							<label class="radio-label" for=<?php echo $_SESSION['sub_categories'][$_SESSION['filter'][$j]][$i]; ?> >
							<?php echo $_SESSION["sub_categories"][$_SESSION["filter"][$j]][$i] ?></label>
							</li>
						<?php } ?>
					</ul> <!-- cd-filter-content -->
					<?php } ?>
				</div> <!-- cd-filter-block -->
				<?php } ?>
			</form>

			<a href="#0" class="cd-close">Kapat</a>
		</div> <!-- cd-filter -->

		<a href="#0" class="cd-filter-trigger">Filtreler</a>
	
<script src="content_filter/js/jquery-2.1.1.js"></script>
<script src="content_filter/js/jquery.mixitup.min.js"></script>
<script src="content_filter/js/main.js"></script> <!-- Resource jQuery -->
