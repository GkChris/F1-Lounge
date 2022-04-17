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
            document.getElementById('drivers_div').style.display = 'flex';
            document.getElementById('constructors_div').style.display = 'none';
            document.getElementById('circuits_div').style.display = 'none';
            document.getElementById('extras_div').style.display = 'none';
            document.getElementById('winning_div').style.display = 'none';
            document.getElementById('drivers').style.backgroundColor = '#C0C0C0';
            document.getElementById('constructors').style.backgroundColor = '#F5FFFA';
            document.getElementById('circuits').style.backgroundColor = '#F5FFFA';
            document.getElementById('winning').style.backgroundColor = '#F5FFFA';
            document.getElementById('extras').style.backgroundColor = '#F5FFFA';
            break;
        case 'constructors':
            document.getElementById('drivers_div').style.display = 'none';
            document.getElementById('constructors_div').style.display = 'flex';
            document.getElementById('circuits_div').style.display = 'none';
            document.getElementById('extras_div').style.display = 'none';
            document.getElementById('winning_div').style.display = 'none';
            document.getElementById('drivers').style.backgroundColor = '#F5FFFA';
            document.getElementById('constructors').style.backgroundColor = '#C0C0C0';
            document.getElementById('circuits').style.backgroundColor = '#F5FFFA';
            document.getElementById('winning').style.backgroundColor = '#F5FFFA';
            document.getElementById('extras').style.backgroundColor = '#F5FFFA';
            break;
        case 'circuits':
            document.getElementById('drivers_div').style.display = 'none';
            document.getElementById('constructors_div').style.display = 'none';
            document.getElementById('circuits_div').style.display = 'flex';
            document.getElementById('extras_div').style.display = 'none';
            document.getElementById('winning_div').style.display = 'none';
            document.getElementById('drivers').style.backgroundColor = '#F5FFFA';
            document.getElementById('constructors').style.backgroundColor = '#F5FFFA';
            document.getElementById('circuits').style.backgroundColor = '#C0C0C0';
            document.getElementById('winning').style.backgroundColor = '#F5FFFA';
            document.getElementById('extras').style.backgroundColor = '#F5FFFA';
            break;
        case 'winning' :
            document.getElementById('drivers_div').style.display = 'none';
            document.getElementById('constructors_div').style.display = 'none';
            document.getElementById('circuits_div').style.display = 'none';
            document.getElementById('extras_div').style.display = 'none';
            document.getElementById('winning_div').style.display = 'flex';
            document.getElementById('drivers').style.backgroundColor = '#F5FFFA';
            document.getElementById('constructors').style.backgroundColor = '#F5FFFA';
            document.getElementById('circuits').style.backgroundColor = '#F5FFFA';
            document.getElementById('winning').style.backgroundColor = '#C0C0C0';
            document.getElementById('extras').style.backgroundColor = '#F5FFFA';
            break;
        case 'extras':
            document.getElementById('drivers_div').style.display = 'none';
            document.getElementById('constructors_div').style.display = 'none';
            document.getElementById('circuits_div').style.display = 'none';
            document.getElementById('extras_div').style.display = 'flex';
            document.getElementById('winning_div').style.display = 'none';
            document.getElementById('drivers').style.backgroundColor = '#F5FFFA';
            document.getElementById('constructors').style.backgroundColor = '#F5FFFA';
            document.getElementById('circuits').style.backgroundColor = '#F5FFFA';
            document.getElementById('winning').style.backgroundColor = '#F5FFFA';
            document.getElementById('extras').style.backgroundColor = '#C0C0C0';
            break;
        }
}




