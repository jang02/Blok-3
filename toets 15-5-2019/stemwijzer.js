var partijen = ["D66","PVDA","Groenlinks","PVV","VVD"];

function buttons(){
    for (let i = 0; i < partijen.length; i++) {

        var button = document.createElement('BUTTON');
        button.id = partijen[i];
        button.innerHTML = partijen[i];
        button.classList.add('customButton');

        document.getElementById("partijen").appendChild(button);
        partijen[partijen[i]] = 0;
        console.log('made ', partijen[i], 'value is: ', partijen[partijen[i]]);
        button.setAttribute('onclick',"addpoint('" + partijen[i] + "')");

    }

    var result = document.createElement('BUTTON');
    result.id = "resultbutton";
    result.innerHTML = "bereken score";

    result.setAttribute('onclick',"createresult()");
    document.getElementById("result").appendChild(result);
}

function addpoint(name) {
    console.log(name);
    partijen[name]++;
}

function createresult() {
    document.getElementById("partijen").remove();
    document.getElementById("resultbutton").remove();

    for (let i = 0; i < partijen.length; i++) {
        var text = document.createElement('P');
        text.classList.add('resulttext');
        text.innerHTML = partijen[partijen[i]] + " stemmen voor " + partijen[i];
        document.getElementById('result').appendChild(text);
    }
    let max = 0;
    for (let i = 0; i < partijen.length; i++) {

        for( let n = 0; n < partijen.length; n++)

        if (partijen[partijen[i]] > max){

            max = partijen[partijen[i]];
            var maxpartij = partijen[i];
            console.log(max)
        }
    }
    var text = document.createElement('P');
    text.classList.add('resulttext');
    text.innerHTML = "de meeste stemmen waren voor " + maxpartij + " met " + max + " stemmen";
    document.getElementById('result').appendChild(text);
}
buttons();