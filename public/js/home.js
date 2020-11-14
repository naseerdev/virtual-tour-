var emaidata;
var homeTour=[
    {"scenes":{"entrance":{"pitch":-3,"yaw":117,"hfov":110,"panorama": "http://localhost:8080/virtualtour/public/images/entrance.jpg",
    "autoLoad": true,
     "type": "equirectangular",
     "hotSpots":[
         { "pitch": 2.4112892506000145,
         "yaw": 85.15933732656332,
         "type": "scene",
         "text": "Room",
         "sceneId": "room",
         "clickHandlerFunc":hotspotClicked,
         "clickHandlerArgs":"Room"
     },
       {
        "pitch": -2.3910373019249476,
        "yaw": 7.933612010732482,
        "type": "scene",
        "text": "Balcony",
        "sceneId": "balcony",
        "clickHandlerFunc":hotspotClicked,
        "clickHandlerArgs":"Balcony"
    },
    {
        "pitch": -6.645561000705043,
        "yaw":  27.571691362771762,
        "type": "scene",
        "text": "living-room",
        "sceneId": "living-room",
        "clickHandlerFunc":hotspotClicked,
        "clickHandlerArgs":"Living Room"
    }
]},
    "balcony":{"pitch":-3,"yaw":117,"hfov":110,"panorama": "http://localhost:8080/virtualtour/public/images/balcony.jpg", type: "equirectangular",
    "autoLoad": true,
    "hotSpots":[
        {
            "pitch": -20.460560423155595,
            "yaw": -169.28482396792774,
            "type": "scene",
            "text": "living Room",
            "sceneId": "living-room",
            "clickHandlerFunc":hotspotClicked,
            "clickHandlerArgs":"Living Room"
        }

    ]},
    "room":{"pitch":-3,"yaw":117,"hfov":110,"panorama": "http://localhost:8080/virtualtour/public/images/room1.jpg", type: "equirectangular",
    "autoLoad": true,
    "hotSpots":[
        {
            "pitch": -0.3871847166404985,
            "yaw": -163.5857265999228,
            "type": "scene",
            "text": "Entrance",
            "sceneId": "entrance",
            "clickHandlerFunc":hotspotClicked,
            "clickHandlerArgs":"Entrance"
        }
    ]},
    "living-room":{"pitch":-3,"yaw":117,"hfov":110,"panorama": "http://localhost:8080/virtualtour/public/images/living.jpg", type: "equirectangular",
    "autoLoad": true,
    "hotSpots":[
        {
            "pitch": -10.176773601955965,
            "yaw":  20.63859733007007,
            "type": "scene",
            "text": "Balcony",
            "sceneId": "balcony",
            "clickHandlerFunc":hotspotClicked,
            "clickHandlerArgs":"Balcony"
        },
        {
            "pitch": -4.489684207013833,
            "yaw": -171.1616554745367,
            "type": "scene",
            "text": "Entrance",
            "sceneId": "entrance",
            "clickHandlerFunc":hotspotClicked,
            "clickHandlerArgs":"Entrance"
        }

    ]}
   }
 }
    
    
];
console.log(homeTour);

function exampleImgs(getimg)
{
    var getimgId=getimg.id;
    ExampleHotspot(getimgId);
    $(".pnlm-hotspot").remove();
  //  console.log(getimgId);
}

function ExampleHotspot(getimgName)
{
    defaultRoom={};
  defaultRoom={
  "default": {
        "firstScene": getimgName,
        "sceneFadeDuration": 1000,
        "autoRotate": -2, 
        "compass": true
        
    }
};

    for(var i=0;i<homeTour.length;i++)
       {
    
           defaultRoom.scenes=homeTour[i].scenes;
         //  console.log(defaultRoom);
       }

       viewer =pannellum.viewer('exampleTour',defaultRoom);
       
 $("#show-roomName").html("");
 $("#show-roomName").append("<h3 id='current-room' class='heading-position'>"+defaultRoom["default"].firstScene+"<i style='display:inline;z-index:1000;margin-left:2px !important;' class='fa fa-fw fa-home ml-3' ></i><h3>  ");
}

$(".sliding-link").click(function(e) {
    e.preventDefault();
    var aid = $(this).attr("href");
    $('html,body').animate({scrollTop: $(aid).offset().top},'slow');
});

$(".btn-group-toggle input:radio").on('change', function() {
   
    
  }) 
