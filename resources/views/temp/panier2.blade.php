@extends('base2')

@section('emo')

<div class="container" id="true_cart">
    
          
     
</div> 
   @section('scripts')
     <script>
      $(document).on('click','.increment1',function(){
              var incre = $(this).closest('.papa').find('.qt_modif').val();
              var convertiseur = parseInt(incre,10);
              convertisseur = isNaN(incre) ? 0 :convertiseur;
                if(convertiseur <10){
                  convertiseur++;
                  $(this).closest('.papa').find('.qt_modif').val(convertiseur);
                  
                }
      });

      $(document).on('click','.decrement2',function(){
              var decre = $(this).closest('.papa').find('.qt_modif').val();
              var convertiseur = parseInt(decre,10);
              convertisseur = isNaN(decre) ? 0 :convertiseur;
                if(convertiseur >1){
                  convertiseur--;
                  $(this).closest('.papa').find('.qt_modif').val(convertiseur);
                  
                  
                }
      });


     </script>
     <script>
      
      $(document).on('click','.xinx',function(){
            var quantite = $(this).closest('.papa').find('.qt_modif').val();
             var id_panier = $(this).closest('.papa').find('.id_panier').val();
   
             $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
             $.ajax({
                      type:"post",
                      url:"{{url('template/update_qt_cart')}}/",
                      data:{
                         'quantite':quantite,
                         'id_panier':id_panier,
                      },
                      
                      success:function(response){
                        show_cartx()
                       
                        toltal_small_cart()
                      }
                   });

         });
     </script>
   @endsection
@endsection