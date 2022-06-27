function triggerClick(){
    document.querySelector("#profile").click();
}

function displayImage(e){
    if (e.files[0]){
        var reader = new FileReader();
        reader.onload = function(e){
            document.querySelector("#profileDisplay").setAttribute("#image",e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }

}
function showhide() {
    var div = document.getElementById("newpost");
    div.classList.toggle('hidden'); 
}
function showhide1() {
    var div = document.getElementById("newpost1");
    div.classList.toggle('hidden1'); 
}
function showhide2() {
    var div = document.getElementById("newpost2");
    div.classList.toggle('hidden2'); 
}
function showhide3() {
    var div = document.getElementById("newpost3");
    div.classList.toggle('hidden3'); 
}
function triggerClick2(){
    document.querySelector("#soumettre").click();
}