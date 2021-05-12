(function () {
    const sec = document.querySelector(".second-hand");
    const min = document.querySelector(".min-hand");
    const hour = document.querySelector(".hour-hand");

    function timeHandler() {
        setClock()
        setTimeout(timeHandler, 1000);
    }

    function animeHandler() {
        setClock()
        window.requestAnimationFrame(animeHandler, 1000)

    }



    function setClock() {
        let currentTime = new Date();

        let secDeg = currentTime.getSeconds() * 6;
        let minDeg = currentTime.getMinutes() * 6 + currentTime.getSeconds() * 6 / 60;
        let hourDeg = currentTime.getHours() * 30 + currentTime.getMinutes() * 30 / 60;

        sec.style.transform = `rotate(${secDeg}deg)`;
        min.style.transform = `rotate(${minDeg}deg)`;
        hour.style.transform = `rotate(${hourDeg}deg)`;

    }

    // setInterval(setClock,1000);
    // setTimeout(timeHandler,1000);
    window.requestAnimationFrame(animeHandler, 1000)

    // DOM
    const list = document.querySelector(".list");
    const saveBtn = document.querySelector(".save");
    const txtInput = document.querySelector(".txt");


})()