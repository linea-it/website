function openTab(evt, tabName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the link that opened the tab
    // document.getElementById(tabName).style.display = "block";
    var child = evt.currentTarget.parentNode.parentNode.parentNode.children;
    
    for (var i = 0; i < child.length; i++) {
        if ( child[i].getAttribute('id') == tabName) {
            child[i].style.display = "block";
        }
    }
    evt.currentTarget.className += " active";
}

function speakerSearch(evt) {
    var name = evt.currentTarget.value;

    var nomes = document.getElementsByClassName("nome");
    if ( name == "All") {
        for (i = 0; i < nomes.length; i++) {
            nomes[i].parentNode.parentNode.style.display = "block";
        }
    } else {
        for (var i = 0; i < nomes.length; i++) {
            if ( nomes[i].innerHTML == name ) {
                nomes[i].parentNode.parentNode.style.display = "block";
            } else {
                nomes[i].parentNode.parentNode.style.display = "none";
            }
        }
    }
}

function cleanSearch() {
    var spanfound = document.getElementsByClassName("strfound");
    var str, cleanstr, strfound;
    for (var i = 0; i < spanfound.length; i++) {
        str = spanfound[i].innerHTML;
        strfound = spanfound[i].parentNode.innerHTML;
        cleanstr = strfound.replace('<span class="strfound">'+str+'</span>', str);
        spanfound[i].parentNode.innerHTML = cleanstr;
    }

}


function webinarSearch(evt) {
    var input = evt.currentTarget.value;
    var child, str, strfound, n, found, lowstr, lowinput, origstr;
    console.log('INPUT :'+input);
    cleanSearch();
    lowinput = input.toLowerCase();
    var websumary = document.getElementsByClassName("webinar-sumary");
    for (var i = 0; i < websumary.length; i++) {
        child = websumary[i].getElementsByTagName("*");
        found = false;
        for (var c = 0; c < child.length; c++) {
            if ( child[c].className == "nome" || child[c].className == "titulo" || 
                child[c].className == "instituicao" || child[c].className == "resumo" ) {
                str = child[c].innerHTML;
                lowstr = str.toLowerCase();
                n = lowstr.search(lowinput);
                if ( n >= 0 ) {
                    origstr = str.substring(n, n + input.length);
                    strfound = str.replace(origstr, '<span class="strfound">'+origstr+'</span>');
                    child[c].innerHTML = strfound;
                    found = true;
                    if ( child[c].className == "resumo" ) {
                        child[c].parentNode.style.display = "block";
                    }
                }
            }
        }
        if ( found == true ) {
            websumary[i].style.display = "block";
        } else {
            websumary[i].style.display = "none";
        }
    }
}