
function showHideItems(list,itemsName) {
    var items = document.getElementsByName(itemsName);
    if (items[0].style.display == 'none' || items[0].style.display == "") {
        list.style.backgroundColor = "#ffe5d8";
        list.style.color = "#5bb3b0";
        for (var index = 0; index < items.length; index++) {
            items[index].style.display = "inline-block";
        }
    }
    else {
        list.style.backgroundColor = "#96cecc";
        list.style.color = "#000000";
        for (var index = 0; index < items.length; index++) {
            items[index].style.display = "none";
        }
    }
}
function pickUnpickAllShowItems(){
    var showItems = document.getElementsByName("showCheck");
        for(var index=0;index<showItems.length;index++){
            showItems[index].checked = document.getElementById("ShowAll").checked;
        }


}