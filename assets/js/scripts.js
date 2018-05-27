require('jquery');
require('bootstrap');

$('#learnMoreButton').click( function(){
    $('html, body').animate({scrollTop:$('#features').position().top}, 'slow');
});


function TitleControl(controlDiv, map) {

        // Set CSS for the control border.
        var controlUI = document.createElement('div');
        controlUI.style.backgroundColor = '#fff';
        controlUI.style.border = '2px solid #fff';
        //controlUI.style.borderRadius = '3px';
        controlUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
        //controlUI.style.cursor = 'pointer';
        controlUI.style.marginBottom = '22px';
        controlUI.style.textAlign = 'center';
        //controlUI.title = 'Click to recenter the map';
        controlDiv.appendChild(controlUI);

        // Set CSS for the control interior.
        var controlText = document.createElement('div');
        controlText.style.color = '#232F3E';
        controlText.style.fontFamily = 'Fira Sans';
        controlText.style.fontSize = '2rem';
        controlText.style.lineHeight = '64px';
        controlText.style.paddingLeft = '20px';
        controlText.style.paddingRight = '20px';
        controlText.innerHTML = 'Where and When?';
        controlUI.appendChild(controlText);
}
                
    
function init_map(){

        var myOptions = {
            zoom: 13,
            center: new google.maps.LatLng(40.855,14.1874),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            disableDefaultUI: true
        };
        map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);

        var centerControlDiv = document.createElement('div');
        var centerControl = new TitleControl(centerControlDiv, map);

        centerControlDiv.index = 1;
        //map.controls[google.maps.ControlPosition.TOP_CENTER].push(centerControlDiv);
        
        marker = new google.maps.Marker({
            map: map,
            position: new google.maps.LatLng(40.8396,14.1874)
        });

        var infoContentString = `
            <h6 style="font-size: 1.2rem;font-family: Fira Sans">Getting to know Amazon Web Services</h6>
            <p style="font-size: 1rem;font-family: Fira Sans">
                University of Naples, Federico II<br/>
                Strada Vicinale Cupa Cintia, 21, 80126 Naples, Italy<br/>
                Room H5<br/>
                Monday May, 28th 2018 at 2 PM<br/>
            </p>
        `;

        infowindow = new google.maps.InfoWindow({
            content: infoContentString
        });
        google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});
        infowindow.open(map,marker);
}
google.maps.event.addDomListener(window, 'load', init_map);