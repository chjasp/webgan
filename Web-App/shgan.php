<html>
<head>
<title>Schuh-GAN</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    // Variables for referencing the canvas and 2dcanvas context
    //For part of bellowed code please refer to https://stackoverflow.com/questions/56761017/why-is-my-javascript-not-working-even-though-it-is-copied-directly-from-working
    var canvas,ctx;

    // Variables to keep track of the mouse position and left-button status 
    var mouseX,mouseY,mouseDown=0;

    // Variables to keep track of the touch position
    var touchX,touchY;

    // Keep track of the old/last position when drawing a line
    // We set it to -1 at the start to indicate that we don't have a good value for it yet
    var lastX,lastY=-1;


    function getColor(colour){ctx.strokeStyle = colour;}
    // Draws a line between the specified position on the supplied canvas name
    // Parameters are: A canvas context, the x position, the y position, the size of the dot
    function drawLine(ctx,x,y,size) {

        // If lastX is not set, set lastX and lastY to the current position 
        if (lastX==-1) {
            lastX=x;
	    lastY=y;
        }

        // Let's use black by setting RGB values to 0, and 255 alpha (completely opaque)
        r=0; g=0; b=0; a=255;

        // Select a fill style
        

        // Set the line "cap" style to round, so lines at different angles can join into each other
        ctx.lineCap = "round";
        //ctx.lineJoin = "round";


        // Draw a filled line
        ctx.beginPath();

	// First, move to the old (previous) position
	ctx.moveTo(lastX,lastY);

	// Now draw a line to the current touch/pointer position
	ctx.lineTo(x,y);

        // Set the line thickness and draw the line
        ctx.lineWidth = size;
        ctx.stroke();

        ctx.closePath();

	// Update the last position to reference the current position
	lastX=x;
	lastY=y;
    } 


    // Keep track of the mouse button being pressed and draw a dot at current location
    function sketchpad_mouseDown() {
        mouseDown=1;
        drawLine(ctx,mouseX,mouseY,2);
    }

    // Keep track of the mouse button being released
    function sketchpad_mouseUp() {
        mouseDown=0;

        // Reset lastX and lastY to -1 to indicate that they are now invalid, since we have lifted the "pen"
        lastX=-1;
        lastY=-1;
    }

    // Keep track of the mouse position and draw a dot if mouse button is currently pressed
    function sketchpad_mouseMove(e) { 
        // Update the mouse co-ordinates when moved
        getMousePos(e);

        // Draw a dot if the mouse button is currently being pressed
        if (mouseDown==1) {
            drawLine(ctx,mouseX,mouseY,2);
        }
    }

    // Get the current mouse position relative to the top-left of the canvas
    function getMousePos(e) {
        if (!e)
            var e = event;

        if (e.offsetX) {
            mouseX = e.offsetX;
            mouseY = e.offsetY;
        }
        else if (e.layerX) {
            mouseX = e.layerX;
            mouseY = e.layerY;
        }
     }

    // Draw something when a touch start is detected
    function sketchpad_touchStart() {
        // Update the touch co-ordinates
        getTouchPos();

        drawLine(ctx,touchX,touchY,2);

        // Prevents an additional mousedown event being triggered
        event.preventDefault();
    }

    function sketchpad_touchEnd() {
        // Reset lastX and lastY to -1 to indicate that they are now invalid, since we have lifted the "pen"
        lastX=-1;
        lastY=-1;
    }

    // Draw something and prevent the default scrolling when touch movement is detected
    function sketchpad_touchMove(e) { 
        // Update the touch co-ordinates
        getTouchPos(e);

        // During a touchmove event, unlike a mousemove event, we don't need to check if the touch is engaged, since there will always be contact with the screen by definition.
        drawLine(ctx,touchX,touchY,2); 

        // Prevent a scrolling action as a result of this touchmove triggering.
        event.preventDefault();
    }

    // Get the touch position relative to the top-left of the canvas
    // When we get the raw values of pageX and pageY below, they take into account the scrolling on the page
    // but not the position relative to our target div. We'll adjust them using "target.offsetLeft" and
    // "target.offsetTop" to get the correct values in relation to the top left of the canvas.
    function getTouchPos(e) {
        if (!e)
            var e = event;

        if(e.touches) {
            if (e.touches.length == 1) { // Only deal with one finger
                var touch = e.touches[0]; // Get the information for finger #1
                touchX=touch.pageX-touch.target.offsetLeft;
                touchY=touch.pageY-touch.target.offsetTop;
            }
        }
    }


    // Set-up the canvas and add our event handlers after the page has loaded
    function init() {
        // Get the specific canvas element from the HTML document
        canvas = document.getElementById('sketchpad');

        // If the browser supports the canvas tag, get the 2d drawing context for this canvas
        if (canvas.getContext)
            ctx = canvas.getContext('2d');

        // Check that we have a valid context to draw on/with before adding event handlers
        if (ctx) {
            // React to mouse events on the canvas, and mouseup on the entire document
            canvas.addEventListener('mousedown', sketchpad_mouseDown, false);
            canvas.addEventListener('mousemove', sketchpad_mouseMove, false);
            window.addEventListener('mouseup', sketchpad_mouseUp, false);

            // React to touch events on the canvas
            canvas.addEventListener('touchstart', sketchpad_touchStart, false);
            canvas.addEventListener('touchend', sketchpad_touchEnd, false);
            canvas.addEventListener('touchmove', sketchpad_touchMove, false);
        }
    }
</script>

</head>
<div class="row">
<body onload="init()">
    
    <div id="left" class="block">
        <div>
            <div id="Vorlage"class="text" >
                GAN-Auswahl:</br></br>
            </div>
        <button id="button1" class = "button" onclick="window.location.href='ugan.php'">DCGAN</button></br></br>
        <!---<button id="button3" class = "button" onclick="window.location.href='srgan.php'">Schlafz.</button></br></br>--->
        <button id="button2" class = "button" onclick="window.location.href='shgan.php'">cGAN</button></br></br>
        </div>    
    </div>
    
    <div id ="center" class="block">
        <canvas id="sketchpad" width="410" height="410">
        </canvas>
        <div id ="load" class=""></div>
    </div>

    <div id="right" class="block">
        <div id="Vorlage" class="text" >
            Werkzeuge:</br></br>
        </div>
        <button id="button1" class = "button" onclick="getColor('black');">Zeichnen</button>
        <button id="button2" class = "button" onclick="getColor('white');">Radieren</button>
        <div id="Vorlage" class="text">
            </br>Vorlagen:</br></br>
        </div>
        <div>
            <button id="button10" class="button" type="button" onClick="dress_shoe()">Anzugs.</button>
            <button id="button11" class="button" type="button" onClick="hh_shoe()">Highh.</button>
        </div>

        <div>
            <div id="Vorlage" class="text">
                </br>Grundlegende Funktionen:</br></br>
            </div>
            <button id="button7" class = "button" type="button" onClick="download_img(this); change();">Generator</button>
            <button id="button14" class = "button" type="button" onClick="clearall()">Neu</button>
            </br></br>
            <button id="button8" type="button" onClick="getData()">Zeigen</button>
        </div>
    </div>
</div>
<script type="text/javascript" src="db2.js"></script> 
</body>
</html>