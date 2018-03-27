function displayUserData(userID, college, class_crn, department, class_, class_number, email,name){
    $("#user-info").append('<h1 style="margin-top=2rem; margin-bottom=2rem;">Account #'+userID+'</h1>');
    var div = document.createElement("div");

    div.classList.add("row");
    div.id = "user-info-row";
    document.getElementById("user-info").appendChild(div);
    $("#user-info-row").append('<div class="row">');
    $("#user-info-row").append('<div class="col"><h3>Contact</h3><p>'+name+'</p><p>'+email+'</p></div>');
    $("#user-info-row").append('<div class="col"><h3>College</h3><p>'+college+'</p></div>');
    $("#user-info-row").append('<div class="col"><h3>Classes</h3><p>'+class_number+'</p><p>'+class_+'</p><p>'+class_crn+'</p></div>');
    $("#user-info-row").append('</div>');
}