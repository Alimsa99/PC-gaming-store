function V_login()
        {
        var name = document.log.username.value;
        var pass = document.log.password.value;
        if(name == "" && pass == "")
        {
            alert("Username and password field is empty");
        }else if(name == "")
        {
            alert("Username field is empty");
        }
        else if(pass == "") {
            alert("Password field is empty");

        }
    }
function V_reg()
        {
        var name = document.reg.username.value;
        var pass = document.reg.password.value;
        var email = document.reg.email.value;
        var phone = document.reg.phone.value;
        if(name == "" || pass == "" || email == "" || phone == "")
        {
            alert("All field is required");
        }
        else if(name == "")
        {
            alert("Username field is empty");
        
        }else if(pass == "")
        {
        alert("Password field is empty");
        }
        else if(email == "") {
            alert("Email field is empty");
        }
        else if(phone == ""){
            alert("Phone field is empty");
        }
    }

function V_delete()
        {
            var product_id = document.delete.delete_p.value ;
            if(product_id == "")
            {
                alert("You have to enter product id");

            }

        }
function V_modify()
        {
            var product_id = document.modify.modify_p.value ;
            if(product_id  == "")
            {
                alert("You have to enter product id");

            }

        }