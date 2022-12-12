const options = {
	method: 'GET',
	headers: {
		'X-RapidAPI-Key': '228c871db9msh19df0bf1bc2d419p15489bjsn382bf84f4f92',
		'X-RapidAPI-Host': 'quotes15.p.rapidapi.com'
	}
};

fetch('https://quotes15.p.rapidapi.com/quotes/random/', options)
	.then(response => response.json())
	.then(response => {
		console.log(response);
		console.log(response.content);
		document.getElementById("quote").innerHTML = response.content;
	});
