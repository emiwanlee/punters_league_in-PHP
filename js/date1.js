
var myVar = setInterval(myTimer, 100);

function myTimer() 
{var d = new Date();
document.getElementById("time").innerHTML = "Server Time: " + d.toUTCString();
}
