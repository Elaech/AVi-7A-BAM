
var timesClicked = 0;
function showEntryItems() {
    var entryItems = document.getElementsByName("showEntryItems");
    if (timesClicked % 2 == 0){
        for (var index = 0; index < entryItems.length; index++){
            entryItems[index].style.display = "inline-block";
        }
    }
    else
        for (var index = 0; index < entryItems.length; index++) {
            entryItems[index].style.display = "none";
        }
        timesClicked = (timesClicked + 1) % 2;
}