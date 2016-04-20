<!DOCTYPE html>
<html>


	<head>
		<title>Music Viewer</title>
		<meta charset="utf-8" />
		<link href="viewer.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		
		<h1>My Music Page</h1>
		
		<!-- Number of Songs (Variables) -->
		<p>
        <?php
		$number=5678;
		$hours=$number/10;
		echo "I love music.
			I have $number total songs,
			which is over $hours hours of music!"
		?>
		</p>

		<!-- Music Results Pages (Loops) -->
		
		<div class="section">
			<h2>Google's Music Results</h2>
		<ol>
		<?php 
			$l=-10;
			

			for ($i=1; $i<=5; $i++) { ?>
			
				<li><a href="https://www.google.com/search?tbm=nws&amp;q=Music&amp;start=<?= $l+=10 ?>">Page <?= $i ?></a></li>
			
		<?php }  ?></ol>
		<!--	<ol>
				<li><a href="https://www.google.com/search?tbm=nws&amp;q=Music&amp;start=0">Page 1</a></li>
				<li><a href="https://www.google.com/search?tbm=nws&amp;q=Music&amp;start=10">Page 2</a></li>
				<li><a href="https://www.google.com/search?tbm=nws&amp;q=Music&amp;start=20">Page 3</a></li>
				<li><a href="https://www.google.com/search?tbm=nws&amp;q=Music&amp;start=30">Page 4</a></li>
				<li><a href="https://www.google.com/search?tbm=nws&amp;q=Music&amp;start=40">Page 5</a></li>
			</ol>-->
		</div>

		<!-- Favorite Artists (Arrays) -->
        <div class="section">
        <h2>My Favorite Artists Array</h2>
        <ol><?php 
		$artists=array("Adele","Rihanna","Taylor Swift","Justin Bieber");
		array_push($artists, "Lady Gaga");
		foreach ($artists as $artist){ ?>
        	<li><?= $artist ?></li>
		
		<?php } ?></ol>
		<!-- Favorite Artists from a File (Files) -->
		<div class="section">
			<h2>My Favorite Artists File</h2>
		
			<ol><?php
		foreach (file("favorite.txt") as $array) { ?>
		 	<li><a href="https://www.vevo.com/artist/<?= $array ?>"><?= $array ?></a></li>
		 
		<?php } ?></ol>
		<!--<ol>
				<li>Adele</li>
				<li>Rihanna</li>
				<li>Taylor Swift</li>
				<li>Justin Bieber</li>
			</ol>-->
		</div>
		
		<!-- Music (Multiple Files) -->
		
		<!-- MP3 Formatting -->
		<div class="section">
			<h2>My Music and Playlists</h2>
			<ul class="musiclist">
			<?php 
			foreach(glob("songs/*.mp3")as $file){ ?>
				<li class="mp3item"><a  href="<?= $file ?>"><?= basename($file) ?></a> (<?= filesize($file)/1000 ?> KB)</li><audio controls><source src="<?= $file ?>" type="audio/mpeg"></audio>
			<?php }?>
			</ul>

			<!--<ul id="musiclist">
				<li class="mp3item">
					<a href="Be_More.mp3">Be More.mp3</a>
				</li>
				
				<li class="mp3item">
					<a href="songs/Wiz_Khalifa_just_Because.mp3">Just Because.mp3</a>
				</li>

				<li class="mp3item">
					<a href="Drift-Away.mp3">Drift Away.mp3</a>
				</li>-->

				<!-- Exercise 8: Playlists (Files) -->
				<!--<li class="playlistitem">154-mix.m3u:
					<ul>
						<li>Hello.mp3</li>
						<li>Be More.mp3</li>
						<li>Drift Away.mp3</li>
						<li>Panda Sneeze.mp3</li>
					</ul>
				</li></ul>-->
             <li class="playlistitem">
             <h3>Shuffle</h3>
			<?php 
			$list=glob("songs/*.mp3");
			shuffle($list);
			foreach($list as $file){ ?>
				<li><?= basename($file) ?></li>
			<?php }?></li>
             <li class="playlistitem">
			<h3>Reverse Sort</h3>
			<?php 
			$list=glob("songs/*.mp3");
			krsort($list);
			foreach($list as $file){ ?>
				<li><?= basename($file) ?></li>
			<?php }?>
			<li class="playlistitem">
             <h3>Sort By Size</h3>
			<?php 
			$list=glob("songs/*.mp3");
			usort($list, create_function('$a,$b', 'return filemtime($b) - filemtime($a);'));
			echo $list;
			?></li>
			
		</div>
	</body>
</html>
