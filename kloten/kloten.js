/**
 * Created by Jan on 06 Jul 2019
 * No part of this publication may be reproduced, distributed, or transmitted in any form or by any means.
 * Copyright © EpicGodLight
 */

function checkInput() {
    let string = document.getElementById("entry").value;
    let array = string.split(" ");
    
    switch (array[0]) {
        case "gamemode":
            switch (array[1]) {
                case "0":
                    let surv = "Gamemode set to survival mode";
                    document.getElementById("output").innerHTML = surv;
                    break;
                case "1":
                    let crea = "Gamemode set to creative mode";
                    document.getElementById("output").innerHTML = crea;
                    break;
                case "2":
                    let adv = "Gamemode set to adventure mode";
                    document.getElementById("output").innerHTML = adv;
                    break;
                case "3":
                    let spec = "Gamemode set to spectator mode";
                    document.getElementById("output").innerHTML = spec;
                    break;
                default:
                    let error = "Error while executing command, command may not be implemented yet, or check your entry.";
                    document.getElementById("output").innerHTML = error;
            }
            break;
        case "heal":
            let heal = "thou hast been healed!";
            document.getElementById("output").innerHTML = heal;
            break;
        case "feed":
            let feed = "thou hast been fed!";
            document.getElementById("output").innerHTML = feed;
            break;
        default:
            let error = "Error while executing command, command may not be implemented yet. or check your entry.";
            document.getElementById("output").innerHTML = error;
    }

}


document.addEventListener('keydown', function(event){
    if (event.keyCode === 13){
        checkInput();
    }
} );