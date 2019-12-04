$(document).ready(function(){
   $.get(
       "https://api.weather.yandex.ru/v1/informers?",
       {
            "lat" : "",
            "lon" : "",
            "lang": "ru_RU",
            "X-Yandex-API-Key:" : "028a142b-3ac0-4d46-8531-8e86ef27bc3d"
       },
       function (data) {
           console.log(data);
       }
   );
});