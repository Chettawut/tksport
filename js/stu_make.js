function show() {
    let show = document.getElementById("dropdown");

    if (show.classList.contains("dropdown-show")) {
        show.classList.replace("dropdown-show","dropdown-hidden") 
    }
    else if (show.classList.contains("dropdown-hidden")) {
        show.classList.replace("dropdown-hidden","dropdown-show") 
    }
    
}