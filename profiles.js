
function displayProfiles(name, accnum, college, crn, dept, classx, classNumber,className, email, profileType)
{
    var div = document.createElement("div");
    div.classList.add("col-lg-4","col-md-6","col-sm-12");
    var thumbnail = document.createElement("div");
    thumbnail.classList.add("thumbnail");
    
    

    thumbnail.innerHTML = "<div class='row'> <div class='col-3'>"+
            "<img class='card-img-top' src='http://via.placeholder.com/200x200' style='max-height:50%; width:auto; padding-left:5%;padding-top:5%;padding-right:5%;' alt='Card image cap'>" +
            "</div><div class='col-9'>"+"<p class='itemName'>"+name+"</p>"+
            '<table>'+
            '<tr> <td>College</td><td>'+college+'</td></tr>'+
            '<tr> <td>Account Number</td><td>'+accnum+'</td></tr>'+
            '<tr><td>Class CRN</td><td>'+crn+'</td></tr>'+
            '<tr><td>Department</td><td>'+dept+'</td></tr>'+
            '<tr><td>Class</td><td>'+classx+'</td></tr>'+
            '<tr><td>Class Number</td><td>'+classNumber+'</td></tr>'+
            '<tr><td>Class Name</td><td>'+className+'</td></tr>'+
            '<tr><td>Email</td><td>'+email+'</td></tr>'+
            '<tr><td>Profile Type</td><td>'+profileType+'</td></tr>'+
            '</table>'+'</div></div>'+
           '<div class="form-inline"><button class="btn btn-success btn-sm" onclick="setCookies(\''+name+'\',\''+accNum+'\',\''+college+'\',\''+crn+'\',\''+dept+'\',\''+classx+'\',\''+classNumber+'\',\''+className+'\',\''+email+'\',\''+profileType+'\''+')" name="view" >View</button><button class="btn btn-warning btn-sm" 
    
    div.appendChild(thumbnail);
    document.getElementById("items").appendChild(div);
                
}



function setCookies(name, accnum, college, crn, dept, classx, classNumber,className, email, profileType,type=1){

    setCookie('name',name,1);
    setCookie('accnum',accnum,1);
    setCookie('college',college,1);
    setCookie('crn',crn,1);
    setCookie('dept',dept,1);
    setCookie('classx',classx,1);
    setCookie('classNumber',classNumber,1);
    setCookie('className',className,1);
    setCookie('email',email,1);
    setCookie('profileType',profileType,1);
    if (type == 1){
    $.ajax({
        type: "POST",
        url:"confirm.php",
        data:{name:''},
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

