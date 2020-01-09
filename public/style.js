function openMenu(evt, menuName) {
    var i, x, tablinks;
    x = document.getElementsByClassName("menu");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < x.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
    }
    document.getElementById(menuName).style.display = "block";
    evt.currentTarget.firstElementChild.className += " w3-red";
}
document.getElementById("myLink").click();

 function currentSelection()
{
    var selection = document.getElementById("foodTable");
    var selection2 = document.getElementById("foodTable2");
    var selection3 = document.getElementById("drinkTable");
    var selection4 = document.getElementById("drinkTable2");
    var currentSelection = selection.options[selection.selectedIndex].value;
    var currentSelection2 = selection2.options[selection2.selectedIndex].value;
    var currentSelection3 = selection3.options[selection3.selectedIndex].value;
    var currentSelection4 = selection4.options[selection4.selectedIndex].value;

    document.getElementById('yourSelection').innerHTML = "";
    document.getElementById('yourSelection').innerHTML = currentSelection;
    document.getElementById('yourSelection2').innerHTML = currentSelection2;
    document.getElementById('yourSelection3').innerHTML = currentSelection3;
    document.getElementById('yourSelection4').innerHTML = currentSelection4;
    return currentSelection;
}
