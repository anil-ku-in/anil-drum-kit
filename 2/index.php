<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>JS + CSS Clock</title>
</head>
<body>


<div class="clock">
    <div class="clock-face">
        <div class="hand hour-hand"></div>
        <div class="hand min-hand"></div>
        <div class="hand second-hand"></div>
    </div>
</div>


<style>
    html {
        background:#018DED url(http://unsplash.it/1500/1000?image=881&blur=50);
        background-size:cover;
        font-family:'helvetica neue';
        text-align: center;
        font-size: 10px;
    }

    body {
        margin: 0;
        font-size: 2rem;
        display:flex;
        flex:1;
        min-height: 100vh;
        align-items: center;
    }

    .clock {
        width: 30rem;
        height: 30rem;
        border:20px solid white;
        border-radius:50%;
        margin:50px auto;
        position: relative;
        padding:2rem;
        box-shadow:
            0 0 0 4px rgba(0,0,0,0.1),
            inset 0 0 0 3px #EFEFEF,
            inset 0 0 10px black,
            0 0 10px rgba(0,0,0,0.2);
    }

    .clock-face {
        position: relative;
        width: 100%;
        height: 100%;
        transform: translateY(-3px); /* account for the height of the clock hands */
    }

    .hand {
        width:50%;
        background:black;
        position: absolute;
        top:50%;
        transform: rotate(90deg);
        transform-origin: 99%;
        transition: all 0.5s;
        transition-timing-function: cubic-bezier(0.1, 2.7, 0.58, 1);
    }
    .second-hand{
        height: 3px;
    }
    .min-hand{
        height:6px;
    }
    .hour-hand{
        height: 9px;
    }

</style>

<script>
    const secondHand = document.querySelector('.second-hand');
    const minHand = document.querySelector('.min-hand');
    const hourHand = document.querySelector('.hour-hand');

    function setDate() {
        const now = new Date();
        const seconds = now.getSeconds();
        const  secondsDegrees = ((seconds / 60)*360) + 90;
        secondHand.style.transform = `rotate(${secondsDegrees}deg)`;
        console.log(seconds);

        const min = now.getMinutes();
        const minsDegerees = ((min / 60)*360) + 90;
        minHand.style.transform = `rotate(${minsDegerees}deg)`;

        const hour = now.getHours();
        const hoursDegerees = ((hour / 12)*360) + 90;
        hourHand.style.transform = `rotate(${hoursDegerees}deg)`;
    }
    setInterval(setDate, 1000);

</script>
</body>
</html>
