let x = true

function showHidden() {
;

if (x) {
document.getElementById('pass').type = "text";
x = false;
} else {
document.getElementById('pass').type = "password";
x = false;
}
}