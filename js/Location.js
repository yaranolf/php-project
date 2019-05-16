$(document).ready(function(){
    $('.location').each(function(){
        var myURL = "https://nominatim.openstreetmap.org/reverse";
    ///   alert("test");
        var id = $(this).data('id');
        var lat = $(this).data('lat')
            var lng = $(this).data('long');
        var getMyData = (function() {
            
           // alert(lat);
          //  alert(lng);
            return {format:"xml",lat:lat,lon:lng,MaxResponse:1,"accept-language":"en-us",addressdetails:1};
        })
        


        $.ajax({
            dataType: "xml",
            url: myURL,
            type: "GET",
            data: getMyData(),
            mimeType: "xml",
            success: function(data, textStatus, jqXHR) {
               // alert(data);
                var xmlData = data;
                xmlDoc = $.parseXML(xmlData);
                $xml = $( xmlDoc );
               // alert($xml.text());
                $result = $xml.find("reversegeocode>addressparts>town");
            
               // alert( $result.text() );
               // $( "#" + id ).text( "town" );
                    },
                    error:function(response) {
                       // alert(response);
                    }
    })
})
});
