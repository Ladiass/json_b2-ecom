function loaderPage(id,time=50){
    let body = document.querySelector("body")
    body.style.overflowY= "hidden"
    window.addEventListener("load", function () {
        let loaderC = 0
        let p = 1;
        setInterval(() => {
            let loader = document.getElementById(id);
            if (loaderC <= 4) {
                if (loader.style.opacity == 0.2) {
                    loader.style.display="none"
                    body.style.overflowY = "scroll"
                } else {
                    p -= .2
                    loader.style.opacity = p
                }
                loaderC++
            }
        }, time);
    })
}