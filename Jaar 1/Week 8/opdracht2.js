/**
 * Created by Jan on 28 Oct 2019
 * No part of this publication may be reproduced, distributed, or transmitted in any form or by any means.
 * Copyright © EpicGodLight
 */

function addition(number1,number2){
    document.write(number1 + "+" + number2 + " = " + (number1 + number2) + "<br/>");
}
function subtraction(number1,number2){
    document.write(number1 + "-" + number2 + " = " + (number1 - number2) + "<br/>");
}
function multiplication(number1,number2){
    document.write(number1 + "x" + number2 + " = " + (number1 * number2) + "<br/>");
}
function division(number1,number2){
    document.write(number1 + "/" + number2 + " = " + (number1 / number2) + "<br/>");
}
function increment(number1){
    document.write(number1 + "+1" + " = " + (number1 + 1) + "<br/>");
}
function decrement(number1,number2){
    document.write(number1 + "-1" + " = " + (number1 - 1) + "<br/>");
}

addition(10, 12);
addition(18, 43);
addition(63, 21);
subtraction(58, 24);
subtraction(98, 49);
subtraction(29,14);
multiplication(6, 7);
multiplication(30, 20);
multiplication(19, 59);
division(144, 12);
division(27, 3);
division(85, 48);
increment(12);
increment(76);
increment(94);
decrement(34);
decrement(64);
decrement(16);

