function changeNav(thisId){
    var id = thisId.id;
    var x = document.getElementsByClassName("nav_options");
    var i;
    for (i = 0; i < x.length; i++) {
    x[i].style.backgroundColor = "#F5F5F5";
    x[i].style.color = "black";
    }

    // adjust display style based on sceen
    var screenWidth = window.screen.width * window.devicePixelRatio;
    if(screenWidth>1200){
        var toMake = 'flex';
    }else{
        var toMake = 'Block'
    }
    switch(id) {
        case 'overview':
            document.getElementById('overview').style.backgroundColor = 'rgba(0,0,0,0.3)';
            document.getElementById('overview').style.color = 'white';
            document.getElementById('overview_div').style.display = 'block';
            document.getElementById('standings_div').style.display = 'none';
            document.getElementById('rounds_div').style.display = 'none';
            document.getElementById('participants_div').style.display = 'none';
            break;
        case 'standings':
            document.getElementById('standings').style.backgroundColor = 'rgba(0,0,0,0.3)';
            document.getElementById('standings').style.color = 'white';
            document.getElementById('overview_div').style.display = 'none';
            document.getElementById('standings_div').style.display = toMake;
            document.getElementById('rounds_div').style.display = 'none';
            document.getElementById('participants_div').style.display = 'none';
            break;
        case 'rounds':
            document.getElementById('rounds').style.backgroundColor = 'rgba(0,0,0,0.3)';
            document.getElementById('rounds').style.color = 'white';
            document.getElementById('overview_div').style.display = 'none';
            document.getElementById('standings_div').style.display = 'none';
            document.getElementById('rounds_div').style.display = toMake;
            document.getElementById('participants_div').style.display = 'none';
            break;
        case 'participants':
            document.getElementById('participants').style.backgroundColor = 'rgba(0,0,0,0.3)';
            document.getElementById('participants').style.color = 'white';
            document.getElementById('overview_div').style.display = 'none';
            document.getElementById('standings_div').style.display = 'none';
            document.getElementById('rounds_div').style.display = 'none';
            document.getElementById('participants_div').style.display = toMake;
            break;
        }
}




function changeSmallNav(thisId){
    var id = thisId.id;
    var x = document.getElementsByClassName("small_nav_options");
    var i;
    for (i = 0; i < x.length; i++) {
    x[i].style.backgroundColor = "#F5F5F5";
    x[i].style.color = "black";
    }

    // adjust display style based on sceen
    var screenWidth = window.screen.width * window.devicePixelRatio;
    if(screenWidth>1200){
        var toMake = 'flex';
    }else{
        var toMake = 'Block'
    }
    switch(id) {
        case 'driver_participants':
            document.getElementById('driver_participants').style.backgroundColor = 'rgba(0,0,0,0.3)';
            document.getElementById('driver_participants').style.color = 'white';
            document.getElementById('driver_participants_div').style.display = toMake;
            document.getElementById('constructor_participants_div').style.display = 'none';
            break;
        case 'constructor_participants':
            document.getElementById('constructor_participants').style.backgroundColor = 'rgba(0,0,0,0.3)';
            document.getElementById('constructor_participants').style.color = 'white';
            document.getElementById('driver_participants_div').style.display = 'none';
            document.getElementById('constructor_participants_div').style.display = toMake;
            break;
        }
}




function changeStandingsNav(thisId){
    var id = thisId.id;
    var x = document.getElementsByClassName("standings_nav_options");
    var i;
    for (i = 0; i < x.length; i++) {
    x[i].style.backgroundColor = "#F5F5F5";
    x[i].style.color = "black";
    }

    // adjust display style based on sceen
    var screenWidth = window.screen.width * window.devicePixelRatio;
    if(screenWidth>1200){
        var toMake = 'flex';
    }else{
        var toMake = 'Block'
    }
    switch(id) {
        case 'driver_standings':
            document.getElementById('driver_standings').style.backgroundColor = 'rgba(0,0,0,0.3)';
            document.getElementById('driver_standings').style.color = 'white';
            document.getElementById('driver_standings_div').style.display = toMake;
            document.getElementById('constructor_standings_div').style.display = 'none';
            break;
        case 'constructor_standings':
            document.getElementById('constructor_standings').style.backgroundColor = 'rgba(0,0,0,0.3)';
            document.getElementById('constructor_standings').style.color = 'white';
            document.getElementById('driver_standings_div').style.display = 'none';
            document.getElementById('constructor_standings_div').style.display = toMake;
            break;
        }
}


