var icon = document.getElementById("icon");
let mododarkString = localStorage.getItem('mododark');
if(mododarkString == "dark-theme"){
    document.body.classList.toggle("dark-theme");
    icon.src = "/img/sun.png";
}else{
    icon.src = "/img/moon.png";
}
icon.onclick = function() {
    
  document.body.classList.toggle("dark-theme");
  
  if(document.body.classList.contains("dark-theme")){
      localStorage.setItem('mododark', "dark-theme");
      icon.src = "/img/sun.png";
  }else{
      localStorage.removeItem('mododark');
      icon.src = "/img/moon.png";
  }
}