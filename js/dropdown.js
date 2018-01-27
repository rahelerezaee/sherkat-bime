function remove_function(){
    var dropdown2 = document.getElementById("user2");
    document.getElementById('user2').innerHTML = "";

    var option = document.createElement("option");
    option.text = "مشاور";
    dropdown2.add(option);
    var option = document.createElement("option");
    option.text = "مدیر داخلی";
    dropdown2.add(option);
    var option = document.createElement("option");
    option.text = "سرپرست فروش";
    dropdown2.add(option);
    var option = document.createElement("option");
    option.text = "مالی";
    dropdown2.add(option);
    var option = document.createElement("option");
    option.text = "مدیریت";
    dropdown2.add(option);
    var option = document.createElement("option");
    option.text = "کاربر صدور";
    dropdown2.add(option);
   var option = document.createElement("option");
    option.text = "رابط شعبه";
    dropdown2.add(option);

    var dropdown1_selected = document.getElementById("user1").value;
    var select=document.getElementById('user2');

    for (i=0;i<select.length;  i++) {
        if (select.options[i].value == dropdown1_selected) {
            select.remove(i);
        }
    }
}