// by Chtiwi Malek ===> CODICODE.COM

var mousePressed = false;
var firstX, firstY;
var lastX, lastY;
var ctx;
var canvas;
var cPushArray = new Array();
var cStep = -1;
var mode = false; // 형광펜
var mode2 = false; // 별
var mode3 = false; // 실선

function InitThis() {
    canvas = document.getElementById('pdf_renderer');
    ctx = document.getElementById('pdf_renderer').getContext("2d");
    $('#pdf_renderer').mousedown(function (e) {
      firstX = e.pageX - $(this).offset().left;
      firstY = e.pageY - $(this).offset().top;

      if(mode){
        mousePressed = true;
        Draw(e.pageX - $(this).offset().left, e.pageY - $(this).offset().top, false);
        ctx.save();
      }
      else if(mode2){
        var img = new Image();
        img.src = "star.png";

        var w = 30;

        img.onload = function(){
          ctx.drawImage(img, firstX-w/2, firstY-w/2, w, w);
        }
        cPush();
      }
      else if(mode3){
        mousePressed = true;
        lDraw(e.pageX - $(this).offset().left, e.pageY - $(this).offset().top, false);
      }
    });

    $('#pdf_renderer').mousemove(function (e) {
      if(mode3){
        if (mousePressed) {
            lDraw(e.pageX - $(this).offset().left, e.pageY - $(this).offset().top, true);
        }
      }
    });

    $('#pdf_renderer').mouseup(function (e) {
      if(mode){
        Draw(e.pageX - $(this).offset().left, e.pageY - $(this).offset().top, true);
      }
      if (mousePressed) {
          mousePressed = false;
          cPush();
      }
    });

    $('#pdf_renderer').mouseleave(function (e) {
      if(mode || mode3){
        if (mousePressed) {
            mousePressed = false;
            cPush();
        }
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

function mode_1(){
  if(cStep == -1){
    cPush();
  }
  mode = true;
  mode2 = false;
  mode3 = false;
}

function mode_2(){
  if(cStep == -1){
    cPush();
  }
  mode = false;
  mode2 = true;
  mode3 = false;
}

function mode_3(){
  if(cStep == -1){
    cPush();
  }
  mode = false;
  mode2 = false;
  mode3 = true;
}

function off(){
  mode = false;
  mode2 = false;
  mode3 = false;
  cStep = -1;
  cPushArray = [];
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

function lDraw(x, y, isDown) {
    if (isDown) {
        ctx.beginPath();
        ctx.strokeStyle = $('#selColor').val();
        ctx.lineWidth = $('#selWidth').val();
        ctx.lineJoin = "round";
        ctx.moveTo(lastX, lastY);
        ctx.lineTo(x, y);
        ctx.closePath();
        ctx.stroke();
    }
    lastX = x;
    lastY = y;
}

function cPush() {
    cStep++;
    if (cStep < cPushArray.length) { cPushArray.length = cStep; }
    cPushArray.push(document.getElementById('pdf_renderer').toDataURL());
    console.log(cPushArray);
    document.title = cStep + ":" + cPushArray.length;
}
function cUndo() {
    if (cStep > 0) {
        cStep--;
        var canvasPic = new Image();
        canvasPic.src = cPushArray[cStep];
        canvasPic.onload = function () { ctx.drawImage(canvasPic, 0, 0); }
        document.title = cStep + ":" + cPushArray.length;
    }
}
function cRedo() {
    if (cStep <= cPushArray.length-1) {
        cStep++;
        var canvasPic = new Image();
        canvasPic.src = cPushArray[cStep];
        canvasPic.onload = function () { ctx.drawImage(canvasPic, 0, 0); }
        document.title = cStep + ":" + cPushArray.length;
    }
}
