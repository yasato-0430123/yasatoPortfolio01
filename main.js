function searchCafe() {
  document.getElementById("ifr").src="https://www.google.com/maps?output=embed&q=現在地$cafe";
  document.getElementById("p2").style.visibility ="visible";
}

function kakunin(){
  let test = document.form1.selectValue;
  let num = test.selectedIndex;
  let str1 = test.options[num].value;
  
  console.log(str1);
  
};