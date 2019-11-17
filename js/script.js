function login(usr,pw) {
    let uname = "Ruthwik";
    let pwd = "00000";
    if(usr === uname && pw === pwd)
        window.location = "../html/Aboutus.html";
    else
        alert("Invalid username or password.");
}