String.prototype.capitalize = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
}
var focusInputId = "";
function FocusInput(id){
    focusInputId = id;
    console.log("called");
    setTimeout(function(){ $(focusInputId).focus(); },600)
}