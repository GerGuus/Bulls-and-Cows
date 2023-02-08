function find(array, value) {
      for(var i=0; i<array.length; i++) {
        if (array[i] == value) return 1;
      }
      return 0;
}
function gues(){
	var getNum = document.getElementById('4digits').value;
	labelInfo.innerHTML = "";
	if(getNum.length < 4){
		labelInfo.innerHTML = "Ведите 4 цифры";
		return;
	}
	for(var i=0; i<3; i++){
		for(var j=3; j>i;j--){
				if(getNum[i]==getNum[j]){
					labelInfo.innerHTML = "Введены одинаковые цифры";
					return
				}
		}
		
	}
	var gues = Array.from(getNum.toString(), Number);
	var bulls = 0;
	var cows = 0;

	var numbers = [0,0,0,0,0,0,0,0,0,0];
	for(var i=0; i<4; i++){
		if(secret[i] == gues[i]){
			bulls++;
		} 
		else{
			if(numbers[secret[i]]++ < 0) cows++;
			if(numbers[gues[i]]-- > 0) cows++;
		}	
	}
	try_counter++;
	var title = document.getElementById("gues-list");
	if(bulls == 4){	
		labelWin.innerHTML = "Вы отгодали число";
		title.insertAdjacentHTML('afterBegin', "<div class='win'><p>" + try_counter + "</p><p>" + getNum + "</p><p>" + bulls + "</p><p>" + cows +"</p></div>");
		btnGo = document.querySelector('#go');
		btnGo.setAttribute('disabled', true);
		btnGiveUp.setAttribute('disabled', true);
		$.ajax({
			url:'php/result.php',
			type: 'POST',
			dataType: 'json',
			data:{
				tries: try_counter
			}
		})
	}
	else{
		title.insertAdjacentHTML('afterBegin', "<div class='gues'><p>" + try_counter + "</p><p>" + getNum + "</p><p>" + bulls + "</p><p>" + cows +"</p></div>");
	}
}
function giveUp(){
	title.insertAdjacentHTML('afterBegin', "<div class='lost'><p>" + secret.join('') + "</p></div>");
	btnGo.setAttribute('disabled', true);
	btnGiveUp.setAttribute('disabled', true);
}

var secret = [];
var i = 0;
var try_counter = 0;
while(i<4){
	var digit =Math.floor(Math.random()*10);
	if(find(secret, digit)==0){ 
           secret[i] = digit;
           i++; 
    }
}
var title = document.getElementById("gues-list");
var btnGo = document.querySelector('#go');
var btnGiveUp = document.querySelector('#giveUp');
var labelInfo = document.querySelector('#info');
var labelWin= document.querySelector('#win');


