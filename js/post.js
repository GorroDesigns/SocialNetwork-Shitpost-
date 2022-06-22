function like(value) {

let xml= new XHLHttpRequest();
xml. onreadystatechange= function (){
    if(this.readyState == 4 && this.status == 200){
        var reply = this.responseText;
        alert("This message is from database "+reply);
    }
}
xml.open("POST", "db.php",true);
xml.setRequestHeader("content-type","application/-ww-form-urlencoded");
xml. send("post_ide=value");


}
