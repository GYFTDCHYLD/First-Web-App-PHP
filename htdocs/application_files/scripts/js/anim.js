(function() {
  document.addEventListener('DOMContentLoaded', function() {
    var demos, logo, methods;
    if (!OriDomi.isSupported) {
      document.getElementById('unsupported').style.display = 'block';
      return;
    }
    logo = new OriDomi('.logo', {
      shading: false,
      speed: 1000
    });
    logo.stairs(17);
    demos = [
      new OriDomi('.prez', {
        vPanels: 20,
        ripple: true
      }), new OriDomi('.prez2', {
        vPanels: 20,
        ripple: true
		}), new OriDomi('.prez3', {
        maxAngle: 70,
        ripple: true
      }), new OriDomi('.demo4',{
        vPanels: [1, 1, 2, 3, 5, 8, 13, 21, 34].map(function(n) {
          return n * 1.1363636363636365;
        }).reverse()
      })
    ];
    setTimeout(function() {
	
      demos[0].curl(90, 'left');
	  demos[1].curl(90, 'right');
      demos[2].stairs(-60, 'left');
      
      demos[3].stairs(18, 'right');
      demos[4].reveal(30, 'top');
      demos[5].stairs(20, 'bottom');
      return demos[6].reveal(45, 'left');
    }, 500);
    methods = ['accordion', 'stairs', 'curl', 'reveal', 'ramp'];
    return document.getElementById('demos').addEventListener('click', function(e) {
      var angle, el, method, n;
      if ((el = e.target).className !== 'button') {
        return;
      }
      n = el.getAttribute('data-n');
      method = methods[Math.abs(Math.floor(Math.random() * methods.length - Math.random()))];
      angle = Math.floor(Math.random() * 300 * (Math.random() > .5 ? -1 : 1));
      demos[n][method](method !== 'foldUp' ? angle : void 0);
      if (method === 'foldUp') {
        angle = '';
      }
      return el.parentNode.getElementsByClassName('label')[0].innerHTML = "" + method + "(" + angle + ")";
    }, false);
  });

}).call(this);

//# sourceMappingURL=demo.map
