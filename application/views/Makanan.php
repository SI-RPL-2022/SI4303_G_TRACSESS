<div style="margin-bottom:100px;">
<!-- 
<div style="width: 100%; height: 30px; border-bottom: 1px solid black; text-align: center">
  <span style="font-size: 40px; background-color: #F3F5F6; padding: 0 10px;">
    Section Title 
  </span>
</div>
 -->

<link rel="stylesheet" href="<?= base_url() . "assets/" ?>css/menu.css">
<script src="https://www.w3schools.com/lib/w3.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "calibri", sans-serif}
</style>
<body>
<!-- Start Content -->
<div id="home" class="w3-content">

<!-- Menu -->
<div id="menu" class="w3-container w3-secondary w3-xxlarge w3-padding-64">
<h1 class="w3-center w3-jumbo w3-padding-32" > <img class="img-brand" src="<?= base_url() . "assets/" ?>images/company_logo/kai.png" style="width:100px; "> <b ><i>MEALS ON TRAIN</i></b></h1>
<div class="w3-row w3-center ">
<a href="#pizza"><div class="w3-third w3-padding-large w3-grey">Food</div></a>
<a href="#pasta"><div class="w3-third w3-padding-large w3-hover-grey">Drink</div></a>
<a href="#starters"><div class="w3-third w3-padding-large w3-hover-grey">Snacks</div></a>
</div>

<div id="" class="w3-container w3-secondary w3-padding-32">
<h1 id="pizza" class="w3-center w3-jumbo w3-padding-32">Food</h1>
 <?php foreach($makanan as $p) {?>
  <div class="row">
  	
    <div class="col m2">
    <img class="img-brand" src="<?=base_url()."assets/"?>images/Food/<?=$p->picture?>" style="width:100%; border-radius: 20%;">
    </div>
      

	<div class="col m10">
    	<h1><b><?=$p->nama?></b> <span class="w3-right w3-tag w3-dark-grey w3-round"><?=$p->price?></span></h1>
		<p class="w3-text-grey" style="margin-top:1px;"><?=$p->deskripsi?></p>
    </div>
<hr>
     
</div>

<?php } ?>

 <?php foreach($makanan as $p) {?>
  <div class="row">
  	
    <div class="col m2">
    <img class="img-brand" src="<?=base_url()."assets/"?>images/Food/<?=$p->picture?>" style="width:100%; border-radius: 20%;">
    </div>
      

	<div class="col m10">
    	<h1><b><?=$p->nama?></b> <span class="w3-right w3-tag w3-dark-grey w3-round"><?=$p->price?></span></h1>
		<p class="w3-text-grey" style="margin-top:1px;"><?=$p->deskripsi?></p>
    </div>
<hr>
     
</div>

<?php } ?>

<hr><!-- 
<h1><b>Formaggio</b> <span class="w3-right w3-tag w3-dark-grey w3-round">$15.50</span></h1>
<p class="w3-text-grey">Four cheeses (mozzarella, parmesan, pecorino, jarlsberg)</p>

<hr>
<h1><b>Chicken</b> <span class="w3-right w3-tag w3-dark-grey w3-round">$17.00</span></h1>
<p class="w3-text-grey">Fresh tomatoes, mozzarella, chicken, onions</p>

<hr>
<h1><b>Pineapple'o'clock</b> <span class="w3-right w3-tag w3-dark-grey w3-round">$16.50</span></h1>
<p class="w3-text-grey">Fresh tomatoes, mozzarella, fresh pineapple, bacon, fresh basil</p>

<hr>
<h1><b>Meat Town</b> <span class="w3-tag w3-red w3-round">Hot!</span>
<span class="w3-right w3-tag w3-dark-grey w3-round">$20.00</span></h1>
<p class="w3-text-grey">Fresh tomatoes, mozzarella, hot pepporoni, hot sausage, beef, chicken</p> -->
</div>

<h1 id="pasta" class="w3-center w3-jumbo w3-padding-32">Drinks</h1>
<div class="w3-container w3-secondary w3-padding-32">


 <?php foreach($minuman as $p) {?>
  <div class="row">
  	
    <div class="col m2">
    <img class="img-brand" src="<?=base_url()."assets/"?>images/Food/<?=$p->picture?>" style="width:100%; border-radius: 20%;">
    </div>
      

	<div class="col m10">
    	<h1><b><?=$p->nama?></b> <span class="w3-right w3-tag w3-dark-grey w3-round"><?=$p->price?></span></h1>
		<p class="w3-text-grey" style="margin-top:1px;"><?=$p->deskripsi?></p>
    </div>
<hr>
     
</div>

<?php } ?>

 <?php foreach($minuman as $p) {?>
  <div class="row">
  	
    <div class="col m2">
    <img class="img-brand" src="<?=base_url()."assets/"?>images/Food/<?=$p->picture?>" style="width:100%; border-radius: 20%;">
    </div>
      

	<div class="col m10">
    	<h1><b><?=$p->nama?></b> <span class="w3-right w3-tag w3-dark-grey w3-round"><?=$p->price?></span></h1>
		<p class="w3-text-grey" style="margin-top:1px;"><?=$p->deskripsi?></p>
    </div>
<hr>
     
</div>

<?php } ?>

<!-- 

<h1><b>Lasagna</b> <span class="w3-tag w3-grey w3-round">Popular</span>
<span class="w3-right w3-tag w3-dark-grey w3-round">$13.50</span></h1>
<p class="w3-text-grey">Special sauce, mozzarella, parmesan, ground beef</p>

<hr>
<h1><b>Ravioli</b> <span class="w3-right w3-tag w3-dark-grey w3-round">$14.50</span></h1>
<p class="w3-text-grey">Ravioli filled with cheese</p>

<hr>
<h1><b>Spaghetti Classica</b> <span class="w3-right w3-tag w3-dark-grey w3-round">$11.00</span></h1>
<p class="w3-text-grey">Fresh tomatoes, onions, ground beef</p> -->
</div>

<h1 id="starters" class="w3-center w3-jumbo w3-padding-32">Snacks</h1>
<div class="w3-container w3-white w3-padding-32">


<?php foreach($Snacks as $p) {?>
  <div class="row">
  	
    <div class="col m2">
    <img class="img-brand" src="<?=base_url()."assets/"?>images/Food/<?=$p->picture?>" style="width:100%; border-radius: 20%;">
    </div>
      

	<div class="col m10">
    	<h1><b><?=$p->nama?></b> <span class="w3-right w3-tag w3-dark-grey w3-round"><?=$p->price?></span></h1>
		<p class="w3-text-grey" style="margin-top:1px;"><?=$p->deskripsi?></p>
    </div>
<hr>
     
</div>

<?php } ?>

 <?php foreach($Snacks as $p) {?>
  <div class="row">
  	
    <div class="col m2">
    <img class="img-brand" src="<?=base_url()."assets/"?>images/Food/<?=$p->picture?>" style="width:100%; border-radius: 20%;">
    </div>
      

	<div class="col m10">
    	<h1><b><?=$p->nama?></b> <span class="w3-right w3-tag w3-dark-grey w3-round"><?=$p->price?></span></h1>
		<p class="w3-text-grey" style="margin-top:1px;"><?=$p->deskripsi?></p>
    </div>
<hr>
     
</div>

<?php } ?>

<!-- <h1><b>Today's Soup</b> <span class="w3-tag w3-grey w3-round">Seasonal</span>
<span class="w3-right w3-tag w3-dark-grey w3-round">$5.50</span></h1>
<p class="w3-text-grey">Ask the waiter</p>

<hr>
<h1><b>Bruschetta</b> <span class="w3-right w3-tag w3-dark-grey w3-round">$8.50</span></h1>
<p class="w3-text-grey">Bread with pesto, tomatoes, onion, garlic</p>

<hr>
<h1><b>Garlic bread</b> <span class="w3-right w3-tag w3-dark-grey w3-round">$9.50</span></h1>
<p class="w3-text-grey">Grilled ciabatta, garlic butter, onions</p> -->
</div>
</div>

<!-- End Content -->
</div>
</div>