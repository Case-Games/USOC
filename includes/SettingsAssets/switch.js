function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
  }
function toggle_checkbox(Id, change = true){
    var checkbox = document.getElementById(Id);
    var div = document.getElementById(Id+"_div");
    if(checkbox.checked){
        checkbox.checked = false;
        div.innerHTML = "Off"
        div.className=div.className.replace("Checkbox-on", "Checkbox-off");
        if(change == true){
            checkbox_change(Id)
        }
    }else{
        checkbox.checked = true;
        div.innerHTML = "On"
        div.className=div.className.replace("Checkbox-off", "Checkbox-on");
        if(change == true){
            checkbox_change(Id)
        }
    }
}
function checkbox_change(Id){
    var checkbox = document.getElementById(Id);
    var image = document.getElementById(Id + "_load");
    image.style="opacity:1;";
    if(checkbox.checked){
        var value = "1"
    }else{
        var value = "0"
    }
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            image.style="opacity:0;";
            suceed();
        }
      };
    xhttp.open("POST", "settingschangehandler.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("Name="+Id+"&Value="+value);
}
function input_change(Id){
    var input = document.getElementById(Id);
    var image = document.getElementById(Id + "_load");
    image.style="opacity:1;";
    var value = input.value
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            image.style="opacity:0;";
            suceed();
        }
      };
    xhttp.open("POST", "settingschangehandler.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("Name="+Id+"&Value="+value);
}
function onLoad(Id){
    var input = document.getElementById(Id);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var value = this.responseText;
            if(value.startsWith("   ")){
                while(value.charAt(0) === " "){
                    value = value.substring(1);
                }
            }
            input.value = value;
        }
      };
    xhttp.open("POST", "settingschangehandler.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("Name="+Id);
}

function onLoadCheckbox(Id){
    var input = document.getElementById(Id);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if(this.responseText == 1){
                input.checked = false;
            }else{
                input.checked = true;
            }
        }
        toggle_checkbox(Id, false);
      };
    xhttp.open("POST", "settingschangehandler.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("Name=" + Id);
}

async function suceed(){
    var suceedheader = document.getElementById("suceedheader");
    suceedheader.style = "display:block; background:green;";
    await sleep(2000);
    suceedheader.style = "background:green; display:none;";
}

document.addEventListener("DOMContentLoaded", function(event) {
    onLoad("site.name");
    onLoad("site.lang");
    onLoadCheckbox("login.register_open");
    onLoadCheckbox("login.login_open");
    onLoadCheckbox("login.changepassword");
    onLoad("site.description");
    onLoad("site.keywords");
    onLoad("site.robots");
    onLoadCheckbox("2fa.enabled");
    onLoad("2fa.name");
    onLoad("oAuth.google.client_id");
});

