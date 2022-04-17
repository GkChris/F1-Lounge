function changeNav(thisId){
    var id = thisId.id;
    switch(id) {
        case 'posts':
            document.getElementById('posts_div').style.display = 'flex';
            document.getElementById('posts').style.backgroundColor = '#C0C0C0';
            document.getElementById('reports_div').style.display = 'none';
            document.getElementById('reports').style.backgroundColor = 'white';
            break;
        case 'reports':
            document.getElementById('reports_div').style.display = 'flex';
            document.getElementById('reports').style.backgroundColor = '#C0C0C0';
            document.getElementById('posts_div').style.display = 'none';
            document.getElementById('posts').style.backgroundColor = 'white';
        }
}


