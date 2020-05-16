function searchCafe() {
  document.getElementById("ifr").src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d2994.60235656429!2d135.7589036265949!3d35.0040101608069!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1z44Kr44OV44Kn!5e0!3m2!1sja!2sjp!4v1589614921008!5m2!1sja!2sjp";
  document.getElementById("p2").style.visibility ="visible";
}

function kakunin(){
  let test = document.form1.selectValue;
  let num = test.selectedIndex;
  let str1 = test.options[num].value;
  
  console.log(str1);
  
};