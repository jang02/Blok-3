var arrayEen = [1,2,3,4,5,6,7,8,9,10];
var arrayTwee = [2,4,6,8,10,12,14,16,18,20];

function optellen(value1, value2) {
    for(let i = 0; i < value1.length; i++){
        document.write(value1[i] + value2[i],"</br>")
    }

}
optellen(arrayEen, arrayTwee);