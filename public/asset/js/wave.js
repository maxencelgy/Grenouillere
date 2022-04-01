(function () {
    var unit = 100, canvas, context, canvas2, context2, height, width, xAxis, yAxis, draw;
  
    function init() {
      canvas = document.getElementById('canvas');
      canvas.width = document.documentElement.clientWidth;
      canvas.height = 1625;
      context = canvas.getContext('2d');
      height = canvas.height;
      width = canvas.width;
      xAxis = Math.floor(height/2);
      yAxis = 0;
      draw();
    }

    function draw() {
      context.clearRect(0, 0, width, height);
      //波の色の指定
      drawWave('#E7F7F3', 0.3, 3.5, 0);
      drawWave('#E7F7F3', 0.4, 2.5, 250);
      drawWave('#E7F7F3', 0.5, 2, 100);
  
      draw.seconds = draw.seconds + .005;
      draw.t = draw.seconds * Math.PI;
      setTimeout(draw, 35);
    };
    draw.seconds = 0;
    draw.t = 0;
  
    function drawWave(color, alpha, zoom, delay) {
      context.fillStyle = color;
      context.globalAlpha = alpha;
      context.beginPath();
      drawSine(draw.t / 0.5, zoom, delay);
      context.lineTo(width + 20, height);
      context.lineTo(0, height);
      context.closePath()
      context.fill();
    }
    function drawSine(t, zoom, delay) {
      var x = t;
      var y = Math.sin(x) / zoom;
      context.moveTo(yAxis, unit * y + xAxis);
      for (i = yAxis; i <= width + 10; i += 10) {
        x = t + (-yAxis + i) / unit / zoom;
        y = Math.sin(x - delay) / 2;
        context.lineTo(i, unit * y + xAxis);
      }
    }
    init();
  })();