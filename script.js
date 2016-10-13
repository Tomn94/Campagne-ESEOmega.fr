function nuage(num) {
  document.getElementById('nuage'+num).style.webkitFilter = 'brightness(2.7)';
  document.getElementById('nuage'+num).style['-ms-filter'] = 'brightness(2.7)';
  document.getElementById('nuage'+num).style['filter'] = 'brightness(2.7)';
}
function denuage(num) {
  document.getElementById('nuage'+num).style.webkitFilter  = '';
  document.getElementById('nuage'+num).style['-ms-filter'] = '';
  document.getElementById('nuage'+num).style['filter'] = '';
}
function appMenu(op) {
  document.getElementById('popapp').style.opacity = op;
  document.getElementById('linkg').style.webkitFilter  = 'saturate('+ op + ')';
  document.getElementById('linkg').style['-ms-filter'] = 'saturate('+ op + ')';
  document.getElementById('linkg').style['filter'] = 'saturate('+ op + ')';
}

window.addEventListener("orientationchange", function() {
    document.getElementById('liNuage1').style;
    document.getElementById('liNuage1').removeAttribute('style');
    document.getElementById('liNuage4').removeAttribute('style');
    document.getElementById('liNuage4').removeAttribute('style');
}, false);
function snapchat() {
  alert('Ajoutez-nous sur Snapchat et suivez les animations !\n\n@eseomega');
}
function findPos(obj2) {
    var obj = document.getElementById(obj2);
    var curtop = 0;
    if (obj.offsetParent) {
        do {
            curtop += obj.offsetTop;
        } while (obj = obj.offsetParent);
    return [curtop];
    }
}
var smooth_scroll_to = function(element, target, duration) {
    target = Math.round(target);
    duration = Math.round(duration);
    if (duration < 0) {
        return Promise.reject("bad duration");
    }
    if (duration === 0) {
        element.scrollTop = target;
        return Promise.resolve();
    }

    var start_time = Date.now();
    var end_time = start_time + duration;

    var start_top = element.scrollTop;
    var distance = target - start_top;

    // based on http://en.wikipedia.org/wiki/Smoothstep
    var smooth_step = function(start, end, point) {
        if(point <= start) { return 0; }
        if(point >= end) { return 1; }
        var x = (point - start) / (end - start); // interpolation
        return x*x*(3 - 2*x);
    }

    return new Promise(function(resolve, reject) {
        // This is to keep track of where the element's scrollTop is
        // supposed to be, based on what we're doing
        var previous_top = element.scrollTop;

        // This is like a think function from a game loop
        var scroll_frame = function() {
            if(element.scrollTop != previous_top) {
                reject("interrupted");
                return;
            }

            // set the scrollTop for this frame
            var now = Date.now();
            var point = smooth_step(start_time, end_time, now);
            var frameTop = Math.round(start_top + (distance * point));
            element.scrollTop = frameTop;

            // check if we're done!
            if(now >= end_time) {
                resolve();
                return;
            }

            // If we were supposed to scroll but didn't, then we
            // probably hit the limit, so consider it done; not
            // interrupted.
            if(element.scrollTop === previous_top
                && element.scrollTop !== frameTop) {
                resolve();
                return;
            }
            previous_top = element.scrollTop;

            // schedule next frame for execution
            setTimeout(scroll_frame, 0);
        }

        // boostrap the animation process
        setTimeout(scroll_frame, 0);
    });
}

var ylogo, xnuage1, ynuage1, xnuage3, ynuage3, trDur;
function lancerAnim() {
  document.getElementById('logo').style.transitionProperty = 'none';
  document.getElementById('nuage1').style.transitionProperty = 'none';
  document.getElementById('liNuage1').style.transitionProperty = 'none';
  document.getElementById('nuage2').style.transitionProperty = 'none';
  document.getElementById('liNuage2').style.transitionProperty = 'none';
  document.getElementById('nuage3').style.transitionProperty = 'none';
  document.getElementById('liNuage3').style.transitionProperty = 'none';
  document.getElementById('nuage4').style.transitionProperty = 'none';
  document.getElementById('liNuage4').style.transitionProperty = 'none';
  document.getElementsByTagName('header')[0].style.transitionProperty = 'none';
  document.getElementsByTagName('footer')[0].style.transitionProperty = 'none';
  document.getElementsByTagName('article')[0].style.transitionProperty = 'none';
  document.getElementById('linkg').style.transitionProperty = 'none';
  document.getElementById('linkd').style.transitionProperty = 'none';
  document.getElementsByClassName('hautg')[0].style.transitionProperty = 'none';
  document.getElementsByClassName('hautd')[0].style.transitionProperty = 'none';
  document.getElementsByClassName('basg')[0].style.transitionProperty = 'none';
  document.getElementsByClassName('basd')[0].style.transitionProperty = 'none';
  
  ylogo   = document.getElementById('logo').style['top'];
  xnuage1 = document.getElementById('nuage1').style['left'];
  ynuage1 = document.getElementById('nuage1').style['top'];
  xnuage3 = document.getElementById('nuage4').style['left'];
  ynuage3 = document.getElementById('nuage4').style['top'];
  trDur   = document.getElementById('nuage1').style.transitionDuration;
  
  document.getElementsByTagName('li')[1].style['opacity'] = '0';
  document.getElementsByTagName('li')[3].style['opacity'] = '0';
  document.getElementsByTagName('li')[0].getElementsByTagName('p')[0].style['opacity'] = '0';
  document.getElementsByTagName('li')[4].getElementsByTagName('p')[0].style['opacity'] = '0';
  document.getElementsByTagName('article')[0].style['opacity'] = '0';
  document.getElementsByTagName('footer')[0].style['opacity']  = '0';
  document.getElementsByClassName('hautg')[0].style['opacity'] = '0';
  document.getElementsByClassName('hautd')[0].style['opacity'] = '0';
  document.getElementById('linkg').style['opacity'] = '0';
  document.getElementById('linkd').style['opacity'] = '0';
  document.getElementsByClassName('basg')[0].style['opacity']  = '0';
  document.getElementsByClassName('basd')[0].style['opacity']  = '0';
  
  document.getElementsByTagName('header')[0].style['overflow'] = 'visible';
  
  document.getElementById('logo').style['top']       = '-300px';
  document.getElementById('nuage1').style['left']    = '-200px';
  document.getElementById('nuage1').style['opacity'] = '0';
  document.getElementById('nuage4').style['left']    = '200px';
  document.getElementById('nuage4').style['opacity'] = '0';
  
  setTimeout(function(){
    if (navigator.userAgent.indexOf('Firefox') > -1)
      document.documentElement.scrollTop = 0;
    else
      document.body.scrollTop = 0;
    document.getElementById('logo').style.transitionProperty = 'all';
    document.getElementById('nuage1').style.transitionProperty = 'all';
    document.getElementById('liNuage1').style.transitionProperty = 'all';
    document.getElementById('nuage2').style.transitionProperty = 'all';
    document.getElementById('liNuage2').style.transitionProperty = 'all';
    document.getElementById('nuage3').style.transitionProperty = 'all';
    document.getElementById('liNuage3').style.transitionProperty = 'all';
    document.getElementById('nuage4').style.transitionProperty = 'all';
    document.getElementById('liNuage4').style.transitionProperty = 'all';
    document.getElementsByTagName('header')[0].style.transitionProperty = 'all';
    document.getElementsByTagName('footer')[0].style.transitionProperty = 'all';
    document.getElementsByTagName('article')[0].style.transitionProperty = 'all';
    document.getElementById('linkg').style.transitionProperty = 'all';
    document.getElementById('linkd').style.transitionProperty = 'all';
    document.getElementsByClassName('hautg')[0].style.transitionProperty = 'all';
    document.getElementsByClassName('hautd')[0].style.transitionProperty = 'all';
    document.getElementsByClassName('basg')[0].style.transitionProperty = 'all';
    document.getElementsByClassName('basd')[0].style.transitionProperty = 'all';
    if (window.innerWidth > 1100) {
      document.getElementById('nuage1').style['top'] = '183px';
      document.getElementById('nuage4').style['top'] = '240px';
    }
    else {
      document.getElementById('nuage1').style['top'] = '252px';
      document.getElementById('nuage4').style['top'] = '215px';
    }
    
    anim();
  }, 100);
}
function anim() {
  setTimeout(function(){
    document.getElementById('logo').style['top']      = '200px';
    if (window.innerWidth > 1100) {
      document.getElementById('nuage1').style['left'] = '230px';
      document.getElementById('nuage4').style['left'] = '-310px';
    }
    else {
      document.getElementById('nuage1').style['left'] = '0px';
      document.getElementById('nuage4').style['left'] = '-130px';
    }
    document.getElementById('nuage1').style['opacity'] = '1';
    document.getElementById('nuage4').style['opacity'] = '1';
    
    anim2();
  }, 1000);
}
function anim2() {
  setTimeout(function(){
    document.getElementById('logo').style.transitionDuration   = '2.4s';
    document.getElementById('nuage1').style.transitionDuration = '2.4s';
    document.getElementById('nuage4').style.transitionDuration = '2.4s';
    document.getElementById('logo').style['top']      = '210px';
    if (window.innerWidth > 1100) {
      document.getElementById('nuage1').style['left'] = '250px';
      document.getElementById('nuage4').style['left'] = '-330px';
    }
    else {
      document.getElementById('nuage1').style['left'] = '20px';
      document.getElementById('nuage4').style['left'] = '-150px';
    }
    
    animFin();
  }, 500);
}
function animFin() {
  setTimeout(function(){
    document.getElementById('logo').style.transitionDuration   = trDur;
    document.getElementById('nuage1').style.transitionDuration = trDur;
    document.getElementById('nuage4').style.transitionDuration = trDur;
    document.getElementById('logo').style['top']    = ylogo;
    document.getElementById('nuage1').style['top']  = xnuage1;
    document.getElementById('nuage1').style['left'] = ynuage1;
    document.getElementById('nuage4').style['top']  = xnuage3;
    document.getElementById('nuage4').style['left'] = ynuage3;
    
    document.getElementsByTagName('li')[1].style['opacity'] = '1';
    document.getElementsByTagName('li')[3].style['opacity'] = '1';
    document.getElementsByTagName('li')[0].getElementsByTagName('p')[0].style['opacity'] = '1';
    document.getElementsByTagName('li')[4].getElementsByTagName('p')[0].style['opacity'] = '1';
  }, 2000);
  setTimeout(function(){
    document.getElementsByTagName('header')[0].style['overflow'] = 'hidden';
    
    document.getElementsByTagName('article')[0].style['opacity'] = '1';
    document.getElementsByClassName('hautg')[0].style['opacity'] = '1';
    document.getElementsByClassName('hautd')[0].style['opacity'] = '1';
    document.getElementById('linkg').style['opacity'] = '1';
    document.getElementById('linkd').style['opacity'] = '1';
    document.getElementsByTagName('footer')[0].style['opacity']  = '1';
    document.getElementsByClassName('basg')[0].style['opacity']  = '1';
    document.getElementsByClassName('basd')[0].style['opacity']  = '1';
    
    document.getElementById('logo').removeAttribute('top');
    document.getElementById('nuage1').removeAttribute('top');
    document.getElementById('nuage1').removeAttribute('left');
    document.getElementById('nuage4').removeAttribute('top');
    document.getElementById('nuage4').removeAttribute('left');
  }, 2800);
}