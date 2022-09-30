<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
     crossorigin="anonymous">
     <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Document</title>
</head>
<body>
    @include('menu')
    @include('modal1')
   
   
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <div id="plage">
        <button type="button" class="btn btn-primary" onclick="create_cat()">Add_cat</button>
        <button type="button" class="btn btn-dark" onclick="show_cat()">show_cat</button>
        <button type="button" class="btn btn-success" onclick="restore()">Restore_cat</button>
        <button type="button" class="btn btn-info" onclick="createp()">Add_pro</button>
        <button type="button" class="btn btn-dark" onclick="create_couleur()">Add_couleur</button>
        <button type="button" class="btn btn-default" onclick="show_couleur()">show_couleur</button>
        <button type="button" class="btn btn-danger" onclick="show_pro()">show_pro</button>
        <button type="button" class="btn btn-warning" onclick="restore_pro()">Restore_pro</button>


        
        
    
        </div>
     <script>
        //PARTIE CATEGORIE
        function create_cat(){
            $.get("{{url('categorie/create')}}",{},function(data,status){
               $("#mod").html(data);
               $("#general").modal('show');
            });
        }
     </script>

     <script>
        function store_cat(){
            var formdata = new FormData($("#cat")[0]);
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
              $.ajax({
                         type:"post",
                         url:"{{url('categorie/store')}}",
                         data:formdata,
                         processData:false,
                         contentType:false,
                         success:function(response){
                            if(response.status==200){
                                $(".notif1").html(response.message).addClass('alert alert-success');
                            }else{
                             $(".notif1").html('Erreur de enregistrement').addClass('alert alert-success');

                            }
                         }
              });
        }
     </script>

     <script>
        function show_cat(){
            $.get("{{url('categorie/show_cat')}}",{},function(data,status){
                  $("#plage").html(data);
                  
            });
        }
     </script>

     <script>
        function edit(id){
            $.get("{{url('categorie/edit')}}/"+id,{},function(data,status){
                $("#mod").html(data);
                $("#general").modal('show');
            });
        }
     </script>

     <script>

        function update(id){
            var formdata = new FormData($("#nix")[0]);
            $.ajaxSetup({
    headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax({
                type:"post",
                url:"{{url('categorie/update')}}/"+id,
                data:formdata,
                processData:false,
                contentType:false,
             success:function(response){
                    if(response.status==200){
            $("#notif2").html(response.message).addClass('alert alert-success');
                    }else{
                        $("#notif2").html('Error de modification').addClass('alert alert-danger');

                    }
                }
            });
        }

     </script>

     <script>
        function deletet(id){
            $.get("{{url('categorie/delete')}}/"+id,{},function(){
                show_cat()
            });
        }
     </script>
    
     <script>
            function restore(){
                $.get("{{url('categorie/restore')}}",{},function(){
                    show_cat()
                });
            }
     </script>

     <script>
        function delete_multiple(){
            $(document).on('click','.goz',function(){
                var info = [];
                $(".goz").each(function(){
                    if($(this).is(":checked")){
                        info.push($(this).val());
                        
                    }
                });
                    console.log(info);
                 $(".voxa").on('click',function(){
                      
                    $.ajax({
                        type:"get",
                        url:"{{url('categorie/delete_multiple')}}",
                        data:"info="+info,
                        success:function(response){
                           
                            show_cat()
                        }
                    });
                 });   
            });
        }
     </script>
     
     <script>
        function create_couleur(){
            $.get("{{url('couleur/create')}}",{},function(data,status){
               $("#mod").html(data);
               $("#general").modal('show');
            });
        }
     </script>
   <script>
     function createp(){
        $.get("{{url('produit/create')}}",{},function(data,status){
             $("#mod").html(data);
             $("#general").modal('show');
        });
     }
   </script>

     <script>
       function storep(){

        var formdata = new FormData($("#proto")[0]);
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

         $.ajax({
           type:"post",
           url:"produit/store",
           data:formdata,
           processData:false,
           contentType:false,
           success:function(response){
              if(response.status==200){
                $(".informo").html(response.message).addClass('alert alert-success');
              }else{
                $(".informo").html('Erreur de enregitrement').addClass('alert alert-danger');

              }
           }
         });
       }
     </script>

     <script>
       function store_color(){
         var formdata = new FormData($("#coul")[0]);
         $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
         $.ajax({
           type:"post",
           url:"couleur/store",
           data:formdata,
           processData:false,
           contentType:false,
           success:function(response){
            if(response.status==200){
                $(".infox").html(response.message).addClass('alert alert-success');
              }else{
                $(".infox").html('Erreur de enregitrement').addClass('alert alert-danger');

              }
           }
         });
       }
     </script>

     <script>
        function show_couleur(){
            $.get("{{url('couleur/show')}}",{},function(data,status){
                $("#plage").html(data);
                  
            });
        }
     </script>

     <script>
        function show_pro(){
            $.get("{{url('produit/show')}}",{},function(data,status){
                $("#plage").html(data);
            });
        }
     </script>

     <script>
          function deletep(id){
            $.get("{{url('produit/delete')}}/"+id,{},function(){
            show_pro()
          });
          }
    </script>

    <script>
        function edit_pro(id){
            $.get("{{url('produit/edit')}}/"+id,{},function(data,status){
                 $("#mod").html(data);
                 $("#general").modal('show');
            });
        }
    </script>

    <script>
        function update_pro(id){

            var formdata = new FormData($("#fongx")[0]);
            $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
            $.ajax({
                type:"post",
                url:"{{url('produit/update')}}/"+id,
                data:formdata,
                processData:false,
                contentType:false,
                success:function(response){
                    if(response.status==200){
                        $(".informo4").html(response.message).addClass('alert alert-success');
                    }else{
                        $(".informo4").html('Erreur de modification').addClass('alert alert-danger');

                    }
                }
            });
        }
    </script>

    <script>
       function delete_gallery(id){
           $(document).on('click','.fox',function(){
              var formdata=$(this).attr('data-image');
             
              $.ajax({
                    type:"get",
                    url:"{{url('produit/delete_gallery')}}/"+id,
                    success:function(response){
                        show_pro()
                    }
                    

              });
           });
       }
    </script>


 <script>
    function delete_multiplo(){
            $(document).on('click','.ingx',function(){
                var stock_data = [];
                $(".ingx").each(function(){
              if($(this).is(":checked")){
                stock_data.push($(this).val());
              }
                });
                console.log(stock_data);
                $(".jinx").on('click',function(){
                    
                    $.ajax({
                       type:"get",
                       url:"produit/delete_multiplo",
                       data:"stock_data="+stock_data,
                       success:function(response){
                        show_pro()
                       }
                    });
                })
            });
        }
 </script>

 <script>
    function restore_pro(){
        $.get("{{url('produit/restore_pro')}}",{},function(){
            show_pro()
        });
    }
 </script>
    <script>
        $(document).ready(function(){
            delete_multiplo()
        })
    </script>
     
</body>
</html>