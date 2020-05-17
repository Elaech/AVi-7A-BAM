function updateUsername() {
    xmlhttp = new XMLHttpRequest();
    xmlhttp.open("PUT","http://localhost/AVIAUTH/api/update",true);
    xmlhttp.setRequestHeader("Content-type",application/json);
    xmlhttp.onreadystatechange = function(){
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            var json = JSON.parse(xmlhttp.responseText);
            if(json.status == true){
                document.cookie = "token="+json.token;
                document.getElementById("change-username").value = json.username;
                alert("Username updated!");
            }
            
        }
        else{
            alert("Failed to update");
        }
    };

    var token = getCookie("token").value;
    var ip = 
    
    
}

function updatePassword() {

}
function updateEmail() {

}