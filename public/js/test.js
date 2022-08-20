function test(){
    alert('succesful');
}



function req(){


    var x = document.getElementById('race').innerHTML;
    var y = document.getElementById('comment').innerHTML;
    var z = document.getElementById('url').innerHTML;



    
    url='/testDB';
    var xhr = new XMLHttpRequest();
    xhr.open("post", url, true);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.onreadystatechange = function() { // Call a function when the state changes.
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            alert('success');
        }
    }

    xhr.send("race="+x+"&comment="+y+"&url="+z+"");

}