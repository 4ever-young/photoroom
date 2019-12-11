<script>
$(document).ready(function(){
    $.get(
        "http://api.openweathermap.org/data/2.5/weather",
        {
            "id" : "472755",
            "appid" : "70e1ed322b02acbc57d443dd91065f3e"
        },

        function (data) {
            let out = '';
            out += 'Погода: <b>'+data.weather[0].main+'</b><br>';
            out += '<p style="text-align:center"><img src="https://openweathermap.org/img/w/'+data.weather[0].icon+'.png"></p>';

            out += 'Температура: <b>'+Math.round(data.main.temp-273)+'&#176;C</b><br>';
            out += 'Влажноть: <b>' + data.main.humidity + '%</b><br>';
            out += 'Давление: <b>' + Math.round(data.main.pressure*0.75006375) + 'мм.рт.ст.</b><br>';
            out += 'Видимость: <b>' + (data.visibility/1000) + 'км.</b><br>';
            console.log(data);
            console.log(out);
            $('#weather').html(out);
        }
    );
});
</script>