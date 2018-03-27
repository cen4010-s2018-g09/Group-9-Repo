function displayItemDetails(number, name, vendor, price, quantity,description)
{
    var table = document.createElement("table");
    table.id = "product-detail-table";
    document.getElementById("product-detail").appendChild(table);

    var qty = parseInt(quantity);
    var availability = "In Stock";
    if(qty == 0){
        availability = "Out Of Stock";}
    document.getElementById("product-name").innerHTML = name;
    $("#product-image").append('<img src="http://via.placeholder.com/200x200" style="max-height:100%; width:auto; margin:2rem;">');
    $("#product-detail-table").append('<tr> <td>Price</td><td>'+price+'</td></tr>');
    $("#product-detail-table").append('<tr><td>Availability</td><td>'+availability+'</td></tr>');
    $("#product-detail-table").append('<tr><td>Model</td><td>'+number+'</td></tr>');
    $("#product-detail-table").append('<tr><td>Manufacturer</td><td>'+vendor+'</td></tr>');
    $("#product-detail-table").append('<tr><td>Quantity</td><td>'+quantity+'</td></tr>');
    $("#product-description").append('<p>'+description+'</p>');
}
function displayItems(number, name, vendor, price, quantity,description)
{
    var div = document.createElement("div");
    div.classList.add("col-lg-4","col-md-6","col-sm-12");
    var thumbnail = document.createElement("div");
    thumbnail.classList.add("thumbnail");
    
    

    var qty = parseInt(quantity);
    var availability = "In Stock";
    if(qty == 0){
        availability = "Out Of Stock";}
    thumbnail.innerHTML = "<div class='row'> <div class='col-3'>"+
            "<img class='card-img-top' src='http://via.placeholder.com/200x200' style='max-height:50%; width:auto; padding-left:5%;padding-top:5%;padding-right:5%;' alt='Card image cap'>" +
            "</div><div class='col-9'>"+"<p class='itemName'>"+name+"</p>"+
            '<table>'+
            '<tr> <td>Price</td><td>'+price+'</td></tr>'+
            '<tr><td>Availability</td><td>'+availability+'</td></tr>'+
            '<tr><td>Model</td><td>'+number+'</td></tr>'+
            '<tr><td>Manufacturer</td><td>'+vendor+'</td></tr>'+
            '<tr><td>Quantity</td><td>'+quantity+'</td></tr>'+
            '</table>'+'</div></div>'+
            '<form method="post"><button class="btn btn-success btn-sm" onclick="setCookies(\''+number+'\',\''+name+'\',\''+vendor+'\',\''+price+'\',\''+quantity+'\',\''+description+'\''+')" name="view" >View</button></form>';

    
    div.appendChild(thumbnail);
    document.getElementById("items").appendChild(div);
                
}

function setCookies(number, name, vendor, price, quantity,description){

    setCookie('number',number,1);
    setCookie('name',name,1);
    setCookie('vendor',vendor,1);
    setCookie('price',price,1);
    setCookie('quantity',quantity,1);
    setCookie('description',description,1);
    

}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}