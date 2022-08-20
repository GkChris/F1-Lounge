function changeNav(thisId){
    var id = thisId.id;
    var x = document.getElementsByClassName("stats_options");
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
        case 'drivers':
            document.getElementById('drivers').style.backgroundColor = 'rgba(0,0,0,0.3)';
            document.getElementById('drivers').style.color = 'white';
            document.getElementById('drivers').innerHTML = '<p>Drivers</p><i class="fa fa-caret-up"></i>';
            document.getElementById('constructors').innerHTML = '<p>Constructors</p><i class="fa fa-caret-down"></i>';
            document.getElementById('circuits').innerHTML = '<p>Circuits</p><i class="fa fa-caret-down"></i>';
            document.getElementById('extras').innerHTML = '<p>Extra</p><i class="fa fa-caret-down"></i>';
            document.getElementById('drivers_div').style.display = 'flex';
            document.getElementById('constructors_div').style.display = 'none';
            document.getElementById('circuits_div').style.display = 'none';
            document.getElementById('extras_div').style.display = 'none';
            break;
        case 'constructors':
            document.getElementById('constructors').style.backgroundColor = 'rgba(0,0,0,0.3)';
            document.getElementById('constructors').style.color = 'white';
            document.getElementById('drivers').innerHTML = '<p>Drivers</p><i class="fa fa-caret-down"></i>';
            document.getElementById('constructors').innerHTML = '<p>Constructors</p><i class="fa fa-caret-up"></i>';
            document.getElementById('circuits').innerHTML = '<p>Circuits</p><i class="fa fa-caret-down"></i>';
            document.getElementById('extras').innerHTML = '<p>Extra</p><i class="fa fa-caret-down"></i>';
            document.getElementById('drivers_div').style.display = 'none';
            document.getElementById('constructors_div').style.display = 'flex';
            document.getElementById('circuits_div').style.display = 'none';
            document.getElementById('extras_div').style.display = 'none';
            break;
        case 'circuits':
            document.getElementById('circuits').style.backgroundColor = 'rgba(0,0,0,0.3)';
            document.getElementById('circuits').style.color = 'white';
            document.getElementById('drivers').innerHTML = '<p>Drivers</p><i class="fa fa-caret-down"></i>';
            document.getElementById('constructors').innerHTML = '<p>Constructors</p><i class="fa fa-caret-down"></i>';
            document.getElementById('circuits').innerHTML = '<p>Circuits</p><i class="fa fa-caret-up"></i>';
            document.getElementById('extras').innerHTML = '<p>Extra</p><i class="fa fa-caret-down"></i>';
            document.getElementById('drivers_div').style.display = 'none';
            document.getElementById('constructors_div').style.display = 'none';
            document.getElementById('circuits_div').style.display = 'flex';
            document.getElementById('extras_div').style.display = 'none';
            break;
        case 'extras':
            document.getElementById('extras').style.backgroundColor = 'rgba(0,0,0,0.3)';
            document.getElementById('extras').style.color = 'white';
            document.getElementById('drivers').innerHTML = '<p>Drivers</p><i class="fa fa-caret-down"></i>';
            document.getElementById('constructors').innerHTML = '<p>Constructors</p><i class="fa fa-caret-down"></i>';
            document.getElementById('circuits').innerHTML = '<p>Circuits</p><i class="fa fa-caret-down"></i>';
            document.getElementById('extras').innerHTML = '<p>Extra</p><i class="fa fa-caret-up"></i>';
            document.getElementById('drivers_div').style.display = 'none';
            document.getElementById('constructors_div').style.display = 'none';
            document.getElementById('circuits_div').style.display = 'none';
            document.getElementById('extras_div').style.display = 'flex';
            break;
        }
}
