// Animation Jumelle  

    let pres0  = document.getElementsByClassName ('pres0');

    document.onmousemove = function() {

        let x = event.clientX * 100 / window.innerWidth + '%';
        let y = event.clientY * 100 / window.innerHeight + '%';


        for (let i =0; i < 2; i++ ){

            pres0[i].style.left = x;
            pres0[i].style.top = y;
            pres0[i].style.transform = "translate(-" + x + ",-" + y + ")";
        }

    }