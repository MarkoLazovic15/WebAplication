function myFunction() {
    var cong = confirm("Da li potvrdjujete brisanje?")
    if(!cong){
        return false;
    }
    return true;
}
