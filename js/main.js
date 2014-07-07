String.prototype.capitalize = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
}
var focusInputId = "";
function FocusInput(id){
    focusInputId = id;
    console.log("called");
    setTimeout(function(){ $(focusInputId).focus(); },600)
}


function delete_null_properties(test, recurse) {
    for (var i in test) {
        if (test[i] === null || test[i] === undefined) {
            delete test[i];
        } else if (recurse && typeof test[i] === 'object') {
            delete_null_properties(test[i], recurse);
        }
    }
}