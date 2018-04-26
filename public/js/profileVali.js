function validateForm()
{
    var u_name = document.profile.user_name;
    var password = document.profile.password;
    var email = document.profile.email;
    if(allLetter(u_name))
    {
        if(ValidateEmail(email))
        {
            if(password_validation(password,6,12))
            {
            }
        }
    }
    return false;
}
function allLetter(u_name)
{
    var letters = /^[A-Za-z]+$/;
    if(u_name.value.match(letters))
    {
        return true;
    }
    else
    {
        alert('User Name must have alphabet characters only');
        u_name.focus();
        return false;
    }
}
function password_validation(password,mx,my)
{
    var password_len = password.value.length;
    if (password_len == 0 ||password_len >= my || password_len < mx)
    {
        alert("Password should not be empty / length be between "+mx+" to "+my);
        password.focus();
        return false;
    }
    return true;
}
function ValidateEmail(email)
{
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(email.value.match(mailformat))
    {
        return true;
    }
    else
    {
        alert("You have entered an invalid email address!");
        email.focus();
        return false;
    }
}