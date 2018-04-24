				<section id="welcame" class="col-12">
					<div class="text-center">
						<h1>Your favourite buisiness site multi purpose template</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>
						<button>Find out more</button>
					</div>
				</section>
				<section id="services" class="col-12 ">
					<div class="text-center">
						<img alt="" src="" />
						<h3></h3>
						<p></p>
					</div>
				</section>
				<section id="gallery_home" class="col-12">
					<div>
						<img alt="" src="" />
						<h3></h3>
						<p></p>
					</div>
					<div class="text-center">
						<h2>aaa</h2>
						<p>bbbbbbbbbbbbbb bbbbbbbbbbbbbb</p>
						<button>ccc</button>
					</div>
					<?php foreach($devinettes as $devinette):?>
        <div class="question">
        	<h3>{{getName}}</h3>
            <h3><?php echo $devinette->getName();?></h3>


        </div>
    <?php endforeach;?>
				</section>
