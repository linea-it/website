var firstbgcarousel=new bgCarousel({
			wrapperid: 'mybgcarousel', //ID of blank DIV on page to house carousel
			imagearray: [
				['http://localhost/linea2/wp-content/themes/linea/fotos/sldshw01.jpg', ''], //["image_path", "optional description"]
				['http://localhost/linea2/wp-content/themes/linea/fotos/sldshw02.jpg', ''],
				['http://localhost/linea2/wp-content/themes/linea/fotos/sldshw03.jpg', ''],
				['http://localhost/linea2/wp-content/themes/linea/fotos/sldshw04.jpg', ''] //<--no trailing comma after very last image element!
			],
			displaymode: {type:'auto', pause:3000, cycles:200, stoponclick:false, pauseonmouseover:true},
			navbuttons: ['http://localhost/linea/wp-content/themes/linea/imagens/setal.png', 'http://localhost/linea/wp-content/themes/linea/imagens/setar.png'], // path to nav images
			activeslideclass: 'selectedslide', // CSS class that gets added to currently shown DIV slide
			orientation: 'h', //Valid values: "h" or "v"
			persist: true, //remember last viewed slide and recall within same session?
			slideduration: 500 //transition duration (milliseconds)
		})