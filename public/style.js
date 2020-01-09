var script = document.createElement('script');
script.src = 'https://code.jquery.com/jquery-3.4.1.min.js';
script.type = 'text/javascript';
document.getElementsByTagName('head')[0].appendChild(script);




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
    var FoodQuantity = document.getElementById("foodQuantity1");
    var selection2 = document.getElementById("foodTable2");
    var FoodQuantity2 = document.getElementById("foodQuantity2");
    var selection3 = document.getElementById("drinkTable");
    var DrinkQuantity = document.getElementById("drinkQuantity1");
    var selection4 = document.getElementById("drinkTable2");
    var DrinkQuantity2 = document.getElementById("drinkQuantity2");

    var currentSelection = selection.options[selection.selectedIndex].value;
    var currentQuantity1 = FoodQuantity.options[FoodQuantity.selectedIndex].value;
    var finalFoodSelection = currentQuantity1.concat("x -",currentSelection);

    var currentSelection2 = selection2.options[selection2.selectedIndex].value;
    var currentQuantity2 = FoodQuantity2.options[FoodQuantity2.selectedIndex].value;
    var finalFoodSelection2 = currentQuantity2.concat("x -",currentSelection2);

    var currentSelection3 = selection3.options[selection3.selectedIndex].value;
    var currentQuantity3 = DrinkQuantity.options[DrinkQuantity.selectedIndex].value;
    var finalDrinkSelection = currentQuantity3.concat("x -",currentSelection3);

    var currentSelection4 = selection4.options[selection4.selectedIndex].value;
    var currentQuantity4 = DrinkQuantity2.options[DrinkQuantity2.selectedIndex].value;
    var finalDrinkSelection2 = currentQuantity4.concat("x -",currentSelection4);

    document.getElementById('yourSelection').innerHTML = "";
    document.getElementById('yourSelection').innerHTML = finalFoodSelection;
    document.getElementById('yourSelection2').innerHTML = finalFoodSelection2;
    document.getElementById('yourSelection3').innerHTML = finalDrinkSelection;
    document.getElementById('yourSelection4').innerHTML = finalDrinkSelection2;



    return currentSelection;
}

