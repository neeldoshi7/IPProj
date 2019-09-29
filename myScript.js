console.log("Hello from my javascript");

function myCheck(){
  console.log("Hello on click");

sname = document.querySelector('#fname').value();
semail = document.querySelector('#femail').value();
snumber = document.querySelector('#pnumber').value();
spass = document.querySelector('#fpass');
srepass = document.querySelector('#frepass');

if(sname.length==0 || semail.length==0 || snumber.length==0 || spass.length==0 || srepass.length==0){
  alert("Please fill all the fields");
}

}
