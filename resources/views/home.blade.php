<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Searching</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<select class="form-control" name="country" id="country">
    <option value="0">Select Country</option>
    @foreach ($countries as $country) 
        <option value="{{$country->id}}">
         {{$country->name}}
        </option>
    @endforeach
</select>
 
<select class="form-control" name="state" id="state">
</select>
 
<select class="form-control" name="city" id="city">
</select>


<select class="form-control" name="village" id="village">
</select>

<script>
    $('#country').change(function(){
        var cid = $(this).val();
        if(cid == 0){
            $("#state").empty();
            $("#city").empty();
            $("#village").empty();

        }
    });

        $('#country').change(function(){
        var cid = $(this).val();
        if(cid){
        $.ajax({
        type:"get",
        url:"{{url('/state')}}/"+cid,
        success:function(res)
        {       
                if(res)
                {
                    $("#state").empty();
                    $("#city").empty();
                    $("#village").empty();
                    $("#state").append('<option>Select State</option>');
                    $.each(res,function(key,value){
                        $("#state").append('<option value="'+key+'">'+value+'</option>');
                    });
                }
        }
    
        });
        }
    });
    $('#state').change(function(){
        var sid = $(this).val();
        if(sid){
        $.ajax({
        type:"get",
        url:"{{url('/city')}}/"+sid, 
        success:function(res)
        {       
                if(res)
                {
                    $("#city").empty();
                    $("#village").empty();
                    $("#city").append('<option>Select City</option>');
                    $.each(res,function(key,value){
                        $("#city").append('<option value="'+key+'">'+value+'</option>');
                    });
                }
        }
    
        });
        }
    }); 
    $('#city').change(function(){
        var sid = $(this).val();
        if(sid){
        $.ajax({
        type:"get",
        url:"{{url('/village')}}/"+sid, 
        success:function(res)
        {       
                if(res)
                {
                    $("#village").empty();
                    $("#village").append('<option>Select Village</option>');
                    $.each(res,function(key,value){
                        $("#village").append('<option value="'+key+'">'+value+'</option>');
                    });
                }
        }
    
        });
        }
    }); 
</script>
    
</body>
</html>