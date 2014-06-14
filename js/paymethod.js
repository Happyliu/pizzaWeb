function locate(){
     var address = document.getElementById("address").value; 
     var map = new BMap.Map("container1");  
     var myGeo=new BMap.Geocoder();        
     myGeo.getPoint(address,function(point){   
         if (point){
             document.getElementById("lng").value = point.lng;     
             document.getElementById("lat").value = point.lat;     
             lng = document.getElementByName("lng").value = point.lng;       
             lat = document.getElementByName("lat").value = point.lat;       
         }
     },"中国");
 }
