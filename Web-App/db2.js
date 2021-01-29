// For part of bellowed code please refer to https://codepen.io/HarryGateaux/pen/BApxl

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

        var d = document.getElementById("load");
        d.className += "loader";

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

// Make sure the image is loaded first otherwise nothing will draw
background.onload = function(){
    ctx.drawImage(background,0,0);   
}

}

function hh_shoe() {

var background = new Image();
background.src = "hheels.jpg";

// Make sure the image is loaded first otherwise nothing will draw
background.onload = function(){
    ctx.drawImage(background,0,0);   
}

}

function go() {
$.ajax({
    url: 'bedgenerator.php'
});}

function go2() {
$.ajax({
    url: 'watchgenerator.php'
});}


function loader() {
        var o = document.getElementById("load");
        o.className += "loader";  
}

async function change() {
        await sleep(17000)
        var p = document.getElementById("button8");
        p.className += "button";
        var q = document.getElementById("load");
        q.className += "x"; 
}

async function changebed() {
        loader();
        await sleep(20000)
        var e = document.getElementById("button8");
        e.className += "button";
        var f = document.getElementById("load");
        f.className += "x";
}

function reloadbed() {
        var z = document.getElementById("button14");
        z.className += "button";
}

