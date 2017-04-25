/*
Plugin: 3D Tag Sphere
Version: 0.1
Author: Ian George
Website: http://www.iangeorge.net
Tools: Emacs, js2-mode
Tested on: IE6, IE7, IE8, Firefox 3.6 Linux, Firefox 3.5 Windows, Chrome Linux / Windows
Requirements: Optional jquery.mousewheel for zooming

Description: 3d tag cloud, rotates with the mouse and zooms in and out. Fixed camera position to simplify calculations

Known issues:
 Breaks badly on IE5.5
 Looks a bit rough on page load

TODO:
 Performance is horrible when more than one instance is present in the page
 Would be much quicker if instead of recalculating all values on mouse move a global phi/theta value pair is stored and the values calculated on-the-fly in Draw()

Options:
  Option         default  Comments
  --------------------------------------------------
  zoom           75       Initial zoom level
  min_zoom       0        
  max_zoom       100      
  zoom_factor    2        Speed of zoom by the mouse wheel
  rotate_by      -1.75    In degrees, the amount that the sphere rotates. Negative values reverse the direction.
  fps            10       Defines the (target) number of times the animation will be updated per second
  centrex        250      Horizontal rotation centre in the container <div>
  centrey        250      Vertical rotation centre in the container <div>
  min_font_size  12
  max_font_size  32
  font_units     'px'
  random_points  50       Adds some random points on to the sphere to enhance the effect

Usage:
 Vanilla:
    $('.tags').tagcloud();

 Centreed in a 200 x 200 container:
    $('.tags').tagcloud({centrex:100,centrey:100});

 With a different update speed
    $('.selector').tagcloud({fps:24});

Markup:
 Must be an unordered list in a div with links in the list items. 
 rel="[number]" is optional but necessary for ranking by font-size.
 <div class="tags">
 <ul>
   <li><a href="#" rel="20">link 1</a></li>
   <li><a href="#" rel="20">link 2</a></li>
   <li><a href="#" rel="20">link 3</a></li>
   <li><a href="#" rel="20">link 4</a></li>
   <li><a href="#" rel="20">link 5</a></li>
 </ul>
 */

(function($){

     // jquery plugin hook
     $.fn.tagcloud = function(options){
        
         // overwrite defaults with user-specified
         var opts = $.extend($.fn.tagcloud.defaults, options);
         opts.drawing_interval = 1/(opts.fps/1000);
         
         //create a new class for every matching element
         $(this).each(function(){
                          new TagCloudClass($(this), opts);
                      });
         return this;         
     };


     //default values for setup
     $.fn.tagcloud.defaults = {
         zoom: 75,
         max_zoom: 120,
         min_zoom: 25,
         zoom_factor: 2, //multiplication factor for wheel delta
         rotate_by: -1.75, // degrees
         fps: 10, // frames per second
         centrex: 250, // set centre of display
         centrey: 250,
         min_font_size: 12, //font limits and units
         max_font_size: 32,
         font_units: 'px',
         random_points: 0         
     };

     var TagCloudClass = function(el, options){
         $(el).css('position', 'relative');
         $('ul', el).css('display', 'none');

         // general values
         var eyez = -500;

         // set rotation (in this case, 5degrees)
         var rad = Math.PI/180;
         var basecos = Math.cos(options.rotate_by*rad);
         var basesin = Math.sin(options.rotate_by*rad);

         // initial rotation
         var sin = basesin;
         var cos = basecos;
         var hex = new Array("0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f");

         // per-instance values
         var container = $(el);
         var id_stub = 'tc_' + $(this).attr('id') + "_";
         var opts = options;
         var zoom = opts.zoom;
         var depth;
         var lastx = 0;
         var lasty = 0;
	 var points = [];
         points['data'] = [];
         var drawing_interval;
         var cmx = options.centrex; 
         var cmy = options.centrey;


         function getgrey(num){
             if(num>256){num=256;}
             if(num<0){num=0;}
             var rem = num%16;
             var div = (num-rem)/16;
             var dig = hex[div] + hex[Math.floor(rem)];
             return dig+dig+dig;
         }		

         
         //drawing and rotation...				
         function rotx(){
             for(var p in points.data)
             {
	         var temp = sin * points.data[p].y + cos * points.data[p].z;
	         points.data[p].y = cos * points.data[p].y - sin * points.data[p].z;
	         points.data[p].z = temp;
             }
         }

         function roty(){
             for(var p in points.data){
	         var temp = - sin * points.data[p].x + cos * points.data[p].z;
	         points.data[p].x = cos * points.data[p].x + sin * points.data[p].z;
	         points.data[p].z = temp;				
             }
         }

         function rotz(){
             for(var p in points.data) {
	         var temp = sin * points.data[p].x + cos * points.data[p].y;
	         points.data[p].x = cos * points.data[p].x - sin * points.data[p].y;
	         points.data[p].y = temp;
             }
         }

         function zoomed(by){
             zoom += by*opts.zoom_factor;

             if (zoom>opts.max_zoom) {
	         zoom = opts.max_zoom;
             }
             if (zoom<opts.min_zoom) {
	         zoom = opts.min_zoom;
             }

             depth = -(zoom*(eyez-opts.max_zoom)/100)+eyez;
         }

         function moved(mx,my){
             if(mx>lastx){
	         sin=-basesin;
	         roty();
             }
             if(mx<lastx){
	         sin=basesin;
	         roty();			
             }
             if(my>lasty){
	         sin=basesin;
	         rotx();
             }
             if(my<lasty){
	         sin=-basesin;
	         rotx();
             }

             lastx = mx;
             lasty = my;
         }

         function draw(){
             // calculate 2D coordinates
             var normalz = depth * depth;

             var minz = 0; var maxz = 0;
             for(var r_p in points.data){
	         if(points.data[r_p].z < minz){minz = points.data[r_p].z;}
	         if(points.data[r_p].z > maxz){maxz = points.data[r_p].z;}
             }
             var diffz = minz-maxz;

             for(var s_p in points.data){ 
                 //normalise depth
	         var u = (depth - eyez)/(points.data[s_p].z - eyez);
                 // calculate normalised grey value
	         var grey = parseInt((points.data[s_p].z/diffz)*165+80);
                 var grey_hex = getgrey(grey);
                 //set new 2d positions for the data
                 $('#'+points.data[s_p].id + ' a', container).css('color','#'+grey_hex);
                 $('#'+points.data[s_p].id, container).css('z-index',grey);
                 $('#'+points.data[s_p].id, container).css('left', u * points.data[s_p].x + cmx - points.data[s_p].cwidth);
                 $('#'+points.data[s_p].id, container).css('top', u * points.data[s_p].y + cmy); 
             }			
         }

         // number of elements we're adding and placeholders for range values
         points.count = $('li a', container).length;
         points.largest = 1;
         points.smallest = 0;


         // Run through each li > a in the container and create an absolutely-positioned div in its place
         // Also need to create a data structure to keep state between calls to draw()
         // Data structure is as follows:
         // 
         // points{
         //     'count':0,                      //Total number of points
         //     'largest':0,                    //largest 'size' value
         //     'smallest':0,                   //Smallest 'size' value
         //     'data':{
         //         'id':"",                    //HTML id for element
         //         'size':0,                   //Size (from rel attribute on <a>)
         //         'theta':0.0,                //Angle on sphere (used to calculate initial cartesian position)
         //         'phi': 0.0,                 //Angle on sphere (used to calculate initial cartesian position)
         //         'x':0.0,                    //Cartesian position in 3d space
         //         'y':0.0,                    //Cartesian position in 3d space
         //         'z':0.0,                    //Cartesian position in 3d space
         //     }
         // }
         $('li a', container).each(function(idx, val){

                                       var sz = parseInt($(this).attr('rel'));
                                       if(sz == 0) 
                                           sz = 1;

                                       points.data[idx] = {
                                           id:id_stub + idx,
                                           size:sz
                                       };

                                       // plot the points on a sphere
                                       // from: http://www.math.niu.edu/~rusin/known-math/97/spherefaq
                                       // for k=1 to N do
                                       //     h = -1 + 2*(k-1)/(N-1)
                                       //     theta[k] = arccos(h)
                                       //     if k=1 or k=N then phi[k] = 0
                                       //     else phi[k] = (phi[k-1] + 3.6/sqrt(N*(1-h^2))) mod (2*pi)
                                       // endfor

                                       // In Cartesian coordinates the required point on a sphere of radius 1 is
                                       // (cos(theta)*sin(phi), sin(theta)*sin(phi), cos(phi))
                                       
                                       var h = -1 + 2*(idx)/(points.count-1);
                                       points.data[idx].theta = Math.acos(h);
                                       if(idx == 0 || idx == points.count-1){
                                           points.data[idx].phi = 0;
                                       }
                                       else{
                                           points.data[idx].phi = (points.data[idx-1].phi + 3.6/Math.sqrt(points.count*(1-Math.pow(h,2)))) % (2 * Math.PI);
                                       }

                                       points.data[idx].x = Math.cos(points.data[idx].phi) * Math.sin(points.data[idx].theta) * (cmx/2);
                                       points.data[idx].y = Math.sin(points.data[idx].phi) * Math.sin(points.data[idx].theta) * (cmy/2);
                                       points.data[idx].z = Math.cos(points.data[idx].theta) * (cmx/2);

                                       if(sz > points.largest) points.largest = sz;
                                       if(sz < points.smallest) points.smallest = sz;

                                       container.append('<div id="'+ id_stub + idx +'" class="point" style="position:absolute;"><a href=' + $(this).attr('href')  + '>' + $(this).html()  + '</a></div>');
                                   });

         //if required to do so (by opts.random_points being > 0) we need to generate some random points on the sphere
         //bit cheezy, but can make more sparse data sets look a bit more believable
         if(opts.random_points > 0){
             for(b=0; b<opts.random_points; b++){
                 points.count++;                                                  
                 points.data[points.count] = {
                     id:id_stub + points.count,
                     size:1
                 };
                 points.data[points.count].theta = Math.random() * 2 * Math.PI;
                 points.data[points.count].phi = Math.random() * 2 * Math.PI;
                 points.data[points.count].x = Math.cos(points.data[points.count].phi) * Math.sin(points.data[points.count].theta) * (cmx/2);
                 points.data[points.count].y = Math.sin(points.data[points.count].phi) * Math.sin(points.data[points.count].theta) * (cmy/2);
                 points.data[points.count].z = Math.cos(points.data[points.count].theta) * (cmx/2);
                 container.append('<div id="'+ id_stub + points.count +'" class="point" style="position:absolute;"><a>.</a></div>');
             }
         }
         
         //tag size and font size ranges 
         var sz_range = points.largest - points.smallest + 1; 
         var sz_n_range = opts.max_font_size - opts.min_font_size + 1;
         
         //set font size to normalised tag size
         for(var p in points.data){
             var sz = points.data[p].size;
             var sz_n = parseInt((sz / sz_range) * sz_n_range) + opts.min_font_size;
             if(!$('#' + points.data[p].id, container).hasClass('background')){
                 $('#' + points.data[p].id, container).css('font-size', sz_n); 
             }
             //store element width / 2 so we can centre the text around the point later.
             points.data[p].cwidth = $('#' + points.data[p].id, container).width()/2;
         }
         // bin original html
         $('ul', container).remove();

         //set up initial view
         zoomed(opts.zoom);
         moved(cmx, cmy);

         //call draw every so often
         drawing_interval = setInterval(draw, opts.drawing_interval);

         //events to change position of items
         container.mousemove(function(evt){
                                 moved(evt.clientX, evt.clientY);
                             });
         container.mousewheel(function(evt, delta){
                                  zoomed(delta);
                                  evt.preventDefault();
                                  return false;
                              });
         
     };
          
 })(jQuery);
