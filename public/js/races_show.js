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
            document.getElementById('race_div').style.display = 'none';
            document.getElementById('qualifying_div').style.display = 'none';
            document.getElementById('extras_div').style.display = 'none';
            break;
        case 'race':
            document.getElementById('race').style.backgroundColor = 'rgba(0,0,0,0.3)';
            document.getElementById('race').style.color = 'white';
            document.getElementById('overview_div').style.display = 'none';
            document.getElementById('race_div').style.display = toMake;
            document.getElementById('qualifying_div').style.display = 'none';
            document.getElementById('extras_div').style.display = 'none';
            break;
        case 'qualifying':
            document.getElementById('qualifying').style.backgroundColor = 'rgba(0,0,0,0.3)';
            document.getElementById('qualifying').style.color = 'white';
            document.getElementById('overview_div').style.display = 'none';
            document.getElementById('race_div').style.display = 'none';
            document.getElementById('qualifying_div').style.display = toMake;
            document.getElementById('extras_div').style.display = 'none';
            break;
        case 'extras':
            document.getElementById('extras').style.backgroundColor = 'rgba(0,0,0,0.3)';
            document.getElementById('extras').style.color = 'white';
            document.getElementById('overview_div').style.display = 'none';
            document.getElementById('race_div').style.display = 'none';
            document.getElementById('qualifying_div').style.display = 'none';
            document.getElementById('extras_div').style.display = toMake;
            break;
        }
}




function changeRaceNav(thisId){
    var id = thisId.id;
    var x = document.getElementsByClassName("race_nav_options");
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
        case 'results':
            document.getElementById('results').style.backgroundColor = 'rgba(0,0,0,0.3)';
            document.getElementById('results').style.color = 'white';
            document.getElementById('results_div').style.display = toMake;
            document.getElementById('pit_stops_div').style.display = 'none';
            document.getElementById('fastest_laps_div').style.display = 'none';
            break;
        case 'pit_stops':
            document.getElementById('pit_stops').style.backgroundColor = 'rgba(0,0,0,0.3)';
            document.getElementById('pit_stops').style.color = 'white';
            document.getElementById('results_div').style.display = 'none';
            document.getElementById('pit_stops_div').style.display = toMake;
            document.getElementById('fastest_laps_div').style.display = 'none';
            break;
        case 'fastest_laps':
            document.getElementById('fastest_laps').style.backgroundColor = 'rgba(0,0,0,0.3)';
            document.getElementById('fastest_laps').style.color = 'white';
            document.getElementById('results_div').style.display = 'none';
            document.getElementById('pit_stops_div').style.display = 'none';
            document.getElementById('fastest_laps_div').style.display = toMake;
            break;
        }
}




function changeExtrasNav(thisId){
    var id = thisId.id;
    var x = document.getElementsByClassName("extras_nav_options");
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
        case 'standings':
            document.getElementById('standings').style.backgroundColor = 'rgba(0,0,0,0.3)';
            document.getElementById('standings').style.color = 'white';
            document.getElementById('standings_div').style.display = toMake;
            document.getElementById('participants_div').style.display = 'none';
            document.getElementById('circuit_div').style.display = 'none';
            break;
        case 'participants':
            document.getElementById('participants').style.backgroundColor = 'rgba(0,0,0,0.3)';
            document.getElementById('participants').style.color = 'white';
            document.getElementById('standings_div').style.display = 'none';
            document.getElementById('participants_div').style.display = toMake;
            document.getElementById('circuit_div').style.display = 'none';
            break;
        case 'circuit':
            document.getElementById('circuit').style.backgroundColor = 'rgba(0,0,0,0.3)';
            document.getElementById('circuit').style.color = 'white';
            document.getElementById('standings_div').style.display = 'none';
            document.getElementById('participants_div').style.display = 'none';
            document.getElementById('circuit_div').style.display = toMake;
            break;
        }
}


function changeCurrentDrivers(){
    document.getElementById('driver_current').style.display = 'none';
    document.getElementById('constructor_current').style.display = 'block';
}

function changeCurrentConstructors(){
    document.getElementById('constructor_current').style.display = 'none';
    document.getElementById('driver_current').style.display = 'block';
}

function changeSeasonDrivers(){
    document.getElementById('driver_season').style.display = 'none';
    document.getElementById('constructor_season').style.display = 'block';
}

function changeSeasonConstructors(){
    document.getElementById('constructor_season').style.display = 'none';
    document.getElementById('driver_season').style.display = 'block';
}

function partToTeams(){
    document.getElementById('drivers_part_grid').style.display = 'none';
    document.getElementById('constructors_part_grid').style.display = 'block';
}

function partToDrivers(){
    document.getElementById('constructors_part_grid').style.display = 'none';
    document.getElementById('drivers_part_grid').style.display = 'block';
}




function openResultsModal(driverNationality, number, grid, position, points, laps, time, fastestLap, 
    rank, fastestLapTime, fastestLapSpeed, driverRef, forename, surname, dob, nationality, name, status){
    document.getElementById('conty').style.zIndex  = '-1';
    document.getElementById('conty').style.opacity = '0.8';
    document.getElementById('conty').style.filter = 'blur(16px)';

    
    // document.getElementById('results_modal').style.display = 'block';
    document.getElementById('results_modal').style.visibility = 'visible'
    document.getElementById('results_modal').style.height = '600px';
    document.getElementById('rModal_upper').style.transitionDelay  = '.3s'
    document.getElementById('rModal_upper').style.visibility = 'visible'
    document.getElementById('rModal_lower').style.transitionDelay  = '.3s'
    document.getElementById('rModal_lower').style.visibility = 'visible'
    document.getElementById('theH2').style.transitionDelay  = '.3s'
    document.getElementById('theH2').style.visibility = 'visible'
    document.getElementById('theI').style.transitionDelay  = '.3s'
    document.getElementById('theI').style.visibility = 'visible'
    
    
    

    document.getElementById('conty').scrollIntoView({
        behavior: 'smooth',
        block: 'center',
        inline: 'center'
    });

    
   
    
    
    document.getElementById("rdriverImg").src="/images/jpg/drivers/"+driverRef+".jpg";
    document.getElementById("rdriverImg").onerror=function() {document.getElementById("rdriverImg").src="/images/jpg/drivers/not_found.jpg";}
    document.getElementById("rdriverA").href="/drivers/"+driverRef;

    document.getElementById('rdriverNationality').innerHTML = 'Nationality:&nbsp; <strong>'+driverNationality+'</strong>';
    document.getElementById('rnumber').innerHTML = 'Number:&nbsp; <strong>'+number+'</strong>';
    document.getElementById('rgrid').innerHTML = 'Grid position:&nbsp; <strong>'+grid+'</strong>';
    document.getElementById('rposition').innerHTML = 'Finished:&nbsp; <strong>'+position+'</strong>';
    document.getElementById('rpoints').innerHTML = 'Race points:&nbsp; <strong>'+points+'</strong>';
    document.getElementById('rlaps').innerHTML = 'Laps completed:&nbsp; <strong>'+laps+'</strong>';
    document.getElementById('rtime').innerHTML = 'Race time:&nbsp; <strong>'+time+'</strong>';
    document.getElementById('rfastestLap').innerHTML = 'Fastest lap time set at lap:&nbsp; <strong>'+fastestLap+'</strong>';
    document.getElementById('rrank').innerHTML = 'Fastest lap rank:&nbsp; <strong>'+rank+'</strong>';
    document.getElementById('rfastestLapTime').innerHTML = 'Fastest Lap:&nbsp; <strong>'+fastestLapTime+'</strong>';
    document.getElementById('rfastestLapSpeed').innerHTML = 'Average speed during fastest lap:&nbsp; <strong>'+fastestLapSpeed+' Km/h</strong>';
    document.getElementById('rforename').innerHTML = 'Forename:&nbsp; <strong>'+forename+'</strong>';
    document.getElementById('rsurname').innerHTML = 'Surname:&nbsp; <strong>'+surname+'</strong>';
    document.getElementById('rdob').innerHTML = 'Born:&nbsp; <strong>'+dob+'</strong>';
    document.getElementById('rname').innerHTML = 'Driving for:&nbsp; <strong>'+name+'</strong>';
    document.getElementById('rstatus').innerHTML = 'Race status:&nbsp; <strong>'+status+'</strong>';
}

function closeResultsModal(){
    document.getElementById('conty').style.zIndex  = 'unset';
    document.getElementById('conty').style.opacity = 'unset';
    document.getElementById('conty').style.filter = 'unset';

    
    // document.getElementById('results_modal').style.display = 'none';
    document.getElementById('results_modal').style.visibility = 'hidden'
    document.getElementById('rModal_upper').style.transition = '0s'
    document.getElementById('rModal_upper').style.visibility = 'hidden'
    document.getElementById('rModal_lower').style.transition = '0s'
    document.getElementById('rModal_lower').style.visibility = 'hidden'
    document.getElementById('theH2').style.transition = '0s'
    document.getElementById('theH2').style.visibility = 'hidden'
    document.getElementById('theI').style.transition = '0s'
    document.getElementById('theI').style.visibility = 'hidden'
    document.getElementById('results_modal').style.height = '1px';
}







function changeQualifyNav(thisId){
    var id = thisId.id;
    var x = document.getElementsByClassName("qualify_nav_options");
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
        case 'q_q':
            document.getElementById('q_q').style.backgroundColor = 'rgba(0,0,0,0.3)';
            document.getElementById('q_q').style.color = 'white';
            document.getElementById('q_div').style.display = toMake;
            document.getElementById('q_sr_div').style.display = 'none';
            break;
        case 'q_sr':
            document.getElementById('q_sr').style.backgroundColor = 'rgba(0,0,0,0.3)';
            document.getElementById('q_sr').style.color = 'white';
            document.getElementById('q_div').style.display = 'none';
            document.getElementById('q_sr_div').style.display = toMake;
            break;
        }
}