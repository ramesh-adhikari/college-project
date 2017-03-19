<!DOCTYPE html>
<html idmmzcc-ext-docid="1249609728" lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title>banshwali</title>
      <style>
         .tree * {margin: 0; padding: 0;}
         .tree{
         white-space:nowrap;
         }
         .tree ul
         {
         padding-top: 5px; position: relative;
         display: table;
         margin: 0 auto;
         font-size:0;
         transition: all 0.5s;
         -webkit-transition: all 0.5s;
         -moz-transition: all 0.5s;
         }
         .tree li
         {
         display:inline-block;
         text-align: center;
         list-style-type: none;
         position: relative;
         padding: 20px 5px 0 5px;
         font-size: 12px;
         line-height: normal;
         transition: all 0.5s;
         -webkit-transition: all 0.5s;
         -moz-transition: all 0.5s;
         }
         /*We will use ::before and ::after to draw the connectors*/
         .tree li::before, .tree li::after{
         content: '';
         position: absolute; top: 0; right: 50%;
         border-top: 1px solid #2980B9;
         width: 50%; height: 20px;
         }
         .tree li::after{
         right: auto; left: 50%;
         border-left: 1px solid #2980B9;
         }
         /*We need to remove left-right connectors from elements without 
         any siblings*/
         .tree li:only-child::after {
         display: none;
         }
         /*Remove space from the top of single children*/
         //.tree li:only-child{ padding-top: 0;}
         /*Remove left connector from first child and 
         right connector from last child*/
         .tree li:first-child::before, .tree li:last-child::after{
         border: 0 none;
         }
         /*Adding back the vertical connector to the last nodes*/
         .tree li li:last-child::before{
         border-right: 1px solid #2980B9;
         border-radius: 0 5px 0 0;
         -webkit-border-radius: 0 5px 0 0;
         -moz-border-radius: 0 5px 0 0;
         }
         .tree li:first-child::after{
         border-radius: 5px 0 0 0;
         -webkit-border-radius: 5px 0 0 0;
         -moz-border-radius: 5px 0 0 0;
         }
         .tree li li:only-child::before
         {
         right: auto; left: 50%;
         border-left: 1px solid #2980B9;
         border-right:none;
         }
         .tree ul.p>li::before
         {
         border:none;
         content: '&';
         left:0;
         width:100%;	
         display:block;
         }
         .tree ul.p>li::after
         {
         content: '';
         position: absolute; top: 0; right: 50%;
         border-top: none;
         width: 50%; height: 20px;
         }
         .tree ul.p>li::after
         {
         border-left: none;
         }
         .p1
         {
         display:table;
         margin:0px auto;
         }
         .p1::before
         {
         border:none;
         content: '&';
         left:0;
         width:100%;	
         display:block;
         margin:5px 0px;
         }
         /*Time to add downward connectors from parents*/
         .tree ul.c {
         padding-top: 20px; 
         }
         .tree ul ul.c::before{
         content: '';
         position: absolute; top: 0; left: 50%;
         border-left: 1px solid #2980B9;
         width: 0; height: 20px;
         }
         .tree li a{
         border: 1px solid #ccc;
         padding: 4px;
         text-decoration: none;
         color: #666;
         background-color:#fff;
         display: inline-block;
         min-width:50px;
         border-radius: 5px;
         -webkit-border-radius: 5px;
         -moz-border-radius: 5px;
         transition: all 0.5s;
         -webkit-transition: all 0.5s;
         -moz-transition: all 0.5s;
         position:relative;
         /* cg - remove focus rectangle */
         outline:none;
         }
         .tree li a#hilight{
         border: 1px solid #999;
         color:#333;
         background-color:#FFFF88;
         }
         /* red border on contacts */
         .tree li a.o{
         /* background-color: #f90; */
         }
         .tree li a span{
         display:block;
         font-size: 10px;
         }
         /*Time for some hover effects*/
         /*We will apply the hover effect the the lineage of the element also*/
         .tree li a.m:hover { background: #c8e4f8; color: #000; border: 1px solid #94a0b4; }	
         .tree li a.f:hover { background: #ffc0cb; color: #000; border: 1px solid #94a0b4; }	
         .tree li a:hover+ul li a.m { background: #c8e4fb; color: #000; border: 1px solid #94a0b4; }	
         .tree li a:hover+ul li a.f { background: #ffc0cb; color: #000; border: 1px solid #94a0b4; }	
         .tree li a:hover+.p1 a.m { background: #c8e4fb; color: #000; border: 1px solid #94a0b4; }	
         .tree li a:hover+.p1 a.f { background: #ffc0cb; color: #000; border: 1px solid #94a0b4; }	
         /*Thats all. I hope you enjoyed it.
         Thanks :)*/
         .tree .tree-thumbnail
         {
         display:block;
         vertical-align:text-top;
         margin:0px auto 4px auto;
         width:50px;
         height:50px;
         }
         .tree a.f .tree-thumbnail
         {
         background-image:url('../images/f.gif');
         }
         .tree a.m .tree-thumbnail
         {
         background-image:url('../images/m.gif');
         }
         .tree-detail
         {
         display:inline-block; 
         vertical-align:text-top; 
         }
         /* ie8 fixes */
         .tree-ie8 td.line
         {
         line-height:0px;
         height:1px; 
         font-size: 1px;
         }
         .tree-ie8 .li
         {
         display:inline-block;
         text-align: center;
         list-style-type: none;
         position: relative;
         padding: 0px 5px 0 5px;
         font-size: 12px;
         line-height: normal;
         transition: all 0.5s;
         -webkit-transition: all 0.5s;
         -moz-transition: all 0.5s;
         }
         .tree .li a span{
         display:block;
         font-size: 10px;
         }
         .tree .li a{
         border: 1px solid #ccc;
         padding: 4px;
         text-decoration: none;
         color: #666;
         background-color:#fff;
         display: inline-block;
         min-width:50px;
         border-radius: 5px;
         -webkit-border-radius: 5px;
         -moz-border-radius: 5px;
         transition: all 0.5s;
         -webkit-transition: all 0.5s;
         -moz-transition: all 0.5s;
         }
         /*Time for some hover effects*/
         /*We will apply the hover effect the the lineage of the element also*/
         .tree .li a.m:hover { background: #c8e4f8; color: #000; border: 1px solid #94a0b4; }	
         .tree .li a.f:hover { background: #ffc0cb; color: #000; border: 1px solid #94a0b4; }	
         .tree .li a:hover+ul .li a.m { background: #c8e4fb; color: #000; border: 1px solid #94a0b4; }	
         .tree .li a:hover+ul .li a.f { background: #ffc0cb; color: #000; border: 1px solid #94a0b4; }	
         .tree .li a:hover+.p1 a.m { background: #c8e4fb; color: #000; border: 1px solid #94a0b4; }	
         .tree .li a:hover+.p1 a.f { background: #ffc0cb; color: #000; border: 1px solid #94a0b4; }	
         /* cg: make sure the popovers are higher than the hovers */
         .popover { z-index: 4444; }
         .icon-info-sign {
         background-position: 0px 0px;
         background-image:url('../images/icon-info-sign.png');	
         }
      </style>
   </head>
   <body>
      <div id="fullscreen">
         <div id="cg-bootstrap">
            <!-- /navbar -->
            <div class="cg-background">
               <div class="container-fluid">
                  <div class="tree" >
                     <ul>
                        <?php viewHelper($master); ?>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div></div>
   </body>
</html>
