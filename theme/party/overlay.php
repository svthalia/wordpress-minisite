<?php
	require_once("../../../../wp-load.php");
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Thalia Partymode</title>
		<style>
			#hoofd {
				position: absolute;
				top: 15px;
				left: 135px;
				z-index: 20;
				margin-left: 20px;
			}

			img.flip {
				-moz-transform: scaleX(-1);
				-webkit-transform: scaleX(-1);
				-ms-transform: scaleX(-1);
			}

			#romp {
				text-align: center;
				font-family: sans-serif;
				position: absolute;
				top: 130px;
				width: 100px;
				height: 150px;
				left: 150px;
				z-index: 10;
				visibility: hidden;
			}
			.been {
				position: absolute;
				float: left;
				height: 120px;
				width: 26px;
				-moz-transform-origin: 13px 0px;
				-webkit-transform-origin: 13px 0px;
				-ms-transform-origin: 13px 0px;

				-webkit-transition: all 300ms;
				-moz-transition: all 300ms;
				-ms-transition: all 300ms;
			}
			#linkerbeen {
				left: 160px;
				top: 260px;
			}
			#rechterbeen {
				left: 210px;
				top: 260px;
			}
			.voet {
				top: 370px;
				position: absolute;
				background-color: black;
				float: left;
				height: 10px;
				width: 36px;
				-webkit-transition: all 300ms;
				-moz-transition: all 300ms;
				-ms-transition: all 300ms;	
				visibility: hidden;
			}
			#linkervoet {
				left: 150px;
				-webkit-transform-origin: 23px -110px;
				-moz-transform-origin: 23px -110px;
				-ms-transform-origin: 23px -110px;
			}
			#rechtervoet {
				left: 210px;
				-webkit-transform-origin: 13px -110px;
				-moz-transform-origin: 13px -110px;
				-ms-transform-origin: 13px -110px;
			}
			.hand {
				top:147px;
				position: absolute;
				background-color: #facccc;
				height: 30px;
				width: 30px;
				-webkit-transition: all 300ms;
				-moz-transition: all 300ms;
				-ms-transition: all 300ms;
				visibility: hidden;
			}
			.arm {
				position: absolute;
				top: 150px;
				height: 26px;
				width: 130px;
				-webkit-transition: all 300ms;
				-moz-transition: all 300ms;
				-ms-transition: all 300ms;
			}
			#linkerarm{
				left:50px;
				-moz-transform-origin: 100px 13px;
				-webkit-transform-origin: 100px 13px;
				-ms-transform-origin: 100px 13px;
			}
			#rechterarm{
				left:220px;
				-moz-transform-origin: 30px 13px;
				-webkit-transform-origin: 30px 13px;
				-ms-transform-origin: 30px 13px;
			}
			#linkerhand{
				left:30px;
				-moz-transform-origin: 120px 13px;
				-webkit-transform-origin: 120px 13px;
				-ms-transform-origin: 120px 13px;
			}

			#rechterhand{
				left:340px;
				-moz-transform-origin: -90px 13px;
				-webkit-transform-origin: -90px 13px;
				-ms-transform-origin: -90px 13px;
			}

		</style>
		<script>
			var voorImage = "<?php echo get_theme_mod( 'party_voorimage' ) == '' ? 'voor.png': get_theme_mod( 'party_voorimage' ); ?>";
			var zijImage = "<?php echo get_theme_mod( 'party_zijimage' ) == '' ? 'zij.png': get_theme_mod( 'party_zijimage' ); ?>";
			var timeout = 300;
			var hoofd = new Image()
			hoofd.id = "hoofd";
			hoofd.src = zijImage;
			var linkerarm, rechterarm, linkerhand, rechterhand, romp, linkerbeen, rechterbeen, linkervoet, rechtervoet;

			function randomColor() {
				return Math.round((Math.random() * 255))
			}

			function randomRGB() {
				return "rgb(" + randomColor() + "," + randomColor() + "," + randomColor() + ")"
			}

			function transform(element, transformation) {
				element.style.WebkitTransform = transformation
				element.style.MozTransform = transformation
				element.style.msTransform = transformation
			}

			function randomRotate(from, to) {
				return "rotate(" + (Math.round(Math.random()*from-to)) + "deg)"
			}

			function beweegLinkerArm() {
				var linkerarm_rotate = randomRotate(160,80)
				transform(linkerarm, linkerarm_rotate)
				transform(linkerhand, linkerarm_rotate)
			}

			function beweegRechterArm() {
				var rechterarm_rotate = randomRotate(160,80)
				transform(rechterarm, rechterarm_rotate)
				transform(rechterhand, rechterarm_rotate)
			}

			function beweegLinkerBeen() {
				var linkerbeen_rotate = randomRotate(60,0)
				transform(linkerbeen, linkerbeen_rotate)
				transform(linkervoet, linkerbeen_rotate)
			}

			function beweegRechterBeen() {
				var rechterbeen_rotate = randomRotate(-60,0)
				transform(rechterbeen, rechterbeen_rotate)
				transform(rechtervoet, rechterbeen_rotate)
			}

			function beweegHoofd(){
				hoofd.src = zijImage

				setTimeout(function(){
					hoofd.src = voorImage
				},timeout);

				setTimeout(function(){
					hoofd.className = "flip"
					hoofd.src = voorImage
				},timeout*2);

				setTimeout(function(){
					hoofd.style.marginLeft = "0px"
					hoofd.src = zijImage
				},timeout*3);

				setTimeout(function(){
					hoofd.style.marginLeft = "20px"
					hoofd.src = voorImage
				},timeout*4);

				setTimeout(function(){
					hoofd.className = ""
					hoofd.src = voorImage
				},timeout*5);
			}

			function party() {
				document.body.appendChild(hoofd);
				linkerarm = document.getElementById("linkerarm")
				romp = document.getElementById("romp")
				rechterarm = document.getElementById("rechterarm")
				rechterbeen = document.getElementById("rechterbeen")
				linkerbeen = document.getElementById("linkerbeen")
				linkervoet = document.getElementById("linkervoet")
				rechtervoet = document.getElementById("rechtervoet")
				linkerhand = document.getElementById("linkerhand")
				rechterhand = document.getElementById("rechterhand");

				[romp, linkervoet, rechtervoet, linkerhand, rechterhand].forEach(function (element){
				       	element.style.visibility = "visible" })

				var broek_kleur = randomRGB()
				rechterbeen.style.backgroundColor = broek_kleur
				linkerbeen.style.backgroundColor = broek_kleur

				var shirt_kleur = randomRGB()
				rechterarm.style.backgroundColor = shirt_kleur
				linkerarm.style.backgroundColor = shirt_kleur
				romp.style.backgroundColor = shirt_kleur

				var shirt_tekst_kleur = randomRGB()
				romp.style.color = shirt_tekst_kleur

				setInterval(beweegLinkerArm, 300)
				setInterval(beweegRechterArm, 300)
				setInterval(beweegLinkerBeen, 300)
				setInterval(beweegRechterBeen, 300)
				beweegHoofd()
				setInterval(beweegHoofd, timeout*6)
			}
		</script>
	</head>
	<body onload="party()">
		<div id="romp"><br><br><h1><?php echo get_theme_mod( 'party_letter', 'T' ); ?></h1><br></div>
		<div id="linkerarm" class="arm"></div>
		<div id="linkerhand" class="hand"></div>
		<div id="rechterarm" class="arm"></div>
		<div id="rechterhand" class="hand"></div>
		<div id="linkerbeen" class="been"></div>
		<div id="rechterbeen" class="been"></div>
		<div id="linkervoet" class="voet"></div>
		<div id="rechtervoet" class="voet"></div>
	</body>
</html>
