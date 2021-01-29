//For part of bellowed code please refer to https://codepen.io/HarryGateaux/pen/BApxl


var canvas = document.getElementById('paint');
var ctx = canvas.getContext('2d');
var sketch = document.getElementById('sketch');
var sketch_style = getComputedStyle(sketch);

canvas.width = 300;
canvas.height = 300;

var mouse = {x: 0, y: 0};

/* Mouse Capturing Work */

canvas.addEventListener('mousemove', function(e) {
    mouse.x = e.pageX - this.offsetLeft;
    mouse.y = e.pageY - this.offsetTop;
}, false);
  
/* Drawing on Paint App */

ctx.lineJoin = 'round';
ctx.lineCap = 'round';
ctx.strokeStyle = "black";

function getColor(colour){ctx.strokeStyle = colour;}
function getSize(size){ctx.lineWidth = size;}

canvas.addEventListener('mousedown', function(e) {
    ctx.beginPath();
    ctx.moveTo(mouse.x, mouse.y);
    canvas.addEventListener('mousemove', onPaint, false);
}, false);
    
canvas.addEventListener('mouseup', function() {
    canvas.removeEventListener('mousemove', onPaint, false);
}, false);
    
var onPaint = function() {
    ctx.lineTo(mouse.x, mouse.y);
    ctx.stroke();
};


function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}
    
function fillCanvasBackgroundWithColor() {
    var context = canvas.getContext('2d');
    context.save();
    context.globalCompositeOperation = 'destination-over';
    context.fillStyle = 'white';
    var dload = context.fillRect(0, 0, canvas.width, canvas.height);context.restore();
};
    
// For part of bellowed code please refer to https://stackoverflow.com/questions/13198131/how-to-save-an-html5-canvas-as-an-image-on-a-server

download_img = function(el) {
function fc() {
    fillCanvasBackgroundWithColor();
};

fc();
    var image = canvas.toDataURL("image/png");
    $.ajax({
        type: "POST",
        url: "upload.php",
        data: {
        image: image
        }
    }).done(function(o) {
    console.log('saved');
    });
    
    
    $.ajax({
        url: 'generator.php'
    });

    el.href = image;
    
loader();
};


function getData() {
    $.ajax({type: "POST",
            url: "result.php",
            success: function(data) {
                f(data);
            }
    })
}


function loadImage(url) {
  return new Promise(r => { let i = new Image(); i.onload = (() => r(i)); i.src = url; });
};

async function f(z) {
    let img = await loadImage("/genimg/" + z + ".png");
    ctx.drawImage(img, 0, 0, 410, 410);
}

function clearall()
{
    location.reload();
}


function dress_shoe() {

var background = new Image();
background.src = "dresss.jpg";

// Make sure the image is loaded first otherwise nothing will draw.
background.onload = function(){
    ctx.drawImage(background,0,0);   
}

}

function hh_shoe() {

var background = new Image();
background.src = "hheels.jpg";

// Make sure the image is loaded first otherwise nothing will draw.
background.onload = function(){
    ctx.drawImage(background,0,0);   
}

}

function go() {
$.ajax({
    url: 'bedgenerator.php'
});}


