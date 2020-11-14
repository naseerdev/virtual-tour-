@extends('layouts.app')

@section('content')

 @php
 $address_id=json_encode($address);    
 $hname=json_encode($hostelN);
 @endphp
 


<section  id="dashboard-bg">
    <div class="background-dashboard">
<div class="container">
    <div class="row ">
       
            
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

     <div class="col-md-6 mt-5 py-5 px-5">
            <div class="information">
                    <div class="checkboxes"> <i class="fa fa-check fa-2x"></i></div>
                    <div class=" py-2 px-2">
                    <p class="paragraphs">Provide us all necessary information about your hostel.</p>
                    </div>
                   
            </div>
            <div class="seperator"></div>
     
            <div class="information">
                <div class="checkboxes"> <i class="fa fa-check fa-2x"></i></div>
                <div class=" py-2 px-2">
                <p class="paragraphs">Including your hostel name,floors and rooms your hostel have.</p>
                </div>
            </div>
            <div class="seperator"></div>
            <div class="information">
            <div class="checkboxes"> <i class="fa fa-check fa-2x"></i></div>
            <div class=" py-2 px-2">
            <p class="paragraphs">Also provide us meal routine of all our the weeks and available facilities.</p>
            </div>
            </div>  
            <div class="seperator"></div>

             <div class="information">
            <div class="checkboxes"> <i class="fa fa-check fa-2x"></i></div>
           <div class=" py-2 px-2">
           <p class="paragraphs">Then provide Panaroma shots of floors and rooms we make virtual tour of your hostel.</p>
            </div>
         </div>
          <div class="seperator"></div>
     </div>       
     <div class="col-md-6  my-auto d-flex justify-content-center">
       <div class="flex">
       <button id="adrress" class="btn btn-external mx-3  btn-lg active" role="button" aria-pressed="true">Create/Edit</button>
        <a id="visitVirtually"  class="btn btn-external mx-3 btn-lg active" role="button" aria-pressed="true">Visit Site</a>
       </div>
        
     </div>     
                
            
        
    
</div>
</div>
    </div>
    
</section><!-- end of admin front layout -->





<script>
    var hostelName;
$('#visitVirtually').click(function()
{
  hostelName=(<?php echo $hname; ?>);
  window.location = "http://localhost:8080/virtualtour/"+hostelName;

});


    var comapre_address_id;
    if(<?php echo $address_id; ?>.length>0)
    {
        comapre_address_id=JSON.stringify(<?php echo $address_id; ?>);
    }

$("#adrress").click(function()
{
    if(comapre_address_id===undefined)
    {
        window.location = "http://localhost:8080/virtualtour/create";
    }
    else{
        window.location = "http://localhost:8080/virtualtour/update";

    }
     
    
         

});




  /*  $(document).ready(function(){
        $('#adrress').on('click',()=>{
          var comapre_address_id = <?php echo $address_id; ?>;
          console.log(comapre_address_id);
          if(comapre_address_id!=null)
          {
              
          window.location.href = "{{ url('/update') }}";
          }
          else
          {
            window.location.href = "{{ url('/create') }}";
            
          }
        });
    });  */
    </script>

@endsection
