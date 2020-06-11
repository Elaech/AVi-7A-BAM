//Methods made by Minut Mihai Dimitrie
function showHideItems(list,itemsName) {
    var items = document.getElementsByName(itemsName);
    if (items[0].style.display == 'none' || items[0].style.display == "") {
        list.style.backgroundColor = "#ffe5d8";
        list.style.color = "#3B271D";
        for (var index = 0; index < items.length; index++) {
            items[index].style.display = "inline-block";
        }
    }
    else {
        list.style.backgroundColor = "#af734A";
        list.style.color = "#000000";
        for (var index = 0; index < items.length; index++) {
            items[index].style.display = "none";
        }
    }
}

function restrictHideItems(list,itemsName){
    var items = document.getElementsByName(itemsName);
    if (items[0].style.display == 'none' || items[0].style.display == "") {
        list.style.backgroundColor = "#000000";
        list.style.color = "#ffe5d8";
        for (var index = 0; index < items.length; index++) {
            items[index].style.display = "inline-block";
        }
    }
    else {
        list.style.backgroundColor = "#3B271D";
        list.style.color = "#efe0bb";
        for (var index = 0; index < items.length; index++) {
            items[index].style.display = "none";
        }
    }
}
function pickUnpickAllShowItems(){
    var showItems = document.getElementsByClassName("showCheck");
    for(var index=0;index<showItems.length;index++){
        showItems[index].checked = document.getElementById("ShowAll").checked;
    }
}


// End of methods done by Minut Mihai Dimitrie