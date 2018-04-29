function displayJobDetails(type,file1, file2,comments)
{
    var table = document.createElement("table");
    table.id = "product-detail-table";
    document.getElementById("product-detail").appendChild(table);

    document.getElementById("product-name").innerHTML = name;

    $("#product-detail-table").append('<tr> <td>Price</td><td>'+type+'</td></tr>');
    $("#product-detail-table").append('<tr><td>Availability</td><td>'+file1+'</td></tr>');
    $("#product-detail-table").append('<tr><td>Model</td><td>'+file2+'</td></tr>');
    $("#product-description").append('<p>'+comments+'</p>');
}