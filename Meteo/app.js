const APIKEY = '';


function apiCall(city) {
	let url = `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${APIKEY}&units=metric&lang=fr`;
	fetch(url).then((response) => 
	response.json().then((data) => {
	console.log(data);
	document.querySelector('#city').innerHTML = data.name;
	document.querySelector('#ciel').innerHTML = data.weather[0].description;
	document.querySelector('#temp').innerHTML = (Math.round(data.main.temp)) + '°';
	document.querySelector('#humidity').innerHTML = data.main.humidity + '%';
	document.querySelector('#wind').innerHTML = (Math.round(data.wind.speed * 3.6)) + 'km/h';
	})
	)
	.catch((err) => console.log('Erreur : ' + err));
}



	document.querySelector ('form').addEventListener('submit', function(e) {
		e.preventDefault();
		let ville = document.querySelector('#inputcity').value;

		apiCall(ville);
	});

//Appel par defaut
	apiCall('Nice');