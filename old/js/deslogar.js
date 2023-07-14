const inactivityTime = function() {
    let time;
    // reset timer
    window.onload = resetTimer;
    document.onmousemove = resetTimer;
    document.onkeydown = resetTimer;

    function doSomething() {
        // do something when user is inactive
    }

    function resetTimer() {
        clearTimeout(time);
        time = setTimeout(doSomething, 5000)
    }
};