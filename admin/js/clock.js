function Time(){
    var date = new Date();
    var hour = date.getHours();
    var min = date.getMinutes();
    var sec = date.getSeconds();
    var period = "AM";

   
   
    if(hour == 0){
        hour = 12;
    }
    if(hour > 12){
        hour = hour - 12 + 12;
        var period = "PM";
    }
    if(hour < 10){
        hour = "0" + hour;
    }
    if(min < 10){
        min = "0" + min;
    }
    if(sec < 10){
        sec = "0" + sec;
    }
    var time = hour + ":" + min + ":" + sec + "-" + period;
    document.getElementById("displayy").innerHTML = time;
    document.getElementById("boxx").innerHTML = date;
    setTimeout(Time, 1000);
}
Time();