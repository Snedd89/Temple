function travel(event){
    event.preventDefault();
    console.log("Click...");
    var travel_id = event.target.id;
    var direction = travel_id.substr(4);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var travel_data = this.responseText;
        console.log(travel_data);
        travel_data = JSON.parse(travel_data);
        $(".console-text").append("<p>"+travel_data['message']+"</p>");
        $(".console").animate({ scrollTop: $(document).height() }, "slow");
   }
};
xhttp.open("GET", "/action/5/"+direction, true);
xhttp.send(); 
}