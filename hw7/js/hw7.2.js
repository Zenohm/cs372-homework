function validate() {
    if (document.getElementById("name_entry").value == "") {
        alert("You must provide a name!");
        return false;
    }
    else if (!document.getElementById("email_entry").value.match(/.+@.+\.edu$/)) {
        alert("You must provide a .edu email adddress!");
        return false;
    }
    else if (!document.getElementById("yes").checked && !document.getElementById("no").checked && !document.getElementById("maybe").checked) {
        alert("You must tell us if you'd come again. You simply must!");
        return false;
    }
    else if (document.getElementById("comment_entry").value == "") {
        alert("You must provide some feedback! It's not negotiable.");
        return false;
    }
    else if (!document.getElementById("emailUpdates").checked) {
        alert("One does not simply live without our email updates.");
        return false;
    }
    return true;
}

function enrageUser() {
    document.getElementById("the-lonely-button").disabled = !document.getElementById("emailUpdates").checked;

}
