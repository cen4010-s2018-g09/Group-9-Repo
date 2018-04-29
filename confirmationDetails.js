function confirmationDetails(type, file1, flie2, comments)
{
    var table = document.createElement("table");
    table.id = "job-detail-table";
    document.getElementById("job-detail").appendChild(table);


    document.getElementById("job-name").innerHTML = type;
    $("#product-detail-table").append('<tr> <td>Job</td><td>'+type+'</td></tr>');
    $("#product-detail-table").append('<tr><td>Model</td><td>'+file1+'</td></tr>');
    $("#product-detail-table").append('<tr><td>File One</td><td>'+file2+'</td></tr>');
    $("#product-description").append('<p>'+comments+'</p>');
}

//function displayItems(type, file1, flie2, comments)
//{
    //var div = document.createElement("div");
    //div.classList.add("col-lg-4","col-md-6","col-sm-12");
    //var thumbnail = document.createElement("div");
    //thumbnail.classList.add("thumbnail");
    
   // thumbnail.innerHTML = "<div class='row'> <div class='col-3'>"+
           // "<img class='card-img-top' src='http://via.placeholder.com/200x200' style='max-height:50%; //width:auto; padding-left:5%;padding-top:5%;padding-right:5%;' alt='Card image cap'>" +
            //"</div><div class='col-9'>"+"<p class='itemName'>"+name+"</p>"+
            //'<table>'+
            //'<tr> <td>Price</td><td>'+price+'</td></tr>'+
            //'<tr><td>Availability</td><td>'+availability+'</td></tr>'+
            //'<tr><td>Model</td><td>'+number+'</td></tr>'+
            //'<tr><td>Manufacturer</td><td>'+vendor+'</td></tr>'+
            //'<tr><td>Quantity</td><td>'+quantity+'</td></tr>'+
            //'</table>'+'</div></div>'+
           // '<div class="form-inline"><button class="btn btn-success btn-sm" onclick="setCookies(\''+number+'\',\''+name+'\',\''+vendor+'\',\''+price+'\',\''+quantity+'\',\''+description+'\''+')" name="view" >View</button><button class="btn btn-warning btn-sm" onclick="addToCart(\''+number+'\',\''+name+'\',\''+vendor+'\',\''+price+'\',\''+quantity+'\',\''+description+'\''+')" name="addToCart" >Add To Cart</button></div>';

    
   // div.appendChild(thumbnail);
   // document.getElementById("items").appendChild(div);
                
//}

function setCookies(type, file1, flie2, comments){

    setCookie('type',type,1);
    setCookie('file1',file1,1);
    setCookie('file2',file2,1);
    setCookie('comments',comments,1);
    

}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function addToCart(number, name, vendor, price, quantity,description){
    setCookies(number, name, vendor, price, quantity,description);
    var itemsInCart = $("#cart-bubble").text();
    itemsInCart = parseInt(itemsInCart);
    itemsInCart++;
    $("#cart-bubble").text(itemsInCart);
    var dataString = '{addToCart:' + '1' + ',name:' + name+ ',number:' + number + ',vendor:' + vendor + ',price:' + price+ ',quantity:' + quantity+ ',description:' + description+'}';
    $.ajax({
        type: "POST",
        url:"addToCart.php",
        data: dataString,
        dataType: "JSON",
        success: function() {
            
        }
    });

}