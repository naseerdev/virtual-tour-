var newOption = "null"
var x;
var sel;
var btn;

sel = document.getElementById("floors");

$("#floors").change(function(){
    var value=$("#floors option:selected").text();
    if(value==="Custom")
    {
        x = document.createElement("INPUT");
        x.setAttribute("type", "text");
        x.setAttribute("placeholder", "Enter custom flooor");
        x.setAttribute("id", "CustomInput");
      

        document.getElementById("divID").appendChild(x);
        $("#CustomInput").addClass("mt-3 form-control form-control-lg input-custom").attr("placeholder","Enter Custom Floor");
        document.getElementById("divID").removeChild(sel);
        btn = document.createElement("INPUT");
        btn.setAttribute('type', 'button');
        btn.setAttribute('value', 'Done')
        btn.setAttribute('onclick', 'myFunction2()');
        btn.setAttribute('id', 'inputBtn');
        document.getElementById("divID").appendChild(btn);
        $("#inputBtn").addClass("btn btn-primary btn-block customButton");
    }
});
function myFunction2() {
    newOption = x.value;
    var opt = document.createElement('option');
    opt.appendChild(document.createTextNode(newOption) );
    opt.value = newOption; 
    sel.appendChild(opt);
    document.getElementById("divID").appendChild(sel);
    document.getElementById("divID").removeChild(x)
    document.getElementById("divID").removeChild(document.getElementById("inputBtn"))
}


$(document).ready( function() {
    $(document).on('change', '.btn-file :file', function() {
    var input = $(this),
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function(event, label) {
        
        var input = $(this).parents('.input-group').find(':text'),
            log = label;
        
        if( input.length ) {
            input.val(log);
        } 
    
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
        
    $("#imgInp").change(function(){
        readURL(this);
    }); 	
});
var flr;
var createH;
var floors = [];
Array.prototype.push.apply(floors, flr);
var room;
var createHotspot= [];
Array.prototype.push.apply(createHotspot, createH);
var roomhotspot;
var defaultRoom;
var targetRoom;
var pitch;
var yaw;
var updateRoom;
var isdatabaseEmpty=false;
var flrempty=false;
var currntRom;
// function for add room
function addroom()
{
   
    var roomsinputs = document.getElementById("roomsinput");
    var panorama = document.getElementById("panorama");
    roomsinputs.style.display = "none";
    panorama.style.display="block";
    $("#floors").attr('disabled', false);  
    var room_name = $("#room_name").val();
    var floorName = $("#floors").val();
    var capacity = $("#std_capacity").val();
    var living = $("#current_livings").val();
    
    
    room.roomName = room_name;
    room.capacity = capacity;
    room.currentLiving = living;
    room.floorName = floorName;
 
    
   
    
    var floorFound = false;
    for(var i=0;i<floors.length;i++)
    {

      if (room.floorName == floors[i].floorName) {
        floors[i].rooms.push(room);

        floorFound = true;
        break;
      }
   
     
        
      
    }

    if (!floorFound) {
      var floor = {
        floorName: room.floorName,
        rooms: []
      };
      floor.rooms.push(room);

      floors.push(floor);
    }

   
   
    
  
  
  $("#dropdown-floor").html("");
  for(var i=0;i<floors.length;i++)
  {
  var selected=(floorName===floors[i].floorName)?"selected":"";
  $("#dropdown-floor").append("<option "+selected+" value='" + floors[i].floorName + "'>" + floors[i].floorName + "</option>");
  }
    var SidebarRooms=GetRooms(floorName,floors);
    $("#imglist").html("");
    for(var i=0;i<SidebarRooms.length;i++)
    {
      AddSidebarRoom(SidebarRooms[i].floorName,SidebarRooms[i].path,SidebarRooms[i].roomName);
    }
    $("#show-roomName").html("");
    $("#show-roomName").append("<h3 id='current-room' class='heading-position'>"+room.roomName+"<i style='display:inline;z-index:1000;margin-left:2px !important;' class='fa fa-fw fa-home ml-3' ></i><h3>  ");

    
      roomhotspot = {
       [room_name]: {}
      };

    roomhotspot[room_name].pitch = -3;
    roomhotspot[room_name].yaw = 117;
    roomhotspot[room_name].hfov = 110;
    roomhotspot[room_name].panorama="http://localhost:8080/virtualtour/" + room.path;
    roomhotspot[room_name].type="equirectangular",
     roomhotspot[room_name].autoLoad=true;
    roomhotspot[room_name].hotSpots=[];
    console.log( roomhotspot);
    var fFound=false;
    for(var i=0;i<createHotspot.length;i++)
    {
      if(room.floorName===createHotspot[i].fName)
      {
        $.extend(createHotspot[i].scenes, roomhotspot );
       // createHotspot[i].scene.(roomhotspot);
        fFound=true;
      }
   } 
    if(!fFound)
    {
      var Rhotspot={
        fName:room.floorName, 
       
      };
      Rhotspot.scenes=roomhotspot; 
      console.log (Rhotspot);
      
      createHotspot.push(Rhotspot);
      console.log(createHotspot);
    }
    
    
   
  roomHotSpot( room.roomName);
    console.log(createHotspot);

}
//end of add room function

$("#dropdown-floor").html("");
  for(var i=0;i<floors.length;i++)
  {
 // var selected=(floorName===floors[i].floorName)?"selected":"";
  $("#dropdown-floor").append("<option  value='" + floors[i].floorName + "'>" + floors[i].floorName + "</option>");
  }
 
  

  
 
// function for get all the rooms
function GetRooms(FloorName,Floors)
    {
      for(var i=0;i<Floors.length;i++)
        {
           if(Floors[i].floorName===FloorName)
              {
                   return Floors[i].rooms;
              }
        }
    }


function AddSidebarRoom(FloorName,IMGPath,RoomName)
     {
  $("#imglist").append("<li class='room' data-floor='"+FloorName+"'  style='position:relative;margin-bottom:8px;cursor:pointer;'><img style='width:100%;height:180px;position:relative;' src=http://localhost:8080/virtualtour/"+IMGPath+" onclick='imageClick(this)'  />"
      +"<p  style='position:absolute; top:10px;left:20px;display:inline-block ;color:white;' data-toggle='tooltip' title='Update Room'  ><i id='font' onclick='update(this)' class='fa fa-wrench fa-2x font-hover'></i></p>"
     +"<p style='position:absolute; top:10px;right:20px;display:inline-block ;color:white;data-toggle='tooltip' title='Delete Room' '><i id='font' onclick='del(this)' class='fa fa-times fa-2x font-hover'></i></p>"
      +"<p style='position:absolute; bottom:-16px;padding-bottom:3px;background-color:#3490dc;width:100%;text-align:center ;color:white;font-size:12px'>"+RoomName+"</p></li>");
   }

$("#dropdown-floor").change(function(){
  var v=0;
  var FloorName=$("#dropdown-floor").find(":selected").attr("value");
  var SidebarRooms=GetRooms(FloorName,floors);
  roomHotSpot(SidebarRooms[v].roomName);
  $("#imglist").html("");
    for(var i=0;i<SidebarRooms.length;i++)
    {
      AddSidebarRoom(SidebarRooms[i].floorName,SidebarRooms[i].path,SidebarRooms[i].roomName);
    }
    
    

});
console.log(floors);


//function for add next room

$("#addNext").click(function()
{
 
  $("#panorama").hide();
  $("#roomsinput").show();
  $("#room_name").val('');
  $("#floors").val('groundfloor');
  $("#std_capacity").val('');
  $("#current_livings").val('');
  $("#imgInp").val('');
  $('#img-upload').removeAttr('src');
  $("#add_room").text("Add Room");
  $("#add_room").attr("onclick","addroom()");
   
});

function imageClick(img) {
        $("#panorama").show();
         $("#roomsinput").hide();
         $(".pnlm-hotspot").remove();
         

    var src = img.src;
    var FloorName=$("#dropdown-floor").find(":selected").attr("value");
    for(i=0;i<createHotspot.length;i++)
    {
      if(FloorName===createHotspot[i].fName)
      {
        for(var obj in createHotspot[i].scenes)
        {
          
          if(createHotspot[i].scenes[obj].panorama===src)
          {
           
            roomHotSpot(obj);
            
          } 
        }

      }
    }
  
    $("#contextMenu").hide();

}


//function for show which room needs to update

function update(i)
{  
   var rname=i.closest('li').lastChild.innerHTML;
  $("#add_room").text("Update Room");
  var imgslength=document.getElementById("imglist").getElementsByTagName("li").length;
  var FloorName=$("#dropdown-floor").find(":selected").attr("value");
  var SidebarRooms=GetRooms(FloorName,floors);
  
 
    for(var i=0;i<SidebarRooms.length;i++)
    {
      if(rname===SidebarRooms[i].roomName)
      {
        $("#panorama").hide();
         $("#roomsinput").show();
         $("#room_name").val(SidebarRooms[i].roomName);
         $("#floors").val(SidebarRooms[i].floorName);
         $("#std_capacity").val(SidebarRooms[i].capacity);
         $("#current_livings").val(SidebarRooms[i].currentLiving);
         $("#img-upload").attr("src",SidebarRooms[i].path);
         $("#add_room").attr("onclick","updatefunction('"+rname+"','"+SidebarRooms[i].path+"')");
         $("#floors").attr('disabled', true);
      }
    }
   


 
}

//function for update room

function updatefunction(rname,source)
{
  
  var room_name = $("#room_name").val();
    var floorName = $("#dropdown-floor").find(":selected").attr("value");
    var capacity = $("#std_capacity").val();
    var living = $("#current_livings").val();
    var  p=$("#img-upload").attr("src");
   
    
  
    if(source===p)
    {
      room={};
      //console.log(room);
      room.path=p;
     // console.log("if")
    }
    room.roomName = room_name;
    room.capacity = capacity;
    room.currentLiving = living;
    room.floorName = floorName;
   
       

  /*
   
   var Roomupdate=false;
   debugger;
    if( $("#imgInp").change() )
    {
      debugger;
      Roomupdate=true;
      console.log("img change");

    }

if(!Roomupdate)
{
  updateRoom={};
  updateRoom.path=$("#img-upload").attr('src');
  console.log("img not change");

} 
*/
//console.log(room);

var floorFound = false;
    for(var i=0;i<floors.length;i++)
    {

      if (room.floorName === floors[i].floorName) {
  
        for( var j=0;j<floors[i].rooms.length;j++)
        {
          if(rname===floors[i].rooms[j].roomName)
          {
            floors[i].rooms[j].roomName=room.roomName;
            floors[i].rooms[j].capacity=room.capacity;
            floors[i].rooms[j].currentLiving= room.currentLiving;
            floors[i].rooms[j].floorName= room.floorName;
            floors[i].rooms[j].path=room.path;
            
          
        }

        
  

        floorFound = true;
        
           }
       }
    }

console.log(createHotspot);
    for(var i=0;i<createHotspot.length;i++)
    {
      if(floorName===createHotspot[i].fName)
      {
        for(var commingScene in createHotspot[i].scenes)
        {
         // var p=createHotspot[i].scenes[obj].panorama.split('http://localhost:8080/virtualtour/');
          if(rname===commingScene && rname!==room.roomName)
          {
           
          createHotspot[i].scenes[room.roomName] = createHotspot[i].scenes[commingScene];
        
           delete createHotspot[i].scenes[rname];
           
      //    break; 
         
          
          }
          else if(createHotspot[i].scenes[commingScene].panorama !==room.path)
          {
            createHotspot[i].scenes[room.roomName].panorama="http://localhost:8080/virtualtour/"+room.path;
          }
         
          
      }
   }
}


      for(var i=0;i<createHotspot.length;i++)
      {
        if(floorName===createHotspot[i].fName)
        {
          for(var obj in createHotspot[i].scenes)
          {
            for(var insideUpdate of createHotspot[i].scenes[obj].hotSpots)
            {
              if(insideUpdate.sceneId===rname)
              {
                createHotspot[i].scenes[obj].hotSpots[i].clickHandlerArgs=room.roomName;
                createHotspot[i].scenes[obj].hotSpots[i].createTooltipArgs=room.roomName;
                createHotspot[i].scenes[obj].hotSpots[i].sceneId=room.roomName;
                createHotspot[i].scenes[obj].hotSpots[i].text=room.roomName;
                
              }
            }

          }
        }
      }

    


   
    var SidebarRooms=GetRooms(floorName,floors);
    $("#imglist").html("");
    for(var i=0;i<SidebarRooms.length;i++)
    {
      AddSidebarRoom(SidebarRooms[i].floorName,SidebarRooms[i].path,SidebarRooms[i].roomName);
    }
  
    

    if (!floorFound) {
      var floor = {
        floorName: room.floorName,
        rooms: []
      };
      floor.rooms.push(room);

      floors.push(floor);
    }


    $(".pnlm-hotspot").remove();
    roomHotSpot(room.roomName);
    $("#contextMenu").hide();
   
     $("#panorama").show();
     $("#roomsinput").hide();

   
 

   
   

}

//function for delete rooms

function del(i)
{
  
  var rname=i.closest('li').lastChild.innerHTML;
  var FloorName=$("#dropdown-floor").find(":selected").attr("value");
  var SidebarRooms=GetRooms(FloorName,floors);
  for(var i=0;i<floors.length;i++)
  {

      if (FloorName === floors[i].floorName) 
      {
  
        for( var j=0;j<floors[i].rooms.length;j++)
          {
          if(rname===floors[i].rooms[j].roomName)
              {
               
           floors[i].rooms.splice((rname,j),1);
           
           // delete floors[i].rooms[j];
          
        }
      }
    }
  }


      for(var i=0;i<createHotspot.length;i++)
          {
            if(FloorName===createHotspot[i].fName)
             {
                for(var commingScene in createHotspot[i].scenes)
                  {
       
                     if(rname===commingScene)
                       {
         
                         delete createHotspot[i].scenes[rname]; 
                        break; 
       
                      }     
                   }
              }
          }



for(var i=0;i<createHotspot.length;i++)
{
  if(FloorName===createHotspot[i].fName)
  {
    for(var obj in createHotspot[i].scenes)
    {
      for(var insidedel of createHotspot[i].scenes[obj].hotSpots)
      {
        if(insidedel.sceneId===rname)
        {
          
          createHotspot[i].scenes[obj].hotSpots.splice((rname,insidedel),1);
          
        }
      }

    }
  }
}




    var SidebarRooms=GetRooms(FloorName,floors);
    $("#imglist").html("");
    for(var i=0;i<SidebarRooms.length;i++)
    {
      AddSidebarRoom(SidebarRooms[i].floorName,SidebarRooms[i].path,SidebarRooms[i].roomName);
    }
    $("#panorama").hide();
     $("#roomsinput").show();
     $("#room_name").val('');
  $("#floors").val('groundfloor');
  $("#std_capacity").val('');
  $("#current_livings").val('');
  $("#imgInp").val('');
  $('#img-upload').removeAttr('src');
  $("#add_room").text("Add Room");
  $("#add_room").attr("onclick","addroom()");
  $("#floors").attr('disabled', false);



}


$("#contextMenu").hide();
var x_axis,y_axis;
$("#panorama").mousedown(function(event) {
    var offset = $(this).offset();
    x_axis = event.pageX- offset.left;
    y_axis = event.pageY- offset.top;
   // $("#div1").html("(X: "+x+", Y: "+y+")");

});



$( "#panorama" ).contextmenu(function() {
  $("#contextMenu").css({left: x_axis, top: y_axis});
  $("#contextMenu").show();
  var FloorName=$("#dropdown-floor").find(":selected").attr("value");
  var SidebarRooms=GetRooms(FloorName,floors);
  $("#room-hotspot").html("");

  for(var i=0;i<SidebarRooms.length;i++)
    {
     addHotspotroom(SidebarRooms[i].roomName)
     
  
    }





});

function  addHotspotroom(roomName)
{
  $("#room-hotspot").append("<li onclick='CreateHotspot(this)' class='py-2' style='text-align:center;font-size:15px' data-room='"+roomName+"' >"+roomName+"</li>");
}


$( "#panorama" ).click(function()
{
  $("#contextMenu").hide();

});

// Hot spot creation function

function CreateHotspot(hotspotname)
{
  var Rname=hotspotname.closest('li').innerHTML;
  var FloorName=$("#dropdown-floor").find(":selected").attr("value");
 var   TpanoramaImgpath;
 var   TpanoramaRoomname;
 var   CpanoramaImgpath;
 var   CpanoramaRoomname;



   for(var i=0;i<floors.length;i++)
    {

      if (FloorName === floors[i].floorName) {
  
        for(var k=0;k<floors[i].rooms.length;k++)
        {
          if(Rname === floors[i].rooms[k].roomName)
          {
            
            TpanoramaImgpath=floors[i].rooms[k].path;
            TpanoramaRoomname=floors[i].rooms[k].roomName ;
            break;
           
          
        }
      }
    }
   

}


          for(var i=0;i<floors.length;i++)
                {

                 if (FloorName === floors[i].floorName)
                  {
  
                      for(var k=0;k<floors[i].rooms.length;k++)
                          {
                            CpanoramaRoomname=$("#current-room").text();
                           if(CpanoramaRoomname===floors[i].rooms[k].roomName)
                               {
                                 CpanoramaImgpath=floors[i].rooms[k].path;
                                 
                                    break;
           
                                }
                            }
                    }
              }
console.log(TpanoramaRoomname,TpanoramaImgpath);
console.log(CpanoramaRoomname,CpanoramaImgpath);







targetRoom.type="scene";
targetRoom.text=TpanoramaRoomname;
targetRoom.sceneId=TpanoramaRoomname;
targetRoom.targetYaw= -23;
targetRoom.targetPitch=2;
targetRoom.targetHfov=110;
targetRoom.clickHandlerFunc=hotspotClicked;
targetRoom.clickHandlerArgs=TpanoramaRoomname;
targetRoom.createTooltipFunc=hotspotA;
targetRoom.createTooltipArgs=TpanoramaRoomname;


for(i=0;i<createHotspot.length;i++)
{
  if(FloorName===createHotspot[i].fName)
  {
    for(var obj in createHotspot[i].scenes)
    {
      if(obj===CpanoramaRoomname)
      {
      console.log(createHotspot[i].scenes[obj].hotSpots.push(targetRoom));
       
        break;
      }
    }
  }
}





$(".pnlm-hotspot").remove();
roomHotSpot(CpanoramaRoomname);



 


}
 
// major function which create all hotspots
function roomHotSpot(CpanoramaRoomname)
{
  //$(".pnlm-hotspot").remove();
  
  var FloorName=$("#dropdown-floor").find(":selected").attr("value");
 
  defaultRoom={};
  defaultRoom={
  "default": {
        "firstScene": CpanoramaRoomname,
        "sceneFadeDuration": 1000,
        "autoLoad":"true",
        "autoRotate": -2, 
        "compass": true,


  }
};



for(var i=0;i<createHotspot.length;i++)
{
  if(FloorName===createHotspot[i].fName)
  {
    //$.extend(a,createHotspot[i].);
    defaultRoom.scenes=createHotspot[i].scenes;
    console.log(defaultRoom);
    
    
   
  }
}

 




targetRoom= {};
 viewer =pannellum.viewer('panorama',defaultRoom);
 viewer.on('mousedown', function(event) {
    // For pitch and yaw of center of viewer
   // console.log(viewer.getPitch(), viewer.getYaw());
    // For pitch and yaw of mouse location
    var coords;
  coords= viewer.mouseEventToCoords(event).toString();
  var coordinates= coords.split(',');
   pitch=coordinates[0];
  yaw=coordinates[1];
   console.log(pitch);
   console.log(yaw);
 
   targetRoom.pitch=JSON.parse(pitch);
   targetRoom.yaw=JSON.parse(yaw);
});








 

 $("#show-roomName").html("");
 $("#show-roomName").append("<h3 id='current-room' class='heading-position'>"+defaultRoom["default"].firstScene+"<i style='display:inline;z-index:1000;margin-left:2px !important;' class='fa fa-fw fa-home ml-3' ></i><h3>  ");

}

function hotspotClicked(hotSpotDiv, args)
{
 
  $("#show-roomName").html("");
 $("#show-roomName").append("<h3 id='current-room' class='heading-position'>"+args+"<i style='display:inline;z-index:1000;margin-left:2px !important;' class='fa fa-fw fa-home ml-3' ></i><h3>  ");

  
}


// dynamically create tooltip function

function hotspotA(hotSpotDiv,args) {
  currntRom=$("#current-room").text();
  hotSpotDiv.classList.add('custom-tooltip');
    var hdiv= document.createElement('div');
    hdiv.setAttribute("id", "hotspot-tooltip");
    
   // $("#custom-tooltip").html("");
    hotSpotDiv.append(hdiv);
    
    
var btnRemove = document.createElement("BUTTON");
      btnRemove.setAttribute('type', 'button');
      btnRemove.setAttribute('onclick', 'removeHotspot(this)');
      btnRemove.setAttribute('id', 'removebtn');
      btnRemove.innerHTML = 'Remove';
     
      
   // $("#hotspot-tooltip").html("");
    $("#hotspot-tooltip").append("<p class='hotspot-targetRoom'>"+args+"</p>");
    $("#hotspot-tooltip").append( btnRemove);

    
hdiv.style.width = hdiv.scrollWidth - 20 + 'px';
hdiv.style.marginLeft = -(hdiv.scrollWidth - hotSpotDiv.offsetWidth) / 2 + 'px';
hdiv.style.marginTop = -hdiv.scrollHeight - 12 + 'px';
  





 
}

//remove hotspot function
$("#hotspot-tooltip").click(function()
      {
        return false;
      });

      
function removeHotspot(removeRoom)
{
      var removeRoom= removeRoom.closest('div').firstChild.innerHTML;
      console.log(removeRoom);
      var FloorName=$("#dropdown-floor").find(":selected").attr("value");
      
      console.log(currntRom);
     for(var i=0;i<createHotspot.length;i++)
      {
          if(FloorName===createHotspot[i].fName)
          {
            for(var obj in createHotspot[i].scenes)
            {
              if(obj===currntRom)
              {
                  for( var targetRemoverRoom of createHotspot[i].scenes[obj].hotSpots)
                  {
                    if(targetRemoverRoom.sceneId===removeRoom)
                    {
                        createHotspot[i].scenes[obj].hotSpots.splice(removeRoom,1);
                        

                        
                    }
                      
                  }
               }
            }
         }
      } 
      $(".pnlm-hotspot").remove();
      roomHotSpot(currntRom);
      
      
  }


  
 
 









  
      
  