		function validate(){
				//check if the data is correct
				var obj=document.getElementById("vaccine_name");
				if(validateVaccine(obj.value)==true){
					
				}else{
					obj.style.backgroundColor="red";
					return false;
				}
			}
			
			
			function validateVaccine(str){
				var reName=new RegExp("[A-X][a-z]");
				if(reName.test(str)){
					return true;
				}else{
					return false;
				}
			
			}