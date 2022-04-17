function openLoginRequest(){
    alert('Log in to earn comment permission');
}

function openCreatePost(){
    // document.getElementById('conty').style.zIndex  = '-1';
    // document.getElementById('conty').style.opacity = '0.8';
    // document.getElementById('conty').style.filter = 'blur(16px)';

    
    // document.getElementById('results_modal').style.display = 'block';
    document.getElementById('createPost').style.visibility = 'visible';
    document.getElementById('createPost').style.height = 'initial';
    document.getElementById('createPost').style.transitionDelay  = '.3s';
    
}

// toSearchVar for search
var toSearchVar = '0';
var seasonFlag = false;
function changeTagNav(thisId){
    if(thisId.id != 'raceTags' || seasonFlag){
        document.getElementById('postModal').style.visibility = 'visible'
        document.getElementById('postModal').style.height = 'initial';
        document.getElementById('postTags_extra').style.visibility = 'visible'
        document.getElementById('postSearch').style.visibility = 'visible'
        document.getElementById('suggestions').innerHTML  = '';
    }
    if(thisId.id == 'raceTags' && seasonFlag == false){
        document.getElementById('postModal').style.visibility = 'hidden'
        document.getElementById('postTags_extra').style.visibility = 'hidden'
        document.getElementById('postSearch').style.visibility = 'hidden'
        document.getElementById('postModal').style.height = '1px';
        document.getElementById('suggestions').innerHTML  = '';
        document.getElementById('driverTags').style.backgroundColor  = 'white';
        document.getElementById('driverTags').innerHTML  = 'Driver(s) <i class="fa fa-caret-down"></i>';
        document.getElementById('constructorTags').style.backgroundColor  = 'white';
        document.getElementById('constructorTags').innerHTML  = 'Constructor(s) <i class="fa fa-caret-down"></i>';
        document.getElementById('circuitTags').style.backgroundColor  = 'white';
        document.getElementById('circuitTags').innerHTML  = 'Circuit(s) <i class="fa fa-caret-down"></i>';
        document.getElementById('seasonTags').style.backgroundColor  = 'white';
        document.getElementById('seasonTags').innerHTML  = 'Season(s) <i class="fa fa-caret-down"></i>';
        document.getElementById('raceTags').style.backgroundColor  = 'white';
        document.getElementById('raceTags').innerHTML  = 'Round(s) <i class="fa fa-caret-down"></i>';
    }



    
    switch(thisId.id) {
        case 'driverTags':
            document.getElementById('driverTags').style.backgroundColor  = 'grey';
            document.getElementById('driverTags').innerHTML  = 'Driver(s) <i class="fa fa-caret-up"></i>';
            document.getElementById('constructorTags').style.backgroundColor  = 'white';
            document.getElementById('constructorTags').innerHTML  = 'Constructor(s) <i class="fa fa-caret-down"></i>';
            document.getElementById('circuitTags').style.backgroundColor  = 'white';
            document.getElementById('circuitTags').innerHTML  = 'Circuit(s) <i class="fa fa-caret-down"></i>';
            document.getElementById('seasonTags').style.backgroundColor  = 'white';
            document.getElementById('seasonTags').innerHTML  = 'Season(s) <i class="fa fa-caret-down"></i>';
            document.getElementById('raceTags').style.backgroundColor  = 'white';
            document.getElementById('raceTags').innerHTML  = 'Round(s) <i class="fa fa-caret-down"></i>';
            toSearchVar = 'drivers';
            break;
        case 'constructorTags':
            document.getElementById('driverTags').style.backgroundColor  = 'white';
            document.getElementById('driverTags').innerHTML  = 'Driver(s) <i class="fa fa-caret-down"></i>';
            document.getElementById('constructorTags').style.backgroundColor  = 'grey';
            document.getElementById('constructorTags').innerHTML  = 'Constructor(s) <i class="fa fa-caret-up"></i>';
            document.getElementById('circuitTags').style.backgroundColor  = 'white';
            document.getElementById('circuitTags').innerHTML  = 'Circuit(s) <i class="fa fa-caret-down"></i>';
            document.getElementById('seasonTags').style.backgroundColor  = 'white';
            document.getElementById('seasonTags').innerHTML  = 'Season(s) <i class="fa fa-caret-down"></i>';
            document.getElementById('raceTags').style.backgroundColor  = 'white';
            document.getElementById('raceTags').innerHTML  = 'Round(s) <i class="fa fa-caret-down"></i>';
            toSearchVar = 'constructors';
            break;
        case 'circuitTags':
            document.getElementById('driverTags').style.backgroundColor  = 'white';
            document.getElementById('driverTags').innerHTML  = 'Driver(s) <i class="fa fa-caret-down"></i>';
            document.getElementById('constructorTags').style.backgroundColor  = 'white';
            document.getElementById('constructorTags').innerHTML  = 'Constructor(s) <i class="fa fa-caret-down"></i>';
            document.getElementById('circuitTags').style.backgroundColor  = 'grey';
            document.getElementById('circuitTags').innerHTML  = 'Circuit(s) <i class="fa fa-caret-up"></i>';
            document.getElementById('seasonTags').style.backgroundColor  = 'white';
            document.getElementById('seasonTags').innerHTML  = 'Season(s) <i class="fa fa-caret-down"></i>';
            document.getElementById('raceTags').style.backgroundColor  = 'white';
            document.getElementById('raceTags').innerHTML  = 'Round(s) <i class="fa fa-caret-down"></i>';
            toSearchVar = 'circuits';
            break;
        case 'seasonTags':
            document.getElementById('driverTags').style.backgroundColor  = 'white';
            document.getElementById('driverTags').innerHTML  = 'Driver(s) <i class="fa fa-caret-down"></i>';
            document.getElementById('constructorTags').style.backgroundColor  = 'white';
            document.getElementById('constructorTags').innerHTML  = 'Constructor(s) <i class="fa fa-caret-down"></i>';
            document.getElementById('circuitTags').style.backgroundColor  = 'white';
            document.getElementById('circuitTags').innerHTML  = 'Circuit(s) <i class="fa fa-caret-down"></i>';
            document.getElementById('seasonTags').style.backgroundColor  = 'grey';
            document.getElementById('seasonTags').innerHTML  = 'Season(s) <i class="fa fa-caret-up"></i>';
            document.getElementById('raceTags').style.backgroundColor  = 'white';
            document.getElementById('raceTags').innerHTML  = 'Round(s) <i class="fa fa-caret-down"></i>';
            toSearchVar = 'seasons';
            break;
        case 'raceTags' :
            if(seasonFlag){
                document.getElementById('driverTags').style.backgroundColor  = 'white';
                document.getElementById('driverTags').innerHTML  = 'Driver(s) <i class="fa fa-caret-down"></i>';
                document.getElementById('constructorTags').style.backgroundColor  = 'white';
                document.getElementById('constructorTags').innerHTML  = 'Constructor(s) <i class="fa fa-caret-down"></i>';
                document.getElementById('circuitTags').style.backgroundColor  = 'white';
                document.getElementById('circuitTags').innerHTML  = 'Circuit(s) <i class="fa fa-caret-down"></i>';
                document.getElementById('seasonTags').style.backgroundColor  = 'white';
                document.getElementById('seasonTags').innerHTML  = 'Season(s) <i class="fa fa-caret-down"></i>';
                document.getElementById('raceTags').style.backgroundColor  = 'grey';
                document.getElementById('raceTags').innerHTML  = 'Round(s) <i class="fa fa-caret-up"></i>';
                toSearchVar = 'races';
                break;
            }else{
                break;
            }
      }
  
    
}


var delayTimer;
function searchAll(){

   
    

    clearTimeout(delayTimer);
    delayTimer = setTimeout(function() {
        
    




        document.getElementById('suggestions').innerHTML = ' ';
        
        
        var x = document.getElementById('search');
        
        switch(toSearchVar) {
            case 'drivers':
                var toSearch = 'drivers';
                break;
            case 'constructors':
                var toSearch = 'constructors';
                break;
            case 'circuits':
                var toSearch = 'circuits';
                break;
            case 'seasons':
                var toSearch = 'seasons';
                break;
            case 'races':
                var toSearch = 'races';
                break;
            }

        
        url='/all_search';
        var xhr = new XMLHttpRequest();
        xhr.open('GET', url+"?"+"value=" + encodeURIComponent(x.value, true) +"&toSearch=" + encodeURIComponent(toSearch, true));

        xhr.onload = function () {
            const json = JSON.parse(xhr.responseText);
        
            
            switch(toSearchVar) {
                case 'drivers':
                    for (let i = 0; i < json.length; i++) {
                        document.getElementById('suggestions').innerHTML +=  '<p onclick="putValue(this);">'+json[i].forename+' '+json[i].surname+'</p>';     
                    }
                    break;
                case 'constructors':
                    for (let i = 0; i < json.length; i++) {
                        document.getElementById('suggestions').innerHTML +=  '<p onclick="putValue(this);">'+json[i].name+'</p>';
                        
                    }
                    break;
                case 'circuits':
                    for (let i = 0; i < json.length; i++) {
                        document.getElementById('suggestions').innerHTML +=  '<p onclick="putValue(this);">'+json[i].name+'</p>';
                        
                    }
                    break;
                case 'seasons':
                    for (let i = 0; i < json.length; i++) {
                        document.getElementById('suggestions').innerHTML +=  '<p onclick="putValue(this);">'+json[i].year+'</p>';
                        
                    }
                    break;
                case 'races':
                    for (let i = 0; i < json.length; i++) {
                        document.getElementById('suggestions').innerHTML +=  '<p onclick="putValue(this);">'+json[i].round+'</p>';
                        
                    }
                    break;
                }
            


        };

        xhr.send(null);

    }, 750); 
}


var driverCount = 0;
var constructorCount = 0;
var circuitCount = 0;
var seasonCount = 0;
var raceCount = 0;
var registeredValuesDrivers = [];
var registeredValuesConstructors = [];
var registeredValuesCircuits = [];
var registeredValuesSeasons = [];
var registeredValuesRaces = [];
function putValue(thisValue){

    switch(toSearchVar) {
        case 'drivers':
            if(registeredValuesDrivers.includes(thisValue.innerHTML)){
                break;
            }if(driverCount == 3){
                alert('Clear tags to add new ones');
                break;
            }
            else{
                driverCount+=1;
                document.getElementById('driverTag_'+driverCount+'_p').innerHTML =  thisValue.innerHTML;
                document.getElementById('driverTag_'+driverCount).value =  thisValue.innerHTML;
                registeredValuesDrivers.push(thisValue.innerHTML);
                thisValue.innerHTML += '<font color="green">&nbsp;&nbsp;Added</font>';
                break;
            }
        case 'constructors':
            if(registeredValuesConstructors.includes(thisValue.innerHTML)){
                break;
            }
            if(constructorCount == 3){
                alert('Clear tags to add new ones');
                break;
            }
            else{
                constructorCount+=1;
                document.getElementById('constructorTag_'+constructorCount+'_p').innerHTML =  thisValue.innerHTML;
                document.getElementById('constructorTag_'+constructorCount).value =  thisValue.innerHTML;
                registeredValuesConstructors.push(thisValue.innerHTML);
                thisValue.innerHTML += '<font color="green">&nbsp;&nbsp;Added</font>';
                break;
            }
        case 'circuits':
            if(registeredValuesCircuits.includes(thisValue.innerHTML)){
                break;
            }
            if(circuitCount == 3){
                alert('Clear tags to add new ones');
                break;
            }
            else{
                circuitCount+=1;
                document.getElementById('circuitTag_'+circuitCount+'_p').innerHTML =  thisValue.innerHTML;
                document.getElementById('circuitTag_'+circuitCount).value =  thisValue.innerHTML;
                registeredValuesCircuits.push(thisValue.innerHTML);
                thisValue.innerHTML += '<font color="green">&nbsp;&nbsp;Added</font>';
                break;
            }
        case 'seasons':
            if(registeredValuesSeasons.includes(thisValue.innerHTML)){
                break;
            }
            if(seasonCount == 3){
                alert('Clear tags to add new ones');
                break;
            }
            else{
                seasonCount+=1;
                seasonFlag = true;
                document.getElementById('raceTags').style.opacity = '1';
                document.getElementById('raceTags').style.cursor = 'pointer';
                document.getElementById('seasonTag_'+seasonCount+'_p').innerHTML =  thisValue.innerHTML;
                document.getElementById('seasonTag_'+seasonCount).value =  thisValue.innerHTML;
                registeredValuesSeasons.push(thisValue.innerHTML);
                thisValue.innerHTML += '<font color="green">&nbsp;&nbsp;Added</font>';
                break;
            }
        case 'races':
            if(raceCount == 3){
                alert('Clear tags to add new ones');
                break;
            }
            else{
                raceCount+=1;
                document.getElementById('raceTag_'+raceCount+'_p').innerHTML =  thisValue.innerHTML;
                document.getElementById('raceTag_'+raceCount).value =  thisValue.innerHTML;
                registeredValuesRaces.push(thisValue.innerHTML);
                thisValue.innerHTML += '<font color="green">&nbsp;&nbsp;Added</font>';
                break;
            }
        }

}


function clearThis(){

    if(document.getElementById('suggestions').innerHTML != ''){
        document.getElementById('suggestions').innerHTML  = '<font color="red">&nbsp;&nbsp;Cleared '+toSearchVar+'</font>';
    }
    
    switch(toSearchVar) {
        case 'drivers':
            driverCount = 0;
            registeredValuesDrivers = [];
            document.getElementById("driverTag_1").value = "";
            document.getElementById("driverTag_2").value = "";
            document.getElementById("driverTag_3").value = "";
            document.getElementById("driverTag_1_p").innerText = "-";
            document.getElementById("driverTag_2_p").innerText = "-";
            document.getElementById("driverTag_3_p").innerText = "-";
        case 'constructors':
            constructorCount = 0;
            registeredValuesConstructors = [];
            document.getElementById("constructorTag_1").value = "";
            document.getElementById("constructorTag_2").value = "";
            document.getElementById("constructorTag_3").value = "";
            document.getElementById("constructorTag_1_p").innerText = "-";
            document.getElementById("constructorTag_2_p").innerText = "-";
            document.getElementById("constructorTag_3_p").innerText = "-";
        case 'circuits':
            circuitCount = 0;
            registeredValuesCircuits = [];
            document.getElementById("circuitTag_1").value = "";
            document.getElementById("circuitTag_2").value = "";
            document.getElementById("circuitTag_3").value = "";
            document.getElementById("circuitTag_1_p").innerText = "-";
            document.getElementById("circuitTag_2_p").innerText = "-";
            document.getElementById("circuitTag_3_p").innerText = "-";
        case 'seasons':
            seasonCount = 0;
            seasonFlag = false;
            document.getElementById('raceTags').style.opacity = '0.5';
            document.getElementById('raceTags').style.cursor = 'not-allowed';
            registeredValuesSeasons = [];
            document.getElementById("seasonTag_1").value = "";
            document.getElementById("seasonTag_2").value = "";
            document.getElementById("seasonTag_3").value = "";
            document.getElementById("seasonTag_1_p").innerText = "-";
            document.getElementById("seasonTag_2_p").innerText = "-";
            document.getElementById("seasonTag_3_p").innerText = "-";
        case 'races':
            raceCount = 0;
            registeredValuesRaces = [];
            document.getElementById("raceTag_1").value = "";
            document.getElementById("raceTag_2").value = "";
            document.getElementById("raceTag_3").value = "";
            document.getElementById("raceTag_1_p").innerText = "-";
            document.getElementById("raceTag_2_p").innerText = "-";
            document.getElementById("raceTag_3_p").innerText = "-";
        }

}


function clearAll(){

    driverCount = 0;
    constructorCount = 0;
    circuitCount = 0;
    seasonCount = 0;
    raceCount = 0;
    registeredValuesDrivers = [];
    registeredValuesConstructors = [];
    registeredValuesCircuits = [];
    registeredValuesSeasons = [];
    registeredValuesRaces = [];
    seasonFlag = false;
    document.getElementById('raceTags').style.opacity = '0.5';
    document.getElementById('raceTags').style.cursor = 'not-allowed';

    if(toSearchVar == 'races'){
        document.getElementById('raceTags').style.backgroundColor  = 'white';
        document.getElementById('raceTags').innerHTML  = 'Round(s) <i class="fa fa-caret-down"></i>';
        document.getElementById('postModal').style.visibility = 'hidden'
        document.getElementById('postTags_extra').style.visibility = 'hidden'
        document.getElementById('postSearch').style.visibility = 'hidden'
        document.getElementById('postModal').style.height = '1px';
        document.getElementById('suggestions').innerHTML  = '';
    }



    document.getElementById("driverTag_1").value = "";
    document.getElementById("driverTag_2").value = "";
    document.getElementById("driverTag_3").value = "";
    document.getElementById("constructorTag_1").value = "";
    document.getElementById("constructorTag_2").value = "";
    document.getElementById("constructorTag_3").value = "";
    document.getElementById("circuitTag_1").value = "";
    document.getElementById("circuitTag_2").value = "";
    document.getElementById("circuitTag_3").value = "";
    document.getElementById("seasonTag_1").value = "";
    document.getElementById("seasonTag_2").value = "";
    document.getElementById("seasonTag_3").value = "";
    document.getElementById("raceTag_1").value = "";
    document.getElementById("raceTag_2").value = "";
    document.getElementById("raceTag_3").value = "";




    document.getElementById("driverTag_1_p").innerText = "-";
    document.getElementById("driverTag_2_p").innerText = "-";
    document.getElementById("driverTag_3_p").innerText = "-";
    document.getElementById("constructorTag_1_p").innerText = "-";
    document.getElementById("constructorTag_2_p").innerText = "-";
    document.getElementById("constructorTag_3_p").innerText = "-";
    document.getElementById("circuitTag_1_p").innerText = "-";
    document.getElementById("circuitTag_2_p").innerText = "-";
    document.getElementById("circuitTag_3_p").innerText = "-";
    document.getElementById("seasonTag_1_p").innerText = "-";
    document.getElementById("seasonTag_2_p").innerText = "-";
    document.getElementById("seasonTag_3_p").innerText = "-";
    document.getElementById("raceTag_1_p").innerText = "-";
    document.getElementById("raceTag_2_p").innerText = "-";
    document.getElementById("raceTag_3_p").innerText = "-";

    if(document.getElementById('suggestions').innerHTML != ''){
        document.getElementById('suggestions').innerHTML  = '<font color="red">&nbsp;&nbsp;Cleared</font>';
    }
    
}