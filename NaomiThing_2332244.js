let weather = {
    "apiKey": "fb3e255e49928aa4b81ce931e214bdea",
    fetchWeather: function (city) {
    fetch("https://api.openweathermap.org/data/2.5/weather?q=" + city + "&units=metric&appid="+ this.apiKey)
    .then((response)=>response.json())
    .then((data)=>this.displayWeather(data));
    },
    displayWeather: function (data) {
    const {name}=data;
    const {icon,description}=data.weather[0];
    const {temp,humidity}=data.main;
    const {speed}=data.wind;
    const dateElement = document.querySelector(".date");
    const {rain} = data;
    const currentDate = new Date();
    const options = {
        weekday: "long",
        year: "numeric",
        month: "long",
        day: "numeric",
    };
    const formattedDate = currentDate.toLocaleDateString("en-US", options);
    dateElement.textContent = formattedDate;
    document.querySelector(".city").innerText="Weather in " + name;
    document.querySelector(".description").innerText=description;
    document.querySelector(".temp").innerText=temp + "°C";
    document.querySelector(".humidity").innerText="Humidity: "+humidity+"%";
    document.querySelector(".wind").innerText="Wind: "+speed+" km/h";
    document.querySelector(".max").innerText="max: " + data.main.temp_max + "°C";
    document.querySelector(".min").innerText="min: "+ data.main.temp_min+ "°C";
    if(rain){
        const{"1h": rainfall}=rain;
        if(rainfall){
            document.querySelector(".rainfall").innerText="Rainfall: " +rainfall + "mm";
        }else{
            document.querySelector(".rainfall").innerText="Rainfall:N/A";
        }
    }else{
    document.querySelector(".rainfall").innerText="Rainfall: N/A";
    }
    document.querySelector(".icon").src = "https://openweathermap.org/img/wn/" + icon + ".png";
    document.querySelector(".weather").classList.remove("loading");
    },
    search: function () {
    this.fetchWeather(document.querySelector(".search-bar").value);
    },
    default: function(){
        this.fetchWeather("Glasgow");
    }
    };
    document.querySelector(".search button").addEventListener("click", function () {
        weather.search();
        });
        document.querySelector(".search-bar").addEventListener("keyup",function(event) {
        if (event.key=="Enter") {
        weather.search();
        }
        });
weather.default();

document.body.addEventListener('load', getWeather())
function fdata(){
    temp=document.getElementById("data").innerText;
    console.log(temp);
    document.getElementById("Showweather").innerText=temp;

};
fdata();