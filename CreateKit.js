function KitName(number, name, quantity, description){

    var qty = parseInt(quantity);
    var col = document.createElement("div");
            col.classList.add("col-3");
            col.setAttribute("id", "product-edit");
    var table = document.createElement("div");
            table.innerHTML= "<div>"+
            '<h2>Kit Details</h2>'+
            '<table class="table">'+
            '<tbody>'+
            '<tr> <td>Kit Name</td><td><input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="KitName" value=""></td></tr>'+
            '<tr><td>Kit Class</td><td><input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="Kit Class" value=""></td></tr>'+
            '</tbody>'+
            '</table>'+
            '<button type="button" class="btn btn-primary" onclick="CreateKit();">Create Kit</button>'+
            '</div>';

    col.appendChild(table);

    document.getElementById("page-content").appendChild(col);
        }

function CreateKit(){
    var KitName = $('input[name=KitName').val();
    var KitClass = $('input[name=KitClass').val();
    $.ajax({
        type: "POST",
        url:"CreateKit.php",
        data: {KitName:KitName,KitClass:KitClass},
        dataType: "JSON",
        error: function(err) {
            window.location = "confirm.php";
            }
    });
    

}