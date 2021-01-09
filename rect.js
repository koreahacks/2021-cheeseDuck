// by Chtiwi Malek ===> CODICODE.COM

var mousePressed = false;
var firstX, firstY;
var lastX, lastY;
var ctx;
var canvas;
var cPushArray = new Array();
var cStep = -1;

function InitThis() {
    canvas = document.getElementById('pdf_renderer');
    ctx = document.getElementById('pdf_renderer').getContext("2d");
    $('#pdf_renderer').mousedown(function (e) {
        mousePressed = true;
        firstX = e.pageX - $(this).offset().left;
        firstY = e.pageY - $(this).offset().top;
        Draw(e.pageX - $(this).offset().left, e.pageY - $(this).offset().top, false);
        ctx.save();
    });

    $('#pdf_renderer').mousemove(function (e) {
        if (mousePressed) {
          //  Draw(e.pageX - $(this).offset().left, e.pageY - $(this).offset().top, true);
        }
    });

    $('#pdf_renderer').mouseup(function (e) {
      Draw(e.pageX - $(this).offset().left, e.pageY - $(this).offset().top, true);
        if (mousePressed) {
            mousePressed = false;
            cPush();
        }
    });

    $('#pdf_renderer').mouseleave(function (e) {
        if (mousePressed) {
            mousePressed = false;
            cPush();
        }
    });
    //drawImage();
}

function drawImage() {
        cStep = -1;
        cPushArray = [];
        render();
        cPush();
}

function Draw(x, y, isDown){
  if(isDown){
    let w = Math.abs(x - firstX)
    let h = Math.abs(y - firstY)

    let left = x > firstX ? firstX : x
    let top = y > firstY ? firstY : y

    //ctx.clearRect(0,0,canvas.width,canvas.height); //clear canvas
    ctx.save();
    ctx.beginPath();
    ctx.rect(left, top, w, h);
    ctx.fillStyle = "orange";
    ctx.globalAlpha = 0.5;
    ctx.strokeStyle = "orange";
    ctx.globalAlpha = 0.5;
    ctx.stroke();
    ctx.fill();
    ctx.closePath();
    ctx.restore();
  }
}

function cPush() {
    cStep++;
    if (cStep < cPushArray.length) { cPushArray.length = cStep; }
    cPushArray.push(document.getElementById('pdf_renderer').toDataURL());
    document.title = "CheeseDuck Writing Service";
}
function cUndo() {
    if (cStep > 0) {
        cStep--;
        var canvasPic = new Image();
        canvasPic.src = cPushArray[cStep];
        canvasPic.onload = function () { ctx.drawImage(canvasPic, 0, 0); }
        document.title = "CheeseDuck Writing Service";
    }
}
function cRedo() {
    if (cStep <= cPushArray.length-1) {
        cStep++;
        var canvasPic = new Image();
        canvasPic.src = cPushArray[cStep];
        canvasPic.onload = function () { ctx.drawImage(canvasPic, 0, 0); }
        document.title = "CheeseDuck Writing Service";
    }
}

function save(){
  $.ajax
}
