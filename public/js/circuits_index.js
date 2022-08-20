function closeSearch(){
    document.getElementById('result_box').style.height = '1px';
    document.getElementById('result_box').style.transitionDelay = '0.3s';
    document.getElementById('result_box').style.visibility = 'hidden';
    document.getElementById('result_box').innerHTML = ' ';
}

var delayTimer;
function openSearch()
{

    clearTimeout(delayTimer);
    delayTimer = setTimeout(function() {
        document.getElementById('result_box').style.height = '75px';
        document.getElementById('result_box').style.transitionDelay = '0.3s';
        document.getElementById('result_box').style.visibility = 'visible';
        document.getElementById('result_box').innerHTML = ' ';
        var x = document.getElementById('search');
    
        
        url='/circuit_search';
        var xhr = new XMLHttpRequest();
        xhr.open('GET', url+"?"+"value=" + encodeURIComponent(x.value, true), true);
    
        xhr.onload = function () {
            const json = JSON.parse(xhr.responseText);
         
    
            for (let i = 0; i < json.length; i++) {
                document.getElementById('result_box').innerHTML += '<a href="/circuits/'+json[i].circuitRef+'"><strong>'+json[i].name+'</strong> ('+json[i].location+' / '+json[i].country+')</a></br>';
            }
    
        };
    
        xhr.send(null);

    }, 750);

    
}