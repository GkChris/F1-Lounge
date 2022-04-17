function openField(thisId){
    var id = thisId.id;
    var username = document.getElementById('username_field');
    var mail = document.getElementById('mail_field');
    var password = document.getElementById('password_field');
    var del = document.getElementById('delete_field');
    switch(id) {
        case 'username_box':
            username.style.visibility = 'visible';
            username.style.height = '16rem';
            mail.style.visibility = 'hidden';
            mail.style.height = '1px';
            password.style.visibility = 'hidden';
            password.style.height = '1px';
            del.style.visibility = 'hidden';
            del.style.height = '1px';
            document.getElementById('uname_form').style.transitionDelay = '.5s';
            document.getElementById('uname_form').style.visibility = 'visible';
            document.getElementById('mail_form').style.transitionDelay = '0s';
            document.getElementById('mail_form').style.visibility = 'hidden';
            document.getElementById('pass_form').style.transitionDelay = '0s';
            document.getElementById('pass_form').style.visibility = 'hidden';
            document.getElementById('del_form').style.transitionDelay = '0s';
            document.getElementById('del_form').style.visibility = 'hidden';
            document.getElementById('p1p').style.visibility = 'visible';
            document.getElementById('p2p').style.visibility = 'hidden';
            document.getElementById('p3p').style.visibility = 'hidden';
            document.getElementById('p4p').style.visibility = 'hidden';
            document.getElementById('mail_span').style.visibility = 'hidden';
            break;
        case 'email_box':
            username.style.visibility = 'hidden';
            username.style.height = '1px';
            mail.style.visibility = 'visible';
            mail.style.height = '16rem';
            password.style.visibility = 'hidden';
            password.style.height = '1px';
            del.style.visibility = 'hidden';
            del.style.height = '1px';
            document.getElementById('uname_form').style.transitionDelay = '0s';
            document.getElementById('uname_form').style.visibility = 'hidden';
            document.getElementById('mail_form').style.transitionDelay = '.5s';
            document.getElementById('mail_form').style.visibility = 'visible';
            document.getElementById('pass_form').style.transitionDelay = '0s';
            document.getElementById('pass_form').style.visibility = 'hidden';
            document.getElementById('del_form').style.transitionDelay = '0s';
            document.getElementById('del_form').style.visibility = 'hidden';
            document.getElementById('p1p').style.visibility = 'hidden';
            document.getElementById('p2p').style.visibility = 'visible';
            document.getElementById('p3p').style.visibility = 'hidden';
            document.getElementById('p4p').style.visibility = 'hidden';
            document.getElementById('uname_span').style.visibility = 'hidden';
            break;
        case 'password_box':
            username.style.visibility = 'hidden';
            username.style.height = '1px';
            mail.style.visibility = 'hidden';
            mail.style.height = '1px';
            password.style.visibility = 'visible';
            password.style.height = '16rem';
            del.style.visibility = 'hidden';
            del.style.height = '1px';
            document.getElementById('uname_form').style.transitionDelay = '0s';
            document.getElementById('uname_form').style.visibility = 'hidden';
            document.getElementById('mail_form').style.transitionDelay = '0s';
            document.getElementById('mail_form').style.visibility = 'hidden';
            document.getElementById('pass_form').style.transitionDelay = '.5s';
            document.getElementById('pass_form').style.visibility = 'visible';
            document.getElementById('del_form').style.transitionDelay = '0s';
            document.getElementById('del_form').style.visibility = 'hidden';
            document.getElementById('p1p').style.visibility = 'hidden';
            document.getElementById('p2p').style.visibility = 'hidden';
            document.getElementById('p3p').style.visibility = 'visible';
            document.getElementById('p4p').style.visibility = 'hidden';
            document.getElementById('uname_span').style.visibility = 'hidden';
            document.getElementById('mail_span').style.visibility = 'hidden';
            break;
        case 'delete_box':
            username.style.visibility = 'hidden';
            username.style.height = '1px';
            mail.style.visibility = 'hidden';
            mail.style.height = '1px';
            password.style.visibility = 'hidden';
            password.style.height = '1px';
            del.style.visibility = 'visible';
            del.style.height = '11rem';
            document.getElementById('uname_form').style.transitionDelay = '0s';
            document.getElementById('uname_form').style.visibility = 'hidden';
            document.getElementById('mail_form').style.transitionDelay = '0s';
            document.getElementById('mail_form').style.visibility = 'hidden';
            document.getElementById('pass_form').style.transitionDelay = '0s';
            document.getElementById('pass_form').style.visibility = 'hidden';
            document.getElementById('del_form').style.transitionDelay = '.5s';
            document.getElementById('del_form').style.visibility = 'visible';
            document.getElementById('p1p').style.visibility = 'hidden';
            document.getElementById('p2p').style.visibility = 'hidden';
            document.getElementById('p3p').style.visibility = 'hidden';
            document.getElementById('p4p').style.visibility = 'visible';
            document.getElementById('uname_span').style.visibility = 'hidden';
            document.getElementById('mail_span').style.visibility = 'hidden';
            break;
        }
}



function closeField(){
    var username = document.getElementById('username_field');
    var mail = document.getElementById('mail_field');
    var password = document.getElementById('password_field');
    var del = document.getElementById('delete_field');
    username.style.visibility = 'hidden';
    username.style.height = '1px';
    mail.style.visibility = 'hidden';
    mail.style.height = '1px';
    password.style.visibility = 'hidden';
    password.style.height = '1px';
    del.style.visibility = 'hidden';
    del.style.height = '1px';
    document.getElementById('uname_form').style.transitionDelay = '0s';
    document.getElementById('uname_form').style.visibility = 'hidden';
    document.getElementById('mail_form').style.transitionDelay = '0s';
    document.getElementById('mail_form').style.visibility = 'hidden';
    document.getElementById('pass_form').style.transitionDelay = '0s';
    document.getElementById('pass_form').style.visibility = 'hidden';
    document.getElementById('del_form').style.transitionDelay = '0s';
    document.getElementById('del_form').style.visibility = 'hidden';
    var theFormP = document.getElementsByClassName('theFormP');
    for(var i = 0; i < theFormP.length; i++){
        theFormP[i].style.visibility = "hidden"; 
    }
    var theSpans = document.getElementsByClassName('theSpans');
    for(var i = 0; i < theSpans.length; i++){
        theSpans[i].style.visibility = "hidden"; 
    }
}



var delayTimerUname;
function searchUsername()
{

    clearTimeout(delayTimerUname);
    delayTimerUname = setTimeout(function() {
    
        var x = document.getElementById('uname_name');

        if(x.value != ''){
            url='/search_username';
            var xhr = new XMLHttpRequest();
            xhr.open('GET', url+"?"+"value=" + encodeURIComponent(x.value, true), true);
    
            xhr.onload = function () {
                var response = xhr.responseText;
                if(response == 'Username already exist'){
                    var theSpan = document.getElementById('uname_span');
                    var theButton = document.getElementById('uname_button');
                    theButton.disabled = 'true';
                    theSpan.style.color = 'red';
                    theSpan.style.visibility = 'visible';
                    theSpan.innerHTML = response;
                }else if(response == 'Free to use'){
                    var theSpan = document.getElementById('uname_span');
                    var theButton = document.getElementById('uname_button');
                    theButton.removeAttribute('disabled');
                    theSpan.style.color = 'green';
                    theSpan.style.visibility = 'visible';
                    theSpan.innerHTML = response;
                }else{
                    var theSpan = document.getElementById('uname_span');
                    var theButton = document.getElementById('uname_button');
                    theButton.disabled = 'true';
                    theSpan.style.color = 'red';
                    theSpan.innerHTML = 'Something went wrong';
                }
    
    
    
            };
    
            xhr.send(null);
        }else{
            var theSpan = document.getElementById('uname_span');
            theSpan.style.visibility = 'hidden';
        }
        

    }, 750);
}




var delayTimerMail;
function searchMail()
{

    clearTimeout(delayTimerMail);
    delayTimerMail = setTimeout(function() {
    
        var x = document.getElementById('mail_name');

        if(x.value != ''){
            url='/search_mail';
            var xhr = new XMLHttpRequest();
            xhr.open('GET', url+"?"+"value=" + encodeURIComponent(x.value, true), true);
    
            xhr.onload = function () {
                var response = xhr.responseText;
                if(response == 'Username already exist'){
                    var theSpan = document.getElementById('mail_span');
                    var theButton = document.getElementById('mail_button');
                    theButton.disabled = 'true';
                    theSpan.style.color = 'red';
                    theSpan.style.visibility = 'visible';
                    theSpan.innerHTML = response;
                }else if(response == 'Free to use'){
                    var theSpan = document.getElementById('mail_span');
                    var theButton = document.getElementById('mail_button');
                    theButton.removeAttribute('disabled');
                    theSpan.style.color = 'green';
                    theSpan.style.visibility = 'visible';
                    theSpan.innerHTML = response;
                }else{
                    var theSpan = document.getElementById('mail_span');
                    var theButton = document.getElementById('mail_button');
                    theButton.disabled = 'true';
                    theSpan.style.color = 'red';
                    theSpan.innerHTML = 'Something went wrong';
                }
    
    
    
            };
    
            xhr.send(null);
    
        }else{
            var theSpan = document.getElementById('mail_span');
            theSpan.style.visibility = 'hidden';
        }
        
    }, 750);
}