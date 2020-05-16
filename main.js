function searchCafe() {
  document.getElementById("ifr").src="https://www.google.com/maps/search/%E3%82%AB%E3%83%95%E3%82%A7/";
  document.getElementById("p2").style.visibility ="visible";
}

function kakunin(){
  let test = document.form1.selectValue;
  let num = test.selectedIndex;
  let str1 = test.options[num].value;
  
  console.log(str1);
  
};