function displayVendors(name, website, address, number, poc, email, items)
{
    var div = document.createElement("div");
    div.classList.add("col-lg-4","col-md-6","col-sm-12");
    var thumbnail = document.createElement("div");
    thumbnail.classList.add("thumbnail");
    
    

    //var qty = parseInt(quantity);
   //var availability = "In Stock";
    //if(qty == 0){
       // availability = "Out Of Stock";}
    thumbnail.innerHTML = "<div class='row'> <div class='col-3'>"+
            "<img class='card-img-top' src='http://via.placeholder.com/200x200' style='max-height:50%; width:auto; padding-left:5%;padding-top:5%;padding-right:5%;' alt='Card image cap'>" +
            "</div><div class='col-9'>"+"<p class='itemName'>"+name+"</p>"+
            '<table>'+
            '<tr> <td>Website</td><td>'+website+'</td></tr>'+
            '<tr> <td>Address</td><td>'+address+'</td></tr>'+
            //'<tr><td>Availability</td><td>'+availability+'</td></tr>'+
            '<tr><td>Number</td><td>'+number+'</td></tr>'+
            '<tr><td>POC</td><td>'+poc+'</td></tr>'+
            '<tr><td>Email/td><td>'+email+'</td></tr>'+
            '</table>'+'</div></div>'+
            '<div class="form-inline"><button class="btn btn-success btn-sm" onclick="setCookies(\''+name+'\',\''+website+'\',\''+address+'\',\''+number+'\',\''+poc+'\',\''+email+'\',\''+items+'\''+')" name="view" >View</button><button class="btn btn-warning btn-sm" onclick="addToCart(\''+number+'\',\''+name+'\',\''+vendor+'\',\''+price+'\',\''+quantity+'\',\''+description+'\''+')" name="addToCart" >Add To Cart</button></div>';

    
    div.appendChild(thumbnail);
    document.getElementById("items").appendChild(div);
                
}


function displayVendorDetails(name, website, address, number, poc, email, items)
{
    var table = document.createElement("table");
    table.id = "product-detail-table";
    document.getElementById("product-detail").appendChild(table);

   
    document.getElementById("product-name").innerHTML = name;

    $("#product-image").append('<img src="http://via.placeholder.com/200x200" style="max-height:100%; width:auto; margin:2rem;">');
    $("#product-detail-table").append('<tr> <td>Name</td><td>'+name+'</td></tr>');
    $("#product-detail-table").append('<tr><td>Website</td><td>'+website+'</td></tr>');
    $("#product-detail-table").append('<tr><td>Address</td><td>'+address+'</td></tr>');
    $("#product-detail-table").append('<tr><td>Number</td><td>'+number+'</td></tr>');
    $("#product-detail-table").append('<tr><td>POC</td><td>'+poc+'</td></tr>');
    $("#product-detail-table").append('<tr><td>Email</td><td>'+email+'</td></tr>');
    $("#product-description").append('<p>'+description+'</p>');
}

function setCookies(name, website, address, number, poc, email, items,type=1){

    setCookie('name',name,1);
    setCookie('website',website,1);
    setCookie('address',address,1);
    setCookie('number',number,1);
    setCookie('poc',poc,1);
    setCookie('email',email,1);
    setCookie('items',items,1);
    if (type == 1){
    $.ajax({
        type: "POST",
        url:"displayVendor.php",
        data:{website:''},
        dataType:"JSON",
        success: function() {
            alert("success");
        },
        error: function(err) {
            $("body").append(err.responseText);
            }
    });}

}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

//function addToCart(number, name, vendor, price, quantity,description){
    //setCookies(number, name, vendor, price, quantity,description,0);
    //var itemsInCart = $("#cart-bubble").text();
   // itemsInCart = parseInt(itemsInCart);
   // itemsInCart++;
   // $("#cart-bubble").text(itemsInCart);
   // var dataString = '{addToCart:' + '1' + ',name:' + name+ ',number:' + number + ',vendor:' + vendor + ',price:' + price+ ',quantity:' + quantity+ ',description:' + description+'}';
   // $.ajax({
        //type: "POST",
       // url:"addToCart.php",
       // data: dataString,
        //dataType: "JSON",
       // success: function() {
            
        //}
    //});

//}

