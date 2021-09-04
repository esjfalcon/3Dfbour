<!DOCTYPE html>
<html>
<head>
    <title></title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://kit.fontawesome.com/c0b336cd5f.js" crossorigin="anonymous"></script>
    <style type="text/css">

        .tithead{
            font-size: 40px;
            color: purple;
        }
        .title{
            font-size: 230%;
            line-height: 1.25em;
            padding-bottom: 26px;
        }

        .summary-list {
            height: 224px;
            overflow: auto;
            padding-bottom: 8px;
            margin-top: 20px;
            margin-bottom: 13px;
            border-style: none;
            border-bottom: solid 1px #d2d2d2;
        }


        .footerdiv{
            text-align: right;
            border-style: none;
            border-top: solid 1px #d2d2d2;
            padding-top: 20px;
        }
        table thead tr th label span{
            color: black;
        }
        table tbody tr td label span{
            color: black;
        }
    </style>

</head>
<body>
	
<div class="container">
    
    <div class="row" style="padding-top:80px">

        <div class="col s12 title">
            Telecharger les images
        </div>
        <div class="col s12" >
            <table>
                <thead>
                <tr>
                    <th>
                        <label>
                            <input type="checkbox" id="all_Chk"/>
                            <span>File Name</span>

                        </label>
                    </th>

                    <th>image</th>
                </tr>
                </thead>

                <tbody>


                
	                @foreach($images as $image)

		                <tr>
		                    <td>
		                        <label>
		                        	
		                            <input type="checkbox" class="indi_chk" name="filedata[]" value="{{$image['path']}}"><span>{{$image['path']}}</span>
		                        </label>
		                    </td>
		                    <td class="imgg"><img src="{{ asset('UserImage/'.$image['path']) }}" class="b_img" style="height: 100px; width: 100px;"></td>
		                </tr>
	                @endforeach

                
               
               
                </tbody>
            </table>
        </div>
       
    </div>

    <div class="row footerdiv">
        <button disabled class="btn waves-effect waves-light final_sub" name="action">Download

        </button>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://kit.fontawesome.com/c0b336cd5f.js" crossorigin="anonymous"></script>
<script type="text/javascript">
    var g_arr;
    $('#all_Chk').on('change',function(){

       //Return the value of a property:
       //$(selector).prop(property)
//        $(this) refers to current
       console.log($(this).prop('checked'));

//        Set the property and value:
//        $(selector).prop(property,value)
       $('.indi_chk').prop('checked',$(this).prop('checked'));

       
     enablebutton();
   });

    $('.indi_chk').on('change',function(){
       
       if(false==$(this).prop('checked')){
           $('#all_Chk').prop('checked',false);

       }


       if($('.indi_chk:checked').length==$('.indi_chk').length){
           $('#all_Chk').prop('checked',true);

       }

       enablebutton();

   });

    function enablebutton(){
        var i=1;
        $('.indi_chk:checked').each(function(){
            i++;
        });

        if(i==1){
            $('button').prop('disabled',true);

        }else{
            $('button').prop('disabled',false);

        }
    }

    //download
    
 

    $('.final_sub').on('click',function () {
      var deferred = $.Deferred();
        var i=1;
        g_arr=[];

        $('.indi_chk:checked').each(function(){
            g_arr.push($(this).val());
            i++;
        });
        // i=3
        // g_rr=['abc.pdf','fhdsh.txt']
       //  console.log(g_arr);

       // var j = i-1;
       // console.log(j);
       // if(j==1){
       //    func1();
       // }else if(j==2){
       //    func1().then(func2);
       // }else if(j==3){
       //    func1().then(func2).then(func3);
       // }else if(j==4){
       //    func1().then(func2).then(func3).then(func4);
       // }else if(j==5){
       //    func1().then(func2).then(func3).then(func4).then(func5);
       // }else if(j==6){
       //    func1().then(func2).then(func3).then(func4).then(func5).then(func6);
       // }else if(j==7){
       //    func1().then(func2).then(func3).then(func4).then(func5).then(func6).then(func7);
       // }
       // jQuery.each(g_arr, function(i, l){
       // 		// alert(i);
       // 		// func1(i).then(func1(i+1));
       // 		console.log(g_arr[i]);
       // });


       var time=1500;
       $.each(g_arr, function( index, value ) {
          // alert( index + ": " + value );
          // console.log(value);
          // var deferred = $.Deferred();
          
          window.setTimeout(function(){
               var r_path=value;
               window.location.href='{!! URL::to('getDownloaddemande') !!}'+'?urlpath='+r_path;
               console.log(r_path);
               }, time);
                time+=1500;
               deferred.resolve();
               return deferred.promise();
           
        });
    });

        $('.b_img').css({cursor: 'pointer'}).on('click', function () {
            var img = $(this);
            var bigImg = $('<img />').css({
                'max-width': '100%',
                'max-height': '100%',
                'display': 'inline'
            });
            bigImg.attr({
                src: img.attr('src'),
                alt: img.attr('alt'),
                title: img.attr('title')
            });
            var over = $('<div />').text(' ').css({
                'height': '100%',
                'width': '100%',
                'background': 'rgba(0,0,0,.82)',
                'position': 'fixed',
                'top': 0,
                'left': 0,
                'opacity': 0.0,
                'cursor': 'pointer',
                'z-index': 9999,
                'text-align': 'center'
            }).append(bigImg).bind('click', function () {
                $(this).fadeOut(300, function () {
                $(this).remove();
                });
            }).insertAfter(this).animate({
                'opacity': 1
            }, 300);
            });
</script>

</body>
</html>